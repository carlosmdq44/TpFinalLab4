<?php require_once('header.php'); ?>
<main class="py-5">
    <section id="listado" class="mb-5">
          <div class="container">
               <div class="bg-body mx-0 w-50">
                    <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Company List</h1>
               </div>
               <table class="table table-success table-striped">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Cuit</th>
                              <th>City</th>
                              <th>Description</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr class="table-secondary">
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyId() ?></td>
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyName() ?></td>
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyCuit() ?></td>
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyCity() ?></td>
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyDescription() ?></td>
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyEmail() ?></td>
                              <td><?php echo $_SESSION['loggedCompany']->getCompanyPhoneNumber() ?></td>
                         </tr>
                    </tbody>
               </table>
          </div>
          <div class="container">
               <div class="bg-body mx-0 w-50">
                    <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Modify Company</h1>
               </div>
               <form 
                    action="<?php echo FRONT_ROOT ?>Company/ModifyCompany" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-secondary text-white fw-bolder border border-primary row">
                    <div class="row">  
                         <input type="hidden" name="companyId" value="<?php echo $_SESSION['loggedCompany']->getCompanyId()?>">                       
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Name</label>
                                   <input type="text" name="companyName" value="<?php echo $_SESSION['loggedCompany']->getCompanyName(); ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text bg-info text-dark" style="width:105px; font-weight:bolder;">Cuit</label>
                                   <input type="text" name="cuit" value="<?php echo $_SESSION['loggedCompany']->getCompanyCuit() ?>" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">City</label>
                                   <input type="text" name="companyCity" value="<?php echo $_SESSION['loggedCompany']->getCompanyCity() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Description</label>
                                   <input type="text" name="companyDescription" value="<?php echo $_SESSION['loggedCompany']->getCompanyDescription() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Email</label>
                                   <input type="email" name="companyEmail" value="<?php echo $_SESSION['loggedCompany']->getCompanyEmail() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Phone</label>
                                   <input type="text" name="companyPhoneNumber" value="<?php echo $_SESSION['loggedCompany']->getCompanyPhoneNumber() ?>" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary ml-0 d-inline">Modificar</button>
                    <a href="<?php echo FRONT_ROOT ?>Company/ShowListViewAdmin" class="btn btn-danger btn-inline ml-3 btn-lg">Volver al menu</a>
               </form>
          </div>
    </section>
</main>
<?php 
  include_once('footer.php');
?>