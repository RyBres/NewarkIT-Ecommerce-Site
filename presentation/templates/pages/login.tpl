{if $error}
  <div class="alert alert-danger">{$error}</div>
{/if}

<div class="d-flex justify-content-center align-items-center">
<div class="card static-card shadow-sm rounded-4 p-4 bg-light" style="max-width: 400px; width: 100%;">
  <form method="post" action="../public/login.php">
    <h4 class="mb-3" style="text-align: center; color: black;">Log In</h4>

    <div class="mb-3">
      <label for="email" class="form-label" style="color: black;">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label" style="color: black;">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>

    <p class="mt-3 mb-0 text-center" style="color: black;">
      No account? <a href="../public/register.php">Register here</a>.
    </p>
  </form>
</div>
</div>