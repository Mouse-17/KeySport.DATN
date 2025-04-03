<script setup lang="ts">
    import { ref } from 'vue'
    import { RouterLink } from 'vue-router'
    const selectedItem = ref(0);
    const menuItems = ref([
        { text: "Thống kê", icon: "bi bi-bar-chart", link: "/chusan"},
        { text: "Lịch sân", icon: "bi bi-list-check", link: "/lichsan"},
        { text: "Chờ phê duyệt", icon: "bi bi-hourglass-split", link: "/pheduyet"},
        { text: "Khách hàng thân thiết", icon: "bi bi-hearts", link: "/khyeuthich"},
        { text: "Cài đặt", icon: "bi bi-gear", link: "/caidat"}
    ]);
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
                        <h3 class="m-0 fs-2 fw-bold text-start" style="color: var(--colortext1);">Chờ phê duyệt</h3>
                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="boss-nav-link nav-link boss-link-active" href="#">Chưa xử lí</a>
                                </li>
                                <li class="nav-item">
                                    <a class="boss-nav-link nav-link" href="#">Đã nhận đơn</a>
                                </li>
                                <li class="nav-item">
                                    <a class="boss-nav-link nav-link" href="#">Đã từ chối</a>
                                </li>
                            </ul>
                            <form action="" style="width: 30%;">
                                <input type="text" class="form-date d-block w-100" placeholder="Tìm kiếm">
                            </form>
                        </div>
                        <div>
                            <div class="boss-text bg-white mt-5">
                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Người dùng</p>
                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Số điện thoại</p>
                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Ngày đặt</p>
                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Khung giờ</p>
                                <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Tùy chỉnh</p>
                            </div>
                            <div class="booking-item-accept">
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
                                    </div>
                                </div>
                                <div class="boss-text my-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="boss-img"><img src="../../public/img/user1.jpg" alt=""></div>
                                        <p class="fs-4 text-start m-0 fw-semibold" style="color: var(--colortext1);">Hân Trương</p>
                                    </div>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">0708903123</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">10/4/2025</p>
                                    <p class="fs-4 text-start m-0" style="color: var(--colortext1);">6:00 - 8:00 AM</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn-booknow mt-0 px-3" style="width: 80px;">Nhận đơn</button>
                                        <button class="btn-refuse mt-0 px-3" style="width: 80px;">Từ chối</button>
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