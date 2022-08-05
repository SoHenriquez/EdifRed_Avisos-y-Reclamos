<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		
		$sentencia = $bd->query("SELECT * FROM usuario;");
      
		$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}

?>

   <!-- head -->
   <?php include('partes/head.php') ?>
    <!-- fin head -->



	
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">

</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><h3>TEST:</h3></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
		<form method="POST" action="test_2.php">
			<table>
				<tr>
					<td>TEXTO: </td>
					<td><input type="text" name="texto"></td>
				</tr>
				<tr>
					<td>NUMERO: </td>
					<td><input type="number" name="numero"></td>
				</tr>
				<tr>
					<td>FECHA </td>
					<td><input type="date" name="fecha"></td>
				</tr>
                <tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="Enviar"></td>
                </tr>
			
			</table>
		</form>
            </div>
            <div class="modal-footer">
            
            </div>
            </div>
        </div>
        </div>



	
		<!-- fin insert-->


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- SCRIPT ANTES DEL CERRAR BODY -->

    
</body>
 
    

	
