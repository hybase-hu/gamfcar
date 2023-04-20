<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gamf Car</title>
    <link href="/gamfcar/resource/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/gamfcar/resource/css/main.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="/gamfcar/resource/img/site/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </head>
<body>
<?php


require_once "classes/page_contents.php";
require_once "classes/req.php";

require_once "controllers/car_controller.php";

PageContents::ShowNavbar();
PageContents::ShowCarusel();
?>

<div class="container">
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
        default:
            CarController::ListCars();
            echo '<script>changePageTitle("Főmenü");</script>';
</div>




<?php

PageContents::ShowFooter();
?>


</body>

</html>
