window.onload = function () {

    switchNow = 0;
    $('#controlBtn').click(function () {
        if (switchNow == 0){
            animateFor('header','menuBackTop','menuBackZero');
            animateFor('#controlBtn','controlBtnSB','controlBtnSS');
            $(this).find('i').text('close').css({color: 'rgba(0,0,0,.45)'});
            switchNow = 1;
        }else {
            animateFor('header','menuBackZero','menuBackTop');
            animateFor('#controlBtn','controlBtnSS','controlBtnSB');
            $(this).find('i').text('menu').css({color: 'white'});
            switchNow = 0;
        }
    });

    $('.flexTag').click(function () {
        nowCard = $(this).val();
        $('.cat').remove();
        $(this).after('<div class="cat"></div>');
        $('.cat').animate({
            top : '0',
            opacity : '1'
        });
        allHidden();
        $('.tabCard').eq(nowCard).css({
            display : 'block'
        })
    });

    switchNowSearch = 0;
    searBtn = $('.searchBtn');
    searBtn.click(function () {
        if (switchNow == 0){
            animateFor('.searchColor','searchOut','searchIN');
            $('.searchInput').animate({opacity : '1'},300,function () {
                searBtn.animate({opacity:'0'},120,function () {
                    searBtn.find('i').text('close');
                });
                searBtn.animate({opacity:'1'},200);
                $('.searchInput').attr('disabled',false);
            });
            switchNow = 1;
        }else {
            animateFor('.searchColor','searchIN','searchOut');
            $('.searchInput').animate({opacity : '0'},680,function () {
                searBtn.animate({opacity:'0'},120,function () {
                    searBtn.find('i').text('search');
                });
                searBtn.animate({opacity:'1'},200);
                $('.searchInput').attr('disabled',true);
            });
            switchNow = 0;
        }
    })



};
function allHidden() {
    $('.tabCard').css({
        display : 'none'
    })
}
function animateFor(event,r,a) {
    $(event).removeClass(r);
    $(event).addClass(a);
} /* 通过添加类名来添加动画，css动画是真滴舒服 */