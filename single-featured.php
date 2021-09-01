<?php

$main_image_id = get_post_meta($post->ID, 'main_image', true);
$main_image_url = wp_get_attachment_url($main_image_id);

$sub_field_list = array();
$counter = 0;
for($i = 1; $i <= 5; $i++) {
	$sub_field_image_id = get_post_meta($post->ID, 'sub_field' . $i . '_image', true);
	$sub_field_image_url = wp_get_attachment_url($sub_field_image_id);
	if($sub_field_image_url) {
		$sub_field_list[$counter] = array(
			'image' => $sub_field_image_url,
			'text' => get_post_meta($post->ID, 'sub_field' . $i . '_text', true),
		);
		$counter++;
	}
}

get_header();
?>

      <div class="p-featuredDetail">

        <div class="l-inner">
          <div class="p-featuredDetail--title">
            <h5 class="p-featuredDetail--title__subttl"><?php echo get_post_meta($post->ID, 'sub_title', true); ?></h5>
            <h2 class="p-featuredDetail--title__mainttl"><?php echo $post->post_title; ?></h2>
            <span class="p-featuredDetail--title__date"><?php echo get_the_time( 'Y/m/d', $post->ID ); ?></span>
          </div>

          <div class="p-featuredDetail--section">
            <h2 class="p-featuredDetail--section__ttl">
              <span><?php echo get_post_meta($post->ID, 'catch', true); ?></span>
            </h2>
            <div class="p-featuredDetail--section__desc">
              <p>
                <?php echo get_post_meta($post->ID, 'content1', true); ?>
              </p>
            </div>
            <div class="p-featuredDetail--section__image">
              <img src="<?php echo $main_image_url; ?>" alt="Featured Detail Image 01" />
            </div>

          </div>

          <div class="p-featuredDetail--section">
            <h2 class="p-featuredDetail--section__ttl">
              <span><?php echo get_post_meta($post->ID, 'catch2', true); ?></span>
            </h2>

            <?php foreach($sub_field_list as $sub_field_key => $sub_field): ?>
            <div class="p-featuredDetail--section--wrap">
              <div class="p-featuredDetail--section--wrap__text u-pr40">
                <p>
                  <?php echo $sub_field['text']; ?>
                </p>
              </div>
              <div class="p-featuredDetail--section--wrap__image <?php if($sub_field_key%2 == 0): ?>right<?php else: ?>left<?php endif; ?>">
                <img src="<?php echo $sub_field['image']; ?>" alt="Featured Detail Image <?php echo $sub_field_key; ?>" />
              </div>
            </div>
            <?php endforeach; ?>

            <div class="p-featuredDetail--section__ttl">
              <a href="<?php echo get_site_url(); ?>/product/series/<?php echo get_post_meta($post->ID, 'link_series', true); ?>/"><?php echo get_post_meta($post->ID, 'link_title', true); ?></a>
            </div>

            <div class="p-featuredDetail--section__linkbtn">
              <a href="<?php echo get_site_url(); ?>/featured/">INDEX 一<span>覧</span></a>
            </div>

          </div>

        </div>
      </div>




      <!-- /.l-inner -->

<?php

get_footer();
