<?php

require_once "./db/db.php";
require_once "./views/car_view.php";

require_once "./models/car_model.php";
class CarController {


    public static function ListCars(){
        $connection = Db::GetInstance();
        
        $cars = array();
        $sql = "SELECT * FROM cars";
        $result = mysqli_query($connection,$sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $car = new CarModel();
                $car->car_id = $row["car_id"];
                $car->car_brand = $row["car_brand"];
                $car->car_type = $row["car_type"];
                $car->car_motor_type = $row["car_motor_type"];
                $car->car_motor_ccm = $row["car_motor_ccm"];
                $car->car_release_date = $row["car_release_date"];
                $car->car_main_image = $row["car_main_image"];
                $car->car_hp = $row["car_hp"];
                $car->car_price = $row["car_price"];
                array_push($cars, $car);
                
            }

        }

        CarView::ShowCarList($cars);
    }


    public static function GetCarDetails($id) {
        CarView::ShowCarDetails($id);
    }
}


?>