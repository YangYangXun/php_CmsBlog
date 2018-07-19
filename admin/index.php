<?php include "includes/admin_header.php"?>
<?php session_start()?>


    <div id="wrapper">


        <?php

// if($connection){
//echo "<h3 style='color:white;'>conn!<h3>";
// }

?>

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php
                                        $query = "select * from posts";
                                        $select_post_count = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($select_post_count);
                                        echo "<div class='huge'>$post_count</div>";
                                    ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                    <?php
                                        $query = "select * from comments";
                                        $select_comment_count = mysqli_query($connection, $query);
                                        $comment_count = mysqli_num_rows($select_comment_count);
                                        echo "<div class='huge'>$comment_count</div>";
                                    ?>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $query = "select * from users";
                                            $select_user_count = mysqli_query($connection, $query);
                                            $user_count = mysqli_num_rows($select_user_count);
                                            echo "<div class='huge'>$user_count</div>";
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       
                                        <?php
                                            $query = "select * from category";
                                            $select_category_count = mysqli_query($connection, $query);
                                            $category_count = mysqli_num_rows($select_category_count);
                                            echo "<div class='huge'>$category_count</div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php 

                        $query = "select * from posts where post_status = 'draft' ";
                        $select_draft_post = mysqli_query($connection, $query);
                        $draft_post = mysqli_num_rows($select_draft_post);


                        $query = "select * from comments where comment_status = 'unapprove' ";
                        $select_unapprove_comments = mysqli_query($connection, $query);
                        $unapprove_comments = mysqli_num_rows($select_unapprove_comments);
                       
                        
                        $query = "select * from users where user_role = 'Subscriber' ";
                        $select_user_subscriber = mysqli_query($connection, $query);
                        $user_subscriber = mysqli_num_rows($select_user_subscriber);
                       
                        
                
                
                ?>
                <!-- google-chart -->
                <div class="row ">
                    <div class="col-12 justify-content-center">

                        <h1>chart</h1>
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);
    
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                <?php 
                                  $element_text = ['Active Post', 'Draft post', 'Comments','Unappro Comments','Uers','Suscriber','Categories'];
                                  $element_count = [$post_count, $draft_post, $comment_count, $unapprove_comments,  $user_count, $user_subscriber, $category_count];

                                  for ($i=0; $i < 7; $i++) { 
                                      echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]} ],";
                                  }
                                 ?>
                                ['Post', 10],
                                ]);
    
                                var options = {
                                chart: {
                                    title: 'Company Performance',
                                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                                }
                                };
    
                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    
                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                        </script>
                         <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
    
                    </div>
                </div>

         </div>
         <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<?php include "includes/admin_footer.php"?>
