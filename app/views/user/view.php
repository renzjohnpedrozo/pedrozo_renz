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
      font-family: "Segoe UI", sans-serif;
      background: radial-gradient(circle at center, #111 0%, #000 100%);
      color: #eee;
      overflow-x: hidden;
    }

    /* Glowing background effect */
    body::before {
      content: "";
      position: absolute;
      width: 600px;
      height: 600px;
      border-radius: 50%;
      background: rgba(255, 0, 0, 0.25);
      top: -200px;
      left: -200px;
      filter: blur(160px);
      animation: glowShift 12s infinite alternate;
      z-index: 0;
    }
    @keyframes glowShift {
      from { transform: translate(0, 0); }
      to { transform: translate(100px, 120px); }
    }

    /* Navbar */
    .navbar {
      background: #000;
      border-bottom: 2px solid #ff1a1a;
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 10;
    }
    .navbar-brand {
      font-size: 1.4rem;
      font-weight: bold;
      color: #ff3333 !important;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    /* Card */
    .card {
      background: #111;
      border: 2px solid #ff1a1a;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.5);
      padding: 25px;
      margin-top: 90px;
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
    }

    /* Table */
    .table {
      color: #eee;
      border-color: #333;
    }
    .table thead {
      background: #ff1a1a;
      color: #fff;
    }
    .table tbody tr {
      transition: all 0.3s ease;
    }
    .table tbody tr:hover {
      background: rgba(255, 0, 0, 0.15);
    }

    /* Buttons */
    .btn-primary {
      background-color: #ff1a1a;
      border: none;
      font-weight: bold;
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #c40000;
      box-shadow: 0 0 12px rgba(255, 0, 0, 0.7);
      transform: translateY(-2px);
    }
    .btn-warning {
      background-color: #ff9800;
      border: none;
      font-weight: bold;
      border-radius: 6px;
      transition: all 0.3s ease;
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
      transition: all 0.3s ease;
    }
    .btn-danger:hover {
      background-color: #ff1a1a;
      transform: translateY(-2px);
      box-shadow: 0 0 12px rgba(255, 0, 0, 0.7);
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes neonPulse {
      from {
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.4),
                    0 0 30px rgba(255, 0, 0, 0.2);
        border-color: #ff1a1a;
      }
      to {
        box-shadow: 0 0 25px rgba(255, 0, 0, 0.8),
                    0 0 50px rgba(255, 0, 0, 0.5);
        border-color: #ff3333;
      }
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
      <a href="<?=site_url('user/create');?>" class="btn btn-primary mb-3">+ Add New User</a>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th width="20%">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach(html_escape($users) as $user): ?>
            <tr>
              <td><?=$user['id'];?></td>
              <td><?=$user['username'];?></td>
              <td><?=$user['email'];?></td>
              <td>
                <a href="<?=site_url('user/update/'. $user['id']);?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?=site_url('user/delete/'. $user['id']);?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
