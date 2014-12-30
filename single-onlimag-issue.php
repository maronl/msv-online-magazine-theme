<?php
$is_editoriale = get_query_var('editoriale');

get_header(); ?>

<?php if( is_home() || is_front_page() ): ?>
    <?php include 'home.php'; ?>
<?php else: ?>

    <div class="row-fluid">
        <div class="col-sm-12" >
            <div class="breadcrumbs">
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </div>
        </div>
    </div>

    <div class="row-fluid">

        <div class="col-sm-8 issue">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

                    <?php include 'content-onlimag-issue.php'; ?>

                <?php endwhile; else: ?>
                    <p><?php _e( 'Spiacenti, nessun articolo corrisponde ai criteri selezionati.', 'online-magazine-theme'); ?></p>
                <?php endif; ?>

        </div>

        <?php get_sidebar(); ?>

    </div>

<?php endif; ?>

<?php get_footer(); ?>