<?php
use RedBeanPHP\R as R;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ecar finans Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
      <h1>Data Page</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Data</h5>

              <!-- General Form Elements -->
              <form action="{{route('updDataC')}}" enctype="multipart/form-data" method="post">
								@csrf
								
								<?php
									$data = R::findOne('data', "id = ?", [1]);
								?>

                <h3>Contacts</h3>
                
                <div class="row mb-3">
                  <label for="address_desc" class="col-sm-2 col-form-label">Address desc</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="255" id="address_desc" name="address_desc" required style="height: 140px">{{$data -> address_desc}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="address_desc_uz" class="col-sm-2 col-form-label">Address desc UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="255" id="address_desc_uz" name="address_desc_uz" required style="height: 140px">{{$data -> address_desc_uz}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$data -> email}}" maxlength="100" id="email" name="email" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tel" class="col-sm-2 col-form-label">Tel</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> tel}}" maxlength="100" id="tel" name="tel" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="address" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> address}}" maxlength="150" id="address" name="address" class="form-control" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="time_work" class="col-sm-2 col-form-label">Time work</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> time_work}}" maxlength="100" id="time_work" name="time_work" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="time_work_uz" class="col-sm-2 col-form-label">Time work UZ</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> time_work_uz}}" maxlength="100" id="time_work_uz" name="time_work_uz" class="form-control" required>
                  </div>
                </div>

                <h3>Social</h3>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Telegram</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> telegram}}" class="form-control" placeholder="Url" name="telegram" aria-label="Telegram" aria-describedby="basic-addon1" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Instagram</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> instagram}}" class="form-control" placeholder="Url" name="instagram" aria-label="instagram" aria-describedby="basic-addon1" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Facebook</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data -> facebook}}" class="form-control" placeholder="Url" name="facebook" aria-label="facebook" aria-describedby="basic-addon1" required>
                  </div>
                </div>

                <h3>About page</h3>

                <div class="row mb-3">
                  <label for="about_desc" class="col-sm-2 col-form-label">About desc</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="3000" id="about_desc" name="about_desc" required style="height: 140px">{{$data -> about_desc}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="about_desc_uz" class="col-sm-2 col-form-label">About desc UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="3000" id="about_desc_uz" name="about_desc_uz" required style="height: 140px">{{$data -> about_desc_uz}}</textarea>
                  </div>
                </div>

                <h3>Charge page</h3>

                <div class="row mb-3">
                  <label for="charge_desc" class="col-sm-2 col-form-label">Charge desc</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="3000" id="charge_desc" name="charge_desc" required style="height: 140px">{{$data -> charge_desc}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="charge_desc_uz" class="col-sm-2 col-form-label">Charge desc UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="3000" id="charge_desc_uz" name="charge_desc_uz" required style="height: 140px">{{$data -> charge_desc_uz}}</textarea>
                  </div>
                </div>

                <h3>Lizing page</h3>

                <div class="row mb-3">
                  <label for="lizing_desc" class="col-sm-2 col-form-label">Lizing desc</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="3000" id="lizing_desc" name="lizing_desc" required style="height: 140px">{{$data -> lizing_desc}}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="lizing_desc_uz" class="col-sm-2 col-form-label">Lizing desc UZ</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" maxlength="3000" id="lizing_desc_uz" name="lizing_desc_uz" required style="height: 140px">{{$data -> lizing_desc_uz}}</textarea>
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Update</label>
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

</body>

</html>