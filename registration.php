<!--- реєстрація користувача --->
<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile_user.php');
    }
?>
<html>
    <head>
        <title></title>
        <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,500,400,600' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/strock-icon.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div style="height: 150px;"> <?php require_once("header.php");?></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h2 class="text-center" style="color: #d3c2ae;">Реєстрація</h2>
                <div style="height: 25px;"></div>
                <form method="POST" action="registration.php">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6">
                            <h3 style="color: #d3c2ae;">Логін: <input type="text" name="login" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                            <h3 style="color: #d3c2ae;">Пароль: <input type="password" name="pass1" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                            <h3 style="color: #d3c2ae;">Повторіть пароль: <input type="password" name="pass2" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3> 
                            <h3 style="color: #d3c2ae;">Ім'я: <input type="text" name="name" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3> 
                            <h3 style="color: #d3c2ae;">Електрона адреса: <input type="text" name="email" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3> 
                            <h3 style="color: #d3c2ae;">Телефон: <input type="text" name="phone" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                            <h3 style="color: #d3c2ae;">Адреса: <input type="text" name="adresa" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3><br>
                            <input type="submit" name="reg" value="Зареєструватись" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"><br><br>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['reg'])){
                        $login=$_POST['login'];
                        $pass1=$_POST['pass1'];
                        $pass2=$_POST['pass2'];
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $phone=$_POST['phone'];
                        $adresa=$_POST['adresa'];
                        if($pass1==$pass2){
                            $sql="INSERT INTO users (login, password, name, phone, email, address, favourites) VALUES ('$login', '$pass1', '$name', '$phone', '$email', '$adresa', ' ')";
                            $res=mysqli_query($connect,$sql);
                            $sql="SELECT id FROM users WHERE login='$login'";
                            $res=mysqli_query($connect,$sql);
                            $result=mysqli_fetch_array($res);
                            $_SESSION['user'] = ['id' => $result['id'], 'login' => $login];
                        } else {
                            echo '<h3 style="color: #d3c2ae;">Паролі не співпадають!</h3>';
                        }
                    }
                ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </body>
</html>