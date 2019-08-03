var req = null;

function InitXMLHttpRequest() 
{
	// Make a new XMLHttp object
	if (window.XMLHttpRequest) 
	{
		req = new XMLHttpRequest();
	} 
	else
	{
		if (window.ActiveXObject) 
		{
			req = new ActiveXObject("Microsoft.XMLHTTP");
		}
		else
		{
			req = new ActiveXObject("Msxml2.XMLHTTP");
		}
	}
}

//Field - Type of destination field.
function showsub(section, id_subject, id_course, destination, text) 
{
	InitXMLHttpRequest();
    if (id_course != '' || id_subject != '') 
	{
		// Load the result from the response page
	    if (req)
		{
			req.onreadystatechange = function() 
			{
				if (req.readyState == 4) 
				{
					destination.innerHTML = req.responseText;
				} 
				else 
				{
					destination.innerHTML = text;
				}
			}
	       req.open('GET', 'ajax1.php?sec=' + section + '&sel=subdtl&id_course=' + id_course + '&id_subject=' + id_subject, true);
	       req.send(null);
	    }
	    else
		{
	       destination.innerHTML = 'Browser unable to create XMLHttp Object';
	    }
    }
    else 
	{
    	req.open('GET', 'ajax1.php?sec=' + section + '&sel=subdtl', false);
		req.send(null);
    	destination.innerHTML = req.responseText;
    }
}

function showyear(section, id_course,destination) 
{
	InitXMLHttpRequest();
    if (id_course != '') 
	{
		// Load the result from the response page
	    if (req)
		{
			req.onreadystatechange = function() 
			{
				if (req.readyState == 4) 
				{
					destination.innerHTML = req.responseText;
				} 
				else 
				{
					destination.innerHTML = "Loading Year";
				}
			}
	       req.open('GET', 'ajax1.php?sec=' + section + '&sel=course1&id_course=' + id_course , true);
	       req.send(null);
	    }
	    else
		{
	       destination.innerHTML = 'Browser unable to create XMLHttp Object';
	    }
    }
    else 
	{
    	req.open('GET', 'ajax1.php?sec=' + section + '&sel=course1', false);
		req.send(null);
    	destination.innerHTML = req.responseText;
    }
}

