<?php


class SupsysticTablesPro_Exporter_Controller extends SupsysticTables_Core_BaseController
{
    /**
     * Generates download url.
     * @param \Rsc_Http_Request $request
     * @return \Rsc_Http_Response
     */
    public function generateUrlAction(Rsc_Http_Request $request)
    {
		$id = $request->post->get('id');
		$slug = $this->getEnvironment()->getMenu()->getMenuSlug();
		$type = $request->post->get('type', 'csv');
		$orientation = $request->post->get('orientation', 'portrait');

        return $this->ajaxSuccess(array(
            'url' => admin_url(
                sprintf(
                    'admin.php?page=%s&module=exporter&id=%d&type=%s&orientation=%s&export-supsystic-table=true',
                    $slug,
                    $id,
                    $type,
					$orientation
                )
            )
        ));
    }

    public function export(Rsc_Http_Request $request)
    {
		$exporter = $this->getModel('exporter', $this->getModule());
		$type = $request->query->get('type');

		if(isset($request->post["pdf-table-data"])) {
			$title = $request->post['title'];
			$data = array();
		} else {
			$id = $request->query->get('id');
			/** @var SupsysticTables_Tables_Model_Tables $tables */
			$tables = $this->getModel('tables');
			/** @var SupsysticTablesPro_Exporter_Model_Exporter $exporter */
			$table = $tables->getById((int)$id);

			if (null === $table) {
				wp_die(sprintf($this->translate('The table ID %s not found.'), $id));
			}

			$title = $table->title;
			$data = $table->rows;
		}

        header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$title.'.'.$type.'"');
        $exporter->export($type, $data);
        die;
    }

    /**
     * @return SupsysticTablesPro_Exporter_Module
     */
    protected function getModule()
    {
        $resolver = $this->getEnvironment()->getResolver();

        return $resolver->getModulesList()->get('exporter');
    }
}
