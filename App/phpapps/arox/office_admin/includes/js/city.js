function select_innerHTML(objeto,innerHTML)
{

    objeto.innerHTML = ""
    var selTemp = document.createElement("micoxselect")
    var opt;
    selTemp.id="micoxselect1"
    document.body.appendChild(selTemp)
    selTemp = document.getElementById("micoxselect1")
    selTemp.style.display="none"
    if(innerHTML.toLowerCase().indexOf("<option")<0)
	{ 
        innerHTML = "<option>" + innerHTML + "</option>"
    }
    innerHTML = innerHTML.toLowerCase().replace(/<option/g,"<span").replace(/<\/option/g,"</span")
    selTemp.innerHTML = innerHTML
      
    
    for(var i=0;i<selTemp.childNodes.length;i++){
  var spantemp = selTemp.childNodes[i];
  
        if(spantemp.tagName){     
            opt = document.createElement("OPTION")
    
   if(document.all){ 
    objeto.add(opt)
   }else{
    objeto.appendChild(opt)
   }       
    

   for(var j=0; j<spantemp.attributes.length ; j++){
    var attrName = spantemp.attributes[j].nodeName;
    var attrVal = spantemp.attributes[j].nodeValue;
    if(attrVal){
     try{
      opt.setAttribute(attrName,attrVal);
      opt.setAttributeNode(spantemp.attributes[j].cloneNode(true));
     }catch(e){}
    }
   }
   
   if(spantemp.style){
    for(var y in spantemp.style){
     try{opt.style[y] = spantemp.style[y];}catch(e){}
    }
   }
   
   opt.value = spantemp.getAttribute("value")
   opt.text = spantemp.innerHTML;

   opt.selected = spantemp.getAttribute('selected');
   opt.className = spantemp.className;
  } 
 }    
 document.body.removeChild(selTemp)
 selTemp = null
}
function loadcities() 
 {
	
	 	 var browser=navigator.appName;
	
	
		 if(document.getElementById("categoryname").value!="")
	{
		var cityid = document.getElementById("categoryname").value;
		var pars="city_id=" + cityid ;
        var url="includes/subcategory.php";
		
CheckSession(url,pars);
}

}

function CheckSession(url,pars)
{

	var myAjax = new Ajax.Request(
	url,
	{
		method: 'get',
		parameters: pars,
		onComplete:sessionOut
	});
}

function sessionOut(originalRequest)
{

    var browser=navigator.appName;

	result = originalRequest.responseText;
	//alert(result);
	if(result.indexOf('--invalidsession--') != -1) {
		
	}
	else {
		 if(browser!='Microsoft Internet Explorer')
		  {
			document.getElementById('scategoryname').innerHTML="<option value=''>Select Subcategory</option>"+result;
			<!--document.getElementById('scategoryname').innerHTML="<option value=''>Select Subcategory</option>"+result;-->

		  }
		  else
		  {
			  
			  newcities="<option value=''>Select Subcategory</option>"+result;
			  select_innerHTML( document.getElementById('scategoryname'),newcities);
        	   <!--select_innerHTML( document.getElementById('scategoryname'),newcities);-->

		  } 
		  
	
		//document.getElementById('searchingimage').style.display='none';
	}
}












