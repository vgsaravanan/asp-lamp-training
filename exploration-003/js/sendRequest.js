/*function showLandscape()
{
	var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			//console.log(request.responseText);
			document.getElementById('ajaxContent').innerHTML = request.responseText;
		}
	};
	request.open('POST', '/asp-lamp-training/exploration-003/landscape.html');
	//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function showQuotes()
{
	var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			//console.log(request.responseText);
			document.getElementById('ajaxContent').innerHTML = request.responseText;
		}
	};
	request.open('POST', '/asp-lamp-training/exploration-003/quotes.html');
	//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}
function zoomIn(x) {
   x.style.height = "50%";
   x.style.width = "50%";
}

function zoomOut(x) {
   x.style.height = "30%";
   x.style.width = "40%";
}

document.getElementById('landscape').addEventListener('click',showLandscape);
document.getElementById('quotes').addEventListener('click',showQuotes);*/


$(document).ready(function(){
    	$("#landscape").click(function(){
        $("#ajaxContent").load('/asp-lamp-training/exploration-003/landscape.html');
    });
});

$(document).ready(function(){
    	$("#quotes").click(function(){
        $("#ajaxContent").load('/asp-lamp-training/exploration-003/quotes.html');
    });
});