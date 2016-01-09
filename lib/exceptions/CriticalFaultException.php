<?php

class CriticalFaultException extends Exception {

    public function __construct($message=null, $code=0, Exception $previous=null)
    {
        if($message == null)
            $message = "Critical fault detected";
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message} ,$this->file ,$this->line \n";
    }

}