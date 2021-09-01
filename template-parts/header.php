<div class="p-header">
  <p>
    <a class="icon" href="<?php echo get_site_url(); ?>/">
      <img src="<?php echo get_theme_file_uri('/assets/img/common/logo.svg'); ?>" alt="SEI ARROWS" width="167" height="42">
    </a>
  </p>
  <nav class="p-nav">
    <ul class="p-navList">
      <li class="p-nav__item <?php if(is_page('company')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/company/">COMPANY</a>
      </li>
      <li class="p-nav__item <?php if(is_post_type_archive('product') || is_tax('product_category') || is_tax('series') || is_singular('product')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/product/">PRODUCTS</a>
      </li>
      <li class="p-nav__item <?php if(is_page('made') || is_page('made-process')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/made/">MADE TO ORDER</a>
      </li>
      <li class="p-nav__item <?php if(is_post_type_archive('works') || is_tax('genre') || is_singular('works')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/works/">WORKS</a>
      </li>
      <li class="p-nav__item <?php if(is_post_type_archive('news')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/news/">NEWS</a>
      </li>
      <li class="p-nav__item <?php if(is_post_type_archive('featured') || is_singular('featured')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/featured/">FEATURED</a>
      </li>
      <li class="p-nav__item <?php if(is_page('contact')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/contact/">CONTACT</a>
      </li>
    </ul>
    <div class="p-nav__search"><form action="<?php echo get_site_url(); ?>/search"><button class="icon u-sp_none head-search-button" type="button" href="<?php echo get_site_url(); ?>/search/"><img src="<?php echo get_theme_file_uri('/assets/img/icon/icon_search.svg'); ?>" alt="SEARCH" width="18" height="24"></button><a class="icon u-pc_none" href="<?php echo get_site_url(); ?>/search/"><img src="<?php echo get_theme_file_uri('/assets/img/icon/icon_search.svg'); ?>" alt="SEARCH" width="18" height="24"></a><input class="p-nav__search__input" type="text" name="keyword"></form></div>
    <div class="online-shop">
      <a href="https://onlinestore.seiarrows.com/" target="_blank">ONLINE SHOP</a>
    </div>
  </nav>

  <div class="p-header--p-menu-btn">
    <a class="p-menu-trigger" href="">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>

</div>

<div class="sp_nav">
  <nav class="sp_nav--spnav">
    <ul class="sp_nav--spnavList">
      <li class="sp_nav--spnav__item <?php if(is_page('company')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/company/">COMPANY</a>
      </li>
      <li class="sp_nav--spnav__item <?php if(is_post_type_archive('product') || is_tax('product_category') || is_tax('series') || is_singular('product')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/product/">PRODUCTS</a>
      </li>
      <li class="sp_nav--spnav__item">
        <a href="<?php echo get_site_url(); ?>/made/">MADE TO ORDER</a>
      </li>
      <li class="sp_nav--spnav__item <?php if(is_post_type_archive('works') || is_tax('genre') || is_singular('works')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/works/">WORKS</a>
      </li>
      <li class="sp_nav--spnav__item <?php if(is_post_type_archive('news')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/news/">NEWS</a>
      </li>
      <li class="sp_nav--spnav__item <?php if(is_post_type_archive('featured') || is_singular('featured')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/featured/">FEATURED</a>
      </li>
      <li class="sp_nav--spnav__item <?php if(is_page('contact')): ?>is-active<?php endif; ?>">
        <a href="<?php echo get_site_url(); ?>/contact/">CONTACT</a>
      </li>
    </ul>
  </nav>
</div>
