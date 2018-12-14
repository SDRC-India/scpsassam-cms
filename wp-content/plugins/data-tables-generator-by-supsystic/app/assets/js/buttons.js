if(typeof(SDT_DATA) == 'undefined')
    var SDT_DATA = {};

(function($) {

    var dialogClass = '.data-tables-select-dialog',
        initDialog = function() {
            var $container = $('#post-body-content');

            $container.append(
                '<div class="data-tables-select-dialog" hidden>' +
                    '<h3>Select table to insert</h3>' +
                    '<select></select>' +
                    '<button class="button button-primary">Select</button>' +
                '</div>');

            var url = '';

            if(typeof(wp.ajax) == 'undefined')
                url = SDT_DATA.ajaxurl;
            else
                url = wp.ajax.settings.url;

            $.post(url, {
                    action: 'supsystic-tables',
                    route:  {
                        module: 'tables',
                        action: 'list'
                    }
                }, function(response) {
                    $.each(response.tables, function(index, value) {
                        $container.find(dialogClass + ' select').append(
                            '<option value="' + value.id + '">' + value.title + '</option>'
                        );
                    });
                }
            );
        };

    tinymce.create('tinymce.plugins.addShortcodeDataTable', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            ed.addButton('addShortcodeDataTable', {
                title : 'Add Data Table by Supsystic',
                cmd : 'addShortcodeDataTable',
                image : url + '/img/logo_datatable.png'
            });

            initDialog();

            ed.addCommand('addShortcodeDataTable', function() {
                var $dialog = $(dialogClass).bPopup({
                    onClose: function() {
                        $(dialogClass + ' button').off('click');
                    }
                }, function() {
                    $(dialogClass + ' button').on('click', function() {
                        var selected = $(dialogClass).find('select').val(),
                            text = '[supsystic-tables id=' + selected + ' ]';
                        ed.execCommand('mceInsertContent', 0, text);
                        $dialog.close();
                    });
                });
            });
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Data Tables by Supsystic buttons',
                author : 'Dmitriy Smus',
                infourl : 'http://supsystic.com',
                version : "0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'addShortcodeDataTable', tinymce.plugins.addShortcodeDataTable );

})(jQuery);