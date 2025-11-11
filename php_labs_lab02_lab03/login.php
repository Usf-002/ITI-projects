<?php
// login.php — Lab 03 (Login with users.txt)
session_start();
function h($v){return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');}
$usersFile = __DIR__ . '/users.txt';
$errors = [];
$welcome = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $errors[] = 'Email and password are required.';
    } else {
        if (file_exists($usersFile)) {
            $found = false;
            foreach (file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                list($name, $e, $room, $ext, $hash, $photo) = array_pad(explode('|',$line), 6, '');
                if (strcasecmp($e, $email) === 0 && password_verify($password, $hash)) {
                    $found = true;
                    $_SESSION['user'] = ['name'=>$name,'email'=>$e,'room'=>$room,'photo'=>$photo];
                    break;
                }
            }
            if (!$found) { $errors[] = 'Invalid email or password.'; }
        } else {
            $errors[] = 'No users have been registered yet.';
        }
    }
    if (empty($errors)) {
        header('Location: login.php'); exit;
    }
}

$logged = isset($_SESSION['user']);
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 03 — Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <h1>Lab 03 — Login</h1>
  <nav>
    <a class="btn link" href="add_user.php">Add User</a>
    <a class="btn link" href="Registeration.php">Lab 02 Form</a>
    <a class="btn link" href="view.php">Lab 02 Records</a>
    <?php if($logged): ?>
      <a class="btn" href="logout.php">Logout</a>
    <?php endif; ?>
  </nav>
</header>

<main class="container">
  <?php if($logged): ?>
    <section class="card">
      <div class="alert success"><strong>Welcome, <?= h($user['name']) ?>!</strong></div>
      <p>Email: <strong><?= h($user['email']) ?></strong></p>
      <p>Room: <strong><?= h($user['room']) ?></strong></p>
      <?php if(!empty($user['photo']) && file_exists(__DIR__ . '/uploads/' . $user['photo'])): ?>
        <p><img src="<?= 'uploads/' . h($user['photo']) ?>" alt="Profile" style="max-width:160px;border-radius:12px;border:1px solid #e6eefc;"></p>
      <?php endif; ?>
      <p><a class="btn" href="logout.php">Logout</a></p>
    </section>
  <?php else: ?>
    <?php if(!empty($errors)): ?>
      <section class="card">
        <div class="alert error">
          <strong>Login failed:</strong>
          <ul><?php foreach($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?></ul>
        </div>
      </section>
    <?php endif; ?>
    <section class="card">
      <h2 class="card-title">Login</h2>
      <form action="" method="post" novalidate>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="buttons">
          <button class="btn" type="submit">Login</button>
        </div>
      </form>
    </section>
  <?php endif; ?>
</main>
</body>
</html>
