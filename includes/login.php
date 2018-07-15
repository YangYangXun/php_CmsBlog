<?php include "db.php"; ?>
<?php session_start() ?> 
 <!-- tell server to prepare session -->


<?php 


if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
   
    // $username mysqli_real_escape_string();
    // $password


    $query = "select * from users where user_name = '{$username}' ";
    $query .= "AND user_password = '{$password}' ";

    $select_user_query = mysqli_query($connection,$query);
    if(!$select_user_query){
        die("Query failed -> ". mysqli_error($connection));
    }


    $row = mysqli_fetch_assoc($select_user_query);
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $role = $_POST['user_role'];
 


    if($username == $user_name && $password == $user_password){
        $_SESSION['username'] = $user_name;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['role'] = $user_role;
        header("Location: ../admin");
       
    }else{
        header("Location: ../index.php");
        
    }


    







   


}



?>