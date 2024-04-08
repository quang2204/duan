<?php
if (empty($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
    header('Location: ?act=sign-in');
    exit();
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
                    <h6>Comment</h6>


                </div>
                <div class="flex-auto px-0 pt-0 ">
                    <div class="p-0 overflow-x-auto">
                        <table class="table-auto items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                                                                                                                                            class="px-2 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Stt</th>
                                    <th
                                                                                                                                                            class="pr-6 py-3 pl-2 font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Name </th>


                                    <th
                                                                                                                                                            class="pr-6 py-3 pl-2 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Price </th>

                                    <th
                                                                                                                                                            class="px-8 py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        IMG </th>
                                    <th
                                                                                                                                                            class=" py-3 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Comment </th>


                                    <th
                                                                                                                                                            class=" pl-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bl as $key => $value):

                                    ?>
                                    <tr>
                                        <td
                                                                                                                                                                class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                                                                                                                                                class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= substr($value['product_name'], 0, 25) . '...'; ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= number_format($value['product_price'], 0, ',', '.') ?> đ
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <img src="<?= $value['product_img'] ?>" style="width: 80px;" alt="">
                                        </td>
                                        <td
                                                                                                                                                                class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['comment_content'] ?>
                                            </p>
                                        </td>

                                        <td
                                                                                                                                                                class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                                            <a href="?act=xembl&id=<?= $value['product_id'] ?>">
                                                <button class="c-button c-button--gooey"> View detail
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

<ul class="pagination d-flex justify-content-center">
    <?php
    $link = isset($_GET['search']) ? '&search=' . $_GET['search'] : '';
    ?>
    <?php if ($page > 1): ?>
        <li class="page-item">
            <a class="page-link" href="?act=comment&trang=<?= $page - 1; ?><?= $link ?>">Prev</a>
        </li>
    <?php endif; ?>
    <?php if ($totalPages > 1):
        for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?act=comment&trang=<?= $i; ?><?= $link ?>">
                    <?= $i; ?>
                </a>
            </li>

        <?php endfor; ?>
    <?php endif; ?>
    <?php if ($page < $totalPages): ?>
        <li class="page-item">
            <a class="page-link" href="?act=comment&trang=<?= $page + 1; ?><?= $link ?>">Next</a>
        </li>
    <?php endif; ?>
</ul>