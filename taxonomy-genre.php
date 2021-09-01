<?php
$genre = get_queried_object();

get_header();
?>

<input type="hidden" id="genre_id" value="<?php echo $genre->term_id; ?>" />

<?php get_template_part( 'template-parts/works_main' ); ?>

<?php

get_footer();
