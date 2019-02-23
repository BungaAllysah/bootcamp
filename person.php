<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['id'])) {
	header("Location: http://localhost/bootcamp1/login.php");
}
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "hapus") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM `person` WHERE `person`.`id` = '$id'";
		if ($conn->query($hapus)) {
			echo "<script>alert('Data Berhasil dihapus');
				window.location = 'http://localhost/bootcamp1/person.php'</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus');
				window.location = 'http://localhost/bootcamp1/person.php'</script>";
		}
	}
}

$query =  "SELECT *, `regions`.`id` AS `id_region`, `person`.`id` AS `id_person`, `users`.`id` AS `id_user`,
	`regions`.`name` AS `nama_region`, `users`. `email` AS `nama_user`, `person`.`name` AS `nama_person`
	FROM `person` AS `person`
	LEFT JOIN `regions` AS `regions` ON `person`.`region_id` = `regions`.`id`
	LEFT JOIN `users` AS `users` ON `person`.`created_by` = `users`.`id`";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<center>
	<h1>Data Daerah</h1>
	<table border="1">
		<tr>
			<th>id</th>
			<th>Nama</th>
			<th>Region ID</th>
			<th>Address</th>
			<th>Income</th>
			<th>Created At</th>
			<th>Created By</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php while ($row = $result->fetch_assoc()) {?>
		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['nama_person'] ?></td>
			<td><?php echo $row['nama_region'] ?></td>
			<td><?php echo $row['address'] ?></td>
			<td><?php echo $row['income'] ?></td>
			<td><?php echo $row['created_at'] ?></td>
			<td><?php echo $row['nama_user'] ?></td>
			<td><a href="http://localhost/bootcamp1/edit.php/?id=<?php echo $row['id_person'] ?>&&aksi=edit&&eksekusi=person">Edit</a></td>
			<td><a href="http://localhost/bootcamp1/person.php/?id=<?php echo $row['id_person'] ?>&&aksi=hapus">Hapus</a></td>

		</tr>
		<?php } ?>
	</table>

	<a href="http://localhost/bootcamp1/region.php">Data Region</a>
	<a href="http://localhost/bootcamp1/user.php">Data User</a>
	<a href="http://localhost/bootcamp1/index.php">Home</a>
</center>

</body>
</html>