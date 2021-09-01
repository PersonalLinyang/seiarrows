<?php

if(!$_GET['target']) {
	get_template_part('404');
	die();
} else {
	$product = get_post($_GET['target'], 'product');
	if(!$product) {
		get_template_part('404');
		die();
	}
}

get_header();
?>
      <div class="l-inner">

        <div class="p-productName u-mb50">
          <h2 class="p-productName__hdg p-contact__hdg p-download__hdg">
            <em class="en">「<?php echo get_post_meta($product->ID, 'japanese_name', true); ?>」の<br>3D&amp;CADデータ ダウンロード</em>
          </h2>

        </div>

        <div class="p-downloadArea">
          <p class="p-downloadArea__text">▼ すでに登録がお済みの方はパスワードを入力してください。</p>
          <div class="p-downloadArea__input__wrap">
            <input type="hidden" id="product_id" value="<?php echo $product->ID;?>"/>
            <input class="p-downloadArea__input__text u-mt15 u-mb15" type="password">
            <div><input class="p-downloadArea__input__button" type="button" value="ダウンロード"></div>
          </div>
        </div>

      <p>▼ 初めての方はこちらから情報を入力ください。</p>
      <div id="satori__creative_container" class="satori__creative_container u-mt0">
        <script id="-_-satori_creative-_-" src="//delivery.satr.jp/js/creative_set.js" data-key="3901cc03229bc201"></script>
      </div>
      <!-- /.l-inner -->

    </div>
<?php

get_footer();
