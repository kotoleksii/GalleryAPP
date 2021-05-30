<?php
ob_start();
define('ROOT', __DIR__);
define('DB_USERS', ROOT . '/db/users.json');
define('STORAGE', ROOT . '/storage/');

$title="MyStat";

include_once('../tools/dd.php');
include_once(ROOT . '/services/auth_service.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <link rel="icon" href="./assets/favicon.ico" type="image/ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
    <link rel="manifest" href="./assets/site.webmanifest">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="./styles/bootstrap.min.css">   -->
    <link rel="stylesheet" href="./styles/loader.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/photo.css">
    <link rel="stylesheet" href="./styles/input.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<body>

    <header class="header">
            <nav class="navbar">
                <a href="." class="nav-logo">MyStat</a>
                <ul class="nav-menu">
                <?php
                    if(!isLogin() && (getUrl()==='http://pv912.loc/03hwphp/index.php?page=load' ||
                        getUrl()==='http://pv912.loc/03hwphp/index.php?page=gallery')):
                            header("Location: index.php?page=login"); die;

                    elseif(!isLogin()):
                ?>
                    <li class="nav-item">
                        <a href="index.php?page=registration" class="nav-link">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=login" class="nav-link">Login</a>
                    </li>
                <?php
                   elseif(isLogin()):
                ?>
                    <li class="nav-item">
                        <a href="index.php?page=load" class="nav-link">Load Images</a>
                    </li>                
                    <li class="nav-item">
                        <a href="index.php?page=gallery" class="nav-link">Gallery</a>
                    </li>
                <?php 
                    endif; 
                ?> 
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
    </header>
   
<div class="mask">
        <div class="preloader"></div>
</div>

<?php
    if(isset($_GET['page'])) {
        $page = $_GET['page'];

        switch($page) {
            case 'registration':
                include_once(ROOT . '/pages/registration.php');
                break;
            case 'login':
                include_once(ROOT . '/pages/login.php');
                break;
            case 'load':
                include_once(ROOT . '/pages/load.php');
                break;
            case 'gallery':
                include_once(ROOT . '/pages/gallery.php');
                break;
        }
    }
?>

<!-- <script src="./js/bootstrap.bundle.min.js"></script> -->
<script src="./js/navbar.js"></script>
<script src="./js/loader.js"></script>
<script src="./js/loadimage.btn.js"></script>

<div class="copyright">© 2021 Kot Oleksii HomeWork PHP №3 - All rights reserved</div>

</body>
</html>
<?php ob_end_flush(); ?>