<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          <div class="bg-body mx-0 w-50">
                <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Career List</h1>
            </div>
               <table class="table table-success table-striped">
                    <thead>
                         <th>Career Id</th>
                         <th>Description</th>
                         <th>Active</th>
                         <th>Action</th>
                    </thead>
                    <tbody class="table-info"> 
                         <?php foreach($careerListpdo as $careerPdo) { ?>
                              <tr>
                                   <td><?php echo $careerPdo->getCareerId(); ?></td>
                                   <td><?php echo $careerPdo->getDescription(); ?></td>
                                   <td><?php echo $careerPdo->getActive(); ?></td>
                                   <td>
                                        <a type="submit" name="button" href="<?php echo FRONT_ROOT ?>Career/ShowModifyView/<?php echo $careerPdo->getCareerId(); ?>" class="btn btn-success p-auto">Edit</a>
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Career/DeleteCareer/<?php echo $careerPdo->getCareerId(); ?>" class="btn btn-danger p-auto">Delete</a> 
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <a href="<?php echo FRONT_ROOT ?>Career/ShowProfileCareerView" class="btn btn-danger btn-block btn-lg">Volver al menu</a>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
