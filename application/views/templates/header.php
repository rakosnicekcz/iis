<html>
    <head>
        <title>Conference Book</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b style="color: orange" >Conference</b><span style="color: blue">Book</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href=<?php echo base_url();?>>Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <?php if($this->session->has_userdata('email')): ?>
        <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown dropleft">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My account</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">my presentations</a>
            <a class="dropdown-item" href="#">my conferences</a>
            <a class="dropdown-item" href="#">my tickets</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href=<?php echo site_url('pages/logout'); ?>>Logout</a>
          </div>
        </li></ul>
      <?php else:?>
        <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href=<?php echo site_url('pages/login'); ?>>Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo site_url('pages/registration'); ?>>Sign up</a>
        </li>
      </ul>
      <?php endif;?>
    </div>
  </div>
</nav>
