<?php 
    include_once("header.php"); 
    include_once("nav.php"); 
?>

<main class="d-flex align-items-center justify-content-center opacity-25">
    <div class="content">
        <div class="login-form p-5 mb-2 bg-transparent text-white border border-primary">
            <div class="d-flex mb-5 justify-content-around bg-primary text-white">
                <a href="<?php echo FRONT_ROOT?>User/ShowAddView" class="btn btn-primary" aria-current="page">Add</a>
                <a href="<?php echo FRONT_ROOT?>User/ShowListView" class="btn btn-primary" aria-current="page">List</a>
            </div>
            <a href="<?php echo FRONT_ROOT ?>Home/Logout2" class="btn btn-danger btn-block btn-lg">Volver al menu</a>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>