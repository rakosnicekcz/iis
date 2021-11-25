<?php if($justloggedin) :?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>successfully logged in</strong>.
    </div>
<?php endif; ?>

<!-- ROWS -->
<div class="dropdown" style="float:left">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:rgba(255,255,255,.6);">Filters</a>
          <div class="dropdown-menu dropdown-multicol" style="width: 600px">
            <div class="dropdown-row">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
            </div>
            <div class="dropdown-row">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
            </div>
            <div class="dropdown-row">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="margin-left: 5%">
                <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
                </label>
            </div>
            <div class="dropdown-row" style="width: 25%; margin-left: 5%; float:left">
                <label for="countrySelect" class="form-label mt-4">Country</label>
                <select class="form-select" id="countrySelect">
                    <option>Slovakia</option>
                    <option>Czechia</option>
                    <option>Poland</option>
                    <option>Austria</option>
                    <option>blablala</option>
                </select>
            </div>
            <div class="dropdown-row" style="width: 25%; margin-left: 5%; float:left">
                <label for="freeSlots" class="form-label mt-4">Free slots</label>
                <input type="email" class="form-control" id="freeSlots">
            </div>
            <div class="dropdown-row" style="width: 25%; margin-left: 5%; float:left">
                <label for="priceRange" class="form-label mt-4">Maximum price</label>
                <input type="email" class="form-control" id="priceRange">
            </div>
          </div>
          
</div>
<div style="margin-top: 85px;">
      <input class="form-control me-sm-2" type="text" placeholder="Search" style="width: 40%; margin-left: 2%; float:left">
      <button class="btn btn-secondary my-sm-0" style="margin-left: 40px">Search</button>
</div>

<br /><br />

<div >
<?php foreach ($conferences as $conf) : ?>
    <div class="card cards-devices">
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
            <a href=<?php echo '"'.base_url().'conference?id='.$conf["conference_id"].'"' ?> class="card-link">Show details</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
<?php endforeach; ?>
</div>