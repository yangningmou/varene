<?php
namespace Controller;
use Controller\Traits\Handler;
class GetCommand{
	use Handler;

	public static function gc($text,$type){
		global $update;
		switch ($type) {
			case 'command':
				$orignml = substr($text,$update['message']['entities'][0]['offset'],$update['message']['entities'][0]['length']);
    			$rmingling = self::getml($orignml,"@")?self::getml($orignml,"@"):false;
    			$rmingling = $rmingling?$rmingling:$orignml;
    			return trim($rmingling,'/');
				break;
			case 'callback_query':
				$info = explode(" ",$text);
    			$rmingling = $info[0]?$info[0]:$text;
    			return $rmingling;
				break;
			default:
				return false;
				break;
		}

	}
}