<?php
/**
 * Template Name: Update User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */
?>

<?php
/* Get user info. */
global $current_user, $wp_roles;
get_currentuserinfo();

/* Load the registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->id, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        update_user_meta( $current_user->id, 'user_url', esc_url( $_POST['url'] ) );
    
    if ( !empty( $_POST['user_email'] ) ){
        if (!is_email(esc_attr( $_POST['user_email'] ))){
        	$error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        }elseif(email_exists(esc_attr( $_POST['user_email'] )) && email_exists(esc_attr( $_POST['user_email'] )) != $current_user->id ){
        	$error[] = __('This email is already used by another user.  try a different one.', 'profile');
        }else{
        	wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['user_email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->id, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->id, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->id, 'description', esc_attr( $_POST['description'] ) );

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
   /* if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->id);
        wp_redirect( get_permalink() );
        exit;
    }*/
   if ( !$error ) {
    	wp_redirect( get_permalink() .'?updated=true' ); exit;
    }
}
?>
<?php get_header(); ?>

			<div class="row-fluid">
			<div class="col-sm-6 col-sm-offset-3">
								
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				    <div id="post-<?php the_ID(); ?>">
				        <div class="entry-content entry">
				            <?php if ( !is_user_logged_in() ) : ?>
								<div class="alert alert-error">
								<button class="close" data-dismiss="alert" type="button">×</button>
								<strong><?php _e('Ops!', 'online-magazine-theme'); ?></strong>
								 <?php _e('Devi essere loggato per poter modificare il tuo profilo.', 'online-magazine-theme'); ?>
								</div>
				            <?php else : ?>
	
					            <?php if ( $_GET['updated'] ) : ?> <div class="alert alert-success">
	            				<button class="close" data-dismiss="alert" type="button">×</button>
	            				<?php _e('Il tuo profilo è stato aggiornato.', 'online-magazine-theme'); ?>
	            				</div><?php endif; ?>
				            				            
				                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>

				                <form class="form-horizontal" method="post" id="adduser" action="<?php the_permalink(); ?>">
                                    <div class="form-group">
                                        <label for="first-name" class="col-sm-3 control-label"><?php _e('Nome', 'online-magazine-theme') . " *"; ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->id ); ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last-name" class="col-sm-3 control-label"><?php _e('Cognome', 'online-magazine-theme') . " *"; ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->id ); ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="user_email" class="col-sm-3 control-label"><?php _e('E-mail', 'online-magazine-theme') . " *"; ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="user_email" type="email" id="user_email" value="<?php the_author_meta( 'user_email', $current_user->id ); ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="url" class="col-sm-3 control-label"><?php _e('Website', 'online-magazine-theme'); ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->id ); ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-sm-3 control-label"><?php _e('tu in poche parole', 'online-magazine-theme') ?></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control"  name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->id ); ?></textarea>
                                        </div>
                                    </div>

									<hr>
									<p><?php _e('Se desideri modificare la tua password compila i campi seguenti con la nuova password altrimenti lasciali vuoti', 'online-magazine-theme'); ?></p>

                                    <div class="form-group">
                                        <label for="pass1" class="col-sm-3 control-label"><?php _e('Password *', 'online-magazine-theme'); ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="pass1" type="password" id="pass1" value="" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pass2" class="col-sm-3 control-label"><?php _e('Conferma Password *', 'online-magazine-theme'); ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="pass2" type="password" id="pass2" value="" />
                                        </div>
                                    </div>

				                    <?php 
				                        //action hook for plugin and extra fields
				                        // now disabled to not making editing extra fields or meta by user on front end
										//do_action('edit_user_profile',$current_user); 
				                    ?>

				                    <p class="form-submit">

                                        <?php echo $referer; ?>
				                        <input name="updateuser" type="submit" id="updateuser" class="btn btn-warning" value="<?php _e('aggiorna profilo', 'online-magazine-theme'); ?>" />

				                        <?php wp_nonce_field( 'update-user' ) ?>
				                        <input name="action" type="hidden" id="action" value="update-user" />

				                    </p><!-- .form-submit -->
				                </form><!-- #adduser -->
				            <?php endif; ?>
				        </div><!-- .entry-content -->
				    </div><!-- .hentry .post -->
				    <?php endwhile; ?>
				<?php else: ?>
				    <p class="no-data">
				        <?php _e( 'Spiacenti, nessun articolo corrisponde ai criteri selezionati.', 'online-magazine-theme'); ?>
				    </p><!-- .no-data -->
				<?php endif; ?>
	        </div><!-- end span 9 main content-->

	      </div><!-- end row -->
	
<?php get_footer(); ?>
<!-- end page -->

