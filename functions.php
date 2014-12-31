<?php

define( 'USER_PROFILE_PAGE', 10 );
define( 'UPDATE_USER_PROFILE_PAGE', 130 );
define( 'BUY_CREDITS_PAGE', 132 );
define( 'PUBLISH_ARTICLE_PAGE', 101 );

define( 'SEASON_PRICE', 200 );

add_theme_support( 'menus' );

add_theme_support('post-thumbnails');

function remove_menus(){

    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit-comments.php' );
    if(!current_user_can('manage_options'))
        remove_menu_page( 'wpcf7' );
}
add_action( 'admin_menu', 'remove_menus' );


/* hook to transform wp_pagenavi output to bootstrap style */
add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );

function ik_pagination($html) {
    $out = '';

    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
    $out = str_replace("<span","<li><span",$out);
    $out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);

    return '<nav class="nav-pagination">
			<ul  class="pagination">'.$out.'</ul>
		</nav>';
}

/* change login logo */
function custom_login_logo() {
    echo '<style type="text/css"> .login h1 a { width: 320px; background: url('.get_bloginfo('template_directory').'/img/msv_logo_login.svg   ) no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');


/* hooks to fix link to reset password on multisite */
function my_lostpwd_page( $lostpassword_url, $redirect ) {
    $url = '/wp-login.php?action=lostpassword';
    if( ! empty( $redirect ) )
        $url .= '&redirect_to=' . $redirect;
    return home_url() . $url;
}
add_filter( 'lostpassword_url', 'my_lostpwd_page', 10, 2 );


add_filter('network_site_url', function($url, $path, $scheme){

    if($path === 'wp-login.php?action=lostpassword'){
        $url = site_url($path, $scheme);
    }

    return $url;
},10,3);

include dirname(__FILE__) . '/../partials/user_registration_hooks.php';

include dirname(__FILE__) . '/../partials/last_login_functions.php';

/*extend check on single post to check if issue has been bought or license for a year*/
add_filter('credit_coins_user_can_access_post', 'online_magazine_check_post_access', 10, 2);

function online_magazine_check_post_access( $user_id, $post_id ){
    //verifico se post_id è un articolo
    // se non è un articolo return false
    // se è un articolo cerco id della rivista associata
    // verifico se utente ha acquistato rivista
    // se si ritorno true
    // se no ritorno false
    if( get_post_type( $post_id ) == 'onlimag-article' ){
        $linking_post_model = Linking_Posts_Model::getInstance();
        $post = get_post( $post_id );
        $linking_posts = $linking_post_model->get_linking_posts( $post );
        $linking_posts = $linking_posts->posts;
        if( ! empty( $linking_posts) ){
            $first_post = $linking_posts[0];
            $credits_coins_model = Credits_Coins_Model::getInstance();
            return $credits_coins_model->user_can_access_post( get_current_user_id(), $first_post->ID );
        }
    }
    return false;
}

/**/
function get_post_thumbnail_image_url( $post_id, $size = 'thumbnail', $default_img = '' ){
    $bg_post_id = get_post_thumbnail_id( $post_id );
    if( ! empty($bg_post_id) ){
        $url_bg = wp_get_attachment_image_src( $bg_post_id, $size );
        $url_bg = $url_bg['0'];
    }else{
        $url_bg = $default_img;;
    }
    return $url_bg;
}

/* specific function to retrieve:
- issues bought by an user,
- articles bought by an user and
- articles favourites by an user
we need to have the following plugin active:
- online-magazine
- credits-coins
- credits-coins-buy
*/
function get_issues_bought_by_user( $user_id ){
    add_filter('posts_join', 'posts_join_filter_for_articles_buyed' );
    add_filter('posts_where', 'posts_where_filter_for_articles_buyed' );
    add_filter('posts_groupby', 'posts_groupby_filter_for_articles_buyed' );

    $issues = new WP_Query( array('post_type' => 'onlimag-issue', 'posts_per_page' => 2 ) );
    return $issues;
}
function get_articles_bought_by_user( $user_id ){
    global $ommp;
    add_filter('posts_join', array( $ommp, 'posts_join_filter_for_articles' ) );
    add_filter('posts_fields', array( $ommp, 'posts_fields_filter_for_articles' ) );
    add_filter('posts_groupby', array( $ommp, 'posts_groupby_filter_for_articles' ) );
    add_filter('posts_join', array( $ommp, 'posts_join_filter_for_magazine' ) );
    add_filter('posts_where', array( $ommp, 'posts_where_filter_for_published_magazine' ) );
    add_filter('posts_join', 'posts_join_filter_for_articles_buyed'  );
    add_filter('posts_where', 'posts_where_filter_for_articles_buyed'  );

    $articles = new WP_Query( array('post_type' => 'onlimag-article', 'posts_per_page' => 2 ) );
    return $articles;
}

function get_articles_favourite_by_user( $user_id ){
    $res = array();
    return $res;
}


function posts_join_filter_for_articles_buyed( $join ) {
    global $wpdb;

    $join .=
        "
        LEFT JOIN " . $wpdb->base_prefix . "credits_coins_purchases
        ON " . $wpdb->posts . ".ID =  " . $wpdb->base_prefix . "credits_coins_purchases.post_id
        AND " . $wpdb->base_prefix . "credits_coins_purchases.user_id = " . get_current_user_id() . "
        ";
    return $join;
}

function posts_where_filter_for_articles_buyed( $where ) {
    global $wpdb;
    $where .= " AND " . $wpdb->base_prefix . "credits_coins_purchases.id is not null ";
    return $where;
}

function posts_groupby_filter_for_articles_buyed( $groupby ) {
    global $wpdb;
    $groupby = "{$wpdb->posts}.ID";
    return $groupby;
}
