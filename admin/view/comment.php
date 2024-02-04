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
                                                                                                                                                            class="3 py-3 pr-5 font-bold  uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Sao </th>

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
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                <?= $value['rating'] ?>
                                            </p>
                                        </td>
                                        <td
                                                                                                                                                                class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                                            <a href="?act=xoabl&id=<?= $value['bl_id'] ?>" class="delete-btn">
                                                <button class="noselect"
                                                                                                                                                                        onclick="return confirm('Bạn có muốn xóa sản phẩm <?= $value['product_name'] ?>')">
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

    <!-- card 2 -->


</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Bắt sự kiện click vào nút Delete
        $(".delete-btn").click(function () {
            // Lấy thông tin cần thiết từ thuộc tính data của nút
            var blId = $(this).data("id");
            var productName = $(this).data("product-name");

            // Hiển thị hộp thoại xác nhận
            if (confirm("Bạn có muốn xóa sản phẩm " + productName + "?")) {
                // Gửi yêu cầu AJAX để xóa
                $.ajax({
                    url: "?act=xoabl&id=" + blId,
                    method: "GET",
                    success: function (response) {
                        // Xử lý phản hồi nếu cần
                        console.log(response);

                        // Nếu muốn thực hiện bất kỳ hành động nào khác sau khi xóa, bạn có thể thực hiện ở đây
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi nếu cần
                        console.error(error);
                    }
                });
            }
        });
    });
</script> -->