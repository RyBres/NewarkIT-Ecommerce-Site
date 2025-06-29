<h2 class="mb-4">Register</h2>

{if $error}
  <div class="alert alert-danger">{$error}</div>
{/if}

<form method="post" action="../public/register.php">
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
	<input type="text" class="form-control" id="name" name="name" required>
  </div>
  
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
	<input type="password" class="form-control" id="password" name="password" required>
  </div>
  
  <button type="submit" class="btn btn-success">Register</button>
</form>

<p class="mt-3">
  Already have an account? <a href="../public/login.php">Login here</a>.
</p>