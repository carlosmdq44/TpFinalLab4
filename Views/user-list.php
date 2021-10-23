<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container-fluid">
               <h2 class="mb-4">Listado de Usuarios</h2>
               <table class="table table-success table-striped">
                    <thead>
                         <th>Student ID</th>
                         <th>Career ID</th>
                         <th>Firstname</th>
                         <th>Lastname</th>
                         <th>Dni</th>
                         <th>File Number</th>
                         <th>Gender</th>
                         <th>Birth Date</th>
                         <th>Email</th>
                         <th>Phone Number</th>
                         <th>Active</th>
                         <th>Profile</th>
                         <th>Action</th>
                    </thead>
                    <tbody> 
                         <?php foreach($userList as $user) { ?>
                              <tr>
                                   <td><?php echo $user->getStudentId(); ?></td>
                                   <td><?php echo $user->getCareerId(); ?></td>
                                   <td><?php echo $user->getFirstName(); ?></td>
                                   <td><?php echo $user->getLastName(); ?></td>
                                   <td><?php echo $user->getDni(); ?></td>
                                   <td><?php echo $user->getFileNumber(); ?></td>
                                   <td><?php echo $user->getGender(); ?></td>
                                   <td><?php echo $user->getBirthDate(); ?></td>
                                   <td><?php echo $user->getEmail(); ?></td>
                                   <td><?php echo $user->getPhoneNumber(); ?></td>
                                   <td><?php echo $user->getActive(); ?></td>
                                   <td><?php echo $user->getProfile(); ?></td>
                                   <td>
                                        <a href="<?php echo FRONT_ROOT ?>User/RemoveUser/<?php echo $user->getStudentId() ?>" class="btn btn-danger btn-block">Delete</a>
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <a href="<?php echo FRONT_ROOT ?>Home/Logout5" class="btn btn-danger btn-block btn-lg">Volver al menu</a>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
