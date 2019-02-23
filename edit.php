<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['id'])) {
	header("Location: htpp://localhost/login.php");
}

if(isset($_GET['id'])){
	$aksi = $_GET['aksi'];
	$id = $_GET['id'];
	$eksekusi = $_GET['eksekusi'];
	if ($_GET['aksi'] == 'edit') {
	
		if ($_GET['eksekusi'] == 'person') {
			$person = "SELECT *, `person`.`name` AS `nama_person` ,`person`.`region.id` AS `region_id` FROM `person` WHERE `person`.'id' = '$id'";
			$data_person = $conn->query($person);
			while ($person_row = $data_person->fetch_assoc()) {
				$region_ig = $person_row['region_id'];
			}
		}
	}
}

$region = "SELECT *, `regions`.`name` AS `nama_region` FROM `regions`";
$result_region = $conn->query($region);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Person</title>
</head>
<body>

<center>
	<h1><?php echo $aksi." ".$eksekusi; ?></h1>

	<?php if ($eksekusi == 'person') { ?>
	<form method="post">
		<div class="form-group">
			<div class="col-12">
				<label>Name</label>
			</div>
			<div class="col-12">
				<input type="text" name="name" value="<?php echo $row['nama_person']; ?>">	
			</div>
		</div>

		<div class="form-group">
			<div class="col-12">
				<label>Region</label>
			</div>
			<div class="col-12">
				<select name="region">
					<?php while ($row = $result_region->fetch_assoc()) { ?>
						<option value="<?php echo $row['id']; ?>" <?php if ($region_ig) {echo "selected";} ?>><?php echo $row['nama_region']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-12">
				<label>Address</label>
			</div>
			<div class="col-12">
				<input type="text" name="name" value="<?php echo $row['address']; ?>">	
			</div>
		</div>

		<div class="form-group">
			<div class="col-12">
				<label>Income</label>
			</div>
			<div class="col-12">
				<input type="text" name="name" value="<?php echo $row['income']; ?>">	
			</div>
		</div>

		<div class="form-group">
			<div class="col-12">
				<label>Created At</label>
			</div>
			<div class="col-12">
				<input type="text" name="name" value="<?php echo $row['created_at']; ?>">	
			</div>
		</div>

		<div class="form-group">
			<div class="col-12">
				<label>Created By</label>
			</div>
			<div class="col-12">
				<input type="text" name="name" value="<?php echo $row['created_by']; ?>">	
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="submit">
		</div>
	</form>
	<?php } ?>
</center>

</body>
</html>