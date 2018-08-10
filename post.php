<?php
require('folderextn/dbconnect.php');

if (isset($_POST['submit'])) {
  $question=$_POST['question'];
  $query=mysqli_query($con, "INSERT INTO questiontable(question) VALUES('$question')");
  if($query){
    // echo "inserted";
  }else {
    echo "<script>alert('Error Occured');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>question</title>
  </head>
  <?php
    require('folderextn/bootstrap.php');
   ?>
   <style media="screen">
     *{
       margin: 0px;
       padding: 0px;
     }
     .header{
       margin: 0 auto;
       width: 800px;
       height: auto;
       text-align: center;
       background-color: lightgreen;
     }
     .inner_body{
       margin: 0 auto;
       text-align: center;
       width: 800px;
       height: auto;
       background-color: #eeee;
     }

   </style>
  <body class="body">
  <div id="container-fluid global">
      <div class="header">
        <!-- <h2>Modal Example</h2> -->
        <!-- Trigger the modal with a button -->
        <form class="" action="" method="post">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ask question</button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control" name="question" placeholder="Enter Your Question">
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-success" name="submit">submit</button>
                </div>
              </div>

            </div>
          </div>
        </form>

      </div><br>

      <div class="inner_body">
        <?php
          $query=mysqli_query($con, "SELECT * FROM questiontable ORDER BY id DESC");
          while($a=mysqli_fetch_array($query)){
         ?>
          <div class="question_frame">
            <div id="frame">
              <a href="answered.php?id= <?php echo $a['id'] ?> " target="_blank"><?php  echo "<h3 style='color: #000'>" .$a['question']. "</h3>" ?> </a>
            </div>
            <a href="answer.php?id= <?php echo $a['id'] ?>" target="_blank">answer</a>
          </div>


         <?php
       }
          ?>
      </div>
    </div>

  </body>
</html>
