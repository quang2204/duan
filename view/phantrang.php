<div class="flex-c-m flex-w w-full p-t-38">
    <?php if ($currentPage > 1): ?>
        <div class="flex-c-m how-pagination1 trans-04 m-all-7 justify-content-center">
            <a href="?act=product&trang=<?= $currentPage - 1; ?>"><i class=" fa fa-arrow-left clblack fs-22"></i></a>
        </div>


    <?php endif; ?>
    <?php if ($totalPages > 1): ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?act=product&trang=<?= $i; ?>"
                                                                                                                                    class="flex-c-m how-pagination1 trans-04 m-all-7 <?= $i == $currentPage ? 'active-pagination1' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    <?php endif; ?>


    <?php if ($currentPage < $totalPages): ?>
        <li class="page-item">
            <a class="page-link" href="?trang=<?= $currentPage + 1; ?>">Next</a>
        </li>
    <?php endif; ?>
</div>