<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Company</h2>
               <form 
                    action="<?php echo FRONT_ROOT ?>Company/Add" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-transparent text-primary border border-primary row">
                    <div class="row">                         
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Name</label>
                                   <input type="text" name="companyName" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">City</label>
                                   <input type="text" name="companyCity" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
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
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Phone</label>
                                   <input type="text" name="companyPhoneNumber" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-primary btn-lg ml-auto d-block">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Home/Logout3" class="btn btn-danger btn-block btn-lg">Volver al menu</a>

               </form>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
