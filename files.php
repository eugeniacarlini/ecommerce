<?php
	define('BASE_PATH', dirname(__FILE__) );
	define('AVATARS_DIRECTORY', BASE_PATH . '/uploads/avatars/');

	function subirImagen($field, $directory, $filename = null)
	{
		if ($_FILES[$field]['error'] == UPLOAD_ERR_OK)
    {
      $tmp_name = $_FILES[$field]['tmp_name'];
      $name = $filename ?: $_FILES[$field]['name'];

      move_uploaded_file($tmp_name, $directory . $name);
    }
	}
?>
