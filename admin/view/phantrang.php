<ul class="pagination d-flex justify-content-center">
  <?php if ($currentPage > 1): ?>
    <li class="page-item">
      <a class="page-link" href="?trang=<?= $currentPage - 1; ?>">Prev</a>
    </li>
  <?php endif; ?>
  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
      <a class="page-link" href="?trang=<?= $i; ?>">
        <?= $i; ?>
      </a>
    </li>
  <?php endfor; ?>
  <?php if ($currentPage < $totalPages): ?>
    <li class="page-item">
      <a class="page-link" href="?trang=<?= $currentPage + 1; ?>">Next</a>
    </li>
  <?php endif; ?>
</ul>