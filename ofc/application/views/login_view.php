<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SSJGS Office</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/login.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
    	<script type="text/javascript">
    		var valid=0;
    		var base_url = '<?php echo base_url(); ?>';	
    		$(document).ready(function(){
    			$("input[type=text],input[type=password]").blur(function(){
    				if($(this).val()==""){
    					alert($(this).attr("name") + " cannot be blank.");
    				}else{
    					valid = 1;
    				}
    			});				    			
    		});

    		function loginchk(){
				if(valid){
					$.ajax({
						type: 'POST',
						data: $('.row1 :input').serialize(),
						url: base_url + 'login/login_validation',
						success: function (response) {
							if (response) {
	                    		$(".error").html("");
	                    		window.location = base_url + 'main/index';
	                        } else {
	                        	$(".error").html("Invalid usrname or password!!");
	                        }
	                    }
					});
				}
			}
    	</script>
    </head>
    <body>    
    	<div class="login">
            <div class="header">
            	Shah Satnam Ji Green S Welfare Force Wing Office
            </div>            
            <fieldset class="row1">
                <legend></legend>
                <div class="error"></div>
                <p>
                    <label>Username *</label>
                    <input type="text" id="uid" name="Username"/>
                </p>
                <p>
                    <label>Password *</label>
                    <input type="password" id="pwd" name="Password"/>
                </p>
                <p></p>
                <p>
                	<label></label>
                	<button id="login_submit" class="button" onclick="loginchk();">SignIn &raquo;</button>
                </p>                
            </fieldset>               
            <div class="footer">
            	&copy;Copyright reserved 2015.
            </div>            
        </div>
    </body>
</html>