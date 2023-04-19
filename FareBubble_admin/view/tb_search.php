<style>
#popup
{
	display:none;
	width:auto;
	min-height:300px;
	background:#FFF;
	border:2px solid #000;
	position:fixed;
	top:12%;
	left:25%;
	z-index:99999;	
	padding:30px;
}
#close
{
	display:none;
	position:fixed;
	top:13%;
	left:79%;
	z-index:99999999;
	cursor:pointer;
	font-weight:bold;
	font-size:30px;
	color:#DA251C;
}
#popup table
{
	border:1px solid #000;
	width:700px;
}
#popup table td
{
	border:1px solid #000;
	padding:7px;
	background:#DFF7FD;
}
</style>
<script>
$(document).ready(function(){
	$('.view').click(function(){
		$('#popup').show();
		$('#close').show();
	});
	$('#close').click(function(){
		$(this).hide();
		$('#popup').hide();
	});
});
</script>
<script>
$(document).ready(function(){
	$(".view").click(function(){
		$("#popup").empty();
		var id = $(this).val();
		$.ajax({
			url:'view/tb_search_p.php',
			data:{id:id},
			type:'POST',
			success:function(data){
				$("#popup").append(data);
			}
		});
		
		
	});
});
</script>
								<div id="close">
X
</div>
<div id="popup">
</div> 
