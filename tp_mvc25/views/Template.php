<?php

class Template {
    protected $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function replace($pattern, $replacement) {
        $this->file = str_replace($pattern, $replacement, $this->file);
    }

    public function write() {
        echo $this->file;
    }
}
