<?php
use RedBeanPHP\R as R;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Stamps</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr class="">
                      {{-- <th scope="col"><a href="?stamps_srch=id">ID <?=(@$_GET['stamps_srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th> --}}
                      <th scope="col"><a href="?stamps_srch=name">Name <?=(@$_GET['stamps_srch'] == 'name') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $stamps_srch = "id";

                    if(@$_GET['stamps_srch'] == "id") $stamps_srch = "id DESC";
                    if(@$_GET['stamps_srch'] == "name") $stamps_srch = "name";


                    $stamps = R::find("stamps", "ORDER BY ".$stamps_srch);
                    foreach ($stamps as $val) { ?>

                    <tr>
                      {{-- <td><?=$val -> id?></td> --}}
                      <td><?=$val -> name?></td>
                      <td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <a class="btn btn-sm btn-warning" href="/admin_upd_stamp?id=<?=$val -> id?>">Edit</a>
                          <a class="btn btn-sm btn-danger" onclick="delStampOnCLick(<?=$val -> id?>, '<?=$val -> name?>')" href="#">Delete</a>
                        </div>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
            

            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Cars List</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th scope="col"><a href="?srch=id">ID <?=(@$_GET['srch'] == 'id') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th> --}}
                      <th scope="col"><a href="?srch=stamp">Stamp <?=(@$_GET['srch'] == 'stamp') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?srch=model">Model <?=(@$_GET['srch'] == 'model') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?srch=color">Color <?=(@$_GET['srch'] == 'color') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col"><a href="?srch=views">Views <?=(@$_GET['srch'] == 'views') ? '<i class="bi bi-caret-down-fill"></i>' : ''?></a></th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                    $srch = "id";

                    if(@$_GET['srch'] == "id") $srch = "id DESC";
                    if(@$_GET['srch'] == "stamp") $srch = "stamp_id";
                    if(@$_GET['srch'] == "model") $srch = "model";
                    if(@$_GET['srch'] == "color") $srch =  "color";
                    if(@$_GET['srch'] == "views") $srch = "views DESC";


                    $blogs = R::find("cars", "ORDER BY ".$srch);
                    foreach ($blogs as $val) {
                    $stamp = R::findOne("stamps", "id = ?", [$val -> stamp_id]);?>

                    <tr>
                      {{-- <td><?=$val -> id?></td> --}}
                      <td><?=$stamp -> name?></td>
                      <td><?=$val -> model?></td>
                      <td><?=$val -> color?></td>
                      <td><?=$val -> views?></td>
                      <td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <a class="btn btn-sm btn-success" target="_blank" href="/product_single?id=<?=$val -> id?>">Open</a>
													<a class="btn btn-sm btn-warning" href="/admin_upd_car?id=<?=$val -> id?>">Edit</a>
													<a class="btn btn-sm btn-danger" onclick="delCarOnCLick(<?=$val -> id?>, '<?=$val -> model?>')" href="#">Delete</a>
                        </div>
                      </td>
                    </tr>

                    <?php }?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>

            @if (@$_SESSION['admin'] -> level >= 5)
            <div class="card col-12">
              <div class="card-body">
                <h5 class="card-title">Admins List</h5>
  
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Login</th>
                      <th scope="col" style="display:flex;justify-content: flex-end;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
										
                    <?php
										$ads = R::find("admins", "level != ?", [5]);
										foreach ($ads as $val) {
											?>
										<tr>
											<th scope="row"><?=$val -> id?></th>
											<td><?=$val -> login?></td>
											{{-- <td><?=$val -> level?></td> --}}
											<td style="display:flex;justify-content: flex-end;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <button type="button" onclick="delAdminOnCLick(<?=$val -> id?>, '<?=$val -> login?>')" class="btn btn-danger btn-sm">Delete</button>
                        </div>
                      </td>
                    </tr>
										<?php }?>

                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
            @endif

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Website Traffic -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Sponsors Traffic</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [
                        <?php $blogs = R::findAll("sponsors"); ?>
                        @foreach($blogs as $val)
                          value: {{$val -> views}},
                          name: '{{$val -> title}}'
                        @endforeach
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->


          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Pages Traffic</h5>

              <div id="trafficChart2" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart2")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [
                        <?php $pags = R::findAll("text_pages");?>
                        @foreach($pags as $vl)
                          value: {{$vl -> views}},
                          name: '{{$vl -> title}}'
                        @endforeach
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->

  <script>
		function delStampOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delStampC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						if(data != "false") {
              location.reload();
            } else {
              alert("Cars use this stamp.");
            }
					}
				});
			}
		}
    
    function delCarOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delCarC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function () {
            location.reload();
					}
				});
			}
		}

    @if (@$_SESSION['admin'] -> level >= 5)
		function delAdminOnCLick(id, ps_title) {
			if(confirm('Вы точно хотите удалить '+ps_title)) {
				$.ajax({
					type: "delete",
					url: "{{route('delAdminC')}}",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						id: id
					},
					dataType: "html",
					success: function (data) {
						location.reload();
					}
				});
			}
		}
    @endif
	</script>

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
