<?php require_once 'functions.php';?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Тесты</title>
		<link rel="stylesheet" href="bootstrap3/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/admin.css">
	</head>
	<body>
		
		<div id="wrapper">
			<h1>Тест "Знание html тегов"</h1>
			<div class="info alert alert-info">
				Теги следует записывать без уголков.
			</div>
			<form action="check.php" method="POST">
				<?php printQuestions(getRandomQuestions());?>

				<p><input type="submit" class="btn btn-success btn-block" value="Проверить ответы"></p>
			</form>
			<?php if(filter_var($_REQUEST['err'], FILTER_SANITIZE_NUMBER_INT) == 1){
			echo '<h4>Ошибка ввода! Повторите ввод данных ещё раз.</h4>';
			}
			?>
		</div>

	</body>
</html>


			