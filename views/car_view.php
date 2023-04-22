<?php
require_once "./db/db.php";
class CarView {

    /*
    A /views mappában szereplő "View" osztályok a megjelenítést segítik elő
    Ez nem az egész html rész, viszont például a controllerben adatbázisból létrehozott queryből
    létre hozunk egy array-t, amiben a /models/ könyvtárban lévő CarModel osztály példányai vannak.
    Így ha a html "card" kinézetén kell változtatni, egy helyen elég ezt megtenni. Így ez a ShowCarList
    igazából ha szükséges, máshol is újra felhasználható

    Vegyük például azt a helyzetet, mikor nem minden autót akarunk kilistázni, csak bizonyos típusokat.
    A controller osztályban finomítjuk az SQL lekérdezést és már csak egy szűkebb array list-et kapunk, viszont
    a megjelenítendő kód ugyanaz.


    */

    public static function ShowCarList($cars) {
        echo '<div class="row">';
        foreach ($cars as $car) {
            echo '
            <div class="col-md-4 p-2">
                <div class="card shadow-lg" >
                    <img src="/resource/img/cars/'.$car->car_main_image.'" class="card-img-top" alt="'.$car->car_brand.'" style="height:20rem;object-fit:cover;">
                    <div class="card-body">
                        <h3 class="card-title">'.$car->car_brand.'</h3>
                        <h5 class="card-title">'.$car->car_type. " - " . $car->car_release_date . '</h5>
                        <a href="/index.php?page=car_details&car_id='.$car->car_id.'" class="btn btn-primary">Megtekintés</a>
                    </div>
                </div>
            </div>';
        }
        echo '</div>';
    }


    public static function ShowCarDetails($id) {
        $connection = Db::GetInstance();
        $sql = "SELECT * FROM cars WHERE car_id=" . $id;
        
        $result = mysqli_query($connection,$sql);
        
        $car_row = mysqli_fetch_row($result);

        /*
        *** Fontos rész. Ha nincs találat az adatbázisban, vissza
        *** irányítjuk az index oldalra. E nélkül adatbázis hiba történne.
        *** Illetve include-olhatnánk egy szép 404-es oldalt is, de ez mellett döntöttünk.

        */
        if ($car_row == null) {
            header("Location: /");
        }

        $car_details = new CarModel();

        $sql = "SELECT * FROM motor_type WHERE motor_type_id = ".$car_row[3].";";
        $motor_type = mysqli_query($connection,$sql);
        $motor_type_string = mysqli_fetch_row($motor_type);

        $car_details->car_id = $car_row[0];
        $car_details->car_brand = $car_row[1];
        $car_details->car_type = $car_row[2];
        $car_details->car_motor_type = $motor_type_string[1];
        $car_details->car_motor_ccm = $car_row[4];
        $car_details->car_release_date = $car_row[5];
        $car_details->car_main_image = $car_row[6];
        $car_details->car_hp = $car_row[7];
        $car_details->car_price = $car_row[8];
        include "./car_details.php";
    }
}


?>