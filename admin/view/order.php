<?php
if (empty($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
    header('Location: ?act=sign-in');
    exit();
}
?>

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                                                                                                                                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent ">
                    <h6>Product</h6>
                </div>
                <div class="flex-auto px-0 pt-0 ">
                    <div class="p-0 overflow-x-auto">
                        <table class="table-auto items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Stt</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Name </th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Address</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Phone </th>

                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-6">
                                        Pay</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-6">
                                        Date order </th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Total</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                   
                            <tbody>
                                <?php
                                foreach ($order as $key => $value): ?>
                                    <tr>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div></div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">
                                                        <?= $key + 1 ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?=
                                                    $value['name'];
                                                ?>

                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['address'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['phone'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight text-center">
                                                <?= $value['pay'] ? 'Thanh toán online' : 'Cod' ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['created_time'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent readonly">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['total'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent readonly">
                                            <p class="mb-0 text-xs font-semibold leading-tight text-center">
                                                <?php if ($value['status'] == 1) {
                                                    echo 'Thành công';
                                                } elseif ($value['status'] == 0) {
                                                    echo ' Đang xác nhận';
                                                } else {
                                                    echo 'Đã hủy';
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent" style="display: flex;
                    justify-content: center;
                  align-items: center; gap:20px;padding: 52px 0;">
                  <?php if ($value['status']==0) : ?>

                      <form action="?act=updateorder" method="post">
                                                <input type="hidden" name='status' value='1'>
                                                <input type="hidden" name='id' value='<?= $value['id'] ?>'>
                                                <button class="btn mt-1 pl-1" style='border:2px solid green;padding: 7px 10px;'
                                                                                                                                                                        type='submit'>
                                                    Confirm
                                                </button>
                                            </form>
                    <?php endif; ?>
                                          


                                            <a href="?act=order_detail&id=<?= $value['id'] ?>">
                                                <button class="c-button c-button--gooey"> Detail

                                                </button>
                                            </a>
                                            <a href="?act=xoaorder&id=<?= $value['id'] ?>">
                                                <button class="noselect"
                                                                                                                                                                        onclick="return confirm('Bạn có muốn xóa không <?= $value['name'] ?>')">
                                                    <span class="text">Delete</span>
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                                                                                                                                viewBox="0 0 24 24">
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
</div>