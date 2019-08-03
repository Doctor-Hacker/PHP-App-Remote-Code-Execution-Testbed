var SelectObject, lblSelect, txtSelect;
var	SelectFixedX  = -1;
var	SelectFixedY  = -1;
var SelectStartAt = 1;
var	bSelectLoaded = false;
var bSelectShow   = false;
var SelectColours  = new Array('#FFCC66', '#666633', '#669966', '#996666', '#CC9999', '#CCCC99', '#99CC99', '#666699', '#99CCCC', '#669999', '#999933', '#999966', '#FF9966', '#CC9966', '#666666', '#336666', '#CC6600', '#663300', '#993333', '#660000', '#000066', '#336633', '#666600', '#006666', '#CC3366', '#660033', '#663366', '#330066', '#66CCCC', '#FFFF66', '#FF6600', '#CC0000');

if (dom)
{
  document.write("<div onclick='bSelectShow=true' id='ColourSelector' style='z-index: +999; position: absolute; visibility: hidden;'>\n");
  document.write("<table width='100'>\n");
  document.write("<tr>\n");
  document.write("  <td width='100%'>\n");
  document.write('    <table width="100" height="100" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">');
  
  document.write('    <tr align="left" valign="top">');

  for (i = 1; i < SelectColours.length + 1; i++)
  {
    document.write('      <td width="25" height="25" bgcolor="' + SelectColours[i-1]  + '"><img src="images/common/s.gif" width="25" height="25" border="0" onClick="setColour(\'' + SelectColours[i-1] +'\')"></td>');
    if ((i % 4) == 0) 
    {
      document.write('    </tr>');
      document.write('    <tr align="left" valign="top">');
    }
  }
  document.write('    </tr>');

  document.write('    </table>');
  document.write("  </td>\n");
  document.write("</tr>");
  document.write("</table>")
  document.write("</div>");
}

function setColour(colour)
{
  SelectorHide();
  lblSelect.style.background = colour;
  txtSelect.value = colour;
}

function SelectorHide()	
{
	SelectObject.visibility = "hidden";
	showElement( 'SELECT' );
	showElement( 'APPLET' );
}

function SelectorShow(ctl, ctl2) 
{
  var posLeft = -4;
  var posTop = -4;
  lblSelect = ctl;
  txtSelect = ctl2;
  ColourRegisterEvents();
	if (bSelectLoaded)
	{
    if ( SelectObject.visibility ==	"hidden" ) 
    {
      aTag = ctl;
      do
      {
        aTag = aTag.offsetParent;
        posLeft += aTag.offsetLeft;
        posTop += aTag.offsetTop;
      } 
      while(aTag.tagName != 'BODY');
      
      SelectObject.left =	(SelectFixedX == -1) ? ctl.offsetLeft	+ posLeft :	SelectFixedX;
      SelectObject.top = (SelectFixedY ==- 1) ?	ctl.offsetTop +	posTop + ctl.offsetHeight +	2 :	SelectFixedY;
			SelectObject.visibility= (dom||ie) ? "visible" : "show";
			
			hideElement( 'SELECT', document.getElementById("ColourSelector") );
			hideElement( 'APPLET', document.getElementById("ColourSelector") );			

			bSelectShow = true;
		}
	}
	else
	{
	  ColourSelectorInit();
		SelectorShow(ctl, ctl2);
	}
}

function ColourSelectorInit()
{
  if (!ns4)
	{
    SelectObject = (dom) ? document.getElementById("ColourSelector").style : ie ? document.all.ColourSelector : document.ColourSelector
    SelectorHide()
    bSelectLoaded = true
  }
}

function ColourRegisterEvents()
{
  document.onkeypress = function HideSelector_Trap1 () 
  {
    if (event.keyCode == 27)
    {
      SelectorHide(); 
    }
  }

  document.onclick = function HideSelector_Trap1()
  {
	  if (!bSelectShow)
	  {
      SelectorHide();
	  }
	  bSelectShow = false
  }
  
}
	  
