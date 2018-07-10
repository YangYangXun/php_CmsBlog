 <?php
include "includes/db.php";
?> 

<?php
include "includes/header.php";
?>


    <!-- Navigation -->

    <?php
        include "includes/navigation.php";
    ?>
   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php

            // code for search bar
                if (isset($_POST['search'])) {

                    $search = $_POST['search'];

                    $query = "select * from posts where post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);

                    if (!$search_query) {
                        // �פ�{���B�q�X�T��
                        die("Query failed" . mysqli_error());
                    }
                    $count = mysqli_num_rows($search_query); //��^?�G�����檺?�q�C
                    if ($count == 0) {
                        echo "no result";
                    } else {
                        // echo $count;
                        // code for show data
                        // $query = "select * from posts";
                        // $all_posts = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
            ?>

                                        <?php ?>

                                        <h1 class="page-header">
                                            Page Heading
                                        <small>Secondary Text</small>
                                        </h1>

                                        <!-- First Blog Post -->
                                        <h2>
                                            <a href="#"><?php echo $post_title ?></a>
                                        </h2>
                                        <p class="lead">
                                            by <a href="index.php"><?php echo $post_author ?>
                        </a>
                                        </p>
                                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?>
                        </p>
                                        <hr>
                                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                                        <hr>
                                        <p><?php echo $post_content ?></p>
                                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                                        <hr>



                                <?php
                        } // end while
                        



                    }
                }?>

            </div>

            <!-- Blog Sidebar Widgets Column -->

                <?php

                include "includes/sidebar.php";

                ?>
          

        </div>
        <!-- /.row -->

        <hr>


<?php

include "includes/footer.php";

?>