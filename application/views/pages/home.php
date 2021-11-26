<script type='text/javascript' src="<?php echo base_url(); ?>js/home.js"></script>
<?php if ($justloggedin) : ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>successfully logged in</strong>.
    </div>
<?php endif; ?>

<!-- ROWS -->
<div class="dropdown" style="float:left">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color:rgba(255,255,255,.6);" data-keepOpenOnClick>Filters</a>
    <div class="dropdown-menu dropdown-multicol" style="width: 300px; margin-left: 10px;" data-keepOpenOnClick>
        <div class="dropdown-row" style="margin-left: 2%">
            <div style="float:left">
                <label for="countrySelect" class="form-label mt-4">Country</label>
                <select class="form-select" id="countrySelect" style="width: 120px">
                    <option selected>-</option>
                    <?php foreach ($countries as $country) : ?>
                        <option><?php echo $country["name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="margin-left: 135px">
                <label for="freeSlots" class="form-label mt-4">Free slots</label>
                <input type="number" min="0" class="form-control" id="freeSlots" style="width: 120px">
            </div>
        </div>

        <div class="dropdown-row" style="margin-left: 2%;">
            <div style="float:left">
                <label for="from" class="form-label mt-4">From</label>
                <input type="date" class="form-control" id="from" style="width: 120px">
            </div>
            <div style="margin-left: 135px">
                <label for="to" class="form-label mt-4">To</label>
                <input type="date" class="form-control" id="to" style="width: 120px">
            </div>
        </div>

        <div class="dropdown-row" style="margin-left: 2%;">
            <div style="float:left">
                <label for="priceRange" class="form-label mt-4">Maximum price</label>
                <input type="number" min="0" step="0.01" class="form-control" id="priceRange" style="width: 120px">
            </div>
            <div style="margin-left: 135px">
                <label for="genreSelect" class="form-label mt-4">Genre</label>
                <select class="form-select" id="genreSelect" style="width: 120px">
                    <option selected>-</option>
                    <?php foreach ($genres as $genre) : ?>
                        <option><?php echo $genre["name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- element pre Matejka -->
        <!-- <div class="dropdown-row" style="margin-left: 2%;" >
            <div style="float:left">
                <label for="genreSelect" class="form-label mt-4">Genre</label>
                <select class="form-select" id="genreSelect" style="width: 120px">
                <option selected>-</option>
                <?php foreach ($genres as $genre) : ?>
                   <option><?php echo $genre["name"] ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div style="margin-left: 135px">
                <label for="genreSelect" class="form-label mt-4">Genre</label>
                <select class="form-select" id="genreSelect" style="width: 120px">
                <option selected>-</option>
                <?php foreach ($genres as $genre) : ?>
                   <option><?php echo $genre["name"] ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>            -->
    </div>

</div>
<div style="margin-top: 85px;">
    <input class="form-control me-sm-2" type="text" id="searchInput" placeholder="Search" style="width: 40%; margin-left: 2%; float:left">
    <button class="btn btn-secondary my-sm-0" style="margin-left: 40px">Search</button>
</div>

<br /><br />

<div>
    <?php foreach ($conferences as $conf) : ?>
        <div class="card cards-devices">
            <h4 class="card-header"><?php echo $conf["name"] ?></h3>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $conf["place"] ?>
            </h4>
            <h6 class="card-subtitle text-muted"><?php echo $conf["from"] . " - " . $conf["to"] ?></h6>
        </div>
        <?php if ($conf["image"] == "") : ?>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                <rect width="100%" height="100%" fill="#868e96"></rect>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">No image</text>
            </svg>
        <?php else : ?>
            <div style="height: 200px; width: 353px;">
                <img src="<?php echo "uploads/" . $conf["image"] ?>" class="img-fluid" alt="Responsive image" style="max-width: 100%; max-height: 100%; margin: auto; display: block;">
            </div>
        <?php endif; ?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Price: <?php echo $conf["price"] ?></li>
            <li class="list-group-item">Tickets left: <?php echo '<span class="ticketsLeft">' . $conf["left"] . '</span>/<span class="ticketsCapacity" >' . $conf["capacity"] . "</span>" ?></li>
        </ul>
        <div class="card-body">
            <a href=<?php echo '"' . base_url() . 'conference?id=' . $conf["id"] . '"' ?> class="card-link">Show details</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
</div>
<?php endforeach; ?>
</div>