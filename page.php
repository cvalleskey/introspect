<?php

$container = get_post_custom_values('container');
$class = isset($container[0])? $container[0] : false;

?>
<?php get_header(); ?>
<article role="main" <?php post_class(); ?>>
	<section class="post">
		<?php the_post(); ?>
		<div class="container <?php if($class) { echo $class; }?>">
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			<section class="content">
	<?php the_content(); ?>
			</section>
		</div>
	</section>
<?php comments_template( '', true ); ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>