 <div class="detail-img">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title"><?php echo $conference["name"] ?></h3>
        <br>
        <div>
          <div class="white-box text-center">

            <?php if ($conference["image"] == "") : ?>
              <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                <rect width="100%" height="100%" fill="#868e96"></rect>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Imageless</text>
              </svg>
            <?php else : ?>
              <img src="<?php echo "uploads/" . $conference["image"] ?>" class="responsive-img">
            <?php endif; ?>
          </div>
        </div>
        <br>
        <h4 class="box-title mt-5">Description</h4>
        <p> <?php echo $conference["description"] ?> </p>
      </div>
    </div>
  </div>
  <div class="detail-desc">
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
<<<<<<< Updated upstream
          <?php endforeach; ?>
        </div>
=======

             <div class="col">
                        <h4 class="box-title mt-5">Where?</h4>
                        <div class="row">
                            <div class="col">
                            <img src="https://img.icons8.com/ios/50/000000/worldwide-location.png" alt="Conference place" class="img-thumbnail">
                            </div>
                            <div class="col">
                                <p> <?php echo $conference["place"] ?> <p>
                            </div>
                        </div>
                        <h4 class="box-title mt-5">When?</h4>
                        <div class="row">
                            <div class="col">
                            <img src="https://img.icons8.com/dotty/80/000000/time.png" alt="Conference place" class="img-thumbnail">
                            </div>
                            <div class="col">
                                <p>  <?php echo date("d-m-Y", strtotime($conference["from"])) ?> until <?php echo date("d-m-Y", strtotime($conference["to"])) ?> <p>
                            </div>
                        </div>
                        <h4 class="box-title mt-5">Available seats</h4>
                        <p> <?php echo $available ?>/<?php echo $conference["capacity"] ?> </p>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary btn-lg">Buy Ticket</button>
                            </div>
                            <div class="col">
                                <p>  <?php echo $conference["price"] ?> $ <p>
                            </div>
                    </div>
            </div>

            <div class="col">
                <br>
                <button onclick='location.href=<?php echo '"' . base_url() . 'conferenceedit?id=' . $conference["conference_id"] . '"' ?>' class="btn btn-primary">Edit Conference</button>
                <button onclick='location.href=<?php echo '"' . base_url() . 'PresentationEdit?id=2' . '"' ?>' class="btn btn-primary">Edit Presentation</button>
                <button onclick='location.href=<?php echo '"' . base_url() . 'conferencecreate'. '"'?>' class="btn btn-primary">New Conference</button>
                <button onclick='location.href=<?php echo '"' . base_url() . 'PresentationCreate?conference_id=' . $conference["conference_id"] . '"'?>' class="btn btn-primary">New Presentation</button>
                <button onclick='location.href=<?php echo '"' . base_url() . 'conference'. '"'?>' class="btn btn-link">Back to conferences</button>
            </div>
        </div>
    </div>

    <h3>  Presentations </h3>


<div class="accordion" id="accordionExample">
<?php foreach ($presentations as $presentation): ?>
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <?php echo $presentation["name"] ?> &#9; From <?php echo $presentation["Start"] ?> Until <?php echo $presentation["Finish"] ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Tu bude adresa a picovinky</strong> hehe
>>>>>>> Stashed changes
      </div>
    </div>
  </div>