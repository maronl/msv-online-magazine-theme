<div class="row-fluid">

    <div class="col-sm-8">

        <?php
        global $post;
        $latest_issue = $ommp->get_the_published_issues( array( 'post_per_page' => 1 ) );
        $post = $latest_issue->post;
        ?>

        <?php get_template_part( 'content-homepage-latest-issue' ); ?>

        <?php
        $next_issue = $ommp->get_the_next_issue();
        $post = $next_issue;
        ?>

        <?php get_template_part( 'content-homepage-next-issue' ); ?>

        <div class="row article-little">
            <div class="col-sm-6 most-read">
                <h2>Articoli più letti</h2>
                <ul>
                    <?php
                    $most_read_query = $ommp->get_the_most_read_articles();
                    $most_read = $most_read_query->posts; ?>
                    <?php foreach ( $most_read as $post): ?>

                        <?php
                        setup_postdata( $post );
                        get_template_part( 'list-onlimag-article-little');
                        ?>

                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-6 most-voted">
                <h2>Articoli più votati</h2>
                <ul>
                    <?php
                    $most_voted_query = $ommp->get_the_most_voted_articles();
                    $most_voted = $most_voted_query->posts ?>
                    <?php foreach ( $most_voted as $post): ?>

                        <?php
                        setup_postdata( $post );
                        get_template_part( 'list-onlimag-article-little');
                        ?>

                    <?php endforeach; ?>
                </ul>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>

    </div>

    <!-- /.blog-main -->

    <?php get_sidebar(); ?>

</div>
<!-- /.row -->