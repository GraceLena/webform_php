<?php

function openFile() {
	$f = fopen("userData.txt", "w+");
	if ($f === false) {
		echo "Unable to open file userData.txt";
		exit(0);
	}
	return $f;	
}

function printData() {
	$formFields = ["fn", "sn1", "sn2", "sex", "ed", "doc", "n_doc", "tel", "mail", "comment"];
	$sex = ['female'=>'женский', 'male'=>'мужской'];
	$ed = ['нет (дети до 7 лет)', 'школьник', 'неполное среднее', 'полное среднее', 'неоконченное высшее', 'высшее'];
	$params = '';

	$userData = file("userData.txt");
	if ($userData === false)	{
		echo "Unable to read file userData.txt";
		exit(0);
	} else {
		foreach($userData as $key => $value) {
			$listItem = explode(':', trim( $value ));
			if ($listItem[0] === 'ed') {
				$params = $params.$listItem[0].'='.$ed[$listItem[1] - 1].'&';
			} else $params = $params.$listItem[0].'='.$listItem[1].'&';
		}
		return $params;
	}
}

function writeData() {
	$formFields = ["fn", "sn1", "sn2", "sex", "ed", "doc", "n_doc", "tel", "mail", "comment"];
	$f = openFile();
	foreach($formFields as $value) {
		fwrite($f, $value.":".$_POST[$value]."\n");
	}
	fclose($f);
}

function formActionPath() {
	$formFields = ["fn", "sn1", "sn2", "sex", "ed", "doc", "n_doc", "tel", "mail", "comment"];
	$pathFlag = 'card.php';
	foreach ($formFields as $value) {
		if(empty($_POST[$value])) {
			$pathFlag = '';
			break;
		}
	}
	echo $pathFlag;
}

function fillField (string $property = '') {
	
	if($_POST[$property]) {
		echo  htmlentities($_POST[$property]);
	}
	if($_POST[$property] === '') {
		echo "";
	}
}

function fillPlaceholder (string $property = '') {
	
	if($_POST[$property] === '') {
		echo "Не заполнено";
	}
}

function fillSelect (string $value = '') {
	if($_POST['ed'] === $value) {
		echo "selected";
	}
}

function setBlankClass(string $property = '') {
	if( $_POST[$property] === '') {
		echo "blank-field";
	}
}

function setClass(string $elementClass1 = '', string $elementClass2 = '') {
	echo ($_SESSION['loggedin']) ? $elementClass1 : $elementClass2;
}
?>