<?php
namespace AutoUploadWithGit\exceptions;

class ConnectionException extends \Exception{

    const INPUT_EMPTY           = 101;
    const CONNECT_FAILED        = 102;
    const LOGIN_FAILED          = 103;

    public static $Messages     = [
        self::INPUT_EMPTY       => 'Input is empty.',
        self::CONNECT_FAILED    => 'Connetion failed.',
        self::LOGIN_FAILED      => 'Login failed.',
    ];

    public function __construct($code = '', $message = ''){
        if($message != ''){
            $message = sprint('%s - message: %s', self::$Messages[$code], $message);
        }else{
            $message = self::$Messages[$code];
        }
        parent::__construct($message, $code);
    }

}