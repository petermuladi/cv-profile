<section class="vh-100 gradient-custom">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div>
                            <h2 class="fw-bold mb-2">Regisztráció</h2>
                            <p class="text-primary">Töltsd ki az Adatlapot a Reigsztrációhoz!</p>
                            <form method="post" action="/registration">
                                <div class="p-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                    <?php if (isset($_SESSION["duplicate-email"]) && $_SESSION["duplicate-email"] == true) { ?>
                                        <p class="text-danger">Ezzel az email címmel már regisztráltak! Válassz másik e-mail címet</p>
                                    <?php } ?>
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="password">Jelszó</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" required minlength="5" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="name">Teljes Név</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg" required />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="birthplace">Születési hely</label>
                                    <input type="text" id="birthplace" name="birthplace" class="form-control form-control-lg" required />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="birthdate">Születési dátum</label>
                                    <input type="date" id="birthdate" name="birthdate" class="form-control form-control-lg" required />
                                </div>
                                <button class="btn btn-outline-dark btn-lg px-5 mt-5" type="submit">Regisztrálok</button>
                            </form>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>