<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Empresas</h2>
               <table class="table table-success table-striped">
                    <thead>
                         <th>Id</th>
                         <th>Name</th>
                         <th>City</th>
                         <th>Description</th>
                         <th>Email</th>
                         <th>Phone Number</th>
                         <th>Action</th>
                    </thead>
                    <tbody> 
                         <?php foreach($companyList as $company) { ?>
                              <tr>
                                   <td><?php echo $company->getCompanyId(); ?></td>
                                   <td><?php echo $company->getCompanyName(); ?></td>
                                   <td><?php echo $company->getCompanyCity(); ?></td>
                                   <td><?php echo $company->getCompanyDescription(); ?></td>
                                   <td><?php echo $company->getCompanyEmail(); ?></td>
                                   <td><?php echo $company->getCompanyPhoneNumber(); ?></td>
                                   <td>
                                        <!--a type="submit" href="<!?php echo FRONT_ROOT ?>Company/ModifyCompany/<!?php echo $company->getCompanyId() ?>" class="btn btn-success p-auto">Edit</a-->
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Company/ShowModifyView" class="btn btn-success p-auto">Edit</a>
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Company/RemoveCompany/<?php echo $company->getCompanyId() ?>" class="btn btn-danger p-auto">Delete</a> 
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <a href="<?php echo FRONT_ROOT ?>Home/Logout3" class="btn btn-danger btn-block btn-lg">Volver al menu</a>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
