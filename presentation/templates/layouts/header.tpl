{* smarty *}
{config_load file="site.conf"}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{#site_title#}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>


<!-- Top Header -->
<div class="top-header py-2">
  <div class="container d-flex justify-content-between align-items-center" >
    <!-- Logo -->
	<a href="/index.php">
	  <img src="../images/newark-it-logo.png" alt="Newark IT" class="img-fluid" style="max-height: 70px;">
	</a>

    <!-- Search Bar -->
    <form class="d-flex w-50" method="get" action="/search.php">
      <input class="form-control me-2" type="search" name="q" placeholder="Search products..." aria-label="Search">
      <button class="btn btn-primary" type="submit">
	  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="vertical-align: -0.1em;" class="bi bi-search" viewBox="0 0 16 16">
		  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
		</svg>
	  </button>
    </form>

    <!-- Login / Cart -->
    <div class="d-flex align-items-center">
      <a href="/login.php" class="btn btn-primary me-2">
	  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="vertical-align: -0.2em; font-weight: bold;" class="bi bi-person" viewBox="0 0 16 16">
		  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
		</svg>
	  Login
	  </a>
      <a href="/cart.php" class="btn btn-success">
	  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="vertical-align: -0.1em;" class="bi bi-cart" viewBox="0 0 16 16">
			::before
			<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
		</svg>
	  My Cart
	  </a>
    </div>
  </div>
</div>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		{foreach $navCats as $cat}
		  <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
				 {$cat.name}
			  </a>
			  <ul class="dropdown-menu">
				{foreach $cat.subcats as $sub}
				  <li><a class="dropdown-item" href="/category.php?id={$sub.id}">{$sub.name}</a></li>
				{/foreach}
			  </ul>
		  </li>
			{/foreach}
		</ul>
		<!-- Support Blurb -->
		<span class="navbar-text text-black ms-auto d-none d-lg-block">
		  Questions or concerns? Call toll-free at <strong>1-800-555-TECH</strong>
		  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="vertical-align: -0.25em;" class="bi bi-phone" viewBox="0 0 16 16">
			<path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
			<path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
		</svg>
		</span>


    </div>
  </div>
</nav>

<!-- Main Page Content Container -->
<div class="container mt-4">
