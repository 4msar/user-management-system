<?php 
    //Initialize the session
    session_start();
    // Check Login Status 
    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in']==null){
      header("location: login.php");
      exit;
    }
    
    
    // Call Functions File
    if(file_exists('functions/function.php')){
        require_once('functions/function.php');
    }
    // Form Submition 
    if(file_exists('functions/form-handler.php')){
        require_once('functions/form-handler.php');
    }
    // Page action & data 
    if(file_exists('functions/link.php')){
        require_once('functions/link.php');
    }
    
    
    // Call Necessary functions
    get_header();
    get_sidebar();
    get_bread();
    
    // view the specific page 
    
    if(isset($_GET['page'])){
        $view = $_GET['page'];
        switch ($view) {
            case $view:
                if(file_exists('contents/'.$view.'.php')){
                    require_once('contents/'.$view.'.php');
                }else{
                    if(file_exists('contents/_404.php')){
                        require_once('contents/_404.php');
                    }
                }
            break;
            
            default:
                if(file_exists('contents/_404.php')){
                    require_once('contents/_404.php');
                }
            break;
        }
    }
    // if it is the main page or $view was null 
    else{
        if(file_exists('contents/index.php')){
            require_once('contents/index.php');
        }
    }
    
    // Call the footer 
    get_footer();
    
    // Default Data & Task 
    if (!is_dir('uploads/')) {
        mkdir('./uploads/', 0777, TRUE);
    }

?>