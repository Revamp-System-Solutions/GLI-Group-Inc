var lastScrollTop = 0;
var detectScroll = function(event) {
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > 200){
        $('#appheader').removeClass('py-6').addClass('py-2')
        $("#logo-link").children('img').removeClass('w-12').addClass('w-6')
        $("#logo-link").children('span').removeClass('lg:text-2xl text-base').addClass('lg:text-base text-sm')
    } else if(st == 0){
        $('#appheader').removeClass('py-2').addClass('py-6')
        $("#logo-link").children('img').removeClass('w-6').addClass('w-12')
        $("#logo-link").children('span').removeClass('lg:text-base text-sm').addClass('lg:text-2xl text-base')
    }
    lastScrollTop = st <= 0 ? 0 : st;    
}