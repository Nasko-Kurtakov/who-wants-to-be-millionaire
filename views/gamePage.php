<?php
require_once "../models/Game.php";
require_once "../models/Question.php";

session_start();

if (isset($_SESSION['game'])) {
    $game = $_SESSION['game'];
    $q = $game->getQuestion();
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
        <?php echo $game->currentQuestionNumber(); ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <div>
        <?php echo $q->getQuestionText() ?>
    </div>
    <?php $answers = $q->getAnswers();
    ; ?>
    <div class="answers">
        <label>
            <input name="<?php echo $game->currentQuestionNumber(); ?>" value="0" type="radio">
            <?php echo $answers[0] ?>
        </label>
        <label>
            <input name="<?php echo $game->currentQuestionNumber(); ?>" value="1" type="radio">
            <?php echo $answers[1] ?>
        </label>
        <label>
            <input name="<?php echo $game->currentQuestionNumber(); ?>" value="2" type="radio">
            <?php echo $answers[2] ?>
        </label>
        <label>
            <input name="<?php echo $game->currentQuestionNumber(); ?>" value="3" type="radio">
            <?php echo $answers[3] ?>
        </label>

        <button id="next">Следващ</button>
    </div>

    <script>
        var nextBtn = document.getElementById('next');
        var correct = <?php echo $q->getCorrectIndex(); ?>

        function nextQuestionHandeler(event) {
            var inputs = Array.from(document.getElementsByTagName("input"));

            var checked = inputs.find((el) => el.checked);

            const isCorrect = correct == checked.value;

            if (isCorrect) {
                console.log('it is correct');
                fetch('../controllers/nextController.php');
            } else {
                //
            }
        };

        nextBtn.addEventListener('click', nextQuestionHandeler);
    </script>
</body>

</html>