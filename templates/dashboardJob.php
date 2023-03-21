   <div class="row">
      <div class="col">
         <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-4">
               <h5 class="card-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                     <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                  </svg> Munkahelyek</h5>
               <ul class="list-group list-group-flush">
                  <!--Foreach-->
                  <?php foreach ($params["job"] as $job) { ?>
                     <hr>
                     <li class="list-group-item">Cégnév: <strong><?php echo $job['cegnev']; ?></strong></li>
                     <li class="list-group-item">Kezdés dátuma: <strong><?php echo $job['kezdes_datuma']; ?></strong></li>
                     <li class="list-group-item">Befejezes dátuma: <strong><?php echo $job['befejezes_datuma']; ?></strong></li>
                     <li class="list-group-item">Munkakör: <strong><?php echo $job['munkakor']; ?></strong></li>
                     <!--End Foreach-->
                  <?php } ?>
                  <div class="d-inline-block">
                     <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModal3">
                        szerkesztés
                     </button>
                  </div>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!--Modal-->
   <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Munkahelyek szerkesztése</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <h5 class="card-title text-primary mb-2">Rögzített Munkehelyek</h5>
               <!--Form-->
               <form method="POST" action="/update-job">
                  <div>
                     <!--Foreach-->
                     <?php foreach ($params["job"] as $job) { ?>
                        <div class="mb-3">
                           <label for="full-name" class="form-label"><strong>Cégnév</strong></label>
                           <input type="text" class="form-control" id="compname_<?php echo ($job['id']) ?>" name="compname_<?php echo ($job['id']) ?>" value="<?php echo $job['cegnev']; ?>">
                        </div>
                        <div class="mb-3">
                           <label for="full-name" class="form-label">Kezdés dátuma</label>
                           <input type="date" class="form-control" id="startDate_<?php echo ($job['id']) ?>" name="startDate_<?php echo ($job['id']) ?>" value="<?php echo $job['kezdes_datuma']; ?>">
                        </div>
                        <div class="mb-3">
                           <label for="full-name" class="form-label">Befejezés Dátuma</label>
                           <input type="date" class="form-control" id="endDate_<?php echo ($job['id']) ?>" name="endDate_<?php echo ($job['id']) ?>" value="<?php echo $job['befejezes_datuma']; ?>">
                        </div>
                        <div class="mb-3">
                           <label for="full-name" class="form-label">Munakör</label>
                           <input type="text" class="form-control" id="position_<?php echo ($job['id']) ?>" name="position_<?php echo ($job['id']) ?>" value="<?php echo $job['munkakor']; ?>">
                        </div>
                     <?php } ?>
                     <!--End Foreach-->
                  </div>

                  <!--Dynamic Input Containers-->
                  <div id="inputsContainers"></div>

                  <!--//Buttons Container-->
                  <div id="buttonsContainer" class="m-3">
                     <small class="card-title text-success mb-2">További Munkahely Hozzáadása</small>

                     <!--//Add Remove button container-->
                     <div class="d-flex">
                        <button id="addInputs" type="button" class="button btn btn-info m-1 btn-sm text-white"><strong>+</strong></button><br>
                        <button id="removeInputs" type="button" class="button btn btn-danger m-1 btn-sm"><strong>-</strong></button><br>
                     </div>
                     <!--//Add Remove button container-->

                     <!--//Form submit button-->
                     <button id="submit" type="submit" class="btn btn-success mt-3">Módosít</button>
                  </div>
                  <!--//Buttons Container-->
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Vissza</button>
            </div>
         </div>
      </div>
   </div>
   <!--DaschboardJob Javascript !-->
   <script src="js/dashboardJob.js"></script>