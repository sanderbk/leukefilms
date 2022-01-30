<?php
   require APPROOT . '/views/includes/head.php';
   $title = $data->title;
   $output = str_replace('%TITLE%', $title, $output);
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>









<section class="relative pt-16 bg-blueGray-50">
<div class="container mx-auto">
<div class="w-full mx-4 mb-8 rounded-lg ">
<a href="<?php echo URLROOT; ?>/movies" class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300 shadow-lg">Go back</a>
</div>
  <div class="flex flex-wrap items-center">
    <div class="w-10/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-78">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-500">
        <img alt="..." style="object-fit: cover;" src="<?php echo URLROOT . "/img/" . $data->image?>" class="max-h-60 w-full align-middle rounded-t-lg">
        <div id="api" class="info-box  rounded-b-lg text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">

         </div>
        <blockquote class="relative p-8 mb-4">

          <h4 id="movie-info" class="text-xl font-bold text-white">
          <?php echo $data->title; ?>
          </h4>
          <p class="text-md font-light mt-2 text-white">
          <?php echo $data->description; ?>
          </p>
        </blockquote>
      </div>
    </div>

    <div class="w-full md:w-6/12 px-4">
      <div class="flex flex-wrap">
        <div class="w-full  w-6/12 px-4">
          <div class="relative shadow rounded flex flex-col mt-4">
            <div class="px-4 py-5 flex-auto">
              <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                <i class="fas fa-info"></i>
              </div>
              <!-- <h6 class="text-xl mb-1 font-semibold">CSS Components</h6> -->
              <p class="mb-1 capitalize text-blueGray-500">
              <strong>Categorie:</strong> <?php echo $data->categorie; ?>
              </p>
              <p class="mb-1 capitalize text-blueGray-500">
              <strong>Runtime (min):</strong> <?php echo $data->runtime; ?>
              </p>
              <p class="mb-1 capitalize text-blueGray-500">
              <strong>releasedate:</strong> <?php echo $data->releasedate; ?>
              </p>
            </div>
          </div>
          <div class="relative shadow rounded flex flex-col min-w-0">
            <div class="px-4 py-5 flex-auto">
              <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-white">
                <i class="fas fa-film"></i>
              </div>
              <h6 class="text-xl mb-1 font-semibold">
                Links
              </h6>
    
            
              <form class="mouse-click m-0 inline-block" action="<?php echo URLROOT . "/movielists/addmovie/" . $data->id?>" method="POST">
               <button class="badge  bg-blue-500 hover:bg-blue-300  text-gray-200 p-1 text-md font-bold rounded "><i class="fas fa-heart mr-1"></i>Watchlist</button>
              </form>
               <a href="<?php echo $data->trailer?>"> <button class="badge  bg-red-500 hover:bg-red-300  text-gray-200 p-1 text-md font-bold rounded"><i class="fab fa-youtube mr-1"></i>Trailer</button></a>
               <button id="buttonfunc" onclick="apiCall()" class="badge  bg-yellow-300 hover:bg-red-300  text-yellow-800 p-1 text-md font-bold rounded"><i class="fas fa-link mr-1"></i>Fetch with Api</button>
            </div>
          </div>
        </div>
   
      </div>
    </div>
  </div>
</div>
</section>
<script>
  <?php
        $apikey = "&apikey=3316c99c";
        $omdburl = "http://www.omdbapi.com/?t=";
        $newmovtit = str_replace(' ', '+', $data->title);
        $full_url = ($omdburl . $newmovtit . $apikey);
        ?>
  $.getJSON( "<?php echo $full_url;?>", function( data ) {
  var items = [];
  $.each( data, function( key, val ) {
    items.push(val);
  });
  $(function () {
   $("#buttonfunc").one('click',function () {
    if ($('#api:contains("")')) {
      $('#api').append('<span class="mr-1 p-1 px-2 font-bold">IMDB score ' + items[15] +'</span>');
    $('#api').append('<span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">Metascore ' + items[16] +'</span>');
    $('#api').append('<span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">Box office ' + items[21] +'</span>');
    $('#movie-info').append('<p class="text-sm font-light mt-2 text-white"> Actors: ' + items[8] +  '</p>');
    $('#movie-info').append('<p class="text-sm font-light mt-2 text-white"> Writer: ' + items[7] +  '</p>');
    $('#movie-info').append('<p class="text-sm font-light mt-2 text-white"> Director: ' + items[6] +  '</p>');
    $('#movie-info').append('<p class="text-sm font-light mt-2 text-white"> Language: ' + items[10] +  '</p>');
    }
    
   });
});
   
  });
  </script>