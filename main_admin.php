<!--- головна адміна, зміна основних налаштувань сайту --->
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
                <form method="POST" action="main_admin.php" enctype="multipart/form-data">
                    <h2 style="color: #d3c2ae;">Лого</h2>
                    <hr style="border-color: #c89551;" align="left" width="50%">
                    <h4><input type="file" name="logo" style="border: 1px solid #c89551; border-radius: 20px; background-color: #d3c2ae; color: black;">
                    <div style="height: 5px;"></div>
                    <input type="submit" name="save_logo" value="Змінити" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"></h4>
                    <div style="height: 50px;"></div>
                    <h2 style="color: #d3c2ae;">Тематичне зображення</h2>
                    <hr style="border-color: #c89551;" align="left" width="50%">
                    <h4><input type="file" name="img" style="border: 1px solid #c89551; border-radius: 20px; background-color: #d3c2ae; color: black;">
                    <div style="height: 5px;"></div>
                    <input type="submit" name="save_img" value="Змінити" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"></h4><br><br>
                    <input type="submit" name="exit" value="Вийти" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"><br>
                </form>
                <?php 
                    if(isset($_POST['exit'])){
                        session_destroy();
                    }
                    if(isset($_POST['save_logo'])){
                        $file = "./images/".$_FILES['logo']['name'];
                        $file1 = "images/".$_FILES['logo']['name'];
                        move_uploaded_file($_FILES['logo']['tmp_name'], $file);
                    $sql="UPDATE main SET icon='$file1' WHERE 1";
                    $res=mysqli_query($connect,$sql);
                    }
                    if(isset($_POST['save_img'])){
                        $file = "./images/".$_FILES['img']['name'];
                        $file1 = "images/".$_FILES['img']['name'];
                        move_uploaded_file($_FILES['img']['tmp_name'], $file);
                    $sql="UPDATE main SET fon='$file1' WHERE 1";
                    $res=mysqli_query($connect,$sql);
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>
