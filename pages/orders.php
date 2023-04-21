<?php 

require_once "./db/db.php";

if (
        isset($_POST["car_id"]) && 
        isset($_POST["order_name"]) && 
        isset($_POST["order_driver_license"]) &&
        isset($_POST["order_color"]) &&
        isset($_POST["order_payment"])
    )
    {
        $connect = Db::GetInstance();

        //mivel felhasználói bevitelről van szó, így muszáj használni a "kilépő" karakterek eltávolítása függvényt
        //az SQL injection támadások ellen
        $order_car_id = mysqli_real_escape_string($connect, $_POST["car_id"]);
        $order_name = mysqli_real_escape_string($connect,$_POST["order_name"]);
        $order_driver_license = mysqli_real_escape_string($connect,$_POST["order_driver_license"]);
        $order_color = mysqli_real_escape_string($connect,$_POST["order_color"]);
        $order_payment = mysqli_real_escape_string($connect,$_POST["order_payment"]);
        $order_id = substr(strtolower(uniqid()),-5); //random uuid generálás, kisbetűs, utolsó 5 karaktere. Kb 13 karakter de az eleje ugyanaz, így az utolsó 5 karaktert tartjuk meg.
        

        //a mai dátumhoz hozzá add 29 napot, az lesz a rendelés "elkészítésének" ideje
        $order_finish_date = date('Y/m/d');
        $order_finish_calc_date = date('Y/m/d',strtotime($order_finish_date . '+ 29 days'));


        

        if (
            $order_car_id > 0 && 
            strlen($order_name) > 5 && 
            strlen($order_driver_license) > 9 && 
            $order_color > 0 && 
            $order_payment > 0) 
            {
                

                /*
                *
                *
                Le ellenőrizzük, hogy (bár post-al van írva, de azért az is mivel hidden mezőben van, átírható)
                a car_id egyáltalán létezik-e. Ha nem létezik, vissza irányítunk az index oldara, ha létezik, befejezzük a rendelést
                *
                *
                */

                $check = 'SELECT * FROM cars WHERE car_id = "'.$order_car_id.'"';
                $is_exist = mysqli_query($connect,$check);
                if (mysqli_num_rows($is_exist) == 0) {

                    header("Location: /gamfcar/");
                }
                else {


                    //print $order_id;
                    $sql = 'INSERT INTO orders (order_id , order_name, order_driver_license, order_payment, order_color, order_car_id, order_finish_date, user_name) VALUES(
                        "'.$order_id.'" , 
                        "'.$order_name.'" , 
                        "'.$order_driver_license.'" , 
                        "'.$order_payment.'" , 
                        "'.$order_color.'" , 
                        "'.$order_car_id.'",
                        "'.$order_finish_calc_date.'",
                        "'.$_SESSION["username"].'"
                    );';
                    //print $sql;
                    mysqli_query($connect,$sql);
                    header("Location: /gamfcar/index.php?page=order_details&order_id=".$order_id);
                }

                

                
                
        }
        else {
            throw new Exception("Hibás adatok");
        }
        
       
        
    }
    else {
        echo '<div class="alert alert-warning">Hiba történt a megrendelés visszaigazolása közben. Kérjük vegye fel a kapcsolatot velünk!</div>';
    }
    


?>