<?php
   require APPROOT . '/views/includes/head.php';
   $title = "Create a movie";
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
<a href="list" class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300 shadow-lg">Go back</a>
</div>
        <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Create a movie</h1>
        <form action="<?php echo URLROOT; ?>/movies/create"  method="POST" enctype="multipart/form-data" >
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="title">Title</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="title" id="title" >
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg text-gray-900" for="description">Description</label>
                <textarea class="border rounded py-2 px-3 text-grey-800" name="description" id="description" ></textarea>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="categorie">Categorie</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="categorie" id="categorie" >
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="trailer">Trailer-link</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="trailer" id="trailer">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2  text-lg text-gray-900" for="runtime">Runtime (min)</label>
                <input class="border rounded py-2 px-3 text-grey-800" type="text" name="runtime" id="runtime">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg text-gray-900" for="releasedate">Releasedate</label>
                <input class="border py-2 px-3 rounded text-grey-800" type="date" name="releasedate" id="releasedate">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-lg text-gray-900" for="image">Image</label>
              
                <input class="border rounded py-2 px-3 text-grey-800" type="file"  name="image" id="image">
            </div>
            <button value="Upload" class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300" type="submit">Save</button>
        </form>
    </div>
</div>