<?php          
          include ("config.php");
          if(isset($_POST['txt']))
        {
        
         $pp=file_get_contents("predict.txt");
         $query=$_POST["txt"];
         
            $response ="";
            $res = mysqli_query($link,"SELECT * FROM chat WHERE query='$query'");

            $row = mysqli_fetch_array($res);
           
            $response = $row['response'];

           if($query == "locate branch" or $query == "which is my nearest branch")    
           {
                
                ?> <script type="text/javascript" language="Javascript">window.open('locator.php');</script> <?php
                $str = "Hope you found required Branch details.";
                echo $str;
                file_put_contents('t2.txt', $str);
                
           }
            
           else if(($pp !="") and (($query == "yes")or($query == "Yes")or($query == "YES")))
           {
                file_put_contents('t1.txt', $pp);
                $python=`python chatty.py`;
                $doc=file_get_contents("t2.txt");
                                $line=explode("\n",$doc);
                                foreach ($line as $newline)
                                {
                                    echo $newline;
                                };  
                file_put_contents('predict.txt', "");       
           }
           else if(($pp !="") and (($query == "no")or($query == "No")or($query == "NO")))
           {
                $sorry =  "Sorry...Provide me more details or please try restructuring the query";
                file_put_contents('t2.txt', $sorry); 
                file_put_contents('predict.txt', "");
                echo $sorry;
            }

            else if($response != "")
            {
                file_put_contents('t1.txt', $query);
                file_put_contents('t2.txt', $response);
                $doc=file_get_contents("t2.txt");
                                 $line=explode("\n",$doc);
                                 foreach ($line as $newline)
                                 {
                                     echo $newline;
                                 };  
                
            }
           else 
           {
           file_put_contents('t1.txt', $query);
           $python=`python chatty.py`;
           $doc=file_get_contents("t2.txt");
                                $line=explode("<br />",$doc);
                                foreach ($line as $newline)
                                {
                                    echo $newline;
                                };  
           }

        }
        else
            {
                echo "Sorry...pls ask it again";
            }

        
    
?>