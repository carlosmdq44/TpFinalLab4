<?php require_once('header.php'); ?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Agregar Usuario</h2>
            <form 
                action="<?php echo FRONT_ROOT ?>User/Add" 
                method="post" 
                class="bg-light-alpha p-5 mb-2 bg-secondary text-white fw-bolder border border-primary row">
                <div class="row">                         
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" name="firstName" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" name="lastName" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">File Number</label>
                                <input type="number" name="fileNumber" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                              <div class="input-group">
                                    <label for="">Gender</label>
                                   <label class="btn btn-primary p-2 ml-2">
                                        <input type="radio" name="gender" id="male" value="Male">Male
                                   </label>
                                   <label class="btn btn-primary p-2 ml-2">
                                        <input type="radio" name="gender" id="male" value="Male">Famale
                                   </label>
                              </div>
                         </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">Date Birth</label>
                                <input type="date" name="birthDate" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" name="phoneNumber" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label for="">DNI</label>
                                <input type="number" name="dni" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <select name="profile" class="form-control" aria-label="Default select example" required>
                                <option value="Student">Student</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="button" class="btn btn-primary btn-lg ml-0 d-inline">ADD</button>
               <a href="<?php echo FRONT_ROOT ?>Home/Logout5" class="btn btn-danger btn-inline btn-lg ml-3">Volver al menu</a>
            </form>
        </div>
    </section>
</main>
<?php require_once('footer.php'); ?>
