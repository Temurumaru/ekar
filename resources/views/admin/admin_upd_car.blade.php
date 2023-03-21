<?php
use RedBeanPHP\R as R;

$data = R::findOne("cars", "id = ?", [@$_GET['id']]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ecar finans Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  @include('blocks.adm_header')

  <main id="main" class="main">

    @include('blocks.notif')
    <div class="pagetitle">
      <h1>Car</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upd Car</h5>

              <!-- General Form Elements -->
              <form action="{{route('updCarC')}}" enctype="multipart/form-data" method="post">
								@csrf

                <input type="hidden" name="id" value="{{$data -> id}}">
                
                <div class="row mb-3">
                  <label for="model" class="col-sm-2 col-form-label">Model</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> model}}" id="model" name="model" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Stamp</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="stamp_id">
                      <option value="" selected="">Select</option>
                      <?php $stamps = R::findAll("stamps");?>
                      @foreach($stamps as $val)
                      <option value="{{$val -> id}}">{{$val -> name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="img_car_alpha" class="col-sm-2 col-form-label">Img car alpha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_car_alpha" id="img_car_alpha">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="img_bg" class="col-sm-2 col-form-label">Img city bg</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="img_bg" type="file" id="img_bg">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="price" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> price}}" min="0" class="form-control" placeholder="" name="price" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">sum</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="color" class="col-sm-2 col-form-label">Color</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> color}}" min="0" id="color" name="color" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="color_uz" class="col-sm-2 col-form-label">Color UZ</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> color_uz}}" min="0" id="color_uz" name="color_uz" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="battery_power" class="col-sm-2 col-form-label">Battery power</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> battery_power}}" min="0" step="0.1" class="form-control" placeholder="" name="battery_power" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">kw/h</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="year_release" class="col-sm-2 col-form-label">Year release</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> year_release}}" min="0" max="{{date('Y')}}" class="form-control" placeholder="" name="year_release" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">y</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="max_speed" class="col-sm-2 col-form-label">Max speed</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> max_speed}}" min="0" max="1000" class="form-control" placeholder="" name="max_speed" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">km/h</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="engine_power" class="col-sm-2 col-form-label">Engine power</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> engine_power}}" min="0" max="10000" class="form-control" placeholder="" name="engine_power" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">kw</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="acceleration" class="col-sm-2 col-form-label">Acceleration to 100 km/h</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> acceleration}}" min="0" max="120" step="0.1" class="form-control" placeholder="" name="acceleration" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">sec</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="range_travel" class="col-sm-2 col-form-label">Range of travel</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> range_travel}}" min="0" class="form-control" placeholder="" name="range_travel" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">km</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="places" class="col-sm-2 col-form-label">Places</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> places}}" min="0" class="form-control" placeholder="" name="places" aria-label="" aria-describedby="basic-addon2" required>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="regular_charging" class="col-sm-2 col-form-label">Regular charging</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> regular_charging}}" min="0" class="form-control" placeholder="" name="regular_charging" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">h</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="speed_charging" class="col-sm-2 col-form-label">Speed charging</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="number" value="{{$data -> speed_charging}}" min="0" class="form-control" placeholder="" name="speed_charging" aria-label="" aria-describedby="basic-addon2" required>
                      <span class="input-group-text" id="basic-addon2">min</span>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="size" class="col-sm-2 col-form-label">Size</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="text" value="{{$data -> size}}" maxlength="30" class="form-control" placeholder="" name="size" aria-label="" aria-describedby="basic-addon2" required>
                    </div>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="size_b" class="col-sm-2 col-form-label">Size etalon</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <input type="text" value="{{$data -> size_b}}" maxlength="65" class="form-control" placeholder="" name="size_b" aria-label="" aria-describedby="basic-addon2" required>
                    </div>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="description" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="620" id="description" name="description" required style="height: 100px">{{$data -> description}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="description_uz" class="col-sm-2 col-form-label">Description UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" required maxlength="620" id="description_uz" name="description_uz" style="height: 100px">{{$data -> description_uz}}</textarea>
                  </div>
                </div>

                <div class="row mb-5">
                  <label class="col-sm-2 col-form-label">Images</label>
                  <div class="col-sm-10">


                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img1" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img2" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img3" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img4" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img5" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img6" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img7" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img8" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="img9" aria-describedby="basic-addon2">
                    </div>

                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Upload</label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Press" >
                  </div>
                </div> 

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>