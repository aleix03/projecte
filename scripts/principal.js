$(function(){
	var contador = 0;

	$("#login").click(function(){
		if (contador==0){
			$("#div_login").css("display","block");
			contador = 1;
		}
		$(".tancar_login").click(function(){
			if (contador == 1){
				$("#div_login").css("display","none");
				contador = 0;
			}
		});
		$(".no_registrat p strong a").click(function(){
			$("#div_login").css("display","none");
			$("#div_register").css("display","block");
			$(".tancar_register").click(function(){
	                        if (contador == 1){
                                	$("#div_register").css("display","none");
                                	contador = 0;
                        	}
                	});
		});
	});

	$("#register").click(function(){
		if (contador==0){
			$("#div_register").css("display","block");
			contador = 1;
		}
		$(".tancar_register").click(function(){
			if (contador == 1){
				$("#div_register").css("display","none");
				contador = 0;
			}
		});
		$(".no_login p strong a").click(function(){
			$("#div_register").css("display","none");
			$("#div_login").css("display","block");
			$(".tancar_login").click(function(){
	                        if (contador == 1){
        	                        $("#div_login").css("display","none");
                	                contador = 0;
                        	}
                	});
		});
	});
});
