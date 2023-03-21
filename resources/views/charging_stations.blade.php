<?php 
use RedBeanPHP\R as R;
?>

<?php $dat = R::findOne("data", "id = ?", [1]);?>
{{-- <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> about_desc_uz : $dat -> about_desc ?> --}}


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
          <h1 data-aos="fade-right" class="mb-12 text-2xl text-navbarColor md:text-4xl section__title before:bg-navbarColor">
            {{LN['Расположение зарядных станций']}}
          </h1>
          <p data-aos="fade-up" class="text-justify  text-textColor text-md md:text-xl mt-[30px]">
            <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> charge_desc_uz : $dat -> charge_desc ?>
          </p>
        </div>
      </section>
      
    <section
    class="">
    <div class="map" id="tokbor-map"></div>

    {{-- <iframe data-aos="fade-up" class="w-full h-[70vh] md:h-[60vh]"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d890.7091704446025!2d69.26604497202561!3d41.331122326368074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8beed2933741%3A0x3dfb3b396610041!2z0JTQuNC30LDQudC9INC40L3RgtC10YDRjNC10YAg0LIg0KPQt9Cx0LXQutC40YHRgtCw0L3QtSAiQVIgRGVzaWduIg!5e0!3m2!1suz!2s!4v1669834201408!5m2!1suz!2s"
    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
    </section>
      
    </main>


    @include('blocks.footer')
  </div>

  <script src="https://api-maps.yandex.ru/2.1/?apikey=7d00b836-5e29-4a90-9899-703014ddf92a&lang=ru_RU" type="text/javascript"></script>
  <script src="main.js"></script>

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