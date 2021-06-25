<?php get_header(); ?>

<div class="slider">
<?php
$args = array('posts_per_page' => 5);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
    while ($the_query->have_posts()) :
        $the_query->the_post();
    ?>
        <div class="top_post">
        <?php
        the_post_thumbnail('large');
        the_title('<h2><a href="' . get_permalink() . '">', '</a></h2>');
        echo '<div class="excerpt">';
        the_excerpt();
        echo '</div>';
        ?>
        </div>
    <?php
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'devhub' );
endif;
rewind_posts();
wp_reset_query();
?>


<button class="w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-display-right" onclick="plusDivs(1)">&#10095;</button>

</div>

<?php get_footer(); ?>