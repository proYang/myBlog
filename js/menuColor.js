window.onload()={
	function randBg(){
	var menuColor =['#00d0ff','#9bbd1c','#ffaa00','#ff4086','#999'];
	var rand=Math.round(Math.random()*10);
	if (rand>4) {
		rand=10-rand;
	}
	document.querySelector('#text').style.backgroundColor=menuColor[rand];
	}
}