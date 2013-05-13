<?php
/*
// Which page of the blog are we on?
$paged = get_query_var('paged');
query_posts('cat=-0&paged='.$paged);

// make posts print only the first part with a link to rest of the post.
global $more;
$more = 0;
*/
?>

<?php get_header(); ?>
<article role="main">
	<div class="container thin">
		<header>
			<h1>&ldquo;<?php single_tag_title(); ?>&rdquo;</h1>
		</header>
		<section class="content">

		<ul class="list">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<li>
						<article>
							<header>
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								<p><!--Written by <?php the_author_link(); ?> on --><?php the_time('F jS, Y'); ?><?php edit_post_link('Edit', " &ndash; "); ?></p>
							</header>
							<div class="post">
							<section class="content">
								<?php if(!empty($post->post_excerpt)) {
									$excerpt = get_the_excerpt();
								?>
								<p>
								<?php echo rtrim($excerpt, "</p>"); ?>
								<a href="<?php the_permalink(); ?>" class="read-more">Continue reading</a></p>
								<?php
								} else {
									the_content("Continue reading");
								} ?>
							</section>
							</div>
						</article>
					</li>

				<?php endwhile; endif; ?>
			</ul>

		</section>
	</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>