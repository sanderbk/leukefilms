<?php
   require APPROOT . '/views/includes/head.php';
   $title = "Homepage";
   $output = str_replace('%TITLE%', $title, $output);
   echo $output;
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

    <?php if(isLoggedIn()): ?>
    <?php endif; ?>

    <section class="flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500" style="background-image: url('<?php echo URLROOT . "/img/bg-new.webp" ?>'); height: 300px;">
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-bold text-white md:text-5xl">Watch the top trending movie-trailers, <br> and make your own watchlist!</h2>
    
                <div class="flex justify-center mt-8">
                    <a class="px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform bg-green-600 rounded hover:bg-green-500"
                        href="#">Start making a list</a>
                </div>
            </div>
    </section>
   
    <?php if ($data['addError'] != ""): ?>
    <div class="flex bg-red-100 text-center rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">Danger alert!</span>     <?php echo $data['addError']; ?>
        </div>
    </div>
    <?php endif?>

    <?php 
    
if(!empty($messages)){
	echo "<div class='alert alert-success'>";
	foreach ($messages as $message) {
		echo "<span class='glyphicon glyphicon-ok'></span>&nbsp;".$message."<br>";
	}
	echo "</div>";
}
    ?>
    <div class="mx-auto text-center relative flex flex-col sm:flex-row items-center bg-white rounded-md py-5 pl-6 pr-8 sm:pr-6">
    <div class="p-2 w-full">

    <div class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
    <?php if(isLoggedIn()): ?>
      <span class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">
            <div class="text-sm font-medium ml-3">Welcome <?php echo $_SESSION['username']?></div>
      </span>
      <span class="inline-flex px-2">Click <a class="font-bold text-gray-600 mx-1 cursor-pointer" id="fetch_api">here</a> to fetch the movie ratings </span>
      <?php endif; ?>
      <?php if(!isLoggedIn()): ?>
      <span class="inline-flex px-2">Click <a class="font-bold text-gray-600 mx-1" href="<?php echo URLROOT . "/users/login"?>">here</a> to login! </span>
      <?php endif; ?>
    </div>
   

    
  </div>
				
</div>



<?php 

$apikey = "&apikey=3316c99c";
$omdburl = "http://www.omdbapi.com/?t=shang+chi";
$full_url = ($omdburl . $apikey);

// $movie_json = file_get_contents($full_url);
// $movie_array = json_decode($movie_json, true);

// $imdbrating = $movie_array['imdbRating'];
// echo $imdbrating;

?>

    <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-5">
      

    <?php foreach($data['movies'] as $movie): ?>

      <?php
        $apikey = "&apikey=3316c99c";
        $omdburl = "http://www.omdbapi.com/?t=";
        $newmovtit = str_replace(' ', '+', $movie->title);
        $full_url = ($omdburl . $newmovtit . $apikey);
        ?>

        <div class="each rounded mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
      <div class="w-100 rounded-tr-lg rounded-tl-lg " style="height: 200px;background-size: cover; background-image: url('<?php echo URLROOT . "/img/" . $movie->image?>"></div>
  <a href="<?php echo $movie->trailer; ?>"><div class="badge absolute top-0 right-0 bg-red-500 hover:bg-red-300 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded"><i class="fab fa-youtube mr-1"></i>Trailer</div></a>
 
  <form class="mouse-click m-0" action="<?php echo URLROOT . "/movielists/addmovie/" . $movie->id?>" method="POST">
  <button class="badge absolute top-0 right-0 mr-20 bg-blue-500 hover:bg-blue-300 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded"><i class="fas fa-heart mr-1"></i>Watchlist</button>
  </form>

  <div id="<?php echo $movie->id.$movie->categorie; ?>" class="info-box bg-gray-200 rounded-b-lg text-xs flex p-1 font-semibold text-gray-500">

  <script>
 
  $.getJSON( "<?php echo $full_url;?>", function( data ) {
  var items = [];
  $.each( data, function( key, val ) {
    items.push(val);
  });
  $(function () {
   $("#fetch_api").one('click',function () {
      $('#<?php echo $movie->id.$movie->categorie; ?>').append('<span class="mr-1 p-1 px-2 font-bold">IMDB score ' + items[15] +'</span>');
      $('#<?php echo $movie->id.$movie->categorie; ?>').append('<span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">Metascore ' + items[16] +'</span>');
      $('#<?php echo $movie->id.$movie->categorie; ?>').append('<span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">Box office ' + items[21] +'</span>');

   });
});
   
  });
  </script>




    <!-- <span class="mr-1 p-1 px-2 font-bold"></span>
    <span class="mr-1 p-1 px-2 font-bold border-l border-gray-400"></span>
    <span class="mr-1 p-1 px-2 font-bold border-l border-gray-400"></span> -->
  </div>
  <div class="desc p-4 text-gray-800">
    <a href="<?php echo URLROOT . "/movies/show/" . $movie->id?>" class="title font-bold block cursor-pointer hover:underline mb-2"><?php echo $movie->title; ?></a>
    <span class="<?php 
                                    switch($movie->categorie) {
                                      case "Drama";
                                      echo 'bg-red-600 text-black-600';
                                      break;
                                        case "Action";
                                        echo 'bg-purple-200 text-purple-600';
                                        break;
                                        case "Adventure";
                                        echo 'bg-green-200 text-green-600';
                                        break;
                                        case "Fantasy";
                                        echo 'bg-blue-200 text-blue-600';
                                        break;
                                        case "Horror";
                                        echo 'bg-black text-white';
                                        break;
                                        case "Romantic";
                                        echo 'bg-red-200 text-red-600';
                                        break;
                                        case "Sci-Fi";
                                        echo 'bg-yellow-200 text-yellow-600';
                                        break;

                                    }?>
                                     py-1 px-3 rounded-full text-xs"><?php echo $movie->categorie ?></span>
   
   
   
    <span class="mt-2 description text-sm block py-2 border-gray-400 mb-2"><?php echo $movie->description; ?></span>
    <a href="<?php echo URLROOT . "/movies/show/" . $movie->id?>"><div class="badge inline-block bg-green-500 hover:bg-green-300 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded"><i class="fas fa-eye mr-1"></i>More info</div></a>
  </div>
</div>

    <?php endforeach; ?>
</div>

<script>

  $(function () {
   $("#fetch_api").on('click',function () {
    $(".info-box").addClass("bg-red-300");
  });
  </script>