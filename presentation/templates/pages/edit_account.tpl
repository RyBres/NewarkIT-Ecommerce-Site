<h2>Edit Your Account</h2>

{if $error}
  <div class="alert alert-danger">{$error}</div>
{/if}
{if $success}
  <div class="alert alert-success">{$success}</div>
{/if}

<form method="post" class="row g-3 mt-3">
  <div class="col-md-6">
    <label>First Name</label>
    <input type="text" name="first_name" class="form-control" required value="{$user.first_name|escape}">
  </div>
  <div class="col-md-6">
    <label>Last Name</label>
    <input type="text" name="last_name" class="form-control" required value="{$user.last_name|escape}">
  </div>

  <div class="col-md-6">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required value="{$user.email|escape}">
  </div>

  <div class="col-md-6">
    <label>New Password <small>(leave blank to keep current)</small></label>
    <input type="password" name="password" class="form-control">
  </div>

  <div class="col-12">
    <label>Address Line 1</label>
    <input type="text" name="address_line1" class="form-control" required value="{$user.address_line1|escape}">
  </div>

  <div class="col-12">
    <label>Address Line 2</label>
    <input type="text" name="address_line2" class="form-control" value="{$user.address_line2|escape}">
  </div>

  <div class="col-md-4">
    <label>City</label>
    <input type="text" name="city" class="form-control" required value="{$user.city|escape}">
  </div>

  <div class="col-md-4">
    <label>State</label>
    <input type="text" name="state" class="form-control" required value="{$user.state|escape}">
  </div>

  <div class="col-md-4">
    <label>ZIP</label>
    <input type="text" name="zip" class="form-control" required value="{$user.zip|escape}">
  </div>

  <div class="col-12 mt-3">
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
</form>
