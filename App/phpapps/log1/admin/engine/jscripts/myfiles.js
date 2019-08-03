	function ajaxLoad() {
      var ed = tinyMCE.get('elm1');
      // Do you ajax call here, window.setTimeout fakes ajax call
      ed.setProgressState(1); // Show progress
      window.setTimeout(function() {
          ed.setProgressState(0); // Hide progress
          //ed.setContent('HTML content that got passed from server.');

      }, 3000);

	}

	function ajaxSave(id) {
      var contentId = 'content' + id;
      var ed = tinyMCE.get(contentId);
      var text = ed.getContent();
      var filename = 'input#filename'+id;
      filename = $(filename).val();
      //alert(filename);
      //alert($('input#filename0').val());
      //alert(ed.getContent());
      // Do you ajax call here, window.setTimeout fakes ajax call
      ed.setProgressState(1); // Show progress
      text = text.replace(/\+/g, '00plus00');
      text = text.replace(/&/g, "00and00")
      $.ajax({
          type: "POST",
          url: "main.php?action=savefile",
          data: "content=" + text + "&filename=" + filename,
          success: function(msg){
            //alert( "Data Saved: " + msg );
            ed.setProgressState(0); // Hide progress
            alert(textMsg);
          }
      });
	}

    function ajaxSaveGallery(id) {
      
      var filename = 'input#filename'+id;
      filename = $(filename).val();
      var albumid =  'album'+id;
      var album = $("input[name='"+albumid+"']:checked").val();
      $.ajax({
          type: "POST",
          url: "main.php?action=savefile",
          data: "content=" + album + "&filename=" + filename,
          success: function(msg){
            //alert( "Data Saved: " + msg );
            alert(textMsg);
          }
      });
      
    }

/*/$(document).ready(
  function() {

  // attach handler to form's submit event
  $('#myform0').submit(function() {
      // submit the form
      //alert('ajax');
      $(this).ajaxSubmit(options);
      // return false to prevent normal browser submit and page navigation
      return false;
  });

});*/
/*
  function my_onclick()
  {
   $.post("save_file.php", { filename: $("#filename0").val() , content: $("#content").val() } );
   function(data){
    alert("Data Loaded: " + data);
   }
   alert($("#content").val());
  }

*/
