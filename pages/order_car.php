<?php





?>
<div class="container">


    <div class="card shadow-lg my-5">
        
        <div class="card-body">
            <h3 class="card-title">Megrendelés előkészítése</h3>
            <form action="/index.php?page=order_success" method="post">
                <label for="order_name" class="form-label">Megrendelő teljes neve</label>
                <input type="text" name="order_name" id="order_name" class="form-control" required minlength="5" placeholder="Megrendelő teljes neve" >

                <label for="order_driver_license" class="form-label">Megrendelő jogosítvány száma</label>
                <input type="text" name="order_driver_license" id="order_driver_license" required minlength="9" required class="form-control" placeholder="Megrendelő jogosítvány száma" >

                <label for="order_payment" class="form-label">Fizetési metódus</label>
                <select class="form-select" aria-label="Default select example" name="order_payment" id="order_payment">
                    <option value="1">Készpénz</option>
                    <option value="2">Átutalás</option>
                    <option value="3">Részlet Fizetés</option>
                </select>

                <label for="order_color" class="form-label">Festés színe</label>
                <select class="form-select" aria-label="Default select example" name="order_color" id="order_color">
                    <option value="1">Fehér</option>
                    <option value="2">Fekete</option>
                    <option value="3">Ferrari piros</option>
                    <option value="4">Tűrkíz kék</option>
                    <option value="5">Metál arany</option>
                </select>


                <input type="hidden" value="<?php echo $_GET["car_id"]; ?>" name="car_id" id="car_id" />

                <button type="submit" class="btn btn-primary w-100 my-4">Megrendelés</button>
            </form>

        </div>
        
        <div class="card-footer text-center">
                <p>A megrendelés után a szerver feldolgozza a kérelmet és ki kalkulálja az elkészítési időt. 
                    Az elkészítési időt követő munkanapon az autóját átveheti szalonunkban. Vegye figyelembe, 
                    hogy a hitelügyintézés hosszabb időt is igénybe vehet.</p>
        </div>
    </div>
</div>