<!--- налаштування акаунту користувача --->
<?php 
    session_start();
    if (empty($_SESSION['user'])) {
        header('Location: index.php');
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
        <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <?php 
                    $id=$_SESSION['user']['id'];
                    $sql="SELECT * FROM users WHERE id='$id'";
                    $res=mysqli_query($connect,$sql);
                    $result=mysqli_fetch_array($res);
                ?>
                <form method="POST" action="settings_user.php">
                    <h3 style="color: #d3c2ae;">Ім'я: <input type="text" name="name" value="<?php echo $result['name']; ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Телефон: <input type="text" name="phone" value="<?php echo $result['phone']; ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Пошта: <input type="text" name="email" value="<?php echo $result['email']; ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3> 
                    <h3 style="color: #d3c2ae;">Адреса: <input type="text" name="address" value="<?php echo $result['address']; ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <input type="submit" name="save" value="Зберегти" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;">
                </form>
                <?php 
                    if(isset($_POST['save'])){
                        $n=$_POST['name'];
                        $p=$_POST['phone'];
                        $e=$_POST['email'];
                        $a=$_POST['address'];
                        $sql="UPDATE users SET name='$n', phone='$p', email='$e', address='$a' WHERE id='$id'";
                        $res=mysqli_query($connect,$sql);
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>