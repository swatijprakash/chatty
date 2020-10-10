<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->

    <title>Chatty</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/untitled.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <script>
        var dt = new Date();
        //document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
        $("#mydiv").load(location.href + " #mydiv");
    </script>


    <style type="text/css">
            body{
        margin-top:20px;
        /* background-color:black; */
        background:url("images/chat.jpg") no-repeat fixed center;
        }
        .panel {
        background-image:url("images/panel.jpg");
        box-shadow: 0 2px 0 rgba(0,0,0,0.075);
        border-radius: 0;
        border: 0;
        margin-bottom: 24px;
        position:fixed;
        top:7%;
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
        font-size: 11px;
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
<a class="btn btn-link" style="color:#3a4203; font-weight:800; margin-left:-5px; margin-top:-20px;" href="index.php" id="home" name="home" value="home">HOME</a><br/>
<!-- <a class="btn btn-link" style="color:#3a4203; font-weight:800; margin-left:1220px; margin-top:-20px;" href="locator.php" target="_blank" id="admin" name="admin" value="admin">BRANCH LOCATOR</a>-->
<form method="post" onkeydown="return event.key != 'Enter';">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="col-md-12 col-lg-6">
            <div class="panel">
                <!--Heading-->
                <div class="panel-heading">
                    <div class="panel-control">
                    </div>
                    <h3 class="panel-title">The Banker Bot
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#demo-chat-body">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    </h3>
                </div>
        
                <!--Widget body-->
                <div id="demo-chat-body" class="collapse in">
                    <div class="nano has-scrollbar" style="height:380px">
                        <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                        <ul class="list-unstyled media-block">
                        <li class="mar-btm">
                                <div class="media-left">
                                    <img src="images/ch.jpg" class="img-circle img-sm" alt="Profile Picture">
                                </div>
                                <div class="media-body pad-hor">
                                    <div class="speech">
                                        <p class="media-heading">Chatty
                                        </p>
                                        <p>"Hi, I'm Chatty and I chat alot ;)</p>
                                        <p>Please type in English language to start a conversation.</p>
                                        <p>Type quit to leave</p>
                                        <p class="speech-time">
                                        <?php
                                            date_default_timezone_set('Asia/Kolkata');
                                            $currentTime = date( 'h:i A', time () );
                                            echo $currentTime;
                                        ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                        </div>
                    <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>
        
                    <!--Widget footer--> 
                    <div class="panel-footer">
                        <div class="row">
                        <div class="col-sm-8">
                        <input type="text" placeholder="Enter Your Text Here" class="form-control chat-input" name="msg" id="msg" autocomplete="off">
                    </div>

                    <div class="col-sm-1">
                        <button class="btn btn-link" name="rec" id="rec" type="button" onclick="reco()">
                        <i class="fa fa-microphone" style="font-size:18px;color:green"></i>
                        </button>
                    </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-block" type="button" onclick="send()">Send</button><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<script type="text/javascript">
    function getCurrentTime()
    {
    var now=new Date();
    var hh=now.getHours();
    var min=now.getMinutes();
    var ampm=(hh>=12)?'PM':'AM';
    hh=hh%12;
    hh=hh?hh:12;
    hh=hh<10?'0'+hh:hh;
    min=min<10?'0'+min:min;
    var time=hh+":"+min+" "+ampm;
    return time;
    }
</script>

<script type="text/javascript">
    function send()
    {
    var txt=jQuery('#msg').val();
    var html='<li class="mar-btm"><div class="media-right"><img src="images/us.jpg" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-right"><div class="speech"><p class="media-heading">User</p><p>'+txt+'</p><p class="speech-time">'+getCurrentTime()+'</p></div></div></li>';

    jQuery('.media-block').append(html);
    jQuery('.nano-content').scrollTop(jQuery('.nano-content')[0].scrollHeight);
    jQuery('#msg').val('');
    if(txt){
        jQuery.ajax({
            url:'mysearch.php',
            type:'post',
            data:'txt='+txt,
            success:function(result){
                res = result;
                result = result.split("...").join('<br>') ;
                var html='<li class="mar-btm"><div class="media-left"><img src="images/ch.jpg" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor"><div class="speech"><p class="media-heading">Chatty<button class="btn btn-link" type="button" onclick="play()"><i class="fa fa-caret-right" style="font-size:20px;color:#dbe0b4;"></i></button></p><p>'+result+'</p><p class="speech-time">'+getCurrentTime()+'</p></div></div></li>';
                jQuery('.media-block').append(html);
                jQuery('.nano-content').scrollTop(jQuery('.nano-content')[0].scrollHeight);
                if(res=="Bye take care.It was nice talking to you. See you soon")
                {
                    setTimeout(function(){location.href = "index.php"}, 2000);
                }
            }
        })
    }
    }
</script>


<script type="text/javascript">
    function play()
    {
        $.ajax({
        type: "POST", 
        url: "play.php",
        data :{},
        success:function(){
        }
        });
    }
</script>

<script type="text/javascript">
    function reco()
    {
            jQuery.ajax({
            url:'rec.php',
            type:'post',
            data:{},
            success:function(result){
                msg();
            }
        })
    }
    
</script>

<script type="text/javascript">
    function msg()
    {
        jQuery.ajax({
                url:'recnew.php',
                type:'post',
                data:{},
                success:function(result){
                    document.getElementById('msg').value=result;
                    
                }
            })
    }
</script>


</body>
</html>