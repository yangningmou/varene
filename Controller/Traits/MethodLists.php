<?php
namespace Controller\Traits;
trait MethodLists{
	public static $RepeateF = ["reply_to_message_id","disable_notification","protect_content","allow_sending_without_reply",];
	public static $RepeateS = ["caption","caption_entities","reply_markup"];
	public static $RepeateT = [];
	public static function GetVM():array{
			$VariableMethods = [
			"sendMessage" => array_merge(["chat_id","text","parse_mode","reply_markup","entities"],self::$RepeateF,["disable_web_page_preview"]),

			"forwardMessage" => ["chat_id","from_chat_id","message_id","disable_notification","protect_content"],

			"copyMessage" => array_merge(["chat_id","from_chat_id","message_id","parse_mode"],self::$RepeateS,self::$RepeateF),
			
			"sendPhoto"=>array_merge(["chat_id","photo","parse_mode"],self::$RepeateS,self::$RepeateF),
			"sendAudio"=> array_merge(["chat_id","audio"],self::$RepeateS,["parse_mode","duration","performer","title","thumb"],self::$RepeateF),
			"sendDice" => ["chat_id","emoji"],
			"sendDocument"=> array_merge(["chat_id","document"],self::$RepeateS,self::$RepeateF),
			"sendVoice"=> array_merge(["chat_id","voice"],self::$RepeateS,self::$RepeateF),
			"sendChatAction" => ["chat_id","action"],
			"getUserProfilePhotos" => ["user_id","offset","limit"],
			"getFile" => ["file_id"],
			
			];
			return $VariableMethods;
	}
	
}