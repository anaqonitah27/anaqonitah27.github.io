<html lang="en">
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
<div class="content">
    <form id="login" class="input-group" action="signupCust.php" method="POST">
      <div class="logo">
        <img src="img/logo.png" alt="logo" width="200px">
        <h2>REGISTER PELANGGAN</h2><br>
        <div class="warn">
          <?php require_once 'messages.php'; ?><br>
        </div>
      </div>
      Username: <input type="text" name="nama_pelanggan" class="input-field" placeholder="Isi Username"/><br />
      Password: <input type="text" name="password_pelanggan" class="input-field" placeholder="Isi Password"/><br />
      Telepon : <input type="text" name="telepon_pelanggan" class="input-field" placeholder="Isi Nama Lengkap"/><br />
      Email   : <input type="text" name="email_pelanggan" class="input-field" placeholder="Isi Email Anda"/><br />
      
      <button type="submit" class="submit-btn">DAFTAR</button>
    </form>
  </div>
</body>
</html>