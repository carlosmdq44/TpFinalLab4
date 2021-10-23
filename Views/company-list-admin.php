<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          <div class="bg-body mx-0 w-50">
                <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Company List</h1>
            </div>
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
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Company/ShowModifyView" class="btn btn-success p-auto">Edit</a>
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Company/RemoveCompany/<?php echo $company->getCompanyId() ?>" class="btn btn-danger p-auto">Delete</a> 
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <label>
                    <input type="text" name="nameCompany" style="height: 40px;" min="0" placeholder="Name">
                    <span style="font-weight:bolder; color:red; font-size:20px;">Buscar</span>
               </label>
               <a href="<?php echo FRONT_ROOT ?>Home/Logout3" class="btn btn-danger btn-inline mx-5 btn-lg">Volver al menu</a>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
