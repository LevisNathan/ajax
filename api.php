<?php



function getDatabaseConnection() {
 mysql://b8677ab705078a:70af7eb4@us-cdbr-iron-east-05.cleardb.net/heroku_2201c4dbaea3547?reconnect=true
    return $dbConn; 
      $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b8677ab705078a";
    $password = "70af7eb4";
    $dbname = "heroku_2201c4dbaea3547"; 
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn; 
}



function getUsersThatMatchUserName() {
    
    $username = $_GET['username']; 

    
     $dbConn = getDatabaseConnection(); 

     $sql = "SELECT * from User WHERE username='$username'"; 
     
     $statement = $dbConn->prepare($sql); 
    
     $statement->execute(); 
     $records = $statement->fetchAll(); 
     echo json_encode($records); 
}

function validatePassword() {
    $username = $_GET['username']; 
    $password = $_GET['password'];
    
    //database logic to confirm that the password matches the stored password in the DB
    
    echo sha1($password); 
}

if ($_GET['action'] == 'validate-username' ) {
    getUsersThatMatchUserName(); 
} else if ($_GET['action'] == 'validate-password') {
    
}
 

?>
