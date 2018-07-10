<script>
function myFunction() {
  alert('delete?');
}
</script>
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
                             Add Category
                        </h1>
                        

                        <div class="col-lg-6">
                        <form method="post">
                                <div class="form-group">
                                    <label >Categories Title</label>
                                    <input type="text" name="cat_title" class="form-control"  placeholder="Enter categories" />
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Add categroy</button>
                                <!-- insert --> 
                                <?php insert_categories();?>
                       
                        </form>


                        <?php //update
                         if (isset($_GET['edit'])) {
                                $the_cat_id = $_GET['edit'];

                                include "includes/update_categories.php";
                         }

                        ?>


                     
                        </div>

                        <div class="col-lg-6">
            
                            <table class="table table-bordered" >
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                     <?php findAllCategories();?>
                                    </tr>

                                    <?php deleteItem();   ?>
                                
                                </tbody>


                            </table>
                        </div>
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
