<?php
namespace Controller\Traits;
trait ArrayOperate{
	public static function array_combine_plus($brr, $arr):array{
		if(empty($brr) || empty($arr)){
			throw new \Exception("Error no value list or value", 702);
		}
		$arrnum = count($arr);
		$brr = array_slice($brr,0,$arrnum);
		$c =array_combine($brr,$arr);
		return $c;
	}

	 public static function array_unset(array $unarr,...$names):array{
		foreach ($unarr as $unkey) {
			foreach ($names as $nkey => $nvalue) {
				if($unkey == $nvalue){				
					unset($unarr[array_search($unkey,$unarr)]);					
				}

			}
		}
		return $unarr;
	}

}