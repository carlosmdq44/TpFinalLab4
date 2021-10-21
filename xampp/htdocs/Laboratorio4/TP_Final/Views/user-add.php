<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Users</h2>
               <form 
                    action="<?php echo FRONT_ROOT ?>User/Add" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-transparent text-primary border border-primary">
                    <div class="row">                         
                         <div class="col-lg-10 mb-3">
                              <div class="input-group">
                                   <span class="input-group-text">Email</span>
                                   <input type="text" aria-label="email" name="email" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-5 mb-3">
                              <div class="input-group">
                                   <label class="input-group-text" for="">Password</label>
                                   <input type="text" name="password" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary btn-lg ml-auto d-block">Add</button>
               </form>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
