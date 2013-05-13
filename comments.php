<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<?php // You can start editing here. ?>

<?php if ( comments_open() ) : // If comments are open, but there are no comments. ?>
<aside class="comments" id="comments">
	<div class="container thin">
<?php if ( have_comments() ) : ?>
	<header>
		<h2>Discussion</h2>
		<p><?php comments_number('There are no comments yet.', 'There is 1 comment.', 'There are % comments so far.' );?> <a href="<?php the_permalink(); ?>#respond">Join in!</a></p>
	</header>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="comment-list">
	<?php wp_list_comments('callback=introspect_comment'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

<?php endif; ?>

<section class="comment-box" id="respond">
	<header>
		<h2><?php comment_form_title( 'Leave a Comment', 'Leave a reply to %s' ); ?> <?php cancel_comment_reply_link('(Cancel)'); ?></h2>
		<p>Be nice. Some <abbr title="<?php echo allowed_tags(); ?>">HTML</abbr> allowed.</p>
	</header>

<!--<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>-->

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<fieldset>
<?php if ( is_user_logged_in() ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php endif; ?>

<textarea rows="8" cols="80" placeholder="Start writing…" name="comment" id="comment" tabindex="1"></textarea>

<?php if ( !is_user_logged_in() ) : ?>

<p><input type="text" placeholder="Your name" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
<p><input type="text" placeholder="Email (won't be shared)" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> /></p>
<p><input type="text" placeholder="Website (optional)" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="4" /></p>

<?php endif; ?>

<p class="submit-area">
	<input name="submit" type="submit" id="submit" class="btn" tabindex="5" value="Submit" />
	<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</fieldset>
</form>

<?php endif; // If registration required and not logged in ?>
</div>
</aside>

<?php endif; // if you delete this the sky will fall on your head ?>