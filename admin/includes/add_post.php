<?php

if(isset($_POST['create_post'])){



  if ($_FILES["image"]["error"] > 0) {
    echo "Error: " . $_FILES["image"]["error"] . "<br>";
    } else {
        echo "Upload: " . $_FILES["image"]["name"] . "<br>";
        echo "Type: " . $_FILES["image"]["type"] . "<br>";
        echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["image"]["tmp_name"];

      $post_category_id = $_POST['post_category_id'];
      $post_title = $_POST['post_title'];
      $post_author = $_POST['post_author'];
      $post_status = $_POST['post_status'];

      $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name'];

      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];
      $post_date = date('d-m-y');
      $post_comment_count = 0;

      move_uploaded_file($post_image_temp,"../images/$post_image");
    }//else

    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
    $query .=  "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";


    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);
    
}

?>

 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Posts
                        </h1>


              <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Post title</label>
                  <input type="text" class="form-control" name="post_title">
                </div>
                <div class="form-group">
                 
                   <div class="form-group">
                            <label for="">Post Category</label><br>
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






                </div>
                <div class="form-group">
                  <label for="">Post Author</label>
                  <input type="text" class="form-control" name="post_author">
                </div>
                <div class="form-group">
                  <label for="">Post Status</label>
                  <input type="text" class="form-control" name="post_status">
                </div>
                <div class="form-group">
                  <label for="">Post Image</label>
                  <input type="file" name="image">
                </div>
                <div class="form-group">
                  <label for="">Post Tags</label>
                  <input type="text" class="form-control" name="post_tags">
                </div>
                <div class="form-group">
                  <label>Post Content</label>
                  <textarea class="form-control" name="post_content" rows="3"></textarea>
                </div>

                <input class="btn-primary" type="submit" value="Submit" name="create_post">
              </form>




