<?php

if(isset($_POST['create_user'])){


      $user_firstname = $_POST['first_name'];
      $user_lastname = $_POST['last_name'];
      $user_role = $_POST['user_role'];
      $user_name = $_POST['user_name'];
      $user_email = $_POST['email'];
      $user_password = $_POST['password'];

      // $post_image = $_FILES['image']['name'];
      // $post_image_temp = $_FILES['image']['tmp_name'];
      // move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO users (user_name, user_firstname, user_lastname, user_email, user_role, user_password) ";
    $query .=  "VALUES('{$user_name}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}', '{$user_password}')";


    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);
    header("Location: users.php");

    
}

?>

 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Users
                        </h1>


              <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="">FirstName</label>
                  <input type="text" class="form-control" name="first_name">
                </div>
                <div class="form-group">
                  <label for="">LastName</label>
                  <input type="text" class="form-control" name="last_name">
                </div>
               
                <div class="form-group">
                      <label for="">User Role</label><br>
                        <select class="form-control" name="user_role"  style="width: 300px;">
                            <option value="Subscriber">Select option</option>
                            <option value="Admin">Admin</option>
                            <option value="Subscriber">Subscriber</option>
                        </select> 
                 </div>
            
                <div class="form-group">
                  <label for="">UserName</label>
                  <input type="text" class="form-control" name="user_name">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <!-- <div class="form-group">
                  <label for="">Post Image</label>
                  <input type="file" name="image">
                </div> -->
                <div class="form-group">
                  <label for="">PassWord</label>
                  <input type="text" class="form-control" name="password">
                </div>
             

                <input class="btn-primary" type="submit" value="Submit" name="create_user">
              </form>




