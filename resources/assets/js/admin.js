$(document).ready(function(){
    $('.admin-menu>.nav>li>a').click(function(){
        $(this).parent().siblings().find('.nav').slideUp();
        $(this).siblings('.nav').slideDown();
    });

    $('#collapseMenu').toggle(
        function(){
            $('.admin-menu').removeClass('hidden-xs', 'hidden-sm');
            $('.admin-menu').hide();
            $('.admin-menu').addClass('.coverMenu');
            $('.admin-menu').slideDown();
        },
        function(){
            $('.admin-menu').removeClass('.coverMenu');
            $('.admin-menu').slideUp();
            $('.admin-menu').addClass('hidden-xs', 'hidden-sm');
        }
    );
});