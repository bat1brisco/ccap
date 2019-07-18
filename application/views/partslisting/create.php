<div class="container post-product">
  <div class="row">
    <div class="col-12 p-3">

    <?php echo form_open_multipart('partslisting/create'); ?>
      <h4 class="text-center"><?= $title; ?></h4>
      <div class="row mt-5 mb-4">
        <div class="col-md">
          <label for="">Category</label>
          <select class="form-control" name="category">
            <option value="Wheels">Wheels</option>
            <option value="Tires">Tires</option>
            <option value="Internal Accesories">Internal Accessories</option>
            <option value="Suspension">Suspension</option>
            <option value="Transmission">Transmission</option>
            <option value="Drive Shafts">Drive Shafts</option>
            <option value="Brakes">Brakes</option>
            <option value="Engine">Engine</option>
            <option value="External Accessories">External Accessories</option>
          </select>

          <span class="text-danger">
            <?php echo form_error('brand'); ?>
          </span>
        </div>

        <div class="col-md">
          <label for="inputBrand">Brand</label>
          <input type="text" class="form-control" id="inputBrand" name="brand" placeholder="Brand" value="<?php echo isset($_POST["brand"]) ? $_POST["brand"] : ''; ?>">
          <span class="text-danger">
            <?php echo form_error('brand'); ?>
          </span>
        </div>

        <div class="col-md">
          <label for="">Model Name</label>
            <input type="text" class="form-control" name="model_name" id="model_name" placeholder="Model Name" value="<?php echo isset($_POST["model_name"]) ? $_POST["model_name"] : ''; ?>">
            <span class="text-danger">
            <?php echo form_error('model_name'); ?>
          </span>
        </div>        
      </div>

      <div class="row mb-4">
        <div class="col-md">
          <label for="">Quantity</label>
            <input type="number" class="form-control" name="parts_quantity" id="parts_quantity" placeholder="Parts Quantity" value="<?php echo isset($_POST["parts_quantity"]) ? $_POST["parts_quantity"] : ''; ?>">
              <span class="text-danger">
            <?php echo form_error('parts_quantity'); ?>
          </span>
        </div>

        <div class="col-md">
          <label for="">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : ''; ?>">
              <span class="text-danger">
            <?php echo form_error('price'); ?>
          </span>
        </div>

        <div class="col-md">
          <label for="">Color</label>
            <input type="text" class="form-control" name="color" id="color" placeholder="Product Color" value="<?php echo isset($_POST["color"]) ? $_POST["color"] : ''; ?>">
            <span class="text-danger">
            <?php echo form_error('color'); ?>
          </span>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md">
          <label for="">Description</label>
            <textarea class="form-control" rows="3" name="description"></textarea>
            <span class="text-danger">
            <?php echo form_error('description'); ?>
          </span>
        </div>

        <div class="col-md">
          <label for="">Reason For Selling</label>
          <textarea class="form-control" rows="3" name="rfs"></textarea>
            <span class="text-danger">
            <?php echo form_error('rfs'); ?>
          </span>
        </div>        
      </div>

      <div class="row mb-4">
        <div class="col-md">
          <label for="">Upload Image</label>
            <input type="file" name="userfile" value="Upload Images">
        </div>    
      </div>
          
      <button type="submit" class="btn btn-primary float-right">Submit</button>


    <?php echo form_close(); ?>

    </div>
  </div>
</div>

