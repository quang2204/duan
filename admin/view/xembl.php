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
                                                                                                                                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border foots">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent " style="    display: flex;
    align-items: center;
    justify-content: space-between;">
                    <h6>Comment</h6>


                </div>
                <div class="flex-auto px-0 pt-0 ">
                    <div class="p-0 overflow-x-auto">
                        <?php foreach ($bls as $key => $value): ?>
                            <div class="mt-6 px-6 d-flex ">
                                <div class="pr-6 ">
                                    <img src="<?= $value['user_img'] ? $value['user_img'] : '../view/images/avartar.jpg' ?> " style="max-width: 60px;" alt="AVATAR"
                                                                                                                                                            class='rounded-circle'>
                                </div>

                                <div class="">
                                    <div class="mb-2">
                                        <span class="text-lg pr-6">
                                            <?= $value['user_name'] ?>
                                        </span>

                                        <span class="">
                                            <?php for ($i = 0; $i < $value['rating']; $i++) {
                                                echo '⭐';
                                            } ?>
                                        </span>
                                    </div>

                                    <p class="mb-0">
                                        <?= $value['comment_content'] ?>

                                    </p>
                                    <p>
                                        <?= $value['ngaybinhluan'] ?>
                                    </p>

                                </div>
                                <a href="?act=xoabl&id=<?= $value['bl_id'] ?>&idpro=<?= $value['product_id'] ?>" class='ml-auto'>
                                    <button class="noselect" onclick="return confirm('Bạn có muốn xóa bình luận này')">
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>