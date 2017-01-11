$(document).ready(function() {
			
			$('#update').click(function(evt)
			{
			evt.preventDefault();
			var player=$("#player").val();
			var goals=$("#goals").val();
			var assists=$("#assists").val();
			var motm=$("#motm").val();
			var nameid=$("#nameid").val();
			//console.log(player);
			if (player==''||goals=='')
			{
			$('#playerinfo').shake();
			$("#invalid").html("<span style='color:#cc0000'>Error:Must enter both username and password. </span> ");
			 $("#update").val('Update')
			 
			}
		    var dataString = 'player='+player+'&goals='+goals+'&assists='+assists+'&motm='+motm+'&nameid='+nameid;
			//console.log(dataString);
			if($.trim(player).length>0 && $.trim(goals).length>0)
			{
			
 
			$.ajax({
            type: "POST",
            url: "changeplayer.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#update").val('Connecting...');},
            success: function(data){
            if(data)
            {
				$('#playerinfo').shake();
			 $("#update").val('Update')
			 $("#invalid").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
            }
            else
            {
             
			 $("body").load("players.php").hide().fadeIn(1500).delay(6000);
            }
            }
            });
			
			}
			return false;
			});
			
				
			});