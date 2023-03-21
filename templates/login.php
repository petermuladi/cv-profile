<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div>
              <h2 class="fw-bold mb-2">Bejelentkezés</h2>
              <p class="text-primary">Add meg az email címed és a jelszavad</p>
              <form method="post" action="/user-login">
                <div class="p-3">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="user email" required />
                </div>
                <div class="p-3">
                  <label class="form-label" for="jelszo">Jelszó</label>
                  <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="12345" required />
                </div>
                <?php if (isset($_SESSION["error"])) { ?> <p class="text-danger">Hibás felhasználónév vagy jelszó!</p> <?php } else { ?> <?php } ?>
                <button class="btn btn-outline-dark btn-lg px-5 mt-5" type="submit">Belépés</button>
              </form>
            </div>
            <div>
              <p class="mb-0 mt-5">Nincs még fiókod? <a href="/signup" class="text-50 fw-bold">Regisztrálj!</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>