<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD Sucursales FORM -->
      <div class="card card-body">
        <form action="saveSucursales.php" method="POST">
          <div class="form-group">
            <input type="text" name="Municipio" class="form-control" placeholder="ID Sucursal" autofocus>
          </div>
          <div class="form-group">
            <input name="Colonia" rows="2" class="form-control" placeholder="Direccion"></input>
          </div>
          <div class="form-group">
            <input type="TEXT" name="Avenida" class="form-control" placeholder="Num Empleados"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Numero" class="form-control" placeholder="Nom Sucursal"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Nombre_Sucursal" class="form-control" placeholder="Telefono"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Contacto" class="form-control" placeholder="ID Empleado"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Horario" class="form-control" placeholder="Num Gerente"></input>
          </div>
          <input type="submit" name="saveSucursales" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID sucursal</th>
            <th>Direccion</th>
            <th>Num Empleado</th>
            <th>Num Sucursal</th>
            <th>Telefono</th>
            <th>ID Empleado</th>
            <th>Num Gerente</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Sucursales";
          $result_Sucursales = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_Sucursales)) { ?>
          <tr>
            <td><?php echo $row['Municipio']; ?></td>
            <td><?php echo $row['Colonia']; ?></td>
            <td><?php echo $row['Avenida']; ?></td>
            <td><?php echo $row['Numero']; ?></td>
            <td><?php echo $row['Nombre_Sucursal']; ?></td>
            <td><?php echo $row['Contacto']; ?></td>
            <td><?php echo $row['Horario']; ?></td>
            <td>
              <a href="edit.php?Id_Local=<?php echo $row['Id_Local']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deletetbl_Sucursal.php?Id_Local=<?php echo $row['Id_Local']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>