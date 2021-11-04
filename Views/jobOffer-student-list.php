<?php include_once('header.php'); ?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Ofertas laborales</h2>
            
                <table class="table table-success table-stripe">
                    <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Descripcion</th>
                        <th>Salario</th>
                        <th>Accion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach($jobOfferList as $value){                                
                    ?>
                    <form action="<?php echo FRONT_ROOT ?>Appointment/ShowAddView" method="post">
                    <tr>
                        <td><?php echo $value['companyName'] ?></td>
                        <input type="hidden" name="company" value="<?php echo $value['companyName'] ?>">
                        <td><?php echo $value['description'] ?></td>
                        <input type="hidden" name="job" value="<?php echo  $value['description'] ?>">
                        <td><?php echo $value['salary'] ?></td>
                       <td><a type="submit" href="<?php echo FRONT_ROOT?>Appoitment/ShowAddView" class="btn" value="Postulation">Postularse</a></td>
                        </form>
                    </tr>
                    <?php                              
                        }
                    ?>
                </tbody>
                </table>
            
        </div>
        
    </section>
</main>