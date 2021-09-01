<?php
$terms_product_category = get_terms( 'product_category',
  array(
    'hide_empty' => true,
    'orderby' => 'id',
    'order' => 'ASC',
  )
);
?>



<!-- ローディング画面 -->
<div id="loading">
  <div class="spinner"><p>loading...</p></div>
</div>

      <div class="p-productTop">

        <div class="l-inner">

          <div class="p-productTop--ttl u-mb50">
            <h2 class="p-productTop--ttl__hdg">
              PRODUCTS
            </h2>
            <form class="search-form" action="" method="get" role="search">
              <div class="search-form-wrap">
                <input class="search-input" type="text" placeholder="" />
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
          </div>


          <div class="p-productTop--submenu">
            <ul class="p-productTop--submenu__nav u-mt30 u-mb50">
              <li <?php if(!is_tax('product_category')): ?>class="is_active"<?php endif; ?>>
                <a href="<?php echo home_url(); ?>/product/">ALL</a>
              </li>
              <?php foreach($terms_product_category as $term_product_category): ?>
              <li <?php if(is_tax('product_category', $term_product_category->slug)): ?>class="is_active"<?php endif; ?>>
                <a href="<?php echo home_url(); ?>/product/category/<?php echo $term_product_category->slug;?>/"><?php echo $term_product_category->name; ?></a>
              </li>
              <?php endforeach;?>
            </ul>
          </div>

          <div class="p-productTop--abcmenu">
            <ul class="p-productTop--abcmenu__nav u-mt30 u-mb50">
              <li><a class="p-productTop--abcmenu__nav__item">A</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">B</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">C</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">D</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">E</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">F</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">G</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">H</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">I</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">J</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">K</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">L</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">M</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">N</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">O</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">P</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">Q</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">R</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">S</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">T</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">U</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">V</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">W</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">X</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">Y</a></li>
              <li><a class="p-productTop--abcmenu__nav__item">Z</a></li>
            </ul>
          </div>


          <div class="p-productTop--image">
          </div>


        </div>
        <!-- /.l-inner -->

      </div>
