// 打印
function printdiv(printpage){
	var headstr="<html><head><title></title></head><body>";
	var footstr="</body>";
	var newstr=document.all.item(printpage).innerHTML;
	var oldstr=document.body.innerHTML;
	document.body.innerHTML=headstr+newstr+footstr;
	window.print(); 
	document.body.innerHTML=oldstr;
	return false;
}

$(document).ready(function(){
	// 打印功能
	$('#print').click(function(){
		printdiv("tableContent");
	});

	// 前台显示查询框
	$('#search').click(function(){
		$('.searchbar').toggle('slow');
	})
});