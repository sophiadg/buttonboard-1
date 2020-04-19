atonelist = ['b1', 'b8', 'b57', 'b64'];
glasslist = ['b28', 'b29', 'b36', 'b37'];
arrowlist = ["b2", "b3", "b4", "b5", "b6", "b7",
	"b9", "b17", "b25", "b33", "b41", "b49",
	"b16", "b24", "b32", "b40", "b48", "b56",
	"b58", "b59", "b60", "b61", "b62", "b63"
]
actions = [];
soundon = true;
currentboard = [];

function buttclick(id) {
	// Upon clicking a button:
	// - paint button blue or white
	// - return the effect [color, sound]
	if (document.getElementById(id).style.backgroundColor != "blue") {
		document.getElementById(id).style.backgroundColor = "blue";
		if (_.contains(atonelist, id)) {
			atone.play();
			effect = soundon ? "on-atone" : "on-nosound"
		} else if (_.contains(glasslist, id)) {
			glass.play();
			effect = soundon ? "on-glass" : "on-nosound"
		} else if (_.contains(arrowlist, id)) {
			arrow.play();
			effect = soundon ? "on-arrow" : "on-nosound"
		} else {
			blop.play();
			effect = soundon ? "on-blop" : "on-nosound"
		}
	} else {
		document.getElementById(id).style.backgroundColor = "white";
		effect = "off"
	}

	return effect
}

function blankslate() {
	// Refreshes the board and turns all buttons white
	var bees = document.getElementsByClassName("round-button");
	for (var i = 0; i < bees.length; i++) {
		bees[i].style.backgroundColor = "white";
	}
}

function board2array() {
	// converts list of html button elements into array of 0 and 1
	var bees = document.getElementsByClassName("round-button");
	var pattern = [];
	for (var i = 0; i < bees.length; i++) {
		if (bees[i].style.backgroundColor == "blue") {
			pattern.push(1)
		} else {
			pattern.push(0)
		}
	}
	return pattern
}

function getboardjson() {
	// get current board as array
	var pattern = board2array();
	var jsonpattern = JSON.stringify(pattern);
	// return the submitted array
	return jsonpattern
}

function togglesound() {
	if (soundon) {
		// if sound is on, turn sound off
		document.getElementById("audio").innerHTML = "sound on";
		Howler.mute(true); // mute all howlers
		soundon = false;
	} else {
		document.getElementById("audio").innerHTML = "sound off";
		Howler.mute(false); // unmute all howlers
		soundon = true;
	}
	return soundon
}

function drawdemo() {
	// get selection from the form
	var demo = document.getElementById("demoselector")
	picturelabel = demo.options[demo.selectedIndex].text
	// choose array
	switch (picturelabel) {
		case "Rectangle":
			picturearray = [0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0]
			break;
		case "Heart":
			picturearray = [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
			break;
		default: // random
			picturearray = Array(64)
			for (i = 0; i < picturearray.length; i++) {
				picturearray[i] = Math.floor(Math.random() * 2)
			}
	}
	outcome = JSON.stringify(picturearray);
	//console.log(outcome);

	// print array to preview section
	document.getElementById("demo").innerHTML = picturelabel;
	document.getElementById("demoarray").innerHTML = outcome;
	// color the buttonboard
	loadboard(picturearray);

	return outcome
}

function loadboard(boardarray, pause = false) {
	blankslate()
	for (i = 0; i < boardarray.length; i++) {
		buttonlabel = "b".concat((i + 1).toString())
		if (boardarray[i]) {
			if (pause) {
				setTimeout(document.getElementById(buttonlabel).style.backgroundColor = "blue", 500)
			} else {
				document.getElementById(buttonlabel).style.backgroundColor = "blue"
			}
		}
	}
}


function drawpreview() {
	// DOMTOIMAGE METHOD
	var node = document.getElementById('theboard');
	var previewsite = document.getElementById('previews');

	domtoimage.toSvg(node).then(function (dataUrl) {
		var img = new Image();
		img.src = dataUrl;
		img.id = "previewimg";
		img.width = 300;
		// show image on website
		document.getElementById("demo").innerHTML = "Image submitted! Right click to download:";
		//document.getElementById("demoarray").innerHTML = board2array();
		previewsite.replaceChild(img, previewimg);

	}).catch(function (error) {
		console.error('oops, something went wrong!', error);
	});

}



checkDemographics: function() {
	this.demographics.age = $("#age").val();
	if (!this.demographics.age) {
		return alert("Please answer all questions"),
		!1;
	}
	$demographics.

}