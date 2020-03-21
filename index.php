<?php
session_start();
 
/*echo password_hash('komputer123', PASSWORD_BCRYPT);*/

require 'lib/password.php';

require 'connect.php';

if(isset($_POST['login'])){

    $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
    $passwordAttempt = !empty($_POST['pass']) ? trim($_POST['pass']) : null;

    $sql = "SELECT * FROM users WHERE login = :login";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':login', $login);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user === false){

        die('Login lub hasło jest nieprawidłowe');

    } else {

        $validPassword = password_verify($passwordAttempt, $user['pass']);

        if ($validPassword){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            if($user['type'] == 1){
                header('Location: studentMain.php');
                exit;
            }

            if($user['type'] == 2){
                header('Location: teacherMain.php');
                exit;
            }

            if($user['type'] == 3){
                header('Location: login.php');
                exit;
            }

        } else {

            die('Login lub hasło jest nieprawidłowe');
        }
    }

}
 
 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Patryk Sroczyński">
    <link rel="icon" type="img/png" href="./img/logo.png">
    <title>ZS3 - Platforma Edukacyjna</title>
    <link href="./css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>

    <header class="grid">

        <div class="topLeft">
            <img src="./img/logo.png" alt="logo">
        </div>
        <div class="topRight">
            <h1>Witaj na platformie edukacyjnej!</h1>
        </div>

    </header>

    <nav>

        <ul>
            <a href="index.php" target="_blank"><li>STRONA GŁÓWNA</li></a>
            <a href="info.php" target="_blank"><li>O APLIKACJI</li></a>
            <a href="teacherHelp.php" target="_blank"><li>INFORMACJE DLA NAUCZYCIELA</li></a>
            <a href="studentHelp.php" target="_blank"><li>INFORMACJE DLA UCZNIA</li></a>
            <a href="admin.php" target="_blank"><li>KONTAKT Z ADMINISTRATOREM</li></a>
        </ul>

    </nav>

    <hr>

    <main>

        <h2>ZALOGUJ SIĘ!</h2>

        <form action="index.php" method="post">

            Login: <br>
            <input type="text" name="login"><br>

            Hasło: <br>
            <input type="password" name="pass"><br>

            <input type="submit" name="register" value="ZALOGUJ SIĘ">

        </form>

    </main>

    <footer>

        <h3>Zespół Szkół nr 3 | ul. Alojzego Jankowskiego 2, Ruda Śląska 41-710</h3>
        <p>Wszelkie prawa zastrzeżone &copy | Autor: Sroka</p>
    
    </footer>

    
</body>
</html>