// function init() {
//   let map = new ymaps.Map("tokbor-map", {
//     center: [41.315040247336114, 69.27961711889647],
//     zoom: 12,
//   });

//   let placemark = new ymaps.Placemark(
//     [41.328005633944734, 69.26545589150997],
//     {
//       balloonContentHeader: "TokBor",
//       balloonContentBody: "<img src='tokbor.jpg' width='55'><br>Charge Station",
//       balloonContentFooter:
//         "Станция зарядки электромобилей; </br>Ташкент, Чиланзарский район, махалля Бешёгоч",
//     },
//     {
//       // preset: "islands#redIcon",
//       iconLayout: "default#image",
//       iconImageHref: "c-img.png",
//       iconImageSize: [40, 40],
//       iconImageOffset: [-20, -20],
//     }
//   );

//   let placemark2 = new ymaps.Placemark(
//     [41.304828525785084, 69.25263828576655],
//     {
//       balloonContentHeader: "TokBor",
//       balloonContentBody: "Charge Station",
//       balloonContentFooter:
//         "Станция зарядки электромобилей; </br>Ташкент, Шайхантахурский район, махалля Лабзак",
//     },
//     {
//       // preset: "islands#redIcon",
//       iconLayout: "default#image",
//       iconImageHref: "c-img.png",
//       iconImageSize: [40, 40],
//       iconImageOffset: [-20, -20],
//     }
//   );

//   let placemark3 = new ymaps.Placemark(
//     [41.32410251405013, 69.29604106457346],
//     {
//       balloonContentHeader: "TokBor",
//       balloonContentBody: "Charge Station",
//       balloonContentFooter:
//         "Станция зарядки электромобилей; </br>Ташкент, Мирзо-Улугбекский район, махалля Хамид Олимжон",
//     },
//     {
//       // preset: "islands#redIcon",
//       iconLayout: "default#image",
//       iconImageHref: "c-img.png",
//       iconImageSize: [40, 40],
//       iconImageOffset: [-20, -20],
//     }
//   );

//   let placemark4 = new ymaps.Placemark(
//     [41.34956616670941, 69.17793049999992],
//     {
//       balloonContentHeader: "TokBor",
//       balloonContentBody: "Charge Station",
//       balloonContentFooter:
//         "Станция зарядки электромобилей; </br>ул. Фараби, 448А, Ташкент, Узбекистан",
//     },
//     {
//       // preset: "islands#redIcon",
//       iconLayout: "default#image",
//       iconImageHref: "c-img.png",
//       iconImageSize: [40, 40],
//       iconImageOffset: [-20, -20],
//     }
//   );

//   let placemark5 = new ymaps.Placemark(
//     [41.34381236817901, 69.20545281808253],
//     {
//       balloonContentHeader: "TokBor",
//       balloonContentBody: "Charge Station",
//       balloonContentFooter:
//         "Станция зарядки электромобилей; </br>Ташкент, Шайхантахурский район, махалля Бустон",
//     },
//     {
//       // preset: "islands#redIcon",
//       iconLayout: "default#image",
//       iconImageHref: "c-img.png",
//       iconImageSize: [40, 40],
//       iconImageOffset: [-20, -20],
//     }
//   );

//   let placemark6 = new ymaps.Placemark(
//     [41.33957963896457, 69.25403555026239],
//     {
//       balloonContentHeader: "TokBor",
//       balloonContentBody: "Charge Station",
//       balloonContentFooter:
//         "Станция зарядки электромобилей; </br>ул. Нодиры, 4, Ташкент, Узбекистан",
//     },
//     {
//       // preset: "islands#redIcon",
//       iconLayout: "default#image",
//       iconImageHref: "c-img.png",
//       iconImageSize: [40, 40],
//       iconImageOffset: [-20, -20],
//     }
//   );

//   map.controls.remove("geolocationControl"); // удаляем геолокацию
//   map.controls.remove("searchControl"); // удаляем поиск
//   map.controls.remove("trafficControl"); // удаляем контроль трафика
//   map.controls.remove("typeSelector"); // удаляем тип
//   map.controls.remove("fullscreenControl"); // удаляем кнопку перехода в полноэкранный режим
//   map.controls.remove("zoomControl"); // удаляем контрол зуммирования
//   map.controls.remove("rulerControl"); // удаляем контрол правил
//   map.behaviors.disable(["scrollZoom"]); // отключаем скролл карты (опционально)

//   map.geoObjects.add(placemark);
//   map.geoObjects.add(placemark2);
//   map.geoObjects.add(placemark3);
//   map.geoObjects.add(placemark4);
//   map.geoObjects.add(placemark5);
//   map.geoObjects.add(placemark6);
// }

// ymaps.ready(init);

ymaps.ready(init);
function init() {
  let arrCords = [
    [41.02706, 70.60434],
    [41.27275, 69.16912],
    [41.27266, 69.16933],
    [41.32669, 69.29285],
    [41.20084, 69.21122],
    [41.34744, 69.28614],
    [41.34383, 69.20557],
    [41.32831, 69.26524],
    [41.62283, 69.93459],
    [41.57555, 70.02099],
    [41.28827, 69.28459],
    [41.28794, 69.28457],
    [41.27803, 69.19795],
    [41.35456, 69.35492],
    [41.25816, 69.19402],
    [40.09654, 67.7775],
    [39.65665, 66.94754],
    [39.67984, 66.93839],
    [41.36703, 69.29118],
    [41.309744, 69.298442],
    [41.32231, 69.21996],
    [41.31202, 69.28508],
    [40.78565, 72.34923],
    [41.35532, 69.3756],
    [39.6799, 66.93832],
    [40.99861, 71.64416],
    [40.9921, 71.64845],
    [40.37203, 71.80882],
    [40.38385, 71.78326],
    [40.54429, 70.93967],
    [40.53772, 70.93637],
    [41.3289, 69.31332],
    [41.30482, 69.25275],
    [41.34935, 69.17809],
    [41.30749, 69.20647],
    [41.34096, 69.3591],
    [41.36359, 69.20422],
    [41.30405, 69.32207],
    [41.33934, 69.25445],
    [41.33941, 69.2542],
    [41.32801, 69.2652],
    [69.33213, 41.31298],
    [41.48929, 69.94337],
    [41.32428, 69.29584],
  ];

  let arrText = [
    ["Kamchik 80kW NABIXON OTA OSHXONASI", "A373, Узбекистан"],
    ["ДЕПО Mall ◀️ Левая", "Депо мол ул. Lutfi, 57а"],
    ["ДЕПО Mall ▶️ Правая", "Депо мол ул. Lutfi, 57а"],
    ["TOK BOR 80kW UZGIDROMET", "21 Osiyo ko&#039;chasi, Тошкент, Узбекистан"],
    ["FeedUp Спутник", "Feed up ул. Qoratosh, 11"],
    ["TOK BOR 80кВт Beshqozon", "Beshqozon ул. Ифтихор, 1"],
    ["TOK BOR 120кВт Ecobozor Beruny", "Ecobozor Beruniy пр-т БЕРУНИ, 47"],
    [
      "TOK BOR 160кВт Anhor Lokomotiv",
      "87 Shayhontohur ko&#039;chasi, Тошкент, Узбекистан",
    ],
    ["TOK BOR Chinorkent 60кВт", "Cinorkent БОСТАНЛЫКСКИЙ Р-Н пос. ХОДЖИКЕНТ"],
    [
      "LAYNER 60кВт",
      "Городской посёлок Чимган, Бостанлыкский район, Ташкентская область",
    ],
    ["Seg Tasco Саракулька 80кВт (правая ➡️)", "Seg Tasco  ул. Мехржон, 70"],
    ["Seg Tasco Саракулька 80кВт (левая ⬅️)", "Seg Tasco  ул. Мехржон, 70"],
    ["TOK BOR 160кВт Andalus", "Andalus ЧИЛАНЗАР, 16 кв-л"],
    [
      "TOK BOR 160кВт Экобазар чимган",
      "122 Mirzo Ulug&#039;bek shoh ko&#039;chasi, Тошкент, Узбекистан",
    ],
    ["TOK BOR 80кВт Автовокзал", "7, Тошкент 100191, Узбекистан"],
    ["TOK BOR 40кВт UNG Petro Jizzax", "3QWG+FPQ, Джизак, Узбекистан"],
    ["TOK BOR 40+80кВт (Alexander hotel)", "MW4W+WQ4, Самарканд, Узбекистан"],
    ["TOK BOR 40кВт (UNG Petro Samarkand)", "MWJQ+275, Самарканд, Узбекистан"],
    [
      "ТЕСТОВЫЙ РЕЖИМ 60кВт (Mega подземный паркинг -1)",
      "2Б Ahmad Donish ko&#039;chasi, Тошкент 100037, Узбекистан",
    ],
    [
      "TOK BOR Море 60кВт (7:00-24:00)",
      "Morfologicheskiy Korpus Tashmi, 103 Taraqqiyot Street, Tashkent, Узбекистан",
    ],
    [
      "Feedup 1 гор больница",
      "40 Mannon Uyg&#039;ur ko&#039;chasi, Тошкент, Узбекистан",
    ],
    ["TOK BOR Tata 80кВт", "876P+R56, Ташкент, Узбекистан"],
    ["Makro Андижан", "Q8PX+GQ4, Андижан, Узбекистан"],
    ["Makro TTZ", "Feruza ko&#039;chasi, Тошкент, Узбекистан"],
    ["UNG Petro Samarkand", "147 Rudakiy ko&#039;chasi, Samarqand, Узбекистан"],
    ["TOK BOR (Oydin Plaza) Наманган", "R-112, Namangan, Узбекистан"],
    ["Makro Namangan", "20 Алишер Навоий кучаси, Namangan 160100, Узбекистан"],
    [
      "TOK BOR (Grand Hotel) Fergana",
      "Unnamed Road, Farg&#039;ona, Узбекистан",
    ],
    ["Makro Fergana", "26 Sayilgoh street, Fergana, Узбекистан"],
    ["TOK BOR (QASR Hotel) Kokand", "7 Turkiston St, Kokand, Узбекистан"],
    ["Makro Kokand", "Ozodlik hiyoboni St, Kokand, Узбекистан"],
    ["UNG Petro Chinobod", "44 Kichik Xalqa Yo&#039;li, Тошкент, Узбекистан"],
    [
      "BeFit PRO (8:00-22:00)",
      "1 Beshyogoch ko&#039;chasi, Тошкент 100000, Узбекистан",
    ],
    ["Makro ТашМи", "448j Farobi ko&#039;chasi, Тошкент, Узбекистан"],
    ["Makro ОкТепа", "Sayfi Alimov Street, Тошкент, Узбекистан"],
    ["Makro Луначарского", "313 Buyuk Ipak Yo&#039;li, Тошкент, Узбекистан"],
    ["Makro Каракамыш 2/5", "Tansiqboev ko&#039;chasi, Тошкент, Узбекистан"],
    ["Makro Taraqqiyot", "улица Махтумкули, Тошкент, Узбекистан"],
    ["Makro Riviera ⬅️ левая", "5 Нурафшон кўчаси, Тошкент, Узбекистан"],
    ["Makro Riviera ➡️ правая", "5 Нурафшон кўчаси, Тошкент, Узбекистан"],
    ["Anhor lokomotiv", "28 Shayhontohur ko&#039;chasi, Тошкент, Узбекистан"],
    ["Makro Ок Сарой", "Ташкент, ул. Бешёгоч, 10Б"],
    [
      "Amirsoy Resort (возле ресепшина Le Chalet)",
      "Узбекистан, Ташкентская обл., Бостонликский район, Территория Чимган КФЙ",
    ],
    ["BeFit Новомосковская", "Osiyo ko&#039;chasi, Тошкент, Узбекистан"],
  ];

  var sizeZoom = 12;

  if (window.innerWidth < 768) {
    sizeZoom = 10;
  }

  var myMap = new ymaps.Map(
      "tokbor-map",
      {
        center: [41.311153, 69.279729],
        zoom: sizeZoom,
        controls: [],
      },
      {
        suppressMapOpenBlock: true,
      }
    ),
    myGeoObject = new ymaps.GeoObject();

  var activePlacemark = "c-img.png";
  var activePlacemark2;
  for (let index = 0; index < arrCords.length; index++) {
    const element = arrCords[index];
    const text = arrText[index];

    myMap.geoObjects.add(myGeoObject).add(
      new ymaps.Placemark(
        [element[0], element[1]],
        {
          balloonContentHeader: text[0],
          balloonContentBody: text[1],
        },
        {
          iconLayout: "default#image",
          iconImageHref: "c-img.png",
          iconImageSize: [40, 40],
          hideIconOnBalloonOpen: false,
          balloonOffset: [7, -30],
        }
      )
    );
  }
}
