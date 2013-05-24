<?php
/*
Template Name: Latest Post
*/
?>
<?php
//require('./wp-blog-header.php');
/*if ( have_posts() ) : while ( have_posts() ) : the_post();
	if (in_category('notebook')) {
		header("location: ".get_permalink());
		exit;
	}
endwhile; endif;*/

/*if ( have_posts() ) : the_post();
	header("location: ".get_permalink());
	exit;
endif;*/

?>
<?php

$container = get_post_custom_values('container');
$class = isset($container[0])? $container[0] : "thin";

$poststyle = get_post_custom_values('post-style');
$poststyle_class = isset($poststyle[0])? " " . $poststyle[0] : "";

?>
<?php get_header(); ?>
<article role="main" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="post">
		<?php the_post(); ?>
		<div class="container <?php echo $class; ?>">
			<header>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p class="item-meta"><!--Written by <?php the_author_link(); ?> on --><?php the_time('F jS, Y'); ?><?php edit_post_link('Edit', " &ndash; "); ?></p>
			</header>
			<section class="content">
	<?php the_content(); ?>
			</section>
			<footer>
				<p><a href="<?php the_permalink(); ?>#respond">Leave a comment &raquo;</a></p>
			</footer>
		</div>
	</section>
	<section class="post-nav">
		<div class="container <?php echo $class; ?>">
			<div class="arrows">
				<?php 
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				if (!empty( $prev_post )) { ?>
  					<a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>">&lt;</a>
				<?php } else { ?>
					<a class="disabled">&lt;</a>
				<? } ?>
				<?php if (!empty( $next_post )) { ?>
  					<a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>">&gt;</a>
				<?php } else { ?>
					<a class="disabled">&gt;</a>
				<? } ?>
			</div>
			<?php

			// Pretty output for categories as top level URLs

			$categories = "";
			$cat = get_the_category();
			for($i = 0; $i < count($cat); $i++) {
    			$categories .= '<a href="' . home_url() . '/' . $cat[0]->slug . '/">' . $cat[0]->name . '</a>';
    			if(($i+1) < count($cat)) {
    				$categories .= ", ";
    			}
    		}

			?>

			<p>Posted under <?php echo $categories; ?><?php the_tags( " with tags " ); ?>.</p>
		</div>
	</section>
<?php //$withcomments = 1; ?>
<?php //comments_template( '', true ); ?>

</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>