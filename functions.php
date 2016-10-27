<?php

function db_connect() {
    $dsn = 'mysql:host=localhost; dbname=testQ';
    $user = 'root';
    $password = '';

        $db = new PDO($dsn, $user, $password);
        $db->exec('SET CHARACTER SET utf8');

    return $db;
}

function getRandomQuestions()
{
    $connection = db_connect();
    $numberOfQuestions = $connection->query('SELECT COUNT(*) FROM test')->fetchColumn();
    $questions = [];
    $statement = $connection->prepare('SELECT * FROM test WHERE id = ? LIMIT 1');

    for ($i = 1; $i <= 3; $i++) {
        $id = rand(1, $numberOfQuestions);
        $questions[] = $statement->execute([$id])->fetch(PDO::FETCH_OBJ);

        return $questions;
    }
}

function printQuestions($questions) {
    foreach ($questions as $key => $question) : ?>
        <div class="note">
            <p><b><?=$key+1?>.</b> <?=$question['question']?></p>
            <p><input name="a<?=$key+1?>" class="form-control" placeholder=""></p>
            <input type="hidden" name="q<?=$key+1?>" value="<?=$question['question']?>">
            <input type="hidden" name="ans<?=$key+1?>" value="<?=$question['answer']?>">
        </div>
    <?php endforeach;
}

function printAnswers ($questions, $right_answers, $answers) {
    foreach ($questions as $key => $question) : ?>
        <div class="note">
            <p><b><?=$key+1?>.</b> <?=$question?></p>
            <?php if ($right_answers[$key] == $answers[$key]) : ?>
                <p class="right">Верно!</p>
            <? else: ?>
                <p class="wrong">
                    Неверно!
                    <b>Ваш ответ:</b> <?=$answers[$key]?>.
                    <b>Правильный ответ:</b> <?=$right_answers[$key]?>.
                </p>
            <? endif; ?>
        </div>
    <? endforeach;
}