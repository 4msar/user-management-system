<?php 
if(file_exists('includes/config.php')){
    require_once ('includes/config.php');
}

function get_header()
{
    if(file_exists('includes/header.php')){
        require_once ('includes/header.php');
    }
}

function get_title($title=''){
    $view = (!empty($_GET['page']) ? $_GET['page'] : 'Dashboard');
    $title = ucfirst($view);
    
    if($view=='list'){
        $title = 'All Users';
    }
    if($view=='add'){
        $title = 'Add User';
    }
    if($view=='edit'){
        $title = 'Edit User';
    }
    if($view=='view'){
        $title = 'View User';
    }

    return $title;
}

function get_sidebar()
{
	if(file_exists('includes/sidebar.php')){
        require_once ('includes/sidebar.php');
    }
}

function get_bread()
{
    if(file_exists('includes/bread.php')){
        require_once ('includes/bread.php');
    }
}

function dashboard(){
    include_once ('contents/index.php');
}

function get_footer()
{
    if(file_exists('includes/footer.php')){
        require_once ('includes/footer.php');
    }
}

function get_data($table, $id='', $col=''){
    global $con;
    $sql = "SELECT * FROM $table WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    if($col!=''){
        return $data[$col];
    }
}

//Ensure that a session exists (just in case)

function flash_msg( $name = '', $message = '', $class = 'success', $type='alert'){
    //We can only do something if the name isn't empty
    if( !empty( $name ) ){
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) ){
            if( !empty( $_SESSION[$name] ) ){
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) ){
                unset( $_SESSION[$name.'_class'] );
            }
            if( !empty( $_SESSION[$name.'_type'] ) ){
                unset( $_SESSION[$name.'_type'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
            $_SESSION[$name.'_type'] = $type;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) ){
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            $type = !empty( $_SESSION[$name.'_type'] ) ? $_SESSION[$name.'_type'] : 'alert';
            
            if($type!='alert'){
                echo $_SESSION[$name];
            }else{
                echo '<div class=" alert alert-'.$class.'" >'.$_SESSION[$name].'<span class="alert-close">x</span></div>';
            }
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}