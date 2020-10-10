<?php
    include ("config.php");
    session_start();
    if(isset($_POST['submit']))
    {
        $query=$_POST['query'];
        $response=$_POST['response'];
        $category=$_POST['category'];

        $f=0;

	    if(empty($query))
	    {
		$f=1;
		$query="Query cannot be null";
	    }
        if(empty($response))
	    {
		$f=1;
		$response="Response cannot be null";
        }
        if(empty($category))
	    {
		$f=1;
		$category="Category field cannot be null";
        }
        
        if($f==0)
        {

            $a_id = $_SESSION['adm_id'];

            $res = mysqli_query($link,"SELECT username FROM admin WHERE id='$a_id'");
            
            while($row = mysqli_fetch_array($res)) 
            {
                
                $uname = $row['username'];
                
            }

            $sql_insert="insert into chat(u_name,query,response,category) values('$uname','$query','$response','$category')";
            
            if($link->query($sql_insert))
            {				
                $message = "Update Successfull";
                echo "<script type='text/javascript'>alert('$message');              
                        window.location.href ='index.php'</script>";
            }
            else
            {
                echo "Failed  ".$sql_insert;
            }
        }
                
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chatty-Admin</title>
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

    .speech {
        color: #cedef5;
        font-weight: bold;
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
    color:#6acc6a;
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

    .pad-hor {
    padding-left: 15px;
    padding-right: 15px;
    }
    .btn-primary, .btn-primary:focus, .btn-hover-primary:hover, .btn-hover-primary:active, .btn-hover-primary.active, .btn.btn-active-primary:active, .btn.btn-active-primary.active, .dropdown.open>.btn.btn-active-primary, .btn-group.open .dropdown-toggle.btn.btn-active-primary {
    background-color: #6acc6a;
    border-color: #6acc6a;
    color: #fff !important;
    }
    .btn {
    cursor: pointer;
    position: center;
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
    font-size: 14px;
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
    </style>
</head>
<body>
<a class="btn btn-link" style="color:#3a4203; font-weight:800; margin-left:0px; margin-top:-15px;" href="index.php" id="home" name="home" value="home">HOME</a>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<form method="post">
    <div class="container">
        <div class="col-md-12 col-lg-6">
            <div class="panel">
                <!--Heading-->
                <div class="panel-heading">
                    <div class="panel-control">
                    </div>
                    <h3 class="panel-title" >The Banker Bot (Admin)
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#demo-chat-body">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                    </h3>
                    
                </div>

                <!--Widget body-->
                <div id="demo-chat-body" class="collapse in">
                    <div class="nano has-scrollbar" style="height:380px">
                        <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                    
                            <div class="row">

                                <div class="col-sm-12 speech">
                                    <input type="text" placeholder="Enter the Category" class="form-control chat-input" name="category" id="category" autocomplete="off" required>  <br/>
                                </div>

                                <div class="col-sm-6 speech">
                                <textarea rows=14 placeholder="Enter the Query" class="form-control chat-input" name="query" id="query" autocomplete="off" required></textarea>
                                </div>
                                
                                <div class="col-sm-6 speech">
                                    <textarea rows=14 placeholder="Enter the Response" class="form-control chat-input" name="response" id="response" autocomplete="off" required></textarea><br/>
                                </div>

                            </div>
                        </div>
                        <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div>
                    </div>
                

                 <!--Widget footer-->
                    <div class="panel-footer">
                        
                            <div>
                                <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Update" /><br/>
                            </div>
                    </div>
                </div>
        </div>
    </div>
</form>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
</body>
</html>