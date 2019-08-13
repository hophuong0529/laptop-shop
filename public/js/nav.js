$(document).ready(function(){
	$(window).scroll(function(event){
		console.log($(window).scrollTop());
		if(eval($(window).scrollTop())>=120)
		{
			$(".navbar").css({
				position:"fixed",
				background:"rgb(255,106,2)",
				top: "0px",
				width: "100%"
			});
		}else{
			$(".navbar").css({
				position:"unset",
				width: "100%",
				background:"rgb(255,106,2)",
			});
		}
	});	
});

function hideMess(){
	document.getElementById("mess").style.display = "none";
}

if (window.location.pathname === '/' || window.location.pathname === '/page=2') {
	document.getElementById("ads").style.display = "block";
	document.getElementById("pagination").style.display = "block";
}

if (window.location.pathname === '/login' || window.location.pathname === '/register') {
	document.getElementById("ads2").style.display = "none";
}

$(document).ready(function(){ 
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 150) { 
			$('#goTop').fadeIn(); 
		} else { 
			$('#goTop').fadeOut(); 
		} 
	}); 
	$('#goTop').click(function(){ 
		$("html, body").animate({ scrollTop: 0 }, 300); 
		return false; 
	}); 
});