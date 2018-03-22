$(function(){
    
    $('.alert-close').on('click', function(c){
		$(this).parent().fadeOut('slow', function(c){
		    $(this).parent().empty();
		});
	});	
	
	var pwd = $('#pass');
	var rePwd = $('#re-pass');
	
	rePwd.on('keyup', function(){
	    if($(this).val() != pwd.val() ){
	        $('#re-pwd-err').text("Password didn't match");
	    }else{
	        $('#re-pwd-err').empty();
	    }
	});

});

// 	Form Validation 

function formCheck(){
    var name = $('#name');
    var email = $('#email');
    var phn = $('#phone');
    var un = $('#username');
	var pwd = $('#pass');
	var rePwd = $('#re-pass');
	
    if(name.val()===''){
        $('#name-err').text("Can't be Empty !!");
        name.focus();
	    return false;
    }else{
        $('#name-err').empty();
    }
    
    if(email.val()===''){
        $('#email-err').text("Can't be Empty !!");
        email.focus();
	    return false;
    }else{
        $('#email-err').empty();
    }
    
    if(phn.val()===''){
        $('#phn-err').text("Can't be Empty !!");
        phn.focus();
	    return false;
    }else{
        $('#phn-err').empty();
    }
    
    if(un.val()===''){
        $('#un-err').text("Can't be Empty !!");
        un.focus();
	    return false;
    }else{
        $('#un-err').empty();
    }
    
    if(pwd.val()===''){
        $('#pwd-err').text("Can't be Empty !!");
        pwd.focus();
	    return false;
    }else{
        $('#pwd-err').empty();
    }
    if(rePwd.val()===''){
        $('#re-pwd-err').text("Can't be Empty !!");
        rePwd.focus();
	    return false;
    }else{
        $('#re-pwd-err').empty();
    }
    
    return true;
}