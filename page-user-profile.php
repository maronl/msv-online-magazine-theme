<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */
?>

<?php
if ( !is_user_logged_in() ) {
    wp_redirect( '/wp-login.php' );
    exit;
}
?>

<?php
global $user_ID, $user_identity, $userdata;
?>

<?php get_header(); ?>

    <div class="row-fluid">

        <?php if( isset( $_GET['credits_recharge'] ) && $_GET['credits_recharge'] == 'ok' ): ?>
            <div class="col-sm-12">
                <div class="alert-info" style="padding:15px; margin-bottom: 15px;">La ricarica dei tuoi crediti è stata effettuata con successo.</div>
            </div>
        <?php elseif( isset( $_GET['credits_recharge'] ) && $_GET['credits_recharge'] == 'ko' ): ?>
            <div class="col-sm-12">
                <div class="alert-info" style="padding:15px; margin-bottom: 15px;">La ricarica dei crediti è stata annullata.</div>
            </div>
        <?php endif; ?>

        <div class="col-sm-12 user-profile-info">
            <div class="row-fluid">
                <div class="col-xs-4 col-sm-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/gioconda.jpg" alt="..." class="img-rounded img-responsive">
                </div>
                <div class="col-xs-8  col-sm-9">
                    <h2><?php the_author_meta( 'first_name', $user_ID ); ?> <?php the_author_meta( 'last_name', $user_ID ); ?></h2>
                    <dl class="dl-horizontal">
                        <dt>Registrato il</dt>
                        <dd><?php echo $userdata->data->user_registered?></dd>
                        <dt>email</dt>
                        <dd><?php echo $userdata->data->user_email?></dd>
                        <dt>ultimo accesso</dt>
                        <dd><?php $last_login = get_last_login($userdata->ID);
                            if($last_login) echo $last_login;
                            else _e('Questa è la tua prima connessione alla rivista del Magazzeno', 'online-magazine-theme'); ?></dd>
                    </dl>
                    <?php
                    $msv_associate = get_user_meta( $userdata->ID, 'msv_associate',true);
                    $credits_available = get_user_meta( $userdata->ID, 'credits-coins-user-credits',true);
                    $msv_issue_subscription = false;
                    ?>
                    <dl class="dl-horizontal">
                        <dt>Socio del Magazzeno</dt>
                        <dd><?php ( $msv_associate ) ? _e( 'SI', 'online-magazine-theme') : _e( 'NO', 'online-magazine-theme'); ?></dd>
                        <dt>Crediti disponibili</dt>
                        <dd><?php echo $credits_available; ?></dd>
                        <dt>Abbonamento rivista</dt>
                        <dd><?php ( $msv_issue_subscription) ? _e( 'SI', 'online-magazine-theme') : _e( 'NO', 'online-magazine-theme'); ?></dd>
                    </dl>
                    <a href="<?php echo get_permalink( BUY_CREDITS_PAGE ); ?>" class="btn-rivista blue pull-right">CARICA CREDITI</a>

                    <a href="#" class="btn-rivista blue pull-right">ABBONATI ALLA RIVISTA</a>

                    <a href="<?php echo get_permalink( UPDATE_USER_PROFILE_PAGE ); ?>" class="btn-rivista blue pull-right">MODIFICA PROFILO</a>

                </div>

                <div class="clearfix"></div>

            </div>
        </div>

    </div>


    <?php
    $issues = get_issues_bought_by_user( get_current_user_id() );
    $articles = get_articles_bought_by_user( get_current_user_id() );
    $favourites = get_articles_favourite_by_user( get_current_user_id() );
    ?>
    <div class="row-fluid article-little">
        <div class="col-sm-4 issues-bought">
            <h2>Riviste acquistate</h2>
            <ul>
                <?php if ( $issues->have_posts() ) : while ( $issues->have_posts() ) : $issues->the_post();?>
                    <?php get_template_part( 'list-onlimag-issue-little'); ?>
                <?php endwhile; else: ?>
                    <p><?php _e( 'Spiacenti, nessun articolo corrisponde ai criteri selezionati.', 'online-magazine-theme'); ?></p>
                <?php endif; ?>
            </ul>
            <?php wp_pagenavi( array( 'query' => $issues ) )?>
        </div>
        <div class="col-sm-4 articles-bought">
            <h2>Articoli acquistati</h2>
            <ul>
                <?php if ( $articles->have_posts() ) : while ( $articles->have_posts() ) : $articles->the_post();?>
                    <?php get_template_part( 'list-onlimag-article-little'); ?>
                <?php endwhile; else: ?>
                    <li class="no-purchase">Non hai ancora acquistato nessun articolo. In questo spazio vengono visualizzati SOLO gli articoli acquistati singolarmente. Gli articoli di riviste acquistate o visibili perchè sei abbonato non vengono qui elencati.</li>
                <?php endif; ?>
            </ul>
            <?php wp_pagenavi( array( 'query' => $articles ) )?>
        </div>
        <div class="col-sm-4 articles-favourites">
            <h2>Articoli preferiti</h2>
            <ul>
                <?php if ( $articles->have_posts() ) : while ( $articles->have_posts() ) : $articles->the_post();?>
                    <?php get_template_part( 'list-onlimag-article-little'); ?>
                <?php endwhile; else: ?>
                    <li class="no-purchase">Non hai ancora nessun articolo tra i tuoi preferiti.</li>
                <?php endif; ?>
            </ul>
            <?php wp_pagenavi( array( 'query' => $articles ) )?>

        </div>
    </div>

<?php get_footer(); ?>
<!-- end page -->

