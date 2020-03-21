<?php

session_start();
require 'connect.php';

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
            header('Location: index.php');
            exit();
    }
    if($_SESSION['type'] != 1){
        header('Location: index.php');
        exit();
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
            <h1>Witaj <?=$_SESSION['login'] ?></h1>
            <a href="logout.php">[ WYLOGUJ SIĘ ]</a>
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