<?php view('components/header.php') ?>
<form action="" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mx-4">
      <div>
        <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First name</label>
        <div class="mt-2.5 mb-2">
          <input type="text" name="first_name" id="first-name" value="<?= $input['first_name'] ?? ''?>" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-<?= isset($errors['first_name']) ? 'red' : 'gray' ?>-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-xs text-red-500"><?= isset($errors['first_name']) ? $errors['first_name'] : '' ?></span>
      </div>

      <div>
        <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>
        <div class="mt-2.5 mb-2">
          <input type="text" name="last_name" id="last-name" value="<?= $input['last_name'] ?? ''?>" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-<?= isset($errors['last_name']) ? 'red' : 'gray' ?>-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-xs text-red-500"><?= isset($errors['last_name']) ? $errors['last_name'] : '' ?></span>
      </div>

      <div>
        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
        <div class="mt-2.5 mb-2">
          <input type="email" name="email" id="email" value="<?= $input['email'] ?? ''?>" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-<?= isset($errors['email']) ? 'red' : 'gray' ?>-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-xs text-red-500"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
      </div>

      <div class="col-span-2">
          <input class="py-2 px-4 rounded-md cursor-pointer text-gray-50 bg-blue-800" type="submit" />
      </div>
    <div>
</form>