<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>State</title>
	<script type="text/javascript" src="<?php echo base_url(); ?>resources/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/plugin/pagination/jquery.simplePagination.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
	    page_no = 1;
	    per_page = 5;
	    $(document).ready(function () {
	        getCountry();	        
	        getState();	        
	    });
	    function getCountry() {
	        $.ajax({
	            type: 'POST',
	            data: null,
	            url: base_url + 'admin/getcountries',
	            success: function (response) {
	            	if(response){
	            		cnt = eval(response);
		            	$.each(cnt, function() {
	    					var option = $('<option>').attr('value', this.CountryId).html(this.CountryName);
	    					$('.slctcountry').append(option);
						});
	            	}else{
	            		var option = $('<option>').attr('value', null).html("--Select--");
	    					$('.slctcountry').append(option);
	            	}
	            }
	        });
        }

        function getState() {
	        $.ajax({
	            type: 'POST',
	            data: 'page_no=' + page_no + '&per_page=' + per_page,
	            url: base_url + 'admin/state_list',
	            success: function (response) {
	            	//alert(response);
	                $('#dataContainer').html(response);
	            }
	        });
        }        
        function saveRecord() {
            var valid = 1;
            if ($('#StateName').val() == '') {
                alert('Please enter State name.');
                valid = 0;
            } 
            if (valid) {
            	//alert($('#StateName').val());
                $.ajax({
                    type: 'POST',
                    data: $('.frmstate :input').serialize(),
                    url: base_url + 'admin/addState',
                    success: function (response) {
                    	alert(response);
                        $('.frmstate :input').not('[type="button"]').val('');
                        page_no = 1;
                        getState();
                    }
                });
            }
        }
        
        function deleteRecord(StateId) {
            var conf = confirm('Are you sure to delete this record.');
            if (conf) {
                $.ajax({
                    type: 'POST',
                    data: {'StateId': StateId},
                    url: base_url + 'admin/State_delete',
                    success: function (response) {
                        getState();
                    }
                });
            }
        }

	        function updateRecord(State_id) {
	            var conf = confirm('Are you sure to update state name.');
	            var edit_name = $('#edit_name').val();
	            if (conf) {
	                $.ajax({
	                    type: 'POST',
	                    data: {'StateId': State_id, 'StateName': edit_name},
	                    url: base_url + 'admin/updateState',
	                    success: function (response) {                    	
	                    	if (response) {
	                            getState();
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
	<h1>Add State!</h1>
	<div id="body">
		<table class="frmstate">
			<tr>
				<td>Select Country:
					<select class="slctcountry">			        	    
			        </select>
				</td>
				<td>State Name:<input type="text" name="StateName" id="StateName"/></td>
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