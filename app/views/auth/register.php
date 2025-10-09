<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="<?= base_url(); ?>public/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<body>
  <nav class="navbar d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <a class="brand" href="/">CRUD</a>
      <div class="nav-actions ms-auto">
        <a href="<?= site_url('auth/login'); ?>">Login</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card">
      <h2>Create Account</h2>
      <p class="subtitle">Join to manage users in the dashboard</p>

      <form method="post" action="<?= site_url('auth/register'); ?>">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Create password" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select id="role" name="role" required>
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </form>

      <span class="muted-link">Already have an account? <a href="<?= site_url('auth/login'); ?>">Login</a></span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
