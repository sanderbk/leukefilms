<?php
   require APPROOT . '/views/includes/head.php';
   $title = "CMS";
   $output = str_replace('%TITLE%', $title, $output);
   echo $output;
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>



    <?php if(isLoggedIn()): ?>
   
    <section class="mx-auto p-6 font-mono">
<div class="w-full mb-8 rounded-lg ">
<a href="<?php echo URLROOT; ?>/movies/create" class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300 shadow-lg">Add a movie</a>
</div>
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full">
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Image</th>
            <th class="px-4 py-3">Description</th>
            <th class="px-4 py-3">Runtime</th>
            <th class="px-4 py-3">Releasedate</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
            

    <?php foreach($data['movies'] as $movie): ?>
        <tr class="text-gray-700">
          <td class="px-4 py-3 text-ms font-semibold border"><?php echo $movie->id; ?></td>
          <td class="px-4 py-3 text-ms font-semibold border"><?php echo $movie->title; ?></td>
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="<?php echo URLROOT . "/img/" . $movie->image?>" alt="" loading="lazy" />
                </div>
            
              </div>
            </td>
            <td class="px-4 py-3 text-ms font-semibold border"><?php echo $movie->categorie; ?></td>
            <td class="px-4 py-3 text-ms font-semibold border"><?php echo $movie->runtime;  ?> min</td>
            <td class="px-4 py-3 text-sm border"><?php echo $movie->releasedate;  ?></td>
            <td class="px-4 py-3 text-sm border"> 
              
              <a href="<?php echo URLROOT . "/movies/update/" . $movie->id ?>" class="p-1 float-left mx-1 cursor-pointer pl-3 pr-3 bg-transparent border-2 border-blue-500 text-blue-500 text-md rounded-lg hover:bg-blue-500 hover:text-gray-100 focus:border-4 focus:border-blue-300">Edit</a>
            

            <form class="mouse-click " action="<?php echo URLROOT . "/movies/delete/" . $movie->id ?>" method="POST">
                    <input type="submit" name="delete" value="Delete" class="cursor-pointer float-left mx-1  p-1 pl-3 pr-3 bg-red-500 text-gray-100 hover:bg-red-700 hover:text-gray-200 text-md rounded-lg focus:border-4 border-red-300"></a>
                </form>
        </td>
        <?php endforeach; ?>
          </tr>
        </tbody>
       
      </table>
    </div>
  </div>
</section>


</div>
<?php endif; 
