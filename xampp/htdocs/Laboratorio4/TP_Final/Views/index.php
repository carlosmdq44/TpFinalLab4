<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="div-login">  
                    <form 
                         action="<?php echo FRONT_ROOT."Home/Login" ?>" 
                         method="post"  
                         class="login-form p-3 mb-2 bg-transparent text-white border border-primary">
                         <!--class="login-form bg-dark-alpha p-5 text-white"-->

                         <div class="form-group">
                              <label for="userName">Email</label>
                              <input type="text" name="username" class="form-control form-control-lg" placeholder="Ingresar usuario">
                         </div>
                         <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña">
                         </div>
                         <button class="btn btn-primary btn-block btn-lg" name="btnLogin" type="submit">Login</button>
                    </form>
               </div>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>