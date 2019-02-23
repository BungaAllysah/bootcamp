<?php
session_start();
require_once 'conn.php';
if(isset($_SESSION["id"])) {
	$query="SELECT *, `regions`.`id` AS `id_region`, `person`.`id` AS `id_person`, `users`.`id` AS `id_user`,
	`regions`.`name` AS `nama_region`, `person`. `name` AS `nama_person`
FROM `person` AS `person`
LEFT JOIN `regions` AS `regions` ON `person`.`region_id` = `regions`.`id`
LEFT JOIN `users` AS `users` ON `person`.`created_by` = `users`.`id`";
$result=$conn->query($query);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body>

<center>
	<h1>Data Daerah</h1>
	<table border="1">
		<tr>
			<th>id</th>
			<th>Nama Daerah</th>
			<th>Jumlah Penduduk</th>
			<th>Total Pendapatan</th>
			<th>Rata-rata Pendapatan</th>
			<th>Status</th>
		</tr>
		<?php while ($row = $result->fetch_assoc()) {?>
		<tr>
			<td><?php echo $row['id_region'] ?></td>
			<td><?php echo $row['nama_region'] ?></td>
			<td><?php echo $row['nama_region'] ?></td>
			<td><?php echo $row['nama_region'] ?></td>
			<td><?php echo $row['nama_region'] ?></td>
			<td><?php echo $row['nama_region'] ?></td>
		</tr>
		<?php } ?>
	</table>

	<a href="http://localhost/bootcamp1/region.php">Data Region</a>
	<a href="http://localhost/bootcamp1/user.php">Data User</a>
</center>

</body>
</html>