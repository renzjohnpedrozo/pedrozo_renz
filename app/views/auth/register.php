<body style="margin:0;padding:0;height:100vh;
             background:linear-gradient(135deg,#000000 0%,#1a0000 100%);
             display:flex;justify-content:center;align-items:center;
             font-family:'Courier New',monospace;">

  <!-- Futuristic grid background -->
  <div style="position:absolute;top:0;left:0;width:100%;height:100%;
              background:url('https://www.transparenttextures.com/patterns/cubes.png');
              opacity:0.08;z-index:0;"></div>

  <!-- Register container -->
  <div style="z-index:1;width:400px;padding:40px;
              background:#0a0a0a;border-radius:12px;
              box-shadow:0 0 25px #ff0000 inset, 0 0 25px #ff0000;
              text-align:center;">

    <!-- Title -->
    <h2 style="color:#ff0000;text-shadow:0 0 12px #ff0000;
               margin:0 0 25px 0;letter-spacing:2px;">
      📝 REGISTER
    </h2>

    <!-- Register form -->
    <form method="post" action="<?= site_url('auth/register'); ?>" 
          style="display:flex;flex-direction:column;gap:15px;">
      
      <input type="text" name="username" placeholder="Username" required
             style="padding:12px;background:#111;border:2px solid #ff0000;
                    color:#ff0000;border-radius:8px;font-size:14px;outline:none;
                    box-shadow:0 0 12px #ff0000;">
      
      <input type="email" name="email" placeholder="Enter Email" required
             style="padding:12px;background:#111;border:2px solid #ff0000;
                    color:#ff0000;border-radius:8px;font-size:14px;outline:none;
                    box-shadow:0 0 12px #ff0000;">
      
      <input type="password" name="password" placeholder="Password" required
             style="padding:12px;background:#111;border:2px solid #ff0000;
                    color:#ff0000;border-radius:8px;font-size:14px;outline:none;
                    box-shadow:0 0 12px #ff0000;">
      
      <input type="password" name="confirm_password" placeholder="Confirm Password" required
             style="padding:12px;background:#111;border:2px solid #ff0000;
                    color:#ff0000;border-radius:8px;font-size:14px;outline:none;
                    box-shadow:0 0 12px #ff0000;">

      <select name="role" required
              style="padding:12px;background:#111;border:2px solid #ff0000;
                     color:#ff3333;border-radius:8px;font-size:14px;outline:none;
                     box-shadow:0 0 12px #ff0000;">
        <option value="user" selected>👤 User</option>
        <option value="admin">👑 Admin</option>
      </select>

      <button type="submit" class="btn-login"
              style="padding:12px;background:#ff0000;color:#fff;
                     font-weight:bold;border:none;border-radius:8px;
                     font-size:16px;cursor:pointer;
                     box-shadow:0 0 20px #ff0000;
                     transition:all 0.3s ease;">
        Register
      </button>
    </form>

    <!-- Login link -->
    <p style="margin-top:20px;color:#ccc;font-size:14px;">
      Already have an account?  
      <a href="<?= site_url('auth/login'); ?>" 
         style="color:#ff0000;text-shadow:0 0 8px #ff0000;text-decoration:none;
                font-weight:bold;">
        Login
      </a>
    </p>
  </div>
</body>
