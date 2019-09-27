<?php
session_start();
if ($_POST) {
   $friend_id = $_POST['id'];
   $loggedInUserId = $_SESSION['user_id'];
   $sessionUsername = $_SESSION['username'];

   //get friend
   $friendQuery = "
   SELECT name
   FROM users
   WHERE user_id = ".$friend_id."
   ";
   $friendResult = $conn->query($friendQuery);
   $rowFriendName=mysqli_fetch_array($friendResult, MYSQLI_ASSOC);

   // get duplicate
   $duplicateQuery = "
   SELECT name
   FROM friendships
   INNER JOIN users
   ON fk_user_id = user_id
   WHERE fk_friend_id = ".$friend_id."
   ";
   $duplicateResult = $conn->query($duplicateQuery);
   if (mysqli_num_rows($duplicateResult) === 0) {
        $insertsql = "
        INSERT INTO friendships (fk_user_id, fk_friend_id)
        VALUES('$loggedInUserId', '$friend_id')
        ";
        if ($conn->query($insertsql)) {
            echo $sessionUsername." is now friends with ".$rowFriendName['name'];
        } else {
            echo "Error: ".$conn->error;
        }
   }
   else {
       echo "Duplicate!!!";
   }
}
?>