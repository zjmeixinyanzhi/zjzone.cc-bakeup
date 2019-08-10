<?php
if (!class_exists('IMWPBase')){

	/**
	 * imwpbase
	 */
	class IMWPBase
	{
		/**
		 * create table form
		 * @param  array $data
		 * @return
		 */
		public function getTableForm($data)
		{ 	
			$form = '<form method="post" id="task-form" action="" enctype="multipart/form-data" novalidate="novalidate">
			<table class="form-table">';
			$submit = ''; 
			foreach($data as $row) {
				switch($row['type']){
					case 'text':
						$form .= "<tr><th>{$row['label']}</th>";
						isset($row['desc']) ? $row['desc'] = "<p class=\"description\">{$row['desc']}</p>" : $row['desc'] == '';
						$form .= "<td scope=\"row\"><input type=\"text\" name=\"{$row['name']}\" class=\"regular-text\" value=\"{$row['value']}\">{$row['desc']}</td>";
					break;

					case 'select':
						isset($row['desc']) ? $row['desc'] = "<p class=\"description\">{$row['desc']}</p>" : $row['desc'] == '';
						$form .= "<tr><th>{$row['label']}</th>";
						$form .= "<td scope=\"row\"><select name=\"{$row['name']}\">";
							foreach ($row['options'] as $k=>$v) {
								if ($row['value'] == $k) {
									$form .= "<option id=\"{$row['name']}-{$k}\" value=\"{$k}\" selected=\"selected\"><label for=\"{$row['name']}-{$k}\">{$v}</option>";
								} else {
									$form .= "<option id=\"{$row['name']}-{$k}\" value=\"{$k}\"><label for=\"{$row['name']}-{$k}\">{$v}</label></option>";
								}
							}
						$form .= "</select>{$row['desc']}</td>";
					break;

					case 'multicheck':
						isset($row['desc']) ? $row['desc'] = "<p class=\"description\">{$row['desc']}</p>" : $row['desc'] == '';
						$form .= "<tr><th>{$row['label']}</th>";
						$form .= "<td scope=\"row\">";
						foreach ($row['options'] as $k=>$v) {
							if (in_array($k, $row['value'])) {
								$form .= "<p><input id=\"{$row['name']}-{$k}\" name=\"{$row['name']}[]\" type=\"checkbox\" checked=\"checked\" value=\"{$k}\"><label for=\"{$row['name']}-{$k}\">{$v}</label></p>";
							} else {
								$form .= "<p><input id=\"{$row['name']}-{$k}\" name=\"{$row['name']}[]\" type=\"checkbox\" value=\"{$k}\"><label for=\"{$row['name']}-{$k}\">{$v}</label></p>";
							}
						}

						$form .= "{$row['desc']}</td>";
					break;

					case 'image':
						$form .= "<tr><th>{$row['label']}</th>";
						isset($row['desc']) ? $row['desc'] = "<p class=\"description\">{$row['desc']}</p>" : $row['desc'] == '';
						isset($row['value']) ? $row['value'] = "<p class=\"description\"><img src=\"{$row['value']}\" width=\"240px\" height=\"auto\" /></p>" : $row['value'] == '';
						$form .= "<td scope=\"row\"><input type=\"file\" name=\"{$row['name']}\">{$row['value']}{$row['desc']}</td>";
					break;

					case 'hidden':
						$form .= "<input name=\"{$row['name']}\" type=\"hidden\" value=\"{$row['value']}\">";
					break;

					case 'submit':
						$submit .= "<p class=\"submit\"><input type=\"submit\" name=\"submit\" id=\"submit\" class=\"button button-primary\" value=\"{$row['label']}\"></p>";
					break;

				}
				$form .= "</tr>";
			}

			$form .= '</table>'.$submit;
			return $form;
		}

		/**
		 * upload file
		 * @param  string $name
		 */
		public function upload($name)
		{
			if (!isset($_FILES[$name]['name'])) {
				return false;
			}
			$file = $_FILES[$name];
			$override['test_form'] = false;
			$override['action'] = 'wp_handle_upload'; 
			$uploadedFile = wp_handle_upload($file, $override);

			if (isset($uploadedFile['url'])) {
				/**
				 * add file to media center
				 */
				$wpUploadDir = wp_upload_dir();
				$attachment = array(
					'guid' => $wpUploadDir['url'] . '/' . basename( $uploadedFile['file'] ),
					'post_mime_type' => $uploadedFile['type'],
					'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $uploadedFile['file'] ) ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);
				$attachId = wp_insert_attachment( $attachment, $uploadedFile['file'], $menuId);
				require_once( ABSPATH . 'wp-admin/includes/image.php' );
				$attachData = wp_generate_attachment_metadata( $attachId, $uploadedFile['file'] );
				wp_update_attachment_metadata( $attachId, $attachData );
				return $uploadedFile['url'];
			} else {
				return false;
			}			
		}

	}

}