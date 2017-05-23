<?php
$dev_config = [
    'host' => '10.188.16.20',
    'port' => 22,
    'user' => 'root',
    'pwd'  => 'D:\git\note\kiyu.octet-stream'
];
return [
    /**
     * example:
        'TEST' => [
            'host' => '127.0.0.1',
            'port' => 22,
            'user' => 'user',
            'pwd'  => 'pwd'
        ]
     */
    'TEST-g.kiyu.tw'        => $dev_config,
    'TEST-game.kiyu.tw'     => $dev_config,
    'TEST-paygame.kiyu.tw'  => $dev_config,
    'TEST-admin.kiyu.tw'    => $dev_config
];