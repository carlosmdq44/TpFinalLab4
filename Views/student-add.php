<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Student</h2>
               <form 
                    action="<?php echo FRONT_ROOT ?>Students/Add" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-transparent text-primary border border-primary">
                    <div class="row">                         
                         <div class="col-lg-10 mb-3">
                              <div class="input-group">
                                   <span class="input-group-text">First and last name</span>
                                   <input type="text" aria-label="First name" name="firstName" class="form-control">
                                   <input type="text" aria-label="Last name" name="lastName" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Dni</label>
                                   <input type="text" name="dni" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Bithdate</label>
                                   <input type="date" name="birthDate" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <span class="input-group-text">Gender</span>
                                   <label class="btn btn-primary p-2 ml-2">
                                        <input type="radio" name="gender" id="male" value="Male">Male
                                   </label>
                                   <label class="btn btn-primary p-2 ml-2">
                                        <input type="radio" name="gender" id="male" value="Male">Famale
                                   </label>
                              </div>
                         </div>
                         <div class="col-lg-5 mb-4">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Email</label>
                                   <input type="email" name="email" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Phone</label>
                                   <input type="text" name="phone" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                         <div class="input-group">
                                   <span class="input-group-text">Active</span>
                                   <label class="btn btn-primary p-2 ml-2">
                                        <input type="radio" name="gender" value="Yes">YES
                                   </label>
                                   <label class="btn btn-primary p-2 ml-2">
                                        <input type="radio" name="gender" value="No">NO
                                   </label>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-inline btn-lg">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Home/Logout3" class="btn btn-danger btn-inline btn-lg">Volver al menu</a>
               </form>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
