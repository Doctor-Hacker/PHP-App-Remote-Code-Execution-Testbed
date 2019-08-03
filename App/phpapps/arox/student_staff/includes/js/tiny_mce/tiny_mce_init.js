tinyMCE.init({
                mode : "exact",
                elements : "sDescriptionFull",
                theme : "advanced",
                plugins : "table,advhr,advimage,advlink,emotions,insertdatetime,searchreplace,contextmenu,paste,fullscreen",
                theme_advanced_buttons1_add : "fontselect,fontsizeselect",
                theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
                theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
                theme_advanced_buttons3_add_before : "tablecontrols,separator",
                theme_advanced_buttons3_add : "emotions,advhr,separator,fullscreen",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                plugi2n_insertdate_dateFormat : "%Y-%m-%d",
                plugi2n_insertdate_timeFormat : "%H:%M:%S",
                file_browser_callback : "fileBrowserCallBack",
                paste_use_dialog : true,
                theme_advanced_resizing : true,
                theme_advanced_resize_horizontal : false,
                theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
                paste_auto_cleanup_on_paste : true,
                paste_convert_headers_to_strong : false,
                paste_strip_class_attributes : "all",
                paste_remove_spans : false,
                paste_remove_styles : false
        });

        function fileBrowserCallBack(field_name, url, type, win) {
                alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);
                win.document.forms[0].elements[field_name].value = "someurl.htm";
        }