<?php

$post = $issue_post;

add_filter('posts_join', array( 'Online_Magazine_Manager_Public', 'posts_join_filter_for_rubrics_related_post' ), 99  );
add_filter('posts_fields', array( 'Online_Magazine_Manager_Public', 'posts_fields_filter_for_rubrics_related_posts' ), 99 );
add_filter('posts_groupby', array( 'Online_Magazine_Manager_Public', 'posts_groupby_filter_for_rubrics_related_posts' ) );
$related_posts = lps_get_related_posts($issue_post);
remove_filter('posts_join', array( 'Online_Magazine_Manager_Public', 'posts_join_filter_for_rubrics_related_post' ), 99 );
remove_filter('posts_fields', array( 'Online_Magazine_Manager_Public', 'posts_fields_filter_for_rubrics_related_posts' ), 99 );
remove_filter('posts_groupby', array( 'Online_Magazine_Manager_Public', 'posts_groupby_filter_for_rubrics_related_posts' ) );

$post = $article_post;

?>

<div class="index-content">

    <h3><?php _e('Indice Rivista', 'online-magazine-theme' ); ?></h3>

    <ul>
        <li>
            <a href="/issues/<?php echo $issue_post->post_name; ?>?editoriale=true">Editoriale</a>
        </li>
        <li><?php _e('Articoli Pubblicati', 'online-magazine-theme' ); ?>
            <ul>
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

                    <li><a href="/articles/<?php echo $post->post_name; ?>"><?php echo $post->post_title; ?></a></li>

                <?php endwhile; ?>
            </ul>
        </li>
    </ul>

</div>