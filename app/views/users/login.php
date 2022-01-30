<?php
   require APPROOT . '/views/includes/head.php';
   $title = 'Login';
   $output = str_replace('%TITLE%', $title, $output);
   echo $output;
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>


<section class="flex justify-center items-center h-screen bg-gray-100">

    <div class="max-w-md w-full bg-white rounded p-6 space-y-4">
    <img class="w-1/2 mx-auto text-center" src="../img/leukefilmsnl.png"></img>
        <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
        <div>
            <input class="my-2 w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" name="username" placeholder="Username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>
        </div>
        <div>
            <input class="my-2 w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" name="password"  type="password" placeholder="Password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>
        </div>
        <div>
            <button type="submit" value="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 rounded text-sm font-bold text-gray-50 transition duration-200">Sign In</button>
           
        </div>
        </form>

        <!-- <div class="flex items-center justify-between">
            <div class="flex flex-row items-center">
                <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="comments" class="ml-2 text-sm font-normal text-gray-600">Remember me</label>
            </div>
            <div>
                <a class="text-sm text-blue-600 hover:underline" href="#">Forgot password?</a>
            </div>
        </div> -->
    </div>
</section>


