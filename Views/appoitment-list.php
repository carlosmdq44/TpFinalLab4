<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de imagenes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Student ID</th>
                         <th>Job Offer ID</th>
                         <th>CV</th>
                         <th>Message</th>
                         <th>Name</th>
                         <th>Ver</th>
                    </thead>
                    <tbody>
                        <?php if(isset($appoitmentList)) {
                            foreach($appoitmentList as $appoitment) { ?>
                                <tr>
                                    <td><?php echo $appoitment->getStudentId() ?></td> 
                                    <td><?php echo $appoitment->getJobOfferId() ?></td> 
                                    <td><?php echo $appoitment->getCv() ?></td> 
                                    <td><?php echo $appoitment->getMessage() ?></td> 
                                    <td><?php echo $appoitment->getName() ?></td> 
                                    <td><a href="<?php echo FRONT_ROOT ?>">Ver</a></td>
                                </tr>
                            <?php } 
                        } ?>
                    </tbody>
               </table>
          </div>
     </section>

     <section id="eliminar">
          <div class="container">
               <h2 class="mb-4">Subir imagen</h2>

               <form method="post" action="<?php echo FRONT_ROOT ?>Image/Upload" enctype="multipart/form-data" class="form-inline bg-light-alpha p-5">
                    <div class="form-group text-white">
                         <input type="file" name="image" value="" class="form-control-file ml-3">
                    </div>
                    <button type="submit" class="btn btn-danger ml-3">Subir</button>
               </form>
               <span><?php if(isset($message)) { echo $message; } ?></span>
          </div>
     </section>

</main>