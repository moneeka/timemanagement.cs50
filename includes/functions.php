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
?>