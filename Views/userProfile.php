<?php require_once('header.php'); ?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <div class="bg-body mx-0 w-50">
                <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Personal Information</h1>
            </div>
            <table class="table">
                <thead>
                    <tr class="table table-success table-striped">
                        <th scope="col">Carrera</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-secondary">
                        <th><?php echo $_SESSION['loggedUser']->getCareerId() ?></th>
                        <td><?php echo $_SESSION['loggedUser']->getFirstName() ?></td>
                        <td><?php echo $_SESSION['loggedUser']->getLastName() ?></td>
                        <td><?php echo $_SESSION['loggedUser']->getDni() ?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr class="table table-success table-striped">
                        <th scope="col">Telefono</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-secondary">
                        <th><?php echo $_SESSION['loggedUser']->getFileNumber() ?></th>
                        <td><?php echo $_SESSION['loggedUser']->getGender() ?></td>
                        <td><?php echo $_SESSION['loggedUser']->getBirthDate() ?></td>
                        <td><?php echo $_SESSION['loggedUser']->getPhoneNumber() ?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr class="table table-success table-striped">
                        <th colspan="4" style="text-align:center;">Email</th>
                    </tr>
                    <td>
                         <a type="submit" href="<?php echo FRONT_ROOT ?> Job/ShowProfileView3" class="btn btn-success p-auto">Historial Postulaciones Laborales</a>
                    </td>
                </thead>
                <tbody>
                    <tr class="table-secondary">
                        <td colspan="4" style="text-align:center;"><?php echo $_SESSION['loggedUser']->getEmail() ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?php echo FRONT_ROOT ?>Home/Logout4" class="btn btn-danger btn-block btn-lg">Volver al menu</a>
        </div>
    </section>
</main>
<?php require_once('footer.php'); ?>