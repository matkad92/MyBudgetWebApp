window.onload = changeImage;


var number = 1;

var timer1 = 0;
var timer2 = 0;


function hide()
{				      
	$("#MainPageGallery").fadeOut(500);
}


function changeImage()
{
	number++;
	if (number > 2) number = 1;
	
	//url("img/slajd1.jpg");
	
	var file = "url(\"img/slajd" + number + ".jpg\" )";//  \ jest to znak sterujacy, \" daje nam cudzyslow w html
	
	
	document.getElementById("MainPageGallery").style.background = file;
	$("#MainPageGallery").fadeIn(500);
	
	timer1 = setTimeout("changeImage()", 5000);
	timer2 = setTimeout("hide()", 4500);
	
}

