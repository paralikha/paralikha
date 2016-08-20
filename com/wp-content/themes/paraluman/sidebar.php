<!-- sidebar -->
<aside class="sidebar sidebar-fixed" role="complementary">
    <div class="col-md-3">
        <div class="c-cat">
			<?php get_template_part('searchform'); ?>
            <h6>Categories</h6>
            <ul>
                <li><a href="#"><p>WHAT ARE YOU LOOKING FOR?</p></a></li>
                <li><a href="#"><p>post with video</p></a></li>
                <li><a href="#"><p>post with quote</p></a></li>
            </ul>
        </div>
        <div class="c-ig">
            <h6>Instagram</h6>
			<div class="sidebar-widget">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
			</div>

			<div class="sidebar-widget">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
			</div>
            <div class="widgetinstagram" data-col="3" data-vertical="10" data-horizontal="10">
                <div class="instagram-content">
                    <a href="https://www.instagram.com">
                        <img src="resources/images/sample/content.png" width="150" height="150">
                    </a>
                    <a href="https://www.instagram.com">
                        <img src="resources/images/sample/web.png" width="150" height="150">
                    </a>
                    <a href="https://www.instagram.com">
                        <img src="resources/images/sample/graphic2.png" width="150" height="150">
                    </a>
                    <a href="https://www.instagram.com">
                        <img src="resources/images/sample/video.png" width="150" height="150">
                    </a>
                    <a>
                        <img src="resources/images/sample/motion.png" width="150" height="150">
                    </a>
                    <a href="https://www.instagram.com">
                        <img src="resources/images/sample/content.png" width="150" height="150">
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- /sidebar -->
