    <div class="col-md-12">
    	<h2>Welcome to Admin Dashboard</h2>
    </div><!--col-md-12 end-->
    <div class="widget">
        <div class="col-md-6 left">
            <span><?php 
            $sql = "SELECT * FROM users";
            $result = mysqli_query($con, $sql);
            echo mysqli_num_rows($result); ?></span>
            <p>Total Users</p>
        </div>
        <div class="col-md-6 right">
            <span>15</span>
            <p>Total Data</p>
        </div>
    </div>