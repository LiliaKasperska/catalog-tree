<!--- продукт --->
<?php 
    session_start();
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
                <div class="row">
                    <?php 
                        $id=$_GET['q'];
                        $sql="SELECT products.name AS name, products.description AS description, categories.name AS categories, products.price AS price, products.height AS height, products.width AS width, products.length AS length, products.weight AS weight, materials.name AS materials, color.name AS color, products.main_photo AS main_photo, products.photos AS photos, users.name AS user FROM products INNER JOIN categories ON products.id_category = categories.id  INNER JOIN materials ON products.id_material = materials.id INNER JOIN color ON products.id_color = color.id INNER JOIN users ON products.id_user = users.id WHERE products.id='$id'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                    ?>
                    <div class="col-sm-5">
                        <img src="<?php echo $result['main_photo']; ?>" width="100%" style="border-radius: 40px;">
                    </div>
                    <div class="col-sm-7">
                        <h2 style="color: #d3c2ae;"><?php echo $result['name']; ?></h2><br>
                        <h4 style="color: #d3c2ae;">Категорія - <?php echo $result['categories']; ?></h4>
                        <h4 style="color: #d3c2ae;">Матеріал - <?php echo $result['materials']; ?></h4>
                        <h4 style="color: #d3c2ae;">Колір - <?php echo $result['color']; ?></h4>
                        <h4 style="color: #d3c2ae;">Висота - <?php echo $result['height']; ?></h4>
                        <h4 style="color: #d3c2ae;">Ширина - <?php echo $result['width']; ?></h4>
                        <h4 style="color: #d3c2ae;">Глубина - <?php echo $result['length']; ?></h4>
                        <h4 style="color: #d3c2ae;">Маса - <?php echo $result['weight']; ?></h4>
                        <h4 style="color: #d3c2ae;">Ціна - <?php echo $result['price']; ?></h4>
                        <h4 style="color: #d3c2ae;">Автор - <?php echo $result['user']; ?></h4>
                    </div>                    
                </div><br>
                <form method="GET" action="product.php">
                    <input type="submit" name="f" value="Вподобати" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 17px;"><br><br>
                    <input type="hidden" name="q" value="<?php echo $id; ?>">
                </form>
                <?php 
                if(isset($_GET['f'])){
                    $i=$_GET['q'];
                    if (!empty($_SESSION['user']) && $_SESSION['user']['login']!='admin') {
                        $id_user=$_SESSION['user']['id'];
                        $sq="SELECT favourites FROM users WHERE id='$id_user'";
                        $res=mysqli_query($connect,$sq);
                        $resul=mysqli_fetch_array($res);
                        $f=$resul['favourites'];
                        $ar=0;
                        for($j=0;$j<strlen($f);$j++){
                            if($f[$j]!="*" and $f[$j]==$id){
                                $ar=1;
                            }
                        }
                        if($ar==0){
                            $f=$f.$id."*";
                            $sql="UPDATE users SET favourites='$f' WHERE id='$id_user'";
                            $res=mysqli_query($connect,$sql);
                        }                       
                    }
                }
                ?> 
                <div style="color: #d3c2ae;">
                    <h3>Опис</h3>
                    <h4><?php echo $result['description']; ?></h4><br><br>
                    <?php
                        $ar_img=array();
                        $a=$result['photos'];
                        $q="";
                        for($i=0;$i<strlen($a);$i++){
                            if($a[$i]=="*"){
                                $ar_img[]=$q;
                                $q="";
                            } else {
                                $q=$q.$a[$i];
                            }
                        }
                        for($i=0;$i<count($ar_img);$i++){
                            $a=$ar_img[$i];
                            echo "<img src='$a' height='400px'><br><br>";
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>