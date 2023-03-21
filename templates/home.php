<div class="container my-5">
  <h1 class="mt-5 p-5 text-center">Jelenleg <strong class="text-success"><?php echo (count($params[0])) ?></strong> CV Profil elérhető</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4">
  <?php foreach ($params[0] as $param) { ?>
      <div class="col">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
            <a href="/user/<?php echo ($param["id"])  ?>"><img src="<?php echo ($param["eleresi_ut"]) ?? "./images/default.png" ?>" alt="profil" class="rounded-circle" width="150"></a>
              <div class="mt-3">
                <h4><?php echo ($param["teljes_nev"]) ?></h4>
                <p class="text-secondary mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                  </svg> <?php echo ($param["telefonszamok"])  ?></p>
                <p class="text-muted font-size-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                  </svg> <?php echo ($param["email"]) ?></p>
                <a href="/user/<?php echo ($param["id"])  ?>"><button class="btn btn-outline-primary">Profil</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

