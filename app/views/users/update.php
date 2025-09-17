<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: radial-gradient(rgba(255,255,255,0.25) 1px, transparent 1px);
      background-size: 28px 28px;
      z-index: 0;
    }
  </style>
</head>
<body class="relative bg-gradient-to-br from-blue-900 via-gray-800 to-orange-700 flex items-center justify-center min-h-screen">

  <div class="relative z-10 bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-200">
    <h1 class="text-3xl font-extrabold text-center mb-6 bg-gradient-to-r from-blue-800 to-orange-600 bg-clip-text text-transparent">
       Update User
    </h1>

    <form action="<?= site_url('users/update/'.segment(4)); ?>" method="POST" class="space-y-5">

      <div>
        <label for="first_name" class="block text-gray-700 font-medium mb-1">First Name</label>
        <input 
          type="text" 
          id="first_name" 
          name="first_name"
          value="<?= html_escape($user['first_name']); ?>"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:outline-none"
        >
      </div>

      <div>
        <label for="last_name" class="block text-gray-700 font-medium mb-1">Last Name</label>
        <input 
          type="text" 
          id="last_name" 
          name="last_name"
          value="<?= html_escape($user['last_name']); ?>"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:outline-none"
        >
      </div>

      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email"         
          value="<?= html_escape($user['email']); ?>"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-orange-500 focus:outline-none"
        >
      </div>

      <div class="flex gap-3">
        <button type="submit"
          class="flex-1 bg-gradient-to-r from-blue-700 to-orange-600 hover:opacity-90 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
           Save
        </button>
        <a href="<?= site_url('/'); ?>"
          class="flex-1 text-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
          Cancel
        </a>
      </div>
    </form>
  </div>

</body>
</html>
