<?php view('components/header.php') ?>

<main class="mx-5 lg:mx-32 mt-10">
    <div>
        <p>Welcome <?= $_SESSION['user'] ?></p>
    </div>
    <hr>
            <?php foreach($contacts as $contact) : ?>
                <div class="my-2 py-4">
                <p><?=$contact['first_name']?></p>
                <p><?=$contact['last_name']?></p>
                <p><?=$contact['email']?></p>
                <hr>
                </div>
            <?php endforeach; ?>
</main>

