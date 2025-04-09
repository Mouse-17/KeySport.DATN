<script setup lang="ts">
    import { ref, computed, onMounted } from 'vue'
    import { RouterLink, useRoute } from 'vue-router'
    import Chart from 'chart.js/auto'
    const route = useRoute()
    // Xác định đường dẫn hiện tại
    const currentPath = computed(() => route.path)
    const menuItems = [
        { name: 'Thống kê', icon: 'bi-bar-chart', path: '/chusan' },
        { name: 'Lịch sân', icon: 'bi-list-check', path: '/lichsan' },
        { name: 'Chờ phê duyệt', icon: 'bi-hourglass-split', path: '/pheduyet' },
        { name: 'Khách hàng thân thiết', icon: 'bi-hearts', path: '/khyeuthich' },
        { name: 'Cài đặt', icon: 'bi-gear', path: '/caidat' }
    ]

    const chartUser1 = ref<HTMLCanvasElement | null>(null);
    const chartUser2 = ref<HTMLCanvasElement | null>(null);
    onMounted(() => {
        const customerData = {
            new: 150, // Số khách hàng mới
            old: 100, // Số khách hàng cũ
        };

        if (chartUser1.value) {
            new Chart(chartUser1.value, {
            type: 'doughnut',
            data: {
                labels: ['Truy cập mới', 'Khách Cũ'],
                datasets: [
                {
                    data: [customerData.new, customerData.old],
                    backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(249, 87, 87, 0.7)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(249, 87, 87, 1)'],
                    borderWidth: 1,
                },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Tỷ lệ khách mới và khách cũ trong tháng',
                    font: { size: 16 },
                    color: '#2a2a2a',
                },
                },
            },
            });
        }

        const customerBooking = {
            bookingSucess: 28,
            view: 210,
        }
        if (chartUser2.value) {
            new Chart(chartUser2.value, {
            type: 'doughnut',
            data: {
                labels: ['Xem sân', 'Đã booking'],
                datasets: [
                {
                    data: [customerBooking.view, customerBooking.bookingSucess],
                    backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(249, 87, 87, 0.7)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(249, 87, 87, 1)'],
                    borderWidth: 1,
                },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Tỷ Lệ xem sân và booking trong tháng',
                    font: { size: 16 },
                    color: '#2a2a2a',
                },
                },
            },
            });
        }
    })
</script>
<template>
    <main>
        <section class="accept">
            <div class="row gx-0">
                <div class="col-2">
                    <aside class="py-5">
                        <div class="d-flex align-items-center gap-3 mb-5" style="margin-left: 12px;">
                            <div class="boss-img"><img src="../../public/img/user1.jpg" class="img-fluid" alt=""></div>
                            <div>
                                <p class="m-0 fs-4 fw-regular my-1" style="color: var(--colortext3);">Xin chào,</p>
                                <p class="m-0 fs-3 fw-semibold my-1" style="color: var(--colortext1);">Hân Trương</p>
                            </div>
                        </div>
                        <RouterLink to="/themsanmoi" class="btn-booknow my-3 mb-4" style="color: var(--white) !important;margin-left: 12px;">Thêm sân mới</RouterLink>
                        <ul class="p-0 forboss">
                            <li v-for="item in menuItems" :key="item.path">
                                <RouterLink :to="item.path" class="d-flex align-items-center gap-3 boss-item-link" 
                                :class="{ 'router-link-exact-active': currentPath === item.path }">
                                    <i :class="`bi ${item.icon} fs-4`"></i>
                                    <p class="m-0">{{ item.name }}</p>
                                </RouterLink>
                            </li>
                        </ul>

                    </aside>
                </div>
                <div class="col-10">
                    <div class="bg-white p-5" style="box-shadow: 0 0 18px var(--shadow2); height: 667px; border-radius: 20px 0 0 20px;">
                        <h3 class="px-3 m-0 fs-1 fw-bold text-start" style="color: var(--colortext1);">Khách hàng</h3>
                        <div>
                            <div class="row gx-0 justify-content-between">
                                <div class="col-3">
                                    <div class="px-3 py-3">
                                        <canvas ref="chartUser1"></canvas>
                                    </div>
                                    <div class="px-3 py-3">
                                        <canvas ref="chartUser2"></canvas>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div>
                                        <form action="">
                                            <h3 class="m-0 mb-3 fs-3 fw-bold text-start" style="color: var(--colortext1);">Khách hàng đã truy cập</h3>
                                            <div class="d-flex align-items-center gap-3">
                                                <select name="" id="" class="form-date inputBorder d-block">
                                                    <option value="">Tăng  dần theo tên</option>
                                                    <option value="">Giảm dần theo tên</option>
                                                </select>
                                                <div>
                                                    <input type="text" class="d-block inputBorder" style="width: 320px;" placeholder="Tìm kiếm">
                                                </div>
                                            </div>
                                        </form>
                                        <div>
                                            <div class="boss-text bg-white mt-3">
                                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Người dùng</p>
                                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Trạng thái</p>
                                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Truy cập</p>
                                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Danh hiệu</p>
                                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Tùy chỉnh</p>
                                            </div>
                                            <div class="booking-item-accept" style="height: 500px;">
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Đã booking</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">12 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--accent);">Thượng đế</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Chỉ xem</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">3 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--primary);">Dân thường</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Chỉ xem</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">3 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--primary);">Dân thường</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Chỉ xem</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">3 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--primary);">Dân thường</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Chỉ xem</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">3 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--primary);">Dân thường</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Đã booking</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">12 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--accent);">Thượng đế</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Chỉ xem</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">3 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--primary);">Dân thường</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="boss-text my-2">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                                    </div>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">Đã booking</p>
                                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">12 lần</p>
                                                    <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--accent);">Thượng đế</p>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="" class="d-flex justify-content-center align-items-center btn-refuse mt-0 px-4">
                                                            <i class="bi bi-trash fs-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>