var url;
var win_name = "School";
var wd       = 100;
var wh       = 100; 

function open_win(url, wd, wh, win_name) {
	window.open(url, win_name, 'width='+wd+',height='+wh+',left=140,top=40,scrollbars=yes,menubar=yes' );
}

