<?php
/*
 * ヘッダ部分
 */
get_template_part( 'template-parts/define_tdk' );
?>
<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if(is_front_page()): ?>
  <title>Seiarrows | <?php echo PAGE_TDK['front-page']['title']; ?></title>
  <meta name="keywords" content="セイアローズ,Seiarrows,業務用家具,インテリア,コントラクト家具,店舗用家具," />
  <meta name="description" content="<?php echo PAGE_TDK['front-page']['desc']; ?>" />
  <?php 
  elseif(is_page()): 
    if(in_array($post->post_name, array_keys(PAGE_TDK))):
  ?>
  <title>Seiarrows | <?php echo PAGE_TDK[$post->post_name]['title']; ?></title>
  <meta name="description" content="<?php echo PAGE_TDK[$post->post_name]['desc']; ?>" />
    <?php else: ?>
  <title>Sei Arrows</title>
  <?php 
    endif;
  elseif(is_singular('product')): 
    $series_list = get_the_terms($post->ID, 'series');
    $series = $series_list[0];
  ?>
  <title>Seiarrows | <?php echo $series->name; ?>　<?php echo get_post_meta($post->ID, 'japanese_name', true); ?>　<?php echo $post->post_name; ?></title>
  <meta name="description" content="<?php echo $series->name; ?>　<?php echo get_post_meta($post->ID, 'japanese_name', true); ?>の製品を紹介しています。製品画像や3DCADデータのダウンロードが可能です">
  <?php elseif(is_singular('works')): ?>
  <title>Seiarrows | WORKS <?php echo $post->post_title; ?></title>
  <meta name="description" content="セイアローズの<?php echo $post->post_title; ?> <?php echo get_post_meta($post->ID, 'construction_position', true); ?>">
  <?php elseif(is_singular('featured')): ?>
  <title>Seiarrows | FEATURED <?php echo $post->post_title; ?></title>
  <meta name="description" content="<?php echo get_post_meta($post->ID, 'catch', true); ?> <?php echo get_post_meta($post->ID, 'content1', true); ?>">
  <?php
  elseif(is_tax('series')):
    $series = get_queried_object();
  ?>
  <title>Seiarrows | <?php echo $series->name; ?>　シリーズ紹介</title>
  <meta name="description" content="<?php echo $series->name; ?>を紹介しています。<?php echo get_field('block1_maincatch', 'series_' . $series->term_id); ?>">
  <?php 
  elseif(is_archive()): 
    $post_type = get_query_var('post_type');
  ?>
  <title>Seiarrows | <?php echo PAGE_TDK[$post_type]['title']; ?></title>
  <meta name="description" content="<?php echo PAGE_TDK[$post_type]['desc']; ?>">
  <?php else: ?>
  <title>Sei Arrows</title>
  <?php endif; ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
  <meta name="format-detection" content="telephone=no">

  <!-- vendor -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
    integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
    crossorigin="anonymous" />

  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700&family=Noto+Serif+JP:wght@100;200;300;400;500;700&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;500;700&display=swap" rel="stylesheet">


  <!-- css -->
  <!-- <link rel="stylesheet" href="<?php echo get_site_url(); ?>/assets/css/style.css"> -->
  <!-- 制作中キャッシュ残らないようにjsで読み込み -->
  <script>
    var ts = (new Date()).getTime();
    document.write('<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?ver='+ts+'">');
    document.write('<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/headfoot.css?ver='+ts+'">');
 </script>

  <script type="text/javascript" id="_-s-js-_" src="//satori.segs.jp/s.js?c=52a628ef"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42912534-1', '<?php echo str_replace('http://', '', str_replace('https://', '', get_site_url())); ?>');
    ga('send', 'pageview');

  </script>
  <?php wp_head(); ?>
</head>

<body>
  <div class="l-wrapper">
    <header class="l-header">
      <?php get_template_part( 'template-parts/header' ); ?>
    </header>

    <main class="l-main">
