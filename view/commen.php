<div class="container m-t-100">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <form class="w-full " method="post" id=<?php echo isset($_SESSION['users']) ? 'reviewForm' : ''; ?>>
            <h5 class="mtext-108 cl2 p-b-7">
                Thêm một bài đánh giá

            </h5>
            <input type="hidden" value='<?= $_GET['idbl'] ?>' name='idpro'>

            <input type="hidden" value='<?= $_SESSION['users']['id'] ?>' name="iduser">
            <input type="hidden" value='1' name='id'>
            <div class="flex-w flex-m p-t-20 p-b-23">
                <span class="stext-102 cl3 m-r-16">
                    Đánh giá của bạn
                </span>

                <span class="wrap-rating fs-18 cl11 pointer">
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                    <input class="dis-none" type="number" name="rating">

                </span>
            </div>

            <div class="row p-b-25">
                <div class="col-12 p-b-5">
                    <label class="stext-102 cl3" for="review">Đánh giá của bạn</label>
                    <textarea class=" bor8 stext-102 cl2 p-lr-20 p-tb-10 how-shadow1" id="review" style='width: 95%;min-height: 100px'
                                                                                                                                            name="noidung"></textarea>
                </div>

            </div>
            <input type="hidden" name='is_comment' value='1'>
            <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                Submit
            </button>

        </form>
    </div>
</div>