<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type='text/javascript' src='https://sdk.clarifai.com/js/clarifai-latest.js'></script> 
<script src="quagga.min.js"></script>
<style>

@font-face {font-family: KGNeatlyPrinted ;  src: url( fonts/KGNeatlyPrinted.ttf );}

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

/* Style the active class, and buttons on mouse-over */
.active, .btn:hover {
background-color: #666;
color: white;
}
 
 
html,
body {
	font-family: KGNeatlyPrinted;
  margin:5px;
  padding: 5px;
}

video {
	float:left;
  width: 100%;
  max-width: 600px;
  display: block;
  margin: 0 auto;
}

select {
	font-family: KGNeatlyPrinted;
	border: none;
	outline:none;
	float:left;
  background-color: #ffe; 
  border: none;
  color: #005; 
  border: 2px solid #44A;
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
  background-color: #CCD;
  color: white;
}

select:active {
  background-color: yellowgreen;
}

.button {
	font-family: KGNeatlyPrinted;
	float:left;
  background-color: #ffe;
  font-family: "Times New Roman", Times, serif;
  border: none;
  color: #005; 
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
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
</style>
</head>
<body onload="createTable()">
🌾🌿☘🍀🍁🍂🍃🍇🍈🍉🍊🍋🍌🍍🥭🍎🍏🍐🍑🍒🍓🥝🍅🥥🍆🥔🥕🌽🌶🥒🥬🥦🧄🧅🍄🥜🌰🍞🥐🥖🥨🥯🥞🧇🧀🍖🍗🥩🥓🍔🍟🍕🌭🥪🌮🌯🥙🧆🥚🍳🥘<br>
<p id ='avocado' style='font-size: 36px;'>📷 Select Camera:</p>
<br>
<div style="display: inline">
<video style="width:55px;height:55px; border:1px solid;" id="video" autoplay playsinline></video>
<button class="button hide" name="scan" id="scan" onclick="b()" >Scan Item</button>
<select id="select" class="button show" onchange="s()">
<option></option>
</select> 
</div>
<br><br><br><br> 
<canvas style="width:500px;height:500px; display:none" id='takePhotoCanvas'></canvas> 
<form name="person"> </form>
<div id="snapshot" style="display:none"></div>
    <div id="cont"></div>  <div id="tot">$0.00</div>
<canvas id="histogram" width="300" height="150" style="border:0px"></canvas> 
	<br><br><br><br>
	🍲🥣🥗🍿🧈🧂🥫🍱🍘🍙🍚🍛🍜🍝🍠🍢🍣🍤🍥🥮🍡🥟🥠🥡🦀🦞🦐🦑🦪🍦🍧🍨🍩🍪🎂🍰🧁🥧🍫🍬🍭🍮🍯🍼🥛☕🍵🍶🍾🍷🍸🍹🍺🍻🥂🥃🥤🧃🧉🧊🥢🍽🍴🥄
<script > 
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
				 imgloc = 'uploads/' + this.responseText.slice(-11, -2);
				app.models.predict('bd367be194cf45149e75f01d59f77ba7', 'http://trigodesigngroup.com/uploads/'+this.responseText.slice(-11, -2) ).then(
				function(response) {
					console.log(response);
					var item = response.outputs[0].data.concepts[0].name;
					addRow(item);
					 barcode(imgloc);
					submit();
					
					
 
 
 
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

function s(){
document.getElementById('avocado').innerHTML = '📷 Scan Item or Barcode: ';
document.getElementById('scan').classList.add('show');
document.getElementById('select').classList.remove('show');
document.getElementById('select').classList.add('hide');
}

function b(){ 
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






var arrHead = new Array();
arrHead = ['', '', '', '', ''];

function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('id', 'empTable');

        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th');          // TABLE HEADER.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // ADD THE TABLE TO YOUR WEB PAGE.
    }


function addRow(sku) {
        var empTab = document.getElementById('empTable');

        var rowCnt = empTab.rows.length; 
        var tr = empTab.insertRow(rowCnt); 
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');
            td = tr.insertCell(c);

            if (c == 0) { 
                //BUTTON
                var button = document.createElement('input');
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Cancel'); 
                button.setAttribute('onclick', 'removeRow(this)');
                
                button.setAttribute('class', 'btn');

                td.appendChild(button);
            }
            else if (c == 1) {
                //ITEM-SKU
                var b = document.createElement('input');
                b.setAttribute('type', 'text'); 
                b.setAttribute('value', sku);
				b.setAttribute('readonly', true);
                td.appendChild(b);
            }
			else if (c == 2) {
                //DESC
                var d = document.createElement('input');
                d.setAttribute('type', 'text'); 
                d.setAttribute('value', '#0000');
				d.setAttribute('readonly', true);
                td.appendChild(d);
            }
			else if (c == 3) {
                //QUANT
                q = document.createElement('input');
                q.setAttribute('type', 'number'); 
                q.setAttribute('value', '1'); 
                q.setAttribute('onchange', 'submit()'); 
                td.appendChild(q);
            }
			else {
                //PRICE
                var p = document.createElement('input');
                p.setAttribute('type', 'number');
                p.setAttribute('value', '1.10'); 
				p.setAttribute('readonly', true);
                td.appendChild(p);
            }
        }
    }




function removeRow(oButton) {
        var empTab = document.getElementById('empTable');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); 
		submit();
    }


function submit() {
		var tot = 0;
        var myTab = document.getElementById('empTable');
        var values = new Array();

        // LOOP THROUGH EACH ROW OF THE TABLE.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            for (c = 0; c < myTab.rows[row].cells.length; c++) {
                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'number') {
                    values.push(element.childNodes[0].value);
					if(c==3){var x = 1; x = parseInt(element.childNodes[0].value);}
					if(c==4){tot += parseFloat(x * element.childNodes[0].value);}
                }
            }
        }
		
console.log(tot.toFixed(2));
document.getElementById('tot'). innerHTML = '$'+tot.toFixed(2);

    } 
	
  
function barcode(img) {
Quagga.decodeSingle({
    decoder: {
		readers: [
			"code_128_reader",
			"ean_reader",
			"ean_8_reader",
			"code_39_reader",
			"code_39_vin_reader",
			"codabar_reader",
			"upc_reader",
			"upc_e_reader",
			"i2of5_reader"
		],
    },
    locate: true, 
    src: img
}, function(result){
    if(result.codeResult) {
        console.log(result);
        console.log("result", result.codeResult.code);
		addRow(result.codeResult.code);
    } else {
        console.log("not detected");
    }
});
}
</script>
</body>
</html>

