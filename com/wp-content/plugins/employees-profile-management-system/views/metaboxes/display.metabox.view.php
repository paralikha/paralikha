<?php
    include EPMS_PLUGIN_VIEW . "partials/nonce.view.php"; ?>
<div class="epms">
    <p><strong>Columns.</strong>
        <span class="description">The width of this profile</span></p>

    <div>
        <input id="epms_profile[display][columns][default]" type="radio" name="epms_profile[display][columns]" value="default" <?php echo @('default'==$display_value['columns'] || 'full'!=$display_value['columns'] || ''==$display_value['columns'])?'checked':'' ?> >
        <label for="epms_profile[display][columns][default]">Default</label>
        <p class="description indented">Will display as thumbnail</p>
    </div>

    <div>
        <input id="epms_profile[display][columns][full]" type="radio" name="epms_profile[display][columns]" value="full" <?php echo @('full'==$display_value['columns'])?'checked':'' ?> >
        <label for="epms_profile[display][columns][full]">Full width</label>
        <p class="description indented">Will take the whole width of the container.</p>
    </div>

    <div>
        <input id="epms_profile[display][columns][fullsingle]" type="radio" name="epms_profile[display][columns]" value="fullsingle" <?php echo @('fullsingle'==$display_value['columns'])?'checked':'' ?> >
        <label for="epms_profile[display][columns][fullsingle]">Full width, single image</label>
        <p class="description indented">Will take the whole width of the container and will be the only one displayed.</p>
    </div>
</div>