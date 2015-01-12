jQuery(document).ready(function(e) {
    function t() {
        for (vx = 0, i = 0; i < required.length; i++) {
            var e = jQuery("#" + required[i]);
            ("" == e.val() || e.val() == emptyerror || 0 == e.length) && vx++
        }
        vx > 0 ? jQuery("#btn_save").addClass("disable") : jQuery("#btn_save").removeClass("disable")
    }

    function r() {
        for (vx = 0, i = 0; i < required.length; i++) {
            var e = jQuery("#" + required[i]);
            "" == e.val() || e.val() == emptyerror || 0 == e.length ? vx++ : e.removeClass("needsfilled")
        }
    }

    function s() {
        for (i = 0; i < required.length; i++) {
            var t = jQuery("#" + required[i]);
            t.val(emptyerror)
        }
        e("#st_img").attr("src", "")
    }

    function a() {
        for (i = 1; i < required.length; i++) {
            var t = jQuery("#" + required[i]);
            t.val(emptyerror)
        }
        e("#st_img").attr("src", "")
    }
    required = ["rid", "rn", "stn", "stfn", "stpy", "stcgpa", "stsub", "upload_image"], emptyerror = "Please fill out this field.";
    var u;
    e("#upload_image_button").click(function(t) {
        return t.preventDefault(), u ? void u.open() : (u = wp.media.frames.file_frame = wp.media({
            title: "Choose Image",
            button: {
                text: "Choose Image"
            },
            multiple: !1
        }), u.on("select", function() {
            attachment = u.state().get("selection").first().toJSON(), e("#upload_image").val(attachment.url), e("#st_img").attr("src", attachment.url)
        }), void u.open())
    }), e("#upload_image").click(function() {
        e("#upload_image_button").click()
    }), jQuery(document.body).click(function() {
        jQuery(".std_input").each(function() {
            t()
        })
    }), jQuery("#btn_save").click(function() {
        for (vx = 0, i = 0; i < required.length; i++) {
            var t = jQuery("#" + required[i]);
            "" == t.val() || t.val() == emptyerror || 0 == t.length ? (t.addClass("needsfilled"), t.effect("shake"), t.val(emptyerror), vx++) : t.removeClass("needsfilled")
        }
        vx > 0 ? jQuery("#btn_save").addClass("disable") : jQuery("#btn_save").removeClass("disable"), jQuery("#btn_save").hasClass("disable") || jQuery.post(SSR_Ajax.ajaxurl, {
            action: "ssr_add_st_submit",
            rid: jQuery.trim(jQuery("#rid").val()),
            rn: jQuery("#rn").val(),
            stn: jQuery("#stn").val(),
            stfn: jQuery("#stfn").val(),
            stpy: jQuery("#stpy").val(),
            stcgpa: jQuery("#stcgpa").val(),
            stsub: jQuery("#stsub").val(),
            upload_image: jQuery("#upload_image").val()
        }, function(t) {
            s(), jQuery("#btn_delete").css({
                opacity: .1,
                cursor: "no-drop"
            }), jQuery("#btn_save").addClass("ssr_btn_save"), jQuery("#btn_save").removeClass("ssr_btn_update"), e("#btn_save").html("Save"), jQuery("#dbinfo").html(t > 1 ? t + " Students are in Database" : t + " Student is in Database"), new jQuery.Zebra_Dialog("This Student Has Been Saved successfully", {
                buttons: !1,
                type: "confirmation",
                title: "Confirmation",
                modal: !1,
                auto_close: 2e3
            })
        })
    }), jQuery("#rid").live("keyup", function() {
		if ((jQuery("#rid").val().length) > 0 ){
			jQuery.post(SSR_Ajax.ajaxurl, {
				action: "ssr_view_st_submit",
				postID: jQuery.trim(jQuery("#rid").val())
			}, function(t) {
				if ("no" != jQuery.trim(t)) {
					var s = t.search("Rollg:XS") + 8,
						u = t.search("Stdge:XS");
					e("#rn").val(t.substring(s, u));
					var s = t.search("Fxtge:XS");
					e("#stn").val(t.substring(u + 8, s));
					var u = t.search("pYear:XS");
					e("#stfn").val(t.substring(s + 8, u));
					var s = t.search("sCGPA:XS");
					e("#stpy").val(t.substring(u + 8, s));
					var u = t.search("sSjct:XS");
					e("#stcgpa").val(t.substring(s + 8, u));
					var s = t.search("stIme:XS");
					e("#stsub").val(t.substring(u + 8, s));
					var u = t.length;
					e("#upload_image").val(t.substring(s + 8, u)), e("#st_img").attr("src", t.substring(s + 8, u)), jQuery("#btn_delete").css({
						opacity: 1,
						cursor: "pointer"
					}), jQuery("#btn_save").removeClass("disable"), jQuery("#btn_save").removeClass("ssr_btn_save"), jQuery("#btn_save").addClass("ssr_btn_update"), e("#btn_save").html("Update"), r()
				} else a(), jQuery("#btn_delete").css({
					opacity: .1,
					cursor: "no-drop"
				}), jQuery("#btn_save").addClass("ssr_btn_save"), jQuery("#btn_save").removeClass("ssr_btn_update"), e("#btn_save").html("Save"),console.log(t)
			})
		}else a();
    }), jQuery("#btn_delete").click(function() {
        1 == jQuery("#btn_delete").css("opacity") && jQuery.Zebra_Dialog("Are you <strong>Sure</strong>You want to Delete?", {
            type: "question",
            title: "Custom buttons",
            buttons: [{
                caption: "Yes",
                callback: function() {
                    jQuery.post(SSR_Ajax.ajaxurl, {
                        action: "ssr_del_st_submit",
                        rid: jQuery.trim(jQuery("#rid").val())
                    }, function(t) {
                        console.log(t), s(), jQuery("#btn_delete").css({
                            opacity: .1,
                            cursor: "no-drop"
                        }), jQuery("#btn_save").addClass("ssr_btn_save"), jQuery("#btn_save").removeClass("ssr_btn_update"), e("#btn_save").html("Save"), jQuery("#dbinfo").html(t > 1 ? t + " Students are in Database" : t + " Student is in Database"), new jQuery.Zebra_Dialog("<strong>Deleted </strong> Successfully", {
                            buttons: !1,
                            type: "confirmation",
                            title: "Confirmation",
                            modal: !1,
                            auto_close: 2e3
                        })
                    })
                }
            }, {
                caption: "No",
                callback: function() {}
            }]
        })
    }), jQuery("#rid").keydown(function(e) {
        return 32 == e.keyCode ? !1 : void 0
    }), jQuery("#rn").keydown(function(e) {
        return 32 == e.keyCode ? !1 : void 0
    })
}), jQuery(window).load(function() {
    jQuery("#rues").live("keyup", function() {
		if ((jQuery("#rues").val().length) > 0 ){
			jQuery.post(SSR_Ajax.ajaxurl, {
				action: "ssr_view_st_submit",
				postID: jQuery.trim(jQuery("#rues").val())
			}, function(e) {
				if ("no" != jQuery.trim(e)) {
					jQuery("#rid2").val(jQuery("#rues").val());
					var t = e.search("Rollg:XS") + 8,
						r = e.search("Stdge:XS");
					jQuery("#rn2").val(e.substring(t, r));
					var t = e.search("Fxtge:XS");
					jQuery("#stn2").val(e.substring(r + 8, t));
					var r = e.search("pYear:XS");
					jQuery("#stfn2").val(e.substring(t + 8, r));
					var t = e.search("sCGPA:XS");
					jQuery("#stpy2").val(e.substring(r + 8, t));
					var r = e.search("sSjct:XS");
					jQuery("#stcgpa2").val(e.substring(t + 8, r));
					var t = e.search("stIme:XS");
					jQuery("#stsub2").val(e.substring(r + 8, t));
					var r = e.length;
					jQuery("#st_img2").attr("src", e.substring(t + 8, r)), 
					jQuery(".result_box").css({opacity: 1}),
					jQuery("#ssr_msgbox").css("display","none")
				} else {
					jQuery(".result_box").css({opacity: 0}),
					jQuery("#ssr_msgbox").css("display","block");
				}
			})
			}else {
					jQuery(".result_box").css({opacity: 0}),
					jQuery("#ssr_msgbox").css("display","block");
			}
    }), // Settings Start from here
    jQuery("#ssr_search_box_text").live("keyup", function() {
        jQuery.post(SSR_Ajax.ajaxurl, {
            action: "ssr_view_st_submit2",
            set1: jQuery.trim(jQuery("#ssr_search_box_text").val())
        }, function(e) {
			console.log("Saved");
            if ("no" != jQuery.trim(e)) {

            } else {
				jQuery(".result_box").css({opacity: 0}),
				jQuery("#ssr_msgbox").css("display","block");
			}
        })
    }),
    jQuery("#ssr_search_box_no_result_text").live("keyup", function() {
        jQuery.post(SSR_Ajax.ajaxurl, {
            action: "ssr_view_st_submit3",
            set2: jQuery.trim(jQuery("#ssr_search_box_no_result_text").val())
        }, function(e) {
			console.log("Saved");
        })
    })
}),// Window Load
 jQuery("#rues").keydown(function(e) {
    return 32 == e.keyCode ? !1 : void 0
});