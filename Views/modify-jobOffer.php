<?php require_once('header.php'); ?>
<main class="py-5">
     <section id="listado" class="mb-5">
            <div class="container">
               <div class="bg-body mx-0 w-50">
                    <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Modify User List</h1>
               </div>
               <table class="table table-success table-striped">
                    <thead>
                         <tr>
                            <th>Job Offer Id</th>
                            <th>Title</th>
                            <th>Published Date</th>
                            <th>Finish Date</th>
                            <th>Task</th>
                            <th>Skills</th>
                            <th>Salary</th>
                            <th>Job Position</th>
                            <th>Company ID</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr class="table-secondary">
                              <td><?php echo $_SESSION['loggedJobOffer']->getJobOfferId() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getTitle() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getPublishedDate() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getFinishDate() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getTask() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getSkills() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getSalary() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getJobPosition() ?></td>
                              <td><?php echo $_SESSION['loggedJobOffer']->getCompanyId() ?></td>
                         </tr>
                    </tbody>
               </table>
          </div>
          <div class="container">
               <div class="bg-body mx-0 w-50">
                    <h1 class="font-monospace mb-4" style="font-family: myFuente; font-size: 40px; font-weight: bold; color:red;">Add Job Offer</h1>
               </div>
               <form 
                    action="<?php echo FRONT_ROOT ?>JobOffer/ModifyJobOffer" 
                    method="post" 
                    class="bg-light-alpha p-5 mb-2 bg-transparent text-primary border border-primary row">
                    <div class="row" style="margin:0; justify-content:center;">          
                        <input type="hidden" name="jobOfferId" value="<?php echo $_SESSION['loggedJobOffer']->getJobOfferId()?>">               
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Title</label>
                                <input type="text" name="title" value="<?php echo $_SESSION['loggedJobOffer']->getTitle() ?>" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                    <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bold;">Published Date</label>
                                    <input type="date" name="publishedDate" value="<?php echo $_SESSION['loggedJobOffer']->getPublishedDate() ?>" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                    <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bold;">Finish Date</label>
                                    <input type="date" name="finishDate" value="<?php echo $_SESSION['loggedJobOffer']->getFinishDate() ?>" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Task</label>
                                <input type="text" name="task" value="<?php echo $_SESSION['loggedJobOffer']->getTask() ?>" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Skills</label>
                                <input type="text" name="skills" value="<?php echo $_SESSION['loggedJobOffer']->getSkills() ?>" class="form-control" style="width:65%" required>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                            <div class="input-group">
                                <label class="input-group-text bg-info text-dark" style="width:35%; font-weight:bolder;">Salary</label>
                                <input type="number" name="salary" value="<?php echo $_SESSION['loggedJobOffer']->getSalary() ?>" class="form-control" style="width:65%" required>
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
                    <button type="submit" name="button" style="width:25%; margin-left:8%;" class="btn btn-primary btn-inline btn-lg">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Job/LogoutMenuJob" style="width:25%; margin-right:26%;" class="btn btn-danger btn-inline btn-lg ml-auto">Volver al menu</a>
               
                </form>
          </div>
     </section>
</main>
<?php require_once('footer.php'); ?>
