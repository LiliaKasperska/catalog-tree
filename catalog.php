<!--- каталог товарів --->
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
                <div class="row">
                    <div class="col-sm-3">
                        <form method="POST" action="catalog.php">
                            <div style="border: 1px solid #c89551; border-radius: 30px;">
                                <h3 style="color: #d3c2ae;" class="text-center"><b>Категорія</b></h3>
                                <?php 
                                    $sql="SELECT * FROM categories";
                                    $res=mysqli_query($connect,$sql);
                                    while($result=mysqli_fetch_array($res)){
                                        echo '<div class="row"><div class="col-sm-2"></div><div class="col-sm-8"><h4 style="color: #d3c2ae;"><input type="checkbox" name="c[]" value="'.$result['id'].'">'.$result['name'].'</h4></div><div class="col-sm-2"></div></div>';
                                    }
                                ?>
                            </div>
                            <div style="height: 10px;"></div>
                            <div style="border: 1px solid #c89551; border-radius: 30px;">
                                <h3 style="color: #d3c2ae;" class="text-center"><b>Матеріал</b></h3>
                                <?php 
                                    $sql="SELECT * FROM materials";
                                    $res=mysqli_query($connect,$sql);
                                    while($result=mysqli_fetch_array($res)){
                                        echo '<div class="row"><div class="col-sm-2"></div><div class="col-sm-8"><h4 style="color: #d3c2ae;"><input type="checkbox" name="m[]" value="'.$result['id'].'">'.$result['name'].'</h4></div><div class="col-sm-2"></div></div>';
                                    }
                                ?>
                            </div>
                            <div style="height: 10px;"></div>
                            <div style="border: 1px solid #c89551; border-radius: 30px;">
                                <h3 style="color: #d3c2ae;" class="text-center"><b>Колір</b></h3>
                                <?php 
                                    $sql="SELECT * FROM color";
                                    $res=mysqli_query($connect,$sql);
                                    while($result=mysqli_fetch_array($res)){
                                        echo '<div class="row"><div class="col-sm-2"></div><div class="col-sm-8"><h4 style="color: #d3c2ae;"><input type="checkbox" name="k[]" value="'.$result['id'].'">'.$result['name'].'</h4></div><div class="col-sm-2"></div></div>';
                                    }
                                ?>
                            </div>
                            <div style="height: 15px;"></div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <input type="submit" name="ok" value="Застосувати" style="border: 1px solid #c89551; border-radius: 30px; background-color: #d3c2ae; font-size: 20px;">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-sm-9">
                        <?php 
                            if(isset($_POST['ok'])){
                                $q=0;
                                $sql="SELECT * FROM products WHERE ";
                                if(!empty($_POST['c'])){
                                    $cat=$_POST['c'];
                                    $sql=$sql." ( ";
                                    $i=0;
                                    while($i<(count($cat)-1)){
                                        $sql=$sql."id_category='".$cat[$i]."' OR ";
                                        $i=$i+1;
                                    }
                                    $sql=$sql."id_category='".$cat[$i]."')";
                                    $q=1;
                                }
                                if(!empty($_POST['m'])){
                                    $mat=$_POST['m'];
                                    if($q==1){
                                        $sql=$sql." AND";
                                    } else {
                                        $q=1;
                                    }
                                    $sql=$sql." ( ";
                                    $i=0;
                                    while($i<(count($mat)-1)){
                                        $sql=$sql."id_material='".$mat[$i]."' OR ";
                                        $i=$i+1;
                                    }
                                    $sql=$sql."id_material='".$mat[$i]."')";
                                }
                                if(!empty($_POST['k'])){
                                    $col=$_POST['k'];
                                    if($q==1){
                                        $sql=$sql." AND";
                                    } else {
                                        $q=1;
                                    }
                                    $sql=$sql." ( ";
                                    $i=0;
                                    while($i<(count($col)-1)){
                                        $sql=$sql."id_color='".$col[$i]."' OR ";
                                        $i=$i+1;
                                    }
                                    $sql=$sql."id_color='".$col[$i]."')";
                                }
                                $res=mysqli_query($connect,$sql);
                                $r=[];
                                while($result=mysqli_fetch_array($res)){
                                    $r[]=$result;
                                }
                                $i=0;
                                while($i<count($r)){
                                    echo '<div class="row">';
                                    if($r[$i]){
                                        echo '<div class="col-sm-4"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="border-radius: 30px;"><img src="'.$r[$i]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i]['id'].'">'.$r[$i]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                                    }
                                    if(!empty($r[$i+1])){
                                        echo '<div class="col-sm-4"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+1]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+1]['id'].'">'.$r[$i+1]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                                    }
                                    if(!empty($r[$i+2])){
                                        echo '<div class="col-sm-4"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+2]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+2]['id'].'">'.$r[$i+2]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                                    }
                                    echo '</div>';
                                    $i=$i+3;
                                    }
                                } else {
                                    $sql="SELECT * FROM products";
                                    $res=mysqli_query($connect,$sql);
                                    $r=[];
                                    while($result=mysqli_fetch_array($res)){
                                        $r[]=$result;
                                    }
                                    $i=0;
                                    while($i<count($r)){
                                        echo '<div class="row">';
                                        if($r[$i]){
                                            echo '<div class="col-sm-4"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i]['id'].'">'.$r[$i]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                                        }
                                        if(!empty($r[$i+1])){
                                            echo '<div class="col-sm-4"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+1]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+1]['id'].'">'.$r[$i+1]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                                        }
                                        if(!empty($r[$i+2])){
                                            echo '<div class="col-sm-4"><div class="row"><div class="col-sm-1"></div><div class="col-sm-10" style="border: 2px solid #c89551; border-radius: 30px; height: 300px; "><div style="height: 20px;"></div><div style="background-color: wheat; height: 210px; border-radius: 30px;"><img src="'.$r[$i+2]['main_photo'].'" height="210px" width="100%" style="border-radius: 30px;"></div><div class="text-center" ><h3><a style="color: #d3c2ae;" href="product.php?q='.$r[$i+2]['id'].'">'.$r[$i+2]['name'].'</a></h3></div></div><div class="col-sm-1"></div></div></div>';
                                        }
                                        echo '</div>';
                                        $i=$i+3;
                                    }
                                }
                            ?>
                        <div style="height: 20px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </body>
</html>