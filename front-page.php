 <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/add.css" /> -->
<?php
$post_id = get_the_ID();

/*
$slider_image_1_id = get_post_meta($post->ID, 'slider_image_1', true);
$slider_iamge_1_url = wp_get_attachment_url($slider_image_1_id);

$slider_image_2_id = get_post_meta($post->ID, 'slider_image_2', true);
$slider_iamge_2_url = wp_get_attachment_url($slider_image_2_id);

$slider_image_3_id = get_post_meta($post->ID, 'slider_image_3', true);
$slider_iamge_3_url = wp_get_attachment_url($slider_image_3_id);

$slider_image_4_id = get_post_meta($post->ID, 'slider_image_4', true);
$slider_iamge_4_url = wp_get_attachment_url($slider_image_4_id);
*/

$main_video_rand = rand(1, 5);
if($main_video_rand == 1) {
	$main_video_no = 'main_video';
	$main_video_link = get_post_meta($post->ID, 'main_video_link', true);
} else {
	$main_video_no = 'main_video_' . $main_video_rand;
	$main_video_link = get_post_meta($post->ID, 'main_video_link_' . $main_video_rand, true);
}
$main_video_id = get_post_meta($post->ID, $main_video_no, true);
$main_video_url = wp_get_attachment_url($main_video_id);
if(!$main_video_url) {
	$main_video_no = 'main_video';
	$main_video_id = get_post_meta($post->ID, $main_video_no, true);
	$main_video_url = wp_get_attachment_url($main_video_id);
	$main_video_link = get_post_meta($post->ID, 'main_video_link', true);
}

$product_image_id = get_post_meta($post->ID, 'product_image', true);
$product_image_url = wp_get_attachment_url($product_image_id);

$madetoorder_image_id = get_post_meta($post->ID, 'madetoorder_image', true);
$madetoorder_image_url = wp_get_attachment_url($madetoorder_image_id);

$featured_image_id = get_post_meta($post->ID, 'featured_image', true);
$featured_image_url = wp_get_attachment_url($featured_image_id);

$newworks_image_id = get_post_meta($post->ID, 'newworks_image', true);
$newworks_image_url = wp_get_attachment_url($newworks_image_id);

$showroom_image_id = get_post_meta($post->ID, 'showroom_image', true);
$showroom_image_url = wp_get_attachment_url($showroom_image_id);

$news_image_id = get_post_meta($post->ID, 'news_image', true);
$news_image_url = wp_get_attachment_url($news_image_id);

$instagram_image_1_id = get_post_meta($post->ID, 'instagram_image_1', true);
$instagram_image_1_url = wp_get_attachment_url($instagram_image_1_id);

$instagram_image_2_id = get_post_meta($post->ID, 'instagram_image_2', true);
$instagram_image_2_url = wp_get_attachment_url($instagram_image_2_id);

$instagram_image_3_id = get_post_meta($post->ID, 'instagram_image_3', true);
$instagram_image_3_url = wp_get_attachment_url($instagram_image_3_id);

$instagram_image_4_id = get_post_meta($post->ID, 'instagram_image_4', true);
$instagram_image_4_url = wp_get_attachment_url($instagram_image_4_id);

$instagram_image_5_id = get_post_meta($post->ID, 'instagram_image_5', true);
$instagram_image_5_url = wp_get_attachment_url($instagram_image_5_id);

$instagram_image_6_id = get_post_meta($post->ID, 'instagram_image_6', true);
$instagram_image_6_url = wp_get_attachment_url($instagram_image_6_id);

$instagram_image_7_id = get_post_meta($post->ID, 'instagram_image_7', true);
$instagram_image_7_url = wp_get_attachment_url($instagram_image_7_id);

$instagram_image_8_id = get_post_meta($post->ID, 'instagram_image_8', true);
$instagram_image_8_url = wp_get_attachment_url($instagram_image_8_id);

$instagram_image_9_id = get_post_meta($post->ID, 'instagram_image_9', true);
$instagram_image_9_url = wp_get_attachment_url($instagram_image_9_id);

get_header();
?>

      <div class="top-pageTitle u-mb40">
        <div class="l-inner">
          <h2 class="top-pageTitle__item"><span class="js-scrollAnimation">What can we do?</span></h2>
          <p class="top-pageTitle__desc">
            <span class="js-scrollAnimation">セイアローズは価値の創造（VALUE INNOVATION）をコンセプトに</span><br>
            <span class="js-scrollAnimation">家具の新たな価値を見出し、発信することを目指します。</span>
          </p>
        </div>
      </div>

      <div class="t-page">
        <div class="l-inner">
          <a href="<?php echo $main_video_link; ?>">
            <video src="<?php echo $main_video_url; ?>" autoplay muted playsinline loop style="width: 100%;"></video>
          </a>
        </div>

        <div class="t-page-section">
          <div class="l-inner">
            <a href="<?php echo home_url(); ?>/product/">
            <div class="t-page-section--wrap"><div class="eff"></div>
              <img src="<?php echo $product_image_url; ?>" alt="Top Product Image" />
              <div class="t-page-section--wrap__item">
                <h2 class="t-page-section--wrap__item_ttl"><span class="span js-scrollAnimation">PRODUCT</span></h2>
                <span class="t-page-section--wrap__item_readmorebtn js-scrollAnimation">READ MORE  →</span>
              </div>
            </div>
            </a>
            <a href="<?php echo home_url(); ?>/made/">
            <div class="t-page-section--wrap"><div class="eff"></div>
              <img src="<?php echo $madetoorder_image_url; ?>" alt="Top MADE TO ORDER Image" />
              <div class="t-page-section--wrap__item">
                <h2 class="t-page-section--wrap__item_ttl"><span class="js-scrollAnimation">MADE TO ORDER</span></h2>
                <span class="t-page-section--wrap__item_readmorebtn js-scrollAnimation">READ MORE  →</span>
              </div>
            </div>
            </a>
            <a href="<?php echo home_url(); ?>/featured/">
            <div class="t-page-section--wrap"><div class="eff"></div>
              <img src="<?php echo $featured_image_url; ?>" alt="Top FEATURED Image" />
              <div class="t-page-section--wrap__item">
                <h2 class="t-page-section--wrap__item_ttl text-shadow"><span class="js-scrollAnimation">FEATURED</span></h2>
                <span class="t-page-section--wrap__item_readmorebtn text-shadow js-scrollAnimation">READ MORE  →</span>
              </div>
            </div>
            </a>
            <a href="<?php echo home_url(); ?>/works/">
            <div class="t-page-section--wrap"><div class="eff"></div>
              <img src="<?php echo $newworks_image_url; ?>" alt="Top NEW WORKS Image" />
              <div class="t-page-section--wrap__item">
                <h2 class="t-page-section--wrap__item_ttl text-shadow">
                  <span class="js-scrollAnimation">
                    NEW WORKS
                  </span>
                </h2>
                <span class="t-page-section--wrap__item_readmorebtn text-shadow js-scrollAnimation">READ MORE  →</span>
              </div>
            </div>
            </a>
            <div class="t-page-section--group">
              <a href="<?php echo home_url(); ?>/showroom" class="t-page-section--wrap left-image sp">
              <div><div class="eff"></div>
                <img src="<?php echo $showroom_image_url; ?>" alt="Top NEW WORKS Image" />
                <div class="t-page-section--wrap__item">
                  <h2 class="t-page-section--wrap__item_ttl text-shadow"><span class="js-scrollAnimation">SHOWROOM</span></h2>
                  <span class="t-page-section--wrap__item_readmorebtn text-shadow js-scrollAnimation">READ MORE  →</span>
                </div>
              </div>
              </a>
              <a href="<?php echo home_url(); ?>/news/" class="t-page-section--wrap right-image sp">
              <div><div class="eff"></div>
                <img src="<?php echo $news_image_url; ?>" alt="Top NEW WORKS Image" />
                <div class="t-page-section--wrap__item news-item">
                  <h2 class="t-page-section--wrap__item_ttl"><span class="js-scrollAnimation">NEWS</span></h2>
                  <span class="t-page-section--wrap__item_readmorebtn text-shadow js-scrollAnimation">READ MORE  →</span>
                </div>
              </div>
              </a>
            </div>

            <div class="flex-row">
              <div class="flex_column3 insta_ttl sp">
                <h2 class="flex-ttl"><span class="js-scrollAnimation">INSTAGRAM</span></h2>
                <span class="t-page-section--wrap__item_readmorebtn js-scrollAnimation"><a href="https://www.instagram.com/seiarrows_official/?hl=ja">READ MORE  →</a></span>
              </div>
              <div class="flex_column3 pcinsta">
                <div class="flex-column">
                  <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_1_url; ?>" alt="Top Instagram Image 01" /></a>
                  <div class="flex-row">
                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_6_url; ?>" alt="Top Instagram Image 06" /></a>
                    </div>

                    <div class="flex_column2">
                      <img src="<?php echo $instagram_image_7_url; ?>" alt="Top Instagram Image 07" />
                    </div>

                  </div>
                </div>
              </div>
              <div class="flex_column3 pcinsta">
                <div class="flex-column">
                  <div class="flex-row">
                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_2_url; ?>" alt="Top Instagram Image 02" /></a>
                    </div>

                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_3_url; ?>" alt="Top Instagram Image 03" /></a>
                    </div>

                  </div>

                  <div class="flex-row">
                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_4_url; ?>" alt="Top Instagram Image 04" /></a>
                    </div>

                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_5_url; ?>" alt="Top Instagram Image 05" /></a>
                    </div>

                  </div>

                  <div class="flex-row">
                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_8_url; ?>" alt="Top Instagram Image 08" /></a>
                    </div>

                    <div class="flex_column2">
                      <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank"><img src="<?php echo $instagram_image_9_url; ?>" alt="Top Instagram Image 09" /></a>
                    </div>

                  </div>

                </div>

              </div>
              <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank">
                <div class="spinsta">
                  <div><img src="<?php echo $instagram_image_1_url; ?>" alt="Top Instagram Image 01" /></div>
                  <div><img src="<?php echo $instagram_image_6_url; ?>" alt="Top Instagram Image 06" /></div>
                  <div><img src="<?php echo $instagram_image_7_url; ?>" alt="Top Instagram Image 07" /></div>
                  <div><img src="<?php echo $instagram_image_2_url; ?>" alt="Top Instagram Image 02" /></div>
                  <div><img src="<?php echo $instagram_image_3_url; ?>" alt="Top Instagram Image 03" /></div>
                  <div><img src="<?php echo $instagram_image_4_url; ?>" alt="Top Instagram Image 04" /></div>
                  <div><img src="<?php echo $instagram_image_5_url; ?>" alt="Top Instagram Image 05" /></div>
                  <div><img src="<?php echo $instagram_image_8_url; ?>" alt="Top Instagram Image 08" /></div>
                  <div><img src="<?php echo $instagram_image_9_url; ?>" alt="Top Instagram Image 09" /></div>
                </div><!--//spinsta-->
              </a>
            </div>


          </div>
        </div>
      </div>




      <!-- /.l-inner -->

<?php
get_footer();
