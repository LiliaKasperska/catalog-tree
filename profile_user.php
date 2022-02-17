<!--- профіль користувача --->
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
        <div style="height: 120px;"> <?php require_once("header.php");?></div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <?php 
                    $id=$_SESSION['user']['id'];
                    $sql="SELECT * FROM users WHERE id='$id'";
                    $res=mysqli_query($connect,$sql);
                    $result=mysqli_fetch_array($res);
                ?>
                <form method="POST" action="profile_user.php">
                    <h2 style="color: #d3c2ae;"><?php echo $result['name']; ?></h2>
                    <hr style="border-color: #c89551;" align="left" width="50%">
                    <h4 style="color: #d3c2ae;">Телефон: <?php echo $result['phone']; ?> </h4>
                    <hr style="border-color: #d3c2ae;" align="left" width="30%">
                    <h4 style="color: #d3c2ae;">Пошта: <?php echo $result['email']; ?></h4>
                    <hr style="border-color: #d3c2ae;" align="left" width="30%">
                    <h4 style="color: #d3c2ae;">Адреса: <?php echo $result['address']; ?></h4>
                    <hr style="border-color: #d3c2ae;" align="left" width="30%">
                    <input type="submit" name="exit" value="Вийти" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"><br><br>
                </form>
                <?php 
                    if(isset($_POST['exit'])){
                        session_destroy();
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>