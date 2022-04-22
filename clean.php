<?php

    define ('VERIONS', '3.0.1');
    define ('APP_PATH', __DIR__); 
    define ('APP_URL', rtrim (dirname ($_SERVER['SCRIPT_NAME']), DIRECTORY_SEPARATOR));
    define ('PLUGIN', APP_PATH . '/Plugin');
    define ('Logs', APP_PATH . '/Logs');
    require_once APP_PATH.'/config.php';

    if($_ENV['clean']){
    	echo "清理正在进行中..\n";
    	print_r(glob(Logs.'/*.txt'));
		array_map('unlink', glob(Logs.'/*.txt'));
		echo "清理完毕\n";
    }
    