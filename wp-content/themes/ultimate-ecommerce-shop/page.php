<?php
/**
 * Displaying all pages.
 * @package Ultimate Ecommerce Shop
*/

get_header(); ?>

<?php do_action( 'ultimate_ecommerce_shop_page_header' ); ?>

<div id="main-content" class="container-fluid">
    <div class="wrapper">
        <div class="col-md-12">
            <?php while ( have_posts() ) : the_post(); ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                <h1><?php the_title(); ?></h1>
                <?php the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'ultimate-ecommerce-shop' ),
                    'after'  => '</div>',
                ) );
                
                    //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>         
        </div>        
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'ultimate_ecommerce_shop_page_footer' ); ?>

<?php get_footer(); ?>