<div class="card my-5 shadow-lg">
    <div class="card-header text-center">Beérkezett üzenetek</div>
    <div class="card-body">
        <div class="row bg-dark text-light p-3">
            <div class="col-md-2">Felhasználó</div>
            <div class="col-md-3">Kapcsolat</div>
            <div class="col-md-5">Üzenet</div>
            <div class="col-md-2">Küldés Ideje</div>
        </div>
        <?php
            foreach ($messages as $msg) {

                echo '<div class="row p-2">
                <div class="col-md-2"><b>'.$msg->username.'</b></div>
                <div class="col-md-3"><span class="badge bg-primary">'.$msg->contact.'</span></div>
                <div class="col-md-5">'.$msg->message.'</div>
                <div class="col-md-2"><p style="font-size:14px !important;font-style:italic;">'.$msg->message_time.'</p></div>
            </div><hr>';
            }
        ?>
    </div>
</div>