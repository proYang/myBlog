function myconfirm() {
		var msg=confirm("你确定操作？");
		if (msg==true) {
			return true;
		}else{
			return false;
		}
}