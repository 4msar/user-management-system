            <div class="col-md-12">
                <?php 
                    flash_msg( 'msg' );
                ?>
            </div>
            <div class="col-md-12">
                	<form class="form-horizontal" action="index.php?u=view&id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Add User 
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="?page=list" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <input type="hidden" name="edit_id" value="<?php echo (isset($_GET['id']) && $_GET['id']!=null ? $_GET['id'] : '' ) ?>">
                      <div class="panel-body">
                        <?php 
                  	        $id = (isset($_GET['id']) && $_GET['id']!=null ? $_GET['id'] : '' );
                            $sql = "SELECT * FROM users WHERE id=$id";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            $data = mysqli_fetch_assoc($result);  ?>
                            
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Name </label>
                            <div class="col-sm-8">
                              <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" name='email' class="form-control" value="<?php echo $data['email']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="number" name="phone" class="form-control" value="<?php echo $data['phone']; ?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">UserName</label>
                            <div class="col-sm-8">
                              <input type="text" disabled="disabled" class="form-control" value="<?php echo $data['username']; ?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">User Role</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="role">
                                    <option <?php echo ($data['role']=='user' ? 'selected="selected"' : ''); ?> value="user">User</option>
                                    <option <?php echo ($data['role']=='admin' ? 'selected="selected"' : ''); ?> value="admin">Admin</option>
                                </select>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Upload</label>
                            <div class="col-sm-8">
                              <input class="form-control" type="file" name="avator" accept="image/*">
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="panel-footer text-center">
                        <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update"/>
                      </div>
                    </div>
                    </form>
                </div><!--col-md-12 end-->
            