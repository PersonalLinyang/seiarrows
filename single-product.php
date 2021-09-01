<?php

$price_key_list = ['a', 'b', 'c', 'd', 'e', 'f'];

$series_list = get_the_terms($post->ID, 'series');
$series = $series_list[0];

$price_list = array();
for($i = 1; $i <= 12; $i++) {
	$price_color_deploy = get_post_meta($post->ID, 'price' . $i . '_color_deploy', true);
	if($price_color_deploy) {
		$price_color1 = get_post_meta($post->ID, 'price' . $i . '_color1', true);
		$price_color2 = get_post_meta($post->ID, 'price' . $i . '_color2', true);
		$price_thumbnail_id = get_post_meta($post->ID, 'price' . $i . '_thumbnail', true);
		$price_thumbnail_url = wp_get_attachment_url($price_thumbnail_id);
		$price_price = get_post_meta($post->ID, 'price' . $i . '_price', true);
		$price_price_list = array();
		foreach($price_key_list as $price_key) {
			$price_price_key = get_post_meta($post->ID, 'price' . $i . '_price_' . $price_key, true);
			if($price_price_key) {
				$price_price_list[mb_strtoupper($price_key)] = $price_price_key;
			}
		}
		$price_list[$i] = array(
			'color_deploy' => $price_color_deploy,
			'color1' => $price_color1,
			'color2' => $price_color2,
			'thumbnail' => $price_thumbnail_url,
			'price' => $price_price,
			'price_list' => $price_price_list,
			'price_g' => get_post_meta($post->ID, 'price' . $i . '_price_g', true)
		);
	}
}

$option_list = array();
for($i = 1; $i <= 2; $i++) {
	$option_title = get_post_meta($post->ID, 'free_option' . $i . '_title', true);
	$option_text = get_post_meta($post->ID, 'free_option' . $i . '_text', true);
	if($option_title || $option_text) {
		$option_image_list = array();
		for($j=1; $j<=4; $j++) {
			$option_image_id = get_post_meta($post->ID, 'free_option' . $i . '_image' . $j, true);
			$option_image_url = wp_get_attachment_url($option_image_id);
			if($option_image_url) {
				$option_image_list[$j] = $option_image_url;
			}
		}
		$option_list[$i] = array(
			'title' => $option_title,
			'text' => $option_text,
			'image_list' => $option_image_list,
		);
	}
}

$another_type_list = array();
for($i = 1; $i <= 7; $i++) {
	$another_type_text = get_post_meta($post->ID, 'another_type' . $i, true);
	if($another_type_text) {
		$another_type_link = get_post_meta($post->ID, 'another_type' . $i . '_link', true);
		$another_type_product = get_post($another_type_link);
		$another_type_list[$i] = array(
			'url' => $another_type_product->post_name,
			'text' => $another_type_text,
		);
	}
}

$added_price_list = array();
for($i = 1; $i <= 5; $i++) {
	$added_price_no = get_post_meta($post->ID, 'added_price' . $i . '_no', true);
	if($added_price_no) {
		$added_price_color = get_post_meta($post->ID, 'added_price' . $i . '_color', true);
		$added_price_price = get_post_meta($post->ID, 'added_price' . $i . '_price', true);
		$added_price_list[$i] = array(
			'no' => $added_price_no,
			'color' => $added_price_color,
			'price' => $added_price_price,
		);
	}
}

$image_list = array();
for($i = 1; $i <= 6; $i++) {
	$image_id = get_post_meta($post->ID, 'image_' . $i, true);
	$image_url = wp_get_attachment_url($image_id);
	if($image_url) {
		$image_list[$i] = $image_url;
	}
}

$image_list_1 = array();
for($i = 7; $i <= 12; $i++) {
	$image_id = get_post_meta($post->ID, 'image_' . $i, true);
	$image_url = wp_get_attachment_url($image_id);
	if($image_url) {
		$image_list_1[$i] = $image_url;
	}
}

$size_image_id = get_post_meta($post->ID, 'size_image', true);
$size_image_url = wp_get_attachment_url($size_image_id);

$spec_sheet_id = get_post_meta($post->ID, 'spec_sheet', true);
$spec_sheet_url = wp_get_attachment_url($spec_sheet_id);

$material_fabric_id = get_post_meta($post->ID, 'material_fabric', true);
$material_fabric_url = wp_get_attachment_url($material_fabric_id);

$download_id = get_post_meta($post->ID, '3d_cad', true);
$download_url = wp_get_attachment_url($download_id);

$product_category_list = get_the_terms($post->ID, 'product_category');
$product_category = $product_category_list[0];
$args = array(
	'post__not_in' => array($post -> ID),
	'posts_per_page'=> 5,
	'post_type' => 'product',
	'tax_query' => [
		[
			'taxonomy' => 'product_category',
			'field' => 'slug',
			'terms' => $product_category->slug,
		]
	],
	'orderby' => 'meta_value_num',
	'meta_key' => 'release_date',
	'order' => 'DESC'
);
$recommends = get_posts( $args );

$terms_product_category = get_terms( 'product_category',
  array(
    'hide_empty' => true,
    'orderby' => 'id',
    'order' => 'ASC',
  )
);

get_header();
?>

      <input type="hidden" id="product_id" value="<?php echo $post->ID;?>"/>

      <div class="p-productDetail">

        <div class="l-inner">
          <div class="p-productName u-mb50">
            <h2 class="p-productName__hdg">
              <em class="en"><?php echo $series->name; ?></em>
              <span class="jp"><?php echo get_post_meta($post->ID, 'japanese_name', true); ?></span>
            </h2>
            <p class="p-productName__num">
              <?php echo get_post_meta($post->ID, 'category_no', true); ?>
              <?php echo get_post_meta($post->ID, 'product_no', true); ?>
            </p>
          </div>
          <div class="u-flex">
            <div class="p-product__2column__left">
              <div class="p-productMainImg">
                <img src="<?php if($price_list[1]['thumbnail']) { echo $price_list[1]['thumbnail']; } else { echo get_theme_file_uri('/assets/img/common/no_photo_02.jpg'); }?>" alt="" width="190" height="457">
                <ul class="p-productColorThumbnail">
                  <?php foreach($price_list as $key => $price): ?>
                  <li class="p-productColorThumbnailHandle<?php if($key == 1): ?> current<?php endif; ?>" data-src="<?php if($price['thumbnail']) { echo $price['thumbnail']; } else { echo get_theme_file_uri('/assets/img/common/no_photo_02.jpg'); }?>">
                    <div class="color__wrap">
                      <span class="color" style="background: <?php echo $price['color1'];?>;"></span>
                      <span class="color" style="background: <?php echo $price['color2'];?>;"></span>
                    </div>
                    <p><?php echo $price['color_deploy'];?></p>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>

              <a class="p-productDetail--seriesbtn" href="<?php echo home_url(); ?>/product/series/<?php echo $series->slug;?>/">Series & Detail  →</a>

              <?php if(count($another_type_list)): ?>
              <div class="p-productDetail--desc__optionwrap u-mt50">
                <p class="p-productDetail--en">Another Type</p>
                <?php
                foreach($another_type_list as $another_type_key => $another_type):
                  if($another_type['url']):
                ?>
                <p class="p-productDetail--jp"><a href="<?php echo home_url(); ?>/product/detail/<?php echo $another_type['url']; ?>"><?php echo $another_type['text']; ?></a></p>
                <?php else: ?>
                <p class="p-productDetail--jp"><?php echo $another_type['text']; ?></p>
                <?php
                  endif;
                endforeach;
                ?>
              </div>
              <?php endif; ?>

            </div>

            <div class="p-productDetail--desc">

              <h3 class="p-productDetail--en">Material</h3>
              <div class="p-productDetail--desc__material">
                <span><?php echo get_post_meta($post->ID, 'material_1', true); ?></span>
                <span><?php echo get_post_meta($post->ID, 'material_2', true); ?></span>
              </div>

              <h3 class="p-productDetail--en">Price</h3>
              <div class="p-productDetail--desc__price">
                <?php foreach($price_list as $key => $price): ?>
                <div class="p-productDetail--desc__colorwrap">
                  <div class="p-productDetail--desc__colorwrap__left">
                    <span class="p-productDetail--en"><?php echo str_replace('-□□', '', get_post_meta($post->ID, 'category_no', true)); ?>-<?php echo $price['color_deploy'];?><?php echo get_post_meta($post->ID, 'product_no', true); ?></span>
                    <div class="color__wrap">
                      <span class="color" style="background: <?php echo $price['color1'];?>;"></span>
                      <span class="color" style="background: <?php echo $price['color2'];?>;"></span>
                    </div>
                  </div>
                  <span class="p-productDetail--jp"><?php if($price['price']): ?>¥<?php echo $price['price']; endif;?></span>
                  <?php if(count($price['price_list'])): ?>
                  <p class="p-productDetail--desc__price_list_handle" data-target="<?php echo $key; ?>">MORE</p>
                  <?php endif;?>
                </div>
                <?php if(count($price['price_list'])): ?>
                <div class="p-productDetail--desc__price_list" data-target="<?php echo $key; ?>">
                  <?php foreach($price['price_list'] as $price_key => $price_price): ?>
                  <div class="p-productDetail--desc__colorwrap">
                    <span class="p-productDetail--jp p-productDetail--desc__price_list_item <?php if($price_price === end($price['price_list'])){ echo "last"; } ?>">
                      <?php echo $price_key; ?> ¥<?php echo number_format($price_price); if($price_price === end($price['price_list'])){ echo "~"; } ?>
                    </sapn>
                  </div>
                  <?php endforeach; ?>
                  <?php if($price['price_g']): ?>
                  <div class="p-productDetail--desc__colorwrap">
                    <span class="p-productDetail--jp p-productDetail--desc__price_list_item">
                      <?php echo $price['price_g']; ?>
                    </sapn>
                  </div>
                  <?php endif; ?>
                </div>
                <?php endif;?>
                <?php endforeach; ?>

                <span class="p-productDetail--taxout">※without tax</span>

              </div>

              <h3 class="p-productDetail--en">Size</h3>
              <div class="p-productDetail--desc__sizewrap">
                <p class="p-productDetail--jp"><?php echo get_post_meta($post->ID, 'size', true); ?></p>
                <img src="<?php echo $size_image_url;?>" alt="">
              </div>

              <?php foreach($option_list as $free_option): ?>
              <h3 class="p-productDetail--en"><?php echo $free_option['title']; ?></h3>
              <div class="p-productDetail--desc__optionwrap">
                <p class="p-productDetail--jp"><?php echo $free_option['text']; ?></p>
                <div class="p-productDetail--desc__optionimggroup">
                  <?php foreach($free_option['image_list'] as $free_option_image): ?>
                  <div><img src="<?php echo $free_option_image;?>" alt=""></div>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endforeach; ?>

              <?php if(count($added_price_list)): ?>
              <h3 class="p-productDetail--en">Price</h3>
              <div class="p-productDetail--desc__price">
                <?php foreach($added_price_list as $added_key => $added_price): ?>
                <div class="p-productDetail--desc__colorwrap">
                  <div class="p-productDetail--desc__colorwrap__left">
                    <span class="p-productDetail--en"><?php echo $added_price['no']; ?></span>
                    <?php if($added_price['color']): ?>
                    <div class="color__wrap">
                      <span class="color" style="background: <?php echo $added_price['color'];?>;"></span>
                    </div>
                    <?php endif; ?>
                  </div>
                  <span class="p-productDetail--jp"><?php if($added_price['price']): ?>¥<?php echo $added_price['price']; endif;?></sapn>
                </div>
                <?php endforeach; ?>

                <span class="p-productDetail--taxout">※without tax</span>

              </div>
              <?php endif; ?>

              <h3 class="p-productDetail--en">Other</h3>
              <p class="p-productDetail--desc__other p-productDetail--jp">
                <?php echo get_post_meta($post->ID, 'other', true); ?>
              </p>

                <div class="p-productDetail--desc__btngroup">
                  <div class="p-productDetail--desc__btngroup__top">
                    <a class="p-productDetail--desc__btngroup__btn" href="<?php echo home_url(); ?>/image_photo/?target=<?php echo $post->ID;?>" target="_blank"><span>Image Photo</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="13.71" viewBox="0 0 9.68 13.71">
                        <defs>
                          <style>.cls-1{fill:none;stroke:#231815;stroke-miterlimit:10;stroke-width:0.57px;}</style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                          <g id="レイヤー_1" data-name="レイヤー 1">
                            <line class="cls-1" x1="4.84" x2="4.84" y2="10.63"/>
                            <polyline class="cls-1" points="9.14 5.97 4.84 10.63 0.54 5.97"/>
                            <line class="cls-1" y1="13.43" x2="9.68" y2="13.43"/>
                          </g>
                        </g>
                      </svg>
                    </a>
                    <?php if($spec_sheet_url): ?>
                    <a class="p-productDetail--desc__btngroup__btn p-productDetail--desc__btngroup--right_btn" href="<?php echo $spec_sheet_url;?>" target="_blank">
                      <span>Spec Sheet</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="13.71" viewBox="0 0 9.68 13.71">
                        <defs>
                          <style>.cls-1{fill:none;stroke:#231815;stroke-miterlimit:10;stroke-width:0.57px;}</style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                          <g id="レイヤー_1" data-name="レイヤー 1">
                            <line class="cls-1" x1="4.84" x2="4.84" y2="10.63"/>
                            <polyline class="cls-1" points="9.14 5.97 4.84 10.63 0.54 5.97"/>
                            <line class="cls-1" y1="13.43" x2="9.68" y2="13.43"/>
                          </g>
                        </g>
                      </svg>
                    </a>
                    <?php endif;?>
                  </div>
                  <div class="p-productDetail--desc__btngroup__top">
                    <?php if($material_fabric_url): ?>
                    <?php $material_fabric_field = get_field_object('material_fabric_type'); ?>
                    <a class="p-productDetail--desc__btngroup__btn" href="<?php echo $material_fabric_url;?>" target="_blank"><span><?php echo $material_fabric_field['choices'][$material_fabric_field['value']]; ?></span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="13.71" viewBox="0 0 9.68 13.71">
                        <defs>
                          <style>.cls-1{fill:none;stroke:#231815;stroke-miterlimit:10;stroke-width:0.57px;}</style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                          <g id="レイヤー_1" data-name="レイヤー 1">
                            <line class="cls-1" x1="4.84" x2="4.84" y2="10.63"/>
                            <polyline class="cls-1" points="9.14 5.97 4.84 10.63 0.54 5.97"/>
                            <line class="cls-1" y1="13.43" x2="9.68" y2="13.43"/>
                          </g>
                        </g>
                      </svg>
                    </a>
                    <?php endif;?>
                    <?php if($download_url): ?>
                    <a class="p-productDetail--desc__btngroup__btn p-productDetail--desc__btngroup--right_btn" href="<?php echo home_url(); ?>/download/?target=<?php echo $post->ID;?>" target="_blank"><span>3D & CAD Data</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="9.68" height="13.71" viewBox="0 0 9.68 13.71">
                        <defs>
                          <style>.cls-1{fill:none;stroke:#231815;stroke-miterlimit:10;stroke-width:0.57px;}</style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                          <g id="レイヤー_1" data-name="レイヤー 1">
                            <line class="cls-1" x1="4.84" x2="4.84" y2="10.63"/>
                            <polyline class="cls-1" points="9.14 5.97 4.84 10.63 0.54 5.97"/>
                            <line class="cls-1" y1="13.43" x2="9.68" y2="13.43"/>
                          </g>
                        </g>
                      </svg>
                    </a>
                    <?php endif;?>
                  </div>
                </div>

            </div>
          </div>
        </div>
        <!-- /.l-inner -->



        <?php if(count($image_list)): ?>
        <div class="p-productDetail--image u-mt80">

          <h2 class="p-productDetail--image__ttl u-mb30">IMAGE</h2>
          <div class="p-productDetail--image__topimage u-mb30">
            <img src="<?php echo current($image_list); ?>" alt="">
          </div>

          <div class="l-inner pc">

            <div class="p-productDetail--image__imagegroup image u-mb15">
            <?php foreach($image_list as $image_key => $image): ?>
            <?php if($image_key % 6 == 1 && $image_key > 6): ?>
            </div>
            <div class="p-productDetail--image__imagegroup image u-mb15">
            <?php endif; ?>
              <div class="p-productDetail--image__imagegroup__imagewrap image u-mr15">
              	<img src="<?php echo $image; ?>" alt="">
              </div>
            <?php endforeach; ?>
            </div>

            <div class="p-productDetail--image__imagegroup image u-mb15">
            <?php foreach($image_list_1 as $image_key => $image): ?>
            <?php if($image_key % 6 == 1 && $image_key > 6): ?>
            </div>
            <div class="p-productDetail--image__imagegroup image u-mb15">
            <?php endif; ?>
              <div class="p-productDetail--image__imagegroup__imagewrap image u-mr15">
              	<img src="<?php echo $image; ?>" alt="">
              </div>
            <?php endforeach; ?>
            </div>

          </div>

          <div class="l-inner sp">

            <div class="p-productDetail--image__imagegroup image u-mb15">
            <?php foreach($image_list as $image_key => $image): ?>
              <div class="p-productDetail--image__imagegroup__imagewrap image u-mr15">
              	<img src="<?php echo $image; ?>" alt="">
              </div>
            <?php endforeach; ?>
            <?php foreach($image_list_1 as $image_key => $image): ?>
              <div class="p-productDetail--image__imagegroup__imagewrap image u-mr15">
              	<img src="<?php echo $image; ?>" alt="">
              </div>
            <?php endforeach; ?>
            </div>

          </div>

        </div>
        <?php endif; ?>

        <?php if(count($recommends)): ?>
        <div class="l-inner">
          <div class="p-productDetail--image u-mt60">

            <h2 class="p-productDetail--image__ttl u-mb30">RECOMMEND</h2>

            <ul class="p-productDetail--image__imagegroup recommend">
              <?php foreach($recommends as $recommend): ?>
              <li class="p-productDetail--image__imagegroup__imagewrap recommend u-mr20">
              	<a href="<?php echo home_url(); ?>/product/detail/<?php echo $recommend->post_name; ?>">
              		<?php $recommend_image_id = get_post_meta($recommend->ID, 'thumbnail', true); ?>
              		<img src="<?php echo wp_get_attachment_url($recommend_image_id); ?>" alt="">
              		<span><?php echo get_the_terms($recommend->ID, 'series')[0]->name; ?></span>
              	</a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <?php endif; ?>

        <div class="l-inner">

            <ul class="p-productDetail--nav u-mt30 u-mb50">
              <?php foreach($terms_product_category as $term_product_category): ?>
              <li>
                <a href="<?php echo home_url(); ?>/product/category/<?php echo $term_product_category->slug;?>/"><?php echo $term_product_category->name; ?></a>
              </li>
              <?php endforeach;?>
            </ul>

        </div>

      </div>

<?php

get_footer();
