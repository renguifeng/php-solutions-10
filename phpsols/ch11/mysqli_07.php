<?php
require_once('../includes/connection.inc.php');
// connect to MySQL
$conn = dbConnect('read');
// prepare the SQL query
$sql = 'SELECT * FROM images
        WHERE image_id > 6
		ORDER BY caption';
// submit the query and capture the result
$result = $conn->query($sql) or die(mysqli_error());
// find out how many records were retrieved
$numRows = $result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Connecting with MySQLi: Using WHERE</title>
</head>

<body>
<p>A total of <?php echo $numRows; ?> records were found.</p>
<table>
  <tr>
    <th>image_id</th>
    <th>filename</th>
    <th>caption</th>
  </tr>
<?php while ($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $row['image_id']; ?></td>
    <td><?php echo $row['filename']; ?></td>
    <td><?php echo $row['caption']; ?></td>
  </tr>
<?php } ?>
</table>
</body>
</html>