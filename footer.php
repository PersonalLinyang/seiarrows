<?php
/*
 * フッタ部分
 */

?>

    </main>

    <footer class="l-footer">
      <?php get_template_part( 'template-parts/footer' ); ?>
    </footer>
  </div>
  <!-- /.l-wrapper -->

  <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.3/ScrollTrigger.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<?php if(is_post_type_archive('product') || is_tax('product_category')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/product_list.js"></script>
<?php endif; ?>
<?php if(is_singular('product')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/product_detail.js"></script>
<?php endif; ?>
<?php if(is_tax('series')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/series_detail.js"></script>
<?php endif; ?>
<?php if(is_post_type_archive('works') || is_tax('genre')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/works_list.js"></script>
<?php endif; ?>
<?php if(is_page('download')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/download.js"></script>
<?php endif; ?>
<?php if(is_page('image_photo')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/image_photo.js"></script>
<?php endif; ?>
<?php if(is_page('search')): ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/search.js"></script>
<?php endif; ?>

  <!-- /.p-header -->

  <script>
    //WP化するまではheaderのscriptはこっちに
    $(function() {
      $(".p-menu-trigger").click(function(){
        $(this).toggleClass("active");
        if($(this).hasClass("active")) {
          $(".sp_nav").addClass("open");
        } else {
          $(".sp_nav").removeClass("open");
        }
        return false;
      })

      if (window.matchMedia('(min-width: 769px)').matches) {
          // PC表示の時の処理
          $headerHeight = $('.l-header').outerHeight(true);
          console.log($headerHeight);
          $('.l-main').css('padding-top',$headerHeight);
      } else {
      // スマホ表示の時の処理
          $headerHeight = $('.l-header').outerHeight(true);
          console.log($headerHeight);
          $('.l-main').css('padding-top',$headerHeight);
      }

    });
    const trigger = new ScrollTrigger.default()
trigger.add('.js-scrollAnimation', {
  once: true,
})
  </script>

<?php wp_footer(); ?>
</body>

</html>
