<form id="<?php echo $options->ID; ?>" <?php /*action="<?php echo $options->fallbackurl ?>"*/ ?> method="POST" role="form" class="contact-form">
    <input name="action" type="hidden" value="<?php echo $options->ajaxActionName; ?>" />
    <div class="row">
        <div class="col-md-12">
            <h2>Request a Quote</h2>
        </div>
        <div class="col-md-9">
            <p>Send us a message, give us a shoutout. Let us know what's on your mind.</p>

            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="contact[name]" class="label-control">Name</label>
                        <input type="text" name="contact[name]" id="contact[name]" placeholder="Name" class="form-control input-lg">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="contact[email]" class="label-control">Email</label>
                        <input type="email" name="contact[email]" id="contact[email]" placeholder="Email" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="contact[phone]" class="label-control">Mobile phone</label>
                        <input type="text" name="contact[phone]" id="contact[phone]" placeholder="Mobile phone" class="form-control form-control-phone input-lg" data-format="+63d (ddd) ddd dddd">
                    </div>
                    <div class="form-group">
                        <label for="contact[subject]" class="label-control">Subject</label>
                        <input type="text" name="contact[subject]" id="contact[subject]" placeholder="Subject" class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <label for="contact[message]" class="label-control">Message</label>
                        <textarea name="contact[message]" id="contact[message]" placeholder="Message" class="form-control input-lg"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="contact[submit]" class="btn btn-primary btn-lg pull-right ladda-button">Send Request</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3">

            <?php
            $blanket_options = get_option('blanket_theme_options');

            // echo "<pre>";
            //     var_dump( $blanket_options );
            // echo "</pre>";
            ?>
            <?php if( array_key_exists('social', $blanket_options) ): ?>
                <?php if( array_key_exists('email', $blanket_options['social']) ) { ?>
                    <h4>Email</h4>
                    <p><?php echo $blanket_options['social']['email']; ?></p>
                <?php } ?>

                <?php if( array_key_exists('telephone', $blanket_options['social']) ) { ?>
                    <h4>Telephone</h4>
                    <p><?php echo $blanket_options['social']['telephone']; ?></p>
                <?php } ?>
            <?php endif; ?>

            <?php if( array_key_exists('address', $blanket_options) ): ?>
                <h4>Address</h4>
                <p><?php echo $blanket_options['address']['unit']; ?><br>
                <?php echo $blanket_options['address']['street']; ?>,<br>
                <?php echo $blanket_options['address']['brgy']; ?>,<br>
                <?php echo $blanket_options['address']['city']; ?>,<br>
                <?php echo $blanket_options['address']['country']; ?><br>
            <?php endif; ?>

            <div class="quote-widgets padd-top">
                <?php echo social_nav(); ?>
            </div>
        </div>

    </div>
</form>