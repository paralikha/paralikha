<?php if( null == $_POST['epms_name'] ) die("Sorry, Cannot access this directly"); ?>
<div class="flex-container">
    <div class="image-splash flex-item-container">
        <img src="<?php echo $_POST['epms_splash'] ?>">
    </div>
    <div class="grid-detail flex-item-container">
        <div class="grid-detail-heading">
            <h1 class="title text-uppercase"><?php echo epms_get_full_name( $_POST['epms_name'], " ", (null!=$_POST['epms_title']?" ":"<br>"), (null!=$_POST['epms_title']?", ":"") ); ?></h1>
            <h3 class="title"><?php echo $_POST['epms_title'] ?></h3>
            <p class="subtitle text-uppercase"><?php echo $_POST['epms_job'] ?></p>
        </div>
        <p><?php echo $_POST['epms_description'] ?></p>
    </div>
</div>

<?php

function epms_get_full_name($name, $delimiter=" ", $insert_before_last="<br>", $insert_last="")
{
    $last = strrchr($name , $delimiter);

    if( !empty($last) ) $name = explode($delimiter, $name);

    if( $name > 1 )
    {
        array_pop($name);
        $name = implode($delimiter, $name);
    }
    return $name . $insert_before_last . $last . $insert_last;
}
 ?>