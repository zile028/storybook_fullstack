<?php

class Upload
{
    public $file_error = [];
    public $stored_name;

    public function __construct($file, $allow_size, $allow_type)
    {
        $this->file = $file;
        $this->allow_type = $allow_type;
        $this->allow_size = $allow_size;
        $this->file_name = $file["name"];
        $this->file_tmp = $file["tmp_name"];
        $this->file_size = $file["size"];
        $this->file_type = strtolower(pathinfo($this->file_name, PATHINFO_EXTENSION));
    }

    public function validate()
    {
        if ($this->file_size > $this->allow_size) {
            $this->file_error["size"] = "Image file is to big, allowed size is 3MB";
        }
        if (!in_array($this->file_type, $this->allow_type)) {
            $this->file_error["type"] = "Image type is not allowed, allowed type is " . implode(",", $this->allow_type);
        }
        if (count($this->file_error) === 0) {
            return true;
        }
        return false;
    }

    public function uploadFile()
    {
        $this->stored_name = time() . "." . $this->file_type;
        return move_uploaded_file($this->file_tmp, UPLOAD_PATH . $this->stored_name);
    }

}