<?php
require('folderextn/dbconnect.php');

$id = $_GET['id'];
$query1=mysqli_query($con, "SELECT * FROM questiontable WHERE id='$id'");
$a=mysqli_fetch_array($query1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>answered</title>
  </head>
  <?php
    require('folderextn/bootstrap.php');
   ?>

  <body>
    <div class="container-fluid global">
      <div id="question_frame">
          <?php
          echo "<h3>" .$a['question']. "</h3>";
           ?>
      </div>
      <div class="answer_frame">
        <?php
        $query2=mysqli_query($con, "SELECT * FROM answertable WHERE question_id='$id'");
        while ($a1=mysqli_fetch_array($query2)) {
          echo "<h5>" .$a1['answer']. "</h5>";
        }
        ?>
      </div>
    </div>
  </body>
</html>
