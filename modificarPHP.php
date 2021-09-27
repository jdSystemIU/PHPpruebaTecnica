<?php
include('conexion.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prototipo de formulario para crear y modificar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/e639b95e7d.js" crossorigin="anonymous"></script>

</head>
 
<body>
  <form action="indexPHP.php" method="POST">

  <h2><em>MODIFICAR EMPLEADO</em></h2>  

  <div class="alert alert-primary" role="alert">
  Los campos con asteriscos (*) son obligatorios
</div>
<div class="alert alert-danger">Cuidado estas modificando información importante.</div>
<div class="form-group">
<?php
$idEmpleado = $_GET['modificar'];//es la id llamada modificar que obtengo desde la URL
$sql="SELECT * FROM `empleados` WHERE `id` = $idEmpleado";
$result=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($result);
echo $idEmpleado;
?>
  <div class="form-group">
    <?php echo '<p>Nombre completo *<input type="text" name="nombre" placeholder="Nombre completo del empleado" value ="'.$mostrar['nombre'].'"></p>'; ?>
     <!--<p>Nombre completo *<input type="text" name="nombre" placeholder="Nombre completo del empleado" value =""></p>-->
  </div>
      <div class="form-group">
      <?php echo '<p>Correo electrónico *<input type="text" name="email" placeholder="Correo electrónico" value ="'.$mostrar['email'].'"></p>'; ?>
      </div>

      <div class="form-group">
      <div class="checkbox-inline">
  <label>
     <p>Sexo *

    <input type="checkbox" name="sexoCheckbox" value="M">
    Masculino
    <input type="checkbox" name="sexoCheckbox" value="F">
    Femenino
    </p>
  </label>
</div>

      <div class="form-group">
     <p>Area *

  <select>
    <option value =1>Administración</option>
  </select>
      </p>

      <div class="form-group">
     <p>Descripcion *<input type="text" name="descripcion" placeholder="Descripcion de la experiencia del empleado"></p>
  </div>
</div>
  <div class="checkbox-inline">
  <label>
    <input type="checkbox" name="checkBoletin" value="1">
    Deseo recibir boletín informativo
  </label>
</div>
<div>
<p></p>
<div class="checkbox-inline">
  <label>
     Roles *

    <input type="checkbox" value="Desarrollador">
    Profesional de proyectos - Desarrollador
    
  </label>
  <div>
    <input type="checkbox" value="gerenteEstrategico">
    Gerente estratégico
    
  </div>
    <input type="checkbox" value="auxiliarAdministrativo">
    Auxiliar administrativo
</div>
<p></p>
     <input class="btn btn-primary" name="Modificar" type="submit" value="Guardar Cambios" />
  </form>
  <i class="fas fa-camera"></i>

</body>
</html>