<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="<?= base_url(); ?>public/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<body>
  <nav class="navbar d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <a class="brand" href="/">CRUD</a>
      <div class="nav-actions ms-auto">
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card">
      <h2>Login</h2>
      <p class="subtitle">Sign in to access your dashboard</p>

      <form method="post" action="<?= site_url('auth/login'); ?>">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>

      <span class="muted-link">Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register</a></span>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>