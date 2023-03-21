
//Fetch function to retrieve user data by ID from API endpoint
async function fetchById(idFromUser) {
   //construct the URL
   const url = `/api/user/${idFromUser}`;

   try {
      //fetch the data using the constructed URL
      let res = await fetch(url, {
         method: 'GET', // *GET
         headers: {
            'Content-type': 'application/json',
         },
      });

      if (res.ok == true) {
         return await res.json();
      }
      //if there is an error, display an error message to the user
   } catch (error) {
      const errorHtml = `
        <div class="alert alert-danger m-3" role="alert">
           <div class="d-flex justify-content-between">
              <h4 class="alert-heading">💥Adatbázis Hiba történt!</h4>
              <p type="button" class="close" data-dismiss="alert" aria-label="Close">
                 </span><small>Bezár</small><span aria-hidden="true">&times;
              </p>
           </div>
           <p>Frissítsd az oldalt, vagy próbálkozz később!</p>
           <hr>
           <p class="mb-0">Dolgozunk a hiba elhárításán...</p>
        </div>
        `
      document.getElementById("error").innerHTML = errorHtml;
   }
}


//Render function to display user data on the webpage
async function Render() {

   //get the user ID from the HTML
   const userId = document.getElementsByClassName("container")[0].id;

   //retrieve the user data using the fetchById function
   const userData = [await fetchById(userId)];

   //extract the primary and secondary images from the user data
   const images = userData[0].images;
   const primaryImage = images.filter(item => item.fokep == 1)
   const secondaryImages = images.filter(item => item.fokep == 0)

   //construct the HTML code to display the user data on the webpage
   const html = `
    <a href="/"><button class="btn btn-outline-primary btn-lg mb-2">Vissza</button></a>
    <div class="main-body">
       <div class="row">
          <div class="col-md-4 mb-3">
             <div class="card" style="border-radius: 1rem;">
                <div class="card-body">
                   <div class="d-flex flex-column align-items-center text-center">
                      <img src="${primaryImage[0] == undefined ? "../images/default.png" : "." + primaryImage[0].eleresi_ut}"
                      alt="profile-pics" class="rounded-circle" width="150">
                      ${userData[0].profil.map(user =>
                      `
                      <div class="mt-3">
                         <h4>${user.teljes_nev}</h4>
                         <h6 class="text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket-takeoff" viewBox="0 0 16 16">
                               <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362.798-.799.96-1.932.362-2.531-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532Z"/>
                               <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9.42 9.42 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a9.556 9.556 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093.067.017.12.033.16.045.184.06.279.13.351.295l.029.073a3.475 3.475 0 0 1 .157.721c.055.485.051 1.178-.159 2.065Zm-4.828 7.475.04-.04-.107 1.081a1.536 1.536 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a8.548 8.548 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006ZM5.205 5c-.625.626-.94 1.351-1.004 2.09a8.497 8.497 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107-.04.039Zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a2.835 2.835 0 0 0-.045-.283 3.078 3.078 0 0 0-.3-.041Z"/>
                               <path d="M7.009 12.139a7.632 7.632 0 0 1-1.804-1.352A7.568 7.568 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z"/>
                            </svg>
                            ${user.bemutatkozas}
                         </h6>
                         <div class="d-flex flex-wrap justify-content-center">
                            <a class="btn btn-success m-1" href="tel:${user.telefonszamok}">Hívás</a>
                            <a class="btn btn-primary m-1" href="mailto:${user.email}">Email</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             `).join('')}
             <div class="card mt-2 style="border-radius: 1rem;"">
             <div class="card-body d-flex justify-content-center align-center">
                <div class="row">
                   ${secondaryImages.length == 0 ?
                   `
                   <div class="col-md-3 col-lg-6 col-sm-6 col-xs-12 mb-3" style="width:7rem;">
                      <img class="m-1" src="../images/default.png" style="max-width:100%; height:auto;">
                   </div>
                   <div class="col-md-3 col-lg-6 col-sm-6 col-xs-12 mb-3" style="width:7rem;">
                      <img class="m-1" src="../images/default.png" style="max-width:100%; height:auto;">
                   </div>
                   <div class="col-md-3 col-lg-6 col-sm-6 col-xs-12 mb-3" style="width:7rem;">
                      <img class="m-1" src="../images/default.png" style="max-width:100%; height:auto;">
                   </div>
                   `
         : secondaryImages.map((secondaryImage, index) =>
            `<div class="col-md-3 col-lg-6 col-sm-6 col-xs-12 mb-3" style="width:7rem;">
                        <img type="button" src=".${secondaryImage.eleresi_ut}" alt="" class="rounded  img-fluid" data-toggle="modal" data-target="#myModal${index}">
                    </div>
                   <div class="modal fade" id="myModal${index}">
                      <div class="modal-dialog">
                         <div class="modal-content">
                            <div class="modal-header justify-content-end">
                               <p type="button" class="close" data-dismiss="modal">&times;</p>
                            </div>
                            <div class="modal-body">
                               <img src=".${secondaryImage.eleresi_ut}" alt="" class="img-fluid rounded mx-auto d-block" style="width: 50rem;">
                               <div class="d-flex justify-content-end">
                               <button class="close btn btn-danger btn-sm mt-2" data-dismiss="modal">Bezár</button>
                                </div>
                               </div>
                         </div>
                      </div>
                   </div>
                   `
         ).join('')}
                </div>
             </div>
          </div>
       </div>
       ${userData.map(user =>
            `
       <div class="col">
          <div class="card mb-3 mt-4" style="border-radius: 1rem;">
             <div class="card-body">
                <div class="row">
                   <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                      ${user.profil[0].email}
                   </div>
                </div>
                <hr>
                <div class="row">
                   <div class="col-sm-3">
                      <h6 class="mb-0">Telefonszám</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                      ${user.profil[0].telefonszamok}
                   </div>
                </div>
                <hr>
                <div class="row">
                   <div class="col-sm-3">
                      <h6 class="mb-0">Születési hely</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                      ${user.profil[0].szuletesi_hely}
                   </div>
                </div>
                <hr>
                <div class="row">
                   <div class="col-sm-3">
                      <h6 class="mb-0">Születési Dátum</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                      ${user.profil[0].szuletesi_datum}
                   </div>
                </div>
                <hr>
                <div class="row">
                   <div class="col-sm-3">
                      <h6 class="mb-0">Állampolgárság</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                      ${user.profil[0].allampolgarsag}
                   </div>
                </div>
                <hr>
                <div class="row">
                   <div class="col-sm-3">
                      <h6 class="mb-0">Hobbik</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                      ${user.profil[0].hobbik}
                   </div>
                </div>
                <hr>
             </div>
          </div>
       </div>
    </div>
    `).join("")}
    </div>
    <div class="row">
       <div class="card" style="border-radius: 1rem;">
          <div class="card-body p-4">
             <h5 class="card-title text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-signpost-2" viewBox="0 0 16 16">
                   <path d="M7 1.414V2H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h5v1H2.5a1 1 0 0 0-.8.4L.725 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4H7v5h2v-5h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H9V6h4.5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.3 2.4a1 1 0 0 0-.8-.4H9v-.586a1 1 0 0 0-2 0zM13.5 3l.75 1-.75 1H2V3h11.5zm.5 5v2H2.5l-.75-1 .75-1H14z"/>
                </svg>
                Munkahelyek
             </h5>
             ${userData[0].jobs.map(job =>
               `
             <ul class="list-group list-group-flush">
                <hr>
                <li class="list-group-item">Cégnév: <strong>${job.cegnev}</strong></li>
                <li class="list-group-item">Kezdés dátuma: <strong>${job.kezdes_datuma}</strong></li>
                <li class="list-group-item">Befejezes dátuma: <strong>${job.befejezes_datuma}</strong></li>
                <li class="list-group-item">Munkakör: <strong>${job.munkakor}</strong></li>
             </ul>
             `).join("")}
          </div>
       </div>
    </div>
    <div class="row mt-4">
       <div class="card" style="border-radius: 1rem;">
          <div class="card-body p-4">
             <h5 class="card-title text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
                   <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
                </svg>
                Iskolák
             </h5>
             ${userData[0].school.map(school =>
                  `    
             <ul class="list-group list-group-flush">
                <hr>
                <li class="list-group-item">Intézmény neve: <strong>${school.intezmeny_neve}</strong></li>
                <li class="list-group-item">Kezdés dátuma: <strong>${school.kezdes_datuma}</strong></li>
                <li class="list-group-item">Befejezes dátuma: <strong>${school.befejezes_datuma}</strong></li>
                <li class="list-group-item">Szak: <strong>${school.szak}</strong></li>
             </ul>
             `).join("")}
          </div>
       </div>
    </div>
    `;
   document.getElementById(userId).innerHTML = html;
}
window.onload = Render();

