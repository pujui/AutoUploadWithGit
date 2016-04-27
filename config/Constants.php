<?php
namespace AutoUploadWithGit\config;

define('CONFIG_PATH',       APP_ROOT_PATH . '/config');
define('CONTROLLER_PATH',   APP_ROOT_PATH . '/controllers');
define('LIB_PATH',          APP_ROOT_PATH . '/libraries');
define('EXCEPTION_PATH',    APP_ROOT_PATH . '/exceptions');

class Constants{

    const ROOT_PATH        = APP_ROOT_PATH;
    const CONFIG_PATH      = CONFIG_PATH;
    const CONTROLLER_PATH  = CONTROLLER_PATH;
    const LIB_PATH         = LIB_PATH;
    const EXCEPTION_PATH   = EXCEPTION_PATH;

    const GIT_ROOT_PATH    = 'D:\git\github\AutoUploadWithGit';

    const SFTP_ROOT_PATH   = 'prod';

    public function getConnectInfo(){
        return ;
    }
    
}