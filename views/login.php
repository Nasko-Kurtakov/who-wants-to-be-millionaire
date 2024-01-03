<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Вход</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../styles/login.css" />
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
            <button type="button" id="login">ВХОД</button>
            <div>Нямаш регистрация? <a href="./register.php">Направи от тук</a></div>
        </div>
    </form>
    <script src="../scripts/login.js"></script>
</body>

</html>