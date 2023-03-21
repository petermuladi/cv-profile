   <div class="row mt-3">
      <div class="col-md-12">
         <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-4">
               <h5 class="card-title text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                     <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                     <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                  </svg> Iskolák</h5>
               <ul class="list-group list-group-flush">
                  <!--Foreach-->
                  <?php foreach ($params["school"] as $school) { ?>
                     <hr>
                     <li class="list-group-item">Intézmény neve: <strong><?php echo $school['intezmeny_neve']; ?></strong></li>
                     <li class="list-group-item">Kezdés dátuma: <strong><?php echo $school['kezdes_datuma']; ?></strong></li>
                     <li class="list-group-item">Befejezes dátuma: <strong><?php echo $school['befejezes_datuma']; ?></strong></li>
                     <li class="list-group-item">Szak: <strong><?php echo $school['szak']; ?></strong></li>
                     <!--End Foreach-->
                  <?php } ?>
                  <div class="d-inline-block">
                     <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModal2">
                        szerkesztés
                     </button>
                  </div>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!--Modal-->
   <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Iskolák szerkesztése</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <h5 class="card-title text-primary mb-2">Rögzített Iskolák</h5>
               <!--//FORM-->
               <form id="schoolForm" method="POST" action="/update-school">
                  <div class="mt-2">
                     <!--//*Foreach-->
                     <?php foreach ($params["school"] as $item) { ?>
                        <div class="mb-3">
                           <label for="full-name" class="form-label mt-2"><strong>Intézmény neve</strong></label>
                           <input type="text" class="form-control" id="institution_<?php echo ($item["id"]) ?>" name="institution_<?php echo ($item["id"]) ?>" value="<?php echo $item['intezmeny_neve']; ?>">
                        </div>
                        <div class="mb-3">
                           <label for="full-name" class="form-label">Kezdés dátuma</label>
                           <input type="date" class="form-control" id="start_<?php echo ($item["id"]) ?>" name="start_<?php echo ($item["id"]) ?>" value="<?php echo $item['kezdes_datuma']; ?>">
                        </div>
                        <div class="mb-3">
                           <label for="full-name" class="form-label">Befejezés dátuma</label>
                           <input type="date" class="form-control" id="end_<?php echo ($item["id"]) ?>" name="end_<?php echo ($item["id"]) ?>" value="<?php echo $item['befejezes_datuma']; ?>">
                        </div>
                        <div class="mb-3">
                           <label for="full-name" class="form-label">Szak</label>
                           <input type="text" class="form-control" id="major_<?php echo ($item["id"]) ?>" name="major_<?php echo ($item["id"]) ?>" value="<?php echo $item['szak']; ?>">
                        </div>
                     <?php } ?>
                     <!--//End Foreach-->
                  </div>
                  <!--//Dynamic Input Container-->
                  <div id="inputsContainer"></div>

                  <!--Button Container-->
                  <div id="buttonsContainer" class="m-3">
                     <small class="card-title text-success mb-2">További Iskola Hozzáadása</small>

                     <!--//Add Remove button container-->
                     <div class="d-flex">
                        <button id="addInputField" type="button" class="button btn btn-info m-1 btn-sm text-white"><strong>+</strong></button><br>
                        <button id="removeInput" type="button" class="button btn btn-danger m-1 btn-sm"><strong>-</strong></button><br>
                     </div>
                     <!--//Add Remove button container-->

                     <!--//Form submit button-->
                     <button id="submit" type="submit" class="btn btn-success mt-2">Módosít</button>
                  </div>
                  <!--/Button Container-->
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Vissza</button>
            </div>
         </div>
      </div>
   </div>
   <!-- DaschboardSchool Javascript -->
   <script src="js/dashboardSchool.js"></script>