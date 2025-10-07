<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: url('<?= base_url() . "public/image/BG.jpg"; ?>') no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: rgba(0, 51, 153, 0.95);
      color: white;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 4px 0 20px rgba(0, 0, 0, 0.2);
    }

    .sidebar h3 {
      font-weight: 600;
      text-align: center;
      color: #FFCC00;
      letter-spacing: 1px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      margin: 10px 0;
      padding: 10px;
      display: block;
      border-radius: 8px;
      transition: all 0.3s;
    }

    .sidebar a:hover {
      background: #FFCC00;
      color: #003399;
      font-weight: 600;
    }

    .logout-btn {
      background: #CC0000;
      text-align: center;
      padding: 10px;
      border-radius: 8px;
      font-weight: 500;
    }

    .logout-btn:hover {
      background: #a30000;
      color: white;
    }

    /* Main content */
    .main-content {
      flex: 1;
      padding: 40px;
      backdrop-filter: blur(12px);
    }

    .card {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 16px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      padding: 30px;
    }

    h2 {
      color: #CC0000;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
    }

    .table thead {
      background: #003399;
      color: white;
      text-transform: uppercase;
      font-size: 13px;
    }

    .table tbody tr:hover {
      background: rgba(255, 204, 0, 0.15);
    }

    .btn-warning {
      background-color: #FFCC00;
      border: none;
      color: #003399;
      font-weight: 600;
    }

    .btn-danger {
      background-color: #CC0000;
      border: none;
    }

    .btn-warning:hover { background-color: #e6b800; }
    .btn-danger:hover { background-color: #a30000; }

    .search-bar {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-bottom: 15px;
    }

    .search-bar input {
      width: 250px;
      border: 1px solid #003399;
      color: #003399;
      border-radius: 6px;
    }

    .btn-create {
      background: linear-gradient(135deg, #003399, #CC0000);
      border: none;
      color: white;
      font-weight: 600;
    }

    .btn-create:hover {
      background: #001f66;
    }

    .welcome {
      background: rgba(255, 255, 255, 0.8);
      border-left: 6px solid #FFCC00;
      padding: 10px 15px;
      font-weight: 500;
      color: #003399;
      margin-bottom: 20px;
      border-radius: 6px;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div>
      <h3>DPWH Portal</h3>
      <a href="#">Dashboard</a>
      <a href="<?= site_url('users/create'); ?>">Create User</a>
    </div>
    <a href="<?= site_url('auth/logout'); ?>" class="logout-btn">Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="card">
      <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>

      <?php if(!empty($logged_in_user)): ?>
        <div class="welcome">
          Welcome, <span class="text-danger"><?= html_escape($logged_in_user['username']); ?></span>
        </div>
      <?php endif; ?>

      <form action="<?= site_url('users'); ?>" method="get" class="search-bar">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input type="text" name="q" class="form-control" placeholder="Search user..." value="<?= html_escape($q); ?>">
        <button type="submit" class="btn btn-warning">Search</button>
      </form>

      <div class="table-responsive">
        <?php if(!empty($users)): ?>
        <table class="table table-hover text-center align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <th>Role</th>
              <?php endif; ?>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?= html_escape($user['id']); ?></td>
              <td><?= html_escape($user['username']); ?></td>
              <td><?= html_escape($user['email']); ?></td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <td><?= html_escape($user['role']); ?></td>
              <?php endif; ?>
              <td>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <a href="<?= site_url('/users/update/'.$user['id']);?>" class="btn btn-sm btn-warning">Update</a>
                  <a href="<?= site_url('/users/delete/'.$user['id']);?>" class="btn btn-sm btn-danger">Delete</a>
                <?php else: ?>
                  <span class="text-muted">View Only</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php else: ?>
          <div class="alert alert-warning text-center">No users found.</div>
        <?php endif; ?>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <?= $page; ?>
      </div>
    </div>
  </div>
</body>
</html>
