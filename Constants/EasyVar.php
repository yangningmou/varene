<?php

//聊天形式
$chat_type = $update['message']['chat']['type'] ? $update['message']['chat']['type'] :$update['callback_query']['message']['chat']['type'];

//群组名称
$group_title = $update['message']['chat']['title'] ?: '';

//群组id
$group_username = $update['message']['chat']['username'] ?: '';

//若为群组，则为群组唯一ID，个人，个人唯一ID
$chat_id = $update['message']['chat']['id'] ? $update['message']['chat']['id'] :$update['callback_query']['message']['chat']['id'];

//消息ID
$message_id = $update['message']['message_id'] ? $update['message']['message_id'] :$update['callback_query']['message']['message_id'];

//转发ID
$reply_to_message = $update['message']['reply_to_message']['message_id'] ?: '';

//转发原文
$reply_text = $update['message']['reply_to_message']['text'] ?: '';

//语言标识
$language_code = $update['message']['from']['language_code'] ?: '';

//text文本消息
$text = $update['message']['text']?$update['message']['text']:$update['callback_query']['data'];

//用户唯一ID
$user_id = $update['message']['from']['id'] ? $update['message']['from']['id'] :$update['callback_query']['from']['id'];

//TG机器人
$tgbot = $update['message']['from']['is_bot'];

//用户昵称
$first_name = $update['message']['from']['first_name'] ?: '';

//用户名:群组里At其他人
$username = $update['message']['from']['username'] ? $update['message']['from']['username'] :$update['callback_query']['from']['username'];

//时间戳
$date = $update['message']['date'];
$fileid = $update['message']['document']['file_id'];
$filename = $update['message']['document']['file_name'];
