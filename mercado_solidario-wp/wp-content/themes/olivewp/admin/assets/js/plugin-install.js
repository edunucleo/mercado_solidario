jQuery(document).ready(function($) {
    'use strict';
    var this_obj = olivewp_companion_install;

    $(document).on('click', '.spicethemes-plugin-install', function(event) {
        event.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        button.text(this_obj.installing + '...').addClass('updating-message');
        wp.updates.installPlugin({
            slug: slug,
            success: function(data) {
                button.attr('href', data.activateUrl);
                button.text(this_obj.activating + '...');
                button.removeClass('button-secondary updating-message spicethemes-plugin-install');
                button.addClass('button-primary spicethemes-plugin-activate');
                button.trigger('click');
            },
            error: function(data) {
                button.removeClass('updating-message');
                button.text(this_obj.error);
            },
        });
    });

    $(document).on('click', '.spicethemes-plugin-activate', function(event) {
        event.preventDefault();
        var button = $(this);
        var slug = button.data('slug');
        var url = button.attr('href');
        var pathname = window.location.pathname.split( '/' );
        var newURL1 = window.location.protocol + "//" + window.location.host + "/" + pathname[1]+ "/" + pathname[2];
        var newURL2= newURL1 + "/admin.php?page=olivewp-companion";
        if (typeof url !== 'undefined') {
            // Request plugin activation.
            jQuery.ajax({
                async: true,
                type: 'GET',
                url: url,
                beforeSend: function() {
                    button.text(this_obj.activating + '...');
                    button.removeClass('button-secondary');
                    button.addClass('button-primary activate-now updating-message');
                },
                success: function(data) {
                    if(slug=='olivewp-companion'){
                        window.location.href = newURL2;
                    }else{
                        location.reload();
                    }
                }
            });
        }
    });


    $(document).on('click', '.action-watch', function(event) {
        event.preventDefault();
        var action_id = $(this).parents('.action').attr('id');
        var $icon =   $(this).children('.dashicons');
        if(action_id){
            $.ajax({
                url: this_obj.ajax_url,
                type: 'POST',
                data: {action: 'olivewp_update_rec_acts', action_id:action_id},
                success:function(data) {
                    if($icon.hasClass('dashicons-visibility')){
                        $icon.removeClass('dashicons-visibility');
                        $icon.addClass('dashicons-hidden');
                    }else{
                        $icon.removeClass('dashicons-hidden');
                        $icon.addClass('dashicons-visibility');
                    }
                }
            });
        }
        
    });

    $(document).on('click', '.spicethemes-customizer-notification-dismiss', function(event) {
        event.preventDefault();
        var $container = $(this).parent();
        var $icon_child = $(this).children('i.fa'); 
        if($icon_child.hasClass('fa-refresh')){
            return;
        }
        var slug = $(this).data('slug');
        var sdata = {};
        if(slug){
            sdata.action = 'olivewp_hide_customizer_notice';
            sdata.olivewp_plugin_slug = slug;
        }
        else {
            sdata.action = 'olivewp_hide_customizer_companion_notice';
        }
        $icon_child.removeClass('fa-times').addClass('fa-refresh fa-spin');
        $.ajax({
            url: this_obj.ajax_url,
            type: 'POST',
            data: sdata,
            success:function(data) {
                $container.remove();
            }
        });
    });
});

jQuery(function(){
    var $mainContent=jQuery('#main-content'),
    $cat_links=jQuery('ul.categories-filters li a');
    
    $cat_links.on('click',function(e){
        e.preventDefault();
        $e1=jQuery(this);
        var value=$e1.attr("href");
        $mainContent.animate({opacity:"0.5"});
        $mainContent.load(value + "#getting_started",function(){
        $mainContent.animate({opacity:"1"});    
        });
    });
});