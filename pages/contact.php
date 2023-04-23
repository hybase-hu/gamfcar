<?php
require_once "./db/db.php";

$alert = null;
$success = null;
if (isset($_POST["send"])) {
    if (isset($_POST["contact"]) && isset($_POST["message"])) {
        if (strlen($_POST["contact"]) > 5 && strlen($_POST["message"]) > 10) {
            $connection = Db::GetInstance();
            $username = isset($_SESSION["username"]) ? $_SESSION["username"] : "Vendég";
           
            $contact = mysqli_real_escape_string($connection, $_POST["contact"]);
            $message = mysqli_real_escape_string($connection, $_POST["message"]);

            $sql = 'INSERT INTO email_message(username,contact,message) VALUES(
                "'.$username.'",
                "'.$contact.'",
                "'.$message.'"

            );';
            $success = "Üzenetét sikeresen elküldtük. Hamarosan felvesszük önnel a kapcsolatot";

            mysqli_query($connection,$sql);

            header("Location: /index.php?page=list_message");

            
        }
        else {
            $alert = "Valószínűleg túl kevés információt adott meg. Figyeljen rá kérem, hogy az elérhetőség és az üzenet is értelmezhető legyen.";
        }
    }
    else {
        $alert = "Kérjük, adjon meg minden adatot, hogy fel tudjuk venni önnel a kapcsolatot!";
    }
}

?>


<div class="container">
    <div class="card shadow-lg my-5">
        <div class="card-header">Elérhetőségeink / Kapcsolat</div>
        <div class="row">
            <div class="col-lg-7">
                <div class="card-body">
                    <?php if ($success) { echo '<div class="alert bg-success text-light">'.$success.'</div>';} ?>
                    <h3 class="card-title">Kapcsolat felvétel</h3>
                    <p class="text-muted" style="font-size:14px;letter-spacing:3px;">
                        Üzletünkkel az alább módokon veheti fel a kapcsolatot. Fontos megjegyeznünk, hogy levél küldés esetén a válasz idő maximum 1 munkanap.
                    </p>
                    <hr>
                    <p class="text-muted">Bármelyik módot is válassza, a Gamf Car csapata áll rendelkezésére</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="m-2" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                            </svg>
                            <a href="mailto:gamfcar@gmail.com" style="text-decoration:none;">Email: gamfcar@gmail.com</a>
                        </li>

                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="m-2" width="16" height="16" fill="currentColor" class="bi bi-telephone-inbound" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            Telefon: 06/70-123-45-67
                        </li>

                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="m-2" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>                 
                            Cím: Kecskemét, Izsáki út 10, 6400
                        </li>
                        
                    </ul>

                </div><!-- card body -->


                <div class="card-body m-2 bg-light">
                    <form class="form" method="post" action="">
                        <?php if ($alert) { echo '<div class="alert bg-warning">'.$alert.'</div>';} ?>
                        <label for="contact" class="form-label">Kérjük adja meg, hogy vehetjük fel önnel a kapcsolatot</label>
                        <input type="text" class="form-control" placeholder="Telefonszám vagy email cím megadása" name="contact" id="contact" />
                        <label for="message" class="form-label">Üzenet</label>
                        <textarea class="form-control" placeholder="Írja meg miben lehetünk segítségére!" rows="7" name="message" id="message"></textarea>
                        <button type="submit" name="send" class="btn btn-success my-2 w-100">Küldés</button>

                    </form>
                </div>
            </div><!-- col-lg-7 -->
            <div class="col-lg-5">
                <div class="card-body">
                    <div style="width: 100%">
                        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" 
                        marginwidth="0" src="https://maps.google.com/maps?width=400&amp;height=400&amp;hl=en&amp;q=kecskemt%C3%A9,%20gamf+(My%20Business%20Name)&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        <a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a></iframe></div>
                    </div>
                </div>
            </div><!-- col-lg5 -->


            <div class="card-footer text-center p-3">Köszönjük, hogy megtekintette elérhetőségeinket. Reméljük minél hamarabb felkeres minket.</div>
        </div><!--row-->
    </div>
</div>
<div class="container-fluid p-0">
    <div class="row submenu">
       
                    
        <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" height="400" width="100%" src="https://www.youtube.com/embed/KgYgmBMDzho" title="World&#39;s Craziest Car Dealership With Over $100 MILLION Worth of Cars!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="embed-responsive embed-responsive-1by1">
                <div class="embed-responsive embed-responsive-4by3">
			        <video height="400" width="100%" src="/resource/cars.mp4" type="video/mp4" controls />
                </div>
            </div>
        </div>                      
    </div>
</div>