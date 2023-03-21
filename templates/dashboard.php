<div class="p-2">
    <!--Session Check after modified form-->
    <?php if (
        isset($_SESSION["update-profil"])
        && $_SESSION["update-profil"] == true
        && !isset($_SESSION["err-img-max"])
        && isset($_SESSION["err-img-max"]) != true
        && !isset($_SESSION["err-img-type"])
        && isset($_SESSION["err-img-type"]) != true
    ) { ?>
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between mt-4" role="alert">
            <strong>Sikeres Módosítás!</strong>
            <button class="close btn btn-success btn-sm" data-dismiss="alert" aria-label="Close">
                ok
            </button>
        </div>
    <?php } ?>
    <!--IMG max count-->
    <?php if (
        isset($_SESSION["err-img-max"])
        && $_SESSION["err-img-max"] == true
    ) { ?>
        <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between mt-4" role="alert">
            <strong>Sikertelen Módosítás! Maximum 3db kép tölthető fel!</strong>
            <button class="close btn btn-success btn-sm" data-dismiss="alert" aria-label="Close">
                ok
            </button>
        </div>
    <?php } ?>
    <!-- IMG bad type-->
    <?php if (
        isset($_SESSION["err-img-type"])
        && $_SESSION["err-img-type"] == true
    ) { ?>
        <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between mt-4" role="alert">
            <strong>A képek típusa nem megfelelő, így nem tölthető fel!</strong>
            <button class="close btn btn-success btn-sm" data-dismiss="alert" aria-label="Close">
                ok
            </button>
        </div>
    <?php } ?>
</div>
<!--Delete Sessions after modified form-->
<?php unset($_SESSION["update-profil"]) ?>
<?php unset($_SESSION["err-img-max"]) ?>
<?php unset($_SESSION["err-img-type"]) ?>

<div class="container d-flex mt-5">
    <div class="row">
        <div class="col">
            <?php if (empty($params["pics"])) { ?>
                <img class="card-img-top" src="./images/default.png">
            <?php } else { ?>
                <?php foreach ($params["pics"] as $image) { ?>
                    <!--Primary Profile Img-->
                    <div class="card">
                        <?php if ($image["fokep"] == 1 && $image["eleresi_ut"] != "") { ?>
                            <img class="card-img-top" src="<?php echo $image["eleresi_ut"] ?>">
                        <?php } else {
                            //Secondaray Images
                            $secondaryImages[] = $image["eleresi_ut"];
                        } ?>
                    </div>
            <?php }
            } ?>
            <?php if (!empty($secondaryImages)) { ?>
                <div class="card">
                    <div class="card-body ">
                        <div class="row">
                            <?php foreach ($secondaryImages as $key => $secondaryImage) { ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-1">
                                    <img class="card-img" src="<?php echo $secondaryImage ?>">
                                </div>
                                <?php if ($key == 0 && count($secondaryImages) < 2) { ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-1">
                                        <img class="card-img" src="./images/default.png">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-1">
                                        <img class="card-img" src="./images/default.png">
                                    </div>
                                <?php } ?>
                                <?php if ($key == 0 && count($secondaryImages) == 2) { ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 p-1">
                                        <img class="card-img" src="./images/default.png">
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card">
                    <div class="card-body d-flex justify-content-center align-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-fluid m-1" src="../images/default.png" style="max-width:100%; height:auto;">
                            </div>
                            <div class="col-sm-4">
                                <img class="img-fluid m-1" src="../images/default.png" style="max-width:100%; height:auto;">
                            </div>
                            <div class="col-sm-4">
                                <img class="img-fluid m-1" src="../images/default.png" style="max-width:100%; height:auto;">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!--Personal info-->
            <div class="card-body">
                <?php foreach ($params["personal"] as $param) { ?>
                    <h5 class="card-title mt-3 mb-2 text-center"><strong><?php echo $param["teljes_nev"]; ?></strong></h5>
                    <p class="card-text"><?php echo $param['bemutatkozas']; ?></p>
            </div>
            <!--Jobs-->
            <div class="mt-3">
                <?php include("templates/dashboardJob.php"); ?>
            </div>
        </div>
        <!--Profil info-->
        <div class="col-md-8 mt-3">
            <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-4">
                    <h5 class="card-title text-primary">
                        <i class="bi bi-1-circle-fill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                            Profil információk
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item  mt-1">Email: <strong> <?php echo $param['email']; ?></strong></li>
                        <li class="list-group-item mt-1">Telefonszámok:<strong> <?php echo $param['telefonszamok']; ?></strong></li>
                        <li class="list-group-item mt-1">Születési hely:<strong> <?php echo $param['szuletesi_hely']; ?></strong></li>
                        <li class="list-group-item mt-1">Születési dátum:<strong> <?php echo $param['szuletesi_datum']; ?></strong></li>
                        <li class="list-group-item mt-1">Állampolgárság:<strong> <?php echo $param['allampolgarsag']; ?></strong></li>
                        <li class="list-group-item mt-1">Hobbik:<strong> <?php echo $param['hobbik']; ?></strong></li>
                        <div class="d-inline-block">
                            <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModal">
                                szerkesztés
                            </button>
                        </div>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <!--Schools-->
            <?php include("templates/dashboardSchool.php"); ?>
        </div>
    </div>
</div>
<!--MODAL-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profil Információk Szerkesztése</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/modified-profile" enctype="multipart/form-data">
                    <div>
                        <div class="mb-3">
                            <label for="profile-image" class="form-label"><strong>Profilkép</strong></label>
                            <input class="form-control" type="file" id="profile-image" name="profile-image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <!--Foreach-->
                            <?php foreach ($params["personal"] as $param) { ?>
                                <label for="full-name" class="form-label"><strong>Teljes név</strong></label>
                                <input type="text" class="form-control" id="full-name" name="full-name" value="<?php echo $param['teljes_nev']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Cím</strong></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $param['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone-numbers" class="form-label"><strong>Telefonszámok</strong></label>
                            <input type="text" class="form-control" id="phone-numbers" name="phone-numbers" value="<?php echo $param['telefonszamok']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="birth-place" class="form-label"><strong>Születési hely</strong></label>
                            <input type="text" class="form-control" id="birth-place" name="birth-place" value="<?php echo $param['szuletesi_hely']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="birth-date" class="form-label"><strong>ületési dátum</strong></label>
                            <input type="date" class="form-control" id="birth-date" name="birth-date" value="<?php echo $param['szuletesi_datum']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="citizenship" class="form-label"><strong>Állampolgárság</strong></label>
                            <input type="text" class="form-control" id="citizenship" name="citizenship" value="<?php echo $param['allampolgarsag']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="hobbies" class="form-label"><strong>Hobbik</strong></label>
                            <input type="text" class="form-control" id="hobbies" name="hobbies" value="<?php echo $param['hobbik']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="hobbies" class="form-label"><strong>Bemutatkozás</strong></label>
                            <textarea type="text" class="form-control" id="introduction" name="introduction"><?php echo $param['bemutatkozas']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="secondary-images" class="form-label"><strong>Másodlagos képek</strong></label>
                            <small class="text-primary">Maximum 3 kép tölthető fel</small>
                            <input type="file" class="form-control" id="secondary-images" name="secondary-images[]" accept="image/*" multiple>
                        </div>
                        <!--END Foreach-->
                    <?php } ?>
                    <div>
                        <button type="submit" class="btn btn-success">Módosít</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Vissza</button>
            </div>
        </div>
    </div>
</div>