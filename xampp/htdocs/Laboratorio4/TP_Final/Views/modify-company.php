<?php
    require_once('header.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de empresas</h2>
            <table class="table table-success table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($companyList as $value){                                
                ?>
                <tr>
                    <td><?php echo $value->getCompanyName() ?></td>
                    <td><?php echo $value->getCompanyCity() ?></td>
                    <td><?php echo $value->getCompanyDescription() ?></td>
                    <td><?php echo $value->getCompanyEmail() ?></td>
                    <td><?php echo $value->getCompanyPhoneNumber() ?></td>
                </tr>
                <?php                              
                    }
                ?>
            </tbody>
            </table>
        </div>
        <div class="container">
            <h2 class="mb-4">Modificar empresa</h2>
            <form action="<?php echo FRONT_ROOT ?>Company/ModifyCompany" method="post" class="bg-light-alpha p-5">
            <div class="row">                         
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Name</label>
                                   <input type="text" name="companyName" value="<?php echo $value->getCompanyName(); ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">City</label>
                                   <input type="text" name="companyCity" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-10 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Description</label>
                                   <input type="text" name="companyDescription" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Email</label>
                                   <input type="email" name="companyEmail" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Phone</label>
                                   <input type="text" name="companyPhoneNumber" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Modificar</button>
            </form>
        </div>
    </section>
</main>
<?php 
  include_once('footer.php');
?>