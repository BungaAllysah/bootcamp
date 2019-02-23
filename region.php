<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['id'])) {
	header("Location: http://localhost/bootcamp1/login.php");
}
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "hapus") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM `regions` WHERE `regions`.`id` = '$id'";
		if ($conn->query($hapus)) {
			echo "<script>alert('Data Berhasil dihapus');
				window.location = 'http://localhost/bootcamp1/region.php'</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus');
				window.location = 'http://localhost/bootcamp1/region.php'</script>";
		}
	}
	if ($_GET['aksi'] == 'edit') {
		$id = $_GET['id'];
		$hapus = "DELETE FROM `regions` WHERE `regions`.`id` = '$id'";
		if ($conn->query($hapus)) {
			echo "<script>alert('Data Berhasil diedit');
				window.location = 'http://localhost/bootcamp1/region.php'</script>";
		}else{
			echo "<script>alert('Data Gagal diedit');
				window.location = 'http://localhost/bootcamp1/region.php'</script>";
		}
	}
}

$query =  "SELECT *, `regions`.`id` AS `id_region`, `user`.`id` AS `id_user`
FROM `regions`
LEFT JOIN `users` AS `user` ON `user`.`id` = `regions`.`created_by`";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Region</title>
</head>
<body>

<center>
	<h1>Data Region</h1>
	<table border="1">
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Created_at</th>
			<th>Created_by</th>
			<th colspan="2">Aksi</th>
		</tr>

		<?php while ($row = $result->fetch_array()) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['created_at']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><a href="http://localhost/bootcamp1/editRegion.php/?id=<?php echo $row['id_region'] ?>">Edit</a></td>
			<td><a href="http://localhost/bootcamp1/region.php/?id=<?php echo $row['id_region'] ?>&&aksi=hapus">Hapus</a></td>
		</tr>
		<?php } ?>
	</table>
	<a href="http://localhost/bootcamp1/index.php">Home</a>
	<a href="http://localhost/bootcamp1/user.php">Data User</a>
	<a href="http://localhost/bootcamp1/person.php">Data Person</a>
</center>

</body>
</html>