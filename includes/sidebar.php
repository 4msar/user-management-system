        
    	<div class="col-md-2 sidebar pd0">
            	<div class="side_user">
            	    <?php 
                        $uid = $_SESSION['user_id'];
                        
                    ?>
                	<img class="img-responsive" src="<?php 
                        if(get_data('users', $uid, 'avator')==null) {
                            echo "assets/images/avatar.png"; 
                        } else{ 
                            if(file_exists('uploads/'.get_data('users', $uid, 'avator'))) {
                                echo "uploads/".get_data('users', $uid, 'avator'); 
                            }else{ 
                                echo "assets/images/avatar.png"; 
                            }
                        } ?>"/>
                    <h4><?php echo get_data('users', $uid, 'name'); ?></h4>
                    <span><?php echo '@ '.get_data('users', $uid, 'role');//.$uid; ?></span><br>
                    <!--<span><i class="fa fa-circle"></i> Online</span>-->
                    <?php //} ?>
                </div>
                <h2>MAIN NAVIGATION</h2>
                <ul>
                	<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="?page=list"><i class="fa fa-user-circle"></i>All User</a></li>
                    <li><a href="?page=add"><i class="fa fa-user-plus"></i> Add User</a></li>
                    <li><a href="?action=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                    
                </ul>
            </div><!--sidebar end-->