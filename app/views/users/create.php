<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.25) 1px, transparent 1px);
      background-size: 28px 28px;
      z-index: 0;php
    }
  </style>
</head>
<body class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-gray-800 to-orange-700">

  <div class="relative z-10 bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-gray-200">
    
    <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-800 to-orange-600 bg-clip-text text-transparent drop-shadow">
      Create User
    </h1>

    <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-6">
      <div>
        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
        <input 
          type="text" 
          id="first_name" 
          name="first_name" 
          placeholder="Enter first name"
          required
          class="w-full px-4 py-3 rounded-xl bg-gray-50 placeholder-gray-400 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none transition"
        >
      </div>

      <div>
        <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
        <input 
          type="text" 
          id="last_name" 
          name="last_name" 
          placeholder="Enter last name"
          required
          class="w-full px-4 py-3 rounded-xl bg-gray-50 placeholder-gray-400 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none transition"
        >
      </div>

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter email"
          required
          class="w-full px-4 py-3 rounded-xl bg-gray-50 placeholder-gray-400 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none transition"
        >
      </div>

      <div>
        <button type="submit"
          class="w-full bg-gradient-to-r from-blue-700 to-orange-600 hover:opacity-90 transition text-white font-semibold py-3 px-6 rounded-xl shadow-lg">
          Submit
        </button>
      </div>
    </form>
  </div>

</body>
</html>
