function toggleEffect(semester){
	var index = "#s"+semester+"i";
	var content = "#s"+semester+"c";
	$(index).click(function(){
    	$(content).toggle("slow");
  	});
}

function addEffects(){
	toggleEffect(1);
	toggleEffect(2);
	toggleEffect(3);
	toggleEffect(4);
	toggleEffect(5);
	toggleEffect(6);
	toggleEffect(7);
	toggleEffect("Summer");	
}

function addShowAll(){
  $("#allclasses").click(function(){
    $("#sSummerc").toggle("slow");
    $("#s1c").toggle("slow");
    $("#s2c").toggle("slow");
    $("#s3c").toggle("slow");
    $("#s4c").toggle("slow");
    $("#s5c").toggle("slow");
    $("#s6c").toggle("slow");
    $("#s7c").toggle("slow");
	//document.getElementById('main').style.height='1100px';
  });
}

$(document).ready(function(){
	addEffects();
  	addShowAll();
  	document.getElementById('main').style.height='100%';
});