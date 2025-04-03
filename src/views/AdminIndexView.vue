<template>
    <main>
        <section class="admin">
            <div class="container">
                <div class="row gx-0">
                    <!-- Bên trái -->
                    <div class="col-12 col-lg-3 col-md-6 p-0 mt-2 admin-left">
                        <div>
                            <img src="../../public/img/user1.jpg" alt="" class="admin-avatar">
                            <h5>Admin</h5>
                            <a to="/" class="click-admin"><i class="bi bi-palette2"></i>Bảng điều khiển</a>
                            <a to="/quanlidanhmuc"><i class="bi bi-inboxes-fill"></i>Quản lý danh mục</a>
                            <a to="/quanlisanpham"><i class="bi bi-box2-fill"></i>Quản lý sản phẩm</a>
                            <a to="/quanlinguoidung"><i class="bi bi-people-fill"></i>Quản lý người dùng</a>
                            <a to="/quanlichusan"><i class="bi bi-person-vcard"></i>Quản lý chủ sân</a>
                            <a to="/quanlidonhang"><i class="bi bi-receipt-cutoff"></i>Quản lý đơn hàng</a>
                            <a to="/quanlibinhluan"><i class="bi bi-chat-fill"></i>Quản lý bình luận</a>
                            <a to="/quanlibaiviet"><i class="bi bi-book-fill"></i>Quản lý bài viết</a>
                            <div class="tienichadmin-left">
                                <a href="#"><i class="bi bi-gear"></i>CÀI ĐẶT</a>
                                <a href="#"><i class="bi bi-question-circle"></i>TRỢ GIÚP</a>
                                <a href="#"><i class="bi bi-info-circle"></i>THOÁT</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 admin-right">
                        <div>
                            <RouterView />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
