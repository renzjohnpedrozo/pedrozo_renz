<?php $session = lava_instance()->session; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?= base_url(); ?>public/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <a class="brand" href="/">CRUD</a>
      <div class="nav-actions ms-auto">
        <a href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card">
      <h2>Welcome</h2>
      <p class="subtitle">Signed in as <strong><?= html_escape($session->userdata('username')); ?></strong></p>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label>Role</label>
            <input type="text" value="<?= html_escape($session->userdata('role')); ?>" disabled>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label>Email</label>
            <input type="text" value="<?= html_escape($session->userdata('email')); ?>" disabled>
          </div>
        </div>
      </div>

      <div class="dash-actions">
        <a class="btn btn-outline" href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
