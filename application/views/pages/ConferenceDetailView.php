<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <a href=<?php echo base_url(); ?> style="margin-top 90px; margin-left: 10px;">
    <button style="margin-top: 80px; margin-bottom: 10px; margin-left: 10px" type="button" class="btn btn-primary btn-lg">
      <-- Back to conferences</button>
  </a>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card cards-devices" style="margin-top: 10px; height: 100%; margin:auto; width: 90%">
          <div class="card-body">
            <h3 class="card-title"><?php echo $conference["name"] ?></h3>
            <br>
            <div class="col">
              <div class="white-box text-center"><img src="https://picsum.photos/600/400" class="responsive-img"></div>
            </div>
            <br>
            <h4 class="box-title mt-5">Description</h4>
            <p> <?php echo $conference["description"] ?> </p>
          </div>
        </div>
      </div>
      <div style="margin-top: 20px;">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#info">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#presentations">Presentations</a>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade show active" id="info" style="margin-top: 5%">
            <h3>Location</h3>
            <?php echo $conference["place"] ?><br></br>
            <h3>Date and time</h3>
            From <?php echo date("d. m. Y H:i", strtotime($conference["from"])) ?> <br>Until <?php echo date("d. m. Y H:i", strtotime($conference["to"])) ?><br></br>
            <h3>Genre</h3>
            <?php echo $conference["genre_id"] ?><br></br>
            <h3>Description</h3>
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
            <div style="float:left">
              <h3>Free slots</h3>
              <p><?php echo $available . "/" . $conference["capacity"] ?></p>
            </div>
            <div style="float:left; margin-left: 50px">
              <h3>Price</h3>
              <p><?php echo $conference["price"] ?> $ / ticket</p>
            </div>

            <div style="margin-left: 50px; margin-top: 20px;float:left; margin-bottom: 10px">
              <a href=<?php echo site_url('reserveTickets/reserveTickets'); ?> class="btn btn-primary">Reserve tickets</a>
            </div>
          </div>
          <div class="tab-pane fade" id="presentations" style="margin-top: 20px; margin-bottom: 20px">
            <div class="accordion" id="accordion1">
              <?php foreach ($presentations as $presentation) : ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <?php echo $presentation["name"] ?> <?php echo date("H:i", strtotime($presentation["start"])) ?> - <?php echo date("H:i", strtotime($presentation["finish"])) ?>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                    <div class="accordion-body">
                      <strong> <?php echo $presentation["tags"] ?></strong> <br></br> <?php echo $presentation["description"] ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>