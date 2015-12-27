<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package McAlester
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( ); ?>
			</div>
		<?php } ?>

		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php mcalester_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( $post->post_excerpt ) {
				the_excerpt();
				echo sprintf( '<div class="continue_btn"><a href="%s" class="more-link" rel="bookmark">Continue Reading'.the_title( '<span class="screen-reader-text">"', '"</span>', false ).'</a></div>', esc_url(get_permalink()) );
			} else {
				the_content( sprintf(
					__( 'Continue Reading %s', 'mcalester' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'mcalester' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mcalester_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
