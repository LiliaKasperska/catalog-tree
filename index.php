<!--- головна --->

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
            <div class="col-sm-1"></div>
            <?php 
            $sql="SELECT * FROM main";
            $res=mysqli_query($connect,$sql);
            $result=mysqli_fetch_array($res);
            ?>
            <div class="col-sm-10"><img src="<?php echo $result['fon']; ?>" style="width: 100%; border-radius: 20px;"></div>
            <div class="col-sm-1"></div>
        </div>
        <div style="height: 50px;"></div>
        <div>
            <?php 
                $sql="SELECT * FROM categories";
                $res=mysqli_query($connect,$sql);
                $r=[];
                while($result=mysqli_fetch_array($res)){
                    $r[]=$result;
                }
                $i=0;
                while($i<count($r)){
                    echo '<div class="row"><div class="col-sm-1"></div><div class="col-sm-10"><div class="col-sm-2"></div><div style="border: 1px solid #c89551; border-radius: 40px;" class="col-sm-2 text-center"><h3 style="color: #d3c2ae;">'.$r[$i]['name'].'</h3></div><div class="col-sm-1"></div><div style="border: 1px solid #c89551; border-radius: 40px;" class="col-sm-2 text-center"><h3 style="color: #d3c2ae;">'.$r[$i+1]['name'].'</h3></div><div class="col-sm-1"></div><div style="border: 1px solid #c89551; border-radius: 40px;" class="col-sm-2 text-center"><h3 style="color: #d3c2ae;">'.$r[$i+2]['name'].'</h3></div><div class="col-sm-2"></div></div><div class="col-sm-1"></div></div>';
                    $i=$i+3;
                }
            ?>
            
        </div>
        <div style="height: 120px;"></div>
    </body>
</html>