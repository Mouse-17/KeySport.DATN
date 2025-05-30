<script setup lang="ts">
    import { RouterLink } from 'vue-router'
    import { onMounted, ref } from 'vue'
    import Chart from 'chart.js/auto'

    const selectedItem = ref(0);
    const menuItems = ref([
        { text: "Thống kê", icon: "bi bi-bar-chart", link: "/chusan"},
        { text: "Lịch sân", icon: "bi bi-list-check", link: "/lichsan"},
        { text: "Chờ phê duyệt", icon: "bi bi-hourglass-split", link: "/pheduyet"},
        { text: "Khách hàng thân thiết", icon: "bi bi-hearts", link: "/khyeuthich"},
        { text: "Cài đặt", icon: "bi bi-gear", link: "/caidat"}
    ]);

    // biểu đồ doanh thu
    const revenueCanvas = ref<HTMLCanvasElement | null>(null);
    const BookingByDayCanvas = ref<HTMLCanvasElement | null>(null);
    const viewByTimeCanvas = ref<HTMLCanvasElement | null>(null);
    const pieViewCanvas = ref<HTMLCanvasElement | null>(null);
    const customerCanvas = ref<HTMLCanvasElement | null>(null);
    onMounted(() => {
        // Biểu đồ 1
        const dailyRevenue = [1000, 1200, 900, 1500, 1300, 1600, 1700, 1800, 2000,2700, 2800, 2900, 3000, 3200, 4100, 4200, 4300, 4400, 4300, 3300, 3400, 3500, 3600, 3700, 3800, 3600, 3500, 2200, 2500, 2400];
        if (revenueCanvas.value) {
            new Chart(revenueCanvas.value, {
                type: 'bar', // Biểu đồ cột
                data: {
                    labels: Array.from({ length: 30 }, (_, i) => `Ngày ${i + 1}`),
                        datasets: [{
                        label: 'Doanh thu (triệu VND)',
                        data: dailyRevenue,
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderColor: 'rgba(0, 123, 255, 0.5)',
                        borderWidth: 1,
                        // barThickness: 30 
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { 
                            display: true, 
                            text: 'Biểu đồ doanh thu trong tháng',
                            font: { size: 16 },
                            color: '#2a2a2a'
                        }
                    },
                    
                }
            })
        }

        // Biểu đồ 2
        const morningBookings = [30, 25, 40, 35, 50, 45, 60]; 
        const afternoonBookings = [45, 40, 55, 60, 65, 70, 80];
        const eveningBookings = [75, 80, 65, 70, 85, 80, 90];
        const days = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'];
        if (BookingByDayCanvas.value) {
            new Chart(BookingByDayCanvas.value, {
            type: 'bar', // Biểu đồ cột
            data: {
                labels: days, // Các ngày trong tuần
                datasets: [
                    {
                        label: 'Sáng (6h - 12h)',
                        data: morningBookings, 
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderWidth: 1,
                        barThickness: 24,
                    },
                    {
                        label: 'Chiều (12h - 16h)',
                        data: afternoonBookings, 
                        backgroundColor: 'rgba(202, 155, 39, 0.7)',
                        borderWidth: 1,
                        barThickness: 24,
                    },
                    {
                        label: 'Tối 16h - 23h',
                        data: eveningBookings, 
                        backgroundColor: 'rgba(249, 87, 87, 0.7)',
                        borderWidth: 1,
                        barThickness: 24,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top', 
                },
                title: {
                    display: true,
                    text: 'Tổng lượt đặt sân sáng, chiều và tối trong một tuần',
                    font: {
                    size: 16,
                    },
                    color: '#2a2a2a',
                },
                },
                scales: {
                x: {
                
                    title: {
                    display: true,
                    text: 'Ngày trong tuần',
                    },
                },
                y: {
                    // Trục Y: Số lượt đặt
                    title: {
                    display: true,
                    text: 'Số lượt đặt',
                    },
                    beginAtZero: true, // Bắt đầu trục Y từ 0
                },
                },
            },
            });
        }

        // Biểu đồ 3
        let viewsArr = [24, 29, 20, 15, 25, 28, 35, 30, 35, 30, 45, 50, 65, 70, 75, 80, 90, 100, 101, 102, 103, 104, 105, 81];
        const viewTimeArr =[
                '00:00', '01:00', '02:00', '03:00', '04:00', '05:00', 
                '06:00', '07:00', '08:00', '09:00', '10:00', '11:00',
                '12:00', '13:00', '14:00', '15:00', '16:00', '17:00',
                '18:00', '19:00', '20:00', '21:00', '22:00', '23:00' 
            ];
        if (viewByTimeCanvas.value) {
            new Chart(viewByTimeCanvas.value, {
                type: 'bar',
                data: {
                    labels: viewTimeArr,
                    datasets: [
                        {
                            label: 'Số lượt xem sân',
                            data: viewsArr,
                            backgroundColor: 'rgba(75, 192, 192, 0.3)',
                            borderColor: 'rgba(75, 192, 192, 0.7)',
                            borderWidth: 1,
                            barThickness: 24,
                        },
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { 
                            display: true, 
                            text: 'Lượt xem sân theo giờ',
                            font: { size: 16 },
                            color: '#2a2a2a'
                        }
                    },
                }
            });
        }

        // Biểu đồ 4
        const highestValue = Math.max(...viewsArr);
        const lowestValue = Math.min(...viewsArr);
        const highestLabel = viewTimeArr[viewsArr.indexOf(highestValue)];
        const lowestLabel = viewTimeArr[viewsArr.indexOf(lowestValue)]; 

        if (pieViewCanvas.value) {
            new Chart(pieViewCanvas.value, {
                type: 'pie',
                data: {
                    labels: [`Cao nhất: ${highestLabel}`, `Thấp nhất: ${lowestLabel}`],
                    datasets: [{
                        data: [highestValue, lowestValue],
                        backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(249, 87, 87, 0.7)'],
                        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(249, 87, 87, 1)'],
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: {
                            display: true,
                            text: 'Khung Giờ Có Lượt Đặt Cao Nhất và Thấp Nhất',
                            font: { size: 14 },
                            color: '#2a2a2a'
                        }
                    }
                }
            });
        }

        // Biểu đồ 5
        const customerData = {
            new: 150, // Số khách hàng mới
            old: 100, // Số khách hàng cũ
        };

        if (customerCanvas.value) {
            new Chart(customerCanvas.value, {
            type: 'doughnut',
            data: {
                labels: ['Khách Hàng Mới', 'Khách Hàng Cũ'],
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
                    text: 'Tỷ Lệ Khách Hàng Mới vs Khách Hàng Cũ',
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
                            <div class="boss-img"><img src="../../../public/img/user.webp" class="img-fluid" alt=""></div>
                            <div>
                                <p class="m-0 fs-4 fw-regular my-1" style="color: var(--colortext3);">Xin chào,</p>
                                <p class="m-0 fs-3 fw-semibold my-1" style="color: var(--colortext1);">Shin</p>
                            </div>
                        </div>
                        <RouterLink to="/themsanmoi" @click="selectedItem = -1" class="btn-booknow my-3 mb-4" style="color: var(--white) !important; margin-left: 12px;">Thêm sân mới</RouterLink>
                        <ul class="p-0">
                            <li v-for="(item, index) in menuItems" :key="index">
                                <RouterLink :to="item.link" 
                                class="d-flex align-items-center gap-3 boss-item-link"
                                :class="{ 'boss-link-active': selectedItem === index }"
                                @click="selectedItem = index">
                                    <i :class="item.icon + ' fs-4'"></i>
                                    <p class="m-0">{{ item.text }}</p>
                                </RouterLink>
                            </li>
                        </ul>
                        
                    </aside>
                </div>
                <div class="col-10">
                    <div class="bg-white p-5" style="box-shadow: 0 0 18px var(--shadow2); height: 667px; border-radius: 20px 0 0 20px;">
                        <h3 class="m-0 fs-2 fw-bold text-start" style="color: var(--colortext1);">Thống kê</h3>
                        <div class="analytics-box">
                            <div class="row gx-0">
                                <div class="col-8">
                                    <div class="py-4 pe-4">
                                        <canvas ref="BookingByDayCanvas"></canvas>
                                    </div>
                                    <div class="py-4 pe-4">
                                        <canvas ref="viewByTimeCanvas"></canvas>
                                    </div>
                                    <!-- <div class="py-4 pe-4">
                                        <canvas ref="revenueLineCanvas"></canvas>
                                    </div> -->
                                </div>
                                <div class="col-4">
                                    <div class="p-5 ms-5" style="box-shadow: 0 0 28px var(--shadow2); border-radius: 12px;">
                                        <canvas ref="customerCanvas"></canvas>
                                    </div>
                                    <div class="p-5 ms-5" style="margin-top: 60px;box-shadow: 0 0 28px var(--shadow2); border-radius: 12px;">
                                        <canvas ref="pieViewCanvas"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="pe-4 mt-5">
                                <canvas ref="revenueCanvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
