<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="container">
	<div id="content" role="main">

		<?php the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<?php get_search_form(); ?>
		
		<h2>بایگانی هفتگی:</h2>
		<ul>
			<?php wp_get_archives('type=weekly'); ?>
		</ul>

	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>