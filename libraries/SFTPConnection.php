<?php
namespace AutoUploadWithGit\libraries;

use \AutoUploadWithGit\config\Constants;


set_include_path(Constants::LIB_PATH . '/phpseclib');
require_once 'Net/SSH2.php';
require_once 'Net/SFTP.php';
require_once 'Crypt/RSA.php';

require_once Constants::LIB_PATH . '/BaseConnection.php';
require_once Constants::EXCEPTION_PATH . '/ConnectionException.php';

use \AutoUploadWithGit\libraries\BaseConnection;
use \AutoUploadWithGit\exceptions\ConnectionException;

class SFTPConnection extends BaseConnection{

    public function __construct($config = []){
        parent::__construct(include Constants::CONFIG_PATH . '/SFTPConfig.php');
    }

    /**
     * set SFTP connect
     * @see \AutoUploadWithGit\libraries\BaseConnection::setConnection()
     */
    public function setConnection($target){
        $config = &$this->connects[$target];
        if(empty($config)){
            throw new ConnectionException(102);
        } else if(empty($config['connect'])){
            $key = new \Crypt_RSA();
            $key->setPassword('whatever');
            $key->loadKey(file_get_contents($config['pwd']));
            $config['connect'] = new \Net_SFTP($config['host'], $config['port']);
            $login = $config['connect']->login($config['user'], $key);
            if(!$login){
                throw new ConnectionException(103);
            }
        }
        $this->choiceConnect = &$config['connect'];
        return true;
    }

    /**
     * Upload to SFTP
     * @see \AutoUploadWithGit\libraries\BaseConnection::upload()
     */
    public function upload($local, $remote){
        $this->choiceConnect->chdir('/root');
        $local = sprintf('%s/%s', Constants::GIT_ROOT_PATH, $local);
        $remote = sprintf('%s/%s', Constants::SFTP_ROOT_PATH, $remote);
        $dirs = explode('/', $remote);
        $path = '';
        while($dir = array_shift($dirs)){
            if(empty($dirs)) break;
            $path = ($path == '')? $dir: sprintf('%s/%s', $path, $dir);
            if(!$this->choiceConnect->chdir($dir)){
                if(!$this->choiceConnect->mkdir($dir)){
                    return false;
                }else if(!$this->choiceConnect->chdir($dir)){
                    return false;
                }
            }
        }
        if($this->choiceConnect->put($dir, $local, NET_SFTP_LOCAL_FILE) === false){
            return false;
        }
        return true;
    }
}