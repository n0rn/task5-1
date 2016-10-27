	<?php require_once 'functions.php';

	if (empty($_REQUEST['a1']) || empty($_REQUEST['a2']) || empty($_REQUEST['a3'])) {
		header('Location: index.php?err=1', true, 303);
	}

	$count = 0;
	$a[] = filter_var($_REQUEST['a1'], FILTER_SANITIZE_STRING);
	$a[] = filter_var($_REQUEST['a2'], FILTER_SANITIZE_STRING);
	$a[] = filter_var($_REQUEST['a3'], FILTER_SANITIZE_STRING);
	$right_ans[] = $_REQUEST['ans1'];
	$right_ans[] = $_REQUEST['ans2'];
	$right_ans[] = $_REQUEST['ans3'];
	$questions[] = $_REQUEST['q1'];
	$questions[] = $_REQUEST['q2'];
	$questions[] = $_REQUEST['q3'];


	for ($i = 0; $i < 3; $i++) {
		if ($a[$i] == $right_ans[$i]) {
			$count++;
		}
	}


	?>

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
			<h1>Результат теста "Знание html тегов"</h1>
			<a href="index.php">На главную</a></br></br>
			<div class="info alert alert-info">
				Правильных ответов: <?=$count;?>.
				Неправильных ответов: <?=3-$count;?>.
			</div>
			<?php printAnswers($questions, $right_ans, $a); ?>
			<div class="info alert alert-info">
				<br>
			</div>

		</div>
	</body>
</html>


			