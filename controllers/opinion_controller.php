<?php
require_once "./db/db.php";
require_once "./views/opinions_view.php";
require_once "./models/opinion_model.php";
class OpinionController {


    public static function GetOpinionPage() {
        $connection = Db::GetInstance();
        $sql = "SELECT * FROM opinions";
        $result = mysqli_query($connection,$sql);
        $opinions = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $opinion = new OpinionModel();
                $opinion->id = $row["id"];
                $opinion->created_at = $row["created_at"];
                $opinion->username=$row["username"];
                $opinion->message=$row["message"];
                $opinion->rating = $row["rating"];
                $opinion->img_url = $row["img_url"];
                array_push($opinions,$opinion);

            }
        }
        
        include_once "./pages/opinion.php";
        
        
    }

}


?>