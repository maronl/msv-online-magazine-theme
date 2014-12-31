<?php
/**
 * Template Name: Acqusita Crediti
 *
 * Allow users buy new credits
 *
 */
?>

<?php get_header(); ?>

<div class="row-fluid">
    <div class="col-sm-7 col-sm-offset-1">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>">
                <div class="entry-content entry">
                    <?php the_content(); ?>
                    <?php if ( !is_user_logged_in() ) : ?>
                        <div class="alert alert-error">
                            <strong><?php _e('Ops!', 'online-magazine-theme'); ?></strong>
                            <?php _e('Devi essere loggato per acquistare dei crediti.', 'online-magazine-theme'); ?>
                        </div>
                    <?php else : ?>

                        <?php
                        $defaultCreditsNewAccount = get_option('credits-coins-default-credits-new-account');
                        $cost10Credits = get_option('credits-coins-cost-10');
                        $cost20Credits = get_option('credits-coins-cost-20');
                        $cost50Credits = get_option('credits-coins-cost-50');
                        $cost100Credits = get_option('credits-coins-cost-100');
                        $cost500Credits = get_option('credits-coins-cost-500');
                        $cost1000Credits = get_option('credits-coins-cost-1000');
                        ?>

                        <form class="form-horizontal" id="buy10Credits" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="segreteria_verbanensia_test@gmail.com">
                            <input type="hidden" name="item_name" id="item_name" value="Ricarica 10 Crediti - Utente admin">
                            <input type="hidden" name="item_number" id="item_number" value="c10-<?php echo get_current_user_id();?>">
                            <input type="hidden" name="shipping" id="shipping" value="0">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $cost10Credits?>">
                            <input type="hidden" name="return" id="return" value="<?php echo get_permalink(USER_PROFILE_PAGE)?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit"  class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" value="10 Crediti"> (<?php echo $cost10Credits?> Euro)
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="buy20Credits" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="segreteria_verbanensia_test@gmail.com">
                            <input type="hidden" name="item_name" id="item_name" value="Ricarica 20 Crediti - Utente admin">
                            <input type="hidden" name="item_number" id="item_number" value="c20-<?php echo get_current_user_id();?>">
                            <input type="hidden" name="shipping" id="shipping" value="0">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $cost20Credits?>">
                            <input type="hidden" name="return" id="return" value="<?php echo get_permalink(USER_PROFILE_PAGE)?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit"  class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" value="20 Crediti"> (<?php echo $cost20Credits?> Euro)
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="buy50Credits" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="segreteria_verbanensia_test@gmail.com">
                            <input type="hidden" name="item_name" id="item_name" value="Ricarica 50 Crediti - Utente admin">
                            <input type="hidden" name="item_number" id="item_number" value="c50-<?php echo get_current_user_id();?>">
                            <input type="hidden" name="shipping" id="shipping" value="0">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $cost50Credits?>">
                            <input type="hidden" name="return" id="return" value="<?php echo get_permalink(USER_PROFILE_PAGE)?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit"  class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" value="50 Crediti"> (<?php echo $cost50Credits?> Euro)
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="buy100Credits" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="segreteria_verbanensia_test@gmail.com">
                            <input type="hidden" name="item_name" id="item_name" value="Ricarica 100 Crediti - Utente admin">
                            <input type="hidden" name="item_number" id="item_number" value="c100-<?php echo get_current_user_id();?>">
                            <input type="hidden" name="shipping" id="shipping" value="0">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $cost100Credits?>">
                            <input type="hidden" name="return" id="return" value="<?php echo get_permalink(USER_PROFILE_PAGE)?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit"  class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" value="100 Crediti"> (<?php echo $cost100Credits?> Euro)
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="buy500Credits" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="segreteria_verbanensia_test@gmail.com">
                            <input type="hidden" name="item_name" id="item_name" value="Ricarica 500 Crediti - Utente admin">
                            <input type="hidden" name="item_number" id="item_number" value="c500-<?php echo get_current_user_id();?>">
                            <input type="hidden" name="shipping" id="shipping" value="0">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $cost500Credits?>">
                            <input type="hidden" name="return" id="return" value="<?php echo get_permalink(USER_PROFILE_PAGE)?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit"  class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" value="500 Crediti"> (<?php echo $cost500Credits?> Euro)
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" id="buy1000Credits" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="segreteria_verbanensia_test@gmail.com">
                            <input type="hidden" name="item_name" id="item_name" value="Ricarica 1000 Crediti - Utente admin">
                            <input type="hidden" name="item_number" id="item_number" value="c1000-<?php echo get_current_user_id();?>">
                            <input type="hidden" name="shipping" id="shipping" value="0">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $cost1000Credits?>">
                            <input type="hidden" name="return" id="return" value="<?php echo get_permalink(USER_PROFILE_PAGE)?>">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit"  class="btn btn-primary" alt="Make payments with PayPal - it's fast, free and secure!" value="1000 Crediti"> (<?php echo $cost1000Credits?> Euro)
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div><!-- .entry-content -->
            </div><!-- .hentry .post -->
        <?php endwhile; ?>
        <?php else: ?>
            <p class="no-data">
                <?php _e( 'Spiacenti, nessun articolo corrisponde ai criteri selezionati.', 'online-magazine-theme'); ?>
            </p><!-- .no-data -->
        <?php endif; ?>
    </div><!-- end col-sm-7 main content-->
    <div class="col-sm-3">
        <h2><?php _e( 'Pagamenti sicuri con PayPal', 'online-magazine-theme'); ?></h2>
        <p><?php _e( 'Non è necessario avere un conto PayPal, puoi pagare anche con la tua carta di credito', 'online-magazine-theme'); ?></p>
        <table cellspacing="0" cellpadding="10" border="0" align="center"><tbody><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.sandbox.paypal.com/it/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img border="0" src="https://www.paypalobjects.com/it_IT/IT/Marketing/i/bnr/bnr_vertical_solutiongraphic_150x172.gif" alt="Che cos'è PayPal"></a></td></tr></tbody></table>
    </div>

</div><!-- end row -->
	
<?php get_footer(); ?>
<!-- end page -->

