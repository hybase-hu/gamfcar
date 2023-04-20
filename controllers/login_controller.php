<?php

class LoginController {

    /*
    EZ a controller osztály felelős a ki és be jelentkezések kezeléséért.
    A legfontosabb része, hogy a Logout() függvény megsemmísiti a sessiont, így
    a kódban bárhol hívjuk meg, biztosak lehetünk benne, hogy a sessiont nem feleltjük el
    lezárni.

    Tovább fejlesztett változatában készíthetünk "logokat" az adatbázisba, ki mikor jelentkezett
    be és ki

    */

    public static function Login() {
        include_once "./pages/login.php";
    }

    public static function Register() {
        include_once "./pages/register.php";
    }

    public static function Logout() {
        session_destroy();
        header("Location: /gamfcar/index.php");
    }

}

?>