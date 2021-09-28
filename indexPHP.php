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

  <h2><em>Crear empleado</em></h2>  

  <div class="alert alert-primary" role="alert">
  Los campos con asteriscos (*) son obligatorios
</div>
<div class="form-group">

  <div class="form-group">
     <p>Nombre completo *<input type="text" name="nombre" placeholder="Nombre completo del empleado"></p>
  </div>
      <div class="form-group">
      <p>Correo electrónico *<input type="text" name="email" placeholder="Correo electrónico"></p>
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

  <select  name="area_id">
    <option value =1>Administrativa y Financiera</option>
    <option value =2>Ingeniería</option>
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
     <input class="btn btn-primary" name="Guardar" type="submit" value="Guardar" />
  </form>
  <i class="fas fa-camera"></i>
<p></p>
</div>
<h3><em>Lista de empleados</em></h3>  
<table>
  <thead>
    <th>id</th>
    <th>nombre</th>
    <th>email</th>
    <th>sexo</th>
    <th>area_id</th>
    <th>boletin</th>
    <th>descripcion</th>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM `empleados`";
    $result=mysqli_query($conexion,$sql);
    while($mostrar=mysqli_fetch_array($result)){
    ?>
    <tr>
      <td><?php echo $mostrar['id']?></td>
      <td><?php echo $mostrar['nombre']?></td>
      <td><?php echo $mostrar['email']?></td>
      <td><?php echo $mostrar['sexo']?></td>
      <td><?php 
      if($mostrar['area_id']=='1'){
        echo 'Administrativa y Financiera';
      }
      if($mostrar['area_id']=='2'){
        echo 'Ingenieria';
      }
      ?></td>
      <td><?php 
      if($mostrar['boletin']=='1'){
        echo 'Si';
      }else{
        echo 'No';
      }
      ?></td>
      <td><?php echo $mostrar['descripcion']?></td>
      <td><form method ="GET" id="form_update" action="modificarPHP.php">
        <input type ="hidden" name="id" value="<?php echo $mostrar['id']; ?>">
        <input type ="hidden" name="nombre" value="<?php echo $mostrar['nombre']; ?>">

        <input type ="hidden" name="email" value="<?php echo $mostrar['email']; ?>">

        <input type ="hidden" name="area_id" value="<?php echo $mostrar['area_id']; ?>">
        <input type ="hidden" name="descripcion" value="<?php echo $mostrar['descripcion']; ?>">


        <input type="submit" value="Modificar">
      </form></td>
      <td><form method ="GET" id="form_eliminar" action="indexPHP.php">
        <input type ="hidden" name="eliminar" value="<?php echo $mostrar['id']; ?>">
        <input type="submit" value="Eliminar">
      </form ></td>
      
    </tr>
    <?php
    }
    ?>

<?php
//$sexoCheckbox = array();

//array_push($sexoCheckbox, "Selecciona un sexo");

    if (isset($_GET['errorMensaje'])) {
    echo 'entra guardar';
    if (isset($_GETT['errorMensaje']) && $_GET['errorMensaje'] == '1' ||  $_GET['errorMensaje'] == '2'){
      
    }else{
      
      echo '<div class="alert alert-danger">Se ha guardado pero recuerda:</div>';
      echo '<div class="alert alert-danger">Debes elegirSexo.</div>';
    }
    }
    
//array_push($sexoCheckbox, "Selecciona un sexo");
?>
  </tbody>
</table>
</body>
</html>