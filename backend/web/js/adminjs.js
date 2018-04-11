$(function(){



	//alert(123);
	$(".active").parent("ul").addClass("show");
	$(".menu-list").click(function(){
		if($(this).find("ul").hasClass("show")){
			$(this).find("ul").slideUp("2000",function(){
			$(this).removeClass("show");
			
		});
	}else{
		$(this).siblings(".menu-list").find("ul").slideUp("2000",function(){
			$(this).removeClass("show");
		});
		$(this).find("ul").slideDown("2000",function(){
		$(this).addClass("show");
		});

	}
		
	});
	/*$("a").click(function(){
          alert(132);
    });*/
    //alert(123);
    var Default = {
    	name:'[data-test="test"]',
    	age:"18"
    }
    //Box1();
    var Box1 = function(){
    	alert(123);
    }
    //alert(Box1);
    //Box1();
    var Box = function(element,option){
    	this.element = element;
    	this.option = option;
    	//this._events();
    }
    Box();
    Box.prototype._events = function(){
    	//alert($(this).element);
    	$(this.element).on("click","a",function(){
    		alert(132);
    	});
    }

    //function adc(argument) {
    	// body...
    //}
    //alert(Box.name);
	//alert($("#baseUrl").val());
	//alert(L("info","让我测测"));
	
})
function L(token,replace,replace1,replace2) {
    if (LS[token] !== undefined){
        if(replace === undefined){
            replace = '';
        }
        if(replace1 === undefined){
            replace1 = '';
        }
        if(replace2 === undefined){
            replace2 = '';
        }
        var str =  LS[token].replace('{0}',replace);
        str = str.replace('{1}',replace1);
        str = str.replace('{2}',replace2);
        return str;
    }else{
        return token;
    }
}