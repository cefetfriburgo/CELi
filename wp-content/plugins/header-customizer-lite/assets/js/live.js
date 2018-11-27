(function($) {
    var hc = $('.hc-wrap');


    function hc_toggle_menu_items()
    {
        var lis = hc.find('.primary > ul li').has('.sub-menu');

        if ('' === hc_obj.sm_is_onhover) {
            lis.addClass('onclick');
        }

        hc.find('.primary > ul a')
            .on('click', function(e) {
                if ($(window).width() <= hc_obj.rsp_max_width) {
                    return;
                }
                if ( ! $(this).parent().hasClass('onclick')) {
                    return;
                }

                e.preventDefault();
                e.stopPropagation();
                $(this).parent().siblings().removeClass('out');
                if ($(this).parent().hasClass('out')) {
                    $(this).parent().removeClass('out');
                    $(this).parent().find('li.out').removeClass('out');
                } else {
                    $(this).parent().addClass('out');
                }

                if ( ! $(this).closest('ul').hasClass('sub-menu')) {
                    $(this).siblings().each(function(i, el) {
                        $(el).find('li').removeClass('out');
                    });
                }
            });

        $(document).on('click', function() {
            lis.removeClass('out');
        });
    }


    function hc_handle_toggle_hamburger()
    {
        hc.find('.hc-toggle').on('click', function() {
            $(this).toggleClass('open');
            hc.find('.primary').toggleClass('open');
        });

        var toggle = hc.find('.toggle-wrap');
        hc.find('.primary').on('click', 'li.ar > a', function(e) {
            if (toggle.is(':visible')) {
                e.preventDefault();
                $(this).next('.sub-menu').toggle();
            }
        });
    }


    function hc_toggle_menu_items_rsp()
    {
        if ($(window).width() > hc_obj.rsp_max_width) {
            return;
        }

        hc.find('.primary > ul > li a').on('click', function(e) {
            var sib = $(this).siblings('.sub-menu');
            if (sib.length) {
                e.preventDefault();
                e.stopPropagation();
                $(this).parent().toggleClass('rsp-out');
            }
        });
    }


    function hc_put_submenu_arrow_items()
    {
        hc.find('.primary > ul li').each(function(i, el) {
            if ($(el).find('> .sub-menu').length && hc_obj.mmenu_show_arrow) {
                $(el).addClass('ar');
            }
        });
    }


    hc_toggle_menu_items();
    hc_handle_toggle_hamburger();
    hc_toggle_menu_items_rsp();
    hc_put_submenu_arrow_items();

})(jQuery);

