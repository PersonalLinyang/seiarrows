<?php

/*
 * NEWSカスタム投稿タイプ追加
 */
function create_news_type() {
	// 記事タイプ「NEWS」追加
	register_post_type('news',
		array(
			'labels' => array(
				'name' => 'NEWS',
				'add_new_item' => '新規NEWSを追加',
				'edit_item' => 'NEWSを編集',
				'new_item' => '新規NEWS',
				'view_item' => 'NEWSを表示',
				'search_items' => 'NEWSを検索'
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 25, 
			'supports' => [
				'title',
				'editor',
				'custom-fields',
			]
		)
	);
}
add_action('init', 'create_news_type');

/*
 * ワークスカスタム投稿タイプと関連タクソノミー追加
 */
function create_works_type() {
	// 記事タイプ「ワークス」追加
	register_post_type('works',
		array(
			'labels' => array(
				'name' => 'ワークス',
				'add_new_item' => '新規ワークスを追加',
				'edit_item' => 'ワークスを編集',
				'new_item' => '新規ワークス',
				'view_item' => 'ワークスを表示',
				'search_items' => 'ワークスを検索'
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 26, 
			'supports' => [
				'title',
				'custom-fields',
			]
		)
	);

	// タクソノミー「ジャンル」追加
	register_taxonomy( 
		'genre',
		array('works'),
		array(
			'meta_box_cb' => 'post_categories_meta_box',
			'labels' => array(
				'name' => 'ジャンル',
				'edit_item' => '編集',
				'update_item' => '更新',
				'add_new_item' => '新規ジャンルを追加'
			),
		) 
	);
}
add_action('init', 'create_works_type');

/*
 * 商品カスタム投稿タイプと関連タクソノミー追加
 */
function create_products_type() {
	// 記事タイプ「商品」追加
	register_post_type('product',
		array(
			'labels' => array(
				'name' => '商品',
				'add_new_item' => '新規商品を追加',
				'edit_item' => '商品を編集',
				'new_item' => '新規商品',
				'view_item' => '商品を表示',
				'search_items' => '商品を検索'
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 27, 
			'supports' => [
				'title',
				'custom-fields',
			]
		)
	);

	// タクソノミー「カテゴリ」追加
	register_taxonomy( 
		'product_category',
		array('product'),
		array(
			'meta_box_cb' => 'post_categories_meta_box',
			'labels' => array(
				'name' => 'カテゴリ',
				'edit_item' => '編集',
				'update_item' => '更新',
				'add_new_item' => '新規カテゴリを追加'
			),
		) 
	);

	// タクソノミー「シリーズ」追加
	register_taxonomy( 
		'series',
		array('product'),
		array(
			'meta_box_cb' => 'post_categories_meta_box',
			'labels' => array(
				'name' => 'シリーズ',
				'edit_item' => '編集',
				'update_item' => '更新',
				'add_new_item' => '新規シリーズを追加'
			),
		) 
	);
}
add_action('init', 'create_products_type');

/*
 * FEATUREDカスタム投稿タイプ追加
 */
function create_featured_type() {
	// 記事タイプ「FEATURED」追加
	register_post_type('featured',
		array(
			'labels' => array(
				'name' => 'FEATURED',
				'add_new_item' => '新規FEATUREDを追加',
				'edit_item' => 'FEATUREDを編集',
				'new_item' => '新規FEATURED',
				'view_item' => 'FEATUREDを表示',
				'search_items' => 'FEATUREDを検索'
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 28, 
			'supports' => [
				'title',
				'custom-fields',
			]
		)
	);
}
add_action('init', 'create_featured_type');

/*
 * 管理画面にサムネイルの設定を入れる
 */
add_theme_support( 'post-thumbnails' ); 

/*
 * 一般設定「3D&CADダウンロードパスワード」追加
 */
function add_3d_cad_key_field() {
	add_settings_field( '3d_cad_key', '3D&CADダウンロードパスワード', 'display_3d_cad_key', 'general' );
	register_setting( 'general', '3d_cad_key' );
}
add_filter( 'admin_init', 'add_3d_cad_key_field' );
function display_3d_cad_key() {
	$threed_cad_key = get_option( '3d_cad_key' );
?>
	<input name="3d_cad_key" id="3d_cad_key" type="text" value="<?php echo esc_html( $threed_cad_key ); ?>" class="regular-text">
<?php
}

/*
 * Ajax送信先URL設定
 */
function add_my_ajaxurl() {
?>
	<script>
		var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
	</script>
<?php
}
add_action( 'wp_head', 'add_my_ajaxurl', 1 );

/*
 * 製品リスト取得Ajax処理
 */
function func_get_product_list(){
	$data_list = array();
	$error_list = array();

	$sql = "SELECT DISTINCT wp.ID post_id, wp.post_name, t_series.term_id series_id, t_series.slug series_slug, t_series.name series_name ";
	$sql .= "FROM wp_posts wp ";
	$sql .= "LEFT JOIN ";
	$sql .= "(SELECT wtr.object_id, wt.term_id, wt.slug, wt.name ";
	$sql .= "FROM wp_term_relationships wtr ";
	$sql .= "LEFT JOIN wp_term_taxonomy wtt ON wtr.term_taxonomy_id = wtt.term_taxonomy_id ";
	$sql .= "LEFT JOIN wp_terms wt ON wt.term_id = wtt.term_id ";
	$sql .= "WHERE wtt.taxonomy='series') t_series ON t_series.object_id = wp.ID ";
	if(in_array('product_category', array_keys($_GET))) {
		$sql .= "LEFT JOIN ";
		$sql .= "(SELECT wtr.object_id, wt.term_id ";
		$sql .= "FROM wp_term_relationships wtr ";
		$sql .= "LEFT JOIN wp_term_taxonomy wtt ON wtr.term_taxonomy_id = wtt.term_taxonomy_id ";
		$sql .= "LEFT JOIN wp_terms wt ON wt.term_id = wtt.term_id ";
		$sql .= "WHERE wtt.taxonomy='product_category') t_category ON t_category.object_id = wp.ID ";
	}
	$sql .= "WHERE wp.post_type='product' ";
	$sql .= "AND wp.post_status='publish' ";
	if(in_array('first_letter', array_keys($_GET))) {
		$sql .= "AND (t_series.name LIKE '" . $_GET['first_letter'] . "%' OR t_series.name LIKE '" . $_GET['first_letter'] . "%') ";
	}
	if(in_array('key_word', array_keys($_GET))) {
		$sql .= "AND (wp.post_name LIKE '%" . $_GET['key_word'] . "%' ";
		$sql .= "OR t_series.name LIKE '%" . $_GET['key_word'] . "%' ";
		$sql .= "OR t_series.term_id in (SELECT term_id FROM wp_termmeta WHERE meta_value LIKE '%" . $_GET['key_word'] . "%' and meta_key = 'hiragana')) ";
	}
	if(in_array('product_category', array_keys($_GET))) {
		$sql .= "AND t_category.term_id = " . $_GET['product_category'] . " ";
	}
	$sql .= "ORDER BY t_series.name ASC, wp.post_name ASC";

	global $wpdb;
	$result_list = $wpdb->get_results( $wpdb->prepare($sql) );
	$series_list = array();
	$series_count = -1;
	$product_count = -1;

	foreach ($result_list as $result) {
		if(!in_array($result->series_id, $series_list)) {
			array_push($series_list, $result->series_id);
			$product_count = -1;
			$series_count++;
			$series_image = get_field('thumbnail', 'series_' . $result->series_id);
			$series_image_url = wp_get_attachment_url($series_image['ID']);
			$data_list[$series_count] = array(
				'slug' => $result->series_slug,
				'name' => $result->series_name,
				'image' => $series_image_url,
				'url' => get_site_url() . '/product/series/' . $result->series_slug . '/',
				'product_list' => array()
			);
		}
		$product_count++;
		$product_image_id = get_post_meta($result->post_id, 'thumbnail', true);
		$product_image_url = wp_get_attachment_url($product_image_id);
		$data_list[$series_count]['product_list'][$product_count] = array(
			'id' => $result->post_id, 
			'post_name' => $result->post_name,
			'product_name' => str_replace('-0000', '', $result->post_name),
			'url' => get_site_url() . '/product/detail/' . $result->post_name . '/',
			'image' => $product_image_url
		);
	}
	
	$response = array(
		'result' => true,
		'data_list' => $data_list,
		'errors' => $error_list,
	);
	echo json_encode($response);

	// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
	die();
}
add_action('wp_ajax_get_product_list', 'func_get_product_list');
add_action('wp_ajax_nopriv_get_product_list', 'func_get_product_list');

/*
 * 製品詳細からImage Photoでファイル画像をZIPかしてダウンロード
 */
function func_zip_product_image(){
	$upload_dir = wp_upload_dir();
	$post_id = $_GET['product'];
	$target_list = $_GET['target'];
	$zip_id = uniqid();
	
	$zip = new ZipArchive;
	$zip->open($upload_dir['basedir'] . '/' . $zip_id . '.zip', ZipArchive::CREATE|ZipArchive::OVERWRITE);

	foreach($target_list as $key => $target) {
		$target_id = get_post_meta($post_id, $target, true);
		$target_path = get_attached_file($target_id);
		$zip->addFile($target_path, $target . '.' . end(explode('.', $target_path)));
	}

	$result = $zip->close();
	
	$response = array(
		'result' => $result,
		'zip_id' => $zip_id,
		'zip_url' => $upload_dir['baseurl'] . '/' . $zip_id . '.zip',
	);
	echo json_encode($response);

	die();
}
add_action('wp_ajax_zip_product_image', 'func_zip_product_image');
add_action('wp_ajax_nopriv_zip_product_image', 'func_zip_product_image');

/*
 * Image PhotoのZIP削除
 */
function func_zip_product_image_del(){
	$upload_dir = wp_upload_dir();
	$zip_id = $_GET['zip_id'];
	$result = unlink($upload_dir['basedir'] . '/' . $zip_id . '.zip');
	
	$response = array(
		'result' => $result,
	);
	echo json_encode($response);

	die();
}
add_action('wp_ajax_zip_product_image_del', 'func_zip_product_image_del');
add_action('wp_ajax_nopriv_zip_product_image_del', 'func_zip_product_image_del');

/*
 * 3D&CADダウンロードパスワードチェック
 */
function func_download_3d_cad(){
	$result = false;
	$zip_url = '';
	$password = $_GET['password'];
	$threed_cad_key = get_option( '3d_cad_key' );

	if($password == $threed_cad_key) {
		$result = true;
		$product = $_GET['product'];
		$zip_id = get_post_meta($product, '3d_cad', true);
		$zip_url = wp_get_attachment_url($zip_id);
	}

	$response = array(
		'result' => $result,
		'zip_url' => $zip_url,
	);
	echo json_encode($response);

	die();
}
add_action('wp_ajax_download_3d_cad', 'func_download_3d_cad');
add_action('wp_ajax_nopriv_download_3d_cad', 'func_download_3d_cad');

/*
 * ワークスリスト取得Ajax処理
 */
function func_get_works_list(){
	$data_list = array();
	$error_list = array();

	$sql = "SELECT DISTINCT wp.ID post_id, wp.post_name, wp.post_title, wp.post_date ";
	$sql .= "FROM wp_posts wp ";
	$sql .= "LEFT JOIN ";
	$sql .= "(SELECT wtr.object_id, wt.term_id, wt.slug, wt.name ";
	$sql .= "FROM wp_term_relationships wtr ";
	$sql .= "LEFT JOIN wp_term_taxonomy wtt ON wtr.term_taxonomy_id = wtt.term_taxonomy_id ";
	$sql .= "LEFT JOIN wp_terms wt ON wt.term_id = wtt.term_id ";
	$sql .= "WHERE wtt.taxonomy='genre') t_genre ON t_genre.object_id = wp.ID ";
	$sql .= "WHERE wp.post_type='works' ";
	$sql .= "AND wp.post_status='publish' ";
	if(in_array('key_word', array_keys($_GET))) {
		$sql .= "AND wp.post_title LIKE '%" . $_GET['key_word'] . "%' ";
	}
	if(in_array('genre', array_keys($_GET))) {
		$sql .= "AND t_genre.term_id = " . $_GET['genre'] . " ";
	}
	$sql .= "ORDER BY wp.post_date DESC";

	global $wpdb;
	$result_list = $wpdb->get_results( $wpdb->prepare($sql) );

	$works_list = array();
	$works_count = -1;

	foreach ($result_list as $result) {
		$works_count++;
		$works_image_id = get_post_meta($result->post_id, 'image1', true);
		$works_image_url = wp_get_attachment_url($works_image_id);
		$works_list[$works_count] = array(
			'id' => $result->post_id, 
			'post_name' => $result->post_name,
			'works_name' => $result->post_title,
			'url' => get_site_url() . '/works/detail/' . $result->post_name . '/',
			'image' => $works_image_url
		);
	}
	
	$response = array(
		'result' => true,
		'data_list' => $works_list,
		'errors' => $error_list,
	);
	echo json_encode($response);

	// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
	die();
}
add_action('wp_ajax_get_works_list', 'func_get_works_list');
add_action('wp_ajax_nopriv_get_works_list', 'func_get_works_list');

/*
 * リライトルール設定
 */
function custom_rewrite_basic(){
	//製品タイプページ
	add_rewrite_rule('product/category/(.+)/?$', 'index.php?product_category=$matches[1]', 'top');
	//製品シリーズページ
	add_rewrite_rule('product/series/(.+)/?$', 'index.php?series=$matches[1]', 'top');
	//ワークスジャンルページ
	add_rewrite_rule('works/genre/(.+)/?$', 'index.php?genre=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_basic');

/*
 * 自動補完リダイレクトを禁止
 */
function disable_redirect_canonical( $redirect_url ) {
  if( is_404() ) {
    return false;
  }
  return $redirect_url;
}
add_filter( 'redirect_canonical', 'disable_redirect_canonical' );

//「プレビュー」ボタンを非表示
function admin_preview_css_custom() {
    $current_screen = get_current_screen();
    if(isset($current_screen) && (
    $current_screen->post_type === 'news'
    ) ) {
        $style = '<style>#preview-action {display: none;}</style>';
        echo $style;
    }
}
add_action('admin_print_styles', 'admin_preview_css_custom');

/*
 * スラッグの自動小文字化を無効にして、大文字を保存できるようにする
 */
function use_capital_letter_in_slug($title) {
	$title = strip_tags($title);
	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
	$title = str_replace('%', '', $title);
	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
	$title = remove_accents($title);
	if (seems_utf8($title)) {
		$title = utf8_uri_encode($title, 200);
	}
	$title = preg_replace('/&.+?;/', '', $title);
	$title = str_replace('.', '-', $title);
	$title = preg_replace('/[^%a-zA-Z0-9 _-]/', '', $title);
	$title = preg_replace('/\s+/', '-', $title);
	$title = preg_replace('|-+|', '-', $title);
	$title = trim($title, '-');
	return $title;
}
remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
add_filter( 'sanitize_title', 'use_capital_letter_in_slug' );