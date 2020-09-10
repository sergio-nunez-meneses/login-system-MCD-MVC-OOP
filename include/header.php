<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/less/style.css">
    <title><?php echo $page_title; ?></title>
  </head>
  <body>

    <div class="container">
      <header class="pt-0 pb-3 px-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="/">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <?php
            if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === true))
            {
              ?>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/?sign_out=yes">Logout</a>
                </li>
              </ul>
              <?php
            }
            ?>
          </div>
        </nav>
      </header>

      <main id="mainContainer" class="p-3">
