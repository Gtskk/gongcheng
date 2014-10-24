<div class="content">
    <!-- <div class="action">
        <?php echo anchor('admin/data/edit', '新建数据', 'class="btn button pull-left"');?>
        <a href="#" onclick="printdiv('tableContent')" class="btn button2 pull-right">打印数据</a>
    </div> -->
    <div class="row-fluid">
    	<ul class="thumbnails">
    		<?php if(count($projects)):foreach($projects as $project):?>
          	<li class="span4">
            	<div class="thumbnail">
          			<img data-src="holder.js/300x200" alt="300x200" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAANBklEQVR4Xu2bhY4cSRAFe80oM7PMTP//BWZmZloz0ylKKqs9N16vQXuXldHSyWfvQGa8mlBWTe/I6Ojo185LAhKQQAACIworQEqWKAEJFAIKy4UgAQmEIaCwwkRloRKQgMJyDUhAAmEIKKwwUVmoBCSgsFwDEpBAGAIKK0xUFioBCSgs14AEJBCGgMIKE5WFSkACCss1IAEJhCGgsMJEZaESkIDCcg1IQAJhCCisMFFZqAQkoLBcAxKQQBgCCitMVBYqAQkoLNeABCQQhoDCChOVhUpAAgrLNSABCYQhoLDCRGWhEpCAwnINSEACYQgorDBRWagEJKCwXAMSkEAYAgorTFQWKgEJKCzXgAQkEIaAwgoTlYVKQAIKyzUgAQmEIaCwwkRloRKQgMJyDUhAAmEIKKwwUVmoBCSgsFwDEpBAGAIKK0xUFioBCSgs14AEJBCGgMIKE5WFSkACCss1IAEJhCGgsMJEZaESkIDCcg1IQAJhCCisMFFZqAQkoLBcAxKQQBgCCitMVBYqAQkoLNeABCQQhoDCChOVhUpAAgrLNSABCYQhoLDCRGWhEpCAwnINSEACYQgorDBRWagEJKCwXAMSkEAYAgorTFQWKgEJKCzXgAQkEIaAwgoTlYVKQAIKyzUgAQmEIaCwwkRloRKQgMJyDUhAAmEIKKwwUVmoBCSgsFwDEpBAGAIKK0xUFioBCSgs14AEJBCGgMIKE5WFSkACCss1IAEJhCGgsMJEZaESkIDCcg1IQAJhCCisMFFZqAQkoLBcAxKQQBgCCitMVBYqAQkoLNeABCQQhoDCChOVhUpAAgrLNSABCYQhoLDCRGWhEpCAwnINSEACYQgorDBRWagEJKCwXAMSkEAYAgorTFQWKgEJKCzXgAQkEIaAwgoTlYVKQAIKyzUgAQmEIaCwwkRloRKQgMJyDUhAAmEIKKwwUVmoBCSgsFwDEpBAGAIKK0xUFioBCSgs14AEJBCGgMIKE5WFSkACCss1IAEJhCGgsMJEZaESkIDCcg1IQAJhCCisMFFZqAQkoLBcAxKQQBgCCitMVBYqAQkoLNeABCQQhoDCChOVhUpAAgrLNSABCYQhoLDCRGWhEpCAwnINSEACYQgorDBRfV/ogwcPups3b3avXr3qPn/+XH44MjLSTZ06tVuwYEG3efPmbsaMGd896fHjx93ly5e7169fd1+/fu0mTZrUzZw5s1u7dm23cuXK8vx68fO7d+92169f796+fVv+efLkyd2cOXO6DRs2dIsXL/5tcs+fP++uXLlSav/06VP35cuXb681bdq0bsmSJaX+KVOmfPv3d+/edRcuXOhGR0e/9Tt9+vTy2I0bN5a++9ev9PrbjfjECSegsCYc+d95wzNnznRPnjzpli9f3q1bt67I5M6dO93Vq1fLB3r27Nndvn37ipC47t27150/f778bMWKFd3WrVuLNG7fvl3kxQd/165d5XW4eJ1r166V/0dQq1atKsJ4+PBhERt/37Zt2281gwR5beS3bNmyUs+HDx++CYkXRaA7duwor48wjx8/XkRLX3v37u1evnxZHs/zEDP/Nnfu3N/q9bea8En/CQGF9Z9g//M3/fjxY5lA+lMRr3ru3LkiLi6mFGTGB/3YsWMdUwoCO3DgQPmTyebIkSMdEw+vw+OZtphiTp48WaafefPmlccjMsRx9OjR8ifvvXPnziK6v3W9efOmvD51IqFa56lTp4oomQiRJDLjQrhVqosWLSqC5jV+pde/VbuvMzEEFNbEcJ6wd2Ey4j+uTZs2devXry9bx0uXLpVJas2aNWW64kJsTCl1S1bldPHixfKzvsR4PK9x48aNb70wHfEedfoZfDwiRHzv37/v2L7t2bOnCPBH1zBhURsC4jWYyA4ePFi2f30J83oItE5ev9JrnSgnLCDf6I8IKKw/wvf/ejITERPKixcvykTEFo8J6MSJE92jR4/KhMI2i20kUxIiYEvFY6tU+NCzdeQ1kMD+/fuLZJ49e1bkUy+eVwXCz9ii8v5MRjxn1qxZXX8yQpJsI8e6mJjYLiJWZLh79+7vpErd9MTPeb/79++XGjgLq7J8+vTpuHulTp7vFYeAwoqT1ZiV8qFlMmI7x4eXbRPbp7rtQ0BMJmyzOOs5e/ZsOVSv50echyEuDrCZyNiWIR0ez/OQHjJgi8mBNu/HATk/50Pfl83q1au7+fPnl+1pPTNDlIPb135D/TM2prEqk/5UVydGvnCgfh6HxNgWIjF6YfIab6/UhBi94hBQWHGy+lelTBhVCv0f8iHcsmVL+UAjHqYutltVWPwbEwqCQgxs8xAGf+eAnb9zRlaFxfkR4uDAmy0ZW0C2e30BMl1VqTGZ1alt8PB/GG4ExFTHeyJBpqiFCxeWh1IntXEhLKY0zt0QE2duPL4yWLp0aRHpeHvdvn17EZ5XHAIKK05WY1bKB5hzJ6Ym5IE0mLCYdPrCYsvHJMa3bJxvMVHVLeMwYTGFnD59usiE10MKCGNwiqE4ZFHPm/j7eA7mmdaYlthiIh/er3/LxKCwqAOh0heH7MiunsMNCutnvSqseItfYcXLbMyK+QAzcSAtphsmKM6eqmA402JiqdMSU9KhQ4fKxDRsS8jjOP+q38Jx1lUF2N8SUhTbMt6Lx3Pxcw7akcuwa1BW/cmqPr6/JWSby3PY5tZvKDnz4t4yrsEt4c96dUsYb/ErrHiZjVkx0kBA/QmIbw2RSL0Rkw98PQTvbxnZQvYP3ZEZj+XsCfGwTUNsTFEIsf+tHUVxlsR71bMqnlsnof5NoDy2HuLXyWqYrHhc/SazTmw8nkmKA3neh+mPrfHgoft4evXQPd7iV1jxMvtlYXFYXr/q58lIhA8rExUi40PP4fjgbQ31jZhcmGi4+rdI1G/yBgWEUPi2kMdycQjfv8m0fyMoNfAz3mPYNbjNZGpDqtTK9vDw4cPlPGvYbQ3j6dXbGmJ9ABRWrLxKtUxRTBpMRIPXsJs+maLqzZR8sJlO2OLxOvXWgx/dOFpvU2Br2L9ton8+1T9wr9/w8SdnXQhnUEqcOd26dauUziE6Z0k/uvo18pgf3Uc27MbR8fQaMP7UJSusgPFXASEKvuVigkEQnE2xJeOcCdEgpnqj5rBfzeGx/GoOW7c/+dWc/jkTtz3w7R1Xvf2A6Y1vHJnquMO+npn17wsbK4Yf/WoOXx7UXn/2qzlj9RpwCaQtWWEFjB4BcF7E2Q0fWKYQLiYZtkxs1RDHn/xC8Hh/+bkvpcEzrf4NntTHGRhi4dCes7CfXfW+Kx7nLz//jFaOnyusHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJogoLCaiNEmJJCDgMLKkbNdSqAJAgqriRhtQgI5CCisHDnbpQSaIKCwmojRJiSQg4DCypGzXUqgCQIKq4kYbUICOQgorBw526UEmiCgsJqI0SYkkIOAwsqRs11KoAkCCquJGG1CAjkIKKwcOdulBJog8A+kh0hJDTWWPwAAAABJRU5ErkJggg==" style="width: 300px; height: 200px;">
	              	<div class="caption">
	                	<h3 style="text-align:center;">
	                		<a href="<?php echo base_url('admin/data/index/'.$project->id);?>">
	                			<?php echo $project->name;?>
	                		</a>
	                	</h3>
	              	</div>
	            </div>
        	</li>
	        <?php endforeach;endif;?>
	        <li class="span4">
        		<a href="<?php echo base_url('admin/project/edit');?>">
          			<img src="<?php echo base_url('images/plus.png');?>" alt="新建">
          		</a>
        	</li>
        </ul>
    </div>
</div>

<script type="text/javascript">
	function del(url, obj){
		event.preventDefault();
		if(confirm('确认删除？')){
			$.post(url, function(data){
				if(data.status == 'ok'){
					alert('删除成功');
					$(obj).parent().parent().parent().parent().parent().remove();
				}else{
					alert('删除失败');
				}
			}, 'json');
		}
	}
</script>