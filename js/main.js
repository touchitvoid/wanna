window.onload = function () {
    reload();
    sidebarState = true;
    siState =true;
    $('.sidebarControlBtn').click(function () {
       domWidth = $(document).width();
       if (sidebarState){
           if (domWidth <= 1475){
               $('.vMenu').css({transform : 'translate(0,0)'});
               $('.overlay').css({display : 'block'});
               $('#header').css({padding : '0 244px 0 24px'});
           }else if (domWidth > 1475){
               $('.vMenu').css({transform : 'translate(220px,0)'});
               $('.overlay').css({display : 'none'});
               $('header').css({paddingRight : '24px'});
               $('body').css({paddingRight : '0'})
           }
           sidebarState = false;
       }else {
           if (domWidth <= 1475){
               $('.vMenu').css({transform : 'translate(220px,0)'});
               $('.overlay').css({display : 'none'});
               $('#header').css({padding : '0 24px'});
           }else if (domWidth >1475){
               $('.vMenu').css({transform : 'translate(0,0)'});
               $('.overlay').css({display : 'none'});
               $('header').css({paddingRight : '244px'});
               $('body').css({paddingRight : '220px'})
           }
           sidebarState = true;
       }
    });
    $('.overlay').click(function () {
        $('.vMenu').css({transform : 'translate(220px,0)'});
        $('.overlay').css({display : 'none'});
        $('#header').css({padding : '0 24px'});
        sidebarState = true;
    });
    $('.searchBtn').click(function () {
        if (sidebarState){
            $('#header form').css({
                transform : 'translate(0,100%)'
            });
            sidebarState = false;
        }else {
            $('#header form').css({
                transform : 'translate(0,0)'
            });
            sidebarState = true;
        }
    })

};
function reload() {
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

    $('.page-navigator > li').click(function () {
            $.pjax({
                url : $(this).find('a').attr('href'),
                container : '#qwq',
                fragment: '#qwq',
                timeout : '50000'
            })
    });
}
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
function an_Scale(obj,x,ms) {
    var e = document.getElementById(obj);
    e.style.transition="-webkit-transform "+ms+" ease-out";
    e.style.webkitTransform="scale("+x+")";
}
function an_rotate(obj,xy,data,ms) {
    var e = document.getElementById(obj);
    e.style.transition="-webkit-transform "+ms+" ease-out";
    e.style.webkitTransform="rotate"+xy+"("+data+"deg) scale(1)";
}