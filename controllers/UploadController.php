<?php
namespace AutoUploadWithGit\controlers;

use \AutoUploadWithGit\config\Constants;

require Constants::LIB_PATH . '/SFTPConnection.php';
require_once Constants::EXCEPTION_PATH . '/ConnectionException.php';

use \AutoUploadWithGit\libraries\SFTPConnection;
use \AutoUploadWithGit\exceptions\ConnectionException;

class UploadController{

    public function __construct(){
        
    }

    /**
     * 
     * @param unknown $env[0] choice target
     */
    public function actionInputBySFTP($env = [], $project = '')
    {
        $connection = new SFTPConnection();

        $files = $connection->input();
        foreach ($files as $file){

            $r = $connection->setConnection($env);

            $fileInfo = $connection->patternFileInfo($file);

            $remote = str_replace('paygame.kiyu.tw', 'test.kiyu.tw', $project .'/' . $file);
            $r = $connection->upload($project .'/' . $file, $remote);
            if($r){
                echo $project .'/' . $file . ' - successed '. PHP_EOL;
            }else{
                echo $project .'/' . $file . ' - failed '. PHP_EOL;
            }
        }
    }

}