<!--- акаунт адміна, зміна категорій--->
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
                <form method="POST" action="categories_admin.php">
                    <h2 style="color: #d3c2ae;">Категорія</h2>
                    <hr style="border-color: #c89551;" align="left" width="50%">
                    <h4><input type="text" name="new_c" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;">
                    <input type="submit" name="add_c" value="Додати" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"></h4>
                    <hr style="border-color: #d3c2ae;" align="left" width="30%">
                    <?php 
                        $sql="SELECT * FROM categories";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            echo '<h4 style="color: #d3c2ae;">'.$result['name'].'</h4><hr style="border-color: #d3c2ae;" align="left" width="30%">';
                        }
                    ?>
                    <div style="height: 50px;"></div>
                    <h2 style="color: #d3c2ae;">Матеріал</h2>
                    <hr style="border-color: #c89551;" align="left" width="50%">
                    <h4><input type="text" name="new_m" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;">
                    <input type="submit" name="add_m" value="Додати" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"></h4>
                    <hr style="border-color: #d3c2ae;" align="left" width="30%">
                    <?php 
                        $sql="SELECT * FROM materials";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            echo '<h4 style="color: #d3c2ae;">'.$result['name'].'</h4><hr style="border-color: #d3c2ae;" align="left" width="30%">';
                        }
                    ?>
                    <div style="height: 50px;"></div>
                    <h2 style="color: #d3c2ae;">Колір</h2>
                    <hr style="border-color: #c89551;" align="left" width="50%">
                    <h4><input type="text" name="new_k" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;">
                    <input type="submit" name="add_k" value="Додати" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"></h4>
                    <hr style="border-color: #d3c2ae;" align="left" width="30%">
                    <?php 
                        $sql="SELECT * FROM color";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            echo '<h4 style="color: #d3c2ae;">'.$result['name'].'</h4><hr style="border-color: #d3c2ae;" align="left" width="30%">';
                        }
                    ?>
                </form>
                <?php 
                    if(isset($_POST['add_c'])){
                        $name_c=$_POST['new_c'];
                        $sql4="INSERT INTO categories (name) VALUES ('$name_c')";
                        $res4=mysqli_query($connect,$sql4);
                    }
                    if(isset($_POST['add_m'])){
                        $name_m=$_POST['new_m'];
                        $sql4="INSERT INTO materials (name) VALUES ('$name_m')";
                        $res4=mysqli_query($connect,$sql4);
                    }
                    if(isset($_POST['add_k'])){
                        $name_k=$_POST['new_k'];
                        $sql4="INSERT INTO color (name) VALUES ('$name_k')";
                        $res4=mysqli_query($connect,$sql4);
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>