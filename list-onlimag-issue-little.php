<?php $url_bg = get_post_thumbnail_image_url( $post->ID, 'thumb-article-homepage', get_template_directory_uri() . "/img/placeholder-article-little.jpg" ); ?>
<li>
    <img src="<?php echo $url_bg; ?>" class="img-responsive">
    <h3><?php the_title(); ?></h3>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="btn-rivista pull-right">LEGGI RIVISTA</a>
    <div class="clearfix"></div>
</li>
