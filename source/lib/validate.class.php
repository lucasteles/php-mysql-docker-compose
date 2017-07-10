<?php
class Validate
{
	public function isString($string, $sizeOf) {
		if(is_array($sizeOf)){
			
			if(is_string($string) AND (strlen($string)>=$sizeOf[0] AND strlen($string)<=$sizeOf[1])){
				return TRUE;
			}	else{
				return FALSE;
			}
		}	else{
			if(is_string($string) AND strlen($string)==$sizeOf){
				return TRUE;
			}	else{
				return FALSE;
			}
		}
	}



}
