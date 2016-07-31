<div class="soms">
    <img id="soms_service_image_preview" class="thumb" src="<?php echo @$soms_services['icon']; ?>">
    <input type="hidden" name="soms_services[icon]" id="soms_service_image_upload" value="<?php echo @$soms_services['icon']; ?>">
    <a id="soms_service_image_browser" role="button" data-target="#soms_service_image_preview" data-input="#soms_service_image_upload" class="button-media button-link">Set Service Image</a>
    <a id="soms_service_image_destroy" role="button" data-target="#soms_service_image_preview" data-input="#soms_service_image_upload" class="button-destroy button-link">Remove Service Image</a>
</div>