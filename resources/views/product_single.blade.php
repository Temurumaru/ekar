<?php
use RedBeanPHP\R as R;

$data = R::findOne("cars", "id = ?", [@$_GET['id']]);
$data -> views = $data -> views + 1;
R::store($data);

$stamp = R::findOne("stamps", "id = ?", [$data -> stamp_id]);
$imgs = json_decode($data -> imgs);
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



  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />

  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />
  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery-bundle.min.css" />

</head>

<body>

  <div class="overflow-x-hidden wrapper">

    @include('blocks.header')

    <main class="mt-[84px] md:mt-[134px]">
      <section class=" mt-[84px] md:mt-[134px]">
        <div class="container">
          <div class="grid gap-y-[30px] lg:gap-y-0 gap-y-5 grid-cols-1 lg:grid-cols-2 md:gap-x-30">
            <div id="gallery-container" class="grid gap-5 sm:grid-cols-3 grid-col-2">
              <a href="/upl_data/imgs/{{$imgs -> img1}}" class="col-span-2 row-span-2 sm:col-span-3">
                <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img1}}" alt="">
              </a>
              <!-- <div class="hidden grid-cols-3 col-span-3 grid-rows-2 gap-5 md:grid"> -->
                <a href="/upl_data/imgs/{{$imgs -> img2}}" class="col-span-1 row-span-2">
                  <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img2}}" alt="">
                </a>
                <a href="/upl_data/imgs/{{$imgs -> img3}}" class="col-span-1 row-span-1">
                  <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img3}}" alt="">
                </a>
                <a href="/upl_data/imgs/{{$imgs -> img4}}" class="col-span-1 row-span-1">
                  <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img4}}" alt="">
                </a>
                <a href="/upl_data/imgs/{{$imgs -> img5}}" class="col-span-1 row-span-1">
                  <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img5}}" alt="">
                </a>
                <a href="/upl_data/imgs/{{$imgs -> img6}}" class="col-span-1 row-span-1">
                  <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img6}}" alt="">
                </a>
              <!-- </div>  -->
              <a href="/upl_data/imgs/{{$imgs -> img7}}" class="col-span-1 row-span-1">
                <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img7}}" alt="">
              </a>
              <a href="/upl_data/imgs/{{$imgs -> img8}}" class="col-span-1 row-span-1">
                <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img8}}" alt="">
              </a>
              <a href="/upl_data/imgs/{{$imgs -> img9}}" class="col-span-1 row-span-1">
                <img class="object-cover w-full h-full" src="/upl_data/imgs/{{$imgs -> img9}}" alt="">
              </a>
            </div>
            <div>
              <div class="space-y-5">
                <h1 class="text-xl md:text-3xl xl:text-left text-navbarColor section__title before:bg-navbarColor">
                  {{$stamp -> name}} {{$data -> model}}
                </h1>
                <p class="text-xl opacity-50 md:text-3xl xl:text-left text-navbarColor">
                  {{LN['Стоимость']}} <?=number_format((int)$data -> price, 0, ' ', ' '); ?> {{LN['сум']}}
                </p>
              </div>
              <div class="grid grid-cols-2 ">
                <div class="my-[50px]">
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Цвет']}}
                    </p>
                    <h1 class="  text-md lg:text-[20px]">
                      <?= (@$_COOKIE['lang'] == 'uz') ? $data -> color_uz : $data -> color ?>
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Год выпуска']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> year_release}}г
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Мощность двигателя']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> engine_power}} {{LN['кв']}}
                    </h1>
                  </div>
                </div>
                <div class="my-[50px]">
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Мощность аккумулятора']}}
                    </p>
                    <h1 class=" text-md lg:text-[20px]">
                      {{$data -> battery_power}} {{LN['кв/ч']}}
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Макс скорость']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> max_speed}} {{LN['км/ч']}}
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Разгон до 100']}} {{LN['км/ч']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> acceleration}} {{LN['сек']}}
                    </h1>
                  </div>
                </div>
                <p class="col-span-2 text-lg md:text-xl text-textColor">
                  <?= (@$_COOKIE['lang'] == 'uz') ? $data -> description_uz : $data -> description ?>
                </p>
                <div class="my-[50px]">
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Дальность хода']}}
                    </p>
                    <h1 class="  text-md lg:text-[20px]">
                      {{$data -> range_travel}} {{LN['км']}}
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Обычная зарядка']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> regular_charging}} {{LN['ч']}}
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Быстрая зарядка']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> speed_charging}} {{LN['мин']}}
                    </h1>
                  </div>
                </div>
                <div class="my-[50px]">
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Кол-во мест']}}
                    </p>
                    <h1 class=" text-md lg:text-[20px]">
                      {{$data -> places}}
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Размеры']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> size}}
                    </h1>
                  </div>
                  <div class="space-y-1 text-textColor">
                    <p class="opacity-50">
                      {{LN['Для сравнения']}}
                    </p>
                    <h1 class="text-md lg:text-[20px]">
                      {{$data -> size_b}}
                    </h1>
                  </div>
                </div>


                <div class="col-span-2 md:col-span-1">
                  <a href="./installment?id={{$data -> id}}" class="block w-full py-4 mb-2 text-sm text-center text-white border-white bg-navbarColor">
                    {{LN['Калькуляция']}}
                  </a>
                  {{-- <a href="#"
                    class="block w-full py-4 text-sm text-center bg-white border-2 border-navbarColor text-navbarColor">
                    {{LN['Расчитать лизинг']}}
                  </a> --}}
                </div>
              </div>
            </div>
          </div>
      </section>
      <section id="certificate" class="py-20 section">
        <!-- sm:w-1/4 md:w-1/6  -->
        <div class="container mx-auto space-y-10">
          <div>
            <h1 class="text-xl mb-30 md:text-3xl xl:text-left text-navbarColor section__title before:bg-navbarColor">
              {{LN['Похожие автомобили']}}
            </h1>
            <div class="w-full pt-10 swiper licence">
              <div  class="swiper-wrapper">
                <?php $cars = R::find("cars", "id != ? ORDER BY IF(views > 0, 1, 1), views DESC LIMIT 10", [$data -> id]);?>
                
                @foreach($cars as $val)
                <?php $stamp = R::findOne("stamps", "id = ?", [$val -> stamp_id])?>
                
                <div class="swiper-slide">
                    <div class=" p-5 md:p-[15px] lg:p-[30px]   card  duration-300  border-l-4 border-navbarColor">
                      <div class="grid grid-cols-1 grid-rows-2 duration-300 md:grid-cols-5 md:grid-rows-1 gap-y-5 gap-x-0 md:gap-x-5 md:gap-y-0 group-hover:text-white text-textColor">
                        <div class="col-span-3 space-y-3 ">
                          <h1 class="text-xl md:text-2xl lg:text-3xl ">
                            {{$stamp -> name}} {{$val -> model}}
                          </h1>
                          <p class="text-sm opacity-50">
                            {{LN['Стоимость']}} <?=number_format((int)$val -> price, 0, ' ', ' '); ?> {{LN['сум']}}
                          </p>
                          <img
                      class="w-full object-contain h-[300px] lg:h-[180px] xl:h-[220px] group-hover:scale-105 duration-300 top-2 left-5"
                      src="./upl_data/imgs/alpha/{{$val -> img_car_alpha}}">
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
                              class="block w-full py-4 mb-2 text-sm text-center text-white border-white bg-navbarColor">
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
                  </div>
                  @endforeach

              </div>
              {{-- <div class="container relative z-10 flex justify-center -bottom-20">
                <div class="relative flex items-center bottom-14">
                  <div class=" swiper-button-prev"></div>
                  <div class="mb-5 swiper-pagination"></div>
                  <div class=" swiper-button-next"></div>
                </div>
              </div> --}}
            </div>

          </div>
      </section>

    </main>


    @include('blocks.footer')
  </div>


  <script src="./project/plugins/swiper/swipperJsBuld.js"></script>
  <script src="./project/plugins/aos/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./project/plugins/light-gallery/lightGallery.js"></script>
  <script src="./project/plugins/light-gallery/lightGalleryLgVideo.js"></script>
  <script>
    lightGallery(document.getElementById('gallery-container'), {
      plugins: [lgVideo],
    });
  </script>
  <script src="./project/js/script.js"></script>
  <script src="./project/js/swiper.js"></script>
</body>

</html>
