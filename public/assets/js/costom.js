$(function(){
    $('.tweet__comment__btn').click(function(){
        $('.comment-modal').removeClass('is-hidden');
    })
    $('.modal-close').click(function(){
        $('.comment-modal').addClass('is-hidden');
    })
})