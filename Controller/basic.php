<?php
namespace Controller;
class basic extends Controller{

	public static function easysend($message){
		global $chat_id;
		global $user_id;
		$finalid = $chat_id?$chat_id:$user_id;
		self::sendMessage($finalid,$message,"Markdown");
	}

	public static function easyaction(){
		global $chat_id;
		global $user_id;
		$finalid = $chat_id?$chat_id:$user_id;
		self::sendChatAction($finalid,"typing");
	}

	public static function easyp($photoid,$caption = null){
		global $chat_id;
		self::sendPhoto($user_id,$photoid,"Markdown",$caption);
	}

	public static function mibutton(...$vnames){

		$rmarr = ["text","callback_data","url"];
		$rmarr = self::array_combine_plus($rmarr,$vnames);
		return $rmarr;
	}

	public static function mikbd($button){
		return json_encode(["inline_keyboard" => $button]);
	}

	public static function mrkbd($button){
		return json_encode(["keyboard" => $button,"one_time_keyboard"=>true,"selective" => true]);
	}

	public static function mbutton(...$vnames){
		$rmarr = ["text"];
		$rmarr = self::array_combine_plus($rmarr,$vnames);
		return $rmarr;
	}	


}