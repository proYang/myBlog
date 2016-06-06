require.config({
	baseUrl: './',
});
require([], function () {
	var showButton = {
		init: function() {
			var temp_charge = 1; //标志变量
			var share_button = document.querySelector('#share_button');
			var share_button_box = document.querySelector('#share_button_box');
			share_button.addEventListener('click', function() {
				showButton();
			});
			
			function showButton() {
				if (temp_charge == 1) {
					share_button_box.style.display = 'block';
					temp_charge = 2;
				} else {
					share_button_box.style.display = 'none';
					temp_charge = 1;
				}
			}
		},
	}
	return showButton.init();
});
// var temp_charge=1;//标志变量
// var share_button = document.querySelector('#share_button');
// var share_button_box = document.querySelector('#share_button_box');
// share_button.addEventListener('click',function () {showButton()});
// function showButton() {
// 	if (temp_charge==1) {
// 		share_button_box.style.display='block';
// 		temp_charge=2;
// 	}else{
// 		share_button_box.style.display='none';
// 		temp_charge=1;
// 	}
// }