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

    <title>Edit Conference</title>
  </head>
  <body>

<form role="form" method="post" action="<?php echo site_url('ConferenceController/Edit');?>">
  <fieldset>
    <legend>Edit conference "<?php echo $conference["name"];?>"</legend>
    <div class="form-group">
      <label for="conferenceName" class="form-label mt-4">Name</label>
      <input type="name" class="form-control" id="conferenceName" aria-describedby="emailHelp" value="<?php echo $conference["name"]?>">
      <small id="emailHelp" class="form-text text-muted">Please type name for your conference</small>
    </div>
    <div class="form-group">
      <label for="genreSelect" class="form-label mt-4">Genre</label>
      <select class="form-select" id="genreSelect">
      <?php foreach ($genres as $genre) : ?>
        <option><?php echo $genre["name"]?></option>
        <?php endforeach;?>
      </select>
    </div>
    <div class="form-group">
      <label for="description" class="form-label mt-4">Description</label>
      <textarea class="form-control" id="description" rows="3"> <?php echo $conference["description"]?></textarea>
    </div>
    <div class="form-group">
      <label for="conferenceImage" class="form-label mt-4">Upload image</label>
      <input class="form-control" type="file" id="conferenceImage">
    </div>
    <div class="form-group">
      <label for="conferencePlace" class="form-label mt-4">Name</label>
      <input type="name" class="form-control" id="conferencePlace" aria-describedby="emailHelp" value="<?php echo $conference["place"]?>">
      <small id="emailHelp" class="form-text text-muted">Please type where your conference takes place</small>
    </div>
    <div class="form-group">
      <label for="conferencePlace" class="form-label mt-4">Name</label>
      <input type="name" class="form-control" id="conferencePlace" aria-describedby="emailHelp" value="<?php echo $conference["place"]?>">
      <small id="emailHelp" class="form-text text-muted">Please type where your conference takes place</small>
    </div>
    <div class="form-group">
      <label for="conferencePrice" class="form-label mt-4">Price</label>
      <input type="name" class="form-control" id="conferencePrice" aria-describedby="conferencePrice" value="<?php echo $conference["price"]?>">
      <small id="conferencePrice" class="form-text text-muted">Please type ticket price</small>
    </div>
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date from</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>
    </div>
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date until</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>

      <div class="form-group">
      <label for="conferenceCapacity" class="form-label mt-4">Capacity</label>
      <input type="name" class="form-control" id="conferenceCapacity" aria-describedby="conference Capacity" value="<?php echo $conference["capacity"]?>">
      <small id="conferenceCapacity" class="form-text text-muted">Please type maximum conference capacity</small>
    </div>

    <div class="row">
      <div class="col">
        <br>
        <button type="button" class="btn btn-primary"> Save </button>
      </div>
      <div class="col">
        <br>
        <button type="button" class="btn btn-primary"> Cancel </button>
      </div>
    </div>

    </div>
</div>
    
</form>

</body>>