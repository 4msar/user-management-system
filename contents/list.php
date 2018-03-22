            <div class="col-md-12">
                <?php 
                    flash_msg( 'msg' );
                ?>
            </div>
                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                All Users View
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="?page=add" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add User</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <table class="table table-responsive table-striped table-hover table_cus list-table">
                          		<thead class="table_head">
                            		<tr>
                                    	<th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <?php if($_SESSION['user_role']=='admin'){ ?>
                                        <th>Username/Role</th>
                                        <?php } ?>
                                        <th>Register Time</th>
                                        <th>Action</th>
                                    </tr>
                            	</thead>
                                <tbody>
                                    <?php 
                                    $sql = "SELECT * FROM users ORDER BY id DESC";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    
                                        while($data = mysqli_fetch_assoc($result)) { ?>
                                	<tr>
                                    	<td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['phone']; ?></td>
                                        <?php if($_SESSION['user_role']=='admin'){ ?>
                                        <td><?php echo $data['username'].' / '.$data['role']; ?></td>
                                        <?php } ?>
                                        <td><?php echo date("d M Y - g:i A", strtotime( $data['created_at'])); ?></td>
                                        <td>
                                        	<a href="?page=view&id=<?php echo $data['id']; ?>"><i class="fa fa-eye fa-lg"></i></a>
                                        	<?php if($_SESSION['user_role']=='admin'){ ?>
                                            <a href="?page=edit&id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                                            <a href="javascript:delete_confirm(<?php echo $data['id']; ?>)" ><i class="fa fa-trash fa-lg"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                          </table>
                        </div>
                      <div class="panel-footer">
                        <div class="col-md-4">
                        	<a href="#" class="btn btn-sm btn-warning">EXCEL</a>
                            <a href="#" class="btn btn-sm btn-primary">PDF</a>
                            <a href="#" class="btn btn-sm btn-danger">SVG</a>
                            <a href="#" class="btn btn-sm btn-success">PRINT</a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-right">
                        	<nav aria-label="Page navigation">
                              <ul class="pagination pagina_cus">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div><!--col-md-12 end-->
    <script type="text/javascript">
    function delete_confirm(id)
    	{
    	var r=confirm("Do you really want to delete?");
    		if (r==true)
    		{
    			window.location="index.php?action=delete&id="+id+"&u=list";
    		}
    	}
    </script>
