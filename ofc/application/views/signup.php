<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>SIGN UP!</h1>

	<div id="body">
		<?php 
			echo form_open('login/signup_validation');
			echo validation_errors();
			echo "<p>InsanNumber: ";
			echo form_input('insnumber', $this->input->post('insnumber'));
			echo "</p>";
			echo "<p>First Name: ";
			echo form_input('firstname', $this->input->post('firstname'));
			echo "</p>";
			echo "<p>Last Name: ";
			echo form_input('lastname', $this->input->post('lastname'));
			echo "</p>";
			echo "<p>Username: ";
			echo form_input('username', $this->input->post('username'));
			echo "</p>";
			echo "<p>Password: ";
			echo form_password('password');
			echo "</p>";
			echo "<p>Confirm Password: ";
			echo form_password('cpassword');
			echo "</p>";
			echo "<p>Mobile Number: ";
			echo form_input('mobileno', $this->input->post('mobileno'));
			echo "</p>";
			echo "<p>Email Id: ";
			echo form_input('emailid', $this->input->post('emailid'));
			echo "</p>";
			echo "<p>Security Question: ";
			echo form_input('secquestion', $this->input->post('secquestion'));
			echo "</p>";
			echo "<p>Security Answer: ";
			echo form_input('secanswer', $this->input->post('secanswer'));
			echo "</p>";
			echo "<p>";
			echo form_submit('signup_submit','Sign Up');
			echo "</p>";
			echo form_close();
		?>
		<a href='<?php echo base_url()."login/signup";?>'></a>
	</div>	
</div>
</body>
</html>