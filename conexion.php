<?php
    $conexion = mysqli_connect('localhost', 'root','','bd_empresa')or die(mysqli_error($mysqli));
    
    decidirAccion($conexion);

    function decidirAccion($conexion){
        if(isset($_POST['Guardar'])){
            echo 'entra a guardar';
            //validandoDatos();
            insert($conexion);
        }
        if(isset($_GET['eliminar'])){
            echo 'Escuchando eliminar';
            eliminar($conexion);
        }
    }

    function insert($conexion){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $sexoCheckbox = $_POST['sexoCheckbox'];
        $area_id = $_POST['area_id'];
        $boletin = $_POST['checkBoletin'];
        $descripcion = $_POST['descripcion'];
        echo 'boletinequivalea'.$boletin.'nada?';
        //haciendo conversion de boletion si es 1 es verdadero de lo contrario falso
        
        $query = "INSERT INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) 
        VALUES (NULL, '$nombre ', '$email', '$sexoCheckbox', '1', '$boletin', '$descripcion')";
        
        mysqli_query($conexion, $query);
        mysqli_close($conexion);
        $lmaokai = 'XD';
        header("Location: indexPHP.php?errorMensaje=".$sexoCheckbox."&".$boletin);

    }

    function eliminar($conexion){
        $id = $_GET['eliminar'];
        $queryEliminar = "DELETE FROM `empleados` WHERE `empleados`.`id` = $id";
        echo 'intentando eliminar';
        mysqli_query($conexion, $queryEliminar);
        mysqli_close($conexion);
        header("Location: indexPHP.php");
    }
    /*
    function mostrarDatos($conexion){
        $query = "SELECT * FROM `empleados`";
        $result = mysqli_query($conexion, $query);
        while($fila = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<tr>".$fila['id'];
            echo "<tr>".$fila['nombre'];
            echo "<tr>".$fila['email'];
            echo "<tr>".$fila['sexo'];
            echo "<tr>".$fila['area_id'];
            echo "<tr>".$fila['boletin'];
            echo "<tr>".$fila['descripcion'];
            echo "<tr>";
        }
        mysqli_close($conexion);
    }
    */
    function validandoDatos(){
        echo 'entro a validar';
    if (isset($_POST['Guardar'])) {
    echo 'entra guardar';
    if (isset($_POST['sexoCheckbox']) && $_POST['sexoCheckbox'] == 'M' ||  $_POST['sexoCheckbox'] == 'F'){
      
    }else{
      echo '<div class="alert alert-danger">Debes elegirSexo.</div>';
    }
    }
    }
?>