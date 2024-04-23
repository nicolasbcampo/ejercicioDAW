<?php

	function Autoload($clase){
		$url=$clase.".php";
		require_once("$url");
	}
	spl_autoload_register('Autoload');

?>