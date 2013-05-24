<?php
/*
Template Name: Post List
*/

// make posts print only the first part with a link to rest of the post.
//global $more;
//$more = 0;

$type = get_post_custom_values('type');
$listtype = isset($type[0])? $type[0] : "list";

$grid = get_post_custom_values('grid');
$count = isset($grid[0])? $grid[0] : 4;

$cat = get_post_custom_values('category');
$slug = isset($cat[0])? $cat[0] : $post->post_name;

$container = get_post_custom_values('container');
$class = isset($container[0])? $container[0] : false;

$last = 0;

?>
<?php get_header(); ?>
<article role="main">
	<div class="container <?php if($class) { echo $class; }?>">
		<header>
			<h1><?php the_title(); ?></h1>
		</header>
		<section class="content">

		<?php the_content(); ?>

		<?php

		// The LOOP yall
		$paged = get_query_var('paged');
		query_posts(array(
			'cat' => -0,
			'paged' => $paged,
			'posts_per_page' => -1
			));
		$last = 0;

		?>

		<?php if($listtype == "list") { ?>

		<ul class="list">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php if (in_category($slug)) { ?>
				
					<li>
						<article>
							<header>
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<p><!--Written by <?php the_author_link(); ?> on --><?php the_time('F jS, Y'); ?><?php edit_post_link('Edit', " &ndash; "); ?></p>
							</header>
							<?php if (has_post_thumbnail()) { ?> 
							<figure>
					    		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							</figure>
							<?php } ?>
							<div class="post">
							<section class="content">
								<?php if(!empty($post->post_excerpt)) {
									$excerpt = get_the_excerpt();
								?>
								<p>
								<?php
									//preg_match($pattern, $excerpt, $matches);
									echo rtrim($excerpt, "</p>"); //$matches;
								?>
								<a href="<?php the_permalink(); ?>" class="read-more">Continue reading</a></p>
								<?php
								} else {
									the_content("Continue reading");
								} ?>
							</section>
							</div>
						</article>
					</li>
					<?php } ?>

				<?php endwhile; endif; ?>
		</ul>

		<? } else if ($listtype == "grid") { ?>

			<ul class="grid grid-<?php echo $count; ?>">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php if (in_category($slug)) { ?>
			
				<li<?php if($last++ % $count) { echo ' class="last"'; } ?>>
					<article>

					<?php if (has_post_thumbnail()) { ?> 
					<figure>
					    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</figure>
					<?php } ?>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php if(!empty($post->post_excerpt)) {
						$excerpt = get_the_excerpt();
					?>
					<p>
					<?php
						//preg_match($pattern, $excerpt, $matches);
						echo rtrim($excerpt, "</p>"); //$matches;
					?>
					<a href="<?php the_permalink(); ?>" class="read-more">Learn More</a></p>
					<?php
					} else {
						the_content("Learn More");
					} ?>
					</article>
				</li>
				<?php } ?>

			<?php endwhile; endif; ?>
		</ul>

		<?php } ?>

		</section>
	</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>