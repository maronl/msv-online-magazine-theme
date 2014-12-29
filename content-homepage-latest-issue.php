<?php
print_r( $post->ID );
$url_bg = get_post_thumbnail_image_url( $post->ID, 'large', get_template_directory_uri() . "/img/placeholder-article-large.jpg" ); ?>
<div class="issue-post" style="background-image: url('<?php echo $url_bg; ?>')">
    <h2><?php _e( 'Ultimo Numero', 'online-magazine-theme' ); ?><span class="pull-right">.<?php echo om_issue_number( get_the_title() ); ?></span></h2>
    <div class="row">
        <div class="col-sm-4 issue-post-numeration">
            <p>
                <span class="title">Numero</span>
                <span class="title"><?php echo om_issue_number( get_the_title() ); ?></span>
            </p>
        </div>
        <div class="col-sm-8 issue-post-summary">
            <h3><?php echo om_issue_year( get_the_title() ); ?></h3>
            <h4>Questo testo dobbiamo tenerlo???? cosa ci mettiamo???</h4>

            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-rivista pull-right"><?php _e( 'LEGGI LA RIVISTA', 'online-magazine-theme' ); ?></a>
        </div>
    </div>
</div>
