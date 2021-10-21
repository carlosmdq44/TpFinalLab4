<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Usuarios</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Email</th>
                         <th>Password</th>
                    </thead>
                    <tbody> 
                         <?php foreach($userList as $user) { ?>
                              <tr>
                                   <td><?php echo $user->getEmail(); ?></td>
                                   <td><?php echo $user->getPassword(); ?></td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
