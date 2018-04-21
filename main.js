window.onload = function () {

    switchNow = 0;
    var mh = $('.mobie-head');
    $('#open-hMenu').click(function () {
        if (switchNow == 0){
            animateFor('header','menuBackTop','menuBackZero');
            animateFor('#controlBtn','controlBtnSB','controlBtnSS');
            $('#controlBtn').find('i').eq(1).text('close').css({color: 'rgba(0,0,0,.45)'});
            mh.css({display: 'none'});
            $('#open-Vmenu').attr('disabled',true);
            switchNow = 1;
        }else {
            animateFor('header','menuBackZero','menuBackTop');
            animateFor('#controlBtn','controlBtnSS','controlBtnSB');
            $('#controlBtn').find('i').eq(1).text('menu').css({color: 'white'});
            mh.css({display: 'block'});
            $('#open-Vmenu').attr('disabled',false);
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
    });
    vMenu = 0;
    $('.vMenu-onBtn').click(function () {
        if (vMenu == 0){
            an_rotate('vMenu-onbtn','','180','400ms');
            an_Move('vMenu','140px','0','400ms');
            an_Move('header','140px','0','600ms');
            an_Move('smallMenu','50px','0','350ms');
            $('header').animate({
                paddingLeft : '80px'
            },function () {
                vMenu = 1;
            });
            $('.blogBody-pos').animate({
                left : '5%'
            })
        }else if (vMenu == 1){
            an_rotate('vMenu-onbtn','','0','400ms');
            an_Move('vMenu','0','0','400ms');
            an_Move('header','0','0','600ms');
            an_Move('smallMenu','0','0','350ms');
            $('header').animate({
                paddingLeft : '220px'
            },function () {
                vMenu = 0;
            });
            $('.blogBody-pos').animate({
                left : '0'
            })
        }
    });
  vMenu_M = 0;
    $('#open-Vmenu').click(function () {
        var h = screen.height;
        if (vMenu_M == 0){
                an_Move('body','-190px','0','350ms');
            an_Move('vMenu','-190px','0','350ms');
            $('body').after("<div class='shading'></div>");
                vMenu_M = 1;
                if (vMenu_M == 1){
                    $('.shading').click(function () {
                        an_Move('body','0','0','350ms');
                        an_Move('vMenu','0','0','350ms');
                        $('.shading').remove();
                        vMenu_M = 0;
                    });
                }
        }
    });

    $('.userBB:odd').addClass('mdui-col-offset-md-1');
};
function allHidden() {
    $('.tabCard').css({
        display : 'none'
    })
}
function animateFor(event,r,a) {
    $(event).removeClass(r);
    $(event).addClass(a);
} /* 通过添加类名来添加动画*/
function an_Move(obj,x,y,ms) {
    var e = document.getElementById(obj);
    e.style.transition="-webkit-transform "+ms+" ease-out";
    e.style.webkitTransform="translate("+x+","+y+") scale(1)";
}
function an_rotate(obj,xy,data,ms) {
    var e = document.getElementById(obj);
    e.style.transition="-webkit-transform "+ms+" ease-out";
    e.style.webkitTransform="rotate"+xy+"("+data+"deg) scale(1)";
}
function clearAn(event) {
    $(event).removeAttr('style');
}