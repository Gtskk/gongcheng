$(document).ready(function(){
	// 打印功能
	$('#print').click(function(){
		printdiv("tableContent");
	});

	// 前台显示查询框
	$('#search').click(function(){
		$('.searchbar').toggle('slow');
	});

	//搜索操作
	$('.searchbar .btn').click(function(){
		var s = $('input[name="content"]').val();
		console.log(s);
	});
});