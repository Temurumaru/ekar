<?php 
use RedBeanPHP\R as R;
?>

<?php $dat = R::findOne("data", "id = ?", [1]);?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- aaaa -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ECARFINANS</title>
  <link rel="icon" href="">
  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />

  <link rel="icon" href="./project/image/icon.png" type="image/gif">

  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />

  <script src="./project/plugins/tailwind/tailwind.js"></script>

  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />

  <!-- <link type="text/css" rel="stylesheet"
    href="https://unblock.coffee/wp-content/themes/unblockcoffee/css/lightgallery-bundle.css" /> -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="wrapper ">
    @include('blocks.header')
    <main class=" mt-[84px] md:mt-[134px]">

      <section class="  bg-[url('./project/image/bg.png')] bg-no-repeat bg-cover py-14">
        <div class="container">
          <h1 data-aos="fade-right"
            class="mb-12 text-2xl text-navbarColor md:text-4xl section__title before:bg-navbarColor">
            {{LN['Контактная информация']}}
          </h1>
          <div class="grid grid-cols-3">
            <div class="col-span-3 md:col-span-1 p-[30px] bg-navbarColor space-y-[30px]">
              <div class="text-lg text-white">
                <h2 data-aos="fade-up" class="text-xl md:text-3xl">{{LN['Адрес']}}</h2>
                <p class="mt-4" data-aos="fade-up">
                  <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> address_desc_uz : $dat -> address_desc ?>
                </p>
                <div class="flex flex-col mt-5 " data-aos="fade-up">
                  <a href="mailto:{{$dat -> email}}" class="text-white ">
                    <span class="mr-2 ">
                      {{LN['Почта']}}:
                    </span>
                    {{$dat -> email}}
                  </a>
                  <a href="tel:{{$dat -> tel}}" class="text-white ">
                    <span class="mr-2 ">
                      {{LN['Телефон']}}:
                    </span>
                    {{$dat -> tel}}
                  </a>
                </div>
              </div>

              <div class="text-lg text-white" data-aos="fade-up">

                <h2 class="text-lg md:text-3xl">{{LN['Время работы салона']}}</h2>
                <p class="mt-4">
                  <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> time_work_uz : $dat -> time_work ?>
                </p>
              </div>
              <div class="flex items-center space-x-4 text-sm text-white md:text-lg" data-aos="fade-up">
                <span>
                  {{LN['Следите за новостями:']}}
                </span>
                <div class="flex space-x-4">
                  <a href="{{$dat -> telegram}}"><i class="text-4xl cursor-pointer ri-telegram-fill "></i></a>
                  <a href="{{$dat -> instagram}}"><i class="text-4xl cursor-pointer ri-instagram-fill "></i></a>
                  <a href="{{$dat -> facebook}}"><i class="text-4xl cursor-pointer ri-facebook-fill "></i></a>
                </div>
              </div>
              
            </div>
            <div class="col-span-3 md:col-span-2">
              <iframe class="map-s" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.414092145797!2d69.20173919999999!3d41.3216081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8bba811fcc73%3A0xbb92e5a6b2709516!2zIkUgQ2FyLU1vdG9ycyIgLSDQsNCy0YLQvtGB0LDQu9C-0L0g0Y3Qu9C10LrRgtGA0L7QvNC-0LHQuNC70LXQuSDQsiDQotCw0YjQutC10L3RgtC1!5e0!3m2!1sru!2s!4v1672139860221!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
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
  <script src="./project/js/script.js"></script>
  <script src="./project/plugins/simpleParallax/simpleParallax.js"></script>
  <script>
    var image = document.getElementsByClassName('thumbnail');
    new simpleParallax(image, {
      orientation: 'right'
    });
  </script>
  <script src="./project/plugins/light-gallery/lightGallery.js"></script>
  <script src="./project/plugins/light-gallery/lightGalleryLgVideo.js"></script>
  <script>
    lightGallery(document.getElementById('gallery-container'), {
      plugins: [lgVideo],
    });
  </script>
  <script type="text/javascript" src="./project/plugins/wordMap/mapdata.js"></script>
  <script type="text/javascript" src="./project/plugins/wordMap/worldmap.js"></script>
  <script src="./project/js/script.js"></script>
  <script src="./project/js/swiper.js"></script>

</body>

</html>