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

<form method="post" action="<?php echo site_url('conference/conference');?>">
  <fieldset>
    <legend>Create a new conference</legend>
    <div class="form-group">
      <label for="name" class="form-label mt-4">Name</label>
      <input type="name" class="form-control" id="name" name="name" >
      <small id="name" class="form-text text-muted">Please type name for your conference</small>
    </div>
    <div class="form-group">
      <label for="genre" class="form-label mt-4">Genre</label>
      <select class="form-select" id="genre" name="genre_id">
      <?php foreach ($genres as $genre) : ?>
        <option value="<?php echo $genre["genre_id"]?>" name="genre"> <?php echo $genre["genre_id"]?> </option>
        <?php endforeach;?>
      </select>
    </div>
    <div class="form-group">
      <label for="description" class="form-label mt-4">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="image" class="form-label mt-4">Upload image</label>
      <input class="form-control" type="file" id="image">
    </div>
    <div class="form-group">
      <label for="place" class="form-label mt-4">Place</label>
      <input type="name" class="form-control" id="place" aria-describedby="place" name="place">
      <small id="place" class="form-text text-muted">Please type where your conference takes place</small>
    <div class="form-group">
      <label for="price" class="form-label mt-4">Price</label>
      <input type="name" class="form-control" id="price" aria-describedby="price" name="price" >
      <small id="price" class="form-text text-muted">Please type ticket price</small>
    </div>
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="from">Date from</label>
        <input class="form-control" id="from" placeholder="YYYY-MM-DD" type="text" name="from">
      </div>
    </div>
    <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="to">Date until</label>
        <input class="form-control" id="to" placeholder="YYYY-MM-DD" type="text" name="to">
      </div>

      <div class="form-group">
      <label for="capacity" class="form-label mt-4">Capacity</label>
      <input type="name" class="form-control" id="capacity" aria-describedby="capacity" name="capacity">
      <small id="capacity" class="form-text text-muted">Please type maximum conference capacity</small>
    </div>

    <div class="row">
      <div class="col">
        <br>
        <button type="button" class="btn btn-primary"><input type="submit" name="save" value="Save"/> </button>
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