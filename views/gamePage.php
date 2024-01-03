<?php
require_once "../models/Game.php";
require_once "../models/Question.php";

session_start();

if (isset($_SESSION['game'])) {
    $game = $_SESSION['game'];
    $q = $game->getQuestion();
    $answers = $q->getAnswers();
} else {
    echo 'nope';
    // session_destroy();
    // header("../views/error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Въпрос
        <?php echo $game->questionNumber(); ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../styles/game-page.css" />
</head>

<body>
    <div>
        <?php echo $q->getQuestionLabel() ?>
    </div>
    <div class="answers">
        <label>
            <input name="<?php echo $game->questionNumber(); ?>" value="<?php echo $answers[0] ?>" type="radio">
            <?php echo $answers[0] ?>
        </label>
        <label>
            <input name="<?php echo $game->questionNumber(); ?>" value="<?php echo $answers[1] ?>" type="radio">
            <?php echo $answers[1] ?>
        </label>
        <label>
            <input name="<?php echo $game->questionNumber(); ?>" value="<?php echo $answers[2] ?>" type="radio">
            <?php echo $answers[2] ?>
        </label>
        <label>
            <input name="<?php echo $game->questionNumber(); ?>" value="<?php echo $answers[3] ?>" type="radio">
            <?php echo $answers[3] ?>
        </label>

        <button id="next">Следващ</button>
    </div>

    <script src="../scripts/game-page.js"></script>
    <script>
        var nextBtn = document.getElementById('next');

        nextBtn.addEventListener('click', function () {
            nextQuestionHandeler();
        });
    </script>
</body>

</html>