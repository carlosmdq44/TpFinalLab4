<?php include_once("header.php"); ?>

<main class="d-flex align-items-center justify-content-center opacity-25">
    <div class="content">
        <div class="login-form p-5 mb-2 bg-transparent text-white border border-primary">
            <div class="d-flex mb-5 justify-content-around bg-primary text-white">
                <a href="<?php echo FRONT_ROOT?>Company/ShowAddView" class="btn btn-primary" aria-current="page">Company</a>
                <a href="#" class="btn btn-primary" aria-current="page">Jobs</a>
                <a href="<?php echo FRONT_ROOT?>Students/ShowAddView" class="btn btn-primary" aria-current="page">Student</a>
            </div>
            <a href="<?php echo FRONT_ROOT ?>Home/Login" class="btn btn-danger btn-block btn-lg">Exit</a>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>