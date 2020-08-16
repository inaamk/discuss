<?php
$db = mysqli_connect("localhost","root","","discuss");
function getArticles(){
	/// getProducts function Code Starts ///
	global $db;
	$aWhere = array();
	/// Manufacturers Code Starts ///
	if(isset($_REQUEST['adm'])&&is_array($_REQUEST['adm'])){
		foreach($_REQUEST['adm'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'u_id='.(int)$sVal;
			}
		}
	}
	/// Manufacturers Code Ends ///
	/// Categories Code Starts ///
	if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
		foreach($_REQUEST['cat'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'cat_id='.(int)$sVal;
			}
		}
	}
	/// Categories Code Ends ///
	$per_page=6;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page=1;
	}
	$start_from = ($page-1) * $per_page ;
	$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
	$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
	$get_articles = "select * from articles  ".$sWhere;
	$run_articles = mysqli_query($db,$get_articles);
	
	
	
	
	while($row_articles=mysqli_fetch_array($run_articles)){
		$art_id = $row_articles['art_id'];
		$art_title = $row_articles['art_title'];
		$art_text = nl2br($row_articles['art_text']);
		
		$u_id = $row_articles['u_id'];
		$art_image = $row_articles['art_image'];
		$art_time = $row_articles['art_time'];
		$art_link = $row_articles['art_link'];
		$cat_id = $row_articles['cat_id'];
		$like_id = $row_articles['like_id'];
		
		
		if(strlen($art_text)<1000){
			$string = $art_text;
		}
		if((1000<strlen($art_text)) && (strlen($art_text<5000))){
			$string = substr_replace($art_text, "... <a href='articles/details.php?art_id=$art_id'> Read More</a>", 2500);
		}
		if(strlen($art_text)>5000){
			$string = substr_replace($art_text, "... <a href='articles/details.php?art_id=$art_id'> Read More</a>", 4000);
		}
		
		
		$get_cat = "select * from categories where cat_id='$cat_id' ";
		$run_cat = mysqli_query($db,$get_cat);
		$row_cat = mysqli_fetch_array($run_cat);
		$cat_title = $row_cat['cat_title'];
		
		$get_admin = "select * from user where u_id='$u_id'";
		$run_admin = mysqli_query($db,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$u_name = $row_admin['u_name'];
		
		echo "
			
			<div class='art'>
				<center><h3><a href='articles/details.php?art_id=$art_id'> $art_title</a></h3></center>
				<h4>Author :$u_name</h4>
				<p>$art_time</p>
				<p> $cat_title </p>
				<img src='articles/article_images/$art_link.png' class='img-responsive' alt='$cat_title'>				
				<p oncopy='return false;' class='art-text'>$string</p>
				<hr>
			</div>
		";
	}
	/// getProducts function Code Ends ///
}
/// getPaginator Function Starts ///
function getPaginator(){
	/// getPaginator Function Code Starts ///
	$per_page = 6;
	global $db;
	$aWhere = array();
	$aPath = '';
	/// Manufacturers Code Starts ///
	if(isset($_REQUEST['adm'])&&is_array($_REQUEST['adm'])){
		foreach($_REQUEST['adm'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'u_id='.(int)$sVal;
				$aPath .= 'adm[]='.(int)$sVal.'&';
			}
		}
	}
	/// Manufacturers Code Ends ///
	/// Categories Code Starts ///
	if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
		foreach($_REQUEST['cat'] as $sKey=>$sVal){
			if((int)$sVal!=0){
				$aWhere[] = 'cat_id='.(int)$sVal;
				$aPath .= 'cat[]='.(int)$sVal.'&';
			}
		}
	}
	/// Categories Code Ends ///
	$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
	$query = "select * from articles ".$sWhere;
	$result = mysqli_query($db,$query);
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records / $per_page);
	echo "<li><a href='blog.php?page=1";
	if(!empty($aPath)){ 
		echo "&".$aPath;
	}
	echo "' >".'First Page'."</a></li>";
	for ($i=1; $i<=$total_pages; $i++){
		echo "<li><a href='blog.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";
	};
	echo "<li><a href='blog.php?page=$total_pages";
	if(!empty($aPath)){
		echo "&".$aPath;
	}
	echo "' >".'Last Page'."</a></li>";
	/// getPaginator Function Code Ends ///
}
/// getPaginator Function Ends ///
?>