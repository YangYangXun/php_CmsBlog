

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
                            <label for="">Post Category Id</label>
                            <input type="text"  value="<?php echo $post_category_id ?>" class="form-control" name="post_category_id">
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
                            <label for="">Post Image</label>
                            <input type="file"  value="<?php echo $post_image ?>"name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Post Tags</label>
                            <input type="text"  value="<?php echo $post_tags ?>" class="form-control" name="post_tags">
                        </div>
                        <div class="form-group">
                            <label>Post Content</label>
                            <textarea class="form-control" value="<?php echo $post_content ?>" name="post_content" rows="3"></textarea>
                        </div>

                        <input class="btn-primary" type="submit" value="Submit" name="create_post">
                </form>

