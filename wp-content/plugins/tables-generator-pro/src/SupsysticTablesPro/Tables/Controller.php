<?php


class SupsysticTablesPro_Tables_Controller extends SupsysticTables_Tables_Controller
{
	public function saveEditableFieldAction(Rsc_Http_Request $request) {
		$tables = $this->getModel('tables');
		$table_id = $request->post->get('id');
		$rows = array();
		$cell_data = array(
			'row' => $request->post->get('row'),
			'column' => $request->post->get('column'),
			'value' => $request->post->get('value'),
			'original' => $request->post->get('original'),
		);

		if($this->checkEditableFieldsAbility($table_id)) {
			try {
				$rows = $tables->getRows($table_id);
			} catch (Exception $e) {
				return $this->ajaxError(
					sprintf(
						$this->translate(
							'Failed to get table rows: %s'
						),
						$e->getMessage()
					)
				);
			}

			if(!empty($rows)) {
				foreach($rows as $key => $row) {
					if($key == $cell_data['row'] - 1) {	// Rows' numbers begin from 1
						if(isset($row['cells']) && !empty($row['cells'])) {
							foreach($row['cells'] as $index => $cell) {
								if($index == $cell_data['column']) {
									$rows[$key]['cells'][$index]['data'] = $cell_data['value'];

									if(isset($cell_data['original']) && !empty($cell_data['original'])) {
										$rows[$key]['cells'][$index]['calculatedValue'] = $cell_data['original'];
									}
								}
							}
						}
					}
				}
			}

			try {
				$tables->setRows($table_id, $rows);
			} catch (Exception $e) {
				return $this->ajaxError(
					sprintf(
						$this->translate(
							'Failed to save table rows: %s'
						),
						$e->getMessage()
					)
				);
			}
			$this->cleanCache($table_id);
			return $this->ajaxSuccess();
		} else {
			return $this->ajaxError('There is no permissions to save data through editable fields.');
		}
	}

	public function checkEditableFieldsAbility($id)
	{
		$use_editable_fields = false;
		$environment = $this->getEnvironment();
		$tables = $this->getModel('tables');
		$table = $tables->getById($id);

		if ($table) {
			$logged_in_only = isset($table->settings['useEditableFieldsForLoggedInOnly']) ? $table->settings['useEditableFieldsForLoggedInOnly'] : false;

			if (!$logged_in_only) {
				$use_editable_fields = true;
			} else {
				$is_logged_in = $environment->getModule('ui')->isUserLoggedIn();

				if ($is_logged_in) {
					$cur_roles_only = isset($table->settings['useEditableFieldsForCurRoles']) ? $table->settings['useEditableFieldsForCurRoles'] : false;

					if (!$cur_roles_only) {
						$use_editable_fields = true;
					} else {
						$cur_user_info = $environment->getModule('ui')->getCurrentUserInfo();

						if (!empty($cur_user_info->roles)) {
							foreach ($cur_user_info->roles as $role) {
								if (in_array($role, $cur_roles_only)) {
									$use_editable_fields = true;
									break;
								}
							}
						}
					}
				}
			}
		}
		return $use_editable_fields;
	}
}