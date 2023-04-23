<?php

require_once "./utils/get_rating_stars.php";

class OpinionView {

    public static function GetAllOpinions($opinions) {
        foreach ($opinions as $opinion) {
            echo '
            <div class="card m-2 shadow-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4"><img class="listcard_img" src="/resource/img/opinions_img/'.$opinion->img_url.'" alt="car_image" /></div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-lg-4"><b>'.$opinion->username.'</b></div>
                                <div class="col-lg-4">'.Rating::ShowRatingStars($opinion->rating).'</div>
                                <div class="col-lg-4">'.$opinion->created_at.'</div>
                            </div>
                            <div class="row"><div class="col-lg-12">'.$opinion->message.'</div></div>
                        </div><!-- col-lg-8 -->
                    </div><!-- row-->
                </div><!-- card-body -->
            </div><!-- card -->
            ';
        }
    }

}

?>