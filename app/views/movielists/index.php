<?php
   require APPROOT . '/views/includes/head.php';
   $title = "My List";
   $output = str_replace('%TITLE%', $title, $output);
   echo $output;
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>







<div id="menu" class="container mx-auto px-4 lg:pt-24 lg:pb-64">
      <div class="flex flex-wrap text-center justify-center">
        <div class="w-full lg:w-6/12 px-4">
          <h2 class="text-4xl font-semibold text-black">Your watchlist</h2>
          <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
           Here are all the movies displayed that you've added to your watchlist!
          </p>
        </div>
      </div>





    




      <?php foreach($data['movielists'] as $movielists): ?>
     
        <div class="my-2 shadow flex shadow rounded-lg  border-gray-400">

      
      <a href="<?php echo URLROOT . "/movies/show/" . $movielists->mid?>" style="background-size: cover;min-height: 100px;background-image : url('<?php echo URLROOT . "/img/" . $movielists->image?>');" class=" rounded-lg w-6/12 md:w-4/12 lg:w-2/12 py-4 block h-full shadow-inner">
        <div class="text-center text-white tracking-wide">
        <div class="flex justify-center mt-4 mx-auto items-center content-center bg-gradient-to-br from-green-300 to-green-600 shadow-md hover:shadow-lg h-6 w-6 rounded-full fill-current text-white">
        <i class="fas text-sm fa-eye"></i>
            </div>
  
        </div>
      </a>
 
      

      <div class="w-full w-6/12 md:w-8/12 lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
        <div class="flex flex-row lg:justify-start justify-center">
          <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
            <i class="far fa-clock"></i> <?php echo $movielists->runtime?> mins
          </div>
          <div class="text-gray-700 capitalize font-medium text-sm text-center lg:text-left px-2">
          <i class="fas fa-list"></i> <?php echo $movielists->categorie?>
          </div>
        </div>
        <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
        <?php echo $movielists->title?>
        </div>

        <div class="text-gray-600 hidden lg:inline font-medium text-sm pt-1 text-center lg:text-left px-2">
        <?php echo $movielists->description?>
        </div>
      </div>
      <div class="flex flex-row items-center m-2 w-full w-1/3  bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
      <form class="mouse-click m-0 inline-block" action="<?php echo URLROOT . "/movielists/delfromlist/" . $movielists->id?>" method="POST">
              <button class="badge  bg-red-500 hover:bg-red-300  text-gray-200 p-1 text-sm font-bold rounded "><i class="far mr-1 fa-trash-alt" aria-hidden="true"></i> Remove</button>
      </form>
       
      </div>
    </div>
      
<?php endforeach; ?>
     
  
    </div>



    
  
 
</div>
