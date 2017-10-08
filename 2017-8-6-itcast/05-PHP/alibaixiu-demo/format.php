<?php 
	$arr = array('name'=>'小明','age'=>16,'gender'=>'男');

	function insert ($arr){
		$keys = array_keys($arr);
		$values = array_values($arr);

		$sql = 'INSERT INTO users ('. implode(', ',$keys) . ')' .' VALUES("' . implode(', ',$values).'")';

		echo $sql;
	}

 ?>