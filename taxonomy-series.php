<?php
$series = get_queried_object();

$main_image_list = array();
for($i = 1; $i <= 5; $i++) {
	$series_image = get_field('main_image' . $i, 'series_' . $series->term_id);
	$series_image_url = wp_get_attachment_url($series_image['ID']);
	if($series_image_url) {
		$main_image_list[$i] = $series_image_url;
	}
}

$main_video = get_field('main_video', 'series_' . $series->term_id);
$main_video_url = wp_get_attachment_url($main_video['ID']);

$block_list = array();
$j = 0;
for($i = 1; $i <= 5; $i++) {
	$block_maincatch = get_field('block' . $i . '_maincatch', 'series_' . $series->term_id);
	if($block_maincatch) {
		$block_content = get_field('block' . $i . '_content', 'series_' . $series->term_id);
		$block_image = get_field('block' . $i . '_image', 'series_' . $series->term_id);
		$block_image_url = wp_get_attachment_url($block_image['ID']);
		$block_list[$j] = array(
			'maincatch' => $block_maincatch,
			'content' => $block_content,
			'image' => $block_image_url,
		);
		$j++;
	}
}

$relative_product_list = array();
for($i = 1; $i <= 10; $i++) {
	$relative_product = get_field('series_relative_product_' . $i, 'series_' . $series->term_id);
	if($relative_product) {
		$relative_product_image_id = get_post_meta($relative_product->ID, 'thumbnail', true);
		$relative_product_image_url = wp_get_attachment_url($relative_product_image_id);
		$relative_product_list[$i] = array(
			'product_slug' => $relative_product->post_name,
			'product_name' => str_replace('-0000', '', $relative_product->post_name),
			'image' => $relative_product_image_url,
		);
	}
}

$case_study_texta = get_field('case_study_texta', 'series_' . $series->term_id);
$case_study_textb = get_field('case_study_textb', 'series_' . $series->term_id);

$display_image_list = array();
for($i = 1; $i <= 10; $i++) {
	$display_image = get_field('display_image' . $i, 'series_' . $series->term_id);
	$display_image_link = get_field('display_image' . $i . '_link_url', 'series_' . $series->term_id);
	if($display_image) {
		$display_image_list[$i] = array(
			'image' => $display_image['url'],
			'url' => $display_image_link,
		);
	}
}

$designer_name = get_field('designer_name', 'series_' . $series->term_id);
$designer_image = get_field('designer_image', 'series_' . $series->term_id);
$designer_content = get_field('designer_content', 'series_' . $series->term_id);

get_header();
?>

      <div class="p-productSeries">
        <div class="l-inner">
          <div class="p-productSeries--slider">
            <?php foreach($main_image_list as $main_image_key => $main_image): ?>
            <div class="p-productSeries--slider__wrap">
              <img src="<?php echo $main_image; ?>" alt="Slider Image <?php echo $main_image_key; ?>" />
              <div class="p-productSeries--slider__wrap__ttl">
                <span><?php echo $series->name; ?></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

        </div>

        <div class="p-productSeries--section">
          <div class="l-inner">

            <?php if($main_video_url): ?>
            <div class="p-productSeries--section--wrap">
              <?php if(get_field('main_video_catch', 'series_' . $series->term_id) or get_field('main_video_content', 'series_' . $series->term_id)): ?>
              <div class="p-productSeries--section--wrap__text">
                <h3 class="p-productSeries--section--wrap__text__ttl">
                  <?php echo get_field('main_video_catch', 'series_' . $series->term_id); ?>
                </h3>
                <p class="p-productSeries--section--wrap__text__desc">
                  <?php echo get_field('main_video_content', 'series_' . $series->term_id); ?>
                </p>
              </div>
              <?php endif; ?>
              <div class="p-productSeries--section--wrap__image left">
                <video src="<?php echo $main_video_url; ?>" autoplay loop muted playsinline style="width: 100%;"></video>
              </div>
            </div>
            <?php endif; ?>

            <?php foreach($block_list as $block_key => $block): ?>
            <div class="p-productSeries--section--wrap">
              <div class="p-productSeries--section--wrap__text">
                <h3 class="p-productSeries--section--wrap__text__ttl">
                  <?php echo $block['maincatch']; ?>
                </h3>
                <p class="p-productSeries--section--wrap__text__desc">
                  <?php echo $block['content']; ?>
                </p>
              </div>
              <div class="p-productSeries--section--wrap__image <?php if($block_key%2==1) {echo 'left';} else {echo 'right';} ?>">
                <img src="<?php echo $block['image']; ?>" alt="Series Image <?php echo $block_key; ?>" />
              </div>

            </div>
            <?php endforeach; ?>

            <?php if (count($relative_product_list)): ?>
            <div class="p-productSeries--section--item">
              <h2 class="p-productSeries--section--item__ttl">
                <span>SERIES</span>
              </h2>
              <div class="p-productSeries--section--item__list">
                <?php foreach($relative_product_list as $relative_product_key => $relative_product): ?>
                <div class="p-productSeries--section--item__item">
                  <a class="p-productSeries--section--item__link" href="<?php echo get_site_url(); ?>/product/detail/<?php echo $relative_product['product_slug']; ?>">
                  <div class="p-productSeries--section--item__image">
                    <img src="<?php echo $relative_product['image']; ?>" alt="Series Image <?php echo $relative_product_key; ?>" />
                  </div>
                  	<span><?php echo $relative_product['product_name']; ?></span>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

            <?php if (count($display_image_list)): ?>
            <div class="p-productSeries--section--item">
              <h2 class="p-productSeries--section--item__ttl">
                <span>CASE STUDY</span>
              </h2>
              <p class="p-productSeries--section--item__desc">
                <span><?php echo $case_study_texta; ?></span>
                <br>
                <?php echo $case_study_textb; ?>
              </p>
              <div class="p-productSeries--section--item__image case">
                <?php if(current($display_image_list)['url']): ?>
                <a href="<?php echo current($display_image_list)['url']; ?>">
                  <img src="<?php echo current($display_image_list)['image']; ?>" alt="Series Image 06" />
                </a>
                <?php else: ?>
                <img src="<?php echo current($display_image_list)['image']; ?>" alt="Series Image 06" />
                <?php endif; ?>
              </div>
              <div class="p-productSeries--section--item__imagegroup">
              	<?php foreach($display_image_list as $display_image_key => $display_image): ?>
                <div class="p-productSeries--section--item__imagegroup--wrap u-mr18" data-href="<?php echo $display_image['url']; ?>">
                  <img src="<?php echo $display_image['image']; ?>" alt="Series Image <?php echo $display_image_key; ?>" />
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

            <?php if($designer_name): ?>
            <div class="p-productSeries--section--item designer">
              <h2 class="p-productSeries--section--item__ttl">
                <span>DESIGNER</span>
              </h2>
              <div class="p-productSeries--section--item__flex">
                <div class="p-productSeries--section--item__flex--imagewrap">
                  <?php if($designer_image): ?>
                  <img src="<?php echo $designer_image['url']; ?>" alt="Series Image 09" />
                  <?php endif;?>
                </div>
                <div class="p-productSeries--section--item__flex--text">
                  <h3><?php echo $designer_name; ?></h3>
                  <p>
                    ＿<br>
                    <?php echo $designer_content; ?>
                  </p>
                </div>

              </div>
              <div class="p-productSeries--section--item__linkbtn">
                <a href="<?php echo get_site_url(); ?>/product/">SERIES 一<span>覧</span></a>
              </div>

            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>

      <!-- /.l-inner -->

<?php

get_footer();
