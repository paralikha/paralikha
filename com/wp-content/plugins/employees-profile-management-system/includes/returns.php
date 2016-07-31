<?php

# Unit Type
function get_the_unit_type($id=null)
{
    return get_the_term_list( (null == $id) ? get_the_ID() : $id, 'unit-types' );
}
function the_unit_type($id=null)
{
    echo get_the_term_list( (null == $id) ? get_the_ID() : $id, 'unit-types' );
}

function the_unit_type_logo($id=null, $size=array(20,20))
{
    ob_start();
    $terms = get_the_terms(get_the_ID(), 'unit-types');
    $term = get_option( "taxonomy_".$terms[0]->term_id );
    if( !empty($term['unit_logo']) ): ?>
        <img src="<?php echo $term['unit_logo']; ?>" alt="<?php echo $terms[0]->name . ' logo' ?>" width="<?php echo $size[0] ?>" height="<?php echo $size[1] ?>">&nbsp;<?php
    endif;
    echo ob_get_clean();
}

function the_property_map($id=null)
{
    $address = get_post_meta( (null == $id) ? get_the_ID() : $id, 'address', false);
    $address = array_shift($address);
    echo $address['map'];
}

function the_property_address($id=null)
{
    $address = get_post_meta( (null == $id) ? get_the_ID() : $id, 'address', false);
    $address = array_shift($address);

    $full_add  = !empty($address['bldg']) || null != $address['bldg'] ? $address['bldg'] . ', ' : '';
    $full_add .= !empty($address['street']) || null != $address['street'] ? $address['street'] . ', ' : '';
    $full_add .= !empty($address['district']) || null != $address['district'] ? $address['district'] . ', ' : '';
    $full_add .= !empty($address['city']) || null != $address['city'] ? $address['city'] . ', ' : '';
    $full_add .= !empty($address['postalcode']) || null != $address['postalcode'] ? $address['postalcode'] . ', ' : '';
    $full_add .= !empty($address['province']) || null != $address['province'] ? $address['province'] . ', ' : '';
    $full_add .= !empty($address['country']) || null != $address['country'] ? $address['country'] : '';

    echo $full_add;
}

function the_property_price($id=null)
{
    $rate = get_post_meta( (null == $id) ? get_the_ID() : $id, 'rate', false);
    $rate = array_shift($rate);

    $availability = get_post_meta( (null == $id) ? get_the_ID() : $id, 'availability', false);
    $availability = array_shift($availability);

    if( empty($rate['toggle-price']) || null == $rate['toggle-price'] && $rate['toggle-price'] == 'hide-price' ) {
        echo empty($rate['price']) ? '' : $rate['price'] . ' / ' . $rate['payment-type'];
    } else {
        if($rate['show-price-text'] != 'availability-date') {
            echo $rate['show-price-text'];
        }
    }
}

function the_property_availability($id=null)
{
    $availability = get_post_meta( (null == $id) ? get_the_ID() : $id, 'availability', false);
    $availability = array_shift($availability);

    $now = new DateTime();
    $availability_date = new DateTime($availability['date']);

    if( $availability_date >= $now  ) { ?>
        <span class="availability available text-success"><i class="fa fa-key"></i>&nbsp;<?php echo _e('Available', 'blanket'); ?></span><?php
    } else { ?>
        <span class="availability available_on text-warning"><i class="fa fa-unlock"></i>&nbsp;<?php echo _e('Available on ', 'blanket') . $now->format('F d, Y'); ?></span><?php
    }
}

function the_property_features($id=null)
{
    ob_start();
    $features = get_post_meta( (null == $id) ? get_the_ID() : $id, 'features', false);
    $features = array_shift($features);

    foreach ($features as $name => $count) {
        if( 0 !== $count || !empty($count) || null !== $count): ?>
            <span class="badge <?php echo $name; ?>" title="<?php echo $name; ?>"><i class="fa fa-<?php echo $name; ?>"></i>&nbsp; <span class="count"><?php echo $count; ?></span>&nbsp;<?php echo $name; ?></span><?php
        endif;
    }
    echo ob_get_clean();
}

function the_feature($id, $feature_name, $icon, $name='')
{
    $features = get_post_meta( (null == $id) ? get_the_ID() : $id, 'features', false);
    $feature = array_shift($features);

    if( !value($feature, $feature_name) ) {
        return;
    }
    echo (null != $feature[$feature_name] || !empty($feature[$feature_name])) ? '<span class="badge '.$feature[$feature_name].'">' . ucwords($feature[$feature_name]) . '&nbsp;<i class="'.$icon.'"></i> '.$name.'</span>&nbsp;' : '';
}

function the_property_gallery($id=null, $editor_id='rpmgalleryeditor')
{
    $content = get_post_meta( (null == $id) ? get_the_ID() : $id, $editor_id, true);
    echo $content;
}

function the_property_amenities($id=null, $editor_id='rpmamenitieseditor')
{
    $content = get_post_meta( (null == $id) ? get_the_ID() : $id, $editor_id, true);
    echo $content;
}
 ?>