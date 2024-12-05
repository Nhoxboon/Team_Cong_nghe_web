<?php include '../header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <article>
            <h1 class="mb-4"><?php echo htmlspecialchars($news['title']); ?></h1>
            <div class="mb-3">
                <small class="text-muted">
                    Đăng ngày: <?php echo date('d/m/Y', strtotime($news['created_at'])); ?>
                    | Danh mục: <?php echo htmlspecialchars($category['name']); ?>
                </small>
            </div>
            
            <?php if ($news['image']): ?>
                <img src="/public/images/<?php echo htmlspecialchars($news['image']); ?>" 
                     class="img-fluid mb-4" alt="<?php echo htmlspecialchars($news['title']); ?>">
            <?php endif; ?>
            
            <div class="content">
                <?php echo nl2br(htmlspecialchars($news['content'])); ?>
            </div>
        </article>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h3>Tin Liên Quan</h3>
            </div>
            <div class="list-group list-group-flush">
                <?php foreach ($relatedNews as $item): ?>
                    <a href="/news/<?php echo $item['id']; ?>" 
                       class="list-group-item list-group-item-action">
                        <?php echo htmlspecialchars($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
