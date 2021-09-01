<?php

$genre_now = get_the_terms($post->ID, 'genre')[0];

$terms_genre = get_terms( 'genre',
  array(
    'hide_empty' => true,
    'orderby' => 'id',
    'order' => 'ASC',
  )
);

$series_link_list = array();
for($i = 1; $i <= 5; $i++) {
	$series_link_id = get_field('series' . $i . '_link_no', $post->ID);
	if($series_link_id) {
		$series_link = get_term_by('id', $series_link_id, 'series');
		if($series_link) {
			$series_link_list[$i] = array(
				'name' => $series_link->name,
			);
		}
	}
}

$image_list = array();
for($i = 1; $i <= 10; $i++) {
	$image = get_field('image' . $i, $post->ID);
	if($image) {
		$image_list[$i] = $image['url'];
	}
}

$recommend_list = array();
$args = array(
	'post__not_in' => array($post -> ID),
	'posts_per_page'=> 4,
	'post_type' => 'works',
	'orderby' => 'post_date',
	'order' => 'DESC'
);
$recommends = get_posts( $args );
foreach($recommends as $recommend_key => $recommend) {
	$recommend_list[$recommend_key] = array(
		'slug' => $recommend->post_name,
		'name' => $recommend->post_title,
		'image' => get_field('image1', $recommend->ID)['url'],
	);
}


get_header();
?>

      <div class="p-worksDetail">

        <div class="l-inner">

          <div class="p-worksTop--ttl u-mb50">
            <h2 class="p-worksTop--ttl__hdg">
              WORKS
            </h2>
            <form class="search-form" action="/works/" method="get" role="search">
              <div class="search-form-wrap">
                <input class="search-input" name="key_word" type="text" placeholder="" />
                <button class="search-submit" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18.61" height="24.47" viewBox="0 0 18.61 24.47">
                    <defs>
                        <style>.cls-1{fill:none;stroke:#1a1311;stroke-linecap:round;stroke-miterlimit:10;stroke-width:1.42px;}</style>
                    </defs>
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="header">
                            <path class="cls-1" d="M9.3.71A8.54,8.54,0,0,1,11,.87a9.06,9.06,0,0,1,1.61.49,8.55,8.55,0,0,1,1.49.8,8.72,8.72,0,0,1,2.37,2.37,8.59,8.59,0,0,1,1.28,3.1,8.34,8.34,0,0,1,0,3.35,8.3,8.3,0,0,1-.49,1.61,8.5,8.5,0,0,1-.79,1.49,8.72,8.72,0,0,1-2.37,2.37,8.5,8.5,0,0,1-1.49.79,8.3,8.3,0,0,1-1.61.49,8.34,8.34,0,0,1-3.35,0,8.59,8.59,0,0,1-3.1-1.28,7.88,7.88,0,0,1-1.3-1.07,8.31,8.31,0,0,1-1.07-1.3,8.55,8.55,0,0,1-.8-1.49A9.06,9.06,0,0,1,.87,11a8.85,8.85,0,0,1,0-3.35A9.17,9.17,0,0,1,1.36,6a8.46,8.46,0,0,1,.8-1.48,8.31,8.31,0,0,1,1.07-1.3,7.88,7.88,0,0,1,1.3-1.07A8.46,8.46,0,0,1,6,1.36,9.17,9.17,0,0,1,7.63.87,8.51,8.51,0,0,1,9.3.71Z" />
                            <line class="cls-1" x1="14.2" y1="17.26" x2="17.9" y2="23.76" />
                        </g>
                    </g>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <div class="p-worksTop--submenu">
            <ul class="p-worksTop--submenu__nav u-mt30 u-mb50">
              <li><a href="<?php echo home_url(); ?>/works/">ALL</a></li>
              <?php foreach($terms_genre as $term_genre): ?>
              <li<?php if($term_genre->term_id == $genre_now->term_id): ?> class="is_active"<?php endif; ?>>
                <a href="<?php echo home_url(); ?>/works/genre/<?php echo $term_genre->slug; ?>/"><?php echo $term_genre->name; ?></a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>


          <div class="p-worksDetail--wrap u-mt60">
            <div class="p-worksDetail--wrap__ttl">
              <h3 class="p-worksDetail--wrap__ttl__hdg">
                <?php echo $post->post_title; ?>
                <span><?php echo get_post_meta($post->ID, 'construction_position', true); ?></span>
              </h3>

              <?php if(count($series_link_list)): ?>
              <div class="p-worksDetail--wrap__list u-mb30">
                <h4 class="p-worksDetail--wrap__list__ttl">ITEM</h4>
                <ul class="p-worksDetail--wrap__list__item">
                  <?php foreach($series_link_list as $series_link_key => $series_link): ?>
                  <li><a href="<?php echo home_url(); ?>/product/series/<?php echo $series_link['name']; ?>"><?php echo $series_link['name']; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>

              <div class="p-worksDetail--wrap__imagegroup">
              	<?php foreach($image_list as $image_key => $image): ?>
                <div class="p-worksDetail--wrap__imagegroup__item u-mb30">
                  <img src="<?php echo $image; ?>" alt="Works Detail Image <?php echo $image_key; ?>" />
                </div>
                <?php endforeach; ?>
              </div>
            </div>

          </div>

          <div class="p-worksDetail--sectiondetail">
            <h5 class="p-worksDetail--sectiondetail__ttl">
              DETAILS
            </h5>
            <p class="p-worksDetail--sectiondetail__desc">
              <?php echo get_post_meta($post->ID, 'details', true); ?><br>
              <a target="_blank" href="<?php echo get_post_meta($post->ID, 'link', true); ?>"><?php echo get_post_meta($post->ID, 'link', true); ?></a>
            </p>
          </div>

          <div class="p-worksDetail--sectionrecommend">
            <h5 class="p-worksDetail--sectionrecommend__ttl">
              RECOMMEND
            </h5>
            <ul class="p-worksDetail--sectionrecommend__imagegroup u-mb40">
              <?php foreach($recommend_list as $recommend_key => $recommend): ?>
              <li class="p-worksDetail--sectionrecommend__imagegroup__imagewrap u-mr40">
              	<a href="<?php echo home_url(); ?>/works/detail/<?php echo $recommend['slug']; ?>/">
              	  <img src="<?php echo $recommend['image']; ?>" alt="Works Detail Image <?php echo $recommend_key; ?>">
              	  <span><?php echo $recommend['name']; ?></span>
              	</a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>


        </div>
        <!-- /.l-inner -->

      </div>

<?php

get_footer();
