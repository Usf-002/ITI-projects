<?php
// view.php — List & Delete records from customer.txt
$file = __DIR__ . '/customer.txt';

if (isset($_GET['delete'])) {
  $indexToDelete = (int)$_GET['delete'];
  if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (isset($lines[$indexToDelete])) {
      unset($lines[$indexToDelete]);
      file_put_contents($file, implode(PHP_EOL, $lines) . (count($lines) ? PHP_EOL : ''));
    }
  }
  header('Location: view.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Registered Users</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <h1>Lab 02 — Users</h1>
  <nav>
    <a class="btn" href="Registeration.php">Add New User</a>
  </nav>
</header>

<main class="container">
  <section class="card table-card">
    <div class="table-wrap">
<?php
if (!file_exists($file) || filesize($file) == 0) {
  echo '<div class="alert error">No records found.</div>';
} else {
  $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  echo '<table>';
  echo '<thead><tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Address</th>
          <th>Country</th>
          <th>Gender</th>
          <th>Skills</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>
          <th>Action</th>
        </tr></thead><tbody>';

  foreach ($lines as $index => $line) {
    $data = explode(',', $line);
    for ($i=0;$i<9;$i++){ if(!isset($data[$i])) $data[$i]=''; }
    echo '<tr>';
    echo '<td>'.($index+1).'</td>';
    echo '<td>'.htmlspecialchars($data[0]).'</td>';
    echo '<td>'.htmlspecialchars($data[1]).'</td>';
    echo '<td>'.htmlspecialchars($data[2]).'</td>';
    echo '<td>'.htmlspecialchars($data[3]).'</td>';
    echo '<td>'.htmlspecialchars($data[4]).'</td>';
    echo '<td>'.htmlspecialchars($data[5]).'</td>';
    echo '<td>'.htmlspecialchars($data[6]).'</td>';
    echo '<td>'.htmlspecialchars($data[7]).'</td>';
    echo '<td>'.htmlspecialchars($data[8]).'</td>';
    echo '<td><a class="delete-btn" href="view.php?delete='.$index.'" onclick="return confirm(\'Delete this record?\')">Delete</a></td>';
    echo '</tr>';
  }
  echo '</tbody></table>';
}
?>
    </div>
  </section>
</main>
</body>
</html>
