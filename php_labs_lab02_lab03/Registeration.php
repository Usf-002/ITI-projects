<?php
// Registeration.php — Lab 02 (Styled form)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration | Lab 02</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <h1>Lab 02 — Registration</h1>
    <nav>
      <a class="btn link" href="view.php">View All Records</a>
    </nav>
  </header>

  <main class="container">
    <section class="card">
      <h2 class="card-title">Create Account</h2>
      <form action="done.php" method="post" novalidate>
        <div class="grid two">
          <div class="form-group">
            <label for="first-name">First Name <span class="req">*</span></label>
            <input type="text" id="first-name" name="first-name" placeholder="John" required>
          </div>

          <div class="form-group">
            <label for="last-name">Last Name <span class="req">*</span></label>
            <input type="text" id="last-name" name="last-name" placeholder="Doe" required>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email <span class="req">*</span></label>
          <input type="email" id="email" name="email" placeholder="name@example.com" required>
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" id="address" name="address" placeholder="123 Main St">
        </div>

        <div class="grid two">
          <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country">
              <option value="USA">USA</option>
              <option value="Canada">Canada</option>
              <option value="UK">UK</option>
              <option value="Australia">Australia</option>
              <option value="Egypt">Egypt</option>
            </select>
          </div>

          <div class="form-group">
            <label>Gender <span class="req">*</span></label>
            <div class="inline">
              <label><input type="radio" name="gender" value="Male"> Male</label>
              <label><input type="radio" name="gender" value="Female"> Female</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Skills</label>
          <div class="inline">
            <label><input type="checkbox" name="skills[]" value="HTML"> HTML</label>
            <label><input type="checkbox" name="skills[]" value="CSS"> CSS</label>
            <label><input type="checkbox" name="skills[]" value="JavaScript"> JavaScript</label>
            <label><input type="checkbox" name="skills[]" value="PHP"> PHP</label>
            <label><span class="badge">Optional</span></label>
          </div>
        </div>

        <div class="grid two">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="johndoe">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="********">
          </div>
        </div>

        <div class="buttons">
          <input type="reset" class="btn link" value="Reset">
          <button type="submit" class="btn">Submit</button>
        </div>
      </form>
    </section>
    <p class="footer">Data is stored in <strong>customer.txt</strong> in the same folder.</p>
  </main>
</body>
</html>
