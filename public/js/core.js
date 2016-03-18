function enLarge(idofele){
    $("#"+idofele+" img").stop().animate({'height':'150px','width':'150px'});
}

function deLarge(idofele){
    $("#"+idofele+" img").stop().animate({'height':'100px','width':'100px'});
}

function logOut(){
    $("body").append("<div class='black-bg'></div>");
    if(confirm("Are you sure you want to logout?")){
        window.location="/login/logout";
    }
    else{
        $(".black-bg").remove();
    }
}

function home(){
    window.location='/home';
}


