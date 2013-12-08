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
?>

<script>

    function assignment()
    {
        var mylist=document.getElementById("myList");
        document.getElementById("favorite").value=mylist.options[mylist.selectedIndex].text;
    }

    /**--------------------------
    //* Validate Date Field script- By JavaScriptKit.com
    //* For this script and 100s more, visit http://www.javascriptkit.com
    //* This notice must stay intact for usage
    ---------------------------**/

    function checkdate(input)
    {
        // Basic check for format validity
        var validformat=/^\d{2}\/\d{2}\/\d{4}$/ 
        var returnval=false
        if (!validformat.test(input.value)){
            alert("Invalid Date Format. Please correct and submit again.")
            returnval=false
        }

        // Detailed check for valid date ranges
        else
        { 
            var monthfield=input.value.split("/")[0]
            var dayfield=input.value.split("/")[1]
            var yearfield=input.value.split("/")[2]
            var dayobj = new Date(yearfield, monthfield-1, dayfield)
            if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
                alert("Invalid Day, Month, or Year range detected. Please correct and submit again.")
                returnval=false
            }
            else{
                returnval=true
            }
        }
        if (returnval==false){ input.select()}
        return returnval
    }

</script>