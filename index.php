<?php get_header(); ?>
<article role="main">
	<div class="container thin">
		<header>
			<h1><?php the_title(); ?></h1>
		</header>
		<section class="content">
			<?php the_content(); ?>
		</section>
	</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>