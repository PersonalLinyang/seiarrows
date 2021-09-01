<?php
$terms_product_category = get_terms( 'product_category',
  array(
    'hide_empty' => true,
    'orderby' => 'id',
    'order' => 'ASC',
  )
);

$terms_genre = get_terms( 'genre',
  array(
    'hide_empty' => true,
    'orderby' => 'id',
    'order' => 'ASC',
  )
);
?>
<div class="p-footer__bg">
  <div class="p-footer l-inner">

     <ul class="p-footer--social">
        <li>
          <a href="https://www.facebook.com/%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E3%82%BB%E3%82%A4%E3%82%A2%E3%83%AD%E3%83%BC%E3%82%BA-773160622746415/" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="27.9" height="27.73" viewBox="0 0 27.9 27.73">
              <defs>
                  <style>.a{fill:#fff;}</style>
              </defs>
              <path class="a" d="M27.9,14A14,14,0,1,0,11.77,27.73V18H8.23V14h3.54V10.88c0-3.5,2.08-5.43,5.27-5.43a21.7,21.7,0,0,1,3.12.27V9.15H18.4a2,2,0,0,0-2.27,2.18V14H20l-.62,4H16.13v9.75A14,14,0,0,0,27.9,14" />
            </svg>
          </a>
        </li>

        <li>
          <a href="https://www.instagram.com/seiarrows_official/?hl=ja" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="28.15" height="28.15" viewBox="0 0 28.15 28.15">
              <defs>
                  <style>.a{fill:#fff;}</style>
              </defs>
              <path class="a" d="M8.23,2.62A5.62,5.62,0,0,0,2.62,8.23V19.92a5.61,5.61,0,0,0,5.61,5.61H19.92a5.61,5.61,0,0,0,5.61-5.61V8.23a5.61,5.61,0,0,0-5.61-5.61ZM19.92,28.15H8.23A8.24,8.24,0,0,1,0,19.92V8.23A8.24,8.24,0,0,1,8.23,0H19.92a8.24,8.24,0,0,1,8.23,8.23V19.92A8.24,8.24,0,0,1,19.92,28.15Z" />
              <path class="a" d="M21.6,4.81a1.71,1.71,0,0,1,.67.14,1.75,1.75,0,0,1,.95,1,1.7,1.7,0,0,1,.13.67,1.74,1.74,0,0,1-.13.67,1.78,1.78,0,0,1-.38.57,1.73,1.73,0,0,1-.57.38,1.79,1.79,0,0,1-1.34,0,1.73,1.73,0,0,1-.57-.38A2,2,0,0,1,20,7.24a1.74,1.74,0,0,1-.13-.67A1.7,1.7,0,0,1,20,5.9a1.73,1.73,0,0,1,.38-.57A1.59,1.59,0,0,1,20.93,5,1.71,1.71,0,0,1,21.6,4.81Z" />
              <path class="a" d="M14.08,9.42a4.66,4.66,0,1,0,4.65,4.66A4.66,4.66,0,0,0,14.08,9.42Zm0,11.93a7.28,7.28,0,1,1,7.27-7.27A7.29,7.29,0,0,1,14.08,21.35Z" />
            </svg>
          </a>
        </li>

        <li>
          <a href="https://www.youtube.com/channel/UCURPDjCZV2nSGM_PAc9Qxkw" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="27.01" height="27.02" viewBox="0 0 27.01 27.02">
              <defs>
                  <style>.a{fill:#fff;}</style>
              </defs>
              <polygon class="a" points="8.7 20.12 8.7 6.9 21.92 13.51 8.7 20.12" />
              <path class="a" d="M13.51,1.61A11.9,11.9,0,1,0,25.4,13.51,11.92,11.92,0,0,0,13.51,1.61Zm0,25.41A13.51,13.51,0,1,1,27,13.51,13.52,13.52,0,0,1,13.51,27Z" />
            </svg>
          </a>
        </li>

     </ul>

     <div class="p-footerNav">
       <ul class="p-footerNav__list">
         <li><a href="<?php echo home_url(); ?>/company/">COMPANY</a></li>
         <li><a href="<?php echo home_url(); ?>/made/">MADE TO ORDER</a></li>
       </ul>
       <ul class="p-footerNav__list">
        <li><a href="<?php echo home_url(); ?>/product/">PRODUCTS</a>
          <ul>
            <li>
              <a href="<?php echo home_url(); ?>/product/">ALL</a>
            </li>
            <?php foreach($terms_product_category as $term_product_category): ?>
            <li>
              <a href="<?php echo home_url(); ?>/product/category/<?php echo $term_product_category->slug;?>/"><?php echo $term_product_category->name; ?></a>
            </li>
            <?php endforeach;?>
          </ul>
        </li>
       </ul>
       <ul class="p-footerNav__list">
         <li><a href="<?php echo home_url(); ?>/works/">WORKS</a>
          <ul>
            <li>
              <a href="<?php echo home_url(); ?>/works/">ALL</a>
            </li>
            <?php foreach($terms_genre as $term_genre): ?>
            <li>
              <a href="<?php echo home_url(); ?>/works/genre/<?php echo $term_genre->slug;?>/"><?php echo $term_genre->name; ?></a>
            </li>
            <?php endforeach;?>
          </ul>
        </li>
       </ul>
       <ul class="p-footerNav__list">
        <li>
          <a href="<?php echo home_url(); ?>/featured/">FEATURED</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/contact/">CONTACT</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/showroom/">SHOWROOM</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/maintenance/">MAINTENANCE</a>
        </li>

        <li>
          <a href="<?php echo home_url(); ?>/maintenance/#sec02">GUARANTEE</a>
        </li>
        <!-- <li>
          <a href="<?php echo home_url(); ?>/guarantee/">GUARANTEE</a>
        </li> -->
       </ul>
       <ul class="p-footerNav__list">
        <li>
          <a href="http://seiarrows.blog.fc2.com/" target="_blank">BLOG</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/recruit/">RECRUIT</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/privacy/">LEGAL NOTE</a>
        </li>
        <li>
          <a href="<?php echo home_url(); ?>/privacy/#privacy_policy_title">PRIVACY POLICY</a>
        </li>
        <li>
        <div class="catalog-dwl">
          <a href="https://seiarrows.com/web_catalogue/" target="_blank">DIGITAL CATALOG</a>
        </div>
        </li>
       </ul>
     </div>

     <!-- /.p-footerNav -->

     <p class="c-copyright"><small>Copyright (C) 2021 Seiarrows co,.ltd All rights reserved.</small></p>
  </div>
  <!-- /.p-footer -->
</div>
  <!-- /.p-footer__bg -->
