$(function () {
    $('.tweet__comment-btn').click(function () {
        $('.comment-modal').removeClass('is-hidden');
    })
    $('.modal-close').click(function () {
        $('.comment-modal').addClass('is-hidden');
    })

    $('.nav__list__item').hover(function () {
        $(this).find('.sub__nav__list').fadeIn();
    }, function () {
        $(this).find('.sub__nav__list').fadeOut();
    })

    var sideContents = $('.side-contents');
    var sideContentsOffsetTop = $('.side-contents').offset().top; //side-contentsのtopを取得 148
    console.log(sideContentsOffsetTop);

    var sideContentsOffsetLeft = sideContents.offset().left; //704
    console.log(sideContentsOffsetLeft);

    var height = sideContents.outerHeight();//4236
    console.log(height);

    var harfHeight = height / 3;

    var footerTop = $('.footer').offset().top;//4434
    console.log(footerTop);


    var sideMarginTop = 50;
    var sideMarginBottom = 50;

    // $(window).scroll(function () {
    //     var scrollTop = $(this).scrollTop();
    //     console.log(scrollTop);

    //     if (scrollTop > harfHeight) {
    //         sideContents.css({
    //             'position': 'fixed',
    //             'top': -harfHeight,
    //             'left': '60%'
    //         })
    //     } else {
    //         sideContents.css({
    //             'position': 'static',
    //             'top': 'auto',
    //             'left': 'auto'
    //         })
    //     }
    // })
})