<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="bg-body mx-0 w-50">
                    <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Job List</h1>
               </div>
               <form action="<?php echo FRONT_ROOT ?>Job/SearchFilter" method="post">
                    <div class="input-group mb-3">
                         <input type="text" name="description" class="form-control" style="width:80%" placeholder="Ingrese una palabra de la descripcion" aria-label="" aria-describedby="basic-addon2">
                         <button class="btn btn-primary btn-sm" style="width:20%" type="submit">Buscar</button>
                    </div>
               </form>
               <table class="table table-success table-striped">
                    <thead>
                         <th>jobPositionId</th>
                         <th>careerId</th>
                         <th>description</th>
                         <th>Action</th>
                    </thead>
                    <tbody class="table-info"> 
                         <?php foreach($jobListPdo as $jobBD) { ?>
                              <tr>
                                   <td><?php echo $jobBD->getJobPositionId(); ?></td>
                                   <td><?php echo $jobBD->getCareerId(); ?></td>
                                   <td><?php echo $jobBD->getDescription(); ?></td>
                                   <td>
                                        <a type="submit" name="button" href="<?php echo FRONT_ROOT ?>Job/ShowModifyView/<?php echo $jobBD->getJobPositionId(); ?>" class="btn btn-success p-auto">Edit</a>
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Job/DeleteJob/<?php echo $jobBD->getJobPositionId(); ?>" class="btn btn-danger p-auto">Delete</a> 
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <a href="<?php echo FRONT_ROOT ?>Job/LogoutMenuJob" class="btn btn-danger btn-block btn-lg">Volver al menu</a>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
