<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
  body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url('<?= base_url() . "public/image/BG2.jpg"; ?>') no-repeat center center/cover;
    padding: 20px;
  }

  .glass-container {
    width: 100%;
    max-width: 420px;
    padding: 40px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(14px);
    border-radius: 20px;
    border: 1px solid rgba(0, 51, 160, 0.4);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.25);
    text-align: center;
    animation: fadeIn 0.8s ease;
  }

  @keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
  }

  h2 {
    font-size: 1.9em;
    font-weight: 700;
    color: #0033A0; /* DPWH Blue */
    margin-bottom: 25px;
    letter-spacing: 0.5px;
  }

  .form-group {
    margin-bottom: 18px;
    position: relative;
    text-align: left;
  }

  .form-group input {
    width: 100%;
    padding: 12px 14px;
    border: 1.5px solid #C8102E; /* DPWH Red */
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.85);
    color: #0033A0;
    font-size: 15px;
    transition: 0.3s ease;
    box-sizing: border-box;
  }

  .form-group input:focus {
    border-color: #0033A0;
    box-shadow: 0 0 8px rgba(0, 51, 160, 0.35);
    background: #fff;
    outline: none;
  }

  /* Eye icon */
  .toggle-password {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 1.2em;
    color: #C8102E;
    transition: color 0.3s ease;
  }

  .toggle-password:hover {
    color: #0033A0;
  }

  /* Button */
  .btn-submit {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #0033A0, #C8102E);
    color: #fff;
    font-size: 1.1em;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 6px 12px rgba(0, 51, 160, 0.35);
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .btn-submit:hover {
    background: #002874;
    transform: translateY(-2px);
  }

  /* Error message */
  .error-message {
    background: rgba(200, 16, 46, 0.1);
    border: 1px solid rgba(200, 16, 46, 0.3);
    color: #C8102E;
    border-radius: 12px;
    padding: 12px;
    margin-bottom: 18px;
    font-size: 0.9em;
    font-weight: 600;
    text-align: center;
  }

  /* Bottom text */
  .text-center {
    margin-top: 20px;
  }

  .text-center a {
    color: #ffffff;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
  }

  .text-center a:hover {
    text-decoration: underline;
    color: #C8102E;
  }
</style>

</head>
<body>
  <div class="glass-container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-submit">Login</button>
    </form>

    <div class="text-center">
      <p>
        Don’t have an account? 
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
