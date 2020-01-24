<?php
/**
 * Template part for displaying page content in discography-page.php
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

	<?php

	$terms = get_terms('album_category');
	$count = count($terms);
	if ( $count > 0 ): ?>

	<ul id="projects-filter">
		<li><a href="#" data-filter="*">All</a></li>

		<?php 
		foreach ( $terms as $term ) {
		$termname = strtolower($term->name);  
		$termname = str_replace(' ', '-', $termname);  
		echo '<li><a href="#" data-filter="' . '.' . $termname . '">' . $term->name . '</a></li>';
		} ?>
	</ul>
	
	<?php endif;
		$loop = new WP_Query(array('post_type' => 'albums', 'posts_per_page' => -1));
		$count =0;
	?>

    <div id="projects" class="album">

    <?php if ( $loop ) : 

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php
            $terms = get_the_terms( $post->ID, 'album_category' );

            if ( $terms && ! is_wp_error( $terms ) ) : 
                $links = array();

                foreach ( $terms as $term ) 
                {
                    $links[] = $term->name;
                }
                $links = str_replace(' ', '-', $links); 
                $tax = join( " ", $links );     
            else :  
                $tax = '';  
            endif;
            ?>

            <?php $infos = get_post_custom_values('wpcf-proj_url'); ?>

            <article class="project-item <?php echo strtolower($tax); ?>">
				<div class="open-modal" data-open="<?php echo get_post_meta($post->ID, 'data-id', true);?>">
					<?php printf( get_the_post_thumbnail() ); ?>
				</div>
				
				<h5 class="name open-modal" data-open="<?php echo get_post_meta($post->ID, 'data-id', true);?>"><?php printf( get_the_title() );?></h5>
				<p><?php echo get_post_meta($post->ID, 'artist', true); ?></p>

				<!-- Modal -->
				<div class="modal" id="<?php echo get_post_meta($post->ID, 'data-id', true); ?>" data-animation="slideInOutLeft">
				<div class="modal-dialog">
					<header class="modal-header">
						<button class="close-modal" aria-label="close modal" data-close>
							✕  
						</button>
					</header>
					<div class="content">
						<div class="album-description">
							<?php printf( get_the_post_thumbnail() ); ?>

							<div class="meta-fields">
								<span class="album-title"><?php the_title(); ?></span>
								<p>
									<strong>Artist:</strong> <?php echo get_post_meta($post->ID, 'artist', true); ?>
								</p>
								<p>
									<strong>Year:</strong> <?php echo get_post_meta($post->ID, 'year', true); ?>
								</p>
								<p>
									<strong>Label:</strong> <?php echo get_post_meta($post->ID, 'label', true); ?>
								</p>
								<p>
									<strong>Genre:</strong> <?php echo get_post_meta($post->ID, 'genre', true); ?></span>
								</p>
								<p>
									<strong>Roles:</strong> <?php echo get_post_meta($post->ID, 'roles', true); ?></span>
								</p>
							</div>
							<?php the_content() ?>
						</div>

						<iframe src="<?php echo get_post_meta($post->ID, 'url', true); ?>" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
					</div>
				</div>
				</div>
			</article>

        <?php endwhile; else: ?>

        <div class="error-not-found">Sorry, no portfolio entries for while.</div>

    <?php endif; ?>


    </div>

    <div class="clearboth"></div>
</article>