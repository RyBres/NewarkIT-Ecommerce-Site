{* smarty *}
{config_load file="site.conf"}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>{#site_title#}.com. Tech you can trust.</title>
	<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Tomorrow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
  </head>
  <body>
  <div class="d-flex flex-column min-vh-100">
    <!-- Top Header -->
    <div class="top-header">
      <div class="container d-flex justify-content-between align-items-center py-2" style="white-space: nowrap;">
        <!-- Logo -->
        <a href="../public/index.php">
        <img src="../images/newark-it-logo.png" alt="Newark IT" class="img-fluid" style="max-height: 80px;">
        </a>
		<!-- Search Bar -->
		<form class="w-50 position-relative" method="get" action="../public/search.php" autocomplete="off">
		  <div class="input-group">
			<input id="searchInput" type="search" name="q" class="form-control" placeholder="Search Newark IT" aria-label="Search">
			<button class="btn btn-primary" type="submit">
			  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" style="vertical-align: -0.1em;" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
			  </svg>
			</button>
		  </div>

		  <!-- Suggestion Box -->
		  <ul id="searchSuggestions" class="list-group position-absolute w-100 mt-1 z-3" style="max-height: 250px; overflow-y: auto; display: none;"></ul>
		</form>

        <!-- Login / Cart -->
        <div class="d-flex align-items-center">
          {if $user_logged_in}
          <span class="me-2 text-end">
		    <small class="d-block" style="line-height: 1;">Hello,</small>
		    <strong class="fs-5 d-block" style="line-height: 1; margin-left: 30px;">{$user_name}!</strong>
		  </span>
          <a href="../public/account.php" class="btn btn-primary me-2">
		    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="vertical-align: -0.2em; font-weight: bold;" class="bi bi-person" viewBox="0 0 16 16">
		    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
		    </svg>
		    My Account</a>
          {else}
		  <span class="me-2 text-end">
		    <small class="d-block" style="line-height: 1;">Hello,</small>
		    <strong class="fs-5 d-block" style="line-height: 1; margin-left: 30px;">Guest!</strong>
		  </span>
		  <a href="../public/login.php" class="btn btn-primary me-2" style="white-space: nowrap;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="vertical-align: -0.2em; font-weight: bold;" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
            </svg>
            Log In
          </a>
          {/if}
          <a href="../public/view.php" class="btn btn-success fixed-button">
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
    <nav class="navbar navbar-expand-lg navbar-black bg-light">
      <div class="container custom-container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            {foreach $navCats as $dept}
            {if $dept.name == 'Services'}
            <li class="nav-item">
              <a class="nav-link" style="width:125px !important; min-width:125px !important;" href="/NewarkIT-Ecommerce-Site/public/services.php">
              <strong>{$dept.name}</strong>
              </a> <!-- MOVE THIS TO STYLES -->
            </li>
			{elseif $dept.name == 'Deals'}
			<li class="nav-item">
			  <a class="nav-link" style="width:125px !important; min-width:125px !important;" href="/NewarkIT-Ecommerce-Site/public/deals.php">
				<strong>{$dept.name}</strong>
			  </a>
			</li>
            {else}
            <li class="nav-item dropdown" style="width:125px !important; min-width:125px !important;">
              <!-- MOVE THIS TO STYLES -->
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
              <strong>{$dept.name}</strong>
              </a>
              <ul class="dropdown-menu fixed-width-dropdown">
                {foreach $dept.categories as $cat}
                <li><a class="dropdown-item" href="../public/category.php?id={$cat.category_id}">{$cat.name}</a></li>
                {/foreach}
              </ul>
            </li>
            {/if}
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