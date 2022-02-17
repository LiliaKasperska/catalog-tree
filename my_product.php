<!--- акаун користувача, продукти, створені користувачем --->
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
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h2 class="text-center" style="color: #d3c2ae;">Мої товари</h2>
                <h5 class="text-center" style="color: #d3c2ae;"><a href="create_product.php" style="color: #d3c2ae;">(Створити/редагувати)</a></h5>
                <div style="height: 20px;"></div>
                <?php 
                    $id_user=$_SESSION['user']['id'];
                    $sql="SELECT * FROM products WHERE id_user='$id_user'";
                    $res=mysqli_query($connect,$sql);
                    $r=[];
                    while($result=mysqli_fetch_array($res)){
                        $r[]=$result;
                    }
                    $i=0;
                    while($i<count($r)){
                        echo '<div class="row">';
                        if($r[$i]){
                            echo '<div class="col-sm-3"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i]['id'].'">'.$r[$i]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                        }
                        if(!empty($r[$i+1])){
                            echo '<div class="col-sm-3"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+1]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+1]['id'].'">'.$r[$i+1]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                        }
                        if(!empty($r[$i+2])){
                            echo '<div class="col-sm-3"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+2]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+2]['id'].'">'.$r[$i+2]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                        }
                        if(!empty($r[$i+3])){
                            echo '<div class="col-sm-3"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+3]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+3]['id'].'">'.$r[$i+3]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                        }
                        echo '</div>';
                        $i=$i+4;
                    }
                ?>
                <div style="height: 20px;"></div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </body>
</html>