<?php
$featured_list = get_posts(
	array(
		'post_type'=>'featured', 
		'post_status' => 'publish', 
		'posts_per_page' => -1, 
		'orderby' => 'date',
		'order' => 'DESC',
	)
);

get_header();
?>

      <div class="p-featuredTop">
        <h2 class="p-featuredTop--ttl">FEATURED</h2>   
        <div class="p-featuredTop--section">     
          <?php foreach($featured_list as $featured_key => $featured): ?>
          <?php if($featured_key == 1): ?>
          <h3 class="p-featuredTop--section__ttl"><span>INDEX</span></h3>
          <?php endif; ?>
          <div class="p-featuredTop--section--wrap">
            <a href="<?php echo get_site_url(); ?>/featured/<?php echo $featured->post_name; ?>/">
              <?php $thumbnail_id = get_post_meta($featured->ID, 'thumbnail', true); ?>
              <img src="<?php echo wp_get_attachment_url($thumbnail_id); ?>" alt="<?php echo $featured->post_title; ?> Image" />
              <div class="p-featuredTop--item">
                <h5 class="p-featuredTop--item__subttl text-shadow"><?php echo get_post_meta($featured->ID, 'sub_title', true); ?></h5>
                <h2 class="p-featuredTop--item__ttl text-shadow"><?php echo $featured->post_title; ?></h2>
                <span class="p-featuredTop--item__date text-shadow"><?php echo get_the_time( 'Y/m/d', $featured->ID ); ?></span>              
              </div>
            </a>            
          </div>
          <?php endforeach; ?>

        </div>

      </div>

<?php

get_footer();
