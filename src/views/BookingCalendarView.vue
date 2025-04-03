<script setup lang="ts">
    import { onMounted, ref } from 'vue'
    import Chart from 'chart.js/auto'
    import { RouterLink } from 'vue-router'
    const selectedItem = ref(0);
    const menuItems = ref([
        { text: "Thống kê", icon: "bi bi-bar-chart", link: "/chusan"},
        { text: "Lịch sân", icon: "bi bi-list-check", link: "/lichsan"},
        { text: "Chờ phê duyệt", icon: "bi bi-hourglass-split", link: "/pheduyet"},
        { text: "Khách hàng thân thiết", icon: "bi bi-hearts", link: "/khyeuthich"},
        { text: "Chỉnh sửa thông tin sân", icon: "bi bi-gear", link: "/suasan"}
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
                        <h3 class="m-0 fs-2 fw-bold text-start" style="color: var(--colortext1);">Lịch sân</h3>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
