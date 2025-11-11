<?php
// add_user.php — Lab 03 (Add User with validation, dropdown, and photo upload)
session_start();
function h($v){return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');}

$errors = [];
$success = '';
$usersFile = __DIR__ . '/users.txt';
$uploadDir = __DIR__ . '/uploads';

if (!is_dir($uploadDir)) { @mkdir($uploadDir, 0777, true); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    $room     = $_POST['room'] ?? '';
    $ext      = trim($_POST['ext'] ?? '');

    // 1) Email validation (two ways)
    if ($email === '') { $errors[] = 'Email is required.'; }
    // Regex pattern (simple RFC-like)
    if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email)) {
        $errors[] = 'Email is not valid (regex).';
    }

    // Password rules (bonus)
    // a. Only 8 chars
    if (strlen($password) !== 8) {
        $errors[] = 'Password must be exactly 8 characters.';
    }
    // b. Doesn’t allow special chars (only underscore allowed)
    if (!preg_match('/^[a-z0-9_]{8}$/', $password)) {
        $errors[] = 'Password can only contain lowercase letters, digits, and underscore (_).';
    }
    // c. Doesn’t accept Capital characters
    if (preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password must not contain capital letters.';
    }
    if ($password !== $confirm) {
        $errors[] = 'Password and confirmation do not match.';
    }

    // Basic checks
    if ($name === '') $errors[] = 'Name is required.';
    if ($room === '') $errors[] = 'Room selection is required.';

    // File upload check
    $photoNameToSave = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $tmp  = $_FILES['photo']['tmp_name'];
            $info = @getimagesize($tmp);
            if ($info === false) {
                $errors[] = 'Uploaded file is not a valid image.';
            } else {
                $exts = ['jpg','jpeg','png','gif'];
                $ext  = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
                if (!in_array($ext, $exts)) {
                    $errors[] = 'Only JPG, JPEG, PNG, or GIF images are allowed.';
                } else {
                    $photoNameToSave = uniqid('p_', true) . '.' . $ext;
                    if (!@move_uploaded_file($tmp, $uploadDir . DIRECTORY_SEPARATOR . $photoNameToSave)) {
                        $errors[] = 'Failed to save uploaded image.';
                    }
                }
            }
        } else {
            $errors[] = 'Error during file upload.';
        }
    }

    // Save user if no errors
    if (empty($errors)) {
        $line = implode('|', [
            str_replace('|','/', $name),
            $email,
            $room,
            str_replace('|','/', $ext),
            password_hash($password, PASSWORD_DEFAULT), // store hashed passwords
            $photoNameToSave
        ]) . PHP_EOL;
        if (@file_put_contents($usersFile, $line, FILE_APPEND | LOCK_EX) !== false) {
            $success = 'User saved successfully.';
            // reset form
            $name=$email=$room=$ext='';
        } else {
            $errors[] = 'Could not write to users.txt';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 03 — Add User</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <h1>Lab 03 — Add User</h1>
  <nav>
    <a class="btn link" href="Registeration.php">Lab 02 Form</a>
    <a class="btn link" href="view.php">Lab 02 Records</a>
    <a class="btn" href="login.php">Login</a>
  </nav>
</header>
<main class="container">
  <section class="card">
    <?php if (!empty($errors)): ?>
      <div class="alert error">
        <strong>Please fix the following:</strong>
        <ul>
          <?php foreach($errors as $e): ?><li><?= h($e) ?></li><?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    <?php if ($success): ?>
      <div class="alert success"><strong><?= h($success) ?></strong></div>
    <?php endif; ?>
    <h2 class="card-title">Add User</h2>
    <form action="" method="post" enctype="multipart/form-data" novalidate>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?= h($name ?? '') ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= h($email ?? '') ?>" required>
      </div>
      <div class="grid two">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="8 chars, lowercase/digits/_" required>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
      </div>

      <div class="grid two">
        <div class="form-group">
          <label for="room">Room Number</label>
          <select id="room" name="room" required>
            <option value="">-- Select --</option>
            <option value="Application1" <?= (isset($room)&&$room==='Application1')?'selected':''; ?>>Application1</option>
            <option value="Application2" <?= (isset($room)&&$room==='Application2')?'selected':''; ?>>Application2</option>
            <option value="cloud" <?= (isset($room)&&$room==='cloud')?'selected':''; ?>>cloud</option>
          </select>
        </div>
        <div class="form-group">
          <label for="ext">Ext.</label>
          <input type="text" id="ext" name="ext" value="<?= h($ext ?? '') ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="photo">Profile picture (JPG/PNG/GIF)</label>
        <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.gif">
      </div>

      <div class="buttons">
        <button class="btn" type="submit">Save</button>
        <a class="btn link" href="login.php">Go to Login</a>
      </div>
    </form>
  </section>
</main>
</body>
</html>
