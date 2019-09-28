<?php
require 'db_connect.php';
session_start();
// if session is not set this will redirect to login page
if(!isset($_SESSION['user_id'])) {
 header("Location: index.php");
 exit;
}
    $loggedInUserId = $_SESSION['user_id'];
    $sessionUsername = $_SESSION['username'];
    
    $friendshipsQuery = "
    SELECT fk_friend_id
    FROM friendships
    INNER JOIN users
    ON fk_user_id = user_id
    WHERE name = '".$sessionUsername."'
   ";
   $friendshipsResult = $conn->query($friendshipsQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo "<div class='container text-center'>
        <figure class='figure'>
            <img src=".$_SESSION['image']." class='figure-img img-fluid rounded' alt='...' width='304' height='228'>
            <figcaption class='figure-caption'>".$_SESSION['username']."</figcaption>
        </figure>
      </div>
      <h3 class='ml-3'>Friends with:</h3> 
      <br>
      ";
?>
<div class='d-flex justify-content-around flex-wrap'>
  <?php while ($fk_friend_id = $friendshipsResult->fetch_assoc()) {
        $friendDataQuery = "SELECT name, image FROM users WHERE user_id = ".$fk_friend_id["fk_friend_id"]." ";
        $friendDataResult = $conn->query($friendDataQuery);
       
        $friendRow=mysqli_fetch_array($friendDataResult, MYSQLI_ASSOC);
        
        echo "
            <figure class='figure'>
                <img src=".$friendRow['image']." width='304' height='170'>
                <figcaption class='figure-caption'>".$friendRow['name']."</figcaption>
            </figure>
          ";
   }
  ?>
</div> 
</body>
</html>