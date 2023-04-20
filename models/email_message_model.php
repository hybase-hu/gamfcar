<?php

class EmailMessageModel {
    var $username;
    var $message;
    var $contact;
    var $message_time;
    
    

    function __construct($username, $contact, $message) {
        $now = new DateTime('now', new DateTimeZone('Europe/Budapest'));
        $now_string = $now->format('Y/m/d H:i:s');
        $this->username = $username;
        $this->message = $message;
        $this->contact = $contact;
        
    }


}

?>