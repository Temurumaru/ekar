<?php
use RedBeanPHP\R as R;
?>
<?php $dat = R::findOne("data", "id = ?", [1]);?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ECARFINANS</title>
  <!-- icon Logo -->
  <link rel="icon" href="./project/image/icon.png" type="image/gif">

  <meta name="description" content="Электрические автомобили — это стиль, скорость, экономичность и экологичность. Инновационный транспорт стремительно набирает популярность во всем мире. Эта волна с каждым годом начинает захватывать и Узбексий рынок все больше. Мы продаем самый широкий ассортимент электротранспорта, осуществляем сервисное обслуживание и ремонт. К услугам наших клиентов широкие возможности финансового сервиса, который позволяет приобретать электротранспорт в лизинг. Также мы будем работать над развитием и расширением зарядных станции для электромобилей.">
	<meta name="keywords" content="Ecar, Electro, Car, ElectroCar, Ecarfinans">
		
	<meta name="Author" content="Marss Team">
	<meta name="Copyright" content="Ecar Finans">
	<meta name="Address" content="<?= $dat -> address_desc?>">
  <!-- #temur iwtonin toldirib qoydimi diman  -->



  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />

  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />

  <script src="./project/plugins/tailwind/tailwind.js"></script>

  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />

  <link rel="stylesheet" href="style.css">

  <style>
    .section__text {
      overflow: hidden;
      width: 100%;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
    }
  </style>

</head>

<body >

  <div class="overflow-x-hidden wrapper">
    @include('blocks.header')
    <main class="mt-[82px] md:mt-[138px]">
      <section class="banner ">
        <div class="fixed xl:top-0 top-[82px]  left-0 swiper mySwiper">
          <div class="swiper-wrapper">
            <?php $tops = R::find("cars", "ORDER BY IF(views > 0, 1, 1), views DESC LIMIT 5");?>

            @foreach($tops as $var)

            <div class="w-full min-h-screen md:pt-10 bg-cover swiper-slide header-carusel"
              style="background-image: url('/upl_data/imgs/background/{{$var -> img_bg}}');">
              <div class="container ">
                <div class="grid grid-cols-1  xl:grid-cols-5 gap-y-10 ">
                  <div class="flex flex-col justify-between cols-span-1  md:col-span-2  space-y-5 sm:space-y-10 xl:space-y-0 ">
                   <div class="content">
                   <a href="#" class="group ">
                    <h1 class="mb-3 text-xl text-center text-white sm:mb-5 sm:text-3xl xl:text-left md:text-5xl group-hover:text-navbarColor duration-300">
                      <?=$var -> model ?>
                    </h1>
                    </a>
                    <!-- link qoyib berrasasn owa  productga otiwi kk -->
                    <a href="/product_single?id=<?=$var -> id?>" class="text-lg section__text text-center text-white xl:text-left opacity-80 ">
                      <?= (@$_COOKIE['lang'] == 'uz') ? $var -> description_uz : $var -> description ?>

                    </a>
                   </div>
                   <div  class="flex flex-col w-full sum-month">
                    <div class="flex items-center justify-between">
                      <h1 class="text-lg text-center text-white title xl:text-left lg:text-3xl md:text-2xl md:text-xl">
                        <span class="text-navbarColor"><?=number_format((int)$var -> price, 0, ' ', ' '); ?> {{LN['сум']}}</span>
                      </h1>

                      <a href="/product_single?id=<?=$var -> id?>"
                      class="inline-block py-4 px-5 text-sm text-center  border-2 text-white  bg-navbarColor rounded-full border-navbarColor border hover:bg-white hover:text-navbarColor duration-300">
                      {{LN['Подробнее']}}
                    </a>

                    </div>
                    <div class="flex flex-col items-center justify-between gap-5 mt-30 sm:flex-row ">
                      <span class=" flex items-center justify-center space-x-2 px-6 py-1.5 bg-navbarColor rounded-full border-navbarColor border">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  width="35" height="35" fill="white"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 13.333l-9.223 6.149A.5.5 0 0 1 2 19.066V4.934a.5.5 0 0 1 .777-.416L12 10.667V4.934a.5.5 0 0 1 .777-.416l10.599 7.066a.5.5 0 0 1 0 .832l-10.599 7.066a.5.5 0 0 1-.777-.416v-5.733zM10.394 12L4 7.737v8.526L10.394 12zM14 7.737v8.526L20.394 12 14 7.737z"/></svg>

                            {{$var -> range_travel}} {{LN['км']}}
                          </p>
                      </span>
                      <span class="flex items-center space-x-2 px-6 py-1.5  rounded-full border-navbarColor border bg-[#3C5B3D]">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.6666 14.5833H23.3333V26.25H16.0416L13.125 23.3333H10.2083V16.0417M10.2083 5.83334V8.75H14.5833V11.6667H10.2083L7.29165 14.5833V18.9583H4.37498V14.5833H1.45831V26.25H4.37498V21.875H7.29165V26.25H11.6666L14.5833 29.1667H26.25V23.3333H29.1666V27.7083H33.5416V13.125H29.1666V17.5H26.25V11.6667H17.5V8.75H21.875V5.83334H10.2083Z" fill="white"/>
                          </svg>
                          <p class="text-white lg:text-xl text-lg mt-1.5">
                            {{$var -> engine_power}} {{LN['кв']}}
                          </p>
                      </span>
                      <span class="flex items-center space-x-2 px-6 py-1.5  rounded-full border-navbarColor border">
                          <svg  width="35" height="35" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M13 12h3l-5 7v-5H8l5-7v5zm-2-6H7v14h10V6h-4V4h-2v2zM9 4V3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3z"/></svg>
                          <p class="text-white lg:text-xl text-lg mt-1.5">
                          <p class="text-white lg:text-xl text-lg mt-1.5">
                            {{$var -> battery_power}} {{LN['кв/ч']}}
                          </p>
                      </span>
                    </div>
                   </div>
                  </div>
                  <div class="w-full xl:h-[350px]  h-[150px] relative col-span-3 flex items-center justify-center">
                    <!-- img ga ham wu narsalani qoyasan owa page ga otiwi kk -->
                    <a  href="/product_single?id=<?=$var -> id?>">
                      <img  data-speed="-5"  class="paralax-image xl:absolute h-full object-[contain !impontant] left-[50%] lg:left-0 lg:-bottom-[150px] " src="/upl_data/imgs/alpha/{{$var -> img_car_alpha}}" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </div>
          <div class="container relative z-10 xl:bottom-10 bottom-20">
            <div class="relative flex items-center md:justify-start justify-center  bottom-14">
              <div class=" swiper-button-prev"></div>
              <div class="mb-5 swiper-pagination"></div>
              <div class=" swiper-button-next"></div>

            </div>
          </div>
        </div>
        <div class="h-[825px] bg-white "></div>
      </section>
      <section class="product relative z-10 bg-white min-h-screen bg-[url('./project/image/bg.png')] bg-no-repeat bg-cover py-14">
        <div class="container">
          <h1 data-aos="fade-right" data-delay="100" class="mb-12 text-2xl text-navbarColor md:text-5xl section__title before:bg-navbarColor">
            {{LN['Автомобили']}}
          </h1>
          <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
            <?php $tops = R::find("cars", "ORDER BY IF(views > 0, 1, 1), views DESC LIMIT 8");?>

            @foreach($tops as $val)

            <?php $stamp = R::findOne("stamps", "id = ?", [$val -> stamp_id])?>
            <div data-aos="fade-up" data-delay="10" class=" p-5 md:p-[15px] lg:p-[30px]   card group duration-300  border-l-4 border-navbarColor">
              <div class="grid grid-cols-1 grid-rows-2 duration-300 md:grid-cols-5 md:grid-rows-1 gap-y-5 gap-x-0 md:gap-x-5 md:gap-y-0 group-hover:text-white text-textColor">
                <div class="flex flex-col justify-between col-span-3 space-y-3">
                 <div>
                  <h1 class="text-xl md:text-2xl lg:text-3xl ">
                    {{$stamp -> name}} {{$val -> model}}
                  </h1>
                  <p class="text-sm opacity-50">
                    {{LN['Стоимость']}} <?=number_format((int)$val -> price, 0, ' ', ' '); ?> {{LN['сум']}}
                  </p>
                 </div>
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
                    <a href="./product_single?id={{$val -> id}}"
                      class="block w-full py-4 text-sm text-center bg-white border-2 border-navbarColor text-navbarColor ">
                      {{LN['Подробнее']}}
                    </a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach

            <div class="flex justify-center col-span-1 md:col-span-2">
              <a href="/product" class="px-10 py-5 mb-2 text-center text-white duration-300 border-2 border-white md:text-lg bg-navbarColor hover:text-navbarColor hover:bg-white hover:border-2 hover:border-navbarColor">
                {{LN['Больше автомобилей']}}
              </a>
            </div>
          </div>
        </div>
      </section>
      <section
        class="relative z-10 bg-white bg-[url('./project/image/section/section-banner.png')] bg-cover bg-no-repeat bg-fixed advantages pt-[30px] pb-[70px]">
        <div class="container">
          <h1  data-aos="fade-right" data-delay="100" class="mb-12 text-3xl text-center text-white md:text-5xl section__title before:bg-white md:text-left">
            {{LN['Наши преимущества']}}
          </h1>
          <div class="grid grid-cols-1 gap-20 md:gap-5 lg:gap-10 xl:gap-20 md:grid-cols-3">
            <div  data-aos="fade-up" data-delay="150"
              class="group pb-[60px] lg:pb-[100px] rounded-[20px] py-[50px] px-[30px] bg-white hover:bg-navbarColor card hover:cursor-pointer duration-300">
              <div
                class="flex md:justify-center  items-center justify-between lg:justify-between mb-[30px] card__number ">
                <div class="duration-200 before:bg-navbarColor group-hover:before:bg-white">
                  <svg viewBox="0 0 130 130"
                    class="w-[130px] h-[130px] fill-[#50AF43] group-hover:fill-white duration-200  ">
                    <path
                      d="M129.974 69.9602C129.819 66.3598 126.296 63.4848 119.484 61.4126C114.2 59.8326 107.492 58.8743 100.239 58.7189V31.0819C100.213 30.6157 100.084 30.1753 99.8506 29.7868C99.1253 26.6527 95.6286 24.1144 89.4381 22.2495C83.6103 20.4881 75.9952 19.5298 67.9916 19.5298C60.0139 19.5298 52.4766 20.4881 46.7523 22.2495C42.0642 23.6999 36.4435 26.3937 36.4435 31.0301C36.4435 31.315 36.4694 31.5999 36.5212 31.8848L36.8061 43.696C19.9701 40.4842 3.72983 51.5441 0.543933 68.3543C0.181311 70.271 0 72.1877 0 74.1303C0 91.2253 13.9091 105.134 31.0042 105.134C38.1271 105.134 45.0169 102.7 50.534 98.1929C55.3776 99.3325 61.0759 99.9542 67.111 100.006C68.432 107.181 83.9729 110.47 98.4519 110.47C106.43 110.47 113.967 109.486 119.691 107.699C124.379 106.248 130 103.529 130 98.8922V70.4523C130 70.2969 130 70.1156 129.974 69.9602ZM94.8257 45.4055C94.8257 45.7422 93.5824 47.5294 87.9617 49.2389C82.7037 50.8189 75.4254 51.7513 68.0175 51.7513C61.6198 51.7513 55.3517 51.0779 50.3786 49.8087C50.3009 49.7828 50.2491 49.7828 50.1713 49.7569C47.7107 47.8143 44.991 46.2602 42.0642 45.1723L41.8828 37.8681C43.6701 38.7747 45.535 39.4999 47.4776 40.0179C53.0982 41.6497 60.3766 42.5304 68.0175 42.5304C75.9952 42.5304 83.6362 41.572 89.464 39.8107C91.4067 39.2409 93.2975 38.4897 95.0847 37.5573V44.3435C94.7998 44.7061 94.8257 45.0428 94.8257 45.4055ZM48.3064 27.2485C53.5386 25.6426 60.532 24.736 67.9916 24.736C75.3995 24.736 82.6778 25.6426 87.9358 27.2485C93.5565 28.958 94.7998 30.7193 94.7998 31.056C94.7998 31.4186 93.5306 33.2058 87.9099 34.8894C82.6519 36.4694 75.3995 37.376 67.9916 37.376C60.8428 37.376 54.0566 36.5471 48.9022 35.0448C43.3333 33.4389 41.7792 31.6776 41.6497 31.1078C41.6497 31.056 41.6238 31.056 41.6238 31.056C41.6497 30.5639 42.8412 28.9062 48.3064 27.2485ZM48.3841 93.2457C37.8422 102.829 21.4983 102.078 11.9147 91.5362C2.33114 80.9942 3.08229 64.6503 13.6242 55.0667C18.3642 50.7412 24.5806 48.3582 31.0042 48.3582C33.5943 48.3582 36.1586 48.7468 38.6451 49.4979C47.633 52.2953 54.3933 59.7549 56.31 68.95C56.6467 70.6595 56.8281 72.4208 56.8281 74.1562C56.854 81.4345 53.7717 88.3503 48.3841 93.2457ZM54.9631 93.8155C57.0612 91.2513 58.7448 88.3762 59.9362 85.2939C62.1379 85.4752 64.4172 85.6047 66.8002 85.6306V86.0968L66.9556 94.8775C62.9408 94.8257 58.9261 94.463 54.9631 93.8155ZM61.8789 71.0739C63.3811 71.1775 64.9612 71.2293 66.567 71.2552L66.7225 80.4244C64.9093 80.3985 63.1221 80.3208 61.4126 80.1913C61.8012 78.1969 62.0084 76.1506 62.0084 74.1303C62.0084 73.1201 61.9566 72.11 61.8789 71.0739ZM68.2506 66.1008C68.1729 66.1008 68.0693 66.1008 67.9916 66.1008C65.5051 66.1008 63.0962 65.9972 60.8687 65.8418C59.8844 62.371 58.3303 59.1074 56.2323 56.2064C60.1176 56.6985 64.0287 56.9576 67.9657 56.9576C75.9693 56.9576 83.6103 55.9992 89.4381 54.2379C91.3808 53.6681 93.2457 52.9169 95.0329 52.0104V58.7966C83.9211 59.1074 72.4985 61.4385 68.2506 66.1008ZM71.6697 70.2192C71.6697 70.1933 71.6697 70.1674 71.6956 70.1156C71.9287 69.4162 73.7677 67.7067 79.1293 66.2044C84.1542 64.7798 90.7073 64.0028 97.5971 64.0028H98.0375C105.445 64.0028 112.698 64.8575 117.982 66.4634C123.499 68.1211 124.794 69.8306 124.82 70.2192V70.2451C124.794 70.6336 123.499 72.4208 117.749 74.1303C112.439 75.7103 105.445 76.5651 98.0634 76.5651C90.9145 76.5651 84.1283 75.7362 78.9739 74.2598C73.4051 72.6539 71.8769 70.8667 71.7215 70.3228C71.6697 70.2192 71.6697 70.2192 71.6697 70.2192ZM118.189 102.777C112.957 104.409 105.937 105.316 98.4778 105.316C90.9922 105.316 83.9988 104.435 78.8185 102.855C73.3533 101.172 72.2136 99.4361 72.2136 99.0476C72.2136 99.0217 72.2136 99.0217 72.2136 98.9958L72.0841 91.4844C74.1562 92.4945 76.306 93.2716 78.5336 93.8414C83.9729 95.266 90.8886 96.0689 97.9856 96.0689C105.989 96.0689 113.578 95.1106 119.38 93.3493C121.271 92.7794 123.084 92.0283 124.82 91.1476V98.9181H124.846C124.846 99.2807 123.654 101.068 118.189 102.777ZM124.871 83.7139H124.846C124.846 83.9729 124.69 84.2837 124.69 84.5686C124.69 84.9313 123.473 86.6926 117.878 88.4021C112.568 90.008 105.497 90.8886 98.0116 90.8886C83.6621 90.8886 74.0008 87.6509 71.9805 85.1385L71.9546 82.9627L71.851 77.0054C73.6641 77.9119 75.5549 78.6372 77.4975 79.1811C83.1182 80.8129 90.3965 81.6936 98.0375 81.6936C105.912 81.6936 113.423 80.7611 119.199 79.0516C121.168 78.5077 123.058 77.7565 124.871 76.8241V83.7139Z" />
                    <path
                      d="M40.4323 77.8084C39.2409 73.5865 35.3815 70.6855 31.0042 70.6855C28.4658 70.6855 26.3937 68.6393 26.3937 66.1009C26.4196 63.5366 28.4658 61.4904 31.0042 61.4904C33.5425 61.4904 35.6146 63.5625 35.6146 66.1009C35.6146 67.5255 36.7802 68.6911 38.2048 68.6911C39.6294 68.6911 40.795 67.5255 40.795 66.1009C40.795 61.7235 37.894 57.8642 33.672 56.6727V55.5072C33.672 54.0826 32.5065 52.917 31.0819 52.917C29.6573 52.917 28.4917 54.0826 28.4917 55.5072V56.6209C23.2855 58.0196 20.1773 63.3812 21.576 68.5875C22.7157 72.8612 26.575 75.8399 31.0042 75.8399C33.5425 75.8399 35.6146 77.8861 35.6146 80.4245C35.6146 82.9628 33.5684 85.035 31.0301 85.035C28.4917 85.035 26.4196 82.9887 26.4196 80.4504C26.4196 79.0258 25.254 77.8602 23.8294 77.8602C22.4048 77.8602 21.2393 79.0258 21.2393 80.4504C21.2652 84.8796 24.2179 88.7389 28.4917 89.9045V92.1579C28.4917 93.5825 29.6573 94.7481 31.0819 94.7481C32.5065 94.7481 33.672 93.5825 33.672 92.1579V89.8786C38.8783 88.4022 41.9087 83.0146 40.4323 77.8084Z" />
                  </svg>

                </div>
                <h1
                  class="block font-extrabold duration-200 lg:block md:hidden text-textColor opacity-20 group-hover:text-white text-8xl md:text-4xl lg:text-8xl group-hover:opacity-20 ">
                  01</h1>

              </div>
              <div class="duration-200 group-hover:text-white text-textColor  opacity-80 space-y-[15px]">
                <h1 class="text-xl duration-100 lg:text-3xl text-navbarColor group-hover:text-white">
                  {{LN['Выгодная цена']}}
                </h1>
                <p class="text-sm lg:text-lg">
                  {{LN['Мы учитываем ваш бюджет и не выходим за поставленные рамки']}}
                </p>
              </div>
            </div>
            <div data-aos="fade-up" data-delay="150"
              class="group pb-[60px] lg:pb-[100px] rounded-[20px] py-[50px] px-[30px] bg-white hover:bg-navbarColor card hover:cursor-pointer duration-300">
              <div
                class="flex md:justify-center  items-center justify-between lg:justify-between  mb-[20px] md:mb-[30px] card__number">
                <div class="duration-200 before:bg-navbarColor group-hover:before:bg-white">
                  <svg viewBox="0 0 130 130"
                    class=" w-[130px] h-[130px] fill-[#50AF43] group-hover:fill-white duration-200">
                    <path
                      d="M99.5622 33.9367L105.783 27.7159L101.226 23.1584L94.9066 29.4774C90.6383 25.9836 85.6565 23.331 80.2162 21.7746V14.1189H86.171V7.67358H51.7026V14.1189H57.6576V21.7749C52.2173 23.331 47.2353 25.9839 42.967 29.4776L36.648 23.1587L32.0906 27.7161L38.3114 33.9369C31.8229 41.2012 27.8736 50.7796 27.8736 61.2631C27.8736 83.9055 46.2945 102.326 68.9367 102.326C91.5789 102.326 110 83.9055 110 61.2631C110 50.7794 106.051 41.201 99.5622 33.9367ZM64.1029 14.1189H73.7709V20.4828C72.1851 20.2961 70.5721 20.1996 68.9369 20.1996C67.3017 20.1996 65.6887 20.2959 64.1029 20.4826V14.1189ZM68.9369 95.8811C49.8485 95.8811 34.3191 80.3516 34.3191 61.2631C34.3191 42.1747 49.8487 26.6451 68.9369 26.6451C88.0251 26.6451 103.555 42.1747 103.555 61.2631C103.555 80.3516 88.0251 95.8811 68.9369 95.8811Z" />
                    <path
                      d="M68.9369 33.0896H65.7143V59.9272L46.7448 78.8992L49.0243 81.1779C54.3527 86.5036 61.4243 89.4367 68.9369 89.4367C84.4714 89.4367 97.1094 76.7976 97.1094 61.2618C97.1094 45.7276 84.4712 33.0896 68.9369 33.0896ZM68.9369 82.9916C64.2305 82.9916 59.7474 81.4971 56.0265 78.7321L72.1596 62.5969V39.7732C82.6175 41.3347 90.6641 50.3764 90.6641 61.2621C90.6641 73.2439 80.9172 82.9916 68.9369 82.9916Z" />

                    <path d="M6.44531 51.5952H19.3267V58.0405H6.44531V51.5952Z" />
                    <path d="M0 36.5562H25.2115V43.0015H0V36.5562Z""/>
                    <path d=" M0 64.4858H19.3267V70.9312H0V64.4858Z" />
                    <path d="M6.44531 79.5249H25.2115V85.9702H6.44531V79.5249Z" />
                  </svg>

                </div>
                <h1
                  class="block font-extrabold duration-200 lg:block md:hidden text-textColor opacity-20 group-hover:text-white text-8xl md:text-4xl lg:text-8xl group-hover:opacity-20 ">
                  02</h1>

              </div>
              <div class="duration-200 group-hover:text-white text-textColor  opacity-80 space-y-[15px]">
                <h1 class="text-xl duration-100 lg:text-3xl text-navbarColor group-hover:text-white">
                  {{LN['Быстрые сроки']}}
                </h1>
                <p class="text-sm lg:text-lg">
                  {{LN['Большой опыт в данной сфере позволяет нам максимально слаженно и в срок сдавать машины']}}
                </p>
              </div>
            </div>
            <div data-aos="fade-up" data-delay="150"
              class="group pb-[60px] lg:pb-[100px] rounded-[20px] py-[50px] px-[30px] bg-white hover:bg-navbarColor card hover:cursor-pointer duration-300">
              <div
                class="flex md:justify-center  items-center justify-between lg:justify-between  mb-[20px] md:mb-[30px] card__number">

                <div class="duration-200 before:bg-navbarColor group-hover:before:bg-white">
                  <svg viewBox="0 0 130 130"
                    class="w-[130px] h-[130px] fill-[#50AF43] group-hover:fill-white duration-200">
                    <g clip-path="url(#clip0_6_104)">
                      <path
                        d="M98.1614 35.5978C97.0185 34.3151 95.4566 33.4808 93.755 33.244V33.2404L67.1783 29.5691L56.6612 4.4387C55.1255 0.760312 50.8987 -0.976665 47.2205 0.559015C45.467 1.29118 44.0728 2.6852 43.3408 4.4387L32.8237 29.5691L6.24698 33.2404C2.28736 33.7916 -0.47578 37.4486 0.0753829 41.4082C0.312253 43.1098 1.14653 44.6717 2.42923 45.8146L22.4529 63.6705L18.3387 91.6898C17.893 94.5349 19.1997 97.3696 21.6527 98.8785C24.0712 100.425 27.1822 100.367 29.5414 98.7321L50.0008 84.8187L70.4601 98.7463C73.7615 100.987 78.2542 100.127 80.4951 96.8258C81.5133 95.3255 81.9303 93.4973 81.6631 91.704L77.5491 63.6738L97.5728 45.818C100.557 43.1584 100.821 38.5825 98.1614 35.5978ZM71.3566 59.6384C70.4608 60.4388 70.0274 61.6357 70.203 62.8241L74.4884 92.822L52.0186 77.5445C50.8072 76.7213 49.2159 76.7213 48.0046 77.5445L25.4025 92.7291L29.7986 62.8098C29.9694 61.6263 29.5362 60.4359 28.645 59.6387L7.2179 40.3256L35.816 36.3793C37.0681 36.2067 38.1355 35.385 38.6229 34.2188L50.0435 7.1422C50.0564 7.15811 50.0661 7.17631 50.0721 7.19577L61.375 34.2046C61.8623 35.3708 62.9299 36.1925 64.1818 36.3651L92.8157 40.4863L71.3566 59.6384Z" />
                    </g>
                    <defs>
                      <clipPath id="clip0_6_104">
                        <rect width="130" height="130" />
                      </clipPath>
                    </defs>
                  </svg>

                </div>
                <h1
                  class="block font-extrabold duration-200 lg:block md:hidden text-textColor opacity-20 group-hover:text-white text-8xl md:text-4xl lg:text-8xl group-hover:opacity-20 ">
                  03</h1>

              </div>
              <div class="duration-200 group-hover:text-white text-textColor  opacity-80 space-y-[15px]">
                <h1 class="text-xl duration-100 lg:text-3xl text-navbarColor group-hover:text-white">
                  {{LN['Уникальные методы']}}
                </h1>
                <p class="text-sm lg:text-lg">
                  {{LN['Индивидуальный подход к каждому клиенту, наша команда поможет вам подобрать машину строго по вашему вкусу']}}

                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      {{-- <section class="relative z-10 bg-white py-[90px]">
        <div class="container">
          <div class="relative grid grid-cols-1 gap-20 lg:gap-0 lg:grid-cols-2">
            <div class="calculator">
              <div class="title">
                <h1 data-aos="fade-right" data-delay="100"
                  class="mb-12 text-3xl text-center text-navbarColor md:text-5xl section__title before:bg-navbarColor lg:text-left">
                  Онлайн калькулятор кредита
                </h1>
                <p data-aos="fade-right" data-delay="150"  class="text-lg opacity-50 text-textColor">Внимание! Калькулятор не гарантирует абсолютной точности
                  расчетов.</p>
              </div>
              <form class="mt-[50px] space-y-5">
                <div class="space-y-5" data-aos="fade-right" data-delay="180" >
                  <label for="vol " class="text-2xl font-bold text-textColor">Выберите модель</label>
                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor" name="cars"
                    id="cars">
                    <option class="block w-[300px] p-5 border  shadow-xl" value="volvo">Volvo</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="saab">Saab</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="mercedes">Mercedes</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="audi">Audi</option>
                  </select>
                </div>
                <div class="flex-col space-y-5"  data-aos="fade-right" data-delay="180">
                  <label for="cars " class="text-2xl font-bold text-textColor">Сумма</label>
                  <div class="w-full text-xl border shadow-xl lg:w-3/5 text-textColor">
                      <h1 class="p-5 text-2xl text-textColor range-value" ><span>0</span> UZS</h1>
                      <input type="range" value="0" class="block text-xl border shadow-xl lg:w-3/5 text-textColor" id="vol" name="vol" min="0" max="50">
                  </div>
                </div>
                <div class="space-y-5"  data-aos="fade-right" data-delay="200">
                  <label for="cars " class="text-2xl font-bold text-textColor">Срок кредита (месяцев)</label>

                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor" name="cars"
                    id="cars">
                    <option class="block w-[300px] p-5 border  shadow-xl" value="volvo">12</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="saab">24</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="mercedes">36</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="audi">42</option>
                  </select>
                </div>
                <div class="space-y-5"  data-aos="fade-right" data-delay="250">
                  <label for="cars " class="text-2xl font-bold text-textColor">Первоначальный взнос</label>

                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor" name="cars"
                    id="cars">
                    <option class="block w-[300px] p-5 border  shadow-xl" value="volvo">10%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="saab">25%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="mercedes">30%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="audi">40%</option>
                  </select>
                </div>
                <div class="space-y-5"  data-aos="fade-right" data-delay="300">
                  <label for="cars " class="text-2xl font-bold text-textColor">Первоначальный взнос</label>

                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor" name="cars"
                    id="cars">
                    <option class="block w-[300px] p-5 border  shadow-xl" value="volvo">10%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="saab">25%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="mercedes">30%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="audi">40%</option>
                  </select>
                </div>
              </form>
            </div>
            <div
              class="bg-[url('./project/image/section/sectionTolov.png')] bg-cover relative lg:min-h-[400px] min-h-[500px]">
              <div data-aos="fade-left" data-delay="200"
                class="calculator-result absolute xl:w-3/5 sm:w-4/5 w-11/12 h-full bg-navbarColor sm:left-[10%] left-1/2 -translate-x-1/2 sm:translate-x-0 -top-30 p-30 flex flex-col items-start space-y-6">
                <h1 class="text-lg text-white calculator-result__title lg:text-3xl md:text-2xl sm:text-xl">
                  Наше предложение
                </h1>
                <div class="payment">
                  <div class="text-base text-white opacity-50 title lg:text-xl md:text-lg">
                    Ежемесячный платеж
                  </div>
                  <div class="payment_result mt-1.5 lg:text-3xl md:text-2xl sm:text-xl text-lg  text-white">
                    1 234 567 UZS
                  </div>
                </div>
                <div class="Interest">
                  <div class="text-base text-white opacity-50 title lg:text-xl md:text-lg">
                    Процентная ставка
                  </div>
                  <div class="Interest_result mt-1.5 lg:text-3xl md:text-2xl sm:text-xl text-lg  text-white">
                    18%
                  </div>
                </div>
                <div class="summa">
                  <div class="text-base text-white opacity-50 title lg:text-xl md:text-lg">
                    Сумма с учетом процентов
                  </div>
                  <div class="summa_result mt-1.5 lg:text-3xl md:text-2xl sm:text-xl text-lg  text-white">
                    123 456 789 UZS
                  </div>
                </div>

              </div>
            </div>
            <img data-aos="fade-up" data-delay="300" data-speed="-4"  src="./project/image/section/tolov.png"
              class="absolute right-0 w-full paralax-image lg:w-2/3 sm:-bottom-20 -bottom-10">
          </div>
        </div>
      </section> --}}
      <section class="relative z-10 bg-white py-[90px]">
        <div class="container">
          <div class="grid grid-cols-1 lg:grid-cols-3">
            <div class="col-span-2 p-8 space-y-[30px] shadow-xl border">
              <h1 data-aos="fade-right" data-delay="150" class="text-3xl font-semibold md:text-5xl text-navbarColor">
                {{LN['Почему электромобиль?']}}
              </h1>
              <div data-aos="fade-up" data-delay="100" class="flex space-x-[30px] pr-0 md:pr-[50px]">
                <img class=" w-[50] h-[50px] md:w-[80px] md:h-[80px]" src="./project/image/section/icon1.png">
                <div class="space-y-2">
                  <h2 class="text-xl md:text-3xl text-textColor">{{LN['Безопасность']}}</h2>
                  <p class="text-sm opacity-50 text-textColor md:text-lg">{{LN['Низкий риск взрыва в случае пожара в дорожно-транспортном происшествии']}}</p>
                </div>
              </div>
              <div data-aos="fade-up" data-delay="130" class="flex space-x-[30px] pr-0 md:pr-[50px]">
                <img class="  w-[50] h-[50px] md:w-[80px] md:h-[80px]" src="./project/image/section/icon2.png">
                <div class="space-y-2">
                  <h2 class="text-xl md:text-3xl text-textColor">{{LN['Экономия']}}</h2>
                  <p class="text-sm opacity-50 text-textColor md:text-lg">{{LN['Расход топлива и запчастей меньше']}}</p>
                </div>
              </div>
              <div data-aos="fade-up" data-delay="150" class="flex space-x-[30px] pr-0 md:pr-[50px]">
                <img class="  w-[50] h-[50px] md:w-[80px] md:h-[80px]" src="./project/image/section/icon3.png">
                <div class="space-y-2">
                  <h2 class="text-xl md:text-3xl text-textColor">{{LN['Удобство и комфорт']}}</h2>
                  <p class="text-sm opacity-50 text-textColor md:text-lg">{{LN['Шум двигателя очень низкий']}}</p>
                </div>
              </div>
              <div data-aos="fade-up" data-delay="170" class="flex space-x-[30px] pr-0 md:pr-[50px]">
                <img class="  w-[50] h-[50px] md:w-[80px] md:h-[80px]" src="./project/image/section/icon4.png">
                <div class="space-y-2">
                  <h2 class="text-xl md:text-3xl text-textColor">{{LN['Окружающая среда']}}</h2>
                  <p class="text-sm opacity-50 text-textColor md:text-lg">{{LN['Не выделяет вредных газов в окружающую среду']}}</p>
                </div>
              </div>
            </div>
            <div class="hidden col-span-1 lg:block">
              <img class="object-cover w-full h-full paralaxImage" src="./project/image/section/section-image.png">
            </div>
          </div>
        </div>
      </section>
      <section class="relative z-10 bg-white">
        <div class="container relative z-10 ">
          <h1 data-aos="fade-right" data-delay="150" class="mb-12 text-3xl text-navbarColor md:text-5xl section__title before:bg-navbarColor ">
            {{LN['Расположение зарядных станций']}}
          </h1>
        </div>
        <div>
          <div class="map" id="tokbor-map"></div>
        </div>
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
  <script src="./project/js/swiper.js"></script>

  <script src="./project/plugins/simpleParallax/simpleParallax.js"></script>
  <script>
    let images = document.querySelectorAll('.paralaxImage');
    new simpleParallax(images, {
	  orientation: 'right'
    });
  </script>
</body>

</html>