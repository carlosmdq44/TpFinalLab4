
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Postulacion</h2>
            <form action="<?php echo FRONT_ROOT ?>Appointment/Add" method="post" class="bg-light-alpha p-5">
                <div class="col-lg-4" style="padding-left: 0px;">
                    <div class="form-group">
                            <label for=""><strong>Empresa: </strong> <?php echo $companyId ?> </label>
                    </div>
                </div>
                <div class="col-lg-4" style="padding-left: 0px;">
                    <div class="form-group">
                            <label for=""><strong>Puesto Laboral: </strong> <?php echo $job ?> </label>
                    </div>
                </div>                               
                <div class="col-lg-8" style="padding-left: 0px;">
                    <div class="form-group">
                            <label for=""> <strong> Mensaje </strong> </label>
                            <input type="text" name="message" value="" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4" style="padding-left: 0px;">
                    <div class="form-group">
                            <label for=""> <strong> Cargar CV </strong></label>
                            <input type="file" name="cv" value="">
                    </div>
                </div>
                <div style="text-align: center; display: flex; align-items: center; justify-content: center;">
                    <button type="submit" name="button" class="btn btn-dark d-block">Agregar</button>
                </div>
            </form>
        </div>
    </section>
</main>