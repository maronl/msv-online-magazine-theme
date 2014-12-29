<?php
global $post, $issue_post;
$css_buttons = '';
if($post->post_type == 'onlimag-article') {
    $article_id = $post->ID;
    $issue_id = $issue_post->ID;
    $post_credits = cc_get_post_credits( $post->ID );
    $issue_credits = cc_get_post_credits( $issue_post->ID );
    $css_buttons = 'blue-article';
}
if($post->post_type == 'onlimag-issue') {
    $article_id = 0;
    $issue_id = $post->ID;
    $issue_credits = cc_get_post_credits( $post->ID );
}
$user_credits = cc_get_user_credits( get_current_user_id() );
?>
<a  name="confirm-message"></a>
<h1><?php _e( 'Per visualizzare l\'intera rivista o il singolo articolo in modo completo procedi all\'acquisto. Puoi scoprire come funziona l\'acquisto ', 'online-magazine-theme'); ?></h1>
<?php if($post->post_type == 'onlimag-article') : ?>
<a href="#confirm-message" class="btn-rivista <?php echo $css_buttons; ?> btn-buy-article pull-right" role="button"><?php _e( 'Acquista Articolo', 'online-magazine-theme' ); ?></a>
<?php endif; ?>
<a href="#confirm-message" class="btn-rivista <?php echo $css_buttons; ?> btn-buy-issue pull-right" role="button"><?php _e( 'Acquista Rivista', 'online-magazine-theme' ); ?></a>
<a href="#confirm-message" class="btn-rivista <?php echo $css_buttons; ?> btn-buy-season pull-right" role="button"><?php _e( 'Abbonati', 'online-magazine-theme' ); ?></a>
<?php wp_create_nonce( "my-special-string" ); ?>
<div class="clearfix"></div>
<div class="confirm-message">
</div>
<div class="confirm-buy-issue">
    <a href="#<?php echo $issue_id; ?>" class="btn-rivista <?php echo $css_buttons; ?> btn-confirm-buy-issue pull-right" role="button"><?php _e( 'Conferma Acquisto Rivista', 'online-magazine-theme' ); ?></a>
    <div class="clearfix"></div>
</div>
<div class="confirm-buy-article">
    <a href="#<?php echo $article_id; ?>" class="btn-rivista <?php echo $css_buttons; ?> btn-confirm-buy-article pull-right" role="button"><?php _e( 'Conferma Acquisto Articoli', 'online-magazine-theme' ); ?></a>
    <div class="clearfix"></div>
</div>
<div class="confirm-buy-season">
    <a href="#" class="btn-rivista <?php echo $css_buttons; ?> btn-confirm-buy-season pull-right" role="button"><?php _e( 'Conferma Acquisto Abbonamento', 'online-magazine-theme' ); ?></a>
    <div class="clearfix"></div>
</div>

<div class="confirm-message-issue">
    <p><?php printf( __( 'La rivista costa %s crediti.', 'online-magazine-theme' ), $issue_credits ); ?></p>
    <p><?php _e( 'L\'acquisto della rivista ti da diritto all\'accesso ai contenuti del singolo numero della rivista a tutti gli articoli in essa contenuta. I contenuti possono essere visualizzati con il browser oppure scaricando i formati elettronici disponibili PDF, ePub o Mobi.', 'online-magazine-theme' ); ?></p>
    <?php if( ! is_user_logged_in() ): ?>
        <p><?php _e( 'Per completare l\'acquisto devi essere loggato e avere un numero di crediti sufficienti. Ricorda che se diventi socio del magazzeno hai in regalo 200 crediti.', 'online-magazine-theme' ); ?></p>
    <?php endif; ?>
    <?php if( is_user_logged_in() && $user_credits >= $issue_credits ): ?>
        <p><?php printf( __( 'Hai a disposizioni %s crediti e puoi completare l\'acquisto.', 'online-magazine-theme' ), $user_credits ); ?></p>
    <?php endif; ?>
    <?php if( is_user_logged_in() && $user_credits < $issue_credits ): ?>
        <p><?php printf( __( 'Hai a disposizioni %s crediti. Ricarica i crediti del tuo account ora per procedere all\'acquisto', 'online-magazine-theme' ), $user_credits ); ?></p>
    <?php endif; ?>
</div>
<div class="confirm-message-article">
    <p><?php printf( __( 'L\'articola costa %s crediti.', 'online-magazine-theme' ), $post_credits ); ?></p>
    <p><?php _e( 'L\'acquisto dell\'articolo ti da diritto all\'accesso ai contenuti del singolo articolo e non alla rivista intera. I contenuti possono essere visualizzati con il browser oppure scaricando i formati elettronici disponibili PDF, ePub o Mobi.', 'online-magazine-theme' ); ?></p>
    <?php if( ! is_user_logged_in() ): ?>
        <p><?php _e( 'Per completare l\'acquisto devi essere loggato e avere un numero di crediti sufficienti. Ricorda che se diventi socio del magazzeno hai in regalo 200 crediti.', 'online-magazine-theme' ); ?></p>
    <?php endif; ?>
    <?php if( is_user_logged_in() && $user_credits >= $post_credits ): ?>
        <p><?php printf( __( 'Hai a disposizioni %s crediti e puoi completare l\'acquisto.', 'online-magazine-theme' ), $user_credits ); ?></p>
    <?php endif; ?>
    <?php if( is_user_logged_in() && $user_credits < $post_credits ): ?>
        <p><?php printf( __( 'Hai a disposizioni %s crediti. Ricarica i crediti del tuo account ora per procedere all\'acquisto', 'online-magazine-theme' ), $user_credits ); ?></p>
    <?php endif; ?>
</div>
<div class="confirm-message-season">
    <p><?php printf( __( 'L\'abbonamento alla rivista costa %s crediti.', 'online-magazine-theme' ), SEASON_PRICE ); ?></p>
    <p><?php _e( 'L\'abbonamento ti da diritto all\'accesso ai contenuti delle riviste uscite nell\'anno solare in corso. I contenuti possono essere visualizzati con il browser oppure scaricando i formati elettronici disponibili PDF, ePub o Mobi.', 'online-magazine-theme' ); ?></p>
    <?php if( ! is_user_logged_in() ): ?>
        <p><?php _e( 'Per completare l\'acquisto devi essere loggato e avere un numero di crediti sufficienti. Ricorda che se diventi socio del magazzeno hai in regalo 200 crediti.', 'online-magazine-theme' ); ?></p>
    <?php endif; ?>
    <?php if( is_user_logged_in() && $user_credits >= SEASON_PRICE ): ?>
        <p><?php printf( __( 'Hai a disposizioni %s crediti e puoi completare l\'acquisto.', 'online-magazine-theme' ), $user_credits ); ?></p>
    <?php endif; ?>
    <?php if( is_user_logged_in() && $user_credits < SEASON_PRICE ): ?>
        <p><?php printf( __( 'Hai a disposizioni %s crediti. Ricarica i crediti del tuo account ora per procedere all\'acquisto', 'online-magazine-theme' ), $user_credits ); ?></p>
    <?php endif; ?>
</div>