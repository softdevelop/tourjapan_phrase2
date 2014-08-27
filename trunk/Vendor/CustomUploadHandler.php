<?php

class CustomUploadHandler extends UploadHandler {
    /* Converts a filename into a randomized file name */
    private function _generateRandomFileName($name) {
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        return md5(uniqid(rand(), true)).'.'.$ext;
    }

    /* Overrides original functionality */
    protected function trim_file_name($file_path, $name, $size, $type, $error,
                                      $index, $content_range) {
        $name = parent::trim_file_name($file_path, $name, $size, $type, $error,
                                        $index, $content_range);
        return $this->_generateRandomFileName($name);
    }
}

?>