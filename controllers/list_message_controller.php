<?php
require_once "./db/db.php";
require_once "./models/email_message_model.php";
class MessageController {
    public static function ListMessage() {
        $connection = Db::GetInstance();
        $sql = "SELECT * FROM email_message ORDER BY message_time DESC; ";

        $result = mysqli_query($connection,$sql);

        $messages = array();
        if (mysqli_num_rows($result) > 0 ) {
            while($row = mysqli_fetch_assoc($result)) {
                
                $msg = new EmailMessageModel(
                    $row["username"], $row["contact"], $row["message"]
                );
                $msg->message_time = $row["message_time"];
                array_push($messages,$msg);
            }
        }
        include_once "./pages/list_message.php";
    }
}
?>