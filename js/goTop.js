window.onload=function(){
	var top = document.querySelector("#goTop");
	var timer = null;
	var clientHeight=document.documentElement.clientHeight;
	
	top.addEventListener('click',function(){goTop();});
	window.onscroll=function(){
		var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
		if (scrollTop>=clientHeight) {
			top.style.display='block';
		}else{
			top.style.display='none';
		}
	}
}
function goTop() {
		// 设置定时器s
		timer = setInterval(function () {
			// 获取滚动条距离顶部高度
			var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
			var speed = Math.floor(-scrollTop/6);
			document.documentElement.scrollTop = window.pageYOffset = document.body.scrollTop=scrollTop+speed;
			// console.log(scrollTop);
			if (scrollTop==0) {
				clearInterval(timer);
			}
		},30);
	}
// go-top效果
// function goTop() {
// 	兼容各浏览器
// 	var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
// 	window.scrollBy(0,-12);
// 	if(scrollTop>0) { 
// 	// setInterval('goTop()',1000)
// 	setTimeout('goTop()',5);
// 	}
// }