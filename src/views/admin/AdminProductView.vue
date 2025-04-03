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
                                    <h5>Sản Phẩm</h5>
                                    <p class="text-muted">Xem và tìm kiếm sản phẩm</p>
                                </div>
                                <RouterLink class="btn-add-new-admin" to="/admin/themsanpham"><i class="bi bi-plus-lg"></i>Thêm sản phẩm</RouterLink>
                            </div>

                            <div class="sanpham-thongso">
                                <span><a href="#">Tất cả</a>(100) |</span>
                                <span><a href="#">Đã đăng</a>(80) |</span>
                                <span><a href="#"> Bản nháp</a>(20) |</span>
                                <span><a href="#">Lọc sản phẩm</a></span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <select class="form-select select-admin-search">
                                        <option>Tác vụ</option>
                                    </select>
                                    <button class="btn-apdung">Áp dụng</button>
                                    <select class="form-select select-admin-search">
                                        <option>Tất cả các ngày</option>
                                    </select>
                                    <select class="form-select select-admin-search">
                                        <option>Chọn danh mục</option>
                                    </select>
                                    <select class="form-select select-admin-search">
                                        <option>Toàn bộ sản phẩm</option>
                                    </select>
                                </div>
                            </div>                

                            <table class="table table-bordered table-hover mt-3">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="input-head"><input type="checkbox"></th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="admin-sanpham">
                                    <tr>
                                        <td class="input-head"><input type="checkbox"></td>
                                        <td><img src="../../../public/img/p1.png" alt="">Áo</td>
                                        <td>244.000đ</td>
                                        <td>Đang bán</td>
                                        <td>
                                            <i class="bi bi-eye me-2"></i>
                                            <i class="bi bi-pencil-square me-2"></i>
                                            <i class="bi bi-trash"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="input-head"><input type="checkbox"></td>
                                        <td><img src="../../../public/img/p1.png" alt="">Áo</td>
                                        <td>244.000đ</td>
                                        <td>Đang bán</td>
                                        <td>
                                            <i class="bi bi-eye me-2"></i>
                                            <i class="bi bi-pencil-square me-2"></i>
                                            <i class="bi bi-trash"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="input-head"><input type="checkbox"></td>
                                        <td><img src="../../../public/img/p1.png" alt="">Áo</td>
                                        <td>244.000đ</td>
                                        <td>Đang bán</td>
                                        <td>
                                            <i class="bi bi-eye me-2"></i>
                                            <i class="bi bi-pencil-square me-2"></i>
                                            <i class="bi bi-trash"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="input-head"><input type="checkbox"></td>
                                        <td><img src="../../../public/img/p1.png" alt="">Áo</td>
                                        <td>244.000đ</td>
                                        <td>Đang bán</td>
                                        <td>
                                            <i class="bi bi-eye me-2"></i>
                                            <i class="bi bi-pencil-square me-2"></i>
                                            <i class="bi bi-trash"></i>
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
        </section>
    </main>
</template>
