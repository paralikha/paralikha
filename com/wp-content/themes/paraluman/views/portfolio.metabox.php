<p class="description text-muted">Upload a file or enter a url for showcase content.</p>
<?php $display_value = get_post_meta(get_the_ID(), 'portfolio_showcase', true); ?>
<input id="portfolio_showcase" type="text" class="regular-text" name="portfolio_showcase[filename]" value="<?php echo @$display_value['filename'] ?>">
<input name="portfolio_showcase[button]" type="button" data-input="#portfolio_showcase" data-target="#portfolio_showcase" class="button button-default button-large button-media button-media-theme" id="portfolio_showcase_button" value="Browse">