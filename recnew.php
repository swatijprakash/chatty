<?php
        $voc=file_get_contents("voice_input.txt");
        $line=explode("\n",$voc);
        foreach ($line as $newline)
        {
            echo $newline;
        };  
        ?>