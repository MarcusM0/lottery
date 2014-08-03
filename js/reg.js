$().ready(function() {
	$("#formReg").validate({
		submitHandler: function() {
		  $("#emailts").hide();
		  var email=$("#email").val();
		  var password=$("#password").val();
		  var nick_name=$("#nick_name").val();
		  $.post("/reg/doreg",{email:email,password:password,nick_name:nick_name},function(result){
           $("#emailts").show();
		   });
		},		
		rules: {
			 code: {
			       required: true,
			       remote:{
				 	　　 type:"post",
					　　 url:"/reg/iscode",
					    dataType: "json",     
					　　 data:{
					　　     email:function(){return $("#code").val();}
					　　 }	       
		     }
		    },	
		    nick_name: {
			       required: true
		    },		    			
		    email: {
		       required: true,
		       email: true,
		       remote:{
			 	　　 type:"post",
				　　 url:"/reg/isexsit",
				    dataType: "json",     
				　　 data:{
				　　     email:function(){return $("#email").val();}
				　　 }	       
	           }
	        },
			password: "required"

		},
		messages: {
			code: {
		    required: "验证码不能为空!",
		    remote: "验证码不正确!"
            },	
            nick_name: {
			    required: "昵称不能为空!"
    	    },            	
			email: {
			    required: "邮箱不能为空!",
			    email: "邮箱格式不正确!",
			    remote: "邮箱已存在!"
			    
    	    },
			password: "密码不能为空!"
		}
	});

	$("#chgimg").click(function(){
		$(this).attr("src",'src/code/code_num.php?' + Math.random());
	});


	
});


