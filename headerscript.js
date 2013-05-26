

var nextDestination;//"e.g. index.php"

function navCallBack(){//callback function
	window.location=nextDestination;
}

function navEvent(nxtPage){//li's id used for link to next page
	$("#"+nxtPage).click(function(){
		nextDestination=nxtPage+".php";
		$(".nav").fadeOut("slow",navCallBack);
	});
}

$(document).ready(function(){
	$("li").each(function(){
		navEvent(this.id);
	});
});
