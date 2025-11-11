<?php
// done.php — Validate & Save to customer.txt
function h($v){return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');}

$email   = $_POST['email'] ?? '';
$fname   = $_POST['first-name'] ?? '';
$lname   = $_POST['last-name'] ?? '';
$address = $_POST['address'] ?? '';
$country = $_POST['country'] ?? '';
$gender  = $_POST['gender'] ?? '';
$skills  = $_POST['skills'] ?? [];
$username= $_POST['username'] ?? '';
$password= $_POST['password'] ?? '';

if(!is_array($skills)) $skills = [$skills];

$errors = [];

// Required checks
if(trim($fname) === '')  $errors[] = 'First name is required.';
if(trim($lname) === '')  $errors[] = 'Last name is required.';
if(trim($email) === '')  $errors[] = 'Email is required.';
if($gender === '')       $errors[] = 'Gender is required.';

// Email format
if($email && !filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errors[] = 'Invalid email format.';
}

$skillsText = '';
if(!empty($skills)){
  $skillsText = implode('-', array_map('strip_tags', $skills));
}

// Build CSV line (9 columns expected by view.php)
$lineParts = [
  $fname, $lname, $address, $country, $gender, $skillsText, $username, $password, $email
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Result</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <h1>Lab 02 — Result</h1>
  <nav>
    <a class="btn link" href="Registeration.php">Back to Form</a>
    <a class="btn link" href="view.php">View All Records</a>
  </nav>
</header>
<main class="container">
  <section class="card">
<?php if(!empty($errors)): ?>
  <div class="alert error">
    <strong>Please fix the following errors:</strong>
    <ul>
      <?php foreach($errors as $e): ?>
        <li><?= h($e) ?></li>
      <?php endforeach; ?>
    </ul>
    <p><a class="btn link" href="javascript:history.back()">Go Back</a></p>
  </div>
<?php else: ?>
  <?php
    $filePath = __DIR__ . '/customer.txt';
    $ok = @file_put_contents($filePath, implode(',', $lineParts) . PHP_EOL, FILE_APPEND | LOCK_EX);
  ?>
  <?php if($ok !== false): ?>
    <div class="alert success"><strong>User saved successfully.</strong></div>
    <p>
      <a class="btn" href="Registeration.php">Add another user</a>
      <a class="btn link" href="view.php">View all users</a>
    </p>
  <?php else: ?>
    <div class="alert error"><strong>Error:</strong> Could not write to file.</div>
  <?php endif; ?>
<?php endif; ?>
  </section>
</main>
</body>
</html>
