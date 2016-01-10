<?php

class InvalidUniqueException extends Exception {

    public function __construct($message=null, $code=0, Exception $previous=null)
    {
        if($message == null)
            $message = "Invalid unique given at the initialization point!";
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message} ,$this->file ,$this->line \n";
    }

}