<html>
<head>

<title>Home</title>
  <style> 
	
	.contenido  form, table{
		
		width: 300px;
		margin: auto;
		
		
	}
 
    .imagen{
		
		margin:auto;
		width:80px;
		
	}
	
	
	.pie{
		
		position:fixed;  
		bottom:0px;
		width:500%
		font-size:0.7em;
		margin-bottom:15px;
	}
</style>
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 	
	
</head>
<body>

	<div>
		<span class="d-block p-2 bg-primary text-white"><center>@yield("cabecera")</center></span>
	</div>
	<div class="contenido">
		@yield("contenido")
	</div>
	
	<div class="pie">
	<!-- Footer -->
	<footer class="page-footer font-small mdb-color pt-4">

	    <!-- Footer Links -->
	    <div class="container text-center text-md-left">

	      <hr>

	      <!-- Grid row -->
	      <div class="row d-flex align-items-center">

	        <!-- Grid column -->
	        <div class="col-md-7 col-lg-8">

	          <!--Copyright-->
	          <p class="text-center text-md-left">@yield("pie") Alex Andrés Palencia Aragonéz  2021 © 
	            
	          </p>

	        </div>
	        <!-- Grid column -->

	      </div>
	      <!-- Grid row -->

	    </div>
	    <!-- Footer Links -->

  </footer>
  <!-- Footer -->	
	
</div>	
	

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>