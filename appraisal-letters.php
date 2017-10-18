<?php include('header.php');
$msg = $accept_appraisal = $accept_disclose = $accept_competition = $accept_sal_annexure = "";
$rowid=$_GET['id'];
if(isset($_GET['msg']))
$msg = $_GET['msg'];
?>

<div class="left_move">
<span class="title">HR View</span></div>

<div class="fright">
<div class="rightsection">
<ul>
<li><a href="javascript:void(0)" onclick="golink('appraisalhome.php?id=<?php echo $id;?>')"><img src="images/home.jpg" title="New Appraisal" width="64" height="58" /></a>
</li>
<?php
$manager_check="SELECT * FROM user_directory WHERE  empid='$id' AND (grade='M1' OR grade='M2' OR grade='M3' OR grade='M4' OR grade='S1' OR grade='S2' OR grade='S3' OR grade='S4')";
$res_check=mysql_query($manager_check);
$num_rows_check=mysql_num_rows($res_check); ?>
</ul>
</div>
</div>

<div class="custombody"></div>
<?php
$emp_id = "";
//$asso_check="SELECT * FROM user_directory WHERE empid='$id' AND (grade='E0' OR grade='E1' OR grade='E2' OR grade='E1C' OR grade='E2C' OR grade='E0C' OR grade='E0S')";
//$resass_check=mysql_query($asso_check);
//$numass_rows_check=mysql_num_rows($resass_check);
$show_inf2 = mysql_query("SELECT empid, accept_appraisal, accept_disclose, accept_competition, accept_sal_annexure FROM pms_associate_data where id='$rowid'");
$data = mysql_fetch_array($show_inf2);
$emp_id = $data['empid'];
$accept_appraisal = $data['accept_appraisal'];
$accept_disclose = $data['accept_disclose'];
$accept_competition = $data['accept_competition'];
$accept_sal_annexure = $data['accept_sal_annexure'];
?>
<div class="wrapper">
<?php if($msg!="") { echo '<span style="color:green; text-align:center;">'. $msg.'</span>'; }?>
<div class="maintop">
<div class="maintopinner">
<div class="newheading5">
<span class="title">Appraisal Letters</span>
</div>
<div class="clearfix"></div>
<?php if($emp_id!="") { ?>
<div ng-app="myApp">
	<ul>
		<li>
		<a href="javascript:void(0)" <?php if($accept_appraisal==0){ ?>onclick="golink('applettter/AppraisalLetter.php?id=<?php echo $rowid;?>')" <?php } ?> target="_blank"><input type="button" name="databutton" value="Appraisal Letter"></a>
		</li>
		<li>
		<a href="javascript:void(0)" <?php if($accept_disclose==0){ ?> onclick="golink('applettter/nondisclosure.php?id=<?php echo $rowid;?>')" <?php } ?> target="_blank"><input type="button" name="databutton" value="Non Disclosure"></a>
		</li>
		<li>
		<a href="javascript:void(0)" <?php if($accept_competition==0){ ?> onclick="golink('applettter/nonCompetition.php?id=<?php echo $rowid;?>')" <?php } ?> target="_blank"><input type="button" name="databutton" value="Non Competition"></a>
		</li>
		<li>
		<a href="javascript:void(0)" <?php if($accept_sal_annexure==0){ ?> onclick="golink('salaryAnnexure_per.html?id=<?php echo $rowid;?>')" <?php } ?> target="_blank"><input type="button" name="databutton" value="Salary Annexure"></a>
		</li>
	</ul>
</div>
<?php } else { ?>
<div ng-app="myApp">User doesn't have permission</div>
<?php } ?>
 	</div>
	</div>


	<?php include('footer.php'); ?>
<?php echo "Hello, World!" ?>