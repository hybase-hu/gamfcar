<?php
class UserModel {
    var $id;
    var $username;
    var $password;
    var $full_name;

    function __construct($id,$username,$password,$full_name) {
        $this->id=$id;
        $this->username = $username;
        $this->password=$password;
        $this->full_name=$full_name;
    }

}

?>