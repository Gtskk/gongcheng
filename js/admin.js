// 打印
function printdiv(printpage){
	var headstr="<html><head><title></title></head><body>";
	var footstr="</body>";
	var oldstr=document.body.innerHTML;
	$('#'+printpage+' th:last-child').remove();
	$('#'+printpage+' tr .caozuo').remove();
	$('#'+printpage+' td:last-child').remove();
	var newstr=document.all.item(printpage).innerHTML;
	document.body.innerHTML=headstr+'<center><table border="1" cellpadding="5">'+newstr+'</table></center>'+footstr;
	window.print(); 
	document.body.innerHTML=oldstr;
	return false;
}

// 错误信息定时隐藏
/*$(document).ready(function(){
	setTimeout(function(){
		$('.error').fadeOut('slow');
	}, 3000);
});*/