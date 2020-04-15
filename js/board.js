atonelist = ['b1', 'b8', 'b57', 'b64'];
glasslist = ['b28', 'b29', 'b36', 'b37'];
arrowlist = ["b2","b3","b4","b5","b6","b7",
	"b9","b17","b25","b33","b41","b49",
	"b16","b24","b32","b40","b48","b56",
	"b58", "b59","b60","b61","b62","b63"]
actions=[];
soundon=true;

function buttclick(id) {
	log = {time: Date.now(), action: id, effect: ''}
	if(document.getElementById(id).style.backgroundColor!="blue"){
		document.getElementById(id).style.backgroundColor= "blue";
		if(_.contains(atonelist, id)){
			atone.play(), log.effect="atone"
		}
		else if(_.contains(glasslist, id)){
			glass.play(), log.effect="glass"
		}
		else if(_.contains(arrowlist, id)){
			arrow.play(), log.effect="arrow"
		}
		else{
			blop.play(), log.effect="blop"
		}
	}
	else{
		document.getElementById(id).style.backgroundColor="white";
	}
	console.log(log)
}

function blankslate() {
	var bees=document.getElementsByClassName("round-button");
	for (var i=0; i<bees.length; i++){
		bees[i].style.backgroundColor="white";
}
	
}

function submit() {
	log = {time: Date.now(), action: "submit", effect: "submit"}
	console.log(log)

	var bees=document.getElementsByClassName("round-button");
	var pattern=[];

	for (var i=0; i<bees.length; i++){
		if(bees[i].style.backgroundColor=="blue"){
			pattern.push(1)
		}
		else{
			pattern.push(0)
		}
	}
	var jsonpattern = JSON.stringify(pattern);
	console.log("submitted pattern", jsonpattern);
	pattern=[];
}

function togglesound() {
	if (soundon){
		// if sound is on, turn sound off
		document.getElementById("audio").innerHTML="sound on";
		Howler.mute(true); // mute all howlers
		soundon=false;
	}
	else{
		document.getElementById("audio").innerHTML= "sound off";
		Howler.mute(false); // unmute all howlers
		soundon=true;
		// atone.mute(false);
		// glass.mute(false);
		// arrow.mute(false);
		// blop.mute(false);
	}
	log = {time: Date.now(), action: "sound", effect: soundon ? "soundon" : "soundoff"}
	console.log(log)
}


function drawdemo() {
	picture = getSelectedDemo()
	console.log("picture", picture)
	switch(picture) {
		case "Rectangle":
		  picturearray= [0,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,0,0,1,0,0,0,1,0,0,1,0,0,0,0,0,1,1,0,0,0,0,0,1,0,0,1,0,0,0,1,0,0,0,0,1,0,1,0,0,0,0,0,0,1,0,0,0,0]
		  break;
		case "Heart":
			picturearray=[0,0,0,0,0,0,0,0,0,1,1,0,1,1,0,0,1,1,1,1,1,1,1,0,0,1,1,1,1,1,0,0,0,0,1,1,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
		  break;
		default: // random
			picturearray= Array(64)
			for (i = 0; i < picturearray.length; i++){
				picturearray[i] = Math.floor(Math.random() * 2)}
			console.log(picturearray)
	  }

	loadboard(picturearray)
}

function getSelectedDemo() {
	var demo = document.getElementById("demoselector")
	return demo.options[demo.selectedIndex].text
}

function loadboard(boardarray, pause=false) {
	blankslate()
	for (i = 0; i < boardarray.length; i++){
		buttonlabel = "b".concat((i+1).toString())
		if (boardarray[i]) {
			if(pause){setTimeout(document.getElementById(buttonlabel).style.backgroundColor= "blue",500)}
			else{document.getElementById(buttonlabel).style.backgroundColor= "blue"}
		}
	}
}