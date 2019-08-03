
$(document).ready(
  function() {

	var list = new Array();

	function check(value){
		if(value == '') return false;
		for (var i=0; i < list.length; i++) {
          //alert(list[i]);
          if (list[i] == value) return false
		}
		return true;
	}

	function makeList(){
        list = new Array();
		$("#sortme").find("li").each(function(i) {
		//alert($(this).html());
		list.push($(this).html());
		});
	}

	$('#addit').click(function () {
		var what = $('#whatadd').val();
        var type = $('.ptype:checked')[0].value
		makeList();
		if(check(what+' ('+type+')') && what != '') {
			$('#sortme')
			.append('<li id="'+what+'_'+type+'" class="sortitem">'+what+' ('+type+')</li>')
			.SortableAddItem(document.getElementById(what))
            serial = $.SortSerialize('sortme');
            $.ajax({
                url: "main.php?action=savemenu&type="+type,
                type: "POST",
                data: serial.hash,
                //complete: function(){},
                success: function(feedback){ $('#data').html(text[0]); location.href = location.href; }
                //error: function(feedback){ alert('Error'); }
            });
		}else alert(text[1]);
	});

	$('#sortme li',this).click(function() {
        //sprawdzam, który radiobutton jest zaznaczony:        
        if ($('.Maction:checked')[0].value == 0){
          return;
        }
        if ($('.Maction:checked')[0].value == 1){
          if (confirm(text[2] + $(this).html() + " ?")){
              $(this).remove();
              $('#data').html(text[3]);
          }else
              return;
        }
	});

	$("#saveit").click(function () {
        serial = $.SortSerialize('sortme');
		$.ajax({
			url: "main.php?action=savemenu",
            type: "POST",
			data: serial.hash,
            //complete: function(){},
            success: function(feedback){ $('#data').html(text[0]); location.href = location.href; }
            //error: function(feedback){ alert('Error'); }
        });
	});

    $("#sortme").Sortable({
		accept : 'sortitem',
        opacity: 0.6,
		onchange : function (sorted) {
		serial = $.SortSerialize('sortme');
		$('#data').html(text[3]);
      }
    });
  }

);