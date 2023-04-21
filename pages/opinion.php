<?php
require_once "./views/opinions_view.php";
require_once "./utils/get_rating_stars.php";


$message = null;

if (isset($_POST["submit"])){


    if ( isset($_POST["rating"]) && isset($_POST["opinion_message"]) && isset($_FILES["img"])) {
        if (is_numeric($_POST["rating"])) {
            if (strlen($_POST["opinion_message"]) > 5) {
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                   

                    require_once "./db/db.php";
                    $connection = Db::GetInstance();

                    
                    $usernmae = $_SESSION["username"];
                    
                    $rating = mysqli_real_escape_string($connection, $_POST["rating"]);
                    $opinion_message = mysqli_real_escape_string($connection, $_POST["opinion_message"]);

                    $allowed_types = array('image/jpeg', 'image/png');
                    $img = $_FILES["img"];
                    if ($img["error"] === UPLOAD_ERR_OK) {
                        $upload_dir = "./resource/img/opinions_img/";
                        $file_tmp = $img["tmp_name"];
                        $file_type = $img["type"];
                        
                        $file_name = substr(uniqid(),0,5) . $img["name"];

                        $upload_path = $upload_dir . $file_name;

                        if (in_array($file_type,$allowed_types)) {
                            move_uploaded_file($file_tmp,$upload_path);

                            $sql = 'INSERT INTO opinions(username, message, rating, img_url) VALUES (
                                "'.$usernmae.'" , 
                                "'.$opinion_message.'" , 
                                "'.$rating.'" , 
                                "'.$file_name.'" 
                            );';
                            mysqli_query($connection,$sql);

                            //POST FORM TÖRLÉSE
                            header("Location: /gamfcar/index.php?page=opinions");

                        }
                        else {
                            $message = "Nem engedélyezett fájltípus. Csak jpeg és png!";
                        }
                    }
                }
                else {
                    header("Location: /gamfcar/index.php?page=login");
                }

            }
            else {
                $message = "Túl rövid vélemény.";
                
            }
        }
        else {
            $message = "Valami nem stimmel az értékelés értékével!";
        }
    }
    else {
        $message = "Minden adat kitöltése kötelező";
    }
}

?>


<div class="card my-5 mx-2 bg-light shadow-lg">
    <div class="card-body">
        <?php if (!isset($_SESSION["loggedin"]) ) {
            echo '<p class="text-center text-muted" style="font-size:14px;">Véleményt csak regisztrált és bejelentkezett felhasználó írhat. 
            Úgy látjuk, nem jelentkezett be, kérjük ha véleményt szeretne írni, előbb tegye ezt meg! </p>';
        
        }
        ?>
        <form class="form" enctype="multipart/form-data" method="post">
            <?php if ($message) { echo '<div class="alert bg-warning" >'.$message.'</div>';} ?>
            <label for="rating" class="form-label">Értékelés</label>
            <select class="form-select" name="rating" id="rating">
                <option value="1">Egyáltalán nem nyújtott jó szolgáltatás</option>
                <option value="2">Átlagos szolgáltatás</option>
                <option value="3">Túrhető szolgáltatás</option>
                <option value="4">Remek szolgáltatás</option>
                <option value="5" selected>Kiváló szolgáltatás</option>
            </select>

            <label for="opinion_message" class="form-label">Az Ön véleménye</label>
            <textarea name="opinion_message" class="form-control" rows="8" id="opinion_message"></textarea>

            <label for="img" class="form-label">Képfeltöltés</label>
            <input type="file" name="img" id="img" class="form-control" />



            <button type="submit" name="submit" value="submit" class="btn btn-success w-100 my-2" >Mentés</button>
        </form>
    </div>
</div>
<?php OpinionView::GetAllOpinions($opinions); ?>
