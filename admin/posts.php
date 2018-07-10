<script>
function myFunction() {
  alert('delete?');
}
</script>

<style>
img{
    /* width:100px; */
}
</style>
<?php include "includes/admin_header.php"?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>



        <div id="page-wrapper">

            <div class="container-fluid">
                <?php if (!isset($_GET['source'])) { ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                        </h1>
                <?php } ?>
                     

                <?php 
                     if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch ($source) {
                       
                        case 'add_post':
                            include "includes/add_post.php";
                            break;
                        case 'edit_post':
                            include "includes/edit_post.php";
                            break;
                        default:
                            include "includes/view_all_posts.php";
                            break;
                    }


                    if (isset($_GET['delete'])) {
                        $delete = $_GET['delete'];
                        $query = "delete from posts where post_id = $delete";
                        $delete_query = mysqli_query($connection, $query);
                        confirmQuery($delete_query);


                    } else {
                        $delete = '';
                    }




                ?>
                        
                        

                       
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include "includes/admin_footer.php"?>
