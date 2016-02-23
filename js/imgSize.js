funBannerResize();
// 窗口的大小
var width = $(window).width(), height = $(window).height();
function funBannerResize() {
    var eleTopBanner = document.getElementById("wallpaper");
    var widthTopBanner = eleTopBanner.width();
    var heightTopBanner = eleTopBanner.height();
    // 原始图片的尺寸比例
    var scaleBanner = widthTopBanner / heightTopBanner;
    // 此时窗口的比例
    var scaleWindow = width / height;
    // 策略如下：
    // 如果图片的宽度和高度均超过窗体，很简单，水平且居中
    // 纵横比例对比
    if (scaleBanner > scaleWindow) {
        // 如果横纵比比窗体大
        // 说明窗体比较窄
        // 我们需要图片高度100%, 水平居中
        eleTopBanner.style.height = "100%";
        eleTopBanner.style.width = height * scaleBanner;
        eleTopBanner.style.left = -(height * scaleBanner - width) / 2;
        eleTopBanner.style.top = 0;
    } else {
        // 否则窗体比较扁平
        // 优先宽度100%显示
        eleTopBanner.style.height = width / scaleBanner;
        eleTopBanner.style.width = "100%";
        eleTopBanner.style.left = 0;
        eleTopBanner.style.top = -(width / scaleBanner - height) / 2;
    }
};
//图片大小随浏览器窗口动态变化
$(window).resize(function(){
    funBannerResize();
});