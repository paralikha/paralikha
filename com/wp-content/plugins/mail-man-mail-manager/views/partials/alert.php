<div id="mail-man-alert" class="alert-gold" data-alert-type="<?php echo $type ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <div class="beat-wave one"></div>
    <div class="beat-wave two"></div>
    <div class="beat-wave three"></div>
    <div class="container-fluid">
        <div class="col-md-6">
            <img src="//placeimg.com/300/300" class="img-responsive">
        </div>
        <div class="col-md-6">
            <div class="text-left text-md-left">
                <h3 class="text-uppercase"><?php echo $title ?></h3>
                <?php echo nl2br($message) ?>
            </div>
        </div>
    </div>
</div>