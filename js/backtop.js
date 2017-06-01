 
document.ready = function () {
            var OriginTitile = document.title;
            var titleTime;
            document.addEventListener('visibilitychange', function () {
                if (document.hidden) {
                    $('[rel="shortcut icon"]').attr('href', "/Content/Images/fail.ico");
                    document.title = '哎呀，崩溃啦！';
                    clearTimeout(titleTime);
                }
                else {
                    $('[rel="shortcut icon"]').attr('href', "/Content/Images/icon.png");
                    document.title = '咦！又好了！' + OriginTitile;
                    titleTime = setTimeout(function () {
                        document.title = OriginTitile;
                    }, 2000);
                }
            });
        }
 
 
 
 
 
 window.onload = function () {
            // 利用 data-scroll 属性，滚动到任意 dom 元素
            $.scrollto = function (scrolldom, scrolltime) {
                $(scrolldom).click(function () {
                    var scrolltodom = $(this).attr("data-scroll");
                    $(this).addClass("active").siblings().removeClass("active");
                    $('html, body').animate({
                        scrollTop: $(scrolltodom).offset().top
                    }, scrolltime);
                    return false;
                });
            };
            //判断位置控制 返回顶部的显隐
            if ($(window).width() > 800) {//如果窗体的宽度大于800
                var backTo = $("#back-to-top");//获取back-to-top对象
                var backHeight = $(window).height() - 980 + 'px';//让window高度减980
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 700 && backTo.css('top') === '-900px') {
                        backTo.css('top', backHeight);
                    }
                    else if ($(window).scrollTop() <= 700 && backTo.css('top') !== '-900px') {
                        backTo.css('top', '-900px');
                    }
                });

            }
            //启用
            $.scrollto("#back-to-top", 800);

        }


    
