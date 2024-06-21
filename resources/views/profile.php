<?php view('components/header.php') ?>

<main class="mx-5 lg:mx-32 mt-10">
    <div>
        <p>Welcome <?= $_SESSION['user'] ?></p>
    </div>
    <hr>
    <div class="flex gap-4 justify-between items-center mt-10">
            <?php foreach($contacts as $contact) : ?>
                <div class="my-2 py-4 rounded-lg space-y-2 bg-gray-600 text-gray-50 p-10 text-center">
                    <p><?=$contact['first_name']?> <?=$contact['last_name']?></p>
                    <p><?=$contact['email']?></p>
                    <button class="bg-gray-50 text-blue-600 rounded-lg py-2 px-4"><a href="/profile/<?=$contact['id']?>">click me</button>
                </div>
            <?php endforeach; ?>
    </div>
</main>

