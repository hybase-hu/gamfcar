<?php


?>
<div class="container">


<div class="card shadow-lg my-5">
    <h3 class="card-header text-center">Megrendelés visszaigazolása</h3>
    <div class="card-body">
        
        <div class="row m-2">
            <div class="col-lg-7 order_id">
                <?php echo '<p>'.$order_id.'</p>'; ?>
            </div>
            <div class="col-lg-5">
                <p><span class="badge bg-primary">Név:</span> <?php echo $order_details[1]; ?></p>
                <p><span class="badge bg-primary">Jogosítvány:</span> <?php echo $order_details[2]; ?></p>
                <p><span class="badge bg-primary">Autóját átveheti az alábbi időpontban:</span><br /><b> <?php echo $order_details[6]; ?></b></p>
                <p class="text-center">Kérjük, mentse le az 5 karakteres megrendelési azonosítóját. 
                    Ezzel rögtön be tudjuk önt azonosítani és az ügyintézés még gyorsabb lesz. 
                    Továbbá tájékoztatjuk, az átvételi időponttól számított 3 héten belül a megrendelt autóját értékesíthetjük.</p>
            </div>
        </div>

    </div>
    
    <div class="card-footer text-center ">
            <p>Köszönjük megrendelését. Amint átvette nálunk autóját a fent említett megérkezési idő után, 
                szeretnénk ha megosztaná véleményét üzletünkről egy autós képpel csatolva. 
                Ezt a menük -> Vélemények menüpont alatt tudja megtenni. Köszönjük!</p>
    </div>
</div>
</div>