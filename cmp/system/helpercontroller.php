<?php
class HelperController
{
	function __construct()
	{

	}

	function getUrlParameter($input)
	{
		$url = "";
		foreach($input as $key => $value){
			$url .= "&".$key."=".urlencode($value);
		}

		return $url;
	}
}
?>