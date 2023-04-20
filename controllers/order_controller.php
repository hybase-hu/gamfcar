<?php
include_once "./db/db.php";
class OrderController {


    public static function GetOrderPageForm(){
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            include_once "./pages/order_car.php";
        }
        else {
            header("Location: /gamfcar/index.php?page=login");
        }
    }

    public static function GetOrderSuccess(){
        include_once "./pages/orders.php";
    }

    public static function GetOrderDetails(){
        $order_id = $_GET["order_id"];
        $connection = Db::GetInstance();
        $sql = 'SELECT * FROM orders WHERE order_id = "' . $order_id . '";';
        $result = mysqli_query($connection,$sql);
        $order_details = mysqli_fetch_row($result);
        include_once "./pages/order_details.php";
    }

}

?>