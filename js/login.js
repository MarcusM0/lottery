$().ready(function() {
	$("#formLogin").validate({
		submitHandler: function(e) {
//		   document.getElementById("formLogin").submit();
		   
		   $("#msg").html("");
           var url=$("#formLogin").attr("url");
           var email=$("#email").val();
           var password=$("#password").val();
           $.post(url,{email:email,password:password},function(result){
        	   var result=eval("("+result+")");
        	   if(result.code==true){
        		   document.location.href=result.url;
        	   }else{
        		   $("#msg").html("用户名或密码有误");
        	   }
           });     


		},		
		rules: {
		    email: {
		       required: true,
		       email: true
	        },
			password: "required"
		},
		messages: {
			email: {
			    required: "邮箱不能为空!",
			    email: "邮箱格式不正确!"
    	    },
			password: "密码不能为空!"
		}
	});		
	
});



