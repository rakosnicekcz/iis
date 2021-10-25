<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $conference["name"] ?></h3>
                        <br>
                        <div class="col">
                            <div class="white-box text-center"><img src="https://picsum.photos/600/400" class="img-responsive"></div>
                        </div>
                        <br>
                        <h4 class="box-title mt-5">Description</h4>
                        <p> <?php echo $conference["description"] ?> </p>
                    </div>
                </div>
            </div>

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
                <button href=<?php echo '"' . base_url() . 'conferenceedit?id=' . $conference["conference_id"] . '"' ?> class="btn btn-primary">Edit Presentation</button>
                <button type="button" class="btn btn-primary" onclick= "<?php echo base_url() ?>ConferenceController/Edit?id=<?php echo $conference['conference_id']; ?> ">Edit Presentation</button>
                <button type="button" class="btn btn-link">Back to Conferences</button>
                <a href=<?php echo '"' . base_url() . 'conferenceedit?id=' . $conference["conference_id"] . '"' ?> class="card-link">více</a>
            </div>
        </div>
    </div>

    <h3>  Presentations </h3>


<div class="accordion" id="accordionExample">
<?php foreach ($presentations as $presentation): ?>
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <?php echo $presentation["name"] ?> &#9; From <?php echo $presentation["start"] ?> Until <?php echo $presentation["finish"] ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Tu bude adresa a picovinky</strong> hehe
      </div>
    </div>
  </div>
<?php endforeach;?>
</div>
  </body>
</html>
