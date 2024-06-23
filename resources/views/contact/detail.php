<?php view('components/header.php') ?>

<main class="mx-5 lg:mx-32 mt-10">

    <div class="my-2 py-4 rounded-lg space-y-2 bg-gray-600 text-gray-50 p-10 text-center">
        <p><?=$contact['first_name']?> <?=$contact['last_name']?></p>
        <p><?=$contact['email']?></p>
        <button class="rounded-lg bg-blue-600 text-gray-50 px-3 py-2"><a href="/profile/edit/<?=$contact['id']?>">Edit</button>
    </div>
    <div>
        <button class="rounded-lg bg-blue-600 text-gray-50 px-3 py-2"><a href="/profile">Back</button>
    </div>
</main>