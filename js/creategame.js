$(document).ready(function() {
	var i=1;
	var goalfw=0;
	var goalfl= 0;
	var goalTotal= 0;
	var slides = 0;
	//console.log(goalfl);
	for (i=1;i<=12;i++)
	{
		$("#Goal"+i).hide();
	}
	//$("#Goal1").slideDown();
	
	$("select[name=goalfw]").change(function(evt) {
		evt.preventDefault;
		//alert(1);
		goalfw = $(this).val()
		updateSlide();
	});
	$("select[name=goalfl]").change(function(evt) {
		evt.preventDefault;
		//alert(1);
		goalfl = $(this).val()
		updateSlide();
	});
	
	function updateSlide() {
		goalTotal = +goalfw + +goalfl;
		var start=slides;
		if (slides>goalTotal)
		{
			//alert(2);
			//console.log(goalTotal);
			//console.log("start" + start);
			for (i=start;i>goalTotal;i--)
			{
				$("#Goal"+i).slideUp();
				slides--;
				//alert(3);
			}
		}
		else if (goalTotal>slides)
		{
			for (i=start+1;i<=goalTotal;i++)
			{
				$("#Goal"+i).slideDown();
				slides++;
			}
		}
		else
		{
			//console.log("even");
		}
		//console.log("slides" + slides);
	};
	

});