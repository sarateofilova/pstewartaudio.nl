<?php
/**
 * Template part for displaying page content in home-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patstewart
 */

?>

<section class="banner">

    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 desctop" src="<?php echo get_post_meta($post->ID, 'banner_desctop_image_1', true); ?>" alt="">
                <img class="d-block w-100 mobile" src="<?php echo get_post_meta($post->ID, 'banner_mobile_image_1', true); ?>" alt="" width="640" height="877" />
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 desctop" src="<?php echo get_post_meta($post->ID, 'banner_desctop_image_2', true); ?>" alt="">
                <img class="d-block w-100 mobile" src="<?php echo get_post_meta($post->ID, 'banner_mobile_image_2', true); ?>" alt="" width="640" height="877" />
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<div class="container desctop">
    <section class="meet-pat">
        <div class="image-container">            
            <div class="image">
                <img class="alignnone wp-image-78" src="<?php echo get_post_meta($post->ID, 'image_meet_pat', true); ?>" alt="" width="398" height="398" />
            </div>
        </div>
        <div class="more-pat">
            <h2>Learn more about Pat.</h2>
            <div class="link">
                <a href="<?php echo get_post_meta($post->ID, 'url_meet_pat', true); ?>">Learn more</a>
            </div>
        </div>
    </section>
</div>

<section class="meet-pat mobile">

    <div class="image-container">            
        <div class="image">
            <img class="alignnone wp-image-78" src="<?php echo get_post_meta($post->ID, 'image_meet_pat', true); ?>" alt="" width="398" height="398" />
        </div>
    </div>
  
        <div class="container more-pat">
            <h2>Learn more about Pat.</h2>
            <div class="link">
                <a href="<?php echo get_post_meta($post->ID, 'url_meet_pat', true); ?>">Learn more</a>
            </div>
        </div>
    
</section>


<div class="container desctop">
    <section class="discover-pat">
        
        <div class="discover">
            <h2>Discover Pat's music</h2>
            <div class="link">
                <a href="<?php echo get_post_meta($post->ID, 'url_discover_music', true); ?>">Discover</a>
            </div>
        </div>
       
        <div class="image-container">
            <div class="image">
                <img class="alignnone wp-image-66" src="<?php echo get_post_meta($post->ID, 'image_discover_music', true); ?>" alt="" width="312" height="312" />
            </div>
        </div>
    </section>
</div>

<section class="discover-pat mobile">
    
    <div class="container discover">
        <h2>Discover Pat's music</h2>
        <div class="link">
            <a href="<?php echo get_post_meta($post->ID, 'url_discover_music', true); ?>">Discover</a>
        </div>
    </div>

    <div class="image-container">
        <div class="image">
            <img class="alignnone wp-image-66" src="<?php echo get_post_meta($post->ID, 'image_discover_music', true); ?>" alt="" width="312" height="312" />
        </div>
    </div>
</section>
