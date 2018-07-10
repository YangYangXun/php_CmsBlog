

<?php 

            if(isset($_GET['p_id'])){

                $p_id = $_GET['p_id'];
                $query = "select * from posts where post_id = {$p_id} ";
                $select_posts_by_id = mysqli_query($connection, $query);
                confirmQuery($select_posts_by_id);

                $row = mysqli_fetch_assoc($select_posts_by_id);
                
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $post_comment_count = 4;
                                        
            }




            if(isset($_POST['update_post'])){

                if (empty($post_image)) {
                    //確保post_image 不為空
                    echo "check post_image not empty";
                    $query = "select * from posts where post_id = {$p_id} ";
                    $select_posts_image_id = mysqli_query($connection, $query);
                    confirmQuery($select_posts_image_id);

                    $row = mysqli_fetch_assoc($select_posts_image_id);
                    $post_image = $row['post_image'];

                }




                if ($_FILES["image"]["error"] > 0) {
                        echo "Error: " . $_FILES["image"]["error"] . "<br>";
                } 
                else {

                    $post_category_id = $_POST['post_category_id'];
                    $post_title = $_POST['post_title'];
                    $post_author = $_POST['post_author'];
                    $post_status = $_POST['post_status'];

                    $post_image = $_FILES['image']['name'];
                    $post_image_temp = $_FILES['image']['tmp_name'];

                    $post_tags = $_POST['post_tags'];
                    $post_content = $_POST['post_content'];
                    $post_date = date('d-m-y');
                    $post_comment_count = 4;

                  move_uploaded_file($post_image_temp,"../images/$post_image");
                 }//else
               

                 $query = "update posts set ";
                 $query .= " post_category_id = '{$post_category_id}', ";
                 $query .= " post_title = '{$post_title}', ";
                 $query .= " post_author = '{$post_author}', ";
                 $query .= " post_date = now(), ";
                 $query .= " post_image = '{$post_image}', ";
                 $query .= " post_content = '{$post_content}', ";
                 $query .= " post_tags = '{$post_tags}', ";
                 $query .= " post_comment_count = '{$post_comment_count}', ";
                 $query .= " post_status = '{$post_status}' ";
                 $query .= " WHERE post_id = {$p_id}; ";
                
                $update_post_query = mysqli_query($connection, $query);

                 confirmQuery($update_post_query);
                
            }

?>

 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Posts
                        </h1>



                <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Post title</label>
                            <input type="text" value="<?php echo $post_title ?>" class="form-control" name="post_title">
                        </div>
                        <div class="form-group">
                            <label for="">Post Category Id</label><br>
                            <select class="form-control" name="post_category_id"  style="width: 300px;">
                               <?php

                               $query = "select * from category; ";
                               $select_cat_title = mysqli_query($connection, $query);
                               confirmQuery($select_cat_title);
                               while ($row = mysqli_fetch_assoc($select_cat_title)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<option value ='$cat_id'>{$cat_title}</option>";
                               }
                            
                               ?>
                            </select><br>
                           
                        </div>
                        <div class="form-group">
                            <label for="">Post Author</label>
                            <input type="text"  value="<?php echo $post_author ?>" class="form-control" name="post_author">
                        </div>
                        <div class="form-group">
                            <label for="">Post Status</label>
                            <input type="text"  value="<?php echo $post_status ?> " class="form-control" name="post_status">
                        </div>
                        <div class="form-group">
                            <label for="">Post Image</label><br>
                            <img src= '../images/<?php echo $post_image?>' name="image"  >
                             
                            <input type="file" name="image">

                        </div>
                        <div class="form-group">
                            <label for="">Post Tags</label>
                            <input type="text"  value="<?php echo $post_tags ?>" class="form-control" name="post_tags">
                        </div>
                        <div class="form-group">
                            <label>Post Content</label>
                            <textarea class="form-control" name="post_content" rows="3"><?php echo $post_content ?></textarea>
                        </div>

                        <input class="btn-primary" type="submit" value="Update" name="update_post">
                </form>

