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
  <section class="vh-100 gradient-custom">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4">
              <?php if(isset($_SESSION['id'])):?>
              <h3 class="fw-bold mb-2"></h3>
              <?php else :?>
              <h3 class="fw-bold mb-2">Please, fill out the details for your reservation</h3>
              <?php echo form_open('ReservationController/reserve'); ?>
                <div class="form-outline form-white mb-4" style="margin:auto; width: 180px">
                  <input type="number" min="1" class="form-control" id="num_tickets" name="num_tickets" aria-describedby="emailHelp" style="width: 180px; text-align: center" value="0">
                  <label class="form-label" for="num_tickets" style="">Number of tickets</label>
                </div>
                <div class="form-outline form-white mb-4">
                    <input type="text" id="name" name="name" class="form-control form-control-lg" value="">
                    <span class="text-danger"></span>
                    <label class="form-label" for="name">Name</label>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="text" id="surename" name="surename" class="form-control form-control-lg" value="">
                    <span class="text-danger"></span>
                    <label class="form-label" for="surename">Surename</label>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="">
                    <span class="text-danger"></span>
                    <label class="form-label" for="email">Email</label>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!"></a></p>

                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Reserve tickets</button>
              <p class="text-danger" style="margin-top: 10px"></p>
              <?php form_close();?>
            </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>