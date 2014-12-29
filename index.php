<?php
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
                        <p><?php _e( 'Spiacenti, nessun articolo corrisponde ai criteri selezionati.', 'msv'); ?></p>
                    <?php endif; ?>

                </div>

            </div>

            <?php get_sidebar(); ?>

        </div>

    </div>

<?php endif; ?>

<?php get_footer(); ?>