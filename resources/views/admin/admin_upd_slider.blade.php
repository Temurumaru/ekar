<?php
use RedBeanPHP\R as R;

$data = R::findAll("slides");
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
      <h1>Home page</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Upd Slider</h5>

              <!-- General Form Elements -->
              <form action="{{route('updSliderC')}}" enctype="multipart/form-data" method="post">
								@csrf

                <h3 style="margin-top: 2.6rem">Slide 1</h3>

                <div class="row mb-3">
                  <label for="img_bg1" class="col-sm-2 col-form-label">Img bg</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_bg1" id="img_bg1">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="img_alpha1" class="col-sm-2 col-form-label">Img alpha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_alpha1" id="img_alpha1">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name1" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" id="name1" maxlength="100" name="name1" value="{{$data[1] -> name}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name1_uz" class="col-sm-2 col-form-label">Name UZ</label>
                  <div class="col-sm-10">
                    <input type="text" id="name1_uz" maxlength="100" name="name1_uz" value="{{$data[1] -> name_uz}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="desc1" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="300" id="desc1" name="desc1" required style="height: 100px">{{$data[1] -> description}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="desc1_uz" class="col-sm-2 col-form-label">Description UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="300" id="desc1_uz" name="desc1_uz" required style="height: 100px">{{$data[1] -> description_uz}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sub_desc1" class="col-sm-2 col-form-label">Sub desc</label>
                  <div class="col-sm-10">
                    <input type="text" id="sub_desc1" maxlength="80" name="sub_desc1" value="{{$data[1] -> sub_desc}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sub_desc_uz1" class="col-sm-2 col-form-label">Sub desc UZ</label>
                  <div class="col-sm-10">
                    <input type="text" id="sub_desc_uz1" maxlength="80" name="sub_desc_uz1" value="{{$data[1] -> sub_desc_uz}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag1_1" class="col-sm-2 col-form-label">Tag 1</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag1_1" maxlength="80" name="tag1_1" value="{{$data[1] -> tag1}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag2_1" class="col-sm-2 col-form-label">Tag 2</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag2_1" maxlength="80" name="tag2_1" value="{{$data[1] -> tag2}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag3_1" class="col-sm-2 col-form-label">Tag 3</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag3_1" maxlength="80" name="tag3_1" value="{{$data[1] -> tag3}}" class="form-control">
                  </div>
                </div>


                <h3 style="margin-top: 2.6rem">Slide 2</h3>

                <div class="row mb-3">
                  <label for="img_bg2" class="col-sm-2 col-form-label">Img bg</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_bg2" id="img_bg2">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="img_alpha2" class="col-sm-2 col-form-label">Img alpha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_alpha2" id="img_alpha2">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name2" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" id="name2" maxlength="100" name="name2" value="{{$data[2] -> name}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name2_uz" class="col-sm-2 col-form-label">Name UZ</label>
                  <div class="col-sm-10">
                    <input type="text" id="name2_uz" maxlength="100" name="name2_uz" value="{{$data[2] -> name_uz}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="desc2" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="300" id="desc2" name="desc2" required style="height: 100px">{{$data[2] -> description}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="desc_uz2" class="col-sm-2 col-form-label">Description UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="300" id="desc_uz2" name="desc_uz2" required style="height: 100px">{{$data[2] -> description_uz}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sub_desc2" class="col-sm-2 col-form-label">Sub desc</label>
                  <div class="col-sm-10">
                    <input type="text" id="sub_desc2" maxlength="80" name="sub_desc2" value="{{$data[2] -> sub_desc}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sub_desc_uz2" class="col-sm-2 col-form-label">Sub desc UZ</label>
                  <div class="col-sm-10">
                    <input type="text" id="sub_desc_uz2" maxlength="80" name="sub_desc_uz2" value="{{$data[2] -> sub_desc_uz}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag1_2" class="col-sm-2 col-form-label">Tag 1</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag1_2" maxlength="80" name="tag1_2" value="{{$data[2] -> tag1}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag2_2" class="col-sm-2 col-form-label">Tag 2</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag2_2" maxlength="80" name="tag2_2" value="{{$data[2] -> tag2}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag3_2" class="col-sm-2 col-form-label">Tag 3</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag3_2" maxlength="80" name="tag3_2" value="{{$data[2] -> tag3}}" class="form-control">
                  </div>
                </div>


                <h3 style="margin-top: 2.6rem">Slide 3</h3>

                <div class="row mb-3">
                  <label for="img_bg3" class="col-sm-2 col-form-label">Img bg</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_bg3" id="img_bg3">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="img_alpha3" class="col-sm-2 col-form-label">Img alpha</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="img_alpha3" id="img_alpha3">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" id="name3" maxlength="100" name="name3" value="{{$data[3] -> name}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name3_uz" class="col-sm-2 col-form-label">Name UZ</label>
                  <div class="col-sm-10">
                    <input type="text" id="name3_uz" maxlength="100" name="name3_uz" value="{{$data[3] -> name_uz}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="desc3" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="300" id="desc3" name="desc3" required style="height: 100px">{{$data[3] -> description}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="desc_uz3" class="col-sm-2 col-form-label">Description UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="300" id="desc3_uz" name="desc_uz3" required style="height: 100px">{{$data[3] -> description_uz}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sub_desc3" class="col-sm-2 col-form-label">Sub desc</label>
                  <div class="col-sm-10">
                    <input type="text" id="sub_desc3" maxlength="80" name="sub_desc3" value="{{$data[3] -> sub_desc}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sub_desc_uz3" class="col-sm-2 col-form-label">Sub desc UZ</label>
                  <div class="col-sm-10">
                    <input type="text" id="sub_desc_uz3" maxlength="80" name="sub_desc_uz3" value="{{$data[3] -> sub_desc_uz}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag1_3" class="col-sm-2 col-form-label">Tag 1</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag1_3" maxlength="80" name="tag1_3" value="{{$data[3] -> tag1}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag2_3" class="col-sm-2 col-form-label">Tag 2</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag2_3" maxlength="80" name="tag2_3" value="{{$data[3] -> tag2}}" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tag3_3" class="col-sm-2 col-form-label">Tag 3</label>
                  <div class="col-sm-10">
                    <input type="text" id="tag3_3" maxlength="80" name="tag3_3" value="{{$data[3] -> tag3}}" class="form-control">
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Upd</label>
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