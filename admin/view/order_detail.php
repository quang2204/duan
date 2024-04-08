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
                    <h6>Order_detail</h6>
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
                                                <?= number_format($value['price'], 0, 0, ) ?> đ
                                            </p>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>

                        <form action="?act=updateorder" id="statusForm" method="post">
                            <input type="hidden" name='id' value="<?= htmlspecialchars($_GET['id']) ?>">
                            <div class="radio-inputs " style='margin: 40px auto; width: 660px'>
                                <label class="radio">
                                    <input type="radio" name="status" value='0' onclick="submitForm();" <?= $orders['status'] === 0 ? 'checked' : '' ?>>
                                    <span class="name">Đang xác nhận </span>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="status" value='3' onclick="submitForm();" <?= $orders['status'] === 3 ? 'checked' : '' ?>>
                                    <span class="name">Xác nhận </span>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="status" value='2' onclick="submitForm();" <?= $orders['status'] === 2 ? 'checked' : '' ?>>
                                    <span class="name">Hủy </span>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="status" value='-1' onclick="submitForm();" <?= $orders['status'] === -1 ? 'checked' : '' ?>>
                                    <span class="name">Đang vận chuyển </span>
                                </label>
                                <label class="radio">
                                    <input type="radio" name="status" value='-2' onclick="submitForm();" <?= $orders['status'] === -2 ? 'checked' : '' ?>>
                                    <span class="name">Vận chuyển thành công </span>
                                </label>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submitForm() {
        document.getElementById("statusForm").submit();
    }
</script>
<!-- <div class="d-flex justify-center align-items-center " style='gap:20px; margin:50px 0 10px'>
                            <?php if ($value['status'] == 0): ?>
                                <form action="?act=updateorder" method="post">

                                    <?php if ($value['status'] == 0): ?>
                                        <input type="hidden" name='status' value='-1'>
                                    <?php elseif ($value['status'] == -1): ?>
                                        <input type="hidden" name='status' value='-2'>

                                    <?php else: ?>
                                        <input type="hidden" name='status' value='1'>

                                    <?php endif; ?>

                                    <input type="hidden" name='id' value='<?= $value['id'] ?>'>
                                    <button class="btn mt-1 pl-1" style='border:2px solid green;padding: 7px 10px;'
                                                                                                                                                            type='submit'>
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
                                    <button class="btn mt-1 pl-1" style='border:2px solid green;padding: 7px 10px;'
                                                                                                                                                            type='submit'>
                                        Confirm
                                    </button>
                                </form>
                            <?php endif; ?>
                        
                        </div> -->