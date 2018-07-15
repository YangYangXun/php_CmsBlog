  <div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit "class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>

                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="enter username">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="enter password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                            
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                     <?php

                        global $connection;

                        $query = "select * from category; ";
                        $result = mysqli_query($connection, $query);


                    ?>


                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        printf("<li><a href='category.php?cat_id=%s'>%s</a></li>", $cat_id, $cat_title);


                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                           
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>


                 <!-- Side Widget Well -->
                 <?php
                include "widget.php";?>


               
            </div>