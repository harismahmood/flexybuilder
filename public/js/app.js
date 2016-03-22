var builder_type = null;
var new_project = false;
var project_id = null;

//Global Properties
var pageNameProperty = null;
var pageWidthProperty = null;

function init_type(type,np,pi){
    builder_type = type;
    if (np){
        new_project = true;
    }
    else{
        project_id = pi;
    }
}

function noFunction(){

};

$("#toolbox-nav").draggable({
    containment:'#canvas',
    cursor:"move",
    delay:"50"
});

//All document ready content here:
$(document).ready(function(){
    $(".fa-laptop").css('color','#00aeef');
    $("#menu-box").hide();
    $("#toolbox-button-hide").hide();
});

function canvasReset(){
    $("#canvas").css('width','100%');
    $("#canvas").css('margin','0');
}

function canvasDesktop(){
    $("#layouts").hide();
    $("#canvas").show();
    removeIcolor();
    $('.fa-laptop').css('color','#00aeef');
}

function canvasTablet(){
    $("#layouts").show();
    $("#layouts").html('');
    $("#canvas").hide();
    $("#layouts").html('<div id="iframe-tablet"><iframe width="100%" height="100%"  style="border:none" src="http://riot.design/en/"></iframe></div><div id="tablet-device-layout"></div><div onclick="rotateDevice(\'tablet\')" id="rotate-button" title="Rotate Device"><i class="fa fa-circle-o-notch"></i></div>');
    removeIcolor();
    $(".fa-tablet").css('color','#00aeef');
}

function canvasMobile(){
    $("#layouts").show();
    $("#layouts").html('');
    $("#canvas").hide();
    $("#layouts").html('<div id="mobile-device-layout"></div><div onclick="rotateDevice(\'mobile\')" id="rotate-button" title="Rotate Device"><i class="fa fa-circle-o-notch"></i></div>');
    removeIcolor();
    $(".fa-mobile").css('color','#00aeef');
}

var tablet = 0;
var mobile = 0;
function rotateDevice(device){
    if (device == 'tablet'){
        if (tablet == 0){
            $("#"+device+"-device-layout").rotate(90);
            $("#"+device+"-device-layout").css('top','25vh');
            $("#iframe-tablet").css('width','598px');
            $("#iframe-tablet").css('height','796px');
            $("#iframe-tablet").css('top','25vh');
            tablet = 1;

        }

        else {
            $("#"+device+"-device-layout").rotate(0);
            $("#"+device+"-device-layout").css('top','0');
            $("#iframe-tablet").css('height','598px');
            $("#iframe-tablet").css('width','796px');
            $("#iframe-tablet").css('top','0');
            tablet = 0;
        }
    }

    if (device == 'mobile'){
        if (mobile == 0){
            $("#"+device+"-device-layout").rotate(90);
            mobile = 1;

        }

        else {
            $("#"+device+"-device-layout").rotate(0);
            mobile = 0;
        }
    }


}

jQuery.fn.rotate = function(degrees) {
    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
        '-moz-transform' : 'rotate('+ degrees +'deg)',
        '-ms-transform' : 'rotate('+ degrees +'deg)',
        'transform' : 'rotate('+ degrees +'deg)'});
    return $(this);
};

$('.rotate').click(function() {
    rotation += 5;
    $(this).rotate(rotation);
});

function removeIcolor(){
    $(".fa-laptop").css('color','#000000');
    $(".fa-tablet").css('color','#000000');
    $(".fa-mobile").css('color','#000000');
}

function showLabel(id,content){
    $("#"+id).append('<div class="canvas-label">'+content+' | <i class="fa fa-cog"></i></div>');
}

function removeLabel(){
    $(".canvas-label").remove();
}

function showMenu(){
    $("#toolbox-button-show").hide();
    $("#menu-box").show();
    $("#menu-box").animate({'width':'20vw'},function(){
        $("#toolbox-button-hide").show();
    });

}

function hideMenu(){
    $("#menu-box").animate({'width':'1vw'},function(){
        $("#toolbox-button-hide").hide();
        $("#toolbox-button-show").show();
        $("#menu-box").hide();
    });
}

function modalGen(title,body,id,close){
    var content = '';
    var cross = ' <button type="button" class="close" data-dismiss="modal">&times;</button>';
    if (!close){
        content = 'data-backdrop="static" data-keyboard="false"';
        cross = '';
        $("#topbar-builder").hide();
    }
    var modal = '<div '+content+' class="custom-modal modal fade" id="response" role="dialog"> <div class="modal-dialog"><div class="modal-content"> <div class="modal-header">'+cross+' <h4 class="modal-title">'+title+'</h4> </div> <div class="modal-body"> <p>'+body+'</p> </div> <div class="modal-footer"> <button type="button" class="modal-button btn btn-default" id="'+id+'">Execute</button></div> </div> </div> </div>';
    $("#modal_container").append(modal);
    modal = null;
    $("#response").modal('toggle');
}

function modalGenSteps(title,body,id,cancel,close,callBack,callBacks){
    if (cancel){
        cancel = '<button type="button" class="btn modal-button js-btn-step pull-left" onClick="modalClear()" data-orientation="cancel" data-dismiss="modal"></button>';
    }
    else{
        cancel = "";
    }
    var content = '';
    var cross = ' <button type="button" class="close" data-dismiss="modal">&times;</button>';
    if (!close){
        content = 'data-backdrop="static" data-keyboard="false"';
        cross = '';
        $("#topbar-builder").hide();
    }
    var modal = '<div '+content+' class="custom-modal modal fade" id="response" role="dialog"> <div class="modal-dialog"><div class="modal-content"> <div class="modal-header">'+cross+' <h4 class="modal-title js-title-step"></h4> </div> <div class="modal-body"> <p>'+body+'</p> </div> <div class="modal-footer">  '+cancel+'<button type="button" class="modal-button btn btn-warning js-btn-step" data-orientation="previous"></button><button type="button" class="btn btn-success modal-button js-btn-step" data-orientation="next"></button></div> </div> </div> </div>';
    $("#modal_container").append(modal);
    modal = null;
    if (!callBacks){
        $('#response').modalSteps({
            btnLastStepHtml: 'Finish',
            completeCallback:callBack
        });
    }
    else{
        $('#response').modalSteps({
            btnLastStepHtml: 'Finish',
            completeCallback:callBack,
            callbacks:callBacks
        });
    }
    $("#response").modal('toggle');
}


function modalClear(){
    $("#response").modal('hide');
    $(".modal-backdrop").remove();
    $("#modal_container").html('');
}

function disableButton(identifier,title){
    $(identifier).prop('disabled',true);
    $(identifier).attr('title',title);
}

function enableButton(identifier){
    $(identifier).prop('disabled',false);
    $(identifier).removeAttr('title');
}

$(document).ready(function(){
    // New Page (Blank)
    if (new_project && builder_type == 1) {
        $("#container-canvas-center").addClass('container-fluid');
        var dataHTML =
            "<div class='modal-text'>  <div class='hide' data-step='1' data-title='Flexy Builder - Step 1'>" +
            "<div class='form-group'><label>Page Name:</label><input type='text' class='form-control no-edge' id='page-name' placeholder='page name...' /> </div>" +
            "</div>" +
            "<div class='hide' data-step='2' data-title='Flexy Builder - Step 2'><h3>Page Width:</h3> <hr> <div class='form-group'> <label><input type='radio' name='radio' id='width1'/>Full Width</label> </div> <div class='form-group'> <label><input type='radio' name='radio' id='width2' />12 Columns</label> </div> </div> </div>";
        modalGenSteps('Flexy Builder', dataHTML, 'modal1',false,false,modal1Complete,{
            '2':completeModal1Step1
        });
        $("#width1").prop("checked", true);
        $(document).on('change', 'input[name=radio]', function () {
            if ($("#width2").is(":checked")) {
                $("#container-canvas-center").removeClass();
                $("#columns-canvas-center").removeClass();
                $("#container-canvas-center").addClass('container');
                $("#columns-canvas-center").addClass('col-md-12');
            }
            else {
                $("#container-canvas-center").removeClass();
                $("#columns-canvas-center").removeClass();
                $("#container-canvas-center").addClass('container-fluid');
            }
        })
        function completeModal1Step1(){
            enableButton('.complete-btn');
            $("#modal-error-1").remove();
            var pgname = $("#page-name").val();
            if (pgname == null || pgname == ""){
                disableButton('.complete-btn','You have not filled in all required fields.');
                $("#page-name").after('<label id="modal-error-1" class="danger" style="color:red !important">Please fill in the above field</label>');
                alert('Please fill in page name!');
            }

        }

        function modal1Complete(){
            $("#topbar-builder").show();
            var pageName = $("#page-name").val();
            var width = null;
            if ($("#width1").is(":checked")) {
                width = "full-width";
            }
            else{
                width = "12-cols";
            }
            pageNameProperty = pageName;
            pageWidthProperty = width;
            pageName = undefined;
            width = undefined;
            modalClear();

        }
    }
// End of New Page (Blank)
});
