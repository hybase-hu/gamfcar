
<div class="container">

    
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg my-5">
                <?php $img = "/resource/img/cars/".$car_details->car_main_image; ?>
                <img src="<?php echo $img; ?>" class="card-img-top" alt="Car big photo" style="object-fit:cover;">
                <div class="card-body">
                    <h1><?php echo $car_details->car_brand . " " . $car_details->car_type; ?></h1>

                    <div class="row">
                        <div class="col-md-4">Motor típus: </div>
                        <div class="col-md-8"><b><?php echo $car_details->car_motor_type; ?></b></div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4">Motor hengertérfogat: </div>
                        <div class="col-md-8"><b><?php echo $car_details->car_motor_ccm; ?> ccm3</b></div>
                    </div>


                    
                    <div class="row">
                        <div class="col-md-4">Kiadás: </div>
                        <div class="col-md-8"><b><?php echo $car_details->car_release_date; ?> évi</b></div>
                    </div>


                    
                    <div class="row">
                        <div class="col-md-4">Teljesítmény: </div>
                        <div class="col-md-8"><b><?php echo $car_details->car_hp; ?></b> lóerő</div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4">Autó ára: </div>
                        <div class="col-md-8"><b><?php echo number_format($car_details->car_price); ?> FT</b></div>
                    </div>
                   
                    <a href="/index.php?page=order&car_id=<?php echo $car_details->car_id; ?>" class="btn btn-primary w-100 my-4">Megrendelés</a>



                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-lg my-5">
                <h5 class="card-header">Megrendelés</h5>
                <div class="card-body">
                    
                    <p>
                        Megrendelés regisztrál felhasználóknak lehetséges. A megrendelést követően kap egy azonosítót, amivel a gépjárművet átveheti a gyártási idő után az üzletünkben.
                        A gyártási időről a megrendelés után tájékoztatást kap. Köszönjük, hogy minket választott!
                    </p>
                    <a href="/index.php?page=order&car_id=<?php echo $car_details->car_id; ?>" class="btn btn-primary w-100 my-4">Megrendelés</a>
                </div>
            </div>
        </div>
    </div>



</div>


<div class="submenu">
    <div class="row">
        <div class="col-md-6 text-center p-4">
            Tekintse meg az üzletünk legjobb ajánlatatit és rendelje meg, hogy elkészíthessük önnek!<br>
            Autóink a maximális luxust hordozzák magunkban, mindegyik 10 év garanciával!
        </div>
        <div class="col-md-6 text-center p-4">
            Megrendelés csak és kizárólag regisztrált felhasználónak lehetséges. A regisztráció és megrendelés után kap egy megrendelési azonsítót, amellyel a megküldöd megrendelési idő után átveheti autóját!
        </div>
    </div>
</div>
