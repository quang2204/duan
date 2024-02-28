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
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent " style="display: flex;
    align-items: center;
    justify-content: space-between;">
                    <h6>Product</h6>
                    <a href="?act=adsp">
                        <button type="button" class="button" style="background-color: #3aa856;">
                            <span class="button__text">Add product</span>
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
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Stt</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 pl-2 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Name </th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Size</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Color </th>

                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-6">
                                        Quantity </th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 pl-2">
                                        Total</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($detail as $key => $value): ?>
                                    <tr style='height: 60px;'>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight text-center pr-6">
                                                <?= $key + 1 ?>

                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?=
                                                    substr($value['name'], 0, 25) . '...';
                                                ?>

                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['sizes'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['colors'] ?>
                                            </p>
                                        </td>

                                        <td
                                                                                                                                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['quantity'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent readonly">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= number_format($value['price'], 0, 0, ) ?>
                                            </p>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-center align-items-center " style='gap:20px; margin:50px 0 10px'>
                            <a href="?act=confirm&id=<?= $value['id'] ?>">
                                <button class="btn mt-1 pl-1" style='border:2px solid green;padding: 7px 10px;'>
                                    Confirm

                                </button>
                            </a>
                            <a href="?act=xoaorder&id=<?= $value['order_id'] ?>">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>