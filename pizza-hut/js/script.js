$(function() {
   function tampilAllMenu() {
      $.getJSON('pizza.json', function(data) {
         // console.log(data);
         var menu = data.menu;
         console.log(menu);
         $.each(menu, function(i, data) {
         // console.log(i);
            $('#daftar-menu').append(`<div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/pizza/${data.gambar}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">${data.nama}</h5>
                <p class="card-text">${data.deskripsi}</p>
                <h5 class="card-title">Rp${data.harga}</h5>
                <a href="" class="btn btn-dark">Buy</a>
              </div>
            </div>
         </div>`);
         });
      });
   }

   tampilAllMenu();

   $('.nav-link').click(function() {
      $('.nav-link').removeClass('active');
      $(this).addClass('active');

      let kategori = $(this).html();
      // console.log(kategori);

      if(kategori == 'All Menu') {
         tampilAllMenu();
         return;
      }

      $('h1').html(kategori);

      $.getJSON('pizza.json', function(data) {
         let menu = data.menu;
         let content = '';

         $.each(menu, function(i, data) {
            if(data.kategori == kategori.toLowerCase()) {
               content +=  `<div class="col-md-4 mb-3">
         <div class="card">
           <img src="img/pizza/${data.gambar}" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title">${data.nama}</h5>
             <p class="card-text">${data.deskripsi}</p>
             <h5 class="card-title">Rp${data.harga}</h5>
             <a href="" class="btn btn-dark">Buy</a>
           </div>
         </div>
      </div>`;
            }
         });

         $('#daftar-menu').html(content);
      });
   });
});