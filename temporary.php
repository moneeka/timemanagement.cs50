<?php

// 2nd function I'm playing with:

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
                    return true; 
            } 
        } 
    } 
    return false;

    // second function as used in event_confirmation
    else if (is_valid_date($due_date, $format)==false)
		      	{
		      		apologize("test message");
		      	}

    // original function (before we modified it)

    function checkdate(input)
    {
		var validformat=/^\d{2}\/\d{2}\/\d{4}$/; //Basic check for format validity
		var returnval=false;
		if (!validformat.test(input.value))
		{
			alert("Invalid Date Format. Please correct and submit again.");
		}
		else
		{ //Detailed check for valid date ranges
			var monthfield=input.value.split("/")[0];
			var dayfield=input.value.split("/")[1];
			var yearfield=input.value.split("/")[2];
			var dayobj = new Date(yearfield, monthfield-1, dayfield);
			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
			{
				alert("Invalid Day, Month, or Year range detected. Please correct and submit again.");
			}
			else returnval=true;
		}
		if (returnval==false) input.select()
		return returnval;
	}

// our modification of original that semi-worked

<script>
function checkdate(input)
    {
        // Basic check for format validity
        var validformat=/^\d{2}\/\d{2}\/\d{4}$/ 
        var returnval=false
        if (!validformat.test(input.value))
        {
            alert("Invalid Date Format. Please correct and submit again.");
            returnval=false;
        }

        // Detailed check for valid date ranges
        else
        { 
            var monthfield=input.value.split("/")[0];
            var dayfield=input.value.split("/")[1];
            var yearfield=input.value.split("/")[2];
            var dayobj = new Date(yearfield, monthfield-1, dayfield);
            if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
            {
                alert("Invalid Day, Month, or Year range detected. Please correct and submit again.");
                returnval=false;
            }
            else returnval=true;
        }
        if (returnval==false)input.select()
        return returnval;
    }

</script>

// first modified function as used in event_confirmation
else if (checkdate($date_arr[0],$date_arr[1],$date_arr[2])==false)
		      	{
		      	  	apologize("Please use valid date format.");
		      	}