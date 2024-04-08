<?php
if (empty($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
  header('Location: ?act=sign-in');
  exit();
}
?>
<style>
  .input {
    width: 10%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 10px;
  }
</style>
<div class="w-full px-6 py-6 mx-auto">
  <!-- row 1 -->
  <div class="flex flex-wrap -mx-3">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Total order </p>
                <h5 class="mb-0 font-bold">
                  <?= number_format($orders, 0, 0, ) ?> đ
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Total Users</p>
                <h5 class="mb-0 font-bold">
                  <?= $users ?>

                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Order</p>
                <h5 class="mb-0 font-bold">
                  <?= $bls ?>
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Product</p>
                <h5 class="mb-0 font-bold">
                  <?= $countsp ?>

                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class=" flex-wrap mt-6 -mx-3">
    <!-- <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-5/12 lg:flex-none">
      <div
                                                                                                                              class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="flex-auto p-4">
          <div class="py-4 pr-1 mb-4 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-xl">
            <div>
              <canvas id="myChart" height="360"></canvas>
            </div>
          </div>

        </div>
      </div>
    </div> -->
    <div class="w-full max-w-full px-3 mt-0  lg:flex-none">
      <div
                                                                                                                              class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">

        <div class="flex-auto p-4">
          <select name="date_option" id="date_option" class="input" style='padding: 7px;'
                                                                                                                                  onchange="searchProducts(this)">
            <option value="?act=tongquan" <?= isset($_GET['day']) ? '' : 'selected' ?>>1 năm</option>
            <option value="?act=tongquan&day" <?= isset($_GET['day']) ? 'selected' : '' ?>>1 tháng</option>
          </select>


          <div>
            <canvas id="chart" height="430"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- cards row 4 -->

  <div class="flex flex-wrap my-6 -mx-3">
    <!-- card 1 -->

    <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none"
                                                                                                                            style='width: 100%;'>
      <div
                                                                                                                              class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
          <div class="flex flex-wrap mt-0 -mx-3">
            <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
              <h6>Product</h6>

            </div>

          </div>
        </div>
        <div class="flex-auto p-6 px-0 pb-2">
          <div class="overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th
                                                                                                                                          class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                    Stt </th>
                  <th
                                                                                                                                          class="px-6 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                    Category</th>
                  <th
                                                                                                                                          class="px-6 py-3 font-bold tracking-normal uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                    Quantity</th>
                  <th
                                                                                                                                          class="px-3 py-3 font-bold tracking-normal uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                    Max </th>
                  <th
                                                                                                                                          class="px-3 py-3 font-bold tracking-normal uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                    Min </th>
                  <th
                                                                                                                                          class=" py-3 font-bold tracking-normal uppercase align-middle bg-transparent border-b letter border-b-solid text-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                    Average price </th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1;
                foreach ($tk as $value): ?>
                  <tr>

                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                      <div class="flex px-2 py-1">

                        <div class="flex flex-col justify-center">
                          <h6 class="mb-0 text-sm leading-normal">
                            <?= $key++ ?>
                          </h6>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 text-sm leading-normal  align-middle bg-transparent border-b whitespace-nowrap">
                      <span class="text-xs font-semibold leading-tight">
                        <?= $value['dm_name'] ?>
                      </span>
                    </td>
                    <td class=" text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap"
                                                                                                                                            style='padding-left: 27px;'>
                      <span class="text-xs font-semibold leading-tight">
                        <?= $value['sp_id'] ?>
                      </span>
                    </td>
                    <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                      <span class="text-xs font-semibold leading-tight">
                        <?= number_format($value['max_sp'], 0, 0, ) ?> đ
                      </span>
                    </td>
                    <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                      <span class="text-xs font-semibold leading-tight">
                        <?= number_format($value['min_sp'], 0, 0, ) ?> đ
                      </span>
                    </td>
                    <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                      <span class="text-xs font-semibold leading-tight">
                        <?= number_format($value['sp_price'], 0, 0, ) ?> đ
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>


  <body>
    <script src="assets\js\plugins\chartjs.min.js"></script>

    <?php
    require_once './model/order.php';

    ?>
    <script>
      // chart 2

      var status1 = <?php echo $status1_json; ?>;
      var status2 = <?php echo $status2_json; ?>;
      <?php $mon = isset($_GET['day']) ? $days_json : $months_json ?>
      var months = <?php echo $mon; ?>;
      // console.log(status2);

      var ctx2 = document.getElementById("chart").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
      gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
      gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
      gradientStroke1.addColorStop(0, "rgba(203,12,159,0)"); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
      gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
      gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
      gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: months,
          datasets: [
            {
              label: "Thành công",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: status1,
              maxBarThickness: 6,
            },
            {
              label: "Huỷ",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: status2,
              maxBarThickness: 6,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          interaction: {
            intersect: false,
            mode: "index",
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
              },
              ticks: {
                display: true,
                padding: 10,
                color: "#b2b9bf",
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: "normal",
                  lineHeight: 2,
                },
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5],
              },
              ticks: {
                display: true,
                color: "#b2b9bf",
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: "normal",
                  lineHeight: 2,
                },
              },
            },
          },
        },
      });
    </script>
    <script>
      function searchProducts(select) {
        var url = select.options[select.selectedIndex].value;
        window.location.href = url;
      }
    </script>
  </body>