function toggleEffect(sem){
  var semester = sem;
	var index = "#s"+semester+"i";
	var content = "#s"+semester+"c";
	$(index).click(function(){
      $(content).toggle("slow");
  });
}

function addEffects(){
  for (var i=1;i<9;i++){
    toggleEffect(i);
  }
  toggleEffect("Summer");
}

function addShowAll(){
  $("#allclasses").click(function(){
    $("#sSummerc").toggle("slow");
    for (var i=1;i<9;i++) {
      str="#s"+i+"c";
      $(str).toggle("slow");
    }
  });
}

$(document).ready(function(){
	addEffects();
  addShowAll();
  document.getElementById('main').style.height='100%';
});