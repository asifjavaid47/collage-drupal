var testmode = false;
var promptExit = true;
var cData = new Object();
var UID = jQuery.cookie("UID");
var $layout;
var hasText = false;
var jcrop_api;
var i, ac;
var pos_x;
var pos_x2;
var pos_y;
var pos_y2;
var click_in_process = false;
var toolAutofill;
var toolText;
var toolEmpty;
var toolLayout;
var cropImgData = new Object();
var linkBait;
var newImage = new Object();
var collageName;
var transferPercent = 0;
var sliderApi;
var transferIntervalId;
var countSlidesPlayed;
var collage_thumb_class;
var collageThumbUrl;
var bxSlider;

//var new_form_uid;
//var form_mail_download_tpl_id;

var download_mail_sent = false;
var share_mail_sent = false;
var shared = false;
var downloaded = false;

// DEV
var countMailDownloadInputs = 0;

jQuery(document).ready(function () {
    'use strict';

    collageEmptyCheck();

    if ($('#c-text').text().trim() == '') {
        var temp_placeholder = $('#c-text').attr('placeholder');
        $('#c-text').text(temp_placeholder);
    }

    $(document).on('keypress', function (e) {
        var motive = $('#c-layout').attr('class');
        if (motive.indexOf('mday') > -1) {
            if (!$(e.target).hasClass('c-layout-text') && !$(e.target).is('input') && !$(e.target).is('#fce_message')) {
                var keycode = e.which;
                if (keycode == 8) {
                    e.preventDefault();
                }
            }
        }
    });

    if ($('.c-layout-slot img').length == 0) {
        $('.dropzone-indicator').hide();
    }

    // Drag and Drop Indiciator
    $(document).bind('drop dragover', function (e) {
        e.preventDefault();
    });
    $(document).bind('dragover', function (e) {
        var dropZone = $('.dropzone-indicator'),
                timeout = window.dropZoneTimeout;
        if (!timeout) {
            dropZone.addClass('in');
        } else {
            clearTimeout(timeout);
        }
        var found = false,
                node = e.target;
        do {
            if (node === dropZone[0]) {
                found = true;
                break;
            }
            node = node.parentNode;
        } while (node != null);
        if (found) {
            dropZone.addClass('hover');
        } else {
            dropZone.removeClass('hover');
        }
        window.dropZoneTimeout = setTimeout(function () {
            window.dropZoneTimeout = null;
            dropZone.removeClass('in hover');
        }, 100);
    });
    if ($('#c-designer-images li').length == 0) {
        $('.dropzone-indicator').css('display', 'table');
    }

    //$('body').on('dragstart', 'img', function(event) { event.preventDefault(); });

    // set testmode flag
    if ($("#c-designer").hasClass("testmode")) {
        testmode = true;
    }

    // Preload css images
    $.preloadImages = function () {
        for (var i = 0; i < arguments.length; i++) {
            $("<img />").attr("src", arguments[i]);
        }
    }

    $.preloadImages("/wp-content/themes/LWF_2014/css/images/fotocollage-loading-2-bg.jpg");

    /*if(!testmode && promptExit) {
     window.onbeforeunload = confirmExit;
     }
     if(!testmode && !promptExit) {
     window.onbeforeunload = allowExit;    
     }
     
     function confirmExit()
     {
     return "Diese Seite bittet Sie zu bestätigen, dass Sie die Seite verlassen möchten – Daten, die Sie eingegeben haben, werden nicht gespeichert.";
     }
     
     function allowExit() {
     return false;
     } */

    // Rewrite default text in text field
    var motive = $('#c-layout').attr('class');



    // Set collage meta data in cData Array
    setCollageData();
    // Drag and Drop
    var $gallery = jQuery("#c-designer-images");
    $layout = jQuery("#c-layout");

    // Init gallery functions
    initGalleryFunctions();

    // let the gallery items be draggable
    jQuery("li", $gallery).draggable({
        cancel: ".c-image-remove", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move",
        drag: function (event, ui) {
            $(ui.helper).find(".c-image-remove").remove();
        }
    });


    // let the layout slots be droppable, accepting the gallery items
    jQuery(".c-layout-slot").droppable({
        accept: "#c-designer-images > li",
        activeClass: "drop-highlight",
        drop: function (event, ui) {
            setImage(ui.draggable, jQuery(this));
            jQuery(this).on('dragstart', function (event) {
                event.preventDefault();
            });
            $('#c-designer-btn-render').removeClass('deactivated');
        }
    });

    // Change this to the location of your server-side upload handler:
    var url = '/wp-content/themes/LWF_2014/upload/';
    jQuery('#fileupload').fileupload({
        //limitConcurrentUploads: 1,
        url: url,
        dataType: 'json',
        done: function (e, data) {
            jQuery.each(data.result.files, function (index, file) {
                var clean_file_name = file.name.replace(/\s+\([0-9]+\)/g, '');
                //alert(clean_file_name);
                jQuery('<li><img/><div/></li>')
                        .attr('class', 'ui-draggable')
                        .find('img')
                        .attr('src', file.thumbnailUrl)
                        .attr('rel', file.mediumUrl)
                        .attr('title', clean_file_name)
                        .end()
                        .find('div')
                        .attr('class', 'c-image-remove')
                        .attr('title', fceLanguage.titleRemove)
                        .end()
                        .appendTo($gallery);

                updateHeaderImageCounter(1);
            });
            initDrag($gallery);
            initGalleryFunctions();
            $('.dropzone-indicator').hide();
            /*progress = 0;
             jQuery('#progress .progress-bar').css(
             'width',
             progress + '%'
             );*/
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            jQuery('#progress .progress-bar').css('width', progress + '%');

            if (progress > 12) {
                jQuery('#progress .progress-bar').text(progress + '%');
            }
        },
        add: function (e, data) {
            if (testmode) {
                openDisabledModal("#modal-testmode-upload-content");
            } else {
                var uploadErrors = [];
                //var acceptFileTypes = /^image\/(jpe?g)$/i;
                //if(!acceptFileTypes.test(data.originalFiles[0]['type'])) {
                if (!(/\.(jpg|jpeg|png)$/i).test(data.originalFiles[0]['name'])) {
                    uploadErrors.push('Not an accepted file type');
                }
                if (data.originalFiles[0]['size'] > 150000000) {
                    uploadErrors.push('Filesize is too big');
                }
                if (uploadErrors.length > 0) {
                    //alert(uploadErrors.join("\n"));
                    //showModal("Falsches Dateiformat", "Das Format Ihrer Datei ist ungeeignet. Bitte laden Sie eine Datei des Typs <strong>JPG</strong> hoch.");
                    openDisabledModal("#modal-upload-filetype-content");
                } else {
                    data.submit();
                    if ($("#c-designer-upload .progress").css("display") == 'none') {
                        $("#c-designer-upload .btn").hide();
                        $("#c-designer-upload .progress").fadeIn();
                    }
                }
            }
        },
        stop: function (e, data) {
            jQuery('#progress .progress-bar').css('width', '0%').empty();
            $("#c-designer-upload .progress").fadeOut();
            $("#c-designer-upload .btn").fadeIn();
        }
    }).prop('disabled', !jQuery.support.fileInput)
            .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');

    // Collage erstellen    
    jQuery("#c-designer.livemode #c-designer-btn-render").click(function (event) {
        event.preventDefault();
        if ($('#c-layout img').length > 0) {
            createCollage();
            // Google track click
            _gaq.push(['_trackPageview', 'DD Btn Create Collage']);
        } else {
            openDisabledModal("#modal-collage-empty-content");
        }
    });

    jQuery("#c-designer.testmode #c-designer-btn-render").click(function (event) {
        event.preventDefault();
        //alert("Diese Funktion ist im Testbereich deaktiviert.");
        openDisabledModal("#modal-testmode-create-collage-content");
    });

    // Bild aus Gallerie und Layout löschen
    $("#c-designer-images > li, #c-layout > .c-layout-slot").mousestop(200,
            function () {
                $(this).find(".c-image-remove").fadeIn();
            }
    );
    $("#c-designer-images > li, #c-layout > .c-layout-slot").mouseleave(
            function () {
                $(this).find(".c-image-remove").fadeOut();
            }
    );

    // Bild bearbeiten & Bildqualität
    $("#c-layout > .c-layout-slot").mousestop(200,
            function () {
                $(this).find(".c-image-crop").fadeIn();
                $(this).find(".c-image-quality").fadeIn();
            }
    );
    $("#c-layout > .c-layout-slot").mouseleave(
            function () {
                $(this).find(".c-image-crop").fadeOut();
                $(this).find(".c-image-quality").fadeOut();
            }
    );


    // Edit text in place
    $('#c-text').bind('paste', function (e) {
        e.preventDefault();
    });

    if (motive.indexOf('mday') > -1) {
        $("#c-text").click(function () {
            initRichEditor($(this));

            $(this).keyup(function (e) {
                trimTextLength($(this));
            });


        });
    } else {
        $("#c-text").click(function () {

            if ($('#c-text').text() == $('#c-text').attr('placeholder')) {
                $('#c-text').text('');
            }

            //This if statement checks to see if there are 
            //and children of div.editme are input boxes. If so,
            //we don't want to do anything and allow the user
            //to continue typing
            var inputbox;
            var inputsensor;
            if ($(this).children('input').length == 0) {

                //Create the HTML to insert into the div. Escape any " characters 
                inputbox = $('<input type="text" />')
                        .attr('class', 'inputbox')
                        .val($("#c-text").text());
            } else {
                inputbox = $("input.inputbox");
            }

            inputbox.css({
                "color": $("#c-text").css("color"),
                "font-family": $("#c-text").css("font-family"),
                "font-size": $("#c-text").css("font-size")
            });

            if ($('.inputsensor').length == 0) {
                inputsensor = $('<span/>')
                        .attr('class', 'inputsensor')
                        .text($("#c-text").text());
            } else {
                inputsensor = $(".inputsensor");
            }

            inputsensor.css({
                "font-family": $("#c-text").css("font-family"),
                "font-size": $("#c-text").css("font-size")
            });

            //Insert the HTML into the div
            $(this).html(inputbox);
            inputsensor.appendTo(".entry-content");
            initRichEditor($(this));


            //Immediately give the input box focus. The user
            //will be expecting to immediately type in the input box,
            //and we need to give them that ability
            $("input.inputbox").focus().addClass("focus");

            $("input.inputbox").keyup(function () {
                $(this).attr('size', $(this).val().length);
                inputsensor.text($(this).val());

                if (inputsensor.outerWidth() >= $("#c-text").outerWidth()) {

                    var limitedText = $(this).val();
                    limitedText = limitedText.substr(0, inputsensor.text().length - 1);
                    limitedText = limitedText.trim();

                    $(this).val(limitedText).attr("maxlength", inputsensor.text().length);
                    openDisabledModal("#modal-texteditor-maxlength-content");
                }
            });
            // Close texteditor maxlength modal
            $("#modal-texteditor-maxlength-content .btn").click(function () {
                $("#cboxClose").trigger("click");
            });

            //Once the input box loses focus, we need to replace the
            //input box with the current text inside of it.
            var click_in_process = false; // global

            var editor = $("#c-layout-text-editor");
            var editorAll = $("#c-layout-text-editor").children().andSelf();

            $(editor).mousedown(function () {
                click_in_process = true;
            });

            $(editor).mouseup(function () {
                click_in_process = false;

                // a code of editor clicking event

            });

            $("input.inputbox").blur(function () {
                if (!click_in_process) {
                    //closeRichEditor();
                    $(this).removeClass("focus");
                }
                var value = $(this).val();
                $("#c-text").text(value);
                setLayoutTextProperties();

                if ($('#c-text').text() == '') {
                    var temp_placeholder = $('#c-text').attr('placeholder');
                    $('#c-text').text(temp_placeholder);
                }
            });

        });
    }

    // Header tools
    $("#c-designer-header-tools li a").click(function () {
        $(this).blur();
    });

    toolAutofill = $("#c-designer-header-tools li").has(".icon-magic");
    toolText = $("#c-designer-header-tools li").has(".icon-text-height");
    toolEmpty = $("#c-designer-header-tools li").has(".icon-eraser");
    toolLayout = $("#c-designer-header-tools li").has(".icon-th");

    toolAutofill.click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $("#c-designer-header-tools li").removeClass("active");
            //$(this).addClass("active");

            var $images = $gallery.find("li");

            if ($images.length > 0) {
                $layout.find(".c-layout-slot").each(function () {
                    var target = $(this);
                    var source = $images.eq(Math.floor(Math.random() * $images.length));
                    setImage(source, target);

                    $images = array_remove($images, $images.index(source));
                    //console.log($images);

                    if ($images.length < 1) {
                        $images = $gallery.find("li");
                    }
                });
            }
        }
        $('#c-designer-btn-render').removeClass('deactivated');
    });

    if (hasText === false) {
        toolText.addClass("disabled").unbind("click");
    }

    toolText.click(function () {
        if ($(this).hasClass("active")) {
            $("#c-layout-text-editor .modal-close").trigger("click");
            $(this).removeClass("active");
        } else {
            $("#c-text").trigger("click");
            $("#c-designer-header-tools li").removeClass("active");
            $(this).addClass("active");
        }
    });

    toolEmpty.click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $("#c-designer-header-tools li").removeClass("active");
            //$(this).addClass("active");

            $layout.find(".c-layout-slot").empty().removeClass("filled");
        }
        collageEmptyCheck();
    });

    if (testmode) {
        toolLayout.click(function (e) {
            e.preventDefault();
            openDisabledModal("#modal-testmode-tool-layout-content");
        });
    }

    $('.product_dl_m').on('click', function () {
        _gaq.push(['_trackPageview', 'DD Button buy m']);
    });
    $('.product_dl_l').on('click', function () {
        _gaq.push(['_trackPageview', 'DD Button buy l']);
    });
    $('.product_dl_xl').on('click', function () {
        _gaq.push(['_trackPageview', 'DD Button buy xl']);
    });
});

function setImage(source, target) {
    target.empty();
    target.addClass('loading');
    var slot_w = target.outerWidth();
    var slot_h = target.outerHeight();

    if (source.children().is("img")) {
        var img = source.children("img");
    } else {
        var img = source;
        source.parent().removeClass("filled");
    }

    var img_w = img.width();
    var img_h = img.height();

    var slotImgSrc = img.attr('rel');
    var slotImg = jQuery('<img/>', {
        src: slotImgSrc,
        alt: img.attr("title"),
        rel: slotImgSrc
    }).css("position", "relative");


    var imgRatio = img_h / img_w;
    var slotRatio = slot_h / slot_w;

    if (imgRatio > slotRatio) {
        var slotImgW = slot_w;
        var slotImgH = slot_w * imgRatio;
        var slotImgOffsetY = (slot_h - slotImgH) / 2;
        slotImg.css("height", slotImgH + "px").css("width", slotImgW + "px");
        //slotImg.css("top", slotImgOffsetY + "px");
        //console.log(imgRatio + " > " + slotRatio);
    } else {
        var slotImgH = slot_h;
        var slotImgW = slot_h / imgRatio;
        var slotImgOffsetX = (slot_w - slotImgW) / 2;
        slotImg.css("height", slotImgH + "px").css("width", slotImgW + "px");
       // slotImg.css("left", slotImgOffsetX + "px");
        //console.log(imgRatio + " > " + slotRatio); 
    }





    //slotImg.appendTo(target);
    var img_loaded = loadSlotImg(target, slotImg);
    target.addClass("filled");

    var setImgResult = setSlotImgData(target, slotImg);

    // Bind function icons to slot
    var iconRemove = $("<div/>").attr('class', 'c-image-remove').attr('title', fceLanguage.titleRemove).appendTo(target);
    var iconCrop = $("<div/>").attr('class', 'c-image-crop').attr('title', fceLanguage.titleCrop).appendTo(target);

    iconRemove.click(function () {
        target.empty().removeClass("filled");
        collageEmptyCheck();
    });

    // Bind modal window to crop icon
    iconCrop.on("click",function () {
        openCropModal(target, slotImg);
    });
}

function initDrag(gallery) {
    jQuery("li", gallery).draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move"
    });
}

function initGalleryFunctions() {
    // Bild aus Gallerie und Layout löschen
    $("#c-designer-images > li").mousestop(200,
            function () {
                $(this).find(".c-image-remove").fadeIn();
            }
    );
    $("#c-designer-images > li").mouseleave(
            function () {
                $(this).find(".c-image-remove").fadeOut();
            }
    );

    $("#c-designer-images > li .c-image-remove").click(function () {
        if (testmode) {
            alert(fceLanguage.testmodeDeleteImg);
        } else {
            var item = $(this).parents("li");
            console.log(item);
            var img = item.find("img");
            var img_name = getUrlFilename(img.attr("src"));
            var img_id = getUrlFilename(img.attr("id"));
            console.log(img_id);
            var img_rel = img.attr("rel");

            $.ajax({
                type: 'Post',
//                dataType: 'jsonp',
//                jsonp: 'jsonp_callback',
                url: "action.php",
                data: "delete=" + img_id,
                success: function (data) {
                    item.fadeOut(500, function () {
                        item.remove();
                    });
                    var slotImgs = $(".c-layout-slot.filled > img");
                    slotImgs.each(function () {
                        if ($(this).attr("src") == img_rel) {
                            $(this).parent(".c-layout-slot").empty().removeClass("filled");
                        }
                    });
                    updateHeaderImageCounter(-1);
                }
            });
        }
    });

}

function initDragSlotImg(layout) {
    // let the slot items be draggable
    jQuery(".c-layout-slot.filled > img", layout).draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move",
        appendTo: "#c-layout"
    });
}

function setCollageData() {

    // Set meta data
    var cTemplate = jQuery("#c-layout");
    var cTemplateClasses = cTemplate.attr("class");
    var cTemplateParams = cTemplateClasses.split("-");
    var cFormat = cTemplateParams[2];
    var cSlots = cTemplateParams[3];
    var cOrientation = cTemplateParams[4];
    var cAddon = cTemplateParams[5];
    if (cAddon == 'txt') {
        var cMotive = cTemplateParams[6];
    } else {
        var cMotive = cTemplateParams[5];
    }

    cData["meta"] = new Object();
    cData["meta"]["uid"] = UID;
    cData["meta"]["domain"] = xDomain;
    cData["meta"]["cformat"] = cFormat;
    cData["meta"]["cslots"] = cSlots;
    cData["meta"]["corientation"] = cOrientation;

    cData["meta"]["mode"] = 'filesale';

    if (cMotive !== undefined) {
        cData["meta"]["cmotive"] = cMotive;
        if (cAddon == 'txt') {
            //cData["meta"]["bg_image"] = 'collage-'+cFormat+'-'+cSlots+'-'+cOrientation+'-'+cAddon+'-'+cMotive+'-print.png';
            cData["meta"]["bg_image"] = 'collage-' + cFormat + '-' + cSlots + '-' + cOrientation + '-txt-' + cMotive + '-print.png';
        } else {
            cData["meta"]["bg_image"] = 'collage-' + cFormat + '-' + cSlots + '-' + cOrientation + '-' + cMotive + '-print.png';
        }
    }
    if (cAddon == 'txt') {
        hasText = true;

        var ctext = $("#c-text");
        var textPos = ctext.position();

        cData["meta"]["caddon"] = cAddon;
        cData["ctext"] = new Object();
        cData["ctext"]["posx"] = Math.round(textPos.left);
        cData["ctext"]["posy"] = Math.round(textPos.top);
        cData["ctext"]["width"] = ctext.outerWidth();
        cData["ctext"]["height"] = ctext.outerHeight();
        cData["ctext"]["text"] = ctext.text();
    }
    cData["meta"]["gridx"] = cTemplate.outerWidth();
    cData["meta"]["gridy"] = cTemplate.outerHeight();

    // Set basic slot data structure to be filled on drop
    cData["cslots"] = new Array();
    jQuery(".c-layout-slot").each(function () {
        cpos = getSlotPos(jQuery(this));
        cData["cslots"][cpos] = new Object();
    });

    if (cAddon == 'txt') {
        if (cData['ctext']['text'].trim() == '' || cData['ctext']['text'] == $('#c-text').attr('placeholder')) {
            cData['ctext']['text'] = '';
        }
    }

    //alert(dump_r(cData["meta"]));    

}

function getSlotPos(slot) {
    var cpos = slot.attr("id");
    cpos = cpos.split("-")[2];
    var box_id = $("#c-slot-" + cpos).attr("data-box-id");
    return cpos + "_" + box_id;
}

function setSlotImgData(slot, img) {
    cpos = getSlotPos(slot);
    var slot_position = slot.position();
    var img_w = img.width();
    var img_h = img.height();

    var img_position_x = img.css("left");
    if (img_position_x == "auto") {
        img_position_x = 0;
    } else {
        img_position_x = img_position_x.replace('-', '');
        img_position_x = img_position_x.replace('px', '');
    }
    var img_position_y = img.css("top");
    if (img_position_y == "auto") {
        img_position_y = 0;
    } else {
        img_position_y = img_position_y.replace('-', '');
        img_position_y = img_position_y.replace('px', '');
    }

    cData["cslots"][cpos]["img"] = getUrlFilename(img.attr("src"));
    cData["cslots"][cpos]["imgw"] = img_w;
    cData["cslots"][cpos]["imgh"] = img_h;
    cData["cslots"][cpos]["imgposx"] = Math.abs(img_position_x);
    cData["cslots"][cpos]["imgposy"] = Math.abs(img_position_y);
    cData["cslots"][cpos]["width"] = slot.outerWidth();
    cData["cslots"][cpos]["height"] = slot.outerHeight();
    cData["cslots"][cpos]["posx"] = Math.round(slot_position.left);
    cData["cslots"][cpos]["posy"] = Math.round(slot_position.top);

    // Bildprüfung für den Slot
    checkSlotImgQuality(slot);
}

function checkSlotImgQuality(slot) {
    var slotImgData = new Object();
//    slotImgData["meta"] = cData["meta"];
    var cpow = getSlotPos(slot);
    var slot_id = cpow.split("_")[0];
    var box_id = cpow.split("_")[1];

 
//hadi search
    if (slot_id == 1) {
        $("#slot_1").val(cData["cslots"][cpos]["img"]);
        $('#slot_1_details').val(box_id);
        
    }
    if (slot_id == 2) {
        $("#slot_2").val(cData["cslots"][cpos]["img"]);
        $('#slot_2_details').val(box_id);
    }
    if (slot_id == 3) {
        $("#slot_3").val(cData["cslots"][cpos]["img"]);
        $('#slot_3_details').val(box_id);
    }
    box_id = "";
    slot_id = "";
    slotImgData["cslot"] = cData["cslots"][cpos];

    var url = 'action.php';
    var slotImgDataJson = JSON.stringify(slotImgData);

    $.ajax({
        type: 'POST',
//        dataType: 'jsonp',
//        jsonp: 'jsonp_callback',
        url: url,
        data: {user_file: slotImgDataJson, frame_id: cpow},
        success: function (data) {

            //alert(data.quality);
            $("<div/>").attr('class', 'c-image-quality c-image-quality-' + data.quality).attr('title', data.text).appendTo(slot);
            $("#hiddenvalues").html("");
        }
    });
}

function createCollage() {
    var modalFinished = openFinishedModal();
    var url = 'http://remote.fotocollage-erstellen.net/includes/create_collage.php?downloadmode';
    var metaData = cData.meta;
    var myData = metaData;
    var cDataJson = JSON.stringify(cData);

    console.log(myData);

    download_mail_sent = false;
    share_mail_sent = false;

    $.ajax({
        type: 'POST',
        dataType: 'jsonp',
        jsonp: 'jsonp_callback',
        url: url,
        data: {jsonData: cDataJson},
        success: function (data) {
            //alert(data.thumbUrl);
            proceedAfterSlideshow(data);
            //afterCreateCollage(data);              
        }
    });
}

function afterCreateCollage(data) {
    _gaq.push(['_trackPageview', 'DD modal aftercreate  collage']);

    bxSlider.stopAuto();

    promptExit = false;
    collageThumbUrl = data.thumbUrl;

    $("#colorbox #c-designer-finished-content .loading h4").text(fceLanguage.finishedLoadingTitle2);
    $("#colorbox #c-designer-finished-content .loading .bx-wrapper").fadeOut('slow');
    $("#colorbox #c-designer-finished-content .loading #showroom").fadeIn('slow');

    // Showroom preview image
    $("#colorbox #c-designer-finished-content .loading #showroom-img").bind("load", function () {

        if ($(this).width() > $(this).height()) {
            collage_thumb_class = "horizontal";
        } else if ($(this).height() > $(this).width()) {
            collage_thumb_class = "vertical";
        } else {
            collage_thumb_class = "square";
        }
        $(this).addClass(collage_thumb_class);
        $(this).animate({
            opacity: 1
        }, 1500, function () {
            // Animation complete.
        });
    });
    $("#colorbox #c-designer-finished-content .loading #showroom-img").attr("src", data.thumbUrl);

    $('.products .content img').each(function () {
        $(this).attr('src', data.thumbUrl);
    });

    // Call next content step after 10 sec.
    setTimeout(function () {
        collageFinishedContent(data)
    }, 20000);
}

function collageFinishedContent(data) {

    $.colorbox.resize({
        width: 980,
        height: 705
    });

    // SET Form IDs to unique ID to prevent multiple sending of formadata
    // Bug workaround
    //setUniqueFormIDs();
    // If user shared already, don't show the sharing box again
    if (shared === true) {
        showDownloadLink();
    }

    $("#colorbox #c-designer-finished-content .loading").fadeOut("slow");
    $("#colorbox #c-designer-finished-content .finished-content").fadeIn("slow");

    // Set product urls for ordering
    var products = $("#colorbox #c-designer-finished-content > .finished-content > ul.products");
    var vlog = $.cookie('VLOG');

    $('.file_size_m .btn').attr('href', data.lwfUrl + '&size=m&vlog=' + vlog);
    $('.file_size_l .btn').attr('href', data.lwfUrl + '&size=l&vlog=' + vlog);
    $('.file_size_xl .btn').attr('href', data.lwfUrl + '&size=xl&vlog=' + vlog);

    collageName = data.imgName;

    var downloadBox = $("#colorbox #c-designer-finished-content > .finished-content > .download");
    linkBait = $("#colorbox #c-designer-finished-content > .finished-content > .download > .download-share");

    // Reset some elements after window was loaded
    downloadBox.css({"top": "16px", "height": "196px"});
    $(".share-mail").removeClass("active");
    $(".share-download-link").css("display", "none");
    linkBait.find(".share-mail").unbind("click");


    linkBait.find("a").click(function (event) {
        event.preventDefault();
    });

    // Share per Mail
    linkBait.find(".share-mail").click(function (event) {
        if ($(this).hasClass("active")) {
            toggleShareMail(false);
            $(this).removeClass("active").blur();
        } else {
            $(this).addClass("active").blur();
            toggleShareMail(true);
        }
    });

    // Share auf Facebook, Twitter, Google+
    linkBait.find(".share-link").click(function (event) {
        var shareMethod = $(this).attr('data-share-target');
        if ($(this).hasClass("active")) {
            $(this).removeClass("active").blur();
        } else {
            $(this).addClass("active").blur();
            var funcCall = "share_" + $(this).data("share-target") + "()";
            var result = eval(funcCall);
            _gaq.push(['_trackPageview', 'DD Btn Share ' + shareMethod]);
        }
    });
}

function proceedAfterSlideshow(data) {
    setTimeout(function () {
        afterCreateCollage(data);
    }, 3000);
    /*
     if(countSlidesPlayed > 4) {
     afterCreateCollage(data);    
     }
     else {
     setTimeout(function() { 
     proceedAfterSlideshow(data) 
     }, 500);   
     } */
}

function openFinishedModal() {
    $("#c-designer-finished-content .loading h4").text(fceLanguage.finishedLoadingTitle1);
    $("#c-designer-finished-content .loading #showroom").css("display", "none");
    $("#c-designer-finished-content .loading .bx-wrapper").css("display", "block");

    $("#c-designer-finished-content .finished-content").css("display", "none");
    $("#c-designer-finished-content .loading").css("display", "block");
    transferPromoReset();
    $.colorbox({
        inline: true,
        width: 980,
        height: 675,
        scrolling: false,
        fixed: true,
        href: '#c-designer-finished-content',
        close: '',
        overlayClose: false,
        onClosed: $.colorbox.remove(),
        onComplete: function () {
            // Slider einbinden
            startSlideshow();
        }
    });

    return $.colorbox;
}

function toggleShareMail(s) {
    _gaq.push(['_trackPageview', 'DD Btn Share Mail clicked']);
    var downloadBox = $("#colorbox #c-designer-finished-content > .finished-content > .download");
    if (s === true) {
        $("#fce_firstname_from").focus();
        downloadBox.animate({
            "top": "-340px",
            "height": "552px"
        }, 400);
    } else {
        downloadBox.animate({
            "top": "16px",
            "height": "196px"
        }, 400);
        $(this).removeClass("active").blur();
    }

    $(".share-mail-content input")
            .focus(function () {
                $(this).removeClass("error");
            })
            .blur(function () {
                if ($(this).is("#fce_firstname_to") && $.trim($(this).val()).length > 0) {
                    $('#fce_message .mail-to').text($('#fce_firstname_to').val());
                }
                if ($(this).is("#fce_firstname_from") && $.trim($(this).val()).length > 0) {
                    $('#fce_message .mail-from').text($('#fce_firstname_from').val());
                }
            });

    $("#share-mail-submit").click(function () {
        var errors = 0;
        $(".share-mail-content input").each(function () {
            var field = $(this).val();
            if ($.trim(field).length == 0) {
                $(this).addClass("error");
                errors++;
            }
            if ($(this).hasClass("email") && $.trim(field).length > 0) {
                if (!validateEmail(field)) {
                    $(this).addClass("error");
                    errors++;
                }
            }
        });
        if (errors == 0) {
            sendShareMail();
            //showDownloadLink();
        }
    });
}

function sendShareMail() {
    _gaq.push(['_trackPageview', 'DD Btn Share Mail send']);
    var url = "/wp-content/themes/LWF_2014/includes/sendShareMail.php";
    var formdata = $("#fce-form-share-mail").serialize();
    var message = $('#fce_message').text();
    var vlog = $.cookie('VLOG');
    formdata = formdata + '&fce_message=' + message + '&vlog=' + vlog;

    if (share_mail_sent === false) {
        $.ajax({
            type: 'POST',
            dataType: 'jsonp',
            jsonp: 'jsonp_callback',
            url: url + "?" + formdata,
            //data: { jsonData: cDataJson },
            success: function (data) {
                showDownloadLink();
            }
        });
        share_mail_sent = true;
        shared = true;
    }
}

function sendDownloadMail() {
    var url = "/wp-content/themes/LWF_2014/includes/sendDownloadMail.php";
    var formdata = $("#share-download-mail-form-inputs").serialize();

    // Bildname anhängen
    formdata = formdata + '&img_name=' + collageName + '&orientation=' + collage_thumb_class + '&vlog=' + $.cookie('VLOG') + '&downloadmode';

    if (download_mail_sent === false) {
        //alert(formdata);

        $.ajax({
            type: 'POST',
            dataType: 'jsonp',
            jsonp: 'jsonp_callback',
            url: url + "?" + formdata,
            //data: { jsonData: cDataJson },
            success: function (data) {
                sendDownloadMailSuccess();
            }
        });
        download_mail_sent = true;
    }
}

function sendDownloadMailSuccess() {
    $(".download-mail-form-result span").text($("#fce_dl_email").val());
    $(".download-mail-form-wrapper").hide();
    $(".download-mail-form-result").fadeIn();
}

function showDownloadLink() {
    var downloadBox = $("#colorbox #c-designer-finished-content > .finished-content > .download");
    downloadBox.animate({
        "top": "235px",
        "height": "100%"
    }, 500, function () {
        $(".download-mail-form-wrapper").css("display", "block");
        $(".download-mail-form-result").css("display", "none");
        $(".share-download-mail-form").fadeIn("slow");
        // set the thumbnail for the email form in the last step
        $("#colorbox #c-designer-finished-content .collage-thumb").bind("load", function () {

            if ($(this).width() > $(this).height()) {
                collage_thumb_class = "horizontal";
            } else if ($(this).height() > $(this).width()) {
                collage_thumb_class = "vertical";
            } else {
                collage_thumb_class = "square";
            }
            //alert(collage_thumb_class);
            $(this).addClass(collage_thumb_class);
            $(this).animate({
                opacity: 1
            }, 1500, function () {
                // Animation complete.
            });
        });
        $("#colorbox #c-designer-finished-content .collage-thumb").attr("src", collageThumbUrl);
    });

    // Felder befüllen, wenn per mail geshared und werte schon da sind
    if ($("#fce_firstname_from").val() != "" && $("#fce_lastname_from").val() != "" && $("#fce_email_from").val() != "") {
        $("#fce_dl_firstname").val($("#fce_firstname_from").val());
        $("#fce_dl_lastname").val($("#fce_lastname_from").val());
        $("#fce_dl_email").val($("#fce_email_from").val());
    }

    $("#share-download-mail-form-inputs input").focus(function () {
        $(this).removeClass("error");
    });

    $("#download-mail-submit").click(function () {
        var errors = 0;
        $("#share-download-mail-form-inputs input").each(function () {
            var field = $(this).val();
            if ($.trim(field).length == 0) {
                $(this).addClass("error");
                errors++;
            }
            if ($(this).hasClass("email") && $.trim(field).length > 0) {
                if (!validateEmail(field)) {
                    $(this).addClass("error");
                    errors++;
                }
            }
        });
        if (errors == 0) {
            sendDownloadMail();
            _gaq.push(['_trackPageview', 'DD Btn Send Download Mail']);
        }
    });
}

function share_Facebook() {
    var socialUrl = 'http://www.facebook.com/sharer.php?s=100&p[url]=' + encodeURIComponent(fceLanguage.shareUrl) + '&p[title]=' + encodeURIComponent(fceLanguage.shareTitle) + '&p[summary]=' + encodeURIComponent(fceLanguage.socialUrlTitle) + '&p[images][0]=' + encodeURIComponent(fceLanguage.shareImg);
    var shareWindow = PopupCenter(
            socialUrl,
            fceLanguage.socialTitle,
            980,
            675
            );

    setTimeout("showDownloadLink()", 5000);
    shared = true;
    return false;
}

function share_Twitter() {
    var socialUrl = 'http://twitter.com/share?url=' + encodeURIComponent(fceLanguage.shareUrl) + '&title=' + encodeURIComponent(fceLanguage.shareTitle) + '&text=' + encodeURIComponent(fceLanguage.socialUrlTitle);
    var shareWindow = PopupCenter(
            socialUrl,
            fceLanguage.socialTitle,
            980,
            675
            );

    setTimeout("showDownloadLink()", 20000);
    shared = true;
    return false;
}

function share_Googleplus() {
    var socialUrl = 'https://plus.google.com/share?url=' + encodeURIComponent(fceLanguage.shareUrl) + '&title=' + encodeURIComponent(fceLanguage.shareTitle) + '&content=' + encodeURIComponent(fceLanguage.socialUrlTitle) + 'image=' + encodeURIComponent(fceLanguage.shareImg);
    var shareWindow = PopupCenter(
            socialUrl,
            fceLanguage.socialTitle,
            980,
            675
            );

    setTimeout("showDownloadLink()", 20000);
    shared = true;
    return false;
}

function fileDownload(url, params, method) {
    window.location.href = url + '?' + params;
}

function PopupCenter(pageURL, title, w, h) {
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}

function transferPromoReset() {
    $("#transfer-info h3").text(fceLanguage.titleTransferLoad);
    if (transferIntervalId != "") {
        clearInterval(transferIntervalId);
    }
    transferPercent = 0;
    $("#transfer-progress .progress-bar").css("width", "0%").text("");
    $("#c-designer-finished-content .transfer").hide();

    if (isB2cLead) {
        $("#transfer-result-code").text($.cookie("B2CLEAD"));
        $("#c-designer-finished-content .transfer .promo-content").hide();
        $("#c-designer-finished-content .transfer .promo-btns").hide();
        $("#transfer-result").show();
        $("#c-designer-finished-content .transfer #transfer-next-btn").show();
    } else {
        $("#c-designer-finished-content .transfer .promo-btns").show();
        $("#c-designer-finished-content .transfer .promo-content").show();
        $("#transfer-result").hide();
        $("#c-designer-finished-content .transfer #transfer-next-btn").hide();
    }
}

function transferPromo() {
    $("#transfer-lead-refuse, #transfer-next").click(function (e) {
        var transfer_btn = $(this).attr("id");

        if (transferPercent < 100) {
            e.preventDefault();
            alert(fceLanguage.titleTransferAlert);
        } else {
            // Google click tracking
            _gaq.push(['_trackPageview', 'DD Btn Promo ' + transfer_btn]);
        }
    });
    $("#fce-lead input").focus(function () {
        $(this).removeClass("error");
    });
    jQuery("#fce-lead input[placeholder]").inputHints();

    $("#fce-lead #lead_language").val(xLanguage);

    $("#c-designer-finished-content .transfer").show();
    transferIntervalId = setInterval(function () {
        transferProgress()
    }, 2000);

    // Formular abschicken
    $("#transfer-lead-submit").click(function () {
        var lead_errors = 0;
        var field_firstname = $("#fce-lead #lead_firstname");
        if (field_firstname.val().length < 2 || field_firstname.val() == field_firstname.attr("placeholder")) {
            field_firstname.addClass("error");
            lead_errors++;
        }

        var field_lastname = $("#fce-lead #lead_lastname");
        if (field_lastname.val().length < 3 || field_lastname.val() == field_lastname.attr("placeholder")) {
            field_lastname.addClass("error");
            lead_errors++;
        }

        var field_email = $("#fce-lead #lead_email");
        //console.log(validateEmail(field_email.val()));
        if (!validateEmail(field_email.val())) {
            field_email.addClass("error");
            lead_errors++;
        }

        if (lead_errors == 0) {
            var url = "/wp-content/themes/LWF_2014/includes/addNewLeadB2C.php";
            var formdata = $("#fce-lead").serialize();
            $.ajax({
                type: 'POST',
                dataType: 'jsonp',
                jsonp: 'jsonp_callback',
                url: url + "?" + formdata,
                success: function (data) {
                    //console.log(data.error);
                    $("#transfer-result-code").text(data.voucher.voucherCode);
                    $("#c-designer-finished-content .transfer .promo-content").hide();
                    $("#c-designer-finished-content .transfer .promo-btns").hide();
                    $("#transfer-result").show();

                    var vendorLink = $("#c-designer-finished-content .transfer #transfer-next").attr("href");
                    $("#c-designer-finished-content .transfer #transfer-next")
                            .attr("href", vendorLink + "&b2clead=" + data.voucher.voucherCode);
                    $("#c-designer-finished-content .transfer #transfer-next-btn").fadeIn();

                    var setB2cLead = $.cookie('B2CLEAD', data.voucher.voucherCode, {expires: 3, path: '/', domain: xDomain});
                    isB2cLead = true;
                }
            });
        }
    });
}

function transferProgress() {
    transferPercent = transferPercent + Math.floor((Math.random() * 10) + 1);
    if (transferPercent >= 100) {
        clearInterval(transferIntervalId);
        $("#transfer-progress .progress-bar").css("width", "100%").text("100%");
        $("#transfer-info h3").text(fceLanguage.titleTransferDone);
    } else {
        $("#transfer-progress .progress-bar").css("width", transferPercent + "%");
        if (transferPercent >= 5) {
            $("#transfer-progress .progress-bar").text(transferPercent + "%");
        }
    }
}


function loadSlotImg(slot, slotImg) {
    var img = slotImg;
    $(img)
            .load(function () {
                $(this).hide();

                slot.removeClass('loading').prepend(this);
                $(this).fadeIn();

            });

    return true;
}

function openCropModal(slot, slotImg) {
   
    var slot_id=slot.attr("id");
    
    var setImgRes = setImageForCropping(slot, slotImg);
    $.colorbox({
        inline: true,
        innerWidth: 960,
        innerHeight: 600,
        scrolling: false,
        fixed: false,
        href: '#c-designer-modal-content',
        close: '',
        onComplete: initJcrop()
    });
    
    $("#get_slot_id").html("<div id='"+slot_id+"'></div>");
    //initJcrop();
    $("#cboxClose").bind("click", function () {
        jcrop_api.destroy();
    });
}

function initJcrop() {
    jcrop_api = $.Jcrop("#c-designer-modal-img");
    jcrop_api.setOptions({
        allowSelect: false,
        allowResize: false,
        trueSize: [cropImgData["cropImgW"], cropImgData["cropImgH"]]
    });

    pos_x = cropImgData["x"];
    pos_x2 = cropImgData["x1"];

    pos_y = cropImgData["y"];
    pos_y2 = cropImgData["y1"];

    jcrop_api.setSelect([pos_x, pos_y, pos_x2, pos_y2]);

    $("#c-designer-modal-crop-confirm").click(function () {
        
		var slot_id =  $("#get_slot_id").find("div").attr("id");
		if(slot_id=='c-slot-1'){
			$("#slot_1_de").val( cropImgData["x"]+"_"+cropImgData["x1"]+"_"+cropImgData["y"]+"_"+cropImgData["y1"]);
        }
    
		if(slot_id=='c-slot-2'){
			$("#slot_2_de").val( cropImgData["x"]+"_"+cropImgData["x1"]+"_"+cropImgData["y"]+"_"+cropImgData["y1"]);
        }
    
		if(slot_id=='c-slot-3'){
			$("#slot_3_de").val( cropImgData["x"]+"_"+cropImgData["x1"]+"_"+cropImgData["y"]+"_"+cropImgData["y1"]);
		}

        setCroppedImage(jcrop_api.tellScaled());
    });

    //$.colorbox.close();

    return;
}

function destroyJcrop() {
    //alert("closed");   
}

function setCroppedImage(c) {
    var slotImg = cropImgData["slotImg"];
    var offsetLeft = Math.floor(c.x / cropImgData["slotToCropRatio"]);
    offsetLeftCss = -Math.abs(offsetLeft);
    var offsetTop = Math.floor(c.y / cropImgData["slotToCropRatio"]);
    offsetTopCss = -Math.abs(offsetTop);

    slotImg.css("left", offsetLeftCss + "px");
    slotImg.css("top", offsetTopCss + "px");

    var cpos = getSlotPos(cropImgData["slot"]);

    cData["cslots"][cpos]["imgposx"] = offsetLeft;
    cData["cslots"][cpos]["imgposy"] = offsetTop;

    $("#cboxClose").trigger("click");
}

function setImageForCropping(slot, img) {
    var cpos = getSlotPos(slot);
    var cslot = cData["cslots"][cpos];
    var slot_w = cslot.width;
    var slot_h = cslot.height;

    var img_w = cslot.imgw;
    var img_h = cslot.imgh;

    var img_src = img.attr('src');

    var img_position_x = cslot.imgposx;
    var img_position_y = cslot.imgposy

    var imgRatio = img_h / img_w;
    var slotRatio = slot_h / slot_w;

    /*if(img_w > img_h) {
     var crop_area_w = 430;
     var crop_area_h = crop_area_w * imgRatio;
     var slotToCropRatio = crop_area_h / slot_h;
     var cropImgW = crop_area_w;
     var cropImgH = cropImgW * imgRatio;        
     }
     else {
     var crop_area_h = 430;
     var crop_area_w = crop_area_h * imgRatio;
     var slotToCropRatio = crop_area_w / slot_w;
     var cropImgH = crop_area_h;
     var cropImgW = cropImgH / imgRatio;    
     }
     
     if(slotRatio > imgRatio) {
     var slotImgW = slot_w;
     var slotImgH = slot_w * imgRatio;
     var slotImgOffsetY = (slot_h - slotImgH) / 2;
     
     var cropImgX = img_position_x * slotToCropRatio;
     var cropImgY = 0;
     var cropImgX1 = cropImgX+(slot_w * slotToCropRatio);
     var cropImgY1 = cropImgY + cropImgH;
     }
     else {
     var cropImgX = img_position_x * slotToCropRatio;
     var cropImgY = 0;
     var cropImgX1 = cropImgX+(slot_w * slotToCropRatio);
     var cropImgY1 = cropImgY + cropImgH;
     }*/

    if (img_w > img_h) {
        var imgRatio = img_w / img_h;
        var crop_area_h = 430;
        var crop_area_w = crop_area_h * imgRatio;
        var slotToCropRatio = crop_area_h / slot_h;
        var cropImgW = crop_area_h * imgRatio;
        var cropImgH = crop_area_h;
        var cropImgX = img_position_x * slotToCropRatio;
        var cropImgY = 0;
        var cropImgX1 = cropImgX + (slot_w * slotToCropRatio);
        var cropImgY1 = cropImgY + cropImgH;
    } else if (img_h > img_w) {
        var imgRatio = img_h / img_w;
        var crop_area_h = 430;
        var crop_area_w = crop_area_h / imgRatio;
        var slotToCropRatio = crop_area_w / slot_w;
        var cropImgH = crop_area_h;
        var cropImgW = cropImgH / imgRatio;
        var cropImgX = 0;
        var cropImgY = img_position_y * slotToCropRatio;
        var cropImgX1 = cropImgX + cropImgW;
        var cropImgY1 = cropImgY + (slot_h * slotToCropRatio);
    } else {
        if (slot_w > slot_h) {
            var slotRatio = slot_h / slot_w;
            var crop_area_h = 430;
            var crop_area_w = 430;

            var slotToCropRatio = crop_area_w / slot_w;
            var cropImgH = crop_area_h;
            var cropImgW = crop_area_w;
            var cropImgX = 0;
            var cropImgY = img_position_y * slotToCropRatio;
            var cropImgX1 = cropImgX + cropImgW;
            var cropImgY1 = cropImgY + (slot_h * slotToCropRatio);
        } else if (slot_w < slot_h) {

            var slotRatio = slot_h / slot_w;
            var crop_area_h = 430;
            var crop_area_w = 430;

            var slotToCropRatio = crop_area_h / slot_h;
            var cropImgH = crop_area_h;
            var cropImgW = crop_area_w;
            var cropImgX = img_position_x * slotToCropRatio;
            var cropImgY = 0;
            var cropImgX1 = cropImgX + (slot_w * slotToCropRatio);
            var cropImgY1 = cropImgY + cropImgH;
        } else {
            var slotRatio = slot_h / slot_w;
            var crop_area_h = 430;
            var crop_area_w = 430;

            var slotToCropRatio = crop_area_h / slot_h;
            var cropImgH = crop_area_h;
            var cropImgW = crop_area_w;
            var cropImgX = 0;
            var cropImgY = 0;
            var cropImgX1 = 430;
            var cropImgY1 = 430;
        }
    }

    //cropImgData = new Object();
    cropImgData["x"] = Math.round(cropImgX);
    cropImgData["x1"] = Math.round(cropImgX1);
    cropImgData["y"] = Math.round(cropImgY);
    cropImgData["y1"] = Math.round(cropImgY1);
    cropImgData["cropImgW"] = Math.round(cropImgW);
    cropImgData["cropImgH"] = cropImgH;
    cropImgData["slot"] = slot;
    cropImgData["slotImg"] = img;
    cropImgData["slotToCropRatio"] = slotToCropRatio;
    cropImgData["imgRatio"] = imgRatio;

    var cropImg = $("#c-designer-modal-img")
            .attr("src", img_src)
            .attr("width", Math.round(cropImgW))
            .attr("height", Math.round(cropImgH))
            .css("width", Math.round(cropImgW) + 'px')
            .css("height", Math.round(cropImgH) + 'px');

    //alert("img_w:" + cropImgW + " crop_w:" + crop_area_w);

    $("#c-designer-modal-crop")
            .css("width", Math.round(cropImgW) + 'px')
            .css("height", Math.round(cropImgH) + 'px');

    return true;
}

function initRichEditor(trigger) {

    toolText.addClass("active");

    var editor = $("#c-layout-text-editor");
    var editorInput = $("input.inputbox");

    editor
            .css("visibility", "visible")
            .position({
                of: editor,
                my: 'center bottom-12',
                at: 'center top',
                of: trigger
            })
            .animate({
                "opacity": 1
            }, 100);

    $(".c-layout-text-editor-color-colors li").click(function () {
        $(".c-layout-text-editor-color-colors li").removeClass("selected");
        $(this).addClass("selected");

        var color = $(this).data("c-text-color");
        $("#c-text").css("color", color);
        editorInput.css("color", color);
    });

    $(".c-layout-text-editor-font-fonts li").click(function () {
        $(".c-layout-text-editor-font-fonts li").removeClass("selected");
        $(this).addClass("selected");

        var font = $(this).data("c-font");
        $("#c-text").css("font-family", font);
        editorInput.css("font-family", font);
        initInputSensor();
        trimTextLength($('#c-text'));
    });

    $(".c-layout-text-editor-fontsize-sizes li").click(function () {
        $(".c-layout-text-editor-fontsize-sizes li").removeClass("selected");
        $(this).addClass("selected");

        var fontsize = $(this).data("c-fontsize");
        $("#c-text").css("font-size", fontsize);
        editorInput.css("font-size", fontsize);
        initInputSensor();
        trimTextLength($('#c-text'));
    });

    // Close text editor on click on close button
    $("#c-layout-text-editor .modal-close").click(function () {
        closeRichEditor();
    });

    // Save editor values on click on save button
    $("#c-layout-text-editor-confirm").click(function () {
        closeRichEditor();
    });
}

function closeRichEditor() {
    var editor = $("#c-layout-text-editor");
    editor
            .animate({
                "opacity": 0
            }, 100, function () {
                $(this).css("visibility", "hidden");
            }
            );

    setLayoutTextProperties();

    $("#c-layout-text-editor input.inputbox").removeClass("focus");
    toolText.removeClass("active");
}

function initInputSensor() {
    var inputbox = $("input.inputbox");
    var inputsensor = $(".inputsensor");
    var ctext = $("#c-text");
    //inputbox.removeAttr("maxlength"); 

    //inputbox.attr('size', inputbox.val().length);

    inputsensor.css({
        "font-family": ctext.css("font-family"),
        "font-size": ctext.css("font-size")
    });
    inputsensor.text(ctext.text());

    function checkInputLength() {
        if (inputsensor.outerWidth() >= ctext.outerWidth()) {
            var limitedText = ctext.text();

            limitedText = limitedText.substr(0, inputsensor.text().length - 1);
            limitedText = limitedText.trim();

            //ctext.text(limitedText).attr("maxlength", inputsensor.text().length);
            ctext.text(limitedText);
            inputsensor.text(limitedText);

            promptAlert = true;
            checkInputLength();
        }
    }

    var promptAlert = false;
    var checkResult = checkInputLength();

    if (promptAlert) {
        openDisabledModal("#modal-texteditor-maxlength-content");
    }
}

/*function isRichEditorClicked() {
 $('body').click(function(event) {
 if($(event.target).is('#c-layout-text-editor')) {
 alert("true");
 return true;
 }
 else {
 return false;
 }
 });
 } */

function setLayoutTextProperties() {
    var text = $("#c-text").text();
    if (text == $('#c-text').attr('data-text')) {
        text = '';
    }
    var color = $(".c-layout-text-editor-color-colors .selected").data("c-text-color");
    var font = $(".c-layout-text-editor-font-fonts .selected").data("c-font");
    var fontstyle = $(".c-layout-text-editor-font-fonts .selected").data("c-fontstyle");
    var fontsize = $(".c-layout-text-editor-fontsize-sizes .selected").data("c-fontsize");

    cData["ctext"]["text"] = escape(text);
    cData["ctext"]["color"] = color;
    cData["ctext"]["font"] = font;
    cData["ctext"]["fontstyle"] = fontstyle;
    cData["ctext"]["fontsize"] = fontsize;

    //alert(dump_r(cData["ctext"]));   
    console.log(text);
}

function updateHeaderImageCounter(count) {
    var currentUploads = parseInt(jQuery.cookie("fce_uploads"));
    var newUploads = currentUploads + count;
    jQuery.cookie("fce_uploads", newUploads, {path: '/', domain: xDomain, expires: 3});

    var title = "<b>" + newUploads + fceLanguage.newUploadsTitle;
    $(".header-funcs-images").addClass("active").find(".navbar-unread").text(newUploads);
}

function openDisabledModal(content) {
    $.colorbox({
        inline: true,
        width: 500,
        height: 280,
        scrolling: false,
        fixed: false,
        href: content,
        close: '',
        overlayClose: false
    });

    $('body').on('click', '.btn-modal-close, .modal-window-content .btn', function () {
        $('#cboxClose').trigger('click');
    });

    return $.colorbox;
}

function startSlideshow() {
    countSlidesPlayed = 0; // Needed to determine how many slides have already been shown

    if (typeof bxSlider !== "undefined") {
        bxSlider.destroySlider();
    }

    bxSlider = $('.bxslider').bxSlider({
        mode: 'horizontal',
        auto: true,
        pause: 6000,
        autoHover: false,
        pager: false,
        controls: false,
        useCSS: false,
        infiniteLoop: true,
        speed: 400,
        touchEnabled: false,
        onSlideBefore: function ($slideElement, oldIndex, newIndex) {
            countSlidesPlayed++;
        }
    });
}

function setUniqueFormIDs() {
    new_form_uid = getUniqueFormID();
    var form_mail_download_tpl = $("#colorbox .share-download-mail-form-inputs");
    //alert(form_mail_download_tpl.attr("id"));
    form_mail_download_tpl_id = form_mail_download_tpl.attr("id");
    $("#colorbox #" + form_mail_download_tpl_id).attr("id", "share-download-mail-form-inputs-" + new_form_uid);
}

// Array Remove - By John Resig (MIT Licensed)
function array_remove(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    var result = array.push.apply(array, rest);
    //console.log(result); 
    return array;
}

function getUrlFilename(url) {
    var filename = url.substring(url.lastIndexOf('/') + 1);
    filename = rawurldecode(filename);

    return filename;
}

// Validate email address with regex logic
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}

function rawurldecode(str) {
    // http://kevin.vanzonneveld.net
    // +   original by: Brett Zamir (http://brett-zamir.me)
    // +      input by: travc
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Ratheous
    // +   reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +      input by: lovio
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // %        note 1: Please be aware that this function expects to decode from UTF-8 encoded strings, as found on
    // %        note 1: pages served as UTF-8
    // *     example 1: rawurldecode('Kevin+van+Zonneveld%21');
    // *     returns 1: 'Kevin+van+Zonneveld!'
    // *     example 2: rawurldecode('http%3A%2F%2Fkevin.vanzonneveld.net%2F');
    // *     returns 2: 'http://kevin.vanzonneveld.net/'
    // *     example 3: rawurldecode('http%3A%2F%2Fwww.google.nl%2Fsearch%3Fq%3Dphp.js%26ie%3Dutf-8%26oe%3Dutf-8%26aq%3Dt%26rls%3Dcom.ubuntu%3Aen-US%3Aunofficial%26client%3Dfirefox-a');
    // *     returns 3: 'http://www.google.nl/search?q=php.js&ie=utf-8&oe=utf-8&aq=t&rls=com.ubuntu:en-US:unofficial&client=firefox-a'
    // *     example 4: rawurldecode('-22%97bc%2Fbc');
    // *     returns 4: '-22—bc/bc'
    // *     example 4: urldecode('%E5%A5%BD%3_4');
    // *     returns 4: '\u597d%3_4'
    return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function () {
        // PHP tolerates poorly formed escape sequences
        return '%25';
    }));
}

function getUniqueFormID() {
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
    }

    return s4() + s4() + s4() + s4();
}

// Dump Array/Object structure
function dump_r(arr, level) {
    var dumped_text = "";
    if (!level) {
        level = 0;
    }

    //The padding given at the beginning of the line.
    var level_padding = "";
    for (var j = 0; j < level + 1; j++) {
        level_padding += "    ";
    }

    if (typeof (arr) == 'object') { //Array/Hashes/Objects 
        for (var item in arr) {
            var value = arr[item];

            if (typeof (value) == 'object') { //If it is an array,
                dumped_text += level_padding + "'" + item + "' ...\n";
                dumped_text += dump(value, level + 1);
            } else {
                dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
            }
        }
    } else { //Stings/Chars/Numbers etc.
        dumped_text = "===>" + arr + "<===(" + typeof (arr) + ")";
    }
    return dumped_text;
}

function collageEmptyCheck() {
    if ($('.c-layout-slot img').length == 0) {
        $('#c-designer-btn-render').addClass('deactivated');
    }
}

function trimTextLength(element) {
    var intervalID = setInterval(function () {
        if (element.height() >= element.attr('data-max-height')) {
            var text = element.text();
            text = text.substring(0, text.length - 1);
            element.text(text);
            setTimeout(function () {
                openDisabledModal("#modal-texteditor-maxlength-content");
            }, 500);

        } else {
            clearInterval(intervalID);
            setLayoutTextProperties();
        }
    }, 50);
}


$(".c-layout-slot").mousestop(200,
        function () {
            $(this).find(".c-image-remove").fadeIn();
            $(this).click(function () {

            });
            $(this).find(".c-image-crop").fadeIn();
            $(this).find(".c-image-quality").fadeIn();
        }
);
$(".c-layout-slot").mouseleave(
        function () {
            $(this).find(".c-image-crop").fadeOut();
            $(this).find(".c-image-quality").fadeOut();
            $(this).find(".c-image-remove").fadeOut();
        }
);