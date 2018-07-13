<?php

      if (isset($_GET['u_id'])) {

          $u_id = $_GET['u_id'];
          $query = "select * from users where user_id = {$u_id} ";
          $select_users_by_id = mysqli_query($connection, $query);
          confirmQuery($select_users_by_id);

          $row = mysqli_fetch_assoc($select_users_by_id);

          $first_name = $row['user_firstname'];
          $last_name = $row['user_lastname'];
          $user_role = $row['user_role'];
          $user_name = $row['user_name'];
          $email = $row['user_email'];
          $password = $row['user_password'];
        

      }



      if (isset($_POST['update_user'])) {
        
          $user_firstname = $_POST['first_name'];
          $user_lastname = $_POST['last_name'];
          $user_role = $_POST['user_role'];
          $user_name = $_POST['user_name'];
          $user_email = $_POST['email'];
          $user_password = $_POST['password'];


          $query = "update users set ";
          $query .= " user_firstname = '{$user_firstname}', ";
          $query .= " user_lastname = '{$user_lastname}', ";
          $query .= " user_role = '{$user_role}', ";
          $query .= " user_name = '{$user_name}', ";
          $query .= " user_email = '{$user_email}', ";
          $query .= " user_password = '{$user_password}' ";
          $query .= " WHERE user_id = {$u_id}; ";

          $update_user_query = mysqli_query($connection, $query);

          confirmQuery($update_user_query);

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
                  <input type="text" class="form-control" name="first_name" value="<?php echo $first_name ?>">
                </div>
                <div class="form-group">
                  <label for="">LastName</label>
                  <input type="text" class="form-control" name="last_name" value="<?php echo $last_name ?>">
                </div>

                <div class="form-group">
                      <label for="">User Role</label><br>
                        <select class="form-control" name="user_role"  style="width: 300px;">
                            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>

                            <?php

                                if($user_role == "Admin"){
                                  echo " <option value='Subscriber'>Subscriber</option>";
                                }else{
                                  echo " <option value='Admin'>Admin</option>";
                                }

                             ?>
                           
                        </select>
                 </div>

                <div class="form-group">
                  <label for="">UserName</label>
                  <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
                <!-- <div class="form-group">
                  <label for="">Post Image</label>
                  <input type="file" name="image">
                </div> -->
                <div class="form-group">
                  <label for="">PassWord</label>
                  <input type="text" class="form-control" name="password" value="<?php echo $password ?>">
                </div>


                <input class="btn-primary" type="submit" value="Submit" name="update_user">
              </form>
