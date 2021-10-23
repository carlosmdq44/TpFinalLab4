<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          <div class="bg-body mx-0 w-50">
                <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Add Company</h1>
            </div>
               <form 
                    action="<?php echo FRONT_ROOT ?>Company/Add" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-transparent text-primary border border-primary row">
                    <div class="row">                         
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Name</label>
                                   <input type="text" name="companyName" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Cuit</label>
                                   <input type="text" name="cuit" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">City</label>
                                   <input type="text" name="companyCity" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Description</label>
                                   <input type="text" name="companyDescription" value="" class="form-control"required>
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Email</label>
                                   <input type="email" name="companyEmail" value="" class="form-control"required>
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Phone</label>
                                   <input type="text" name="companyPhoneNumber" value="" class="form-control"required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary btn-inline btn-lg">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Home/Logout3" class="btn btn-danger btn-inline btn-lg ml-3">Volver al menu</a>

               </form>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
