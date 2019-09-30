<?php
session_start();
if ($_POST) {
   $friend_id = $_POST['id'];
   $loggedInUserId = $_SESSION['user_id'];
   $sessionUsername = $_SESSION['username'];
                                 //------------------ QUERY--------------------
//get name of clicked friend
   $friendQuery = "
   SELECT name
   FROM users
   WHERE user_id = ".$friend_id."
   ";
   $friendResult = $conn->query($friendQuery);
//put result (a single name) in array
   $rowFriendName=mysqli_fetch_array($friendResult, MYSQLI_ASSOC);
                                
                                //------------------ QUERY--------------------
   //    check whether current friendship already exists. result is either nothing or contains one friendship eg. vildan-6
   $duplicateQuery = "
   SELECT name, fk_friend_id
   FROM users
   INNER JOIN friendships
   ON fk_user_id = user_id
   WHERE fk_friend_id = ".$friend_id." AND user_id = ".$loggedInUserId."
   ";
//    if result of friendship equals 0/ if friendship is not existent -> insert friendship into db
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