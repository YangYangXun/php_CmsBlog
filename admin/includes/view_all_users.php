   <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>UserName</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Email</th>
                                    <th>Role</th>        
                                    <!-- <th>Date</th> -->
                                    <th>Change</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>


                            <?php 

                                $query = "select * from users; ";
                                $select_users = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_users)) {

                                    $user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                                    $user_role = $row['user_role'];
                                    
                                   
                                
                                    echo "<tr>";
                                    echo "<td>$user_id</td>";
                                    echo "<td>$user_name</td>";
                                    echo "<td>$user_firstname</td>";
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
                                    // echo "<td class='alert-primary'>$user_role</td>";

                                    if($user_role == "Admin"){
                                        echo "<td class='alert-warning'>$user_role</td>";
                                    }else{
                                        echo "<td class='alert-info'>$user_role</td>";
                                    }
                                    echo "<td><a href='users.php?change_to_Admin={$user_id}'>Admin</a></td>";
                                    echo "<td><a href='users.php?change_to_Sub={$user_id}'>Subscriber</a></td>";
                                    echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
                                    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                    echo " </tr>";

                                }

                             ?>


                            <?php

                                if (isset($_GET['change_to_Admin'])) {
                                    $the_user_id = $_GET['change_to_Admin'];
                                    $query = "update users set user_role = 'Admin' where user_id = $the_user_id ";
                                    $update_user_role_Admin = mysqli_query($connection, $query);
                                    confirmQuery($update_user_role_Admin);
                                    header("Location: users.php");
                                } 

                                if (isset($_GET['change_to_Sub'])) {
                                    $the_user_id = $_GET['change_to_Sub'];
                                    $query = "update users set user_role = 'Subscriber' where user_id = $the_user_id ";
                                    $update_user_role_Subscriber = mysqli_query($connection, $query);
                                    confirmQuery($update_user_role_Subscriber);
                                    header("Location: users.php");
                                } 

                                // for delete
                                if (isset($_GET['delete'])) {
                                    $delete_user_id = $_GET['delete'];
                                    $query = "delete from users where user_id = $delete_user_id ";
                                    $delete_query = mysqli_query($connection, $query);
                                    confirmQuery($delete_query);
                                    header("Location: users.php");
                                } 


                            ?>
                            
                            </tbody>
                        </table>