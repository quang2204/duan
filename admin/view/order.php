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
                    <h6>Order</h6>
                </div>
                <div class="flex-auto px-0 pt-0 ">
                    <div class="p-0 overflow-x-auto">
                        <table class="table-auto items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 ">
                                        Code orders</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 pl-5 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 ">
                                        Name </th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-6">
                                        Address</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Phone </th>

                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-6">
                                        Pay</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-6">
                                        Voucher </th>
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
                                                        DH
                                                        <?= $value['id'] ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight ">
                                                <?=
                                                    $value['name'];
                                                ?>

                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
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
                                                <?php
                                                if ($value['pay'] == 0) {
                                                    echo 'Cod';
                                                } elseif ($value['pay'] == 1) {
                                                    echo 'Thanh toán bằng vnpay';
                                                } else {
                                                    echo 'Thanh toán bằng momo';

                                                }
                                                ?>
                                            </p>
                                        </td>

                                        <td
                                                                                                                                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['voucher'] ?>
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
                                                <?= number_format($value['total'], 0, 0, ) ?> đ
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent readonly">
                                            <p class="mb-0 text-xs font-semibold leading-tight text-center">
                                                <?php if ($value['status'] == 1) {
                                                    echo 'Thành công';
                                                } elseif ($value['status'] == 0) {
                                                    echo ' Đang xác nhận';
                                                } elseif ($value['status'] == 2) {
                                                    echo 'Đã hủy';
                                                } elseif ($value['status'] == -2) {
                                                    echo 'Vận chuyển thành công';
                                                } elseif ($value['status'] == 3) {
                                                    echo 'Xác nhận';

                                                } else {
                                                    echo 'Đang vận chuyển';

                                                }
                                                ?>

                                            </p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent" style="display: flex;
                    justify-content: center;
                  align-items: center; gap:20px;padding: 52px 0;">
                                            <!-- <?php if ($value['status'] == 0): ?>
                      <form action="?act=updateorder" method="post">

                        <?php if ($value['status'] == 0): ?>
                             <input type="hidden" name='status' value='-1'>
                             <?php elseif ($value['status'] == -1): ?>
                             <input type="hidden" name='status' value='-2'>

                             <?php else: ?>
                             <input type="hidden" name='status' value='1'>

                            <?php endif; ?>
                           
                            <input type="hidden" name='id' value='<?= $value['id'] ?>'>
                            <button class="btn mt-1 pl-1" style='border:2px solid green;padding: 7px 10px;' type='submit'>
                                                    Confirm
                                                </button>
                                            </form>
                <?php elseif ($value['status'] == -1 || $value['status'] == -2): ?>
                    <form action="?act=updateorder" method="post">
                        <?php if ($value['status'] == 0): ?>
                             <input type="hidden" name='status' value='-1'>
                             <?php elseif ($value['status'] == -1): ?>
                             <input type="hidden" name='status' value='-2'>
                             <?php else: ?>
                             <input type="hidden" name='status' value='1'>

                            <?php endif; ?>
                           
                            <input type="hidden" name='id' value='<?= $value['id'] ?>'>
                            <button class="btn mt-1 pl-1" style='border:2px solid green;padding: 7px 10px;' type='submit'>
                                                    Confirm
                                                </button>
                                            </form>             
                <?php endif; ?> -->

                                            <a href="?act=order_detail&id=<?= $value['id'] ?>">
                                                <button class="c-button c-button--gooey"> Detail

                                                </button>
                                            </a>
                                            <?php if ($value['status'] == 1): ?>
                                                <!-- <a href="?act=xoaorder&id=<?= $value['id'] ?>">
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
                                            </a> -->
                                            <?php endif; ?>
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

<ul class="pagination d-flex justify-content-center">
    <?php
    $link = isset($_GET['search']) ? '&search=' . $_GET['search'] : '';
    ?>
    <?php if ($page > 1): ?>
        <li class="page-item">
            <a class="page-link" href="?act=order&trang=<?= $page - 1; ?><?= $link ?>">Prev</a>
        </li>
    <?php endif; ?>
    <?php if ($totalPages > 1):
        for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?act=order&trang=<?= $i; ?><?= $link ?>">
                    <?= $i; ?>
                </a>
            </li>
        <?php endfor; ?>
    <?php endif; ?>

    <?php if ($page < $totalPages): ?>
        <li class="page-item">
            <a class="page-link" href="?act=order&trang=<?= $page + 1; ?><?= $link ?>">Next</a>
        </li>
    <?php endif; ?>
</ul>