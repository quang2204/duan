<?php
if (empty($_SESSION['users']) || $_SESSION['users']['role'] != 1) {
    header('Location: ?act=sign-in');
    exit();
}
?>
<style>
    .ml {
        margin-left: -12px;
    }

    .update {
        font-family: inherit;
        font-size: 15px;
        background: royalblue;
        color: white;
        padding: 0.5em 0;
        width: 100px;
        padding-left: 0.9em;
        display: flex;
        align-items: center;
        border: none;
        border-radius: 5px;
        overflow: hidden;
        transition: all 0.2s;
        cursor: pointer;
        font-weight: 700;

    }

    .update span {
        display: block;
        margin-left: 0.3em;
        transition: all 0.3s ease-in-out;
    }



    .update:active {
        transform: scale(0.95);
    }
</style>
<div class="w-full px-6 py-6 mx-auto">
    <!-- table 1 -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3 foots">
            <div
                                                                                                                                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border ">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent ">
                    <h6>User</h6>
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
                                                                                                                                                            class="px-6 py-3 pl-2 font-bold text-leftuppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Name </th>

                                    <th
                                                                                                                                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Address</th>

                                    <th
                                                                                                                                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 ">
                                        Phone</th>
                                    <th
                                                                                                                                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 ">
                                        Status</th>
                                    <th
                                                                                                                                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 ">
                                        Role</th>
                                    <th
                                                                                                                                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70 text-center">
                                        Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $key = 1;
                                foreach ($user as $value): ?>
                                    <tr>
                                        <td
                                                                                                                                                                class=" align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-4 py-1">
                                                <div></div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">
                                                        <?= $key++ ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1 ml">
                                                <div>
                                                    <img src="<?= isset($value['img']) ? $value['img'] : '../view/images/avartar.jpg' ?>"
                                                                                                                                                                            class="inline-flex items-center  mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" />

                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">
                                                        <?= $value['name'] ?>
                                                    </h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">
                                                        <?= $value['email'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['address'] ?>
                                            </p>

                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['tel'] ?>
                                            </p>

                                        </td>

                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <p class="mb-0 px-4 text-xs font-semibold leading-tight">
                                                <?= $value['role'] ? 'Admin' : 'User' ?>
                                            </p>

                                        </td>
                                        <td
                                                                                                                                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <p class="mb-0 px-4 text-xs font-semibold leading-tight">
                                                <?= $value['status'] ? 'Activated' : 'Lock up' ?>
                                            </p>

                                        </td>

                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent" style="display: flex;
                                        justify-content: center;
                                        align-items: center; gap:20px;padding: 52px 0;">
                                            <form action="?act=role" method='post'>
                                                <?php $role = $value['role'] ? 0 : 1 ?>
                                                <input type="hidden" value=<?= $value['id'] ?> name='id'>
                                                <input type="hidden" value=<?= $role ?> name='role'>

                                                <button class="c-button c-button--gooey" type='submit'
                                                                                                                                                                        style='width: 120px;'>
                                                    <span>
                                                        <?= $value['role'] ? ' User' : 'Admin' ?>
                                                    </span>
                                                </button>
                                            </form>
                                            <!-- <a href="?act=xoauser&id=<?= $value['id'] ?>">
                                                <button class="noselect"
                                                                                                                                                                        onclick="return confirm('Bạn có muốn xóa tài khoản <?= $value['name'] ?>')">
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
                                            <form action="?act=updatetk" method='post'>
                                                <?php $status = $value['status'] ? 0 : 1 ?>
                                                <input type="hidden" value=<?= $value['id'] ?> name='id'>
                                                <input type="hidden" value=<?= $status ?> name='status'>
                                                <button class='update' type='submit'>


                                                    <span>
                                                        <?= $value['status'] ? ' Lock up' : 'Activated' ?>
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
<ul class="pagination d-flex justify-content-center">
    <?php
    $link = isset($_GET['search']) ? '&search=' . $_GET['search'] : '';
    ?>
    <?php if ($page > 1): ?>
        <li class="page-item">
            <a class="page-link" href="?act=user&trang=<?= $page - 1; ?><?= $link ?>">Prev</a>
        </li>
    <?php endif; ?>
    <?php if ($totalPages > 1):
        for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?act=user&trang=<?= $i; ?><?= $link ?>">
                    <?= $i; ?>
                </a>
            </li>

        <?php endfor; ?>
    <?php endif; ?>
    <?php if ($page < $totalPages): ?>
        <li class="page-item">
            <a class="page-link" href="?act=user&trang=<?= $page + 1; ?><?= $link ?>">Next</a>
        </li>
    <?php endif; ?>
</ul>