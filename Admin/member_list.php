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

	if ($_GET['action']="deactivate") {
 		mysqli_query($conn, "UPDATE ".$prefix."images SET img_active=0 WHERE img_id=".$_GET['imgid']);
	}

	if ($_GET['action']="activate") {
 		mysqli_query($conn, "UPDATE ".$prefix."images SET img_active=1 WHERE img_id=".$_GET['imgid']);
	}
}
//=============================
//===End Actions===============
//=============================


?>

	<table class='table' width='100%' class='table'>
		<tr class='table_header'>
			<td colspan='5'>
				Members
			</td>
		</tr>
		<tr class='row3'>
		    <td>Name</td>
			<td>Username</td>
			<td>E-Mail</td>
			<td>IP</td>
			<td>Level</td>
			<td>options</td>
		</tr>

<?php
        
$query1 = mysqli_query($conn, "select * FROM ".$prefix."users ORDER BY id LIMIT $start, $limit");
while ($row1 = mysqli_fetch_array($query1)) {
	$id = $row1['id'];
	$username = $row1['username'];
	$email = $row1['email'];
	$ip = $row1['ip'];
	$user_level = $row1['user_level'];
    $first_name = $row1['first_name'];
    $last_name = $row1['last_name'];
	if ($user_level == 1) { $user_level="Member";}
	if ($user_level == 9) { $user_level="Admin";}
?>
<style>
    a:hover .member_edit
        {
        color:#9b9ba1;
        }
    a:hover .member_delete
        {
        color:red;
        }
</style>
<tr class='row3 <?php echo $rowcount; ?>'>
            <td><?php echo "$first_name "." $last_name";?></td>
			<td><?php echo $username; ?></td>
			<td><?php echo $email; ?></td>
			<td><a target='_blank' href='http://whois.domaintools.com/$ip'><?php echo $ip; ?></a></td>
			<td><?php echo $user_level; ?></td>
			<td width='40'>
                <a href='member_edit.php?member_id=$id'><span title="Edit" class="glyphicon glyphicon-edit member_edit"></span></a>
                <a href='member_delete.php?member_id=<?php echo $id;?>'><span title="Delete" class="glyphicon glyphicon-trash member_delete"></span></a>
			</td>
		</tr>
<?php
		$rowcount = $rowcount + 1;
		if ($rowcount == 3) {
			$rowcount = 1;
		}

}


//Pagination
echo "<tr class='row$rowcount'><td colspan='7'>";
$rows=mysqli_num_rows(mysqli_query($conn, "select * FROM ".$prefix."users"));
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



require('include/footer.php');
?>