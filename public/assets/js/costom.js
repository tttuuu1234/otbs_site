$(function(){
    $('.tweet__comment__btn').click(function(){
        $('.comment-modal').removeClass('is-hidden');
    })
    $('.modal-close').click(function(){
        $('.comment-modal').addClass('is-hidden');
    })

    $('.nav__list__item').hover(function(){
        $(this).find('.sub__nav__list').fadeIn();
    }, function(){
        $(this).find('.sub__nav__list').fadeOut();
    })
})