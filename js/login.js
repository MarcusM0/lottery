$().ready(function() {
	$("#formLogin").validate({
		submitHandler: function(e) {
		   $("#msg").html("");
           var url=$("#formLogin").attr("url");
           var email=$("#email").val();
           var password=$("#password").val();
           var remember=0;
           if($("#remember").attr("checked")=="checked"){
        	   remember=1;
           }
           $.post(url,{email:email,password:password,remember:remember},function(result){
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



