<?php
namespace Controller;
 class CheckWebHook{
    public static function CheckWebHook():bool{
            $telegramWebhook = [
                '149.154.160.0/20',
                '91.108.4.0/22',
                '91.108.6.0/255'
            ];

            if(defined('WEBHOOK_CIDR') && is_array(WEBHOOK_CIDR)) {
                $telegramWebhook = array_merge($telegramWebhook, WEBHOOK_CIDR);
            }
            
            $clientIP = isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['REMOTE_ADDR'];

            foreach ($telegramWebhook as $cidr) {
                if(self::cidrMatch($clientIP, $cidr))
                    return true;
            }

            return false;
        }

    private static function cidrMatch($ip, $cidr):bool{
            list($subnet, $mask) = explode('/', $cidr);

            if ((ip2long($ip) & ~((1 << (32 - $mask)) - 1) ) == ip2long($subnet))
            {
                return true;
            }

            return false;
        }

 }
 