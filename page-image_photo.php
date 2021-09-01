<?php

if(!$_GET['target']) {
	get_template_part('404');
	die();
} else {
	$product = get_post($_GET['target'], 'product');
	if(!$product) {
		get_template_part('404');
		die();
	}
}

$image_photo_list = array();

for($i = 1; $i <= 13; $i++) {
  $price_thumbnail_id = get_post_meta($product->ID, 'price' . $i . '_thumbnail', true);
  $price_thumbnail_url = wp_get_attachment_url($price_thumbnail_id);
  if($price_thumbnail_url) {
    $image_photo_list['price' . $i . '_thumbnail'] = $price_thumbnail_url;
  }
}

for($i = 1; $i <= 13; $i++) {
  $image_id = get_post_meta($product->ID, 'image_' . $i, true);
  $image_url = wp_get_attachment_url($image_id);
  if($image_url) {
    $image_photo_list['image_' . $i] = $image_url;
  }
}

for($i = 1; $i <= 10; $i++) {
  $dl_image_id = get_post_meta($product->ID, 'dl_image_' . $i, true);
  $dl_image_url = wp_get_attachment_url($dl_image_id);
  if($dl_image_url) {
    $image_photo_list['dl_image_' . $i] = $dl_image_url;
  }
}

get_header();
?>
      <div class="l-inner">

        <div class="p-downloadArea">
          <p class="p-downloadArea__text">必要な画像にチェックして「download」してください。</p>
          <div class="p-downloadArea__input__wrap">
            <input type="hidden" id="product_id" value="<?php echo $product->ID;?>"/>
            
            <?php 
            $counter = 0;
            foreach($image_photo_list as $image_photo_key => $image_photo_url): 
              if($counter == 0) {
                echo '<div class="p-contactArea__image_photo_list" style="overflow: hidden;">';
              }
            ?>
              <p class="p-contactArea__image_photo_item<?php if($counter){ echo " u-ml20"; } ?>">
                <label for="target_<?php echo $image_photo_key; ?>"><img src="<?php echo $image_photo_url; ?>" /></label>
                <br>
                <input type="checkbox" name="target" value="<?php echo $image_photo_key; ?>" id="target_<?php echo $image_photo_key; ?>" />
              </p>
            <?php 
              if($counter==2) {
                echo '</div>';
              }
              $counter++;
              if($counter==3) {
                $counter = 0;
              }
            endforeach; 
            ?>
            </div>
            <div><input class="p-downloadArea__input__button" type="button" value="ダウンロード"></div>
          </div>
        </div>

    </div>

<?php
get_footer();
