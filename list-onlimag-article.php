<?php $url_bg = get_post_thumbnail_image_url( $post->ID, 'large', get_template_directory_uri() . "/img/placeholder-article-large .jpg" ); ?>
<li>
    <div class="article-post" style="background-image: url('<?php echo $url_bg; ?>')">
        <h2><?php the_title(); ?></h2>
        <div class="row">
            <div class="col-sm-4 article-post-numeration">

            </div>
            <div class="col-sm-8 article-post-summary">
                <h3><?php echo __( 'Pubblicato sulla rivista ', 'online-magazine-theme' ) . $post->issue_title; ?></h3>
                <h4><?php echo __( 'Rubrica: ', 'online-magazine-theme' ) . $post->rubrics; ?></h4>

                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn-rivista blue-article pull-right"><?php _e( 'LEGGI L\'ARTICOLO', 'online-magazine-theme' ); ?></a>
            </div>
        </div>
    </div>
</li>