$(function() {
	var p1;
	var p2;
	//$("#Goal1").slideDown();
	
	$("select[name=sortp1]").change(function(evt) {
		evt.preventDefault;
		//alert(1);
		//p1 = $(this).val()
		//console.log(p1);
		filter();
	});
	$("select[name=sortp2]").change(function(evt) {
		evt.preventDefault;
		//alert(1);
		//p2 = $(this).val()
		//console.log(p2)
		filter();
	});
function filter() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input1 = document.getElementById("p1");
  input2 = document.getElementById("p2");
  filter1 = input1.value;
  filter2 = input2.value;
  //console.log("filter 1 is" + filter1);
  table = document.getElementById("games");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
	td2 = tr[i].getElementsByTagName("td")[2];
    if (td && td2) {
      if (((td.innerHTML===filter1 || filter1==="All") && (td2.innerHTML===filter2 || filter2==="All")) || ((td.innerHTML===filter2 || filter2==="All") && (td2.innerHTML===filter1 || filter1==="All")))  {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
	

});