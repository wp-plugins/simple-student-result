/*
Author: Saad Amin
Website: http://www.saadamin.info
*/
jQuery(window).load(function(){jQuery("input[type='checkbox']").change(function(){if("ssr_item1"==this.id)return!1;this.checked?(console.log("checked "+this.id),check=1):(console.log("unchecked "+this.id),check=0);var e=this.id,t="ssr_view_st_"+e;console.log(e),jQuery.post(SSR_Ajax.ajaxurl,{action:t,s:check},function(){console.log("Saved :"+e)}),new jQuery.Zebra_Dialog("Saved successfully",{buttons:!1,type:"confirmation",title:"Saved",modal:!1,auto_close:2e3})}),jQuery("#ssr_save_btn").click(function(){for(var e=1;22>e;){var t=document.getElementById("ssr_settings_ssr_item"+e),s="ssr_view_st_submit"+e;check=jQuery.trim(t.value),jQuery.post(SSR_Ajax.ajaxurl,{action:s,s:check},function(t){console.log("Saved : "+t+" and Saveditem :"+e)}),e+=1}new jQuery.Zebra_Dialog("Saved successfully",{buttons:!1,type:"confirmation",title:"Saved",modal:!1,auto_close:2e3})}),jQuery("#ssr_settings_ssr_item7").keydown(function(e){return e.keyCode>=65&&e.keyCode<=90||8==e.keyCode}),jQuery("#ssr_settings_ssr_item8").keydown(function(e){return e.keyCode>=65&&e.keyCode<=90||8==e.keyCode}),jQuery("#ssr_settings_ssr_item4").keydown(function(e){return e.keyCode>=65&&e.keyCode<=90||8==e.keyCode}),jQuery("#ssr_settings_ssr_item4").live("keyup",function(){jQuery("#toplevel_page_SSR ul  li:nth-child(3) a").html("All "+jQuery.trim(jQuery("#ssr_settings_ssr_item4").val())),jQuery("#toplevel_page_SSR ul  li:nth-child(4) a").html("Add/Edit "+jQuery.trim(jQuery("#ssr_settings_ssr_item4").val()))}),jQuery("#ssr_settings_ssr_item5").live("keyup",function(){jQuery("#toplevel_page_SSR a div.wp-menu-name").html(jQuery.trim(jQuery("#ssr_settings_ssr_item5").val())),jQuery("#toplevel_page_SSR ul li.wp-first-item a").html(jQuery.trim(jQuery("#ssr_settings_ssr_item5").val()))}),jQuery("#ssr_settings_ssr_item7").live("keyup",function(){jQuery("#toplevel_page_SSR ul  li:nth-child(5) a").html("View "+jQuery.trim(jQuery("#ssr_settings_ssr_item7").val())),jQuery("#toplevel_page_SSR ul  li:nth-child(6) a").html("Add "+jQuery.trim(jQuery("#ssr_settings_ssr_item7").val()))}),jQuery("#ssr_settings_ssr_item8").live("keyup",function(){jQuery("#toplevel_page_SSR ul  li:nth-child(7) a").html("View "+jQuery.trim(jQuery("#ssr_settings_ssr_item8").val())),jQuery("#toplevel_page_SSR ul  li:nth-child(8) a").html("Add "+jQuery.trim(jQuery("#ssr_settings_ssr_item8").val()))})});