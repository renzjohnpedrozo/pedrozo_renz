<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User/Create</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Segoe UI", sans-serif;
      background: radial-gradient(circle at center, #111 0%, #000 100%);
      color: #eee;
      overflow: hidden;
    }

    /* Animated red glow background */
    body::before {
      content: "";
      position: absolute;
      width: 600px;
      height: 600px;
      border-radius: 50%;
      background: rgba(255, 0, 0, 0.2);
      top: -200px;
      left: -200px;
      filter: blur(150px);
      animation: glowMove 12s infinite alternate;
    }
    @keyframes glowMove {
      from { transform: translate(0, 0); }
      to { transform: translate(80px, 60px); }
    }

    /* Navbar */
    .navbar {
      background: #000;
      border-bottom: 2px solid #ff1a1a;
      position: fixed;
      top: 0; left: 0; right: 0;
      padding: 12px 0;
      z-index: 10;
    }
    .navbar-brand {
      font-size: 1.4rem;
      font-weight: bold;
      color: #ff3333 !important;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    /* Card with neon border */
    .card {
      background: #111;
      border: 2px solid #ff1a1a;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.6);
      padding: 30px;
      width: 100%;
      max-width: 500px;
      animation: fadeIn 1s ease, neonPulse 2s infinite alternate;
      position: relative;
      z-index: 1;
    }
    .card h2 {
      color: #ff3333;
      text-align: center;
      font-weight: bold;
      margin-bottom: 25px;
      border-bottom: 1px solid #c40000;
      padding-bottom: 10px;
    }

    /* Labels & Inputs */
    label {
      font-weight: 600;
      color: #ddd;
    }
    .form-control {
      background: #000;
      border: 1px solid #333;
      color: #eee;
      border-radius: 6px;
      padding: 12px;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      border-color: #ff3333;
      box-shadow: 0 0 12px rgba(255, 0, 0, 0.8);
      outline: none;
    }

    /* Buttons */
    .btn-primary {
      background-color: #ff1a1a;
      border: none;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #c40000;
      box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
      transform: translateY(-2px);
    }
    .btn-secondary {
      background: #222;
      border: none;
      color: #eee;
      border-radius: 6px;
      padding: 10px 20px;
      transition: all 0.3s ease;
    }
    .btn-secondary:hover {
      background: #333;
      transform: translateY(-2px);
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes neonPulse {
      from {
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.4),
                    0 0 40px rgba(255, 0, 0, 0.2);
        border-color: #ff1a1a;
      }
      to {
        box-shadow: 0 0 35px rgba(255, 0, 0, 0.8),
                    0 0 70px rgba(255, 0, 0, 0.5);
        border-color: #ff3333;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="/">⚡ CREATE</a>
    </div>
  </nav>

  <!-- Form Card -->
  <div class="card mt-5">
    <h2>CREATE NEW USER</h2>
    <form action="<?=site_url('user/create');?>" method="post">
      <div class="mb-3">
        <label for="username">👤 Username</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="email">📧 Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">✅ Create User</button>
        <a href="/" class="btn btn-secondary">↩ Back</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
