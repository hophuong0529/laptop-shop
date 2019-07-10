$(document).ready(function(){
	$(window).scroll(function(event){
		console.log($(window).scrollTop());
		if(eval($(window).scrollTop())>=150)
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