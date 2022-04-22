<?php
    use \Controller\Controller;
    use \Controller\CheckWebHook;
    use \Controller\ParseMessage;
    use \Controller\GetCommand;
    use \Controller\basic;

    define ('VERIONS', '3.0.2');
    define ('APP_PATH', __DIR__); 
    define ('APP_URL', rtrim (dirname ($_SERVER['SCRIPT_NAME']), DIRECTORY_SEPARATOR));
    define ('CONTROLLER', APP_PATH . '/Controller');
    define ('TRAIT', APP_PATH . '/Controller/Traits');
    define ('PLUGIN', APP_PATH . '/Plugin');
    define ('Logs', APP_PATH . '/Logs');
    define ('CONSTS', APP_PATH . '/Constants');
    

    $autoload_plus = function ($class){
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $path = APP_PATH .'/'.$path.'.php';
        if(file_exists($path)){
            require_once($path);
        }else{
            throw new Exception("Cant find the file $path which defined by class $class\n", 101);
        }
    };

    try{
        spl_autoload_register($autoload_plus);
        include APP_PATH.'/config.php';

        if(!CheckWebHook::CheckWebHook() && $_ENV["checkwebhook"]){
            throw new \Exception("Not Telegram Servers!\n", 103);
            die();
        }

        $PC = new ParseMessage();
        $PC->ParseMessage($update,$funcs);
        require_once CONSTS."/EasyVar.php";

        Controller::SetBotToken($_ENV["bottoken"]);

        $redis = new Redis();
        $redis->connect($_ENV["redis_host"], $_ENV["redis_port"]);  
             
        if(($cm = $redis->get($user_id))){
            goto plugins;
        }else if($funcs =='command'||$funcs =='callback_query'){
            $cm = GetCommand::gc($text,$funcs);
            goto plugins;
        }else if($funcs =='document'){
            goto files;
        }   
        
        plugins:
        if(file_exists(PLUGIN.'/'.$cm.'.php')){
            require_once PLUGIN.'/'.$cm.'.php';
        }else{
            basic::easysend($cm."命令不存在，耗子尾汁。");
        }
        goto ends;

        files:
        $file_id = $update['message']['document']['file_id'];
        basic::easysend($file_id);
        goto ends;

        ends:
        $redis->close();

    }catch (Exception $e){
        echo $e->getMessage();
        if($_ENV["debug"]){
            file_put_contents(Logs."/errors.txt", $e->getMessage().$e->getCode(),FILE_APPEND);
        }
    }
