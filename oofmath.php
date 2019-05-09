<html>
	<head>
		<link rel="stylesheet" href="style.css"></link>
	</head>
	<body>
		<h1>Maths Investigation Diagram:</h1>
		<canvas id="canvas"></canvas> <br>
					Pole A: <span id="aAmount">80</span> <br>
			<div class="slidecontainer">
			  0 <input type="range" min="0" max="100" value="80" class="slider" id="poleALength"> 
			</div>
			Pole B: <span id="bAmount">20</span>
			<div class="slidecontainer">
  			0<input type="range" min="0" max="100" value="20" class="slider" id="poleBLength"> 100
			</div>
			Distance: <span id="dAmount">100</span>
						<div class="slidecontainer">
			  0<input type="range" min="0" max="150" value="100" class="slider" id="distance-slider"> 150
			</div>
		<script>
      function checkLineIntersection(line1StartX, line1StartY, line1EndX, line1EndY, line2StartX, line2StartY, line2EndX, line2EndY) {
    // if the lines intersect, the result contains the x and y of the intersection (treating the lines as infinite) and booleans for whether line segment 1 or line segment 2 contain the point
    var denominator, a, b, numerator1, numerator2, result = {
        x: null,
        y: null,
        onLine1: false,
        onLine2: false
    };
    denominator = ((line2EndY - line2StartY) * (line1EndX - line1StartX)) - ((line2EndX - line2StartX) * (line1EndY - line1StartY));
    if (denominator == 0) {
        return result;
    }
    a = line1StartY - line2StartY;
    b = line1StartX - line2StartX;
    numerator1 = ((line2EndX - line2StartX) * a) - ((line2EndY - line2StartY) * b);
    numerator2 = ((line1EndX - line1StartX) * a) - ((line1EndY - line1StartY) * b);
    a = numerator1 / denominator;
    b = numerator2 / denominator;

    // if we cast these lines infinitely in both directions, they intersect here:
    result.x = line1StartX + (a * (line1EndX - line1StartX));
    result.y = line1StartY + (a * (line1EndY - line1StartY));
/*
        // it is worth noting that this should be the same as:
        x = line2StartX + (b * (line2EndX - line2StartX));
        y = line2StartX + (b * (line2EndY - line2StartY));
        */
    // if line1 is a segment and line2 is infinite, they intersect if:
    if (a > 0 && a < 1) {
        result.onLine1 = true;
    }
    // if line2 is a segment and line1 is infinite, they intersect if:
    if (b > 0 && b < 1) {
        result.onLine2 = true;
    }
    // if line1 and line2 are segments, they intersect if both of the above are true
    return result;
};
    </script>
		<script>
    canvas = document.getElementById('canvas');
ctx = canvas.getContext('2d');

sliderA = document.getElementById("poleALength");
sliderB = document.getElementById("poleBLength");
sliderDist = document.getElementById("distance-slider");

WIDTH = 700;
HEIGHT = 500;

canvas.width = WIDTH;
canvas.height = HEIGHT;

ctx.fillStyle = '#121212';
ctx.fillRect(0, 0, WIDTH, HEIGHT);
ctx.scale(4, 4);

function draw() {
	poleA = 0;
poleB = 0;

padding = 3.5;
verticalOffset = 118;

distance = Number(sliderDist.value);
console.log(sliderDist.value);
poleALength = sliderA.value;
poleAX1 = padding;
poleAY1 = padding + verticalOffset;
poleAX2 = poleAX1;
poleAY2 = poleAY1 - poleALength;

poleBLength = sliderB.value;
poleBX1 = padding + distance;
poleBY1 = padding + verticalOffset;
poleBX2 = poleBX1;
poleBY2 = poleBY1 - poleBLength;

	ctx.fillStyle = '#121212'
	ctx.clearRect(0, 0, WIDTH, HEIGHT);
	ctx.fillRect(0, 0, WIDTH, HEIGHT);
	line(poleAX1, poleAY1, poleAX2, poleAY2, '#ff0000');
	line(poleBX1, poleBY1, poleBX2, poleBY2, '#00ff00');
	 
	line(poleAX2, poleAY2, poleBX1, poleBY1, '#fff');
	line(poleAX1, poleAY1, poleBX2, poleBY2, '#fff');
	 
	line(poleAX1, poleAY1, poleBX1, poleBY1, '#0000ff');

	point = checkLineIntersection(poleAX2, poleAY2, poleBX1, poleBY1, poleAX1, poleAY1, poleBX2, poleBY2);
	line(point.x, point.y, point.x, poleAY1, '#ffff00');
	lineDashed(point.x, point.y, point.x, point.y - 20, [2, 2], '#ffff00');
	ctx.fillStyle = '#ff0000'
	ctx.beginPath();
	ctx.arc(point.x, point.y, 1, 0, 2 * Math.PI);
	ctx.fill();

	ctx.font = "6px Arial";
	ctx.fillStyle = "#ff0000";
	ctx.fillText(poleALength, poleAX2, poleAY2 - 2);
	ctx.fillStyle = "#00ff00";
	ctx.fillText(poleBLength, poleBX2, poleBY2 - 2);
	ctx.fillStyle = "#0000ff";
	m = getMidPoint(poleAX1, poleAY1, poleBX1, poleBY1);
	ctx.fillText(distance, m[0], m[1] - 2);
	ctx.fillStyle = "#ffff00";
	yValue = Math.round((poleAY1 -  point.y) * 100) / 100;
	xValue = Math.round((point.x - padding) * 100) / 100;
	//ctx.fillText('(' + xValue + ', ' + yValue + ')', point.x - 2, point.y - 8);
	ctx.fillText('h = ' + yValue, point.x, point.y - 20);
}

function line(x1, y1, x2, y2, color) {
	ctx.fillStyle = color;
	ctx.strokeStyle = color;
	ctx.beginPath();
	ctx.moveTo(x1, y1);
	ctx.lineTo(x2, y2);
	ctx.stroke();
}
function lineDashed(x1, y1, x2, y2,dists, color) {
	ctx.fillStyle = color;
	ctx.strokeStyle = color;
	ctx.beginPath();
	ctx.setLineDash(dists);
	ctx.moveTo(x1, y1);
	ctx.lineTo(x2, y2);
	ctx.stroke();
	ctx.setLineDash([0, 0]);
}

function getMidPoint(x1, y1, x2, y2) {
	mx = (x1 + x2) / 2;
	my = (y1 + y2) / 2;

	return [mx, my];
}

window.setInterval(function() {
	draw();
}, 1000 / 60);
    </script>
	</body>
</html>
