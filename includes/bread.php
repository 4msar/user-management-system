			<div class="col-md-10 admin-part pd0">
            	<ol class="breadcrumb">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                  <?php if(isset($_GET['page']) && $_GET['page']!=null){ ?> 
                  <li><a href="<?php echo '?page='.$_GET['page'] ?>"><?php echo get_title();//$title; ?></a></li>
                  <?php }else{ ?>
                        <li><a href="">Dashboard</a></li>
                  <?php } ?>
                </ol>
            