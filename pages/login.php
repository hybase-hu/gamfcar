<?php
$message = null;
if (isset($_POST["username"]) && isset($_POST["password"])){
    require_once "./db/db.php";
    $connection = Db::GetInstance();

    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $password_hash = hash("sha256",$password);
    $sql = 'SELECT * FROM users WHERE username = "'.$username.'" AND password = "'.$password_hash.'";';

    $result = mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) == 1) {
        if (session_status() == PHP_SESSION_NONE) {session_start();}


        $_SESSION["username"] = $username;
        $_SESSION["full_name"] = mysqli_fetch_row($result)[3];

        $_SESSION["loggedin"] = true;
        $_SESSION["expire"] = time() + (20 * 60);
        header("Location: /gamfcar/index.php");

    }
    else {
        $message = "Helytelen bejelentkezési adatok!";
    }

}


?>


<div class="container">
    <div class="card shadow-lg my-5 mx-auto" style="max-width:600px;">
        
        <img class="card-img-top" src="./resource/img/site/login.jpg">
        <div class="card-body">
            <?php if (isset($_GET["success"]) && $_GET["success"] = True) {
                echo '<div class="alert bg-success">Sikeres regisztráció. Kérem jelentkezzen be!</div>';

            }
            ?>
            <p class="text-muted text-center" style="font-size:14px;">Kérjük, jelentkezzen be az oldalra. Ha nincs még regisztrációja, kattintson a regisztráció gombra</p>
            <?php if ($message != null) { echo '<div class="alert alert-warning">'.$message.'</div>'; } ?>
            <form class="form" method="post" action="#">
                <label for="username" class="form-label">Felhasználónév</label>
                <input type="text" required class="form-control" name="username" id="username" placeholder="Felhasználónév" />

                <label for="password" class="form-label">Jelszó</label>
                <input type="password" required class="form-control" name="password" id="password" placeholder="Jelszó" />

                <button type="submit" class="btn btn-primary w-100 my-2">Bejelentkezés</button>
            </form>
            <p class="text-center"><a href="/gamfcar/index.php?page=register" class="" style="text-decoration:none;">Regisztráció</a></p>
        </div>
    </div>
</div>