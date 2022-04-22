<?php
namespace Controller;
use Controller\Traits\Logger;
class ParseMessage{
	use Logger;
    public function ParseMessage(&$data,&$func){
    	$data = file_get_contents("php://input");
    	$this->WriteLogs($data);
        $data = json_decode ($data, true);

        if (isset($data['message'])){           
            if (isset($data['message']['text'])) {

                if (strstr($data['message']['text'], '/')){
                    $func = 'command';
                    return;
                } else {
                    $func = 'message';
                    return;
                }
                
            } else if (isset($data['message']['new_chat_member'])) {
                $func = 'new_member';
                return;
            } else if (isset($data['message']['left_chat_member'])) {
                $func = 'left_member';
                return;
            } else if (isset($data['message']['sticker'])) {
                $func = 'sticker';
                return;
            } else if (isset($data['message']['photo'])) {
                $func = 'photo';
                return;
            } else if (isset($data['message']['document'])) {
                $func = 'document';
                return;
            }
        }else if (isset($data['callback_query'])) {
            if (isset($data['callback_query']['data'])) {
                $func = 'callback_query';
                return;
            } else if (isset($data['callback_query']['game_short_name'])) {
                $func = 'callback_game';
                return;
            }
        }else if (isset($data['inline_query'])) {
            $func = 'inline_query';
            return;
        }else{
            throw new \Exception("Telegram server pass a new method which cant be parsed.", 201);
        }  
       
          
    }
}