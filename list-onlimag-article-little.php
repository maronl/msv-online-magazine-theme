<?php $url_bg = get_post_thumbnail_image_url( $post->ID, 'thumb-article-homepage', get_template_directory_uri() . "/img/placeholder-article-little.jpg" ); ?>
<li>
    <img src="<?php echo $url_bg; ?>" class="img-responsive">
    <h3><?php the_title(); ?></h3>
    <h4><?php echo __( 'Rubrica: ', 'online-magazine-theme' ) . $post->rubrics; ?></h4>
    <?php the_excerpt(); ?>
    <a href="#" class="vote"><img src="<?php echo get_template_directory_uri(); ?>/img/star.png"> vota articolo</a>
    <a href="<?php the_permalink(); ?>" class="btn-rivista pull-right">LEGGI ARTICOLO</a>
    <div class="clearfix"></div>
</li>
