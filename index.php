<?php
session_start();
require_once(__DIR__.'/controller.php');
require_once(__DIR__.'/auth.php');
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Регистрация читателя</title>
		<link rel="stylesheet" href="styles/main.css">
	</head>
	<body>
		<div class="container">
			<form id="log-form" method="POST" action="">
				<div class="<?= setClass('hideForm'); ?>">
					<label>Логин:</label>
					<input type="text" name="user-log" class="user-log">
					<label>Пароль:</label>
					<input type="text" name="user-pwd" class="user-pwd">
				</div>
				<input type="submit" name="btn-log" id="btn-log" value="<?= setClass('logout', 'login'); ?>"><span class="<?= $auth ?>"><?= $authText ?></span>
			</form>
			<form id="reg-form" method="POST" action="<?= formActionPath(); ?>" class="<?= setClass('', 'hideForm'); ?>">
				<h1>Запись виртуального читателя</h1>
				<p>
					Для получения читательского билета Вам необходимо пройти регистрацию. После отправки заявки на Ваш e-mail будут высланы логин и пароль от Вашего личного кабинета.
				</p>
				<div class="user-name">
					<div class="user-name_labels">
						<label>Фамилия:</label>
						<label>Имя:</label>
						<label>Отчество:</label>
					</div>
					<div class="user-name_inputs">
						<input class="<?= setBlankClass('fn'); ?>" type="text" name="fn" value="<?= fillField('fn'); ?>" placeholder="<?= fillPlaceholder('fn'); ?>">  
						<input class="<?= setBlankClass('sn1'); ?>" type="text" name="sn1" value="<?= fillField('sn1'); ?>" placeholder="<?= fillPlaceholder('sn1'); ?>">
						<input class="<?= setBlankClass('sn2'); ?>" type="text" name="sn2" value="<?= fillField('sn2'); ?>" placeholder="<?= fillPlaceholder('sn2'); ?>">
					</div>
				</div>
				<div class="user-sex">
					<label>Пол:</label>
					<input id="female" type="radio" name="sex" value="female" <? if ($_POST['sex'] === 'female'): ?>checked="checked"<? endif ?> required>
					<label for="female">женский</label>
					<input id="male" type="radio" name="sex" value="male" <? if ($_POST['sex'] === 'male'): ?>checked="checked"<? endif ?> required>
					<label for="male">мужской</label>
				</div>

				<div>
					<label>Образование:</label>
					<select name="ed" required>
						<option value="1" <? fillSelect('1'); ?>>нет (дети до 7 лет)</option>
						<option value="2" <? fillSelect('2'); ?>>школьник</option>
						<option value="3" <? fillSelect('3'); ?>>неполное среднее</option>
						<option value="4" <?  fillSelect('4'); ?>>полное среднее</option>
						<option value="5" <? fillSelect('5'); ?>>неоконченное высшее</option>
						<option value="6" <? fillSelect('6'); ?>>высшее</option>
					</select>
				</div>

				<p>
					Для регистрации необходимо предоставить паспорт РФ, паспорт иностранного гражданина, или заменяющий его документ
				</p>
				<p>
					Обращаем Ваше внимание, что при оформлении электронного читательского билета в базу данных вносится набор сведений, необходимых для осуществления обслуживания. В том числе, паспортные данные, которые преобразовываются в неповторяемую контрольную сумму (для соблюдения Федерального закона РФ от 27.07.2006 № 152-ФЗ «О персональных данных»). Несовершеннолетние лица в возрасте до 14 лет записываются в Библиотеку в присутствии родителя или совершеннолетнего представителя, предъявившего документ, удостоверяющий его личность.
				</p>
				<div class="user-document">
					<label>Тип документа:</label>
					<input class="<? setBlankClass('doc'); ?>" type="text" name="doc" value="<? fillField('doc') ?>" placeholder="<?= fillPlaceholder('doc'); ?>">
					<label>Серия, номер:</label>
					<input class="<? setBlankClass('n_doc'); ?>" type="text" name="n_doc" value="<? fillField('n_doc'); ?>" placeholder="<?= fillPlaceholder('n_doc'); ?>">
					<div>
						<input id="user-document-confirmation" type="checkbox" name="reg" required>
						<label for="user-document-confirmation">
							подтверждаю наличие постоянной или временной регистрацию в Санкт-Петербурге или Ленинградской области
						</label>
					</div>
					
				</div>	
				<h4>Ваши контактные данные</h4>
				<div class="user-contacts">
					<div class="user-contacts_labels">
						<label>Телефон:</label>
						<label>Email:</label>
					</div>
					<div class="user-contacts_inputs">
						<input class="<? setBlankClass('tel'); ?>" type="text" name="tel" value="<? fillField('tel'); ?>" placeholder="<?= fillPlaceholder('tel'); ?>">
						<input class="<? setBlankClass('mail'); ?>" type="text" name="mail" value="<? fillField('mail'); ?>" placeholder="<?= fillPlaceholder('mail'); ?>">
					</div>
				</div>
				<div class="user-rules">					
					<input id="user-rules-confirmation" type="checkbox" name="rules" required>
					<label for="user-rules-confirmation">
						Я прочитал(а) и согласен(на) с Правилами пользования библиотекой
					</label>
				</div>
				<div class="comments">
					<div>Ваш комментарий (при необходимости):</div>
					<textarea class="<?= setBlankClass('doc'); ?>" name="comment"><? fillField('comment'); ?></textarea>
					<input type="submit">
				</div>
			</form>
		</div>
	</body>
</html>