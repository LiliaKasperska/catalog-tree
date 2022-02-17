<!--- акаунт адміна, перегляд повідомлень від користувачів --->
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
                <h2 style="color: #d3c2ae;">Повідомлення</h2>
                <hr style="border-color: #c89551;" align="left" width="50%">
                <?php 
                    $sql="SELECT * FROM message";
                    $res=mysqli_query($connect,$sql);
                    while($result=mysqli_fetch_array($res)){
                        echo '<h4 style="color: #d3c2ae;">'.$result['email'].'</h4><p style="color: #d3c2ae;">'.$result['text'].'</p><hr style="border-color: #d3c2ae;" align="left" width="30%">';
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>