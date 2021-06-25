<?php
get_header(); while ( have_posts() ) : the_post(); 
?>
<section class="breadcrumbs-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2><?php  the_title(); ?></h2>
			</div>
		</div>
	</div>
</section>

<section class="page-area" id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				 // End of the loop.
				?>
			</div>
		</div>
	</div>
</section>

<?php endwhile; get_footer();