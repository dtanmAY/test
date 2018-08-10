<?php
require('folderextn/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>QusnAns_Site</title>
</head>
<?php
    require('folderextn/bootstrap.php');
?>
<body>
    <div class="container">
        <div class="row">
          <?php
            $query=mysqli_query($con, "SELECT * FROM questiontable");
            while ($a=mysqli_fetch_array($query)) {
           ?>
            <div class="col-sm-3 col-xs-6">
              <a href="post.php?id=<?php echo $a['id']; ?> ">
                <div class="post_box">
                  <div class="image">
                    <?php
                      if(isset($a['img'])) {
                        echo '<img src="uploads/" '.$a['img']. '">';
                      }else {
                        echo '<img src="images/bike.jpg">';
                      }

                     ?>
                  </div>
                  <?php
                     echo"<h2>" .$a['category']. "</h2>";
                   ?>
                </div>
                </a>
            </div>
            <?php
          }
             ?>
        </div>
    </div>
</body>
</html>
