<?php

class MyOut{

    private $buf;
    public $debug;

    function  __construct($debug = 0) {
        $this->debug = $debug;
        $this->buf = "";
    }

    function info($message){
        echo '[' . date('Y-m-d H:i:s') . '] - INFO - ' . $message . "\n";
        $this->buf .= '[' . date('Y-m-d H:i:s') . '] - INFO - ' . $message . "\n";
    }

    function append($message){
        echo $message . "\n";
        $this->buf .= $message . "\n";
    }

    function error($message){
        echo '[' . date('Y-m-d H:i:s') . '] - ERROR - ' . $message . "\n";
        $this->buf .= '[' . date('Y-m-d H:i:s') . '] - ERROR - ' . $message . "\n";
    }

    function warn($message){
        echo '[' . date('Y-m-d H:i:s') . '] - WARN - ' . $message . "\n";
        $this->buf .= '[' . date('Y-m-d H:i:s') . '] - WARN - ' . $message . "\n";
    }

    function debug($message){
        if($this->debug){
            echo '[' . date('Y-m-d H:i:s') . '] - DEBUG - ' . $message . "\n";
            $this->buf .= '[' . date('Y-m-d H:i:s') . '] - DEBUG - ' . $message . "\n";
        }
    }

    function getBuf(){
        return $this->buf;
    }

    function cleanBuf(){
        $this->buf = "";
    }

    function getDebug(){
        return $this->debug;
    }
}

?>
