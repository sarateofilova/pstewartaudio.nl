<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patstewart
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<div class="events upcoming-events">
			<h2 id="events-category-title-first-of-type" class="events-category-title">Upcoming Events</h2>
			<span class="dash"></span>

			<?php
				$options = array('scope' => 'upcoming', 'title' => 'upcoming', 'artist' => '', 'limit' => 10);
				echo gigpress_shows($options);
			?>
		</div>
		
		<div class="events archive">
			<h2 class="events-category-title">Archive</h2>
			<span class="dash"></span>

			<?php
				$options = array('scope' => 'past', 'artist' => '', 'limit' => 10);
				echo gigpress_shows($options);
			?>
		</div>

	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
