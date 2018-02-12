<?php
require('php_include/header_admin.php');

$rowcount = 1;
$start=0;
$limit=10;
$id=1;

if(isset($_GET['id'])) {
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}

$query3 = mysqli_query($conn, "SELECT * FROM ".$prefix."images ORDER BY `img_views` DESC LIMIT 0 , 1");
	while ($row3 = mysqli_fetch_array($query3)) {
	$highest = $row3['img_views'];
	}

//echo "test";
//echo $user_name;
//echo $user_level;

//=============================
//===Actions===================
//=============================
if (isset($_GET['action'])) {

	echo"<table class='table' width='100%'>
		<tr class='table_header'>
			<td>Action</td>
		</tr>
		<tr class='row1'>
			<td>Your Image is: ".$_GET['action']."</td>
		</tr>
	</table>
	<br>";

	if ($_GET['action']=="deactivate") {
 		mysqli_query($conn, "UPDATE ".$prefix."images SET img_active=0 WHERE img_id=".$_GET['imgid']);
	}

	if ($_GET['action']=="activate") {
 		mysqli_query($conn, "UPDATE ".$prefix."images SET img_active=1 WHERE img_id=".$_GET['imgid']);
	}
}
//=============================
//===End Actions===============
//=============================

?>
<table class='table' width='100%' class='table'>
		<tr class='table_header'>
			<td colspan='7'>
				Images
			</td>
		</tr>
		<tr class='row3' style="width:800px;" >
			<td>Thumbnail</td>
			<td>Directory</td>
			<td>Image Name</td>
            <td>Date Uploaded</td>
			<td>options</td>
		</tr>
<?php

$query1 = mysqli_query($conn, "select * FROM ".$prefix."images WHERE img_active=1 ORDER BY img_id LIMIT $start, $limit");
while ($row1 = mysqli_fetch_array($query1)) {
	$imgid = $row1['img_id'];
	$imgname = $row1['img_name'];		
	$imgfilename = $row1['img_filename'];
	$imgdate = $row1['img_date'];
	$imguploader = $row1['img_uploader'];
	$imguploaderip = $row1['img_upl_ip'];
	$img_votes = $row1['img_votes'];
	$img_points = $row1['img_points'];
	$imgviews = $row1['img_views'];
    $dir = $row1['uploaded_dir'];
	if ($img_votes == 0) {
		$img_average = "n.a.";
	} else {
		$img_average = $img_points / $img_votes;
		$img_average = round($img_average, 2);
	}

    ?>
    
    <tr class='row$rowcount'>
        <td><a target='_blank' href='<?php echo "$dir"."$imgfilename"?>'><img style="width:250px; height:250px;" src='<?php echo "$dir"."$imgfilename"?>'></a></td>
        <td><?php echo $dir ?></td>
			<td><?php echo $imgfilename ?><br></td>
			<td><?php echo $imgdate ?></td>
			<td width='40'>
				<a href='image_edit.php?imgid=<?php echo $imgid ?>'><span class="glyphicon glyphicon-edit" title="Edit"></span></a>
				
				<a href='image_delete.php?imgid=<?php echo $imgid ?>'><span class="glyphicon glyphicon-trash" title="Delete"></span></a>
				
               <a href='index.php?imgid=<?php echo $imgid ?>&action=deactivate'><span class="glyphicon glyphicon-remove"></span></a>
                
		</tr>
		<?php

		$rowcount = $rowcount + 1;
		if ($rowcount == 3) {
			$rowcount = 1;
		}


}

//Pagination
echo "<tr class='row$rowcount'><td colspan='7'>";
$rows=mysqli_num_rows(mysqli_query($conn, "select * FROM ".$prefix."images"));
$total=ceil($rows/$limit);

if($id>1) {
	echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a> - ";
}
if($id!=$total) {
	echo "<a href='?id=".($id+1)."' class='button'>NEXT</a> - ";
}

for($i=1;$i<=$total;$i++) {
	if($i==$id) {
		 echo $i." ";
	} else {
		echo "<a href='?id=".$i."'>".$i."</a> ";
	}
}
echo "</td></tr>";
//End Pagination




	echo "</table><br>";






//echo "</table>";



//require('include/footer.php');
?>