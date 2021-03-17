<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type='text/javascript' src='https://sdk.clarifai.com/js/clarifai-latest.js'></script> 
<style>


@font-face {font-family: KGNeatlyPrinted ;  src: url( fonts/KGNeatlyPrinted.ttf );}
 p {font-size: 36px; font-family: KGNeatlyPrinted; text-decoration:none; color: #008;}
 
 #btnInfo {
	 border-style: dashed;
  width: 300px;
  height: 100px;
	border-radius: 5px;	 
	 }
 body { 
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
 
.chart {
  background: white;
  width: 500px;
  height: 100px;
  border-left: 2px dotted #333;
  border-bottom: 2px dotted #333;
  padding: 20px 20px 20px 0;
}

input {border:0;outline:0;}
input:focus {outline:none!important;}

table {
	width: 50%;
	font: 17px Calibri;
}
table, th, td {
	border: 0px;
	border-collapse: collapse;
	padding: 2px 3px;
	text-align: center;
}

#tot {
	border: none;
	outline: none;
	padding: 32px 32px;
	font-size: 64px;
}

.btn {
	border: none;
	outline: none;
	padding: 10px 16px;
	background-color: #f1f1f1;
	cursor: pointer;
	font-size: 14px;
}

.active, .btn:hover {
background-color: #666;
color: white;
}
 
html, body {
	margin: 0;
	padding: 0;
}

video {
	float:left;
	width: 100%;
	max-width: 600px;
	display: block;
	margin: 0 auto;
}

select {	
	border: none;
	outline:none;
	float:left;
	background-color: #4CAF50;
	color: #005; 
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
	padding: 12px 12px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px; 
	-webkit-transition-duration: 0.4s; /* Safari */
	transition-duration: 0.4s;
	cursor: pointer;
}

select:hover {
	background-color: #CdF80;
	color: white;
}

select:active {
	background-color: yellowgreen;
}

.button {
border: none;
	outline: none;
	border-radius: 5px;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button:hover {
	background-color: #CCD;
	color: white;
}

.hide{
	display:none;
}
 
.show{
	display:block;
}

.buttonX {
	border: none;
	outline: none;
	border-radius: 5px;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}




/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}



</style>
</head>
<body>

</style>
</head>
<body>

<br>
coming soon: 
<label class="container"> Facial Profiling
  <input type="checkbox" >
  <span class="checkmark"></span>
</label>
<br>
<br>
<br>

<div id="ub" >
<button class="buttonX button1">Upload</button>
<button class="buttonX button2">Label</button>
<button class="buttonX button3">Compare</button>

</div>
<p id='avocado'>📷 Select Camera or Upload Image:</p>

<div style="display: inline">
<video style="width:55px;height:55px; border:1px solid;" id="video" autoplay playsinline></video>
<button class="button hide" name="scan" id="scan" onclick="scan()" >Scan Item</button>
<select id="select" class="button show" onchange="sel()">
<option></option>
</select> 
</div>
<br><br><br>
<canvas style="width:500px;height:500px; display:none" id='takePhotoCanvas'></canvas> 
<form name="person"> </form>
<div id="snapshot" style="display:none"></div>


<div id="btnInfo">
...
</div>
<br>
<div id="data"></div>
<br>
<canvas id="histogram" width="300" height="150" style="border:0px"></canvas>
<br><br><br>
<div id="rValue"></div>
	<br><br>
<div id="results"></div> 

<script > 

modelID = 'bbb5f41425b8468d9b7a554ff10f8581';
modelIDface = 'd02b4508df58432fbb84e800597b8959';
modelIDfashion = 'e0be3b9d6a454f0493ac3a30784001ff';
modelIDgeneral = 'aaa03c23b3724a16a56b629203edc62c';
modelIDtravel = 'eee28c313d69466f836ab83287a54ed9';

const video = document.getElementById('video'); 
const select = document.getElementById('select');
let currentStream;
var sum = 0; 

function stopMediaTracks(stream) {
  stream.getTracks().forEach(track => {
    track.stop();
  });
}

function gotDevices(mediaDevices) {
  select.innerHTML = '';
  select.appendChild(document.createElement('option'));
  let count = 1;
  mediaDevices.forEach(mediaDevice => {
    if (mediaDevice.kind === 'videoinput') {
      const option = document.createElement('option');
      option.value = mediaDevice.deviceId;
      const label = mediaDevice.label || `Camera ${count++}`;
      const textNode = document.createTextNode(label);
      option.appendChild(textNode);
      select.appendChild(option);
    }
  });
}
 
select.addEventListener('change', event => {
  if (typeof currentStream !== 'undefined') {
    stopMediaTracks(currentStream);
  }
    videoConstraints = {};
  if (select.value === '') {
    videoConstraints.facingMode = 'environment';
  } else {
    videoConstraints.deviceId = { exact: select.value };
  }
    constraints = {
    video: videoConstraints,
    audio: false
  };
navigator.mediaDevices
.getUserMedia(constraints)
.then(stream => {
var track = stream.getVideoTracks()[0];
imageCapture = new ImageCapture(track); 
imageCapture.takePhoto()
.then(blob => createImageBitmap(blob))
.then(imageBitmap => {
const canvas = document.querySelector('#takePhotoCanvas');
})
.catch(error => console.log(error));
      currentStream = stream;
      video.srcObject = stream;
      return navigator.mediaDevices.enumerateDevices();
    })
    .then(gotDevices)
    .catch(error => {
      console.error(error);
    });
});
 
 function drawCanvas(canvas, img) {
canvas.width = getComputedStyle(canvas).width.split('px')[0];
canvas.height = getComputedStyle(canvas).height.split('px')[0];
let ratio  = Math.min(canvas.width / img.width, canvas.height / img.height);
let x = (canvas.width - img.width * ratio) / 2;
let y = (canvas.height - img.height * ratio) / 2;
canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
canvas.getContext('2d').drawImage(img, 0, 0, img.width, img.height,
x, y, img.width * ratio, img.height * ratio);
 var dataURL = canvas.toDataURL('image/jpeg', 0.8);
let formData = new FormData(document.forms.person);
formData.append("base64", dataURL.slice(22));
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("snapshot").innerHTML = this.responseText;
				const app = new Clarifai.App({apiKey: '6db8b527ca2a46a4b465f632539bdf1a'});
				app.models.predict(modelID, 'http://trigodesigngroup.com/uploads/'+this.responseText.slice(-11, -2) ).then(
				function(response) {
					var vec = response.outputs[0].data.embeddings[0].vector;
					
					console.log(vec);
					drawVectors(vec, 30);
					drawVectors(vec, 40);
					drawVectors(vec, 50);
					drawVectors(vec, 60);
					drawVectors(vec, 70);
					filterVectors(vec);
					},
				function(err) {
					console.log(err);
					}
				);
            }
        };
        xmlhttp.open("POST", "u.php", true);
        xmlhttp.send(formData);
		var c = document.getElementById("histogram");
		var ctx = c.getContext("2d");
		var pxval = new Array(255).fill(0);
	function drawImage(imageObj) { 
        var context = canvas.getContext('2d');
		
        var x = 69;
        var y = 50;
        context.drawImage(imageObj, x, y);
        var imageData = context.getImageData(x, y, imageObj.width, imageObj.height);
		var data = imageData.data;
	for(var i = 0; i < data.length; i += 4) {
		//convert to greyscale black and white image
		var brightness = 0.34 * data[i] + 0.5 * data[i + 1] + 0.16 * data[i + 2];
		// red
		data[i] = brightness;
		// green
		data[i + 1] = brightness;
		// blue
		data[i + 2] = brightness;
		// populate array for histogram
		pxval[Math.floor(brightness)]+=1;
		//on final loop draw histogram 
		ctx.clearRect(0, 0, 300, 150);
		if(i == data.length-4) {
		for (z=1; z < 255; z++){
		ctx.beginPath();
		ctx.lineWidth = "1";
		ctx.strokeStyle = "black";
		ctx.rect(z*1, 0, 1, pxval[z]/10); 
		ctx.stroke();
		}
		}
		}
		context.putImageData(imageData, x, y);
		}
		var imageObj = new Image();
		imageObj.onload = function() {
		drawImage(this);
	};
	imageObj.src = dataURL;
}
navigator.mediaDevices.enumerateDevices().then(gotDevices);

function sel(){
document.getElementById('avocado').innerHTML = '📷 Ready to Scan: ';
document.getElementById('scan').classList.add('show');
document.getElementById('select').classList.remove('show');
document.getElementById('select').classList.add('hide');
}

function scan(){ 
navigator.mediaDevices
.getUserMedia(constraints)
.then(stream => {
var track = stream.getVideoTracks()[0];
imageCapture = new ImageCapture(track); 
imageCapture.takePhoto()
.then(blob => createImageBitmap(blob))
.then(imageBitmap => {
const canvas = document.querySelector('#takePhotoCanvas');
drawCanvas(canvas, imageBitmap);
})
.catch(error => console.log(error));
      currentStream = stream;
      video.srcObject = stream;
      return navigator.mediaDevices.enumerateDevices();
    })
    .then(gotDevices)
    .catch(error => {
      console.error(error);
    });
}


function filterVectors(vectors){
var imax = vectors.indexOf(Math.max(...vectors));
console.log(imax);
      document.getElementById("btnInfo").innerHTML += imax + ',  ';
}



function drawVectors(vectors, vectorThreshold){

var c = document.createElement("canvas");
	c.setAttribute("id", "c1");
	c.setAttribute("width", 33);
	c.setAttribute("height", 33);
	document.getElementById('data').appendChild(c);
	document.getElementById('c1').innerHTML += '<br>';
	var ctx = c.getContext("2d");
	var imgData = ctx.createImageData(32, 32);
	Cmax =  Math.max(...vectors) * 255; // convert probabilities range 0-1 to ascii range 0-255

	for (var i = 0; i < imgData.data.length; i += 4) {
		j = i/4;
		vector =  Math.floor(vectors[j] * 255);
		if( vector > vectorThreshold ) { vectorNormalized = map(vector, 0, Cmax, 0, 255) } // normalize vectors
		else{ vectorNormalized = 0 }  // normalize vectors, i.e. bound the new maximum to the highest R-value [similar to grading on a curve]
		imgData.data[i + 0] =  vectorNormalized; // red
		imgData.data[i + 1] =  vectorNormalized; // green
		imgData.data[i + 2] =  vectorNormalized; // blue
		imgData.data[i + 3] = 255; // alpha
		}
	ctx.putImageData(imgData, 0, 0);
	
	}


function map(x, in_min, in_max, out_min, out_max) {
	return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
	}

 
 
 
 
 
 
 
 
var arr =  [1,0,0,1,1,0];
var arr2 = [1,1,0,1,0,1];
var idx = [];
var  arr3 = arr.map((a, i) => a + arr2[i]);
arr3.map((a, i) => {if(a === 2){idx.push(i);}});

var results = document.getElementById("results");
results.innerHTML = arr +'<br>'+ arr2 +'<br><br>';
results.innerHTML += arr3 + "<br><br>[2]: " + arr3.filter(i => i === 2).length;
results.innerHTML += "<br>[2i]: " + idx;
results.innerHTML += "<br>[1]: " + arr3.filter(i => i === 1).length;
results.innerHTML += "<br>[0]: " + arr3.filter(i => i === 0).length;

function ajax(n) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "u.php?c="+n, true);
  xhttp.send();
}
 var x = [50,80,95,33,61,43,55,48,50,5];
 var y = [58,97,81,51,67,15,61,24,75,16];
 
function r(x, y) {
    var shortestArrayLength = 0;
     
    if(x.length == y.length) {
        shortestArrayLength = x.length;
    } else if(x.length > y.length) {
        shortestArrayLength = y.length;
        console.error('x has more items in it, the last ' + (x.length - shortestArrayLength) + ' item(s) will be ignored');
    } else {
        shortestArrayLength = x.length;
        console.error('y has more items in it, the last ' + (y.length - shortestArrayLength) + ' item(s) will be ignored');
    }
  
    var xy = [];
    var x2 = [];
    var y2 = [];
  
    for(var i=0; i<shortestArrayLength; i++) {
        xy.push(x[i] * y[i]);
        x2.push(x[i] * x[i]);
        y2.push(y[i] * y[i]);
    }
  
    var sum_x = 0;
    var sum_y = 0;
    var sum_xy = 0;
    var sum_x2 = 0;
    var sum_y2 = 0;
  
    for(var i=0; i< shortestArrayLength; i++) {
        sum_x += x[i];
        sum_y += y[i];
        sum_xy += xy[i];
        sum_x2 += x2[i];
        sum_y2 += y2[i];
    }
  
    var step1 = (shortestArrayLength * sum_xy) - (sum_x * sum_y);
    var step2 = (shortestArrayLength * sum_x2) - (sum_x * sum_x);
    var step3 = (shortestArrayLength * sum_y2) - (sum_y * sum_y);
    var step4 = Math.sqrt(step2 * step3);
    var answer = step1 / step4;
  
    return answer;
}

var results = document.getElementById("rValue");
results.innerHTML = x +'<br>'+ y +'<br>';
results.innerHTML += r(x,y);



item1 = [ 0, 0, .25, 0, .35, 0, .45];

item2 = [ 0, 0, .15, 0, .25, 0, .35];

unknown = [ 0, 0, .11, 0, .22, 0, .33];


top5index = ClarifaiArr.getIndexes();

top5integer = ZeroArr.convert2integer();

top5integerClean = IndexArr.removeZeroes();

top5sorted = ZeroArr.orderByIndex();

compareAll= 5;


if(compareAll == 5) {

     compareValues = 0;

}


function orderByIndex(n){

}

function convert2integer(n) {

}

function getIndexes(n) {

}

function removeZeroes(n) {

}

function compareValues(n) {

}

function compareIndexes(n) {

}

</script>
<br><br>
to make a "hotdog or not hotdog" program like the one in HBO's silicon valley TV show, i will create a sort of  "flights & departures" dashboard to determine the answer using the colors red & green to visualize our certainty. One "flight" might simply be the highest returned value's index, or the "win" bet in horse racing ( as opposed to  "place" & "show" bets, or "quinella" & "pick 3" ).  All 1000 values have an index number associated with it so using "Object Arrays" in javascript is the obvious choice for storing the 1000 data points.  Using the clarifai.ai API as a trusted back propagation network, i noticed a picture of an object in different lighting or different angles will yield slightly different values & indexes, so simply matching the "win" value is not as robust as sorting indexes by value rank and accounting for index proximity, allowing for slightly higher/lower indexes to be considered equivalent to reduce errors & unstability/sensitivity and increase robustness of our object detection program. the Clarifai.ai team put a lot of forethought into their 1000 function kernel. unfortunately there is no dewey decimal system or standard for this type of neural network yet and these functions are unknown. i would guess it is simply 1000 functions named with a keyword or two describing the color, texture, shape etc. general enough to encapsulate many objects, but specific enough to be correct with just the top 3-5 values, essentially matching an unknown constellation of stars with a known "hotDog constellation" without bloated libraries and unnecessary hand-waving. Another "flight" would be a crossjoin of the trifecta ( i.e. the top 3 values )  with itself to find the upper triangle matrix scalars using multiplication... 


</body>
</html>
