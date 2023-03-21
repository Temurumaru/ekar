<?php 
use RedBeanPHP\R as R;
?>

<?php $dat = R::findOne("data", "id = ?", [1]);?>

<header class="header">
  <div class="hidden py-2 nav-top bg-navbarColor sm:flex">
    <div class="container flex justify-between ">
      <div class="flex space-x-4 md:space-x-10 ">
        <a  href="tel:{{$dat -> tel}}" class="flex items-center space-x-2 text-white "> 
          <i class="text-xl ri-phone-fill"></i>
          <span class="text-sm">
            {{$dat -> tel}}
          </span>
        </a>
        <a href="mailto:{{$dat -> email}}" class="flex items-center space-x-2 text-white"> 
          <i class="text-xl ri-mail-line"></i>
          <span class="text-sm">
            {{$dat -> email}}
          </span>
        </a>
        <a href="" class="flex items-center space-x-2 text-white"> 
          <i class="text-xl ri-map-pin-line"></i>
          <span class="text-sm">
            {{$dat -> address}}
          </span>
        </a>
        <a href="tel:" class="flex items-center space-x-2 text-white"> 
          <i class="text-xl ri-time-line"></i>
          <span class="text-sm">
            {{LN['Время работы']}}: <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> time_work_uz : $dat -> time_work ?>

          </span>
        </a>
      </div>
      <div class=" space-x-3 flex">
      <div class="uppercase hidden  lg:flex text-md flex items-center">
              <a onclick='document.cookie = "lang=uz";location.reload(); return false;'  href="#">
              <img src="./project/image/uz.png" class="w-6 h-6 object-cover border-[0.5px] rounded-full" alt="">
            </a> 
            <span class=mx-2>
              
            </span>
              <a onclick='document.cookie = "lang=ru";location.reload(); return false;'  href="#">
              <img src="./project/image/ru.png" class="w-6 h-6 object-cover  border-[0.5px] border-white rounded-full " alt="">
            </a>
            </div>
        <a href="{{$dat -> telegram}}"><i class="text-2xl text-white ri-telegram-fill"></i></a>
        <a href="{{$dat -> instagram}}"><i class="text-2xl text-white ri-instagram-fill"></i></a>
        <a href="{{$dat -> facebook}}"><i class="text-2xl text-white ri-facebook-fill"></i></a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="w-full py-2 header-main">
      <div class="logo">
        <a href="./">
          <img src="./project/image/logo/logo.png" alt="">
        </a>
      </div>

      <div class="menu-overlay">
      </div>
      <!-- navigation menu start -->
      <nav class="w-3/4 nav-menu">
        <div class="close-nav-menu">
          <img src="./project/image/icon/close.svg" alt="close">
        </div>
        <ul class="menu lg:w-full lg:flex lg:items-center lg:justify-between">
          <li class="menu-item">
            <a href="./">{{LN['Главная']}}</i></a>
          </li>
          <li class="menu-item menu-item-has-children">
            <a href="./product" data-toggle="sub-menu">{{LN['Каталог авто']}} <i class="ri-arrow-down-s-line "></i></a>
            <ul class="sub-menu">
              <?php $stamps = R::findAll("stamps");?>
              @foreach($stamps as $val)
              <li class="menu-item"><a href="/product?stamp_id={{$val -> id}}">{{$val -> name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="menu-item menu-item-has-children">
            <a href="./installment">{{LN['Лизинг']}}</i></a>
          </li>
          <li class="menu-item">
            <a href="./charging_stations">{{LN['Зарядные станции']}}</i></a>
          </li>
          <li class="menu-item">
            <a href="./about">{{LN['О нас']}}</i></a>
          </li>
          <li class="menu-item">
            <a href="./contact">{{LN['Контакты']}}</i></a>
          </li>
        </ul>
      </nav>
      <!-- navigation menu end -->
      <!-- search icon -->

      <?php
      if(isset($_GET['srch'])) {
        if(R::count('cars', 'model LIKE ?', [ @$_GET['srch'].'%' ] ) > 0){
          $search = R::find('cars', 'model LIKE ?', [ $_GET['srch'].'%' ] );//dd(array_shift($search));
          
          header("Location: https://www.ecarfinans.uz/product_single?id=".array_shift($search)['id']);
          die();
        }
      }
      ?>
     
      <form method="GET" action="" class="relative flex items-center space-x-4 lg:space-x-0">

      <div class="uppercase text-md flex  lg:hidden items-center">
              <a onclick='document.cookie = "lang=uz";location.reload(); return false;'  href="#">
              <img src="./project/image/uz.png" class="w-8 h-8 object-cover" alt="">
            </a> 
            <span class=mx-2>
              
            </span>
              <a onclick='document.cookie = "lang=ru";location.reload(); return false;'  href="#">
              <img src="./project/image/ru.png" class="w-8 h-8  object-cover" alt="">
            </a>
      </div>


        <div class="cursor-pointer search-icon"  id="search-btn">
          <i class="text-4xl duration-300 rounded-md ri-search-line text-navbarColor hover:bg-navbarColor hover:text-white active:bg-navbarColor acitve:text-white"></i>
         
        </div>

        


        <input type="text" id="search-input" name="srch" class="text-textColor fixed w-[300px] px-5 py-2 rounded-md top-[84px] md:top-[134px] border-2 border-navbarColor duration-300 -right-[100%]">
        <!-- search icon -->
        <input type="submit" class="hidden">
        <div class="open-nav-menu ">
          <i class="text-4xl duration-300 rounded-md text-navbarColor hover:bg-navbarColor hover:text-white active:bg-navbarColor acitve:text-white ri-menu-line"></i>
        </div>
      </form>
     
    </div>
  </div>
</header>