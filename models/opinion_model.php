<?php
class OpinionModel {
    var $username;
    var $crated_at;
    var $rating;
    var $message;
    var $id;
    var $img_url;


    function __contstruct($id, $img_url, $crated_at, $message, $rating, $username) {
        $this->id=$id;
        $this->created_at = $email;
        $this->rating=$rating;
        $this->messsage=$messsage;
        $this->img_url=$img_url;
        $this->username = $username;
    }

}

?>