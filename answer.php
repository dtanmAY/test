<?php
require('folderextn/dbconnect.php');

  $id=$_GET['id'];
  $query=mysqli_query($con, "SELECT * FROM questiontable WHERE id='$id'");
  $a=mysqli_fetch_array($query);

  if (isset($_POST['submit'])) {
    $answer=$_POST['answer'];
    $query1=mysqli_query($con, "INSERT INTO answertable(question_id, answer) VALUES('$id', '$answer')");
    if ($query1) {
      echo "inserted";
    }else {
      echo "not inserted";
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Answer_Page</title>
    <?php
      require('folderextn/bootstrap.php');
      ?>
  </head>
  <style media="screen">
  *{
    margin: 0px;
    padding: 0px;
  }
  .container{
    width: 800px;
    background-color: #eeee;
    text-transform: uppercase;
  }

  </style>
  <body>
    <div class="container">
      <form class="" action="" method="post">
        <?php
          echo "<h3>" .$a['question']. "</h3>";
         ?>
        <textarea id="myeditor" name="answer" rows="20" placeholder="Enter Your Answer" required="true"></textarea><br>
        <button type="submit" class="btn btn-success lg-block" name="submit">submit</button>
      </form>

    </div>

     <script type="text/javascript">
      CKEDITOR.replace('myeditor');
    </script>

  </body>
</html>
