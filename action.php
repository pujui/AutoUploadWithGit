<?php
namespace AutoUploadWithGit\controlers;
// php.ini must to register_argc_argv=On

define('APP_ROOT_PATH', dirname(__FILE__));

require APP_ROOT_PATH . '/config/Constants.php';

use \AutoUploadWithGit\config\Constants;

//$argv = ['', 'upload', 'inputBySFTP'];

$appParams = &$argv;

$useClass = ucfirst($appParams[1]) . 'Controller';

$loadFile = CONTROLLER_PATH . "/{$useClass}.php";

if(!file_exists($loadFile)){
    die($loadFile.' not exist.');
}
require CONTROLLER_PATH . "/{$useClass}.php";

$useClass = '\AutoUploadWithGit\controlers\\' . $useClass;

try {

    $useController = new $useClass();
    
    $useAction = sprintf('action%s', ucfirst($appParams[2]));
    
    if(method_exists($useController, $useAction)){
        array_shift($appParams);
        array_shift($appParams);
        array_shift($appParams);
        call_user_func_array([$useController, $useAction], $appParams);
    }else{
        echo $useAction.' not exist.';
    }

}catch (\Exception $e){

    echo $e->getCode() . ':' . $e->getMessage();

}