<?php if($justloggedin) :?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>successfully logged in</strong>.
    </div>
<?php endif; ?>
<?php foreach ($conferences as $conf) : ?>
    <div class="card mb-3 d-inline-block">
        <h4 class="card-header"><?php echo $conf["name"] ?></h3>
    <div class="card-body">
        <h5 class="card-title"><?php echo $conf["place"] ?></h4>
        <h6 class="card-subtitle text-muted"><?php echo $conf["from"]." - ".$conf["to"] ?></h6>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
        <rect width="100%" height="100%" fill="#868e96"></rect>
        <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
    </svg>
    <div class="card-body">
        <p class="card-text"><?php echo $conf["description"] ?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Price: <?php echo $conf["price"] ?></li>
        <li class="list-group-item">Capacity: <?php echo $conf["capacity"] ?></li>
    </ul>
    <div class="card-body">
        <a href=<?php echo '"'.base_url().'conference?id='.$conf["conference_id"].'"' ?> class="card-link">více</a>
    </div>
    <div class="card-footer text-muted">
        2 days ago
    </div>
    </div>
<?php endforeach; ?>