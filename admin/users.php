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
                       
                        case 'add_user':
                            include "includes/add_user.php";
                            break;
                        case 'edit_user':
                            include "includes/edit_user.php";
                            break;
                        default:
                            include "includes/view_all_users.php";
                            break;
                    }


                    // if (isset($_GET['delete'])) {
                    //     echo "hi delete";
                    //     $delete = $_GET['delete'];
                    //     $query = "delete from users where user_id = $delete";
                    //     $delete_user_query = mysqli_query($connection, $query);
                    //     confirmQuery($delete_user_query);


                    // } else {
                    //     $delete = '';
                    // }




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
