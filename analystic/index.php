<html>
<head>
<title>My Google Dashboard</title>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#startdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$( "#enddate" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
 
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>
</head>
<body>
<div class="wrapper">
<h2>My DashBoard</h2>
<form id="reportForm" method="post" action="update_pages.php">
<h3>Generate Google Analytics Report</h3>
<div class="fields">
<label >Start Date</label>
<input id="startdate" name="startdate" type="text" placeholder="YYYY-MM-DD" class="linecons-calendar"/>
</div>
<div class="fields">
<label>Ends Date</label>
<input id="enddate" name="enddate" type="text" placeholder="YYYY-MM-DD" class="linecons-calendar"/> 
</div> 
<div class="fields">
<button type="submit" class="btn btn-default">Find Report</button>
</div>
</form>



</div>
<script type="text/javascript">
       $('document').ready(function(e)
	   { 
            //e.getPreventDefault();
			
			$("#reportForm").validate({
				  			
                rules: {
                    startdate: "required",
                    enddate: "required",
                 					
                },
                messages: {
                    startdate: "Please enter start date",
                    enddate: "Please enter end date",
              					
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });  

});
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:400,600,700');
body{
	margin 0;
	padding 0;
	font-family: 'Raleway', sans-serif;
	background-color: #fdfdfd;
}

.fields{
	margin-bottom: 15px;
}
.fields label{
	font-size: 12px;
	margin-bottom: 5px;
	display: block;
}
.fields input{
	width : 100%;
	padding: 5px  10px;
	height: 37px;
	border-radius: 2px;
	border: 1px solid #777;
	cursor: pointer;
}
.fields button{
	width : 150px;
	padding: 5px  10px;
	height: 37px;
	border-radius: 2px;
	text-align: center;
	margin: 10px auto;
	border: 1px solid #777;
	cursor: pointer;
}
.wrapper h2{
	font-size: 24px;
}
.wrapper{
max-width: 400px;
margin: 0 auto;
border: 1px solid #777;
padding: 20px;
background-color: #ddd;
}

@media (min-width: 768px){
	.wrapper{
transform: translate(-50%, -50%);
position: absolute;
top: 50%;
left: 50%;
}
}

</style>

</body>
</html>