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
    
    $('#comment-counts').click(function () {
        if ($('.comments-box').css('display') == 'none') {
            $('.comments-box').slideDown(100);            
        } else {
            $('.comments-box').slideUp(100);
        }
        
    })
})