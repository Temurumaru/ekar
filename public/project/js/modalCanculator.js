const modalBtns = document.querySelector(".modal-btn"),
  modalWrapper = document.querySelector(".modal-wrapper"),
  modal = document.querySelector(".modal__content"),
  openPartner = document.querySelectorAll(".partner-modal");

// modalBtns.forEach((btn ) => {
modalBtns.addEventListener("click", () => {
  console.log(modalWrapper);
  modalWrapper.classList.add("hidden");
});
// })

// openPartner.forEach((item) => {
//   item.addEventListener("click", (e) => {
//     e.stopPropagation();
//     modalWrapper.classList.remove("hidden");
//     modalWrapper.classList.add("flex");
//     console.log(modalWrapper);
//   });
// });
// index page qani
document.querySelector("body").addEventListener("click", (e) => {
  if (e.taget !== modal) {
    modalWrapper.classList.add("hidden");
  }
});

modal.addEventListener("click", (e) => {
  e.stopPropagation();
});

let print_text = "";

openPartner.forEach((item) => {
  item.addEventListener("click", (e) => {
    let car_sum = document.getElementById("cars").value; // цена машины
    let pre_pay = document.getElementById("pvz").value; // первоначальный взнос %
    let lizing_sum = car_sum - (car_sum / 100) * pre_pay; // сумма без аванса
    let all_period = document.getElementById("slz").value; // месяца

    let procent_year = 0; // % годовых

    if (
      pre_pay >= 20 &&
      pre_pay <= 25 &&
      all_period >= 24 &&
      all_period <= 36
    ) {
      procent_year = 24.9;
    }

    if (pre_pay >= 20 && pre_pay <= 25 && all_period > 36 && all_period <= 60) {
      procent_year = 25.9;
    }

    if (
      pre_pay >= 30 &&
      pre_pay <= 35 &&
      all_period >= 24 &&
      all_period <= 36
    ) {
      procent_year = 23.9;
    }

    if (pre_pay >= 30 && pre_pay <= 35 && all_period > 36 && all_period <= 60) {
      procent_year = 24.9;
    }

    let procent_period = procent_year / all_period; // % за период

    let vod = lizing_sum / all_period; // Выплата основного дола
    let odl = lizing_sum - vod;
    let vpr = (lizing_sum / 100) * procent_period;

    $("#int_rate").html(procent_year + " %");

    if (document.getElementById("annuit").checked) {
      let tmp_sum = (lizing_sum / 100) * (100 + procent_year);
      let tmp_msum = lizing_sum / all_period;
      $("#ejmp").html(addCommas(Math.round(tmp_msum)) + " UZS");
      $("#ossp").html(addCommas(Math.round(tmp_sum)) + " UZS");
    } else {
      e.stopPropagation();
      modalWrapper.classList.remove("hidden");
      modalWrapper.classList.add("flex");

      let calcs = [];
      calcs.push({
        vod: Math.round(vod),
        vpr: Math.round(vpr),
        summ: Math.round(vod + vpr),
      });

      let j = 1;
      while (j != all_period) {
        vpr = (odl / 100) * procent_period;
        odl = odl - vod;

        calcs.push({
          vod: Math.round(vod),
          vpr: Math.round(vpr),
          summ: Math.round(vod + vpr),
        });

        // echo "i | ".round(vod)." | ".round(odl)." | ".round(vpr)." | ".round(vod + vpr)." \n";

        j++;
      }

      let lng_mon = "ый месяц";
      let lng_sum = "сум";

      if (getCookie("lang") != "uz") {
        lng_mon = "ый месяц";
        lng_sum = "сум";
      } else {
        lng_mon = "oy";
        lng_sum = "som";
      }

      $("#calc_table").html("");
      const table = document.getElementById("calc_table");

      for (let i = 0; i < calcs.length; i++) {
        print_text += `${i + 1};${addCommas(calcs[i].vod)} uzs;${addCommas(
          calcs[i].vpr
        )} uzs;${addCommas(calcs[i].summ)} uzs`;
        if (i < calcs.length - 1) {
          print_text += "\n";
        }
        let row = document.createElement("tr");
        row.innerHTML = `
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
          <div class="flex">

            <div class="ml-3">
              <p class="text-gray-900 whitespace-no-wrap">
                ${addCommas(calcs[i].vod)} ${lng_sum}
              </p>
              <p class="text-gray-600 whitespace-no-wrap">${i + 1}${lng_mon}</p>
            </div>
          </div>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
          <p class="text-gray-900 whitespace-no-wrap">${addCommas(
            calcs[i].vpr
          )} ${lng_sum}</p>
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
          <p class="text-gray-900 whitespace-no-wrap">${addCommas(
            calcs[i].summ
          )} ${lng_sum}</p>
        </td>
      `;
        table.appendChild(row);
      }
      $("#table_post").val(print_text);
      $("#model_name_post").val(
        $("#stamps option:selected").text() +
          " " +
          $("#cars option:selected").text()
      );
      $("#data").val(
        `Leasing for ${all_period} months with an annual rate of ${procent_year}%`
      );
      console.log(print_text);
    }
  });
});

function getCookie(name) {
  var matches = document.cookie.match(
    new RegExp(
      "(?:^|; )" +
        name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
        "=([^;]*)"
    )
  );
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function addCommas(nStr) {
  nStr += "";
  let x = nStr.split(".");
  let x1 = x[0];
  let x2 = x.length > 1 ? "." + x[1] : "";
  let rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, "$1" + " " + "$2");
  }
  return x1 + x2;
}
