<?php
    require_once("connect_db.php");
?>
<html>
    <head>
    <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,500,400,600' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/strock-icon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <header class="row header navbar-static-top" id="main_navbar">
            <div class="container">
                <div class="row m0 social-info">
                    <ul class="social-icon">
                    </ul>
                </div>
            </div>
           <div class="logo_part">
                <div class="logo">
                    <a href="index.php" class="brand_logo">
                        <?php 
                        $sql="SELECT * FROM main";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        ?>
                        <img src="<?php echo $result['icon']; ?>" alt="logo image">
                    </a>
                </div>
            </div>
            <div class="main-menu">
                <nav class="navbar navbar-default">
                    <div class="menu row m0">                
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Головна</a>
                                </li>
                                <li class="dropdown">
                                    <a href="catalog.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Каталог</a>
                                </li>
                                <li class="dropdown">
                                    <a href="new_products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Новинки</a>
                                </li>
                                 <li class="dropdown">
                                    <a href="help.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Допомога</a>
                                </li>
                                <li class="dropdown">
                                    <a <?php if(empty($_SESSION['user'])){ echo 'href="log_in.php"';} else if(!empty($_SESSION['user']) and $_SESSION['user']['login']!='admin'){echo 'href="profile_user.php"';} ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Профіль</a>
                                    <?php 
                                        if(!empty($_SESSION['user']) and $_SESSION['user']['login']=='admin'){ 
                                            echo '<ul class="dropdown-menu"><li><a href="main_admin.php">Налаштування</a></li><li><a href="categories_admin.php">Категорії</a></li><li><a href="message_admin.php">Повідомлення</a></li></ul> ';
                                        } else if(!empty($_SESSION['user']) and $_SESSION['user']['login']!='admin') {
                                            echo '<ul class="dropdown-menu"><li><a href="favorites.php">Вподобання</a></li><li><a href="my_product.php">Мої вироби</a></li><li><a href="settings_user.php">Налаштування</a></li></ul>';
                                        } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </body>
</html>