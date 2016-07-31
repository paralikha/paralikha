<div class="wrap">
    <h1><?php _e("Site Options", BLANKET_TEXT_DOMAIN) ?></h1>

    <form action="options.php" method="POST" autocomplete="off" class="blanket_options"><?php
        // include BLANKET_VIEWS . "partials/nonce.view.php";
        settings_fields( $menu_settings );
        do_settings_sections( $menu_settings ); ?>

        <section class="section">
            <div class="panel panel-after-editor">
                <div class="panel-body">
                    <div class="panel-heading">
                        <h3><?php _e('Site Information', BLANKET_TEXT_DOMAIN) ?></h3>
                        <p class="description">Additional site-wide information.</p>
                    </div>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="blanket_theme_options[social][email]"><strong><?php _e('Email', BLANKET_TEXT_DOMAIN) ?></strong></label>
                            </th>
                            <td>
                                <input id="blanket_theme_options[social][email]" name="blanket_theme_options[social][email]" type="email" class="regular-text" value="<?php echo @$blanket_options['social']['email']; ?>" placeholder="<?php echo get_bloginfo('admin_email'); ?>">
                                <p class="description">Defaults to <em><?php echo get_bloginfo('admin_email'); ?></em></p>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="blanket_theme_options[social][telephone]"><strong><?php _e('Telephone', BLANKET_TEXT_DOMAIN) ?></strong></label>
                            </th>
                            <td>
                                <input id="blanket_theme_options[social][telephone]" name="blanket_theme_options[social][telephone]" type="text" class="regular-text" value="<?php echo @$blanket_options['social']['telephone'] ?>">
                                <p class="description">Use the international format (E.g. +63x (xxx) xxxx...x)</p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="blanket_theme_options[address][unit]"><strong><?php _e('Address', BLANKET_TEXT_DOMAIN) ?></strong></label>
                            </th>
                            <td>
                                <div>
                                    <p><strong>Unit / Bldg</strong></p>
                                    <input id="blanket_theme_options[address][unit]" name="blanket_theme_options[address][unit]" type="text" class="regular-text" value="<?php echo @$blanket_options['address']['unit'] ?>">
                                </div>
                                <div>
                                    <p><strong>Street</strong></p>
                                    <input id="blanket_theme_options[address][street]" name="blanket_theme_options[address][street]" type="text" class="regular-text" value="<?php echo @$blanket_options['address']['street'] ?>">
                                </div>
                                <div>
                                    <p><strong>Centre / Brgy</strong></p>
                                    <input id="blanket_theme_options[address][brgy]" name="blanket_theme_options[address][brgy]" type="text" class="regular-text" value="<?php echo @$blanket_options['address']['brgy'] ?>">
                                </div>
                                <div>
                                    <p><strong>City</strong></p>
                                    <input id="blanket_theme_options[address][city]" name="blanket_theme_options[address][city]" type="text" class="regular-text" value="<?php echo @$blanket_options['address']['city'] ?>">
                                </div>
                                <div>
                                    <p><strong>Country</strong></p>
                                    <input id="blanket_theme_options[address][country]" name="blanket_theme_options[address][country]" type="text" class="regular-text" value="<?php echo @$blanket_options['address']['country'] ?>" placeholder="Philippines">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <?php
        # The submit button
        submit_button(); ?>

    </form>

</div>