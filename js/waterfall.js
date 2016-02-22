function waterfall (parent,box) {
	// 将bigbox下的smallbox全部取出
	var oParent=document.getElementById(parent);
	var oBoxs=getByClass(oParent,box);	// 根据class获取该class下元素
	var oBoxW=oBoxs[0].offsetWidth;//获取small盒子宽度
	var cols=parseInt(oParent.offsetWidth/oBoxW);// 计算列数(bigbox.width/small.width)并取整
	var hArr=[];
	for (var i = 0; i < oBoxs.length; i++) {
		if (i<cols) {
			hArr.push(oBoxs[i].offsetHeight);
		}else{
			var minH=Math.min.apply(null,hArr);
			var index=getMinHeightIndex(hArr,minH);	// 获取height最小时对应的列数
			oBoxs[i].style.position="absolute";
			oBoxs[i].style.top=minH+"px";
			oBoxs[i].style.left=oBoxW*index+"px";
			hArr[index]+=oBoxs[i].offsetHeight;
		}
	}
	var bigboxH=Math.max.apply(null,hArr);
	oParent.style.height=bigboxH+"px";
}

function getByClass (parent,clsName) {
	// 根据class获取该class下元素
	var boxArr=[];
		// 获取parent下的所有元素
		allElements=parent.getElementsByTagName('*');
		for (var i = 0; i < allElements.length; i++) {
			if(allElements[i].className==clsName){
				boxArr.push(allElements[i]);
			}
		}
	return boxArr;

}
function getMinHeightIndex (arr,val) {
	// 获取height最小时对应的列数
	for (var i = 0; i < arr.length; i++) {
		if(arr[i]==val)
			return i;
	}
}
// function bigboxH (boxs) {
// 	for (var i = 0; i < boxs.length; i++) {
// 		var temp=0;
// 		var boxBottom=parseInt(boxs[i].style.top)+boxs[i].offsetHeight;
// 		console.log(boxBottom);
// 		// if(parseInt(boxs[i].style.top)>temp){
// 		// }
// 	}
// 	return temp;
// }
