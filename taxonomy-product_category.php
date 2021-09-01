<?php
$product_category = get_queried_object();

get_header();
?>

<input type="hidden" id="product_category_id" value="<?php echo $product_category->term_id; ?>" />

<?php get_template_part( 'template-parts/product_main' ); ?>        

<?php
get_footer();
