<?php
if (empty($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
    header('Location: ?act=sign-in');
    exit();
}
?>
<style>
    #customButton {
        padding: 6px 12px;
        border: 1px solid #bab5b5;
        /* max-width: 190px; */
        margin: auto;
        border-radius: 5px;
        transition: 0.5s ease-in-out;
    }

    #customButton:hover {
        background-color: #2d79f3;
        color: white;
    }
</style>
<div class="w-full px-6 py-6 mx-auto">
    <!-- table 1 -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                                                                                                                                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border foots">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent " style="    display: flex;
    align-items: center;
    justify-content: space-between;">
                    <h6>Attribute</h6>
                    <a href="?act=addattribute&id=<?= $variants['0']['id_product'] ?>">
                        <button type="button" class="button" style="background-color: #3aa856;">
                            <span class="button__text">Add Attribute</span>
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
                                                                                                                                                            class="pr-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Stt</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 pl-2 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Color </th>
                                    <th
                                                                                                                                                            class="pr-6  py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Size</th>

                                    <th class="pr-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"
                                                                                                                                                            style='  padding-left: 30px;'>
                                        IMG</th>


                                    <th
                                                                                                                                                            class="pr-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status </th>


                                    <th
                                                                                                                                                            class="pr-6 text-center  py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($variants as $key => $value): ?>
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
                                                    $value['color_name'];
                                                ?>

                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['size_name'] ?>
                                            </p>
                                        </td>

                                        <td
                                                                                                                                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <img src="<?= $value['img'] ?>" style="width: 80px;" alt="">
                                        </td>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight ml-4">
                                                <?= $value['status'] ? ' Show' : 'Hide' ?>
                                            </p>
                                        </td>


                                        <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"
                                                                                                                                                                style="display: flex; justify-content: center; align-items: center; gap: 20px; padding: 52px 0;">
                                            <a href="?act=updateattribute&id=<?= $value['variant_id'] ?>">
                                                <button class="c-button c-button--gooey"> Update

                                                </button>
                                            </a>
                                            <form action="?act=statusv" method='post'>

                                                <input type="hidden" value=<?= $value['variant_id'] ?> name='id'>
                                                <input type="hidden" name='idpoduct' value='<?= $value['id_product'] ?>'>
                                                <input type="hidden" value=<?= $value['status'] ? 0 : 1 ?> name='status'>

                                                <button class="c-button c-button--gooey" type='submit'
                                                                                                                                                                        style='width: 120px;'>
                                                    <span>
                                                        <?= $value['status'] ? ' Hide' : 'SHOW' ?>
                                                    </span>
                                                </button>
                                            </form>

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