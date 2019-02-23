<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['id'])) {
	header("Location: http://localhost/bootcamp1/login.php");
}
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == "hapus") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM `users` WHERE `users`.`id` = '$id'";
		if ($conn->query($hapus)) {
			echo "<script>alert('Data Berhasil dihapus');
				window.location = 'http://localhost/bootcamp1/user.php'</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus');
				window.location = 'http://localhost/bootcamp1/user.php'</script>";
		}
	}
}

$query =  "SELECT * FROM `users`";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
</head>
<body>

<center>
	<h1>Data Person</h1>
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
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['created_at']; ?></td>
			<td><a href="http://localhost/bootcamp1/edit.php/?id=<?php echo $row['id'] ?>">Edit</a></td>
			<td><a href="http://localhost/bootcamp1/user.php/?id=<?php echo $row['id'] ?>&&aksi=hapus">Hapus</a></td>
		</tr>
		<?php } ?>
	</table>
	<a href="http://localhost/bootcamp1/index.php">Home</a>
	<a href="http://localhost/bootcamp1/person.php">Person</a>
	<a href="http://localhost/bootcamp1/region.php">Region</a>
</center>

</body>
</html>