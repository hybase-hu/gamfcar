<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamf Car</title>
    <link href="resource/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="resource/css/main.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="resource/img/site/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </head>
<body>
<?php


require_once "controllers/car_controller.php";
require_once "controllers/order_controller.php";
require_once "controllers/login_controller.php";
require_once "controllers/opinion_controller.php";
require_once "controllers/contact_controller.php";
require_once "controllers/list_message_controller.php";
require_once "classes/page_contents.php";
require_once "classes/req.php";

PageContents::ShowNavbar();
PageContents::ShowCarusel();
?>

<div class="container">
    <script>
        function changePageTitle( title){
            document.title = "Gamf Car | " + title;
        }
    </script>

    <?php
        $page = Req::GetPage();
        switch($page) {
            case "car_details":
                /*
                A /controllers mappában lévő controller osztályok
                megfelelő statikus függvényei kezelik, hogy mely
                php fájlt kell meghívni, esetleg előkészítik a php
                fájl számára az adatbázisból kinyert adatokat.
                */
                CarController::GetCarDetails($_GET["car_id"]);
                echo '<script>changePageTitle("Autó megtekintése");</script>';
                break;
            
            case "order":
                OrderController::GetOrderPageForm();
                echo '<script>changePageTitle("Megrendelés véglegesítése");</script>';
                break;
            case "order_success":
                OrderController::GetOrderSuccess();
                echo '<script>changePageTitle("Sikeres rendelés");</script>';
                break;
            case "order_details":
                OrderController::GetOrderDetails();
                echo '<script>changePageTitle("Megrendelés részletei");</script>';
                break;
            case "contact":
                ContactController::GetPage();
                echo '<script>changePageTitle("Autó megtekintése");</script>';
                break;
            case "login":
                LoginController::Login();
                echo '<script>changePageTitle("Bejelentkezés");</script>';
                break;
            case "logout":
                LoginController::Logout();
                echo '<script>changePageTitle("Kijelentkezés");</script>';
                break;
            case "register":
                LoginController::Register();
                echo '<script>changePageTitle("Regisztráció");</script>';
                break;
            case "opinions":
                OpinionController::GetOpinionPage();
                echo '<script>changePageTitle("Vélemények");</script>';
                break;
            case "list_message":
                MessageController::ListMessage();
                echo '<script>changePageTitle("Üzenet küldések");</script>';
                break;
            default:
                CarController::ListCars();
                echo '<script>changePageTitle("Főmenü");</script>';
        }
        
    ?>
</div>




<?php

PageContents::ShowFooter();
?>


</body>

</html>
