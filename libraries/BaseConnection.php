<?php
namespace AutoUploadWithGit\libraries;

use \AutoUploadWithGit\config\Constants;

require_once Constants::EXCEPTION_PATH . '/ConnectionException.php';

use \AutoUploadWithGit\exceptions\ConnectionException;


abstract class BaseConnection{

    protected $connects;

    protected $choiceConnect;

    public function __construct($config = []){
        $this->connects = $config;
    }

    final public function input()
    {
        $content = trim(file_get_contents('php://stdin'));
        if(empty($content))
        {
            throw new ConnectionException(ConnectionException::INPUT_EMPTY);
        }
        return explode(' ', $content);
    }

    public function output(){}

    public function setConnection($target){}

    public function getConnection(){}

    abstract public function upload($local, $remote);

    final public function getBasePath($path){
        if(preg_match('/^\/{1}/', $path)){
            return '/';
        } else if(preg_match('/^.{2}\//', $path)){
            return '';
        } else {
            return '';
        }
    }
    
    /**
     * 
     * @return string $result['SERVER'] server loaction
     * @return string $result['FILE'] file loaction
     */
    public function patternFileInfo($file)
    {
        $result = [
            'server'    => dirname($file),
            'filename'  => basename($file),
        ];
        return $result;
    }
}