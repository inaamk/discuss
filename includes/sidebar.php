<?php
$aAdm  = array();
$aCat  = array();

/// Categories Code Starts ///
if(isset($_REQUEST['adm'])&&is_array($_REQUEST['adm'])){
	foreach($_REQUEST['adm'] as $sKey=>$sVal){
		if((int)$sVal!=0){
			$aAdm[(int)$sVal] = (int)$sVal;
		}
	}
}
/// Categories Code Ends ///


/// Categories Code Starts ///
if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
	foreach($_REQUEST['cat'] as $sKey=>$sVal){
		if((int)$sVal!=0){
			$aCat[(int)$sVal] = (int)$sVal;
		}
	}
}
/// Categories Code Ends ///
?>

<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->
	<div class="panel-heading"><!-- panel-heading Starts -->
		<h3 class="panel-title"><!-- panel-title Starts -->
			Admins
			<div class="pull-right"><!-- pull-right Starts -->
				<a href="#" style="color:black;">
					<span class="nav-toggle hide-show">
						Hide
					</span>
				</a>
			</div><!-- pull-right Ends -->
		</h3><!-- panel-title Ends -->
	</div><!-- panel-heading Ends -->
	<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->
		<div class="panel-body"><!-- panel-body Starts -->
			<div class="input-group"><!-- input-group Starts -->
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-adm" placeholder="Filter Admins">
				<a class="input-group-addon"> <i class="fa fa-search"> </i> </a>
			</div><!-- input-group Ends -->
		</div><!-- panel-body Ends -->
		<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-adm"><!-- nav nav-pills nav-stacked category-menu Starts -->
				<?php
					$get_user_art = "select art_id , u_id from articles GROUP BY u_id";
					$run_user_art = mysqli_query($con,$get_user_art);
					while($row_user_art = mysqli_fetch_array($run_user_art)){
						$u_id = $row_user_art['u_id'];
						$get_user = "select * from user where u_id=$u_id";
						$run_user = mysqli_query($con,$get_user);
						while($row_user = mysqli_fetch_array($run_user)){
							$u_id = $row_user['u_id'];
							$u_name = $row_user['u_name'];
							echo "
								<li class='checkbox checkbox-primary'>
									<a>
										<label>
											<input ";
											if(isset($aAdm[$u_id])){ echo "checked='checked'"; }
											echo " type='checkbox' value='$u_id' name='adm' class='get_adm' id='adm'> 
											<span>
											$u_name
											</span>
										</label>
									</a>
								</li>
							";
						}
					}
				?>
			</ul><!-- nav nav-pills nav-stacked category-menu Ends -->
		</div><!-- panel-body scroll-menu Ends -->
	</div><!-- panel-collapse collapse-data Ends -->
</div><!--- panel panel-default sidebar-menu Ends -->

<div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->
	<div class="panel-heading"><!-- panel-heading Starts -->
		<h3 class="panel-title"><!-- panel-title Starts -->
			Categories
			<div class="pull-right"><!-- pull-right Starts -->
				<a href="#" style="color:black;">
					<span class="nav-toggle hide-show">
						Hide
					</span>
				</a>
			</div><!-- pull-right Ends -->
		</h3><!-- panel-title Ends -->
	</div><!-- panel-heading Ends -->
	<div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->
		<div class="panel-body"><!-- panel-body Starts -->
			<div class="input-group"><!-- input-group Starts -->
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">
				<a class="input-group-addon"> <i class="fa fa-search"> </i> </a>
			</div><!-- input-group Ends -->
		</div><!-- panel-body Ends -->
		<div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->
				<?php
					$get_cat = "select * from categories";
					$run_cat = mysqli_query($con,$get_cat);
					while($row_cat = mysqli_fetch_array($run_cat)){
						$cat_id = $row_cat['cat_id'];
						$cat_title = $row_cat['cat_title'];
						echo "
							<li class='checkbox checkbox-primary'>
								<a>
									<label>
										<input ";
										if(isset($aCat[$cat_id])){ echo "checked='checked'"; }
										echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'> 
										<span>
										$cat_title
										</span>
									</label>
								</a>
							</li>
						";
					}
				?>
			</ul><!-- nav nav-pills nav-stacked category-menu Ends -->
		</div><!-- panel-body scroll-menu Ends -->
	</div><!-- panel-collapse collapse-data Ends -->
</div><!--- panel panel-default sidebar-menu Ends -->