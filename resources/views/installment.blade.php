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
  <link rel="icon" href="./project/image/icon.png" type="image/gif">


  <link rel="stylesheet" href="./project/plugins/swiper/swiper.css" />
  <link href="./project/plugins/aos/aos.css" rel="stylesheet" />
  <link href="./project/plugins/remixicon/remixicon.css" rel="stylesheet" />
  <script src="./project/plugins/tailwind/tailwind.js"></script>
  <script src="./project/plugins/tailwind/tailwind.config.js"></script>
  <link rel="stylesheet" href="./project/css/style.css" />

</head>



 <body>

  <div class="overflow-x-hidden wrapper">

    <div class="fixed top-0 left-0 modal-wrapper items-center justify-center w-full h-screen z-[9999] hidden">
      <!--  -->
        <div class="fixed top-0 left-0 modal-wrapper flex items-center justify-center w-full h-[100vh]  z-[9999] ">
              <div class="p-8 duration-300 bg-white rounded-sm modal__content lg:w-1/2 md:w-3/4  gap-y-6 md:gap-10 ">
                  <div class="flex items-center justify-center  ">
                    <div class="w-full">
                    
                    <div class="mb-4">
                      <h2 class="text-2xl font-semibold leading-tight text-center">{{LN['Способ расчёта лизинга']}} {{LN['Диференциал']}}</h2>
                    </div>
                    <div class="max-h-60 overflow-y-scroll">
    <table class=" min-w-full  leading-normal ">
      <thead class="sticky top-0">
        <tr class="">
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
            {{LN['Выплата основного долга']}}
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
            {{LN['Выплата %']}}
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
            {{LN['Итого']}}
          </th>
  
  
        </tr>
      </thead>
      <tbody class="  " id="calc_table">

      </tbody>
    </table>
  </div>
</div>
                    </div>
                    <div class="flex justify-between items-center">
                      <button 
                          class=" inlinne-block modal-btn w-full py-4 mb-2 duration-300 text-sm text-center text-white border-2 border-white bg-navbarColor hover:text-navbarColor hover:bg-white active:text-navbarColor active:bg-white hover:border-navbarColor acitive:border-navbarColor">
                          <i class="text-3xl ri-close-line"></i>
                        </button>
                        <form action="/pdfcreator.php" method="post" class="w-full"> 
                        <input type="hidden" name="table" id="table_post" value="">
                        <input type="hidden" name="car" id="model_name_post" value="">
                        <input type="hidden" name="data" id="data" value="">
                      <button type="submit"
                          class=" inlinne-block modal-btn w-full py-4 mb-2 duration-300 text-sm text-center text-white border-2 border-white bg-navbarColor hover:text-navbarColor hover:bg-white active:text-navbarColor active:bg-white hover:border-navbarColor acitive:border-navbarColor">
                          <i class="text-3xl ri-survey-line"></i>
                        </button>
                      </form>
                    </div>
                  </div>
            </div>
      </div>
    </div>

  
    @include('blocks.header')

    <main class="mt-[84px] md:mt-[134px]">
      <section class="  bg-[url('./project/image/bg.png')] bg-no-repeat bg-cover py-14">
        <div class="container">
          <div class="flex flex-col items-start mb-10 space-y-10 title lg:mb-40 md:mb-20 sm:mb-16">
            <h1 data-aos="fade-right" class="mb-6 text-2xl md:mb-12 text-navbarColor md:text-5xl section__title before:bg-navbarColor">
              {{LN['Лизинг']}}
            </h1>
            <p data-aos="fade-up"  class="text-lg lg:text-2xl md:text-xl text-textColor ">
              <?= (@$_COOKIE['lang'] == 'uz') ? $dat -> lizing_desc_uz : $dat -> lizing_desc ?>
            </p>
          </div>


          <?php $dat = R::findOne("data", "id = ?", [1]);?>


          <div class="relative grid grid-cols-1 gap-20 lg:gap-0 lg:grid-cols-2">
            <div class="calculator">
              <div class="title">
                <h1 data-aos="fade-up"
                  class="mb-12 text-3xl text-center text-navbarColor md:text-5xl section__title before:bg-navbarColor lg:text-left">
                  {{LN['Онлайн калькулятор лизинга']}}
                </h1>
                <p data-aos="fade-up" class="text-lg opacity-50 text-textColor">{{LN['Внимание! Калькулятор не гарантирует абсолютной точности расчетов.']}}
                </p>
              </div>
              <div class="mt-[50px] space-y-5">
                <div class="space-y-5">
                  <label for="vol " class="text-2xl font-bold text-textColor">{{LN['Выберите марку']}}</label>
                  <select onchange="getStampCars();" id="stamps" class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor" name="cars"
                    id="cars">
                    <?php
                    $stamps = R::findAll("stamps"); 
                    $car = R::findOne("cars", "id = ?", [@$_GET['id']]); 
                    $srch_stamp = R::findOne("stamps", "id = ?", [@$car -> stamp_id]); 
                    ?>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="<?=(isset($_GET['id'])) ? $srch_stamp -> id : ""?>"><?=(isset($_GET['id'])) ? $srch_stamp -> name : "Выберите марку"?></option>
                    @foreach($stamps as $val)
                    <option class="block w-[300px] p-5 border  shadow-xl" value="{{$val -> id}}">{{$val -> name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="space-y-5">
                  <label for="vol " class="text-2xl font-bold text-textColor">{{LN['Выберите модель']}}</label>
                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor" name="cars"
                    id="cars">
                    <?php if(isset($_GET['id'])) {?>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="<?=$car -> price?>"><?=$car -> model?></option>
                    <?php } ?>
                  </select>
                </div>
                {{-- <div class="flex-col space-y-5">
                  <label for="cars " class="text-2xl font-bold text-textColor">{{LN['Сумма']}}</label>
                  <div class="w-full text-xl border shadow-xl lg:w-3/5 text-textColor">
                      <h1 class="p-5 text-2xl text-textColor range-value" ><span>0</span> UZS</h1>
                      <input type="range" value="0" class="block text-xl border shadow-xl lg:w-3/5 text-textColor" id="vol" name="vol" min="0" max="50">
                  </div>
                </div> --}}
                <div class="space-y-5">
                  <label for="cars " class="text-2xl font-bold text-textColor">{{LN['Срок лизинга (месяцев)']}}</label>

                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor"
                    id="slz">
                    <option class="block w-[300px] p-5 border  shadow-xl" value="24">24</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="36">36</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="48">48</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="60">60</option>
                  </select>
                </div>
                <div class="space-y-5">
                  <label for="cars " class="text-2xl font-bold text-textColor">{{LN['Первоначальный взнос']}}</label>

                  <select class="block w-full p-5 text-xl border shadow-xl lg:w-3/5 text-textColor"
                    id="pvz">
                    <option class="block w-[300px] p-5 border  shadow-xl" value="20">20%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="25">25%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="30">30%</option>
                    <option class="block w-[300px] p-5 border  shadow-xl" value="35">35%</option>
                  </select>
                </div>

                <div class="space-y-5">
                <label for="cars " class="text-2xl font-bold text-textColor">{{LN['Способ расчёта лизинга']}}</label>
                <div class="flex items-center mb-4">
                  <input id="annuit"  name="hisoblash-turlari" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded   ">
                  <label for="annuit"  class="ml-2 text-sm font-medium text-gray-900 ">{{LN['Аннуитет']}}</label>
                </div>
                <div class="flex items-center">
                    <input checked id="differ" name="hisoblash-turlari" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded   ">
                    <label for="differ" class="ml-2 text-sm font-medium text-gray-900 ">{{LN['Диференциал']}}</label>
                </div>
                </div>  
                <div class="space-y-5 lg:w-3/5 ">
                 
                  <button onclick="return false;" 
                        class="partner-modal block modal-btn w-full py-4 mb-2 duration-300 text-sm text-center text-white border-2 border-white bg-navbarColor hover:text-navbarColor hover:bg-white active:text-navbarColor active:bg-white hover:border-navbarColor acitive:border-navbarColor">
                        {{LN['Калькуляция']}}
                      </button>
                </div>

              </div>
            </div>
            <div
              class="bg-[url('./project/image/section/sectionTolov.png')] bg-cover relative lg:min-h-[400px] min-h-[500px]">
              <div
                class="calculator-result absolute xl:w-3/5 sm:w-4/5 w-11/12 h-full bg-navbarColor sm:left-[10%] left-1/2 -translate-x-1/2 sm:translate-x-0 -top-30 p-30 flex flex-col items-start space-y-6">
                <h1 data-aos="fade-up" class="text-lg text-white calculator-result__title lg:text-3xl md:text-2xl sm:text-xl">
                  {{LN['Наше предложение']}}
                </h1>
                <div class="payment">
                  <div data-aos="fade-up" class="text-base text-white opacity-50 title lg:text-xl md:text-lg">
                    {{LN['Ежемесячный платеж']}}
                  </div>
                  <div data-aos="fade-up" class="payment_result mt-1.5 lg:text-3xl md:text-2xl sm:text-xl text-lg  text-white" id="ejmp">
                    0 {{LN['сум']}}
                  </div>
                </div>
                <div class="Interest">
                  <div data-aos="fade-up" class="text-base text-white opacity-50 title lg:text-xl md:text-lg">
                    {{LN['Процентная ставка']}}
                  </div>
                  <div class="Interest_result mt-1.5 lg:text-3xl md:text-2xl sm:text-xl text-lg  text-white" id="int_rate">
                    24.9 %
                  </div>
                </div>
                <div class="summa" data-aos="fade-up">
                  <div class="text-base text-white opacity-50 title lg:text-xl md:text-lg">
                    {{LN['Сумма с учетом процентов']}}
                  </div>
                  <div class="summa_result mt-1.5 lg:text-3xl md:text-2xl sm:text-xl text-lg  text-white" id="ossp">
                    0 {{LN['сум']}}
                  </div>
                </div>

              </div>
            </div>
            <img data-speed="-6"  src="./project/image/section/tolov.png"
              class="absolute right-0 w-full paralax-image lg:w-3/5 sm:-bottom-20 -bottom-10">
          </div>
        </div>
      </section>
    </main>


    @include('blocks.footer')

  </div>
  <script>

function getStampCars() {
  let stm = document.getElementById("stamps");
  if (stm.value) {
    $.ajax({
      url: "{{route('getStampCarsC')}}",
      type: "post",
      dataType: "html",
      data: {
        _token: "{{ csrf_token() }}",
        id: stm.value,
      },
      error: function (err) {
        if (err.status == 500) {
          alert("Нет соединения с сетью.");
        } else {
          alert("Error_code: " + err.status);
        }
      },
      beforeSend: function () {},
      success: function (data) {
        if (data) {
          $("#cars").html(data);
        } else {
          alert("Error_code: " + data);
        }
      },
    });
  }
}

  </script>

  <script src="project/jquery-3.6.3.min.js"></script>
  <script src="./project/plugins/swiper/swipperJsBuld.js"></script>
  <script src="./project/plugins/aos/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./project/js/swiper.js"></script>
  <script src="./project/js/script.js"></script>
  <script src="./project/js/modalCanculator.js"></script>

</body>

</html>