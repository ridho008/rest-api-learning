$(function() {
   function searchMovie()
   {
      $('#movie-list').html('');
      $.ajax({
         url: "http://www.omdbapi.com",
         method: 'get',
         dataType: 'json',
         data: {
            'apikey' : 'de7e80b',
            's': $('#search-input').val(),
         },
         success: function(result) {
            // console.log(result);
            if(result.Response == "True") {
               // jika title movienya ada
               let movies = result.Search;
               console.log(movies);
               $.each(movies, function(i, data) {
                  let poster = (data.Poster == "N/A") ? "./img/default-movie.png" : data.Poster;
                  $('#movie-list').append(`
                  <div class="col-md-4 mb-3">
                  <div class="card">
                    <img src="${poster}" class="card-img-top" height="400px">
                    <div class="card-body">
                      <h5 class="card-title">${data.Title}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Tahun ${data.Year}</h6>
                      <a href="#" data-id="${data.imdbID}" class="btn btn-primary detail" data-toggle="modal" data-target="#exampleModal">
                        Detail
                      </a>
                    </div>
                  </div></div>`);
               });

               $('#search-input').val('');
            } else {
               $('#movie-list').html(`<div class="col-md-12 text-center"><h1>${result.Error}</h1></div>`);
            }
         }
      });
   }

   $('#search-button').click(function() {
      searchMovie();
   });

   $('#search-input').keyup(function(e) {
      if(e.keyCode === 13) {
         searchMovie();
      }
   });

   $('#movie-list').on('click', '.detail', function() {
      // console.log($(this).data('id'));
      $.ajax({
         url: "http://www.omdbapi.com",
         method: 'get',
         dataType: 'json',
         data: {
            'apikey' : 'de7e80b',
            'i': $(this).data('id'),
         },
         success: function(movie) {
            console.log(movie);
            let poster = (movie.Poster == "N/A") ? "./img/default-movie.png" : movie.Poster;
            if(movie.Response === "True") {
               $('#exampleModalLabel').html(`Movie ${movie.Title}`)
               $('.modal-body').html(`
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-4">
                           <img src="${poster}">
                        </div>
                        <div class="col-md-8">
                           <ul class="list-group list-group-flush">
                             <li class="list-group-item">Title : ${movie.Title}</li>
                             <li class="list-group-item">Realeased : ${movie.Released}</li>
                             <li class="list-group-item">Director : ${movie.Director}</li>
                             <li class="list-group-item">Actor : ${movie.Actors}</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               `);
            }
         }
      });
   });


});