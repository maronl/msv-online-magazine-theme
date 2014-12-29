<div class="row-fluid">

    <div class="col-sm-12">

        <footer>
            <div class="row">
                <div class="col-sm-3">
                    <h4><?php _e('Magazzeno Storico Verbanese','om_footer'); ?></h4>
                    <p>
                        <br><?php _e('Associazione Culturale di promozione sociale','om_footer'); ?>
                        <br><?php _e('con sede presso','om_footer'); ?>
                        <br><?php _e('Studio Exante Consulting sas di dott. Carlo Dell\'Orto','om_footer'); ?>
                        <br><?php _e('p.zza G. Matteotti 7','om_footer'); ?>,
                        <br><?php _e('Verbania Intra 28922 VB','om_footer'); ?>
                        <br>cf 93022080035
                        <br><?php _e('Sede operativa: 20123 Milano MI, via Borromei 1/A','om_footer'); ?>
                    </p>
                </div>
                <div class="col-sm-3">
                    <h4><?php _e('Teniamoci in contatto','om_footer'); ?></h4>
                    <p>
                        <a href="mailto:<?php echo antispambot('segreteria@verbanensia.org'); ?>"><?php echo antispambot('segreteria@verbanensia.org'); ?></a>
                        <br><a href="mailto:<?php echo antispambot('info@verbanensia.org'); ?>"><?php echo antispambot('info@verbanensia.org'); ?></a>
                    </p>
                    <h4><?php _e('Newsletter','om_footer'); ?></h4>
                    <p><?php _e('Per essere sempre informato sulle nostre attività','om_footer'); ?></p>
                    <form onsubmit="return submitmail()" method="post" action="http://associazione.verbanensia.org/subscribe-newsletter" id="newssubscr" name="newssubscr">
                        <div class="input-group add-on">
                            <input type="text" class="signup-newsletter" placeholder="Inserisci la tua email" name="">
                            <div class="input-group-btn">
                                <button class="btn btn-default signup-newsletter" type="submit"><i
                                        class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </div>
                    </form>
                    <h4><?php _e('Ultime Newsletter','om_footer'); ?></h4>
                    <p>
                    <ul>
                        <li><a target="_blank" href="http://us4.campaign-archive2.com/?u=e69934d85f228816c21742051&amp;id=8788691bb8">NL Ott 2014 - Oct 2014 NL <i class="icon-white icon-share-alt"></i></a></li>
                        <li><a target="_blank" href="http://us4.campaign-archive1.com/?u=e69934d85f228816c21742051&amp;id=820a2c6b5c&amp;e=6422b03626">NL Set 2014 - Sep 2014 NL <i class="icon-white icon-share-alt"></i></a></li>
                        <li><a target="_blank" href="http://us4.campaign-archive1.com/?u=e69934d85f228816c21742051&amp;id=351926c224">NL Ago 2014 - Aug 2014 NL <i class="icon-white icon-share-alt"></i></a></li>
                    </ul>
                    </p>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4><i class="glyphicon glyphicon-inbox"></i> <?php _e('Archivio','om_footer'); ?></h4>
                            <p>
                                <?php global $ommp; $ommp->the_issues_widget(array('title' => false, 'read_all_text' => 'Archivio Completo', 'item_number' => 5)); ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <h4><i class="glyphicon glyphicon-book"></i> <?php _e('Rubriche','om_footer'); ?></h4>
                            <p>
                                <?php global $ommp; $ommp->the_rubrics_widget(array('title' => false, 'read_all_text' => false, 'item_number' => 5)); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <h4>s</h4>
                    <?php echo do_shortcode( '[contact-form-7 id="4" title="Contatta Magazzeno Storico Verbanese"]' ) ?>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-sm-12">
                    <p>
                        <?php _e('@2014 Magazzeno Storico Verbanese - Tutti i diritti riservati','om_footer'); ?>
                    </p>
                </div>
            </div>
        </footer>

    </div>

</div>

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo get_template_directory_uri(); ?>/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/msv-rivista.js"></script>
</body>
</html>


<?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds.
