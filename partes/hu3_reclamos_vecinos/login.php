<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}
?>
 <!-- head -->
 <?php include('../head.php') ?>
    <!-- fin head -->

<body>
</div>
	

		
</br>
<center>
<h1>INICIA SESIÓN</h1>
<td>
        <form method="POST" action="loginProceso.php">

            <div class="col-auto">
                <label for="email" >Email</label>
                <input type="email" id="email" name="email">
            

            
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="col-auto">
                <input  type="submit" class="btn btn-primary mb-3"></button>
            </div>
  
        </form>
    

</td>
</center>


</body>
</html>