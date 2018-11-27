$(function(){
    $(".menuItem-edital-title").on("mouseover", function(){
        $(".header-subMenu-edital").css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(".header-subMenu-edital .header-subItem-content").css({
            "pointer-events": "all"
        });
    });
    $(".menuItem-edital").on("mouseleave", function(){
        $(".header-subMenu-edital").css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(".header-subMenu-edital .header-subItem-content").css({
            "pointer-events": "none"
        });
    });
    $(".menuItem-curso-title").on("mouseover", function(){
        $(".header-subMenu-curso").css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(".header-subMenu-curso .header-subItem-content").css({
            "pointer-events": "all"
        });
    });
    $(".menuItem-curso").on("mouseleave", function(){
        $(".header-subMenu-curso").css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(".header-subMenu-curso .header-subItem-content").css({
            "pointer-events": "none"
        });
    });
    $(".menuItem-turma-title").on("mouseover", function(){
        $(".header-subMenu-turma").css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(".header-subMenu-turma .header-subItem-content").css({
            "pointer-events": "all"
        });
    });
    $(".menuItem-turma").on("mouseleave", function(){
        $(".header-subMenu-turma").css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(".header-subMenu-turma .header-subItem-content").css({
            "pointer-events": "none"
        });
    });
    $(".menuItem-aluno-title").on("mouseover", function(){
        $(".header-subMenu-aluno").css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(".header-subMenu-aluno .header-subItem-content").css({
            "pointer-events": "all"
        });
    });
    $(".menuItem-aluno").on("mouseleave", function(){
        $(".header-subMenu-aluno").css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(".header-subMenu-aluno .header-subItem-content").css({
            "pointer-events": "none"
        });
    });
    $(".header-subItem-content").focusin(function(){
        var elementoPai = $(this).parent().parent().parent();
        elementoPai.css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(this).css({
            "pointer-events": "all"
        });
    });
    $(".header-subItem-content").focusout(function(){
        var elementoPai = $(this).parent().parent().parent();
        elementoPai.css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(this).css({
            "pointer-events": "none"
        });
    });
    $(".menuItem-sorteio-title").on("mouseover", function(){
        $(".header-subMenu-sorteio").css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(".header-subMenu-sorteio .header-subItem-content").css({
            "pointer-events": "all"
        });
    });
    $(".menuItem-sorteio").on("mouseleave", function(){
        $(".header-subMenu-sorteio").css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(".header-subMenu-sorteio .header-subItem-content").css({
            "pointer-events": "none"
        });
    });
    $(".header-subItem-content").focusin(function(){
        var elementoPai = $(this).parent().parent().parent();
        elementoPai.css({
            "z-index": 999,
            "opacity": 1,
            "top": "110px",
            "left": 0
        });
        $(this).css({
            "pointer-events": "all"
        });
    });
    $(".header-subItem-content").focusout(function(){
        var elementoPai = $(this).parent().parent().parent();
        elementoPai.css({
            "z-index": "-999",
            "opacity": 0,
            "top": "-110%",
            "left": 0
        });
        $(this).css({
            "pointer-events": "none"
        });
    });
    
});