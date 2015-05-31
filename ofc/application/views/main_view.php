<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SSJGS Office</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/main.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>        
    </head>
    <body>    
        <div class="frm">
            <div class="header">
                Shah Satnam Ji Green S Welfare Force Wing Office
            </div>
            <div class="body">
                <?php
                echo "<pre>";
                echo "<ol>";
                echo "<li><a href='" . base_url() . "Admin/Application'>Add Application</a></li>";
                echo "<li><a href='" . base_url() . "Admin/Country'>Add Country</a></li>";
                echo "<li><a href='" . base_url() . "Admin/State'>Add State</a></li>";
                echo "<li><a href='" . base_url() . "Admin/District'>Add District</a></li>";
                echo "<li><a href='" . base_url() . "Admin/City'>Add City</a></li>";
                echo "</ol>";
                echo "</pre>";
                ?>
            </div>
            <div class="footer">
                &copy;Copyright reserved 2015.
            </div>            
        </div>
    </body>
</html>
