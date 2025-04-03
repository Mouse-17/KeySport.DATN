<template>
    <main>
        <section class="admin">
            <div class="container">
                <div class="row gx-0">
                    <!-- Bên trái -->
                    <div class="col-12 col-lg-3 col-md-6 p-0 mt-2 admin-left">
                        <img src="../../../public/img/user1.jpg" alt="" class="admin-avatar">
                        <h5>Admin</h5>
                        <RouterLink to="/admin" class=""><i class="bi bi-palette2"></i>Bảng điều khiển</RouterLink>
                        <RouterLink to="/admin/quanlidanhmuc"><i class="bi bi-inboxes-fill"></i>Quản lý danh mục</RouterLink>
                        <RouterLink to="/admin/quanlisanpham"><i class="bi bi-box2-fill"></i>Quản lý sản phẩm</RouterLink>
                        <RouterLink to="/admin/quanlinguoidung"><i class="bi bi-people-fill"></i>Quản lý người dùng</RouterLink>
                        <RouterLink to="/admin/quanlidonhang"><i class="bi bi-receipt-cutoff"></i>Quản lý đơn hàng</RouterLink>
                        <RouterLink to="/admin/quanlibinhluan"><i class="bi bi-chat-fill"></i>Quản lý bình luận</RouterLink>
                        <RouterLink to="/admin/quanlibaiviet"><i class="bi bi-book-fill"></i>Quản lý bài viết</RouterLink>
                        <RouterLink to="/admin/quanlidanhgia"><i class="bi bi-star-fill"></i>Quản lý đánh giá</RouterLink>
                        <div class="tienichadmin-left">
                            <a href="#"><i class="bi bi-gear"></i>CÀI ĐẶT</a>
                            <a href="#"><i class="bi bi-question-circle"></i>TRỢ GIÚP</a>
                            <a href="#"><i class="bi bi-info-circle"></i>THOÁT</a>
                        </div>
                    </div>

                    <!-- Bên phải -->
                    <div class="col-lg-9 admin-right">
                        <div>
                            <div class="header-container">
                                <div class="title-section">
                                    <h5>Danh sách đơn hàng</h5>
                                    <p class="text-muted">Xem và tìm kiếm đơn hàng</p>
                                </div>
                            </div>                    
                            <div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Tất cả đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Chưa thanh toán</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Xử lý đơn hàng</a>
                                    </li>
                                </ul>

                                <div class="d-flex justify-content-between align-items-center mt-3 filter-search-container">
                                    <button class="btn btn-lg btn-light">
                                        <i class="bi bi-plus-lg"></i> Thêm điều kiện lọc
                                    </button>
                                    <div class="input-group search-box">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm">
                                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    </div>
                                </div>

                                <table class="table table-bordered table-hover mt-3">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="input-head"><input type="checkbox"></th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày tạo</th>
                                            <th>Khách hàng</th>
                                            <th>Hoạt động</th>
                                            <th>Tiền tổng</th>
                                            <th>Tiến độ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="undone">
                                            <td class="input-head"><input type="checkbox"></td>
                                            <td>#M0909</td>
                                            <td>10/9/2024</td>
                                            <td>Nga</td>
                                            <td>Đã vận chuyển</td>
                                            <td>500000đ</td>
                                            <td>
                                                Đã hoàn thành
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  class="input-head"><input type="checkbox"></td>
                                            <td>#M0989</td>
                                            <td>10/9/2024</td>
                                            <td>Minh</td>
                                            <td>Đang vận chuyển</td>
                                            <td>850000đ</td>
                                            <td>
                                                Đã hoàn thành
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  class="input-head"><input type="checkbox"></td>
                                            <td>#M0979</td>
                                            <td>10/9/2024</td>
                                            <td>Minh</td>
                                            <td>Chưa vận chuyển</td>
                                            <td>700000đ</td>
                                            <td>
                                            Chưa hoàn thành
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  class="input-head"><input type="checkbox"></td>
                                            <td>#M0910</td>
                                            <td>10/9/2024</td>
                                            <td>Minh</td>
                                            <td>CĐang vận chuyển</td>
                                            <td>1200000đ</td>
                                            <td>
                                                Đã hoàn thành
                                            </td>
                                        </tr>
                                        <!-- Thêm các dòng khác nếu cần -->
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span>Cài đặt</span>
                                    <nav class="pagination-container">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
