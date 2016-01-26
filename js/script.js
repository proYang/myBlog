// 控制页面TAB切换效果
document.querySelector("#menu-write").addEventListener('click',appear);
document.querySelector("#menu-message").addEventListener('click',appear);
document.querySelector("#menu-manage").addEventListener('click',appear);
document.querySelector("#menu-class").addEventListener('click',appear);
document.querySelector("#menu-photos").addEventListener('click',appear);
document.querySelector("#menu-words").addEventListener('click',appear);
function appear () {
	var allArea = document.querySelectorAll(".control-area");
	for (var i = allArea.length - 1; i >= 0; i--) {
		allArea[i].style.display="none";
	}
	var tempId=this.id;
	tempId=tempId.replace("menu","#area");
	document.querySelector(tempId).style.display="block";
}