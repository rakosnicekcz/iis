<section class="vh-200 gradient-custom mt-5">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <?php echo form_open_multipart('PresentationController/create'); ?>
            <input type="hidden" id="conference_id" name="conference_id" value=<?php echo $conference_id?>>
            <div class="mb-md-5 mt-md-4">
              <h2 class="fw-bold mb-2 text-uppercase">Create a new presentation</h2>
              <div class="form-outline form-white mb-4">
                <label for="name" class="form-label mt-4">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <span class="text-danger"><?php echo form_error('name'); ?></span>
                <small id="name" class="form-text text-muted">Please type name for your presentaton</small>
              </div>
              <div class="form-outline form-white mb-4">
                <label for="room" class="form-label mt-4">Room</label>
                <select class="form-select" id="room" name="room_id">
                  <option> Not selected </option>
                  <?php foreach ($rooms as $room) : ?>
                    <option value="<?php echo $room["room_id"] ?>" name="room"> <?php echo $room["street"] . ", " . $room["street_number"] . ", " . $room["postcode"] . ", " . $room["city"] ?> </option>
                  <?php endforeach; ?>
                </select>
                <span class="text-danger"><?php echo form_error('room_id'); ?></span>
              </div>
              <div class="form-outline form-white mb-4">
                <label for="description" class="form-label mt-4">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
              </div>
              <div class="form-outline form-white mb-4">
                <label for="tags" class="form-label mt-4">Tags</label>
                <textarea class="form-control" id="tags" rows="3" name="tags"></textarea>
              </div>
              <div class="form-group">
                <label for="formFile" class="form-label mt-4">Image</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
              </div>
              <div class="form-outline form-white mb-4">
                <!-- Date input -->
                <label class="control-label" for="from">Presentation start</label>
                <input class="form-control" id="start" type="datetime-local" name="start">
                <span class="text-danger"><?php echo form_error('start'); ?></span>
              </div>
            </div>
            <div class="form-outline form-white mb-4">
              <!-- Date input -->
              <label class="control-label" for="finish">Presentation end</label>
              <input class="form-control" id="finish" type="datetime-local" name="finish">
              <span class="text-danger"><?php echo form_error('finish'); ?><?php echo $this->session->flashdata('date_error'); ?></span>
            </div>

            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Create</button>
            <?php form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>