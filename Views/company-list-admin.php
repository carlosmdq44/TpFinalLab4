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
                    <tbody class="table-info"> 
                         <?php foreach($companyListPdo as $company) { ?>
                              <tr>
                                   <td><?php echo $company->getCompanyId(); ?></td>
                                   <td><?php echo $company->getCompanyName(); ?></td>
                                   <td><?php echo $company->getCompanyCity(); ?></td>
                                   <td><?php echo $company->getCompanyDescription(); ?></td>
                                   <td><?php echo $company->getCompanyEmail(); ?></td>
                                   <td><?php echo $company->getCompanyPhoneNumber(); ?></td>
                                   <td>
                                        <a type="submit" name="button" href="<?php echo FRONT_ROOT ?>Company/ShowModifyView/<?php echo $company->getCompanyId(); ?>" class="btn btn-success p-auto">Edit</a>
                                        <a type="submit" href="<?php echo FRONT_ROOT ?>Company/DeleteCompany/<?php echo $company->getCompanyId(); ?>" class="btn btn-danger p-auto">Delete</a> 
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
               <form action="<?php echo FRONT_ROOT ?>Company/SearchFilter" method="post">
                    <div class="input-group mb-3">
                         <input type="text" name="name" class="form-control" style="width:80%" placeholder="Ingrese una nombre para buscar" aria-label="" aria-describedby="basic-addon2">
                         <button class="btn btn-primary btn-sm" style="width:20%" type="submit">Buscar</button>
                    </div>
               </form>
               <a href="<?php echo FRONT_ROOT ?>Home/Logout3" class="btn btn-danger btn-inline mx-auto btn-lg">Volver al menu</a>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
