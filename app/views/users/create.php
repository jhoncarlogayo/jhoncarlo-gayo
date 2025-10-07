<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create User</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      margin: 0;
      min-height: 100vh;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(120deg, rgba(0, 51, 153, 0.9), rgba(204, 0, 0, 0.8)), 
        url('<?= base_url() . "public/image/BG2.jpg"; ?>') no-repeat center center / cover;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .card {
      width: 100%;
      max-width: 500px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 204, 0, 0.3);
      box-shadow: 0 10px 25px rgba(0, 51, 153, 0.3);
      padding: 2rem 2.5rem;
      position: relative;
    }

    .card::before {
      content: "";
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      border-radius: 20px;
      background: linear-gradient(135deg, #ffcc00, transparent, #003399);
      z-index: -1;
      opacity: 0.3;
    }

    h2 {
      text-align: center;
      color: #003399;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 1.5rem;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    label {
      font-weight: 600;
      color: #003399;
      margin-bottom: 0.4rem;
    }

    .form-control {
      border-radius: 12px;
      border: 1.5px solid rgba(255, 204, 0, 0.8);
      background: rgba(255, 255, 255, 0.9);
      color: #001a66;
      padding: 0.7rem 1rem;
      transition: 0.3s ease;
    }

    .form-control:focus {
      border-color: #003399;
      box-shadow: 0 0 0 4px rgba(0, 51, 153, 0.2);
      background-color: #fff;
    }

    .input-with-icon {
      position: relative;
    }

    .input-with-icon i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #ffcc00;
      cursor: pointer;
      transition: color 0.3s;
    }

    .input-with-icon i:hover {
      color: #003399;
    }

    .btn-create {
      display: inline-block;
      width: 100%;
      padding: 0.8rem;
      border: none;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      color: #fff;
      background: linear-gradient(135deg, #003399, #cc0000);
      box-shadow: 0 8px 18px rgba(0, 51, 153, 0.3);
      transition: all 0.3s ease-in-out;
    }

    .btn-create:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(0, 51, 153, 0.5);
      background: linear-gradient(135deg, #002266, #990000);
    }

    .btn-back-container {
      text-align: center;
      margin-top: 1.5rem;
    }

    .btn-back {
      display: inline-block;
      color: #003399;
      font-weight: 600;
      border: 1.5px solid #ffcc00;
      padding: 0.6rem 1.5rem;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.85);
      transition: 0.3s ease;
      box-shadow: 0 4px 10px rgba(255, 204, 0, 0.3);
      text-decoration: none;
    }

    .btn-back:hover {
      background: linear-gradient(135deg, #003399, #cc0000);
      color: white;
      box-shadow: 0 6px 16px rgba(0, 51, 153, 0.4);
      text-decoration: none;
    }

    .error-message {
      background: rgba(255, 0, 0, 0.1);
      border: 1px solid rgba(255, 0, 0, 0.3);
      color: #a70000;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      text-align: center;
      margin-bottom: 1rem;
      font-weight: 600;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <div class="card">
    <h2>Create User</h2>

    <?php if (!empty($error)) : ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('users/create'); ?>">
      <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required
          value="<?= isset($username) ? html_escape($username) : '' ?>" class="form-control" />
      </div>

      <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required
          value="<?= isset($email) ? html_escape($email) : '' ?>" class="form-control" />
      </div>

      <div class="mb-3">
        <label for="password">Password</label>
        <div class="input-with-icon">
          <input type="password" name="password" id="password" placeholder="Enter password" required class="form-control" />
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
      </div>

      <div class="mb-3">
        <label for="confirmPassword">Confirm Password</label>
        <div class="input-with-icon">
          <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm password" required class="form-control" />
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>
      </div>

      <div class="mb-3">
        <label for="role">Role</label>
        <select name="role" id="role" required class="form-control">
          <option value="" disabled <?= !isset($role) ? 'selected' : '' ?>>-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role == "admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role == "user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>

      <button type="submit" class="btn-create">Create User</button>
    </form>

    <div class="btn-back-container">
      <a href="<?= site_url('users'); ?>" class="btn-back">Back</a>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Toggle Password Script -->
  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);
      toggle.addEventListener("click", () => {
        const type = input.type === "password" ? "text" : "password";
        input.type = type;
        toggle.classList.toggle("fa-eye");
        toggle.classList.toggle("fa-eye-slash");
      });
    }

    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword");
  </script>
</body>

</html>
