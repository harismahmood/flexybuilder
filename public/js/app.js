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
    $("#menu-box").animate({'width':'25vw'},function(){
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