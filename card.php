<?php
require_once(__DIR__.'/controller.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Карточка читателя</title>
</head>
<body>
<?php

writeData();
echo "<img src='drawCard.php?".substr(printData(), 0, -1)."'>";

?>
</body>
</html>