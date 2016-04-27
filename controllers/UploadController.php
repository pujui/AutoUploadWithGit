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
    public function actionInputBySFTP($env = [])
    {
        $connection = new SFTPConnection();

        $files = $connection->input();
        foreach ($files as $file){

            $r = $connection->setConnection($env);

            $fileInfo = $connection->patternFileInfo($file);

            $connection->upload($file, $file);
        }
    }

}