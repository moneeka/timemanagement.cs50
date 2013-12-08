<?php

        function render($template, $values = [])
    {
        // if template exists, render it
        $bool = (string) file_exists("templates/$template");
        if ($bool == 1)
        {
            // extract variables into local scope
            extract($values);

            // render template
            require("templates/$template");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }

    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }

    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
        exit;
    }

    function is_valid_date($due_date, $format = 'dd.mm.yyyy')
    { 
        if(strlen($due_date) >= 6 && strlen($format) == 10)
        {       
            // find separator. Remove all other characters from $format 
            $separator_only = str_replace(array('m','d','y'),'', $format); 
            $separator = $separator_only[0]; // separator is first character 
            
            if($separator && strlen($separator_only) == 2)
            { 
                // make regex 
                $regexp = str_replace('mm', '(0?[1-9]|1[0-2])', $format); 
                $regexp = str_replace('dd', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp); 
                $regexp = str_replace('yyyy', '(19|20)?[0-9][0-9]', $regexp); 
                $regexp = str_replace($separator, "\\" . $separator, $regexp); 

                if($regexp != $due_date && preg_match('/'.$regexp.'\z/', $due_date))
                { 
                    // check date 
                    $arr=explode($separator,$due_date); 
                    $day=$arr[0]; 
                    $month=$arr[1]; 
                    $year=$arr[2];

                    if(@checkdate($month, $day, $year))
                    { 
                        return true; 
                    }
                } 
            } 
        } 
        return false;
    }
?>

<script>

    function assignment()
    {
        var mylist=document.getElementById("myList");
        document.getElementById("favorite").value=mylist.options[mylist.selectedIndex].text;
    }
</script>