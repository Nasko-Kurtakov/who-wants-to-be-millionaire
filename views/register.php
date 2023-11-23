<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Регистрация</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../styles/register.css" />
</head>

<body>
    <form>
        <div>
            <label for="email">E-mail</label>
            <input id="email" type="text" />
        </div>
        <div>
            <label for="pass">Парола</label>
            <input id="pass" type="password" />
        </div>
        <div>
            <button type="button" id="register">Регистрация</button>
            <div>Вече имаш регистрация? <a href="./login.php">Влез от тук</a></div>
        </div>
    </form>
    <script src="../scripts/register.js"></script>
</body>

</html>