<?php

class Db {
	private static $server_name = "localhost";
	private static $user_name = "epiz_34058633";
	private static $password = "FcUyrtSs4T";
	private static $db_name = "gamfcar";
	private static $connection = null;

    /*

    *** Egy fontos osztály, az itt szereplő kapcsolattal létre hoz egy adatbázis kapcsolatot (ha nem létezik már)
    *** és a statikus GetInstance() függvénye vissza adja ezt. Így biztosak lehetünk benne, hogy mindig csak egy
    *** adatbázis kapcsolatunk létezik a kód során.
    


	*** Tovább fejlesztésnél néhány SQL parancsot elkészíthetünk előre, ahol meg tudjuk adni a tábla
    *** nevét és a paramétereit (WHERE id = $id)

    *** Ennél a feladatnál a GetInstance() függvény elegendő


    public static function Query($sql,$params = []) {
        if (!self::$connection) {
            self::$connection = mysqli_connect(self::$servername,self::$username,self::$password);
            
        }
        return self::$connection;
    }


    public static function Select($table, $where=null) {
        $sql = "SELECT * FROM ".$table;
        if ($where) {$sql .= (" WHERE " . $where);}
        $query = self::Query($sql);
        return $query ->fetchAll();
    }
    */

    public static function GetInstance(){
        if (!self::$connection) {
            
            self::$connection = mysqli_connect(self::$server_name,self::$user_name,self::$password,self::$db_name);
            
        }

        return self::$connection;
    }

}

?>