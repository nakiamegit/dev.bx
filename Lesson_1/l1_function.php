<?php
function ReadFromConsole() {
	$data = trim(fgets(STDIN));
	if(is_numeric($data)){
		$data = +$data;
	} elseif ($data == NULL){
		echo 'Спасибо за внимание!';
	} else {
		echo 'Ведён не верный формат! ';
	}
	return $data;
}

