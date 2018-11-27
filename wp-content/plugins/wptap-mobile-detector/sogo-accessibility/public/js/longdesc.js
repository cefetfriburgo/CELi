(function ($) {
    'use strict';
    $('img[longdesc]').each(function () {
        var longdesc = $(this).attr('longdesc');
        var text = '<span>Long Description</span>';
        var classes = $(this).attr('class');
        $(this).attr('class', '');
        $(this).wrap('<div class="sogo-ld" />')
        $(this).parent('.sogo-ld').addClass(classes);
        $(this).parent('.sogo-ld').append('<div class="longdesc" aria-live="assertive"></div>');
        $(this).parent('.sogo-ld').append('<button>' + text + '</button>');
        $(this).parent('.sogo-ld').children('.longdesc').hide();
        $(this).parent('.sogo-ld').children('.longdesc').load(longdesc + ' #desc');
        $(this).parent('.sogo-ld').children('button').toggle(function () {
            $(this).parent('.sogo-ld').children('.longdesc').show(150);
        }, function () {
            $(this).parent('.sogo-ld').children('.longdesc').hide();
        });
    });
}(jQuery));

(function ($) {
    'use strict';
    $('img[longdesc]').each(function () {
        var longdesc = $(this).attr('longdesc');
        var alt = $(this).attr('alt');
        var classes = $(this).attr('class');
        $(this).wrap('<div class="sogo-ld" />');
        $(this).parent('.sogo-ld').addClass(classes);
        $(this).attr('alt', '').attr('class', '');
        $(this).parent('.sogo-ld').append('<a href="' + longdesc + '" class="longdesc-link">Description<span> of' + alt + '</span></a>');
    });
}(jQuery));