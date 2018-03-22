<?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
     ?>         
            <div class="col-md-12">
                <?php 
                    flash_msg( 'msg' );
                ?>
            </div>
                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Personal Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="?page=list" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All Users</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-9">
                            <div class="user-img">
                                <img src="<?php 
                                if($data['avator']==null) {
                                    echo "assets/images/avatar.png"; 
                                } else{ 
                                    if(file_exists('uploads/'.$data['avator'])) {
                                        echo "uploads/".$data['avator']; 
                                    }else{ 
                                        echo "assets/images/avatar.png"; 
                                    }
                                } ?>">
                            </div>
                          	<table style="margin-top: 15px" class="table table-hover table-striped table-responsive view_table_cus">
                      	    
                            	<tr>
                                	<td>Name</td>
                                    <td>:</td>
                                    <td><?= $data['name']; ?></td>
                                </tr>
                                <tr>
                                	<td>Email</td>
                                    <td>:</td>
                                    <td><?= $data['email']; ?></td>
                                </tr>
                                <tr>
                                	<td>Phone</td>
                                    <td>:</td>
                                    <td><?= $data['phone']; ?></td>
                                </tr>
                                <?php if($_SESSION['user_role']=='admin'){ ?>
                                <tr>
                                	<td>UserName</td>
                                    <td>:</td>
                                    <td><?= $data['username']; ?></td>
                                </tr>
                                <tr>
                                	<td>User Role</td>
                                    <td>:</td>
                                    <td><?= $data['role']; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                	<td>Registration Time</td>
                                    <td>:</td>
                                    <td><?= date("d M Y - g:i A", strtotime( $data['created_at'])); ?></td>
                                </tr>
                                <?php }else{ ?>
                                    <h3>Not Found</h3>
                                <?php } ?>
                            </table>
                          </div>
                          <div class="col-md-2">
                          </div>
                      </div>
                      <div class="panel-footer">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-sm btn-primary">PDF</a>
                            <a href="#" class="btn btn-sm btn-success">PRINT</a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-right">
                        	<a href="?page=edit&id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div><!--col-md-12 end-->
            