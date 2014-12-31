<?
global $post;
$article_post = $post;
$issue_posts = lps_get_linking_posts($post);
$issue_post = null;

if (isset($issue_posts->post)) {
$issue_post = $issue_posts->post;
}

$url_bg = get_post_thumbnail_image_url( $post->ID, 'large', get_template_directory_uri() . "/img/placeholder-article-large.jpg" );

$canAccessContent = ( is_user_logged_in() && cc_user_can_access_post( get_current_user_id(), get_the_ID()) ) ? true: false;
if( $canAccessContent ){
    $file_name_base = 'msv_rivista' . $post->ID;
    $download_url = plugins_url() . '/acd-attach-document/acd-get-document.php';
    $format_link = '"%s?post_ID=%s&file_name=%s_%s.%s"';
}
?>
<div class="article-post" style="background-image: url('<?php echo $url_bg; ?>')">
    <h2><?php the_title(); ?><span class="pull-right">.<?php echo om_issue_number( $post->issue_title ); ?></span></h2>
    <div class="row-fluid article-image-background">
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <?php if( $canAccessContent ): ?>
            <a href="<?php echo sprintf($format_link, $download_url, $post->ID, $file_name_base, 'epub', 'epub'); ?>" class="btn-rivista blue-article pull-right" role="button">Scarica ePub</a>
            <a href="<?php echo sprintf($format_link, $download_url, $post->ID, $file_name_base, 'mobi', 'mobi'); ?>" class="btn-rivista blue-article pull-right" role="button">Scarica Mobi</a>
            <a href="<?php echo sprintf($format_link, $download_url, $post->ID, $file_name_base, 'pdf', 'pdf'); ?>" class="btn-rivista blue-article pull-right" role="button">Scarica PDF</a>
        <?php else: ?>
            <a href="#confirm-message" class="btn-rivista blue-article btn-buy-article pull-right" role="button"><?php _e( 'Acquista Articolo', 'online-magazine-theme' ); ?></a>
            <a href="#confirm-message" class="btn-rivista blue-article btn-buy-issue pull-right" role="button"><?php _e( 'Acquista Rivista', 'online-magazine-theme' ); ?></a>
            <a href="#confirm-message" class="btn-rivista blue-article btn-buy-season pull-right" role="button"><?php _e( 'Abbonati', 'online-magazine-theme' ); ?></a>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</div>

<div class="article-content">

    <?php the_title('<h1>', '</h1>'); ?>

    <h3><?php echo __( 'Pubblicato sulla rivista ', 'online-magazine-theme' ) . $post->issue_title; ?></h3>

    <h4><?php echo __( 'Rubrica: ', 'online-magazine-theme' ) . $post->rubrics; ?></h4>

    <p><i><?php echo get_the_excerpt(); ?></i></p>

    <?php the_content(); ?>

</div>

<?php
if (!is_null($issue_post))
    include 'article-issue-index.php';
?>
