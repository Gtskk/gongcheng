// 打印
function printdiv(printpage){
	var headstr="<html><head><title></title></head><body>";
	var footstr="</body>";
	var oldstr=document.body.innerHTML;
	$('#'+printpage+' th:last-child').remove();
	$('#'+printpage+' tr .caozuo').remove();
	// $('#'+printpage+' td:last-child').remove();
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

// 旁站数据页面添加监理记录
$(document).ready(function(){
	var i = num = 1;
	$('.jianli_record').click(function(){
		var dt = new Date();
		var content = '<tr>'+
			'<td><input type="text" name="time'+i+'" value="'+dt.getFullYear()+'-'+(dt.getMonth()+1)+'-'+dt.getDate()+'" class="datepicker"></td>'+
			'<td><input type="text" name="huningtuliang'+i+'" value=""></td>'+
			'<td><input type="text" name="tanluodu'+i+'" value=""></td>'+
			'<td><select name="guanzhuGood'+i+'"><option value="0" selected="selected">结束</option><option value="1">是</option></select></td>'+
			'<td><input type="text" name="daoguanlikongdishendu'+i+'" value=""></td>'+
			'<td><input type="text" name="baguanqiandaoguanmaishen'+i+'" value=""></td>'+
			'<td><input type="text" name="baguanmeijiechangdu'+i+'" value=""></td>'+
			'<td><input type="text" name="baguanjieshu'+i+'" value=""></td>'+
			'<td><input type="text" name="baguanchangdu'+i+'" value=""></td>'+
			'<td><input type="text" name="baguanhoudaoguanmaishen'+i+'" value=""></td>'+
			'<td><select name="baguanGood'+i+'"><option value="0" selected="selected">结束</option><option value="1">是</option></select><a href="javascript:void(0)" class="btn btn-danger btn-mini pull-right remove_record"><i class="icon-minus"></i></a></td>'+
			'</tr>';
		if(num <= 10){
			$(this).parent().parent().before(content);

			$('.tableSpe .datepicker').datepicker({ format: 'yyyy-mm-dd'});
			$('.remove_record').click(function(){
				$(this).parent().parent().remove();
				num = num - 1;
			});
			i = i + 1;
			num = num + 1;
		}else{
			alert('最多能加10条记录');
		}
	});
});