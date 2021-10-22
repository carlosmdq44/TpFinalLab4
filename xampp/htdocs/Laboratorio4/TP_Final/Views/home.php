<?php require_once('header.php'); ?>
<main class="py-5"> 
     <div class="bg-body mx-0 w-50">
          <h1 class="text-center font-monospace" style="font-family: myFuente; font-size: 60px; font-weight: bold; color:blue;">Bolsa de Empleo IT</h1>
     </div>
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="div-login"> 
                    <form 
                         action="<?php echo FRONT_ROOT."User/Login"?>" 
                         method="post"  
                         class="login-form p-3 mb-2 bg-transparent text-white border border-primary">
                         <!--class="login-form bg-dark-alpha p-5 text-white"-->

                         <div class="form-group">
                              <label for="user">Email</label>
                              <input type="text" name="user" class="form-control form-control-lg" placeholder="Ingresar usuario">
                         </div>
                         <button class="btn btn-primary btn-block btn-lg" name="btnLogin" type="submit">Login</button>
                    </form>
               </div>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>