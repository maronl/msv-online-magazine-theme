jQuery(function() {
    jQuery('.btn-buy-article').click(function(e){
        e.preventDefault();
        hideBuyButtons();
        scrollToAnchor( jQuery(this).attr('href').replace('#', '') );
        jQuery('.confirm-message').html(jQuery('.confirm-message-article').html());
        jQuery('.confirm-buy-article').show();
    });
    jQuery('.btn-buy-issue').click(function(e){
        e.preventDefault();
        hideBuyButtons();
        scrollToAnchor( jQuery(this).attr('href').replace('#', '') );
        jQuery('.confirm-message').html(jQuery('.confirm-message-issue').html());
        jQuery('.confirm-buy-issue').show();
    });
    jQuery('.btn-buy-season').click(function(e){
        e.preventDefault();
        hideBuyButtons();
        scrollToAnchor( jQuery(this).attr('href').replace('#', '') );
        jQuery('.confirm-message').html(jQuery('.confirm-message-season').html());
        jQuery('.confirm-buy-season').show();
    });

    hideBuyButtons = function(){
        jQuery('.confirm-buy-season').hide();
        jQuery('.confirm-buy-issue').hide();
        jQuery('.confirm-buy-article').hide();
    }


    scrollToAnchor = function( id ) {
        var elem = jQuery("a[name='"+ id +"']");
        if ( typeof( elem.offset() ) === "undefined" ) {
            elem = jQuery("#"+id);
        }
        if ( typeof( elem.offset() ) !== "undefined" ) {
            jQuery('html, body').animate({
                scrollTop: elem.offset().top
            }, 1000 );
        }
    };



    jQuery(function() {
        jQuery('.btn-confirm-buy-article').click(function(event){
            ajaxurl = ajax_credits_coins.url;
            event.preventDefault();
            if(!jQuery(this).hasClass('button-disabled')){
                jQuery(this).addClass('button-disabled');
                jQuery('.alert').fadeOut(function(){jQuery(this).remove();});
                jQuery.post(
                    ajaxurl,
                    {
                        'action':'buy_post',
                        'post_id':jQuery(this).attr('href').slice(1),
                        'security': ajax_credits_coins.security,
                    },
                    function(response){
                        jQuery('.btn-confirm-buy-article').removeClass('button-disabled');
                        if(response.status == 1){
                            jQuery('.btn-confirm-buy-article').after(jQuery(alert_buy_post_success(response.msg)).hide());
                            jQuery('.alert').fadeIn();
                            setTimeout(function(){location.reload();}, 3000);
                        }else if(response.status == 0){
                            jQuery('.btn-confirm-buy-article').after(jQuery(alert_buy_post_error(response.msg)).hide());
                            jQuery('.alert').fadeIn();
                        }
                    },
                    'json'
                );
            }
        });

    });

    jQuery(function() {
        jQuery('.btn-confirm-buy-issue').click(function(event){
            ajaxurl = ajax_credits_coins.url;
            event.preventDefault();
            if(!jQuery(this).hasClass('button-disabled')){
                jQuery(this).addClass('button-disabled');
                jQuery('.alert').fadeOut(function(){jQuery(this).remove();});
                jQuery.post(
                    ajaxurl,
                    {
                        'action':'buy_post',
                        'post_id':jQuery(this).attr('href').slice(1),
                        'security': ajax_credits_coins.security,
                    },
                    function(response){
                        jQuery('.btn-confirm-buy-issue').removeClass('button-disabled');
                        if(response.status == 1){
                            jQuery('.btn-confirm-buy-issue').after(jQuery(alert_buy_post_success(response.msg)).hide());
                            jQuery('.alert').fadeIn();
                            setTimeout(function(){location.reload();}, 3000);
                        }else if(response.status == 0){
                            jQuery('.btn-confirm-buy-issue').after(jQuery(alert_buy_post_error(response.msg)).hide());
                            jQuery('.alert').fadeIn();
                        }
                    },
                    'json'
                );
            }
        });

    });

    alert_buy_post_success = function ( message ) {
        html = '<div role="alert" class="alert alert-success">' +
        message +
        '</div>';
        return html;
    }

    alert_buy_post_error =function ( message ) {
        html = '<div role="alert" class="alert alert-danger">' +
        message +
        '</div>';
        return html;
    }

});
