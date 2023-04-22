<?php
$message = null;
if (isset($_POST["username"]) && 
    isset($_POST["password"]) && 
    isset($_POST["password2"]) && 
    isset($_POST["full_name"])
    )
    {
        
    if ($_POST["password"] != $_POST["password2"]) {
            $message = "A jelszavak nem egyeznek";
            
    }
    else {
        require_once "./db/db.php";
        $connection = Db::GetInstance();

        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        $password2 = mysqli_real_escape_string($connection, $_POST["password2"]);
        $full_name = mysqli_real_escape_string($connection, $_POST["full_name"]);
        $password_hash = hash("sha256",$password);
        $sql = 'SELECT * FROM users WHERE username = "'.$username.'";';

        $result = mysqli_query($connection,$sql);
        if (mysqli_num_rows($result) >0) {
            $message = "Ez a felhasználónév már foglalt, kérem válaszzon másikat!";
        }
        else{
            $sql = 'INSERT INTO users (username, password, full_name) VALUES("'.$username. '", "' .$password_hash. '", "'.$full_name. '" );';
            if (session_status() == PHP_SESSION_NONE) {session_start();}
            if (mysqli_query($connection,$sql)){
                
                header("Location: /index.php?page=login&&success=true");
            }
            else {
                $message = "Nem sikerült a regisztráció.";
            }
        }//nincs ilyen felhasználó
    }//jelszavak egyeznek

}


?>


<div class="container">
    <div class="card shadow-lg my-5 mx-auto" style="max-width:600px;">
        
        <img class="card-img-top" src="./resource/img/site/login.jpg">
        <div class="card-body">
            <p class="text-muted text-center" style="font-size:14px;">Kérjük, jelentkezzen be az oldalra. Ha nincs még regisztrációja, kattintson a regisztráció gombra</p>
            <?php if ($message != null) { echo '<div class="alert alert-warning">'.$message.'</div>'; } ?>
            <form class="form" method="post" action="#">
                <label for="username" class="form-label">Felhasználónév</label>
                <input type="text" required class="form-control" name="username" id="username" placeholder="Felhasználónév" />

                <label for="password" class="form-label">Jelszó</label>
                <input type="password" required class="form-control" name="password" id="password" placeholder="Jelszó" />

                <label for="password2" class="form-label">Jelszó mégegyszer</label>
                <input type="password" required class="form-control" name="password2" id="password2" placeholder="Jelszó" />

                <label for="full_name" class="form-label">Teljes név</label>
                <input type="text" required class="form-control" name="full_name" id="full_name" placeholder="Teljes név" />

                <button type="submit" class="btn btn-primary w-100 my-2">Regisztráció</button>
            </form>
            <p class="text-center"><a href="/gamfcar/index.php?page=login" class="" style="text-decoration:none;">Bejelentkezés</a></p>
        </div>
    </div>
</div>