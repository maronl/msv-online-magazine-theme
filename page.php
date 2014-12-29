<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php if( is_home() || is_front_page() ): ?>
    <?php include 'home.php'; ?>
<?php else: ?>

    <div class="container">

        <div class="breadcrumbs">
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

        <div class="row-fluid">

            <div class="col-sm-8 blog-main">

                <div class="blog-post">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; else: ?>
                        <p><?php _e( 'Spiacenti, nessun articolo corrisponde ai criteri selezionati.', 'online-magazine-theme'); ?></p>
                    <?php endif; ?>

                </div>

            </div>

            <?php get_sidebar(); ?>

        </div>

    </div>

<?php endif; ?>

<?php get_footer(); ?>