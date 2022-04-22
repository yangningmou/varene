<?php
namespace Controller\Traits;
trait Logger{
	public function WriteLogs(string $logs){
		global $_ENV;
		if($_ENV["debug"]){
			file_put_contents(Logs."/logs.txt", $logs,FILE_APPEND);
		}			
		
	}
}