$().ready(function() {
	jQuery.validator.addMethod("isMobile", function(value, element) {  
	    var length = value.length;  
	    var mobile = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;  
	    return this.optional(element) || (length == 11 && mobile.test(value));  
	}, "");  	
	
	$("#formPwd").validate({
		submitHandler: function() {
		   var email=$("#email").val();
		  $.post("/pwd/send",{email:email},function(result){
                   $("#msg").html("密码已发送到邮箱!");
			  });

		},		
		rules: {	    			
		    email: {
		       required: true,
		       email: true
	        }
		},
		messages: {       	
			email: {
			    required: "邮箱不能为空!",
			    email: "邮箱格式不正确!"
    	    }
		}
	});



	
});


