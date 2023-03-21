<?php 
use RedBeanPHP\R as R;

$stamp = R::findOne("stamps", "id = ?", [@$_GET['stamp_id']]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- aaaa -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ECARFINANS</title>

  <link rel="icon" href="./project/image/icon.png" type="image/gif">

  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />

  <script src="./project/plugins/tailwind/tailwind.js"></script>

  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />

</head>

<body>

  <div class="wrapper ">  
    
    @include('blocks.header')

    
    <main class=" mt-[84px] md:mt-[134px]">
     
      <section class="product min-h-screen bg-[url('./project/image/bg.png')] bg-no-repeat bg-cover py-14">
        <div class="container">
          <h1 data-aos="fade-right" class="mb-12 text-2xl text-navbarColor md:text-4xl section__title before:bg-navbarColor">
            {{LN['Каталог автомобилей']}} <?=(isset($_GET['stamp_id'])) ? $stamp -> name : ""?>
          </h1>
          <div class="grid grid-cols-1 gap-10 md:grid-cols-2">

            <?php 
            
            // $tops = R::find("cars", "ORDER BY IF(views > 0, 1, 1), views DESC");

            $limit = 8;

            if(isset($_GET['stamp_id'])) {
              $needles = R::count('cars', "stamp_id = ?", [$_GET['stamp_id']]);
            } else {
              $needles = R::count('cars');
            }
            $n2 = false;
            if($needles > $limit) $n2 = true;
              
            $total_pages = ceil($needles / $limit);
            
            if($total_pages < 2) $n2 = false;
              
            if(isset($_GET['this_page'])) {
              $this_page = $_GET['this_page'];
              if($this_page < 1 || $this_page > $total_pages) {$this_page = 1;}
            } else {
              $this_page = 1;
            }
            
            if(isset($_GET['stamp_id'])) {
              $tops = R::find("cars","stamp_id = ? ORDER BY IF(views > 0, 1, 1), id DESC LIMIT " . (($this_page-1)*$limit).', '.$limit, [$_GET['stamp_id']]);
            } else {
              $tops = R::find("cars","ORDER BY IF(views > 0, 1, 1), id DESC LIMIT " . (($this_page-1)*$limit).', '.$limit);
            }
            ?>

            @foreach($tops as $val)
            
            <?php $stamp = R::findOne("stamps", "id = ?", [$val -> stamp_id])?>
            
            <div data-aos="fade-up" class=" p-5 md:p-[15px] lg:p-[30px]   card group duration-300  border-l-4 border-navbarColor">
              <div
                class="grid grid-cols-1 grid-rows-2 duration-300 md:grid-cols-5 md:grid-rows-1 gap-y-5 gap-x-0 md:gap-x-5 md:gap-y-0 group-hover:text-white text-textColor">
                <div class="col-span-3 space-y-3 ">
                  <h1 class="text-xl md:text-2xl lg:text-3xl ">
                    {{$stamp -> name}} {{$val -> model}}
                  </h1>
                  <p class="text-sm opacity-50">
                    {{LN['Стоимость']}} <?=number_format((int)$val -> price, 0, ' ', ' '); ?> {{LN['сум']}}
                  </p>
                  <a href="./product_single?id={{$val -> id}}">
                    <img
                       class=" w-full object-contain h-[300px] lg:h-[180px] xl:h-[220px] group-hover:scale-105 duration-300 top-2 left-5"
                       src="/upl_data/imgs/alpha/{{$val -> img_car_alpha}}">
                  </a>
                </div>
                <div class="col-auto md:col-span-2 space-y-[10px]">
                  <div class="space-y-1">
                    <p class="opacity-50">
                      {{LN['Дальность хода']}}
                    </p>
                    <h1 class=" text-md lg:text-[25px]">
                      {{$val -> range_travel}}
                    </h1>
                  </div>
                  <div class="space-y-1">
                    <p class="opacity-50">
                      {{LN['Мощность двигателя']}}
                    </p>
                    <h1 class="text-md lg:text-[25px]">
                      {{$val -> engine_power}}
                    </h1>
                  </div>
                  <div class="space-y-1">
                    <p class="opacity-50">
                      {{LN['Аккумулятор']}}
                    </p>
                    <h1 class="text-md lg:text-[25px]">
                      {{$val -> battery_power}}
                    </h1>
                  </div>

                  <div class="">
                    <a href="./installment?id={{$val -> id}}"
                    class="block w-full py-4 mb-2 text-sm text-center text-white border-2 border-white bg-navbarColor ">
                    {{LN['Калькуляция']}}
                  </a>
                    <a href="/product_single?id={{$val -> id}}"
                      class="block w-full py-4 text-sm text-center bg-white border-2 border-navbarColor text-navbarColor">
                      {{LN['Подробнее']}}
                    </a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach


            <div data-aos="fade-down" data-aos-delay="20" class="flex justify-center col-span-1 md:col-span-2">
              <div class="flex items-center space-x-5">

                <?php if($n2) {
                  $st = $this_page - 2;
                  if($st < 1) $st = 1;
                  $en = $this_page + 2;
                  if($en > ($total_pages)) $en = $total_pages+1;
                  ?>
                  <?php if(!($this_page <= 1)) {?>
                    <a href="?this_page=<?=$this_page - 1?>" class="text-2xl text-textColor hover:text-navbarColor active:text-navbarColor">
                      <i class="ri-arrow-left-s-line"></i>
                    </a>
                  <?php }?>
                  
                  <div class="space-x-4">
                  <?php
                    while ($st != $en) {
                  ?>

                  <a href="?this_page=<?=$st?>" class="text-lg hover:text-navbarColor <?=($this_page == $st) ? "text-navbarColor" : "text-textColor"?>"><?=$st?></a>
                    
                  <?php
                    $st++; }
                  ?>
                  </div>
                  
                  <?php if(!($this_page >= $total_pages)) {?>
                    <a href="?this_page=<?php echo 1 + $this_page;?>" class="text-2xl text-textColor hover:text-navbarColor active:text-navbarColor">
                      <i   class="ri-arrow-right-s-line"></i>
                    </a>
                  <?php }
                  }
                ?>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    
    </main>


    @include('blocks.footer')
  </div>


  <script src="./project/plugins/aos/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script src="./project/js/script.js"></script>

</body>

</html>