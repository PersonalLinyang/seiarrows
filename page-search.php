<?php

global $wpdb;

get_template_part( 'template-parts/define_tdk' );

$keyword = trim($_GET['keyword']);
$result_list = array();

$total_count = 0;
$page_number = 0;

if($keyword) {
	// 固定ページ
	foreach(PAGE_TDK as $page_key => $page_title) {
		if(strpos($page_title['title'], $keyword) !== false) {
			if($page_key == 'front-page') {
				$result_list[$page_title['search_order']] = array(array(
					'url' => '/',
					'title' => $page_title['title'],
				));
				$total_count++;
			} else {
				$result_list[$page_title['search_order']] = array(array(
					'url' => '/' . $page_key . '/',
					'title' => $page_title['title'],
				));
				$total_count++;
			}
		}
	}

	// WORKS詳細
	$sql_works_detail = "SELECT t_title.* FROM ";
	$sql_works_detail .= "(SELECT wp.post_name url, ";
	$sql_works_detail .= "CONCAT('WORKS ', wp.post_title) title ";
	$sql_works_detail .= "FROM wp_posts wp ";
	$sql_works_detail .= "WHERE wp.post_type='works' AND wp.post_status='publish' ";
	$sql_works_detail .= "ORDER BY (wp.post_name + 0)) t_title ";
	$sql_works_detail .= "WHERE t_title.title LIKE '%" . $keyword . "%';"; 
	$result_works_detail = $wpdb->get_results( $wpdb->prepare($sql_works_detail) );
	if(is_array($result_works_detail)) {
		if(count($result_works_detail)) {
			$result_list[7] = array();
			foreach($result_works_detail as $works_detail_key => $works_detail) {
				$result_list[7][] = array(
					'url' => '/works/detail/' . $works_detail->url . '/',
					'title' => $works_detail->title,
				);
				$total_count++;
			}
		}
	}

	// FEATURED詳細
	$sql_featured_detail = "SELECT t_title.* FROM ";
	$sql_featured_detail .= "(SELECT wp.post_name url, ";
	$sql_featured_detail .= "CONCAT('FEATURED ', wp.post_title) title ";
	$sql_featured_detail .= "FROM wp_posts wp ";
	$sql_featured_detail .= "WHERE wp.post_type='featured' AND wp.post_status='publish' ";
	$sql_featured_detail .= "ORDER BY (wp.post_name + 0)) t_title ";
	$sql_featured_detail .= "WHERE t_title.title LIKE '%" . $keyword . "%';"; 
	$result_featured_detail = $wpdb->get_results( $wpdb->prepare($sql_featured_detail) );
	if(is_array($result_featured_detail)) {
		if(count($result_featured_detail)) {
			$result_list[10] = array();
			foreach($result_featured_detail as $featured_detail_key => $featured_detail) {
				$result_list[10][] = array(
					'url' => '/featured/' . $featured_detail->url . '/',
					'title' => $featured_detail->title,
				);
				$total_count++;
			}
		}
	}

	// シリーズ詳細
	$sql_series_detail = "SELECT t_title.* FROM ";
	$sql_series_detail .= "(SELECT wt.name url, ";
	$sql_series_detail .= "CONCAT(wt.name, '　シリーズ紹介') title ";
	$sql_series_detail .= "FROM wp_terms wt ";
	$sql_series_detail .= "LEFT JOIN wp_term_taxonomy wtt ON wt.term_id = wtt.term_id ";
	$sql_series_detail .= "WHERE wtt.taxonomy = 'series' AND count > 0) t_title ";
	$sql_series_detail .= "WHERE t_title.title LIKE '%" . $keyword . "%';";
	$result_series_detail = $wpdb->get_results( $wpdb->prepare($sql_series_detail) );
	if(is_array($result_series_detail)) {
		if(count($result_series_detail)) {
			$result_list[16] = array();
			foreach($result_series_detail as $series_detail_key => $series_detail) {
				$result_list[16][] = array(
					'url' => '/product/series/' . $series_detail->url . '/',
					'title' => $series_detail->title,
				);
				$total_count++;
			}
		}
	}

	// 製品詳細
	$sql_product_detail = "SELECT t_title.* FROM ";
	$sql_product_detail .= "(SELECT wp.post_name url, ";
	$sql_product_detail .= "CONCAT(t_series.name, '　', t_jn.meta_value, '　', wp.post_name) title ";
	$sql_product_detail .= "FROM wp_posts wp ";
	$sql_product_detail .= "LEFT JOIN ";
	$sql_product_detail .= "(SELECT wtr.object_id, wt.name ";
	$sql_product_detail .= "FROM wp_term_relationships wtr ";
	$sql_product_detail .= "LEFT JOIN wp_term_taxonomy wtt ON wtr.term_taxonomy_id = wtt.term_taxonomy_id ";
	$sql_product_detail .= "LEFT JOIN wp_terms wt ON wtt.term_id = wt.term_id ";
	$sql_product_detail .= "WHERE wtt.taxonomy = 'series') t_series ON wp.ID = t_series.object_id ";
	$sql_product_detail .= "LEFT JOIN (SELECT post_id, meta_value FROM wp_postmeta WHERE meta_key = 'japanese_name') t_jn ON wp.ID = t_jn.post_id ";
	$sql_product_detail .= "WHERE wp.post_type='product' AND wp.post_status='publish') t_title ";
	$sql_product_detail .= "WHERE t_title.title LIKE '%" . $keyword . "%';"; 
	$result_product_detail = $wpdb->get_results( $wpdb->prepare($sql_product_detail) );
	if(is_array($result_product_detail)) {
		if(count($result_product_detail)) {
			$result_list[17] = array();
			foreach($result_product_detail as $product_detail_key => $product_detail) {
				$result_list[17][] = array(
					'url' => '/product/detail/' . $product_detail->url . '/',
					'title' => $product_detail->title,
				);
				$total_count++;
			}
		}
	}

	ksort($result_list);

	$page_number = ceil($total_count / 10);
}

get_header();
?>

      <div class="l-inner p-search-result">

        
        <?php if(!$keyword): ?>
        <div class="p-pageTop--ttl p-search-result__ttl">
          <h2 class="p-pageTop--ttl__hdg">
            フリーワード検索
          </h2>
        </div>
        <?php endif; ?>

        <form class="search-form" action="" method="get" role="search">
          <div class="search-form-wrap">
            <input class="search-input" type="text" placeholder="" value="<?php echo $keyword; ?>" name="keyword" />
            <button class="search-submit" type="button">
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

        <?php if($keyword): ?>
        <div class="p-pageTop--ttl p-search-result__ttl">
          <h2 class="p-pageTop--ttl__hdg">
            「<?php echo $keyword; ?>」の検索結果
          </h2>
        </div>
        <?php endif; ?>

        <ul class="p-search-result__List">
          <?php 
          $counter_per_page=0;
          $page=1;
          foreach($result_list as $result_key => $result_sub_list):
            foreach($result_sub_list as $result_sub_key => $result):
          ?>
          <li class="p-search-result__List__item" data-page="<?php echo $page; ?>" <?php if($page > 1) { echo 'style="display:none"'; } ?>>
            <a href="<?php echo get_site_url() . $result['url']; ?>" target="_blank"><?php echo $result['title']; ?></a>
          </li>
          <?php 
            $counter_per_page++;
            if($counter_per_page == 10) {
              $page++;
              $counter_per_page = 0;
            }
            endforeach;
          endforeach;
          ?>
        </ul>

        <?php if($page_number > 1): ?>
        <div class="pager">
          <ul class="pagination" data-page_number="<?php echo $page_number; ?>">
              <li class="pre" style="display:none"><a><span>«</span></a></li>
              <?php for($counter = 1; $counter <= $page_number; $counter++): ?>
              <li class="pager_handle<?php if($counter==1) { echo ' active'; }?>" data-page="<?php echo $counter; ?>">
                <a<?php if($counter==1) { echo ' class="active"'; }?>><span><?php echo $counter; ?></span></a>
              </li>
              <?php endfor; ?>
              <li class="next"><a><span>»</span></a></li>
          </ul>
          </div>
          <?php endif; ?>

      <!-- /.l-inner -->

    </div>

<?php

get_footer();
