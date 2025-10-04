<body style="margin:0;padding:0;height:100vh;
             background:linear-gradient(135deg,#000000 0%,#1a0000 100%);
             display:flex;justify-content:center;align-items:center;
             font-family:'Courier New',monospace;">

  <!-- Futuristic grid background -->
  <div style="position:absolute;top:0;left:0;width:100%;height:100%;
              background:url('https://www.transparenttextures.com/patterns/cubes.png');
              opacity:0.08;z-index:0;"></div>

  <!-- Login container -->
  <div style="z-index:1;width:380px;padding:40px;
              background:#0a0a0a;border-radius:12px;
              box-shadow:0 0 25px #ff0000 inset, 0 0 25px #ff0000;
              text-align:center;">

    <!-- Title -->
    <h2 style="color:#ff0000;text-shadow:0 0 12px #ff0000;
               margin:0 0 25px 0;letter-spacing:2px;">
      🔒 LOGIN
    </h2>

    <!-- Login form -->
    <form method="post" action="<?= site_url('auth/login'); ?>" 
          style="display:flex;flex-direction:column;gap:15px;">
      
      <input type="text" name="username" placeholder="Enter Username" required
             style="padding:12px;background:#111;border:2px solid #ff0000;
                    color:#ff0000;border-radius:8px;font-size:14px;outline:none;
                    box-shadow:0 0 12px #ff0000;">
      
      <input type="password" name="password" placeholder="Enter Password" required
             style="padding:12px;background:#111;border:2px solid #ff0000;
                    color:#ff0000;border-radius:8px;font-size:14px;outline:none;
                    box-shadow:0 0 12px #ff0000;">
      
      <button type="submit" class="btn-login"
              style="padding:12px;background:#ff0000;color:#fff;
                     font-weight:bold;border:none;border-radius:8px;
                     font-size:16px;cursor:pointer;
                     box-shadow:0 0 20px #ff0000;
                     transition:all 0.3s ease;">
        Login
      </button>
    </form>

    <!-- Register link -->
    <p class="login-text" 
       style="margin-top:20px;color:#ccc;font-size:14px;">
      Don't have an account?  
      <a href="<?= site_url('auth/register'); ?>" class="register-link" 
         style="color:#ff0000;text-shadow:0 0 8px #ff0000;text-decoration:none;
                font-weight:bold;">
        Register
      </a>
    </p>
  </div>
</body>
