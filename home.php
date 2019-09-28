<?php
require 'db_connect.php';
require 'actions/a_add.php';
ob_start();
session_start();
// if session is not set this will redirect to login page
if(!isset($_SESSION['user_id'])) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res = mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['user_id']."");
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Welcome - <?php echo $_SESSION['username'];?></title>
</head>
<body >
        <div class="card-header bg-info text-white d-flex"> 
           <h4>Welcome <?php echo $_SESSION['username'];?>!</h4>
           <a  href="logout.php?logout" class="text-white ml-auto">Sign Out</a>
        </div>
        <?php
        echo "<div class='container mx-auto text-center'>     
                <figure class='figure'>
                    <img src=".$userRow['image']." class='figure-img img-fluid rounded' alt='...' width='304' height='228'>
                    <figcaption class='figure-caption text-xl'>".$_SESSION['username']."</figcaption>
                </figure>
              </div>"
        ?>

           <div class=row>
    <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          // get result rows as an associative array
            while($lib = $result->fetch_assoc()) {
                // if loggedin user tries to add him/herself than return nothing
                if ($lib['user_id'] === $_SESSION['user_id']) {
                    continue;
                }
                echo "<div class='col-md-3 card'>
                          <img src=".$lib['image']." width='400px' height='366px' alt='...'>
                          <div class='card-body'>
                            <h5 class='card-title text-center display-6'>".$lib['name']."</h5>                          
                          </div>                                           
                            <div class='card-body text-center'>
                              <form action='' method='post'>
                                <input type='hidden' name='id' value=".$lib['user_id']." />
                                <button type='submit'>add as friend</button>
                              </form>
                            </div>
                        </div>";
              }
        } else {
            echo "<tr>
                  <td colspan='5'>
                    <center>No Data Available</center>
                  </td>
                </tr>";
          }   
    ?>
    </div>       
</body>
</html>
<?php ob_end_flush(); ?>