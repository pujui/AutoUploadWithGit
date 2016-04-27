# AutoUploadWithGit

-------------------------------------------------------------------
    1.set PHP and Git environments
        1.1 - PHP
            Step 1. Set register_argc_argv varable is On, in a php.ini file

        1.2 - GIT
            Step1. You must to clone this repository
                - git clone git@github.com:pujui/AutoUploadWithGit.git
            Step2. In your AutoUploadWithGit Repository to find file name is a sftp
                - Set phpCGI varaible, example： phpCGI='C:/xampp/php/php-cgi.exe'
                - Set autoUploadWithGit varaible, example： autoUploadPath='D:/git/github/AutoUploadWithGit/action.php'
    
    2.set SFTP connection and tests
        step1.Open the config/SFTPConfig.php file and set
            -key : Set alias, value : Set remote
        
        step2.Open the config/Constants.php file and set
            -GIT_ROOT_PATH -  local git
            -SFTP_ROOT_PATH - remote
        
        step3.Create a git-sftp-[alias] file 
            -Copy a git-sftp-test, rename that to step1 alias
            -In the files, set arg_env variable with step1 alias
        
        step4.Do upload files to Remote for tests
            -In git command windows, input : git sftp-[alias] -p test-sftp
            -Check upload file in Remote
    
    3.Install AutoUploadWithGit to your use repository
        -Copy a git-sftp and a git-sftp-[alias] files in your use Repository

The most commonly used git-sftp command are:
-------------------------------------------------------------------
    [-help]             Lists available subcommands and some concept guides
    [-def]              Show default between commits, commit and working tree
    [-p file]           Upload file from working tree
    [<commit> <commit>] Upload file between commits, commit and working tree