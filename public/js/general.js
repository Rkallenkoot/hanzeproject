function confirm_destroy(url, id){
	if(!confirm("Are you sure you want to Delete this?")){
		return false;
	}
	$.post(url+id, function(){
		table.rows('tr#'+id).remove().draw();
	});
}
function orderMenu(url){
	$.post(url, function(data){
		console.log(data);
		location.reload();
	});
}