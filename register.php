<html lang="en">
<head>
  <title>User Registration</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
<div class="content">
      <div class="logo">
        <img src="img/logo.png" alt="logo" width="200px">
        <h2>REGISTER ADMIN</h2><br>
        <div class="warn">
          <?php require_once 'messages.php'; ?><br>
        </div>
      </div>
    <form action="signup.php" method="POST" class="input-group" id="login">
      Username: <input type="text" name="Username" class="input-field" placeholder="Isi Username"/><br />
      Password: <input type="text" name="password" class="input-field" placeholder="Isi Password"/><br />
      Nama Lengkap: <input type="text" name="nama_lengkap" class="input-field" placeholder="Isi Nama Lengkap"/><br />
      <br><br>
      <button type="submit" class="submit-btn">DAFTAR</button>
    </form>
  </div>
</body>
</html>