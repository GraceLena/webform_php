<?php
	header("Content-Type: image/png");
	$fontArial = dirname(__FILE__) . '/fonts/arial.ttf';
	$fontRoboto = dirname(__FILE__) . '/fonts/alegreya-v12-cyrillic-regular.ttf';

	$im = imagecreatefromjpeg("img/img2.jpg");
	$bg = imagecreatetruecolor(900, 600);
	$bgColor = imagecolorallocatealpha($bg, 255, 255, 255, 30);
	imagefill($bg, 0, 0, $bgColor);

	$txtColor = imagecolorallocate($bg, 0, 0, 0);
	$rectColor = imagecolorallocate($bg, 0, 0, 0);
	imagerectangle($bg, 30, 30, 870, 570, $rectColor);
	imagerectangle($bg, 60, 60, 190, 230, $rectColor);
	imagefttext($bg, 16, 0, 100, 150, $txt_color, $fontArial, 'ФОТО');
	
	$sex = ['female'=>'женский', 'male'=>'мужской'];
	
	imagettftext($bg, 25, 0, 240, 90, $txtColor, $fontRoboto, $_GET['fn']);
	imagettftext($bg, 25, 0, 240, 130, $txt_color, $fontRoboto, $_GET['sn1']);
	imagettftext($bg, 25, 0, 240, 170, $txt_color, $fontRoboto, $_GET['sn2']);
	imagefttext($bg, 12, 0, 240, 210, $txt_color, $fontArial,'Пол: '. $sex[$_GET['sex']]);
	imagefttext($bg, 14, 0, 70, 270, $txt_color, $fontArial, 'Образование: '.$_GET['ed']);
	imagefttext($bg, 14, 0, 70, 310, $txt_color, $fontArial, 'Удостоверение личности:');
	imagefttext($bg, 12, 0, 70, 350, $txt_color, $fontArial, $_GET['doc']);
	imagefttext($bg, 12, 0, 350, 350, $txt_color, $fontArial, $_GET['n_doc']);
	imagefttext($bg, 14, 0, 70, 410, $txt_color, $fontArial, 'Дополнительная информация:');
	imagefttext($bg, 12, 0, 70, 450, $txt_color, $fontArial, $_GET['comment']);
	imagefttext($bg, 12, 0, 70, 500, $txt_color, $fontArial, 'Телефон: '.$_GET['tel']);
	imagefttext($bg, 12, 0, 350, 500, $txt_color, $fontArial, 'email: '.$_GET['mail']);

	imagecopy($im, $bg, 0, 0, 0, 0, 900, 600);
	imagepng($im,'card.png');
	imagepng($im);
	imagedestroy($im);
	imagedestroy($bg);
?>