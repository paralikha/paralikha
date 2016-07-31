<div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
    <!-- Display tabs-->
    <ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
        <li class="tabs"><a href="#<?php echo $taxonomy; ?>-all" tabindex="3"><?php echo $tax->labels->all_items; ?></a></li>
    </ul>
    <!-- Display taxonomy terms -->
    <div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
        <ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
            <?php   foreach($terms as $term){
            $id = $taxonomy.'-'.$term->term_id;
            echo "<li id='$id'><label class='selectit'>";
                echo "<input type='radio' id='in-$id' name='{$name}'".checked($current,$term->term_id,false)."value='$term->term_id' />$term->name<br />";
            echo "</label></li>";
            } ?>
        </ul>
    </div>
    <a target="_blank" href="edit-tags.php?taxonomy=<?php echo $taxonomy; ?>&amp;post_type=<?php echo $post->post_type;  ?>"><?php _e('Define Departments', EPMS_TEXT_DOMAIN) ?>&nbsp;<i class="fa fa-external-link"></i></a>
</div>
