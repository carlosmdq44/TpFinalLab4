<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="bg-body mx-0 w-50">
                    <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Add Job Offer</h1>
               </div>
               <form 
                    action="<?php echo FRONT_ROOT ?>JobOffer/Add" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-transparent text-primary border border-primary row">
                    <div class="row" style="margin:0; justify-content:center;">     
                        <div class="col-lg-10 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:17%; font-weight:bolder;">Company</label>
                                <select name="companyName" class="form-control" style="width:73%" aria-label="Default select example" required>
                                    <?php  foreach($companyList as $value) { ?>
                                        <option value="<?php echo $value->getCompanyName() ?>">
                                            <?php echo $value->getCompanyName() ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>                                       
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Title</label>
                                <input type="text" name="title" value="" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                    <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bold;">Published Date</label>
                                    <input type="date" name="publishedDate" value="" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                    <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bold;">Finish Date</label>
                                    <input type="date" name="finishDate" value="" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Task</label>
                                <input type="text" name="task" value="" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Skills</label>
                                <input type="text" name="skills" value="" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Salary</label>
                                <input type="number" name="salary" value="" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:34%; font-weight:bolder;">Job Position</label>
                                <select class="form-select" name="jobPositionId" style="width:66%;" aria-label="Default select example" required>
                                    <option selected>Open this job description</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>      
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:34%; font-weight:bolder;">Company ID</label>
                                <select class="form-select" name="companyId" style="width:66%;" aria-label="Default select example" required>
                                    <option selected>Open this select career ID</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>      
                    </div>
                    <button type="submit" name="button" style="width:25%; margin-left:10%;" class="btn btn-primary btn-inline btn-lg">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Job/LogoutMenuJob" style="width:25%; margin-right:24%;" class="btn btn-danger btn-inline btn-lg ml-auto">Volver al menu</a>
               
                </form>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
