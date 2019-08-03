var req = null;

function checkuser(keyevent) 
{
	var targetDiv = document.getElementById("targetDiv");
	targetDiv.innerHTML = "<div></div>";
	var input = document.getElementById("username");
	if (input.value) {
		 getData("validate.php?qu=" + input.value);
	}
}

//Field - Type of destination field.
function getData(dataSource) 
{
	var XMLHttpRequestObject = false;
	
	if (window.XMLHttpRequest) {
		XMLHttpRequestObject = new XMLHttpRequest();
	}else if (window.ActiveXObject) {
		XMLHttpRequestObject = new
		 ActiveXObject("Microsoft.XMLHTTP");
	}
	
	if (XMLHttpRequestObject) {
		XMLHttpRequestObject.open("GET", datasource);
		
		XMLHttpRequestObject.onreadystatechange = function()
		{
			 if (XMLHttpRequestObject.readyState == 4 &&
				 XMLHttpRequestObject.status==200) {
				 if(XMLHttpRequestObject.responseText == "no"){
					 var targetDiv =
					 document.getElementById("targetDiv");
					 
					 targetDiv.innerHTML=
					   "<div>That username is not available.</div>";
				 }
			 }
		}
		
		XMLHttpRequestObject.send(null);
	}
}
		