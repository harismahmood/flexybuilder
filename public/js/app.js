var builder_type = null;
var new_project = false;
var project_id = null;

function init_type(type,np,pi){
    builder_type = type;
    if (np){
        new_project = true;
    }
    else{
        project_id = pi;
    }
}


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


function canvasDesktop(){
    $("#columns-canvas-center").removeClass();
    $("#columns-canvas-center").addClass("col-sm-12");
    removeIcolor();
    $('.fa-laptop').css('color','#00aeef');
}

function canvasTablet(){
    $("#columns-canvas-center").removeClass();
    $("#columns-canvas-center").addClass("col-md-8 col-md-offset-2");
    removeIcolor();
    $(".fa-tablet").css('color','#00aeef');
}

function canvasMobile(){
    $("#columns-canvas-center").removeClass();
    $("#columns-canvas-center").addClass("col-md-4 col-md-offset-4");
    removeIcolor();
    $(".fa-mobile").css('color','#00aeef');
}

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

function modalGen(title,body,id){
    var modal = '<div class="custom-modal modal fade" id="response" role="dialog"> <div class="modal-dialog"><div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title">'+title+'</h4> </div> <div class="modal-body"> <p>'+body+'</p> </div> <div class="modal-footer"> <button type="button" class="modal-button btn btn-default" id="'+id+'">Execute</button></div> </div> </div> </div>';
    $("#modal_container").append(modal);
    modal = null;
    $("#response").modal('toggle');
}

function modalClear(){
    $("#response").modal('hide');
    $(".modal-backdrop").remove();
    $("#modal_container").html('');
}

$(document).ready(function(){
    // New Project (Blank)
    if (new_project && builder_type == 1) {
        var dataHTML = "<div class='modal-text'> <h2>You are about to create a new project!</h2> <h3>Please chose the width-size of your project.</h3> <hr> <div class='form-group'> <label><input type='radio' name='radio' id='width1' />Full Width</label> </div> <div class='form-group'> <label><input type='radio' name='radio' id='width2' />12 Columns</label> </div> </div>";
        modalGen('New Project', dataHTML, 'modal1');
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
        $(document).on('click', '#modal1', function () {
            modalClear();
        });
    }
// End of New Project (Blank)
});
