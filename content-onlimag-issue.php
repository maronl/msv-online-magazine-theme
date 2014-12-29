<?php
$url_bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
$url_bg = $url_bg['0'];
$canAccessContent = ( is_user_logged_in() && cc_user_can_access_post( get_current_user_id(), get_the_ID()) ) ? true: false;
if( $canAccessContent ){
    $file_name_base = 'msv_rivista' . $post->ID;
    $download_url = plugins_url() . '/acd-attach-document/acd-get-document.php';
    $format_link = '"%s?post_ID=%s&file_name=%s_%s.%s"';
}
?>
<div class="issue-post" style="background-image: url('<?php echo $url_bg; ?>')">
    <h2><?php the_title(); ?><span class="pull-right">.<?php echo om_issue_number( get_the_title() ); ?></span></h2>
    <div class="row-fluid article-image-background">
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <?php if( $canAccessContent ): ?>
            <a href="<?php echo sprintf($format_link, $download_url, $post->ID, $file_name_base, 'epub', 'epub'); ?>" class="btn-rivista pull-right" role="button">Scarica ePub</a>
            <a href="<?php echo sprintf($format_link, $download_url, $post->ID, $file_name_base, 'mobi', 'mobi'); ?>" class="btn-rivista pull-right" role="button">Scarica Mobi</a>
            <a href="<?php echo sprintf($format_link, $download_url, $post->ID, $file_name_base, 'pdf', 'pdf'); ?>" class="btn-rivista pull-right" role="button">Scarica PDF</a>
        <?php else: ?>
            <a href="#confirm-message" class="btn-rivista btn-buy-issue pull-right" role="button"><?php _e( 'Acquista Rivista', 'online-magazine-theme' ); ?></a>
            <a href="#confirm-message" class="btn-rivista btn-buy-season pull-right" role="button"><?php _e( 'Abbonati', 'online-magazine-theme' ); ?></a>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>


<div class="issue-content">

    <h1><?php the_title(); ?></h1>

    <p><i><?php echo get_the_excerpt(); ?></i></p>

    <?php if($is_editoriale):?>

        <h3>Editoriale</h3>

        <?php the_content(); ?>

    <?php else: ?>

        <?php include 'cc-buy-post-only-confirmation.php'; ?>

    <?php endif; ?>

</div>

<?php
global $post;
$issue_post = $post;
$article_post = null;
?>

<?php
if (!is_null($issue_post))
    include 'article-issue-index.php';
?>


<?php if( ! $is_editoriale ) :?>

    <hr>

    <?php $articles = $related_posts->posts;
    $odd = array();
    $even = array();
    foreach ( $articles as $article ){
        if( count( $odd ) > count( $even ) ){
            $even[] = $article;
        }else{
            $odd[] = $article;
        }
    }
    ?>

    <div class="row article-little">
        <div class="col-sm-6 standard-article">
            <h2>Articoli rivista</h2>
            <ul>
                <?php foreach ( $odd as $post): ?>

                    <?php
                    setup_postdata( $post );
                    get_template_part( 'list-onlimag-article-little');
                    ?>

                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-sm-6 standard-article">
            <h2>Articoli rivista</h2>
            <ul>
                <?php foreach ( $even as $post): ?>

                    <?php
                    setup_postdata( $post );
                    get_template_part( 'list-onlimag-article-little');
                    ?>

                <?php endforeach; ?>
            </ul>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>

<?php endif; ?>