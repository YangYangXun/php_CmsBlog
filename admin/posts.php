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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                        </h1>
                     

                <?php 
                     if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch ($source) {
                        case 22: 
                            echo "22";
                            break;
                        case 23:
                            include "includes/add_post.php";
                            break;
                        case 24:
                            echo "24";
                            break;
                        
                        default:
                            include "includes/view_all_posts.php";

                            break;
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