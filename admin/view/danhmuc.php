<?php
if (empty($_SESSION['users'])) {
  header('Location: ?act=sign-in');

}
?>

<div class="w-full px-6 py-6 mx-auto">
  <!-- table 1 -->

  <div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div
                                                                                                                              class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent " style="    display: flex;
    align-items: center;
    justify-content: space-between;">
          <h6>Sản phẩm </h6>
          <a href="?act=themdm">
            <button type="button" class="button" style="background-color: #3aa856;">
              <span class="button__text">Thêm sản phẩm </span>
              <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round"
                                                                                                                                        stroke-linecap="round"
                                                                                                                                        stroke="currentColor"
                                                                                                                                        height="24"
                                                                                                                                        fill="none"
                                                                                                                                        class="svg">
                  <line y2="19" y1="5" x2="12" x1="12"></line>
                  <line y2="12" y1="12" x2="19" x1="5"></line>
                </svg></span>
            </button>
          </a>

        </div>
        <div class="flex-auto px-0 pt-0 ">
          <div class="p-0 overflow-x-auto">
            <table class="table-auto items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th
                                                                                                                                          class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Stt</th>
                  <th
                                                                                                                                          class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Tên </th>

                  <th
                                                                                                                                          class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $key = 1;
                foreach ($ad as $value): ?>
                  <tr>

                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent ">
                      <div class="flex px-2 py-1">
                        <div>

                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-0 text-sm leading-normal">
                            <?= $key++ ?>
                          </h6>

                        </div>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight">
                        <?= $value['name'] ?>
                      </p>

                    </td>

                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent" style="display: flex;
                    justify-content: center;
                  align-items: center; gap:20px;padding: 52px 0;">
                      <a href="<?= $GLOBALS['baseurl'] ?>?act=suadm&id=<?= $value['id'] ?>">
                        <button class="c-button c-button--gooey"> Sửa
                          <div class="c-button__blobs">
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                        </button>
                      </a>


                      <a href="<?= $GLOBALS['baseurl'] ?>?act=xoadanhmuc&id=<?= $value['id'] ?>">
                        <button class="noselect"
                                                                                                                                                onclick="return confirm('Bạn có muốn xóa sản phẩm <?= $value['name'] ?>')">
                          <span class="text">Delete</span>
                          <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                              <path
                                                                                                                                                      d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
                              </path>
                            </svg>
                          </span>
                        </button>
                      </a>

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

  <!-- card 2 -->


</div>