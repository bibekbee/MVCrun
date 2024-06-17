<?php view('components/header.php') ?>
<form action="" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 mx-4">

      <div>
        <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
        <div class="mt-2.5 mb-2">
          <input type="email" name="email" id="email" value="<?= $input['email'] ?? ''?>" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-<?= isset($errors['email']) ? 'red' : 'gray' ?>-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-xs text-red-500"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
        <div class="mt-2.5 mb-2">
          <input type="password" name="password" id="password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-<?= isset($errors['password']) ? 'red' : 'gray' ?>-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-xs text-red-500"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
      </div>

      <div>
        <label for="confirm_password" class="block text-sm font-semibold leading-6 text-gray-900">Confirm Password</label>
        <div class="mt-2.5 mb-2">
          <input type="password" name="confirm_password" id="confirm_password" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-<?= isset($errors['confirm_password']) ? 'red' : 'gray' ?>-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span class="text-xs text-red-500"><?= isset($errors['confirm_password']) ? $errors['confirm_password'] : '' ?></span>
      </div>

      <div class="col-span-2">
          <input class="py-2 px-4 rounded-md cursor-pointer text-gray-50 bg-blue-800" type="submit" />
      </div>
    <div>
</form>