<?php
    include 'template/header.php';
?>

<div class="container mx-auto flex">
    <div class="p-5 grow w-full h-full bg-gray-500 rounded-lg">
        <h3 class="text-2xl text-slate-700 font-bold">User Profile</h3>
    </div>
</div>
<form class="border-4 w-full h-full grid grid-cols-2 container mx-auto text-center gap-4" action="/profileEdit/<?= (isset($id)) ? $id : "" ?>" method="post">
    <div>
        <label for="name" class="text-2xl font-light">User Name :</label>
        <input required type="text" id="name" name="name" class="w-full" value="<?= (isset($username)) ? $username : "" ?>"/>
    </div>
    <div>
        <label for="email" class="text-2xl font-light">Email :</label>
        <input required type="email" id="email" name="email" class="w-full" value="<?= (isset($email)) ? $email : "" ?>"/>
    </div>
    <div class="col-span-2">   
        <label for="image" class="text-2xl font-light">Image :</label>
        <input required type="file" id="image" name="image" class="w-full" value="<?= (isset($image)) ? $image : "" ?>"/>
    </div>
    <div class="col-span-2">
        <button type="submit" class="w-full bg-gray-600 p-5 text-xl font-bold rounded-lg hover:bg-gray-500">Submit</button>
    </div>
</form>
<?php
    include 'template/footer.php';
?>