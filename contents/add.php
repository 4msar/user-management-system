            <div class="col-md-12">
                <?php 
                    flash_msg( 'msg' );
                ?>
            </div>
                <div class="col-md-12">
                	<form class="form-horizontal" action="index.php?u=add" method="post" enctype="multipart/form-data" onsubmit="return formCheck()">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Add User
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="?page=list" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Users</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Name </label>
                            <div class="col-sm-8">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your Name"><span class="err" id="name-err"><?php flash_msg( 'nameErr'); ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" id="email" name='email' class="form-control" placeholder="Enter your Email">
                              <span class="err" id="email-err"><?php flash_msg( 'emailErr') ; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter your Phone Number">
                              <span class="err" id="phn-err"><?php flash_msg( 'phnErr') ; ?></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">UserName</label>
                            <div class="col-sm-8">
                              <input type="text" id="username" name="username" class="form-control" placeholder="Enter a Username">
                              <span class="err" id="un-err"><?php flash_msg( 'unErr') ; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="pass" name="pwd" class="form-control" placeholder="Enter Password">
                              <span class="err" id="pwd-err"><?php flash_msg( 'pwdErr') ; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="re-pass" name="re-pwd" class="form-control" placeholder="Enter Password Again">
                              <span class="err" id="re-pwd-err"><?php flash_msg( 're-pwdErr') ; ?></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Upload</label>
                            <div class="col-sm-8">
                              <input class="form-control" type="file" name="avator" accept="image/*">
                            </div>
                          </div>
                      </div>
                      <div class="panel-footer text-center">
                        <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Register"/>
                      </div>
                    </div>
                    </form>
                </div><!--col-md-12 end-->
            