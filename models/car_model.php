<?php
	
class CarModel {
	var $car_id;
	var $car_brand;
	var $car_type;
	var $car_motor_type;
	var $car_motor_ccm;
	var $car_relase_date;
	var $car_main_image;
	var $car_hp;
	var $car_price;
	

	function __contstruct($id, $brand, $type, $motor_type, $motor_ccm, $release_date, $main_image, $hp, $price) {
		$this->car_id=$id;
		$this->car_brand = $brand;
		$this->car_type = $type;
		$this->car_motor_type = $motor_type;
		$this->car_motor_ccm = $motor_ccm;
		$this->car_release_date = $relase_date;
		$this->car_main_image = $main_image;
		$this->car_hp = $hp;
		$this->car_price = $price;
	}

}


?>