/*
Author: Saad Amin
Website: http://www.saadamin.info
*/
jQuery(window).load(function(){function e(){console.log("started"+jQuery("#rues").val().length);if(jQuery("#rues").val().length>0){jQuery.post(SSR_Ajax.ajaxurl,{action:"ssr_view_st_submit",postID:jQuery.trim(jQuery("#rues").val())},function(e){if("no"!=jQuery.trim(e)){console.log("found");jQuery("#rid2").val(jQuery("#rues").val());var t=e.search("Rollg:XS")+8,n=e.search("Stdge:XS");jQuery("#rn2").val(e.substring(t,n));var t=e.search("Fxtge:XS");jQuery("#stn2").val(e.substring(n+8,t));var n=e.search("pYear:XS");jQuery("#stfn2").val(e.substring(t+8,n));var t=e.search("sCGPA:XS");jQuery("#stpy2").val(e.substring(n+8,t));var n=e.search("sSjct:XS");jQuery("#stcgpa2").val(e.substring(t+8,n));var t=e.search("stIme:XS");jQuery("#stsub2").val(e.substring(n+8,t));var n=e.length;jQuery("#st_img2").attr("src",e.substring(t+8,n));jQuery("#ssr_frnt_circle").css("display","none");jQuery(".result_box").css({opacity:1});jQuery("#ssr_msgbox").css("display","none")}else{console.log("not found");jQuery(".result_box").css({opacity:0});jQuery("#ssr_msgbox").css("display","block");jQuery("#ssr_frnt_circle").css("display","none")}})}else{console.log("empty");jQuery(".result_box").css({opacity:0});jQuery("#ssr_msgbox").css("display","none");jQuery("#ssr_frnt_circle").css("display","none")}}jQuery("#rues").css({opacity:1});jQuery(function(t){var n;jQuery("#rues").keypress(function(t){console.log("key pressed");jQuery("#ssr_msgbox").css("display","none");jQuery("#ssr_frnt_circle").css("display","block");jQuery(".result_box").css({opacity:1});if(n)clearTimeout(n);n=setTimeout(function(){e()},1e3)})});jQuery("#rues").keydown(function(e){return 32==e.keyCode?!1:void 0})})