<?php

include_once ("database_connection_open.php");

include("get_scan_id.php");

include("upload_img.php");

?>


<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Diabetes Retinopathy Detection</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="template/css/base.css">  
   <link rel="stylesheet" href="template/css/main.css">
   <link rel="stylesheet" href="template/css/vendor.css">

   <!-- script
   ================================================== -->
	<script src="template/js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">

	<style type="text/css">
		
		.white{
			color: white;
		}

	</style>

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header>

		<div class = "row">
			<div class="content-wrap-table">		   

				<div class="main-content-tablecell">

					<div class="row">

						<div class="col-twelve">
							<div class = "col-md-3">								
							</div>
							<div class = "col-md-6">
								<table id = "" class="white table table-responsive table-bordered">
								<h1>Prediction Results</h1>
								        <tr class = "table-active">
								            <td><b>Eye</b></td>			                    
								            <td><b>Class Id</b></td>
								            <td><b>Class Name</b></td>
								            <td><b>Result</b></td>
								        </tr>

								        <?php include("predict_results.php"); ?> 
								       
								    </table>
							</div>
						</div> <!-- /twelve --> 
					</div> <!-- /row -->  


   </header> <!-- /header -->   

   <!-- home
   ================================================== -->
   <section id="home" class="home-particles">

   	<div class="shadow-overlay"></div>

   	<div class="content-wrap-table">		   

		<div class="main-content-tablecell">

		   	<div class="row">
		   		
		   		<div class="col-twelve"> 				

				</div>  
		   	</div>   
		</div>  		   
	</div>    
   </section>    



   <!-- Java Script
   ================================================== --> 
   <script src="template/js/jquery-2.1.3.min.js"></script>
   <script src="template/js/plugins.js"></script>
   <script src="template/js/main.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>


<?php 

include_once("database_connection_close.php");

?>