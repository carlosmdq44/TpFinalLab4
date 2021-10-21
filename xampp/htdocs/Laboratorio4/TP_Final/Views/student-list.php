<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de estudiantes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>StudentId</th>
                         <th>CareerId</th>
                         <th>Firstname</th>
                         <th>Lastname</th>
                         <th>Dni</th>
                         <th>Birthdate</th>
                         <th>Gender</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Active</th>
                    </thead>
                    <tbody> 
                         <?php foreach($studentList as $student) { ?>
                              <tr>
                                   <td><?php echo $student->getStudentId(); ?></td>
                                   <td><?php echo $student->getCareerId(); ?></td>
                                   <td><?php echo $student->getFirstName(); ?></td>
                                   <td><?php echo $student->getLastName(); ?></td>
                                   <td><?php echo $student->getDni(); ?></td>
                                   <td><?php echo $student->getBirthDate(); ?></td>
                                   <td><?php echo $student->getGender(); ?></td>
                                   <td><?php echo $student->getEmail(); ?></td>
                                   <td><?php echo $student->getPhone(); ?></td>
                                   <td><?php echo $student->getActive(); ?></td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
