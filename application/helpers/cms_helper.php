<?php
function btn_edit($uri){
	return anchor($uri, '<i class="icon-edit"></i>&nbsp;编辑');
}

function btn_delete($uri){
	return anchor($uri, '<i class="icon-remove"></i>&nbsp;删除', array('onclick' => "javascript:del(this.href, this)"));
}

function e($string){
	return htmlentities($string);
}

function get_excerpt($article, $numwords = 50){
	$str = '';
	$url = article_link($article);
	$str .= '<h2>'.anchor($url, e($article->title)).'</h2>';
	$str .= '<em>'.$article->pubdate.'</em>';
	$arr = explode(' ', $article->body, $numwords);
	// array_pop($arr);
	$excer = strip_tags(implode(' ', $arr));
	$str .= '<p>'.$excer.'</p>';

	return $str;
}

function article_link($article){
	return site_url('article/'.intval($article->id).'/'.e($article->slug));
}

function article_links($articles){
	$str = '<ul class="nav nav-pills nav-stacked">';
	foreach ($articles as $article) {
		$url = article_link($article);
		$str .= '<li><a href="'.$url.'">'.e($article->title).' <i class=" icon-chevron-right"></i></a></li>';
	}
	$str .= '</ul>';

	return $str;
}

function add_meta_title($str){
	$CI =& get_instance();
	$CI->data['meta_title'] = e($str).'-'.$CI->data['meta_title'];
}

function get_menus($array, $child = FALSE){
	$CI =& get_instance();

	$str = '';
	
	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="nav">' : '<ul class="dropdown-menu">';
		
		foreach ($array as $item) {
			$active = $CI->uri->segment(1) == $item['slug'] ? 'active' : '';
			
			// Do we have any children?
			if (isset($item['children']) && count($item['children'])) {
				$str .= '<li class="dropdown">';
				$str .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.e($item['title']).'<b class="caret"></b></a>';
				$str .= get_menus($item['children'], TRUE);
			}else{
				$str .= '<li class="'.$active.'"><a href="'.site_url($item['slug']).'">'.e($item['title']).'</a>';
			}
			
			$str .= '</li>' . PHP_EOL;
		}
		
		$str .= '</ul>' . PHP_EOL;
	}
	
	return $str;
}

// Search something
function cms_search($s){
	$CI =& get_instance();

	if(!$s){
		return FALSE;
	}else{
		$CI->db->select('id, title, slug');
		$CI->db->like('title', $s, 'before');
		$CI->db->or_like('body', $s);
		return $CI->db->get('articles')->result();
	}
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicely formatted manner.
 */
if(!function_exists('dump')){
	function dump($var, $label = 'Dump', $echo = TRUE){
		//Store dump in variable
		ob_start();
		var_dump($var);
		$output = ob_get_clean();

		//Add formatting
		$output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
		$output = '<pre style="background: #FFFEEF; color: #000;border: 1px dotted #000;padding: 10px; margin: 10px 0;text-align: left;">'.$label.'=>'.$output.'</pre>';

		//Output
		if($echo == TRUE){
			echo $output;
		}else{
			return $output;
		}
	}
}

if(!function_exists('dump_exit')){
	function dump_exit($var, $label = 'Dump', $echo = TRUE){
		dump($var, $label, $echo);
		exit;
	}
}