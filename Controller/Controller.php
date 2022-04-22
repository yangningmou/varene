<?php
namespace Controller;
use Controller\Traits\Send;
use Controller\Traits\ArrayOperate;
use Controller\Traits\MethodLists;

class Controller{
	use Send,ArrayOperate,MethodLists;
	private static $BotToken;
	private static $MethodList = ["getMe","getWebhookInfo","logOut","close"];

	public static function __callStatic(string $EMethod,array $values){
		if(in_array($EMethod, self::$MethodList) && empty($values)){
			return self::Tpost($EMethod);
		}else if(array_key_exists($EMethod, self::GetVM()) && !empty($values)){

			$FinalArray = self::array_combine_plus(self::GetVM()[$EMethod],$values);
			return self::Tpost($EMethod,$FinalArray);

		}else{
			throw new \Exception("Error function $EMethod dont exist.", 800);
		}
	}

	public static function SetBotToken($bottoken){
		self::$BotToken = $bottoken;
	}

}

