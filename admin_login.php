<?php
 // Initialize the session
    session_start();
    
    // Include config file
    require_once "config.php";
    
    // Define variables and initialize with empty values
    if(isset($_POST['submit']))
    {
        $username=$_POST['uname'];
        $password=$_POST['pass'];

        $f=0;

	    if(empty($username))
	    {
		$f=1;
		$username="Username cannot be null";
	    }
        if(empty($password))
	    {
		$f=1;
		$password="Password cannot be null";
        }
        
        if($f==0)
        {
    
            $sql_login="select * from admin where username = '$username' and password='$password'";
            $result_login=$link->query($sql_login);
            $row_count_login=$result_login->num_rows;
            if($row_count_login==1)
            {
                $admin=$result_login->fetch_assoc();
                $admin_id=$admin['id'];
                $_SESSION['adm_id']=$admin_id;
                header("location:index.php");
            }
            else
            {
                $GLOBALS['$log']="Wrong Username and Password !";
                
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chatty-Admin_login</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/untitled.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">


    <script>
        var dt = new Date();
        //document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
    </script>


    <style type="text/css">
    body{
        margin-top:20px;
        background:url("images/chat.jpg") no-repeat fixed center;
        }
        .panel {
        background-image:url("images/panel.jpg");
        box-shadow: 0 2px 0 rgba(0,0,0,0.075);
        border-radius: 0;
        border: 0;
        margin-bottom: 24px;
        position:fixed;
        top:8%;
        left: 23%;
        width:52em;
        /*max-height: 85em;
        overflow-y: scroll;*/

        }
        .panel .panel-heading, .panel>:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        .panel-heading {
        position: relative;
        height: 50px;
        width:758px;
        padding: 0;
        }
        .panel-control {
        height: 100%;
        position: relative;
        float: right;
        padding: 0 15px;
        }
        .panel-title {
        background-color:#fafafa;
        color:#123d52;
        font-weight:bold;
        padding: 0 20px 0 20px;
        font-size: 1.416em;
        line-height: 50px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        }
        .panel-control>.btn:last-child, .panel-control>.btn-group:last-child>.btn:first-child {
        border-bottom-right-radius: 0;
        }
        .panel-control .btn, .panel-control .dropdown-toggle.btn {
        border: 0;
        }
        .nano {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        }
        .nano>.nano-content {
        position: absolute;
        overflow-y: scroll;
        overflow-x: hidden;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        }
        .pad-all {
        padding: 15px;
        }
        .mar-btm {
        margin-bottom: 15px;
        }
        .media-block .media-left {
        display: block;
        float: left;
        }
        .img-sm {
        width: 60px;
        height: 60px;
        }
        .img-smx {
        width: 15px;
        height: 15px;
        }
        .media-block .media-body {
        display: block;
        overflow: hidden;
        width: auto;
        }
        .pad-hor {
        padding-left: 15px;
        padding-right: 15px;
        }
        .speech {
        position: relative;
        background: #3a4203;
        color: #dbe0b4;
        display: inline-block;
        border-radius: 0;
        padding: 12px 20px;
        font-weight: bold;

        }
        .speech:before {
        content: "";
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        left: 0;
        top: 0;
        border-top: 7px solid transparent;
        border-bottom: 7px solid transparent;
        border-right: 7px solid #3a4203;
        margin: 15px 0 0 -6px;
        }
        .speech-right>.speech:before {
        left: auto;
        right: 0;
        border-top: 7px solid transparent;
        border-bottom: 7px solid transparent;
        border-left: 7px solid #0b2854;
        border-right: 0;
        margin: 15px -6px 0 0;
        }
        .speech .media-heading {
        font-size: 1.2em;
        color: #dbe0b4;
        display: block;
        border-bottom: 1px solid rgba(0,0,0,0.1);
        margin-bottom: 10px;
        padding-bottom: 5px;
        font-weight: bold;
        }


        .speech-time {
        margin-top: 20px;
        margin-bottom: 0;
        font-size: .8em;
        font-weight: bold;
        text-align: right;
        }
        .speech-play {
        text-align: right;
        }
        .media-block .media-right {
        float: right;
        }
        .speech-right {
        text-align: right;
        }
        .pad-hor {
        padding-left: 15px;
        padding-right: 15px;
        }
        .speech-right>.speech {
        background: #0b2854;
        color: #cedef5;
        text-align: right;
        }
        .speech-right>.speech .media-heading {
        color: #cedef5;
        font-weight: bold;
        }
        .btn-primary, .btn-primary:focus, .btn-hover-primary:hover, .btn-hover-primary:active, .btn-hover-primary.active, .btn.btn-active-primary:active, .btn.btn-active-primary.active, .dropdown.open>.btn.btn-active-primary, .btn-group.open .dropdown-toggle.btn.btn-active-primary {
        background-color: #6acc6a;
        border-color: #6acc6a;
        color: #fff !important;
        }
        .btn {
        cursor: pointer;
        /* background-color: transparent; */
        color: inherit;
        padding: 6px 12px;
        border-radius: 0;
        border: 1px solid 0;
        font-size: 11px;
        line-height: 1.42857;
        vertical-align: middle;
        -webkit-transition: all .25s;
        transition: all .25s;
        }
        .form-control {
       
        font-weight: bold;
        font-size: 14px;
        color:black;
        background-color: #fff;
        height: 100%;
        border-radius: 0;
        box-shadow: none;
        border: 1px solid #e9e9e9;
        transition-duration: .5s;

        }
        .nano>.nano-pane {
        background-color: rgba(0,0,0,0.1);
        position: absolute;
        width: 5px;
        right: 0;
        top: 0;
        bottom: 0;
        opacity: 0;
        -webkit-transition: all .7s;
        transition: all .7s;
        }

        

        input[type=text], input[type=password] {   
                width: 50%;   
                margin: 8px 0;  
                padding: 12px 20px;   
                display: inline-block;   
                border: 2px solid green;   
                box-sizing: border-box;   
            }  
        label{
            font-weight: bold;
            color: #0b2854;
            font-size: 18px;
        }
                
            
        .container {   
                padding: 25px;  
                margin-left:200; 
                
            }   


    </style>
</head>


<body>
<a class="btn btn-link" style="color:#3a4203; font-weight:800" href="index.php" id="home" name="home" value="home">HOME</a>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="col-md-12 col-lg-6">
        <div class="panel">
            <!--Heading-->
            <div class="panel-heading">
                <div class="panel-control">
                </div>
                <h3 class="panel-title" >Admin Login Form
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#demo-chat-body">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </h3>
                
            </div>

            <!--Widget body-->
            <div id="demo-chat-body" class="collapse in">
                <!-- <div class="nano has-scrollbar" style="height:380px"> -->
                    <div class="nano-content pad-all" style="height:250px" tabindex="0" style="right: -17px;">
            
            <form method="post">
                        
            <div class="container">   

                <!-- <label>&nbsp;Username&nbsp;&nbsp;  </label>   <br/> -->
                <input type="text" class="form-control" placeholder="Enter Username" name="uname" autocomplete="off" required>  <br/><br/>
                <!-- <label>&nbsp;Password&nbsp;&nbsp; </label>   <br/> -->
                <input type="password" class="form-control" placeholder="Enter Password" name="pass" autocomplete="off" required>  
                
            </div>   

            
                </div>
            <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div>
                <!--Widget footer-->
                <div class="panel-footer">
                        <center><b><div><?php 
                                                if(array_key_exists('submit',$_POST))
                                                {
                                                    login_admin();
                                                }

                                                function login_admin()
                                                {
                                                    echo $GLOBALS['$log']; 
                                                }

                                        ?> 
                        </div></b></center></br>

                        <div>
                            <input type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="Login as Admin "><br/>
                        </div>
                    
                    
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>