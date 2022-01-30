<?php
   require APPROOT . '/views/includes/head.php';
   $title = 'Update movie';
   $output = str_replace('%TITLE%', $title, $output);
   echo $output;
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>


<div class="flex justify-center items-center w-full">
    
    <div class="md:w-1/2 bg-white rounded shadow-2xl p-8 m-4">
    <div class="w-full mb-8 rounded-lg ">
<a href="<?php echo URLROOT; ?>/movies/list" class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300 shadow-lg">Go back</a>
</div>
        <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Edit the movie : <?php echo $data['movie']->title ?></h1>
        <form name="editform" class="editform" action="<?php echo URLROOT; ?>/movies/update/<?php echo $data['movie']->id ?>" method="POST" enctype="multipart/form-data" >
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="title">Title</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="title" id="title" value="<?php echo $data['movie']->title ?>">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg text-gray-900" for="description">Description</label>
                <textarea class="border rounded py-2 px-3 text-grey-800" name="description" id="description" ><?php echo $data['movie']->description ?></textarea>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="categorie">Categorie</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="categorie" id="categorie" value="<?php echo $data['movie']->categorie ?>">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="trailer">Trailer-link</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="trailer" value="<?php echo $data['movie']->trailer ?>" id="trailer">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="runtime">Runtime (min)</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="runtime" value="<?php echo $data['movie']->runtime ?>" id="runtime">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg text-gray-900" for="releasedate">Releasedate</label>
                <input class="border py-2 px-3 rounded text-grey-800" type="date" name="releasedate" value="<?php echo $data['movie']->releasedate ?>" id="releasedate">
            </div>
            <div class="flex flex-col mb-4">
            <img class="rounded h-24 w-24" style="object-fit: cover;" src="<?php echo URLROOT . "/img/" . $data['movie']->image?>"></img>
         
                <label class="mb-2 text-lg text-gray-900" for="image">Image</label>
                <div class="border rounded">
                <p class="m-1 text-sm text-gray-900" for="image">Click this checkbox if you want to change the image</p>
                <input class="mx-2 leading-tight check-btn" onclick="enable_text(this.checked)" name="img_check" type="checkbox">
            
            <input disabled class="img-upl  py-2 px-3 text-grey-800" type="file" value="<?php echo $data['movie']->image ?>"  name="image" id="image">
</div>
               
            </div>
            <button  value="Upload" class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300" type="submit">Save</button>
        </form>
    </div>
    <script >
$(function() {
    enable_cb();
    $(".check-btn").click(enable_cb);
  });
  
     function enable_cb() {
    if (this.checked) {
      $(".img-upl").removeAttr("disabled");
    } else {
      $(".img-upl").attr("disabled", true);
    }
  }</script>
</div>