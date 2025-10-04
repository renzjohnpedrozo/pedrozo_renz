<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      font-family: "Courier New", monospace;
      background: linear-gradient(135deg, #000 0%, #1a0000 100%);
      color: #eee;
      overflow-x: hidden;
    }

    /* 🔴 Neon Glow Overlay */
    body::before {
      content: "";
      position: absolute;
      width: 700px;
      height: 700px;
      border-radius: 50%;
      background: rgba(255, 0, 0, 0.15);
      top: -250px;
      left: -250px;
      filter: blur(200px);
      animation: glowShift 10s infinite alternate;
      z-index: 0;
    }
    @keyframes glowShift {
      from { transform: translate(0, 0); }
      to { transform: translate(120px, 100px); }
    }

    /* 🔹 Navbar */
    .navbar {
      background: #0a0a0a;
      border-bottom: 2px solid #ff1a1a;
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 10;
    }
    .navbar-brand {
      font-size: 1.3rem;
      font-weight: bold;
      color: #ff3333 !important;
      letter-spacing: 2px;
      text-transform: uppercase;
      text-shadow: 0 0 12px #ff0000;
    }

    /* 🔹 Card */
    .card {
      background: #111;
      border: 2px solid #ff1a1a;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.7);
      padding: 25px;
      margin-top: 100px;
      position: relative;
      z-index: 1;
      animation: fadeIn 1s ease, neonPulse 2s infinite alternate;
    }
    .card h2 {
      text-align: center;
      color: #ff3333;
      font-weight: bold;
      margin-bottom: 20px;
      border-bottom: 1px solid #c40000;
      padding-bottom: 10px;
      text-shadow: 0 0 12px #ff0000;
    }

    /* 🔹 Search Bar */
    .search-bar {
      display: flex;
      margin-bottom: 20px;
      gap: 10px;
    }
    .search-input {
      flex: 1;
      padding: 10px;
      background: #0a0a0a;
      border: 2px solid #ff1a1a;
      border-radius: 6px;
      color: #ff4d4d;
      outline: none;
      box-shadow: 0 0 10px #ff0000;
    }
    .search-button {
      background: #ff0000;
      border: none;
      padding: 10px 18px;
      border-radius: 6px;
      font-weight: bold;
      color: #fff;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 0 15px #ff0000;
    }
    .search-button:hover {
      background: #c40000;
      box-shadow: 0 0 25px #ff0000;
    }

    /* 🔹 Table */
    .table {
      color: #eee;
      border-color: #333;
      font-size: 0.95rem;
    }
    .table thead {
      background: #ff1a1a;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .table tbody tr {
      transition: all 0.3s ease;
    }
    .table tbody tr:hover {
      background: rgba(255, 0, 0, 0.15);
    }

    /* 🔹 Buttons */
    .btn-primary {
      background-color: #ff1a1a;
      border: none;
      font-weight: bold;
      border-radius: 6px;
      transition: all 0.3s ease;
      box-shadow: 0 0 12px #ff0000;
    }
    .btn-primary:hover {
      background-color: #c40000;
      transform: translateY(-2px);
      box-shadow: 0 0 20px #ff0000;
    }
    .btn-warning {
      background-color: #ff9800;
      border: none;
      font-weight: bold;
      border-radius: 6px;
    }
    .btn-warning:hover {
      background-color: #e67e00;
      transform: translateY(-2px);
    }
    .btn-danger {
      background-color: #b71c1c;
      border: none;
      font-weight: bold;
      border-radius: 6px;
    }
    .btn-danger:hover {
      background-color: #ff1a1a;
      transform: translateY(-2px);
      box-shadow: 0 0 12px rgba(255, 0, 0, 0.7);
    }

    /* 🔹 Logout */
    .btn-logout {
      display: inline-block;
      background: #111;
      border: 2px solid #ff0000;
      padding: 8px 16px;
      border-radius: 6px;
      color: #ff3333;
      font-weight: bold;
      text-decoration: none;
      float: right;
      margin-bottom: 15px;
      transition: 0.3s;
      box-shadow: 0 0 10px #ff0000;
    }
    .btn-logout:hover {
      background: #ff0000;
      color: #fff;
      box-shadow: 0 0 20px #ff0000;
    }

    /* 🔹 Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes neonPulse {
      from { box-shadow: 0 0 15px rgba(255,0,0,0.5); border-color:#ff1a1a; }
      to { box-shadow: 0 0 25px rgba(255,0,0,0.9); border-color:#ff3333; }
    }
    
</style>

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="/">⚡ USER LIST</a>
    </div>
  </nav>

  <!-- User List Card -->
  <div class="container">
    <div class="card">
      <h2>USER LIST</h2>

      <?php if ($auth->has_role('admin')): ?>
        <a href="<?=site_url('user/create');?>" class="btn btn-primary mb-3">+ Add New User</a>
      <?php endif; ?>

      <!-- 🔹 Search Form -->
      <form method="get" action="<?= site_url('users'); ?>" class="search-bar">
        <input type="text" name="q" class="search-input" placeholder="Search username / email" value="<?= html_escape($q ?? '') ?>">
        <button type="submit" class="search-button">Search</button>
      </form>

      <a href="<?= site_url('auth/logout'); ?>" 
        class="btn-logout" onclick="return confirm('Are you sure you want to log out?');">
        Logout
      </a>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <?php if ($auth->has_role('admin')): ?>
              <th>Actions</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach($users as $user): ?>
            <tr>
              <td><?=html_escape($user['id']);?></td>
              <td><?=html_escape($user['username']);?></td>
              <td><?=html_escape($user['email']);?></td>
              <?php if ($auth->has_role('admin')): ?>
              <td>
                <a href="<?=site_url('user/update/'. $user['id']);?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?=site_url('user/delete/'. $user['id']);?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
              </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- 🔹 Pagination -->
      <?php if (!empty($page)): ?>
        <div class="pagination mt-3">
          <?= $page ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
