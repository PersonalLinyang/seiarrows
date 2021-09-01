<?php
$news_list = get_posts(
	array(
		'post_type'=>'news', 
		'post_status' => 'publish', 
		'posts_per_page' => -1, 
    'orderby' => 'date',
    'order' => 'DESC',
	)
);

get_header();
?>

      <div class="p-pageTop">

        <div class="l-inner">

          <div class="p-pageTop--ttl">
            <h2 class="p-pageTop--ttl__hdg">   
              NEWS           
            </h2>            
          </div>   

          <?php foreach($news_list as $news): ?>
          <div class="p-pageTop--wrap news_border">
            <div class="p-pageTop--wrap__leftwrap">
              <h4 class="p-pageTop--wrap__leftwrap--ttl news_padding_top"><?php echo $news->post_title; ?></h4>
              <span class="p-pageTop--wrap__leftwrap--date"><?php echo get_the_time( 'Y/m/d', $news->ID ); ?></span>
            </div>
            <div class="p-pageTop--wrap__rightwrap">
              <div class="p-pageTop--wrap__rightwrap--item">
                <p class="p-pageTop--wrap__rightwrap--item__desc">
                  <?php echo nl2br($news->post_content); ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
        <!-- /.l-inner -->
  
      </div>         

<?php

get_footer();
