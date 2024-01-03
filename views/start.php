<?php
require_once "../models/Game.php";
require_once "../models/Question.php";
require_once "../models/User.php";

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
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
    <title>Начало</title>
    <link rel="stylesheet" href="../styles/start.css" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
    <div>
        <form method="POST" action="../controllers/startController.php">
            <div>Здравей,
                <span class="user-name">
                    <?php echo $user->getEmail(); ?>
                </span>
                Готови ли сте да играем?
            </div>
            <div class="game-rules">
                <p>Правила на играта "Кой иска да стане милионер?":</p>
                <ol>
                    <li>Играта се състои от 10 въпроса, разделени на няколко нива на трудност.</li>
                    <li>Целта е да отговорите на всички въпроси правилно и да спечелите максималния залог.</li>
                    <li>Всеки въпрос има четири възможни отговора, от които само един е верен.</li>
                </ol>
            </div>
            <button type="submit">Да играем!</button>
        </form>
    </div>
</body>

</html>