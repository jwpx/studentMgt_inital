<?php
include "db_conn.php";
$StudentID = $_GET["id"];
$sql = "DELETE FROM `student` WHERE StudentID = '$StudentID'";
$result = mysqli_query($con, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($con);
}
