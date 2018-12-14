<?php

class SupsysticTablesPro_Loader
{
    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var string
     */
    protected $path;


    public function load()
    {
        add_action('st_plugin_loaded', array($this, 'register'));
        if (is_admin()) {
            add_action('activated_plugin', array($this, 'setLoadOrder'));
            add_action('st_before_menu_register', array($this, 'setCapability'));
        }
    }

    public function register(Rsc_Environment $plugin)
    {
        $this->config = $plugin->getConfig();
        $config = $this->config;

        $config->add('pro_modules_prefix', $this->prefix);
        $config->add('pro_modules_path', $this->path);
        $config->add('plugin_product_code', 'table_generator_pro');
        $config->add('plugin_version_pro', $this->version);

        if (property_exists($this, 'capability')) {
            $menu = $config->get('plugin_menu');
            $menu['capability'] = $this->capability;
            $config->set('plugin_menu', $menu);
        }
        
        define('S_YOUR_SECRET_HASH_' . $config->get('plugin_product_code'), 'awd3q@Fsfe%$3fwfsvfxaxAwedawd@#ERQt');

        $loader = $plugin->getLoader();
        $loader->add($this->prefix, $this->path);

        $resolver = $plugin->getResolver();
        $modules = $resolver->getModulesList();
        if (is_dir($dir = $this->path . '/' . $this->prefix . '/License')) {
            $className = $this->prefix . '_' . basename($dir) . '_Module';

            if (!class_exists($className)) {
                if ($plugin->isPluginPage()) {
                    wp_die ('Cannot locate license module.');
                }

                return;
            }

            $license = new $className($plugin, $dir, $this->prefix);
            $modules->add('license', $license);
        }

        if ($license->isLegal()) {
            // Get list of the PRO modules.
            $nodes = glob($this->path . '/' . $this->prefix . '/*');

            if ($nodes === false || count($nodes) === 0) {
                return;
            }

            // If we need to replace free module - replace it.
            foreach ($nodes as $node) {
                $node = str_replace('\\', '/', $node);

                if (is_dir($node) && file_exists($module = $node . '/Module.php')) {
                    $className = $this->prefix . '_' . basename($node) . '_Module';
                    $name = strtolower(basename(dirname($module)));
                    $free = $modules[$name];
                    $location = $free instanceof Rsc_Mvc_Module ? $free->getLocation() : $node;
                    $modules[$name] = new $className($plugin, $location, $this->prefix);
                }
            }

            // Replace old list of the modules with new.
            $resolver->setModulesList($modules);
            $config->add('is_pro', true);
        }

        $updater = new SupsysticTablesUpdater();
        $updater->setDirectory(basename(dirname(__FILE__)));
        $updater->setEnvironment($plugin);
        $updater->setFile('index.php');
        $updater->setProductCode($config->get('plugin_product_code'));

        $updater->subscribe();
    }

    /**
     * Returns Prefix.
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Sets Prefix.
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Returns Path.
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Sets Path.
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    public function setProVersion($version)
    {
        $this->version = $version;
    }

    public function setCapability($menu) {
        $alowedRoles = array();
        $settings = get_option('supsystic_tbl_settings');
        if ($settings && isset($settings['access_roles'])) {
            $alowedRoles = $settings['access_roles'];
        }

        if (!isset($_COOKIE[LOGGED_IN_COOKIE])) {
            return $menu;
        }
        
        $cookie = $_COOKIE[LOGGED_IN_COOKIE];
        $cookie_elements = explode('|', $cookie);
        $login = array_shift($cookie_elements);
        $userdata = WP_User::get_data_by('login', $login);

        $current_user = new WP_User;
        $current_user->init($userdata);
        if ($current_user) {
            foreach ($current_user->roles as $role) {
                if (in_array($role, $alowedRoles)) {
                    $this->capability = 'read';
                    return $menu->setCapability('read');
                }
            }
        }

        return $menu;
    }

    // This method change load order to load pro before free version.
    // This need to apply action hooks on free version like _before_menu_register.
    public function setLoadOrder() {
        $path = str_replace(WP_PLUGIN_DIR . '/', '', dirname(__FILE__) . '/index.php');
        if ($plugins = get_option( 'active_plugins')) {
            if ($key = array_search($path, $plugins)) {
                array_splice($plugins, $key, 1);
                array_unshift($plugins, $path);
                update_option('active_plugins', $plugins);
            }
        }
    }
}