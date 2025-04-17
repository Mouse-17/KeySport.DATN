<script setup lang="ts">
    import { onMounted, ref } from 'vue';
    import { useRoute } from 'vue-router';
    import type { Yard } from '../stores/yard';

    const route = useRoute();
    const yard_store = ref<Yard | null>(null);
    const popular_yards = ref<Yard[]>([]);
    const quantity = ref(1);
    const activeTab = ref('description'); // 'description' or 'reviews'
    const handleTabClick = (tab: string) => {
        activeTab.value = tab;
    };

    const fetchYard = async () => {
        try {
            const response = await fetch(`http://localhost:8000/api/san/${route.params.id}`);
            const data = await response.json();
            if (data.status === 'success') {
                yard_store.value = data.data;
                console.log('Sân:', yard_store.value);
            }
        } catch (error) {
            console.error('Lỗi khi tải sân:', error);
        }
    };

    const fetchPopularYards = async () => {
        try {
            const response = await fetch('http://localhost:8000/api/san-pho-bien');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const datas = await response.json();
            if (datas.status == 'success') {
                popular_yards.value = datas.data;
                console.log('Sân phổ biến:', popular_yards.value);
            }
        } catch (error) {
            console.error('Lỗi khi tải sân phổ biến:', error);
        }
    };

    onMounted(() => {
        fetchYard();
        fetchPopularYards();
    });
</script>

<template>
    <main v-if="yard_store">
        <section class="booking-detail">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-12 col-lg-6 p-0">
                        <div class="px-lg-2 px-3">
                            <div>
                                <img :src="'/public/img/san/' + yard_store.Hinh_anh" :alt="yard_store.Ten_san" class="rounded-4">
                            </div>
                            <div class="d-flex align-items-center gap-2 mt-2 overflow-hidden" style="width: 100%;">
                                <div class="custom-thumnail__box">
                                    <img :src="'/public/img/san/' + yard_store.Hinh_anh" :alt="yard_store.Ten_san" class="img-fluid">
                                </div>
                                <div class="custom-thumnail__box">
                                    <img :src="'/public/img/san/' + yard_store.Hinh_anh" :alt="yard_store.Ten_san" class="img-fluid">
                                </div>
                                <div class="custom-thumnail__box">
                                    <img :src="'/public/img/san/' + yard_store.Hinh_anh" :alt="yard_store.Ten_san" class="img-fluid">
                                </div>
                                <div class="custom-thumnail__box">
                                    <img :src="'/public/img/san/' + yard_store.Hinh_anh" :alt="yard_store.Ten_san" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-0">
                        <div class="padding-custom ps-lg-5">
                            <a href="#" class="category-bkdetail__link mt-2">SÂN CẦU LÔNG</a>
                            <h1 class="title-section my-1" style="text-transform: none;">{{ yard_store.Ten_san }}</h1>
                            <div class="d-flex align-items-center gap-2 mt-2 mb-4">
                                <i class="bi bi-star-fill color-star"></i>
                                <p class="m-0 me-1 fs-3 fw-bold" style="color: var(--colortext1);">5.0</p>
                                <i class="bi bi-dot fs-2" style="color: var(--colortext2);"></i>
                                <p class="m-0 fs-4 fw-regular fst-italic" style="color: var(--colortext3);">Đánh giá (12)</p>
                            </div>
                            <div class="d-flex align-items-center gap-4 my-2">
                                <i class="bi bi-aspect-ratio fs-3 text-success"></i>
                                <p class="m-0 fs-4 fw-regular" style="color: var(--colortext2);">
                                    Quy mô: 
                                    <span class="fs-4 fw-regular" style="color: var(--colortext1); line-height: 2.2rem;">{{ yard_store.So_luong }} sân</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-4 my-2">
                                <i class="bi bi-door-open fs-3 text-success"></i>
                                <p class="m-0 fs-4 fw-regular" style="color: var(--colortext2);">
                                    Mở cửa: 
                                    <span class="fs-4 fw-regular" style="color: var(--colortext1); line-height: 2.2rem;">{{ yard_store.Trang_thai === 1 ? 'Đang mở cửa' : 'Đóng cửa' }}</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-4 my-2">
                                <i class="bi bi-geo-alt fs-3 text-success"></i>
                                <p class="m-0 fs-4 fw-regular" style="color: var(--colortext2);">
                                    Địa chỉ: 
                                    <span class="fs-4 fw-regular" style="color: var(--colortext1); line-height: 2.2rem;">
                                        {{ yard_store.Dia_chi }}
                                    </span>
                                </p>
                            </div>
                            <hr class="my-4" style="color: var(--colortext3);">
                            <div class="d-flex align-items-center gap-2">
                                <div class="">
                                    <label class="bk-detail__label" for="form-date">Ngày chơi</label>
                                    <input class="form-control form-date" type="date" name="" id="form-date">
                                </div>
                                <div>
                                    <label class="bk-detail__label" for="form-timestart">Giờ bắt đầu</label>
                                    <input type="time" class="form-control form-date" name="" id="" placeholder="Giờ bắt đầu" value="06:00:00">
                                </div>
                                <div>
                                    <label class="bk-detail__label" for="form-timestart">Giờ kết thúc</label>
                                    <input type="time" class="form-control form-date" name="" id="" placeholder="Giờ bắt đầu" value="08:00:00">
                                </div>
                            </div>
                            <div class="mt-4 d-flex align-items-center gap-3">
                                <i class="bi bi-tags fs-2 text-success"></i>
                                <p class="m-0 fs-2 fw-bold" style="color: var(--colortext1);">Giá</p>
                            </div>
                            <div class="ps-5 pt-2 mb-5">
                                <div class="d-flex align-items-center gap-5 my-3">
                                    <span class="fs-4 fw-regular" style="color: var(--colortext1);">06:00 - 16:00</span>
                                    <span class="fs-3 fw-bold" style="color: var(--accent);">70.000đ</span>
                                </div> 
                                <div class="d-flex align-items-center gap-5 my-3">
                                    <span class="fs-4 fw-regular" style="color: var(--colortext1);">16:00 - 00:00</span>
                                    <span class="fs-3 fw-bold" style="color: var(--accent);">170.000đ</span>
                                </div> 
                                <div class="d-flex align-items-center gap-5 my-3">
                                    <span class="fs-4 fw-regular" style="color: var(--colortext1);">00:00 - 06:00</span>
                                    <span class="fs-3 fw-bold" style="color: var(--accent);">190.000đ</span>
                                </div> 
                            </div>
                            <div class="d-block btn-find" style="width: 32%; padding: 15px 0 17px 0;">Đặt ngay</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="information-detail">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-12 col-lg-7 p-lg-0">
                        <div class="padding-custom">
                            <h2 class="fs-1 text-start my-3">Thông tin chi tiết</h2>
                            <div>
                                <h3 class="fs-3 fw-semibold text-start">1. Giới thiệu {{ yard_store.Ten_san }}</h3>
                                <ul class="mt-3">
                                    <li style="color: var(--colortext2); font-size: 1.5rem; line-height: 2.4rem; text-align: justify;">
                                        {{ yard_store.Mo_ta }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 p-lg-0">
                        <div class="bkdt__box-rating m-lg-5 m-2 me-lg-0 p-5">
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <h1 class="m-0 fs-1 fw-semibold">5.0</h1>
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-star-fill fs-4 color-star"></i>
                                        <i class="bi bi-star-fill fs-4 color-star"></i>
                                        <i class="bi bi-star-fill fs-4 color-star"></i>
                                        <i class="bi bi-star-fill fs-4 color-star"></i>
                                        <i class="bi bi-star-fill fs-4 color-star"></i>
                                    </div>
                                    <p class="fs-5 fst-italic m-0 text-end" style="color: var(--colortext3);">
                                        10 đánh giá
                                    </p>
                                </div>
                            </div>
                            <hr style="color: var(--colortext3);">
                            <div class="d-flex align-items-center justify-content-between my-1">
                                <h3 style="width:3%;">5</h3>
                                <i class="bi bi-star-fill fs-4 color-star"></i>
                                <div class="bkdt__percent-rating">
                                    <div class="bkdt__percent-rating-child percent100"></div>
                                </div>
                                <p class="fs-5 fst-italic m-0 text-end" style="color: var(--colortext3); width: 76px;">
                                    10 đánh giá
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between my-1">
                                <h3 style="width:3%;">4</h3>
                                <i class="bi bi-star-fill fs-4 color-star"></i>
                                <div class="bkdt__percent-rating">
                                    <div class="bkdt__percent-rating-child"></div>
                                </div>
                                <p class="fs-5 fst-italic m-0 text-end" style="color: var(--colortext3); width: 76px;">
                                    0 đánh giá
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between my-1">
                                <h3 style="width:3%;">3</h3>
                                <i class="bi bi-star-fill fs-4 color-star"></i>
                                <div class="bkdt__percent-rating">
                                    <div class="bkdt__percent-rating-child"></div>
                                </div>
                                <p class="fs-5 fst-italic m-0 text-end" style="color: var(--colortext3); width: 76px;">
                                    0 đánh giá
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between my-1">
                                <h3 style="width:3%;">2</h3>
                                <i class="bi bi-star-fill fs-4 color-star"></i>
                                <div class="bkdt__percent-rating">
                                    <div class="bkdt__percent-rating-child"></div>
                                </div>
                                <p class="fs-5 fst-italic m-0 text-end" style="color: var(--colortext3); width: 76px;">
                                    0 đánh giá
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between my-1">
                                <h3 style="width:3%;">1</h3>
                                <i class="bi bi-star-fill fs-4 color-star"></i>
                                <div class="bkdt__percent-rating">
                                    <div class="bkdt__percent-rating-child"></div>
                                </div>
                                <p class="fs-5 fst-italic m-0 text-end" style="color: var(--colortext3); width: 76px;">
                                    0 đánh giá
                                </p>
                            </div>

                            <div class="bkdt__comment">
                                <a href="#" class="bkdt__comment-link">Tất cả bình luận</a>
                            </div>

                            <div>
                                <div class="d-flex gap-4 flex-fill">
                                    <div class="bkdt__comment-user">
                                        <img src="../img/user1.jpg" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div>
                                        <div class="">
                                            <h3 class="fs-3 text-start m-0">Han Truong (张昕)</h3>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="d-flex align-items-center gap-1 mb-1">
                                                    <i class="bi bi-star-fill fs-5 color-star"></i>
                                                    <i class="bi bi-star-fill fs-5 color-star"></i>
                                                    <i class="bi bi-star-fill fs-5 color-star"></i>
                                                    <i class="bi bi-star-fill fs-5 color-star"></i>
                                                    <i class="bi bi-star-fill fs-5 color-star"></i>
                                                </div>
                                                <i class="bi bi-dot fs-5" style="color: var(--colortext2);"></i>
                                                <p class="m-0 fs-5 hidden-text" style="color: var(--colortext3);">18 tháng 2, 2025</p>
                                                <div class="flex-fill">
                                                    <i class="bi bi-hand-thumbs-up-fill fs-3 color-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="m-0 mt-2" style="color: var(--colortext1); font-size: 1.4rem; line-height: 2rem;">Sân cầu lông rộng rãi, thoáng mát, mặt sân đạt chuẩn giúp di chuyển linh hoạt.</p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color: var(--colortext3); margin: 24px 0 20px 0;">
                            </div>

                            <form action="">
                                <input type="text" class="form-date d-block w-100" placeholder="Viết bình luận...">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular-y mx-lg-auto mx-2">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-2 px-2">
                    <h1 class="title-section">SÂN PHỔ BIẾN</h1>
                    <RouterLink to="/booking" class="seemore">
                        <div>Xem thêm</div>
                        <i class="bi bi-caret-right-fill"></i>
                    </RouterLink>
                </div>
                <div class="row gx-0 mt-5">
                    <template v-if="popular_yards.length > 0">
                        <div v-for="yard in popular_yards.slice(0, 4)" :key="yard.id" class="col-12 col-lg-3 col-md-6 p-0">
                            <div class="yard">
                                <a :href="`/san/${yard.id}`" class="link-img-p">
                                        <img :src="'/public/img/san/' + yard.Hinh_anh"  :alt="yard.Ten_san" style="width: 100%;">
                                    </a>
                                <div class="yard-infor">
                                    <div class="yard-infor-content">
                                        <a :href="`/san/${yard.id}`" class="m-0 title-product fs-3">{{ yard.Ten_san }}</a>
                                        <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                            <i v-for="star in 5" :key="star" 
                                               class="bi bi-star-fill color-star fs-4"
                                               :class="{'text-warning': star <= (yard.diem_danh_gia ?? 0)}">
                                            </i>
                                            <p class="text-rating m-0 ms-3">({{ yard.diem_danh_gia ?? 0 }}/5)</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 text-location pt-3 pb-2">
                                            <i class="bi bi-geo-alt"></i>
                                            <p class="m-0">{{ yard.Dia_chi }}</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 text-location">
                                            <i class="bi bi-door-open"></i>
                                            <p class="custom-open m-0">{{ yard.Trang_thai === 1 ? 'Đang mở cửa' : 'Đóng cửa' }}</p>
                                        </div>
                                        <a :href="`/san/${yard.id}`" class="btn-booknow">Đặt ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="col-12 text-center">
                            <p>Đang tải dữ liệu...</p>
                        </div>
                    </template>
                </div>
            </div>
        </section>
    </main>
</template>