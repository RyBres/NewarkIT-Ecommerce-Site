<h2 class="mb-4">Login</h2>

{if $error}
  <div class="alert alert-danger">{$error}</div>
{/if}

<form method="post" action="../public/login.php">
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
  <p class="mt-3">
  No account? <a href="../public/register.php">Register here</a>.
  </p>

</form>
