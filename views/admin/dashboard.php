<?php include '../header.php'; ?>

<div class="row">
    <div class="col-md-12 mb-4">
        <h2>Bảng Điều Khiển</h2>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Tổng Số Tin Tức</h5>
                <p class="card-text display-4"><?php echo $totalNews; ?></p>
                <a href="/admin/news" class="btn btn-light">Quản Lý Tin Tức</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Tổng Số Danh Mục</h5>
                <p class="card-text display-4"><?php echo $totalCategories; ?></p>
                <a href="/admin/categories" class="btn btn-light">Quản Lý Danh Mục</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Tổng Số Người Dùng</h5>
                <p class="card-text display-4"><?php echo $totalUsers; ?></p>
                <a href="/admin/users" class="btn btn-light">Quản Lý Người Dùng</a>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
