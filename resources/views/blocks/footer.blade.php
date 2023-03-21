<?php 
use RedBeanPHP\R as R;
?>

<?php $dat = R::findOne("data", "id = ?", [1]);?>


<footer class="pt-[50px] z-10 relative min-h-[500px] bg-[url('./project/image/footer/footer.png')] bg-cover bg-fixed">

  <div class="container">
    <div class="grid space-x-4 space-y-8 grid-col-2 lg:grid-cols-5">
      <div class="col-span-2 h-[0] sm:h-[400px] order-4 lg:order-1">
        <img data-speed="4" class="paralax-image  hidden sm:block  h-[300px] w-[450px] absolute left-0 bottom-5" src="./project/image/footer/footer-tesla.png"
          alt="">
      </div>
      <div class="order-2 col-span-2 md:col-span-1 lg:order-1">
        <h2 class="text-2xl font-bold text-navbarColor">{{LN['Адрес']}}</h2>
        <p class="mt-4 text-lg text-white">
          <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> address_desc_uz : $dat -> address_desc ?>

        </p>
        <div class="space-y-[10px] mt-5 flex flex-col">
          <a href="mailto:{{$dat -> email}}" class="text-lg text-white">
            <span class="text-navbarColor">
              {{LN['Почта']}}:
            </span>
            {{$dat -> email}}
          </a>
          <a href="tel:{{$dat -> tel}}" class="text-lg text-white">
            <span class="text-navbarColor">
              {{LN['Телефон']}}:
            </span>
            {{$dat -> tel}}
          </a>
        </div>
      </div>
      <div class="col-span-2 md:col-span-1 lg:col-span-1 space-y-[15px] flex flex-col order-3 lg:order-2 text-lg">
        <h2 class="text-2xl font-bold text-navbarColor">{{LN['Навигация']}}</h2>
        <a href="/" class="text-white ">{{LN['Главная']}}</a>
        <a href="/product" class="text-white ">{{LN['Каталог авто']}}</a>
        <a href="/installment" class="text-white ">{{LN['Лизинг']}}</a>
        <a href="/about" class="text-white ">{{LN['О нас']}}</a>
        <a href="/contact" class="text-white ">{{LN['Контакты']}}</a>
      </div>
      <div class="col-span-2 md:col-span-1 lg:col-span-1 space-y-[15px] flex flex-col  order-3 lg:order-4">
        <h2 class="text-2xl font-bold text-navbarColor">{{LN['Время работы салона']}}</h2>
        <p class="text-lg text-white"><?= (@$_COOKIE['lang'] == 'uz') ? $dat -> time_work_uz : $dat -> time_work ?>
        </p>
        <div class="flex space-x-4 text-lg text-white ">
          <span>
            {{LN['Следите за новостями:']}}
          </span>
          <div class="flex space-x-4">
            <a href="{{$dat -> telegram}}"><i class="text-3xl cursor-pointer ri-telegram-fill hover:text-navbarColor"></i></a>
            <a href="{{$dat -> instagram}}"><i class="text-3xl cursor-pointer ri-instagram-fill hover:text-navbarColor"></i></a>
            <a href="{{$dat -> facebook}}"><i class="text-3xl cursor-pointer ri-facebook-fill hover:text-navbarColor"></i></a>
          </div>
        </div>
        <a href="#" class="text-lg text-white ">{{LN['Сайт разработан командой:']}} <span
            class="text-[#4868FE] cursor-pointer"> MARS TEAM</span> </a>
        <a href="#" class="text-lg text-white cursor-pointer"><img src="./project/image/logo-marss.png" alt=""></a>
      </div>
    </div>
  </div>
</footer>