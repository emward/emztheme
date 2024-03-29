<?php
/**
 * @package EmzTheme
 * @since EmzTheme 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<h2 class="bio-name"><?php the_field('job_title'); ?></h2>

		<div class="entry-meta">
			<?php the_post_thumbnail(); ?>
			<?php //emztheme_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
 			$posts = get_posts(array(
			'numberposts' => -1,
			'category' => 3,
		));
 
		if($posts)
		{
			echo '<ul>';
 
		foreach($posts as $post)
		{
			echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_post_thumbnail($post->ID, 'thumbnail') . get_the_title($post->ID) . '</a></li>';
		}
 
			echo '</ul>';
		}
 		?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'emztheme' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'emztheme' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'emztheme' ) );

			if ( ! emztheme_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'emztheme' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'emztheme' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'emztheme' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'emztheme' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'emztheme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
