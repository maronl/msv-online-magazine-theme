<?php get_header(); ?>

    <div class="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>

    <div class="row-fluid">

        <div class="col-sm-8">

            <?php
            global $post_type;
            if ( $post_type == 'onlimag-issue' ) $list_class = "issue-list";
            else $list_class = "article-list";
            ?></h1>
            <ul class="<?php echo $list_class; ?>">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'list', get_post_type() ); ?>

                <?php endwhile; ?>

            </ul>

            <?php wp_pagenavi(); ?>

        </div>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>