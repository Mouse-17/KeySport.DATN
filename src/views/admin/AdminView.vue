<script setup lang="ts">
    import { RouterLink } from 'vue-router'
    import { onMounted, ref } from 'vue'
    import Chart from 'chart.js/auto'

    // Tham chiếu tới canvas
    const chart1 = ref<HTMLCanvasElement | null>(null);
    const chart2 = ref<HTMLCanvasElement | null>(null);

    onMounted(() => {
    // Biểu đồ cột cho chart1
    if (chart1.value) {
        new Chart(chart1.value, {
        type: 'bar',
        data: {
            labels: ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'],
            datasets: [{
            label: 'Sản phẩm',
            data: [10, 20, 15, 25, 18, 22, 17],
            backgroundColor: '#0095FF'
            }, {
            label: 'Mua hàng',
            data: [8, 18, 12, 22, 14, 20, 15],
            backgroundColor: '#00E096'
            }]
        }
        });
    }

    // Biểu đồ line cho chart2
    if (chart2.value) {
        new Chart(chart2.value, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
            label: 'Tháng trước',
            data: [3000, 3200, 3100, 3004],
            borderColor: '#0095FF',
            fill: false
            }, {
            label: 'Tháng này',
            data: [4000, 4500, 4200, 4504],
            borderColor: '#00E096',
            fill: false
            }]
        }
        });
    }
    });
</script>

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

                    <div class="col-lg-9 admin-right">
                        <div class="header-container">
                            <div class="title-section">
                                <h5>Bảng điều khiển</h5>
                                <p class="text-muted">Khuyến mãi mỗi ngày</p>
                            </div>
                            <button class="btn-xuat-admin"><i class="bi bi-upload"></i>Xuất</button>
                        </div>

                        <div class="row g-4" style="margin-top: 5px;">
                            <div class="col">
                                <div class="card bg-red-admin">
                                    <div><i class="bi bi-graph-up-arrow"></i></div>
                                    <h5>$1k</h5>
                                    <p>Tổng chủ sản</p>
                                    <small>+8% từ hôm qua</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-orange-admin">
                                    <div><i class="bi bi-receipt"></i></div>
                                    <h5>300</h5>
                                    <p>Tổng đơn hàng</p>
                                    <small>+5% từ hôm qua</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-green-admin">
                                    <div><i class="bi bi-tag-fill"></i></div>
                                    <h5>75</h5>
                                    <p>Đã bán</p>
                                    <small>+12% từ hôm qua</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-purple-admin">
                                    <div><i class="bi bi-person-fill-add"></i></div>
                                    <h5>16</h5>
                                    <p>Khách hàng mới</p>
                                    <small>0.5% từ hôm qua</small>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-0">
                            <div class="col-6">
                                <div class="product-card-admin ms-0">
                                    <h5 class="fw-bold">Tổng kết ngày</h5>
                                    <canvas ref="chart1" id="chart1"></canvas>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card-admin me-0">
                                    <h5 class="fw-bold">Sự hài lòng của khách hàng</h5>
                                    <div class="char2-hailong">
                                        <canvas ref="chart2" id="chart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-0">
                            <div class="col-6">
                                <div class="product-card-admin ms-0">
                                    <h5 class="fw-bold">Sản phẩm nổi bật</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Đánh giá</th>
                                                <th>In</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Vợt cầu lông</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar-blue" style="width: 45%;"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge-blue">45%</span></td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>Giày pickleball</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar-green" style="width: 29%;"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge-green">29%</span></td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>Bộ gậy golf Homa</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar-purple" style="width: 18%;"></div>
                                                    </div>
                                                </td>
                                                <td><span class="badge-purple">18%</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="product-card-admin">
                                    <h5 class="fw-bold">Vị trí hoạt động</h5>
                                    <img style="height: 200px; object-fit: cover;" src="../../../public/img/map.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
