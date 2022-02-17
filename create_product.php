<!--- продукт --->
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
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <form method="POST" action="create_product.php" enctype="multipart/form-data">
                <h4><select name="productList" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"> 
                    <option value="zero" selected>-</option>
                    <option value="create" <?php if(!empty($_POST['productList']) && $_POST['productList']=="create"){echo "selected";} ?>>Створити новий</option>
                    <?php 
                        $id=$_SESSION['user']['id'];
                        $sql="SELECT id, name FROM products WHERE id_user='$id'";
                        $res=mysqli_query($connect,$sql);
                        while($result=mysqli_fetch_array($res)){
                            $i=$result['id'];
                            echo '<option value="'.$i.'" ';
                            if(!empty($_POST['productList']) and $_POST['productList']=="$i"){
                                echo "selected";
                            }
                            echo '>'.$result['name'].'</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="select" value="Вибрати" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"></h4>
            </div>
            <div class="col-sm-2"></div>
        </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <?php 
                        if(isset($_POST['select'])){
                            $result=[];
                            if($_POST['productList']!="create" and $_POST['productList']!="zero"){
                                $id_p=$_POST['productList'];
                                $sql="SELECT * FROM products WHERE id='$id_p'";
                                $res=mysqli_query($connect,$sql);
                                $result_main=mysqli_fetch_array($res);
                            }
                        }
                    ?>
                    <hr style="border-color: #d3c2ae;" align="left" width="50%">
                    <h3 style="color: #d3c2ae;">Назва: <input type="text" name="name" value="<?php if(!empty($result_main)){echo $result_main['name'];} ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Опис: <input type="text" name="description" value="<?php if(!empty($result_main)){echo $result_main['description'];} ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Категорія:
                        <select name="c_list" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"> 
                            <?php 
                                $sql="SELECT * FROM categories";
                                $res=mysqli_query($connect,$sql);
                                while($result=mysqli_fetch_array($res)){
                                    echo '<option value="'.$result['id'].'"';
                                    if(!empty($result_main) and $result['id']==$result_main['id_category']){
                                        echo " selected";
                                    }
                                    echo '>'.$result['name'].'</option>';
                                }
                            ?>
                        </select>
                    </h3> 
                    <h3 style="color: #d3c2ae;">Ціна: <input type="text" name="price" value="<?php if(!empty($result_main)){echo $result_main['price'];} ?>"  style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3> 
                    <h3 style="color: #d3c2ae;">Висота: <input type="text" name="height" value="<?php if(!empty($result_main)){echo $result_main['height'];} ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3> 
                    <h3 style="color: #d3c2ae;">Ширина: <input type="text" name="width" value="<?php if(!empty($result_main)){echo $result_main['width'];} ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Глубина: <input type="text" name="length" value="<?php if(!empty($result_main)){echo $result_main['length'];} ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Маса: <input type="text" name="weight" value="<?php if(!empty($result_main)){echo $result_main['weight'];} ?>" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Матеріал:
                        <select name="m_list" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"> 
                            <?php 
                                $sql="SELECT * FROM materials";
                                $res=mysqli_query($connect,$sql);
                                while($result=mysqli_fetch_array($res)){
                                    echo '<option value="'.$result['id'].'"';
                                    if(!empty($result_main) and $result['id']==$result_main['id_material']){
                                        echo " selected";
                                    }
                                    echo '>'.$result['name'].'</option>';
                                }
                            ?>
                        </select>
                    </h3>
                    <h3 style="color: #d3c2ae;">Колір:
                        <select name="k_list" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; color: black;"> 
                            <?php 
                                $sql="SELECT * FROM color";
                                $res=mysqli_query($connect,$sql);
                                while($result=mysqli_fetch_array($res)){
                                    echo '<option value="'.$result['id'].'"';
                                    if(!empty($result_main) and $result['id']==$result_main['id_color']){
                                        echo " selected";
                                    }
                                    echo '>'.$result['name'].'</option>';
                                }
                            ?>
                        </select>
                    </h3>
                    <?php 
                        if(!empty($_POST['productList']) && $_POST['productList']!="create"){
                            echo '<input type="submit" name="save1" value="Зберегти" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"><br><br>';
                        }
                    ?>
                    <h3 style="color: #d3c2ae;">Фото (головне): <input type="file" name="foto" style="border: 1px solid #c89551; border-radius: 20px; background-color: #d3c2ae; color: black;"></h3>
                    <h3 style="color: #d3c2ae;">Фотографії: <input type="file" name="fotos[]" multiple="true" style="border: 1px solid #c89551; border-radius: 20px; background-color: #d3c2ae; color: black;"></h3><br>
                    <input type="submit" name="save2" value="Зберегти" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;"><br><br>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
        <?php 
            if($_POST['productList']=="create"){
                if(isset($_POST['save2'])){
                    $name=$_POST['name'];
                    $description=$_POST['description'];
                    $c_list=$_POST['c_list'];
                    $price=$_POST['price'];
                    $height=$_POST['height'];
                    $width=$_POST['width'];
                    $length=$_POST['length'];
                    $weight=$_POST['weight'];
                    $m_list=$_POST['m_list'];
                    $k_list=$_POST['k_list'];
                    $id_u=$_SESSION['user']['id'];
                    $file = "images/".$_FILES['foto']['name'];
                    $file1 = "images/".$_FILES['foto']['name'];
                    move_uploaded_file($_FILES['foto']['tmp_name'], $file);
                    $img="";
                    for($i=0;$i<count($_FILES['fotos']['name']);$i++){
                        $file0 = "images/".$_FILES['fotos']['name'][$i];
                        $file01 = "images/".$_FILES['fotos']['name'][$i];
                        move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $file0);
                        $img=$img.$file01."*";
                    }
                    $sql="INSERT INTO products (name, description, id_category, price, height, width, length, weight, id_material, id_color, main_photo, photos, id_user) VALUES ('$name', '$description', '$c_list', '$price', '$height', '$width', '$length', '$weight', '$m_list', '$k_list', '$file1', '$img', '$id_u') ";
                    $res=mysqli_query($connect,$sql);
                }
            } else {
                if(isset($_POST['save1'])){
                    $name=$_POST['name'];
                    $description=$_POST['description'];
                    $c_list=$_POST['c_list'];
                    $price=$_POST['price'];
                    $height=$_POST['height'];
                    $width=$_POST['width'];
                    $length=$_POST['length'];
                    $weight=$_POST['weight'];
                    $m_list=$_POST['m_list'];
                    $k_list=$_POST['k_list'];
                    $id=$_POST['productList'];
                    $sql="UPDATE products SET name='$name', description='$description', id_category='$c_list', price='$price', height='$height', width='$width', length='$length', weight='$weight', id_material='$m_list', id_color='$k_list' WHERE id='$id'";
                    $res=mysqli_query($connect,$sql);
                }
                if(isset($_POST['save2'])){
                    $id=$_POST['productList'];
                    $file = "images/".$_FILES['foto']['name'];
                    $file1 = "images/".$_FILES['foto']['name'];
                    move_uploaded_file($_FILES['foto']['tmp_name'], $file);
                    $img="";
                    for($i=0;$i<count($_FILES['fotos']['name']);$i++){
                        $file0 = "images/".$_FILES['fotos']['name'][$i];
                        $file01 = "images/".$_FILES['fotos']['name'][$i];
                        move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $file0);
                        $img=$img.$file01."*";
                    }
                    $sql="UPDATE products SET main_photo='$file1', photos='$img' WHERE id='$id' ";
                    $res=mysqli_query($connect,$sql);
                }
            }
        ?>
    </body>
</html>