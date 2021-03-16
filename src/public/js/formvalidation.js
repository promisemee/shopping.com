$(document).ready(function(){

	jQuery.validator.addMethod("checkpwd", function(value) {
   		return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       		&& /[a-z]/.test(value) // has a lowercase letter
       		&& /\d/.test(value) // has a digit
   });

	jQuery.validator.setDefaults({
    	errorPlacement: function(error, element) {
        	error.appendTo('#invalid-' + element.attr('id'));
    	}
	});

	$('#join').validate({ 
		errorClass: "errorTxt",
        rules: {
            email: {
                required: true,
                email: true
            },
            password1: {
                required: true,
                checkpwd:true
            },
            password2: {
                required:true,
                equalTo:"#2"
            },
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            check: {
                required: true
            }
        },

        messages:{
			email:{
				email:"Please enter a valid email address",
			},
			password1:{
				checkpwd:"Please enter password with minimum eight characters, at least one letter and one number",
			},
			password2:{
                equalTo:"Please confirm your password",
            },
        },
        
        submitHandler: function(form) {
        	var data = $(form).serialize();
        	window.location.replace('/member/signin.php?'+data);
        }
    });



    $('#mypage').validate({
        errorClass: "errorTxt",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                checkpwd: true
            },
            password2: {
                equalTo:"#password"
            },
            fname: {
                required: true
            },
            lname: {
                required: true
            },
        },

        messages:{
            semail:{
                email:"Please enter a valid email address"
            },
            spassword:{
                checkpwd:"Please enter password with minimum eight characters, at least one letter and one number"
            },
            spassword2:"Please confirm your password",
        },
        
        submitHandler: function(form) {
            var data = $(form).serialize();
            window.location.replace('/member/modify.php?'+data);
        }

    });

});