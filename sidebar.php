<div class="col-sm-4 blog-sidebar">

    <div class="sidebar-module">
        <h4><i class="glyphicon glyphicon-inbox"></i> <?php _e( 'Archivio', 'online-magazine-theme' ); ?></h4>

        <ul class="archive-list">
            <?php
            global $ommp;

            $issues = $ommp->get_the_published_issues(array('posts_per_page' => 5));
            $issues = $issues->posts;

            if (!empty($issues)) {

                foreach ($issues as $issue) {
                    $thumb_bg = wp_get_attachment_image_src( get_post_thumbnail_id($issue   ->ID), 'large' );
                    $thumb_bg = $thumb_bg['0'];

                    echo '<li>' . PHP_EOL;
                    echo '<figure>' . PHP_EOL;
                    echo '<img class="img-circle" src="' . $thumb_bg . '">' . PHP_EOL;
                    echo '<figcaption>' . om_issue_number( $issue->post_title ) . '</figcaption>' . PHP_EOL;
                    echo '</figure>' . PHP_EOL;
                    echo '<p><a href="' . get_permalink( $issue->ID ) . '">' . PHP_EOL;
                    echo '<span class="title">' . __( 'Anno', 'online-magazine-theme' ) . ' ' . om_issue_year( $issue->post_title ) . '</span>' . PHP_EOL;
                    echo wp_trim_words($issue->post_excerpt, 15 ) . PHP_EOL;
                    echo '</a></p>' . PHP_EOL;
                    echo '</li>' . PHP_EOL;

                }

            }

            ?>
        </ul>

        <a href="<?php echo site_url() . '/issues'; ?>" class="btn-rivista pull-right"><?php _e( 'ARCHIVIO COMPLETO', 'online-magazine-theme' ); ?></a>

        <div class="clearfix"></div>

    </div>


    <div class="sidebar-module">
        <h4><i class="glyphicon glyphicon-book"></i> <?php _e( 'Rubriche', 'online-magazine-theme' ); ?></h4>

        <?php
        global $ommp;

        $container_format = '<ul class="rubrics-list">%s</ul>';
        $item_format = '<li><p><a href="/rubrics/%s"><span class="title">%s</span>Lorem ipsum dolor sit amet consectetuer quam pharetra consectetuer faucibus Nam.</a></p></li>';
        $ommp->the_rubrics_widget(array(
            'title' => false,
            'read_all_text' => false,
            'item_number' => 10,
            'item_format' => $item_format,
            'container_format' => $container_format
        ));
        ?>

        <div class="clearfix"></div>

    </div>

</div>

<div class="clearfix"></div>
