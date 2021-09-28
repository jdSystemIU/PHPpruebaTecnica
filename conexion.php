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
        if(isset($_GET['modificar'])){
            echo 'Escuchando modificar';
            modificar($conexion);
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
        VALUES (NULL, '$nombre ', '$email', '$sexoCheckbox', '$area_id', '$boletin', '$descripcion')";
        
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
    function modificar($conexion){
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];
        $sexoCheckbox = $_GET['sexoCheckbox'];
        //$area_id = $_GET['area_id'];
        //$boletin = $_GET['checkBoletin'];
        $descripcion = $_GET['descripcion'];

        $queryModificar = "UPDATE `empleados` SET `nombre` = '".$nombre."', `email` = '".$email."', `sexo` = '".$sexoCheckbox."' WHERE `empleados`.`id` = '".$id."'";
        //$queryModificar = "UPDATE `empleados` SET `nombre` = '$nombre', `email` = '$email', `sexo` = 'M', 
        //`area_id` = '0', `boletin` = '1', `descripcion` = '$descripcion' WHERE `empleados`.`id` = $id";
        $result = mysqli_query($conexion, $queryModificar);
        if($result){
            echo "<script language ='JavaScript'>
            alert('Los datos se actualizaron');
            location.assign('indexPHP.php');
            </script>";
        }else{
            
            echo "<script language ='JavaScript'>
            alert('error al ejecutar la query en la database');
            location.assign('indexPHP.php');
            </script>";
        }
        
        mysqli_close($conexion);
        //header("Location: indexPHP.php");
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
      echo '<div class="alert alert-danger">Debes elegir SEXO.</div>';
    }
    }
    }
?>