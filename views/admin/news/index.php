<?php include '../../header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Quản Lý Tin Tức</h2>
    <a href="/admin/news/add" class="btn btn-primary">Thêm Tin Tức Mới</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Danh Mục</th>
                        <th>Ngày Tạo</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($news as $item): ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td><?php echo htmlspecialchars($item['category_name']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($item['created_at'])); ?></td>
                            <td>
                                <a href="/admin/news/edit/<?php echo $item['id']; ?>" 
                                   class="btn btn-sm btn-warning">Sửa</a>
                                <a href="/admin/news/delete/<?php echo $item['id']; ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Bạn có chắc muốn xóa tin này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../../footer.php'; ?>
