<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>SSJGS Office</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/main.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/plugin/pagination/simplePagination.css"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>  
        <script src="<?php echo base_url(); ?>resources/plugin/pagination/jquery.simplePagination.js"></script>
	    <script>
	        var base_url = '<?php echo base_url(); ?>';
		    page_no = 1;
		    per_page = 5;
		    $(document).ready(function () {
		        getapplication();
		    });
		    function getapplication() {
		        $.ajax({
		            type: 'POST',
		            data: 'page_no=' + page_no + '&per_page=' + per_page,
		            url: base_url + 'admin/application_list',
		            success: function (response) {
		                $('#dataContainer').html(response);
		            }
		        });
	        }
	        function saveRecord() {
	            var valid = 1;
	            if ($('#ApplicationName').val() == '') {
	                alert('Please enter application name.');
	                valid = 0;
	            } 
	            if (valid) {
	                $.ajax({
	                    type: 'POST',
	                    data: $('.frm :input').serialize(),
	                    url: base_url + 'admin/addApplication',
	                    success: function (response) {
	                        $('.frm :input').not('[type="button"]').val('');
	                        page_no = 1;
	                        getapplication();
	                    }
	                });
	            }
	        }

	 
	        function deleteRecord(applicationId) {
	            var conf = confirm('Are you sure to delete this record.');
	            if (conf) {
	                $.ajax({
	                    type: 'POST',
	                    data: {'applicationId': applicationId},
	                    url: base_url + 'admin/application_delete',
	                    success: function (response) {
	                        getapplication('')();
	                    }
	                });
	            }
	        }

	        function updateRecord(application_id) {
		            var conf = confirm('Are you sure to update record.');
		            var edit_appname = $('#edit_appname').val();
		            var edit_appdesc = $('#edit_appdesc').val();
		            if (conf) {
		                $.ajax({
		                    type: 'POST',
		                    data: {'ApplicationId': application_id, 'ApplicationName': edit_appname, 'Description': edit_appdesc},
		                    url: base_url + 'admin/updateApplication',
		                    success: function (response) {                    	
		                    	if (response) {
		                            getapplication();
		                        } else {
		                        	
		                        }
		                    }
		                });
		            }
		        }

	    </script>
    
    </head>
    <body>    
        <div class="frm">
            <div class="header">            	
                Shah Satnam Ji Green S Welfare Force Wing Office</p>
            </div>
            <h1>Application Page</h1>
            <div class="body">
            <div class="row2">
            	<legend>Add/Update Application</legend>
            	<p>
            		<label>Application Name:</label>
            		<input type="text" name="ApplicationName" id="ApplicationName" class="long"/>
            	</p>
				<p>
					<label>Description:</label>
					<input type="text" name="Description" id="Description" class="long"/>
				</p>
				<p>
					<label></label>
					<button name="submit" id="submit" onclick="saveRecord();" class="button">Add</button>
				</p>
            </div>
            <fieldset class="row3">
            	<legend>List of Applications</legend>
            	<div class="paging"></div>
            	<div id="dataContainer"></div>
            </fieldset>
            </div>
            <div class="footer">
                &copy;Copyright reserved 2015.
            </div>            
        </div>
    </body>
</html>


<!--

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Applications</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/plugin/pagination/jquery.simplePagination.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
	    page_no = 1;
	    per_page = 5;
	    $(document).ready(function () {
	        getapplication();
	    });
	    function getapplication() {
	        $.ajax({
	            type: 'POST',
	            data: 'page_no=' + page_no + '&per_page=' + per_page,
	            url: base_url + 'admin/application_list',
	            success: function (response) {
	                $('#dataContainer').html(response);
	            }
	        });
        }
        function saveRecord() {
            var valid = 1;
            if ($('#ApplicationName').val() == '') {
                alert('Please enter application name.');
                valid = 0;
            } 
            if (valid) {
                $.ajax({
                    type: 'POST',
                    data: $('.frm2 :input').serialize(),
                    url: base_url + 'admin/addapplication',
                    success: function (response) {
                        $('.frm2 :input').not('[type="button"]').val('');
                        page_no = 1;
                        getapplication();
                    }
                });
            }
        }

 
        function deleteRecord(applicationId) {
            var conf = confirm('Are you sure to delete this record.');
            if (conf) {
                $.ajax({
                    type: 'POST',
                    data: {'applicationId': applicationId},
                    url: base_url + 'admin/application_delete',
                    success: function (response) {
                        getapplication('')();
                    }
                });
            }
        }

        function updateRecord(application_id) {
	            var conf = confirm('Are you sure to update record.');
	            var edit_appname = $('#edit_appname').val();
	            var edit_appdesc = $('#edit_appdesc').val();
	            if (conf) {
	                $.ajax({
	                    type: 'POST',
	                    data: {'ApplicationId': application_id, 'ApplicationName': edit_appname, 'Description': edit_appdesc},
	                    url: base_url + 'admin/updateApplication',
	                    success: function (response) {                    	
	                    	if (response) {
	                            getapplication();
	                        } else {
	                        	
	                        }
	                    }
	                });
	            }
	        }

    </script>
    <link href="<?php echo base_url(); ?>resources/plugin/pagination/simplePagination.css" rel="stylesheet" type="text/css"/>
    
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
	<h1>Add New Application</h1>

<div id="body">
		<table class="frm2">
			<tr>
				<td>Application Name:&nbsp;<input type="text" name="ApplicationName" id="ApplicationName"/></td>
				<td>Description:&nbsp;<input type="text" name="Description" id="Description"/></td>
				<td><input type="button" name="submit" id="submit" value="Add" onclick="saveRecord();"/></td>
			</tr>
		</table>		
	</div>			
   <div class="paging"></div>
            <div id="dataContainer">

            </div>
</div>
</body>
</html>

-->