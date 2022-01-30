<?php
   require APPROOT . '/views/includes/head.php';
   $title = "Top 100";
   $output = str_replace('%TITLE%', $title, $output);
   echo $output;
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>



<div class="overflow-x-auto">

        <div class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            
            <div class="w-full lg:w-5/6">
            <h2 class="m-2 mt-4 text-4xl font-semibold text-gray-600 text-center text-black ">Here are the top-100 trending movies!</h2>
            <p class="text-lg leading-relaxed text-center mt-4 mb-4 text-gray-500">
          You can add them to your watchlist here aswell.
          </p>
                <div class="bg-white shadow-md rounded my-6">

                <div class="py-2 px-4 relative mx-auto text-gray-600">
                   
        <input id="myInput" onkeyup="searchFunc()"  class="border-2 w-full border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
          type="search" name="search" placeholder="Search" >
        <button type="submit"  class="absolute right-0 top-0 mt-5 mr-6">
          <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
            width="512px" height="512px">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
        </button>
      </div>




                    <table id="myTable" class="min-w-max w-full table-movie-top table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Rank</th>
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-left">Runtime</th>
                                <th class="py-3  px-6 text-center">Releasedate</th>
                                <th class="py-3 px-6 text-center">Categorie</th>
                                <th class="py-3 px-6 text-center">Watchlist</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <?php $i = 1; foreach($data['movies'] as $movie): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                            <p class="hidden"><?php echo $movie->categorie ?></p>
                                    <div class="flex items-center">
                           
                                        <span class="font-medium"><?php echo $i; $i++;?></span>
                                    </div>
                                </td>
                                <td class="py-3   px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-12 h-12 object-cover rounded" src="<?php echo URLROOT . "/img/" . $movie->image?>"></img>
                         

                                        </div>
                                        <span class="font-medium"><?php echo $movie->title?></span>
                                    </div>
                                </td>
                                <td class="py-3 px-6  text-left">
                                <span>
                                    <i class="fas fa-clock mr-1"></i><?php echo $movie->runtime?> mins</span>
                                    <div class="flex items-center">
                                       
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                    
                                    <i class="fas fa-calendar mr-1"></i><?php echo $movie->releasedate?></span>
                                  
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
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
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        
                                        <form class="mouse-click m-0 inline-block hover:scale-110 " action="<?php echo URLROOT . "/movielists/addmovie/" . $movie->id?>" method="POST">
                                          <button class="badge  bg-blue-500 hover:bg-blue-300 hover:scale-110 text-gray-200 p-1 text-xs font-bold   rounded "><i class="fas fa-heart mr-1" aria-hidden="true"></i>Watchlist</button>
                                        </form>
                        
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        

                        </tbody>
                    </table>
                    <script>
                        function searchFunc() {
                          var input, filter, table, tr, td, cell, i, j;
                          input = document.getElementById("myInput");
                          filter = input.value.toUpperCase();
                          table = document.getElementById("myTable");
                          tr = table.getElementsByTagName("tr");
                          for (i = 1; i < tr.length; i++) {
                            // Hide the row initially.
                            tr[i].style.display = "none";
                        
                            td = tr[i].getElementsByTagName("td");
                            for (var j = 0; j < td.length; j++) {
                              cell = tr[i].getElementsByTagName("td")[j];
                              if (cell) {
                                if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                  tr[i].style.display = "";
                                  break;
                                } 
                              }
                            }
                          }
                        }
                 </script>
                </div>
            </div>
        </div>
    </div>