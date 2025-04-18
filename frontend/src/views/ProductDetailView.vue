<script setup lang="ts">
    import { onMounted, ref, computed } from 'vue';
    import { useRoute } from 'vue-router';
    import type { Product } from '../stores/product';

    const route = useRoute();
    const product_store = ref<Product | null>(null);
    const quantity = ref(1);
    const activeTab = ref('description'); // 'description' or 'reviews'

    const handleTabClick = (tab: string) => {
        activeTab.value = tab;
    };

    // Lọc màu sắc không trùng lặp
    const uniqueColors = computed(() => {
        if (!product_store.value?.san_pham_mau_size) return [];
        
        // Lấy danh sách ID_Mau không trùng lặp
        const uniqueMauIds = [...new Set(product_store.value.san_pham_mau_size.map(item => item.ID_Mau))];
        return uniqueMauIds;
    });

    // Lọc kích thước không trùng lặp
    const uniqueSizes = computed(() => {
        if (!product_store.value?.san_pham_mau_size) return [];
        
        // Lấy danh sách ID_Kichthuoc không trùng lặp
        const uniqueSizeIds = [...new Set(product_store.value.san_pham_mau_size.map(item => item.ID_Kichthuoc))];
        return uniqueSizeIds;
    });

    const fetchProduct = async () => {
        try {
            const response = await fetch(`http://localhost:8000/api/sanpham/${route.params.id}`);
            const data = await response.json();
            if (data.status == 'success') {
                product_store.value = data.data;
                console.log('Sản phẩm:', product_store.value);
                
                // Kiểm tra cấu trúc dữ liệu mau và size
                if (product_store.value?.san_pham_mau_size && product_store.value.san_pham_mau_size.length > 0) {
                    console.log('Mẫu Màu Size:', product_store.value.san_pham_mau_size);
                    product_store.value.san_pham_mau_size.forEach((item, index) => {
                        console.log(`Item ${index}:`, item);
                        console.log(`Màu ID:`, item.ID_Mau);
                        console.log(`Size ID:`, item.ID_Kichthuoc);
                        console.log(`Màu:`, item.mau);
                        console.log(`Size:`, item.size);
                    });
                }
            }
        } catch (error) {
            console.error('Lỗi khi tải sản phẩm:', error);
        }
    };

    onMounted(() => {
        fetchProduct();
    });
</script>
<template>
    <main v-if="product_store">
        <section class="product-detail">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-12 col-lg-6 p-0">
                        <div class="px-lg-2 px-3 d-flex gap-4">
                            <div class="product-thumnail">
                                <div v-if="product_store.anh_phu" v-for="(image, index) in product_store.anh_phu" :key="index" class="custom-thumnail__box mb-3">
                                    <img :src="'/public/img/img_sp/' + image" :alt="product_store.Ten_san_pham" class="img-fluid">
                                </div>
                            </div>
                            <div class="flex-fill">
                                <img :src="'/public/img/img_sp/' + product_store.Anh_dai_dien" :alt="product_store.Ten_san_pham" class="rounded-4">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-0">
                        <div class="product-info px-5">
                            <a href="#" class="category-bkdetail__link mt-2">{{ product_store.danh_muc?.ten_danh_muc }}</a>
                            <h2 class="text-start productname my-2">{{ product_store.Ten_san_pham }}</h2>
                            <p class="text-muted fs-4">Mã sản phẩm: {{ product_store.id }}</p>
                            <p class="mt-4">
                                <del class="fs-4 me-3" style="color: var(--colortext3);" v-if="product_store.gia_giam">{{ product_store.gia_giam.toLocaleString('vi-VN') }}đ</del> 
                                <strong style="color:var(--accent); font-size: 1.9rem;">{{ product_store.Gia.toLocaleString('vi-VN') }}đ</strong>
                            </p>
                            <div class="d-flex align-items-center gap-2 mt-2 mb-3">
                                <template v-for="star in 5" :key="star">
                                    <i 
                                        class="bi bi-star-fill" 
                                        :class="star <= (product_store.so_sao || 0) ? 'color-star' : 'color-star-gray'"
                                    ></i>
                                </template>
                                <p class="m-0 me-1 fs-3 fw-bold" style="color: var(--colortext1);">{{ product_store.so_sao || 0 }}</p>
                                <i class="bi bi-dot fs-2" style="color: var(--colortext2);"></i>
                                <a href="#" class="m-0 fs-4 fw-regular fst-italic rating-link-view">Đánh giá ({{ product_store.tong_danh_gia || 0 }})</a>
                            </div>
                            <p class="product-desc">{{ product_store.Mo_ta }}</p>
                            <template v-if="product_store.san_pham_mau_size && product_store.san_pham_mau_size.length > 0">
                                <h5 class="mt-4 fs-4">Màu sắc:</h5>
                                <div class="color-options mt-3">
                                    <div 
                                        v-for="(colorId, index) in uniqueColors" 
                                        :key="'color-'+index" 
                                        class="color-option"
                                        :style="{ backgroundColor: '#'+colorId }"

                                    >
                                        Màu ID: {{ colorId }}
                                    </div>
                                </div>
                                
                                <h5 class="mt-4 fs-4">Size:</h5>
                                <div class="size-options mt-3">
                                    <div 
                                        v-for="(sizeId, index) in uniqueSizes" 
                                        :key="'size-'+index" 
                                        class="fs-4"
                                    >
                                        {{ sizeId }}
                                    </div>
                                </div>
                            </template>
                            <div class="mt-4 d-flex align-items-center gap-4">
                                <div>
                                    <input type="number" v-model="quantity" class="form-date product-quantity" name="quantity" min="1">
                                </div>
                                <a href="" class="btn-order">Thêm vào giỏ hàng</a>
                                <div class="d-flex align-items-center gap-1 btn-add-wishlist">
                                    <div><i class="bi bi-heart-fill fs-3"></i></div>
                                    <div><i class="bi bi-facebook fs-3"></i></div>
                                    <div><i class="bi bi-messenger fs-3"></i></div>
                                    <div><i class="bi bi-share fs-3"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="detail-infor">
            <div class="container">
                <ul class="d-flex list-unstyled detail-infor__list">
                    <li 
                        class="detail-infor__desc-rating" 
                        :class="{ 'desc-detail__seleted': activeTab == 'description' }"
                        @click="handleTabClick('description')"
                    >
                        Mô tả
                    </li>
                    <li 
                        class="detail-infor__desc-rating"
                        :class="{ 'desc-detail__seleted': activeTab == 'reviews' }"
                        @click="handleTabClick('reviews')"
                    >
                        Đánh giá
                    </li>
                </ul>
                <div v-show="activeTab == 'description'" class="desc-box">
                    <div class="row gx-0">
                        <div class="col-12 col-lg-7">
                            <div class="padding-custom">
                                <div>
                                    <h3 class="fs-3 fw-semibold text-start">Thông tin sản phẩm</h3>
                                    <div class="mt-3" style="color: var(--colortext2); font-size: 1.5rem; line-height: 2.4rem; text-align: justify;">
                                        {{ product_store.Mo_ta }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="ps-5 pe-lg-0 pe-3 detail-infor__thumnail">
                                <template v-if="product_store.anh_phu">
                                    <div v-for="(image, index) in product_store.anh_phu" :key="index" class="my-2">
                                        <img :src="'/public/img/img_sp/' + image" :alt="product_store.Ten_san_pham" class="img-fluid">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="activeTab === 'reviews'" class="comment-box">
                    <div class="row gx-0 justify-content-between mt-5">
                        <div class="col-6">
                            <div class="comment-box__rating mt-4">
                                <div class="d-flex align-items-center justify-content-between gap-3">
                                    <h1 class="m-0 fw-semibold" style="font-size: 3.2rem;">5.0</h1>
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-3">
                                            <i class="bi bi-star-fill fs-2 color-star"></i>
                                            <i class="bi bi-star-fill fs-2 color-star"></i>
                                            <i class="bi bi-star-fill fs-2 color-star"></i>
                                            <i class="bi bi-star-fill fs-2 color-star"></i>
                                            <i class="bi bi-star-fill fs-2 color-star"></i>
                                        </div>
                                        <p class="fs-4 fst-italic m-0 text-end" style="color: var(--colortext3);">
                                            10 đánh giá
                                        </p>
                                    </div>
                                </div>
                                <hr style="color: var(--colortext3);">
                                <div class="d-flex align-items-center justify-content-between my-4 mt-5">
                                    <h3 style="width:5%; font-size: 2rem;">5</h3>
                                    <i class="bi bi-star-fill fs-3 color-star"></i>
                                    <div class="bkdt__percent-rating">
                                        <div class="bkdt__percent-rating-child percent100"></div>
                                    </div>
                                    <p class="fs-4 fst-italic m-0 text-end" style="color: var(--colortext3); width: 90px;">
                                        10 đánh giá
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-4">
                                    <h3 style="width:5%; font-size: 2rem;">4</h3>
                                    <i class="bi bi-star-fill fs-3 color-star"></i>
                                    <div class="bkdt__percent-rating">
                                        <div class="bkdt__percent-rating-child"></div>
                                    </div>
                                    <p class="fs-4 fst-italic m-0 text-end" style="color: var(--colortext3); width: 90px;">
                                        0 đánh giá
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-4">
                                    <h3 style="width:5%; font-size: 2rem;">3</h3>
                                    <i class="bi bi-star-fill fs-3 color-star"></i>
                                    <div class="bkdt__percent-rating">
                                        <div class="bkdt__percent-rating-child"></div>
                                    </div>
                                    <p class="fs-4 fst-italic m-0 text-end" style="color: var(--colortext3); width: 90px;">
                                        0 đánh giá
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-4">
                                    <h3 style="width:5%; font-size: 2rem;">2</h3>
                                    <i class="bi bi-star-fill fs-3 color-star"></i>
                                    <div class="bkdt__percent-rating">
                                        <div class="bkdt__percent-rating-child"></div>
                                    </div>
                                    <p class="fs-4 fst-italic m-0 text-end" style="color: var(--colortext3); width: 90px;">
                                        0 đánh giá
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between my-4">
                                    <h3 style="width:5%; font-size: 2rem;">1</h3>
                                    <i class="bi bi-star-fill fs-3 color-star"></i>
                                    <div class="bkdt__percent-rating">
                                        <div class="bkdt__percent-rating-child"></div>
                                    </div>
                                    <p class="fs-4 fst-italic m-0 text-end" style="color: var(--colortext3); width: 90px;">
                                        0 đánh giá
                                    </p>
                                </div>

                                <p class="my-5 py-2 fs-3" style="color: var(--colortext2);">Dựa trên 10 đánh giá đến từ khách hàng</p>
                            </div>
                        </div>
                        <div class="col-5">
                            <div style="background-color: var(--white); border-radius: 12px; box-shadow: 0 0 16px var(--shadow2);">
                                <h2 class="m-0 fs-2 fw-semibold text-start" style="padding: 24px;">Tất cả bình luận</h2>
                                <div class="comment-box__comment-content mt-1">
                                    <div class="px-5">
                                        <div class="d-flex gap-4 flex-fill">
                                            <div class="bkdt__comment-user">
                                                <img src="../img/user1.jpg" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <div>
                                                <div class="">
                                                    <h3 class="fs-3 text-start m-0">Han Truong (张昕)</h3>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="d-flex align-items-center gap-1 mb-1">
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                        </div>
                                                        <i class="bi bi-dot fs-4" style="color: var(--colortext2);"></i>
                                                        <p class="m-0 fs-4 hidden-text" style="color: var(--colortext3);">18 tháng 2, 2025</p>
                                                        <div class="flex-fill">
                                                            <i class="bi bi-hand-thumbs-up-fill fs-2 color-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="m-0 mt-2" style="color: var(--colortext1); font-size: 1.5rem; line-height: 2rem;">Sân cầu lông rộng rãi, thoáng mát, mặt sân đạt chuẩn giúp di chuyển linh hoạt.</p>
                                                </div>

                                            </div>
                                        </div>
                                        <hr style="color: var(--colortext3); margin: 24px 0 20px 0;">
                                    </div>
                                    <div class="px-5">
                                        <div class="d-flex gap-4 flex-fill">
                                            <div class="bkdt__comment-user">
                                                <img src="../img/user1.jpg" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <div>
                                                <div class="">
                                                    <h3 class="fs-3 text-start m-0">Han Truong (张昕)</h3>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="d-flex align-items-center gap-1 mb-1">
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                        </div>
                                                        <i class="bi bi-dot fs-4" style="color: var(--colortext2);"></i>
                                                        <p class="m-0 fs-4 hidden-text" style="color: var(--colortext3);">18 tháng 2, 2025</p>
                                                        <div class="flex-fill">
                                                            <i class="bi bi-hand-thumbs-up-fill fs-2 color-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="m-0 mt-2" style="color: var(--colortext1); font-size: 1.5rem; line-height: 2rem;">Sân cầu lông rộng rãi, thoáng mát, mặt sân đạt chuẩn giúp di chuyển linh hoạt.</p>
                                                </div>

                                            </div>
                                        </div>
                                        <hr style="color: var(--colortext3); margin: 24px 0 20px 0;">
                                    </div>
                                    <div class="px-5">
                                        <div class="d-flex gap-4 flex-fill">
                                            <div class="bkdt__comment-user">
                                                <img src="../img/user1.jpg" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <div>
                                                <div class="">
                                                    <h3 class="fs-3 text-start m-0">Han Truong (张昕)</h3>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="d-flex align-items-center gap-1 mb-1">
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                        </div>
                                                        <i class="bi bi-dot fs-4" style="color: var(--colortext2);"></i>
                                                        <p class="m-0 fs-4 hidden-text" style="color: var(--colortext3);">18 tháng 2, 2025</p>
                                                        <div class="flex-fill">
                                                            <i class="bi bi-hand-thumbs-up-fill fs-2 color-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="m-0 mt-2" style="color: var(--colortext1); font-size: 1.5rem; line-height: 2rem;">Sân cầu lông rộng rãi, thoáng mát, mặt sân đạt chuẩn giúp di chuyển linh hoạt.</p>
                                                </div>

                                            </div>
                                        </div>
                                        <hr style="color: var(--colortext3); margin: 24px 0 20px 0;">
                                    </div>
                                    <div class="px-5">
                                        <div class="d-flex gap-4 flex-fill">
                                            <div class="bkdt__comment-user">
                                                <img src="../img/user1.jpg" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <div>
                                                <div class="">
                                                    <h3 class="fs-3 text-start m-0">Han Truong (张昕)</h3>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="d-flex align-items-center gap-1 mb-1">
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                            <i class="bi bi-star-fill fs-4 color-star"></i>
                                                        </div>
                                                        <i class="bi bi-dot fs-4" style="color: var(--colortext2);"></i>
                                                        <p class="m-0 fs-4 hidden-text" style="color: var(--colortext3);">18 tháng 2, 2025</p>
                                                        <div class="flex-fill">
                                                            <i class="bi bi-hand-thumbs-up-fill fs-2 color-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="m-0 mt-2" style="color: var(--colortext1); font-size: 1.5rem; line-height: 2rem;">Sân cầu lông rộng rãi, thoáng mát, mặt sân đạt chuẩn giúp di chuyển linh hoạt.</p>
                                                </div>

                                            </div>
                                        </div>
                                        <hr style="color: var(--colortext3); margin: 24px 0 20px 0;">
                                    </div>
                                </div>
                                <form action="" class="p-5 pt-2">
                                    <input type="text" class="form-date d-block w-100" placeholder="Viết bình luận...">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular-y mx-lg-auto mx-2">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-2 px-2">
                    <h1 class="title-section">ĐỀ XUẤT CHO BẠN</h1>
                    <a href="" class="seemore">
                        <div>Xem thêm</div>
                        <i class="bi bi-caret-right-fill"></i>
                    </a>
                </div>
                <div class="row gx-0">
                    <div class="col-12 col-lg-3 col-md-6 p-0">
                        <div class="product my-3">
                            <a href="#" class="link-img-p">
                                <img src="../../public/img/p1.png" alt="" class="img-fluid">
                            </a>
                            <div class="product-infor">
                                <a href="#" class="m-0 title-product fs-3">Áo thun Unisex phối bo cổ</a>
                                <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill fs-5 color-star-gray"></i>
                                    <p class="text-rating m-0 ms-3 fs-4">(4/5)</p>
                                </div>
                                <div class="text-location py-2">
                                    <p class="m-0">Áo thun nam thể thao phối bo cổ được thiết kế năng động, trẻ trung</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-location">
                                    <i class="bi bi-eye"></i>
                                    <p class="custom-open m-0">Lượt xem: 230</p>
                                </div>
                                <div class="price d-flex align-items-end gap-4">
                                    <p class="m-0">240.000đ</p>
                                    <del>320.000đ</del>
                                </div>
                            </div>
                            <div class="atc-love-box">
                                <a href="" class="atc-love"><i class="bi bi-heart-fill"></i></a>
                                <a href="" class="atc-love atc-icon"><i class="bi bi-cart-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 p-0">
                        <div class="product my-3">
                            <a href="#" class="link-img-p">
                                <img src="../../public/img/p1.png" alt="" class="img-fluid">
                            </a>
                            <div class="product-infor">
                                <a href="#" class="m-0 title-product fs-3">Áo thun Unisex phối bo cổ</a>
                                <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill fs-5 color-star-gray"></i>
                                    <p class="text-rating m-0 ms-3 fs-4">(4/5)</p>
                                </div>
                                <div class="text-location py-2">
                                    <p class="m-0">Áo thun nam thể thao phối bo cổ được thiết kế năng động, trẻ trung</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-location">
                                    <i class="bi bi-eye"></i>
                                    <p class="custom-open m-0">Lượt xem: 230</p>
                                </div>
                                <div class="price d-flex align-items-end gap-4">
                                    <p class="m-0">240.000đ</p>
                                    <del>320.000đ</del>
                                </div>
                            </div>
                            <div class="atc-love-box">
                                <a href="" class="atc-love"><i class="bi bi-heart-fill"></i></a>
                                <a href="" class="atc-love atc-icon"><i class="bi bi-cart-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 p-0">
                        <div class="product my-3">
                            <a href="#" class="link-img-p">
                                <img src="../../public/img/p1.png" alt="" class="img-fluid">
                            </a>
                            <div class="product-infor">
                                <a href="#" class="m-0 title-product fs-3">Áo thun Unisex phối bo cổ</a>
                                <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill fs-5 color-star-gray"></i>
                                    <p class="text-rating m-0 ms-3 fs-4">(4/5)</p>
                                </div>
                                <div class="text-location py-2">
                                    <p class="m-0">Áo thun nam thể thao phối bo cổ được thiết kế năng động, trẻ trung</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-location">
                                    <i class="bi bi-eye"></i>
                                    <p class="custom-open m-0">Lượt xem: 230</p>
                                </div>
                                <div class="price d-flex align-items-end gap-4">
                                    <p class="m-0">240.000đ</p>
                                    <del>320.000đ</del>
                                </div>
                            </div>
                            <div class="atc-love-box">
                                <a href="" class="atc-love"><i class="bi bi-heart-fill"></i></a>
                                <a href="" class="atc-love atc-icon"><i class="bi bi-cart-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 p-0">
                        <div class="product my-3">
                            <a href="#" class="link-img-p">
                                <img src="../../public/img/p1.png" alt="" class="img-fluid">
                            </a>
                            <div class="product-infor">
                                <a href="#" class="m-0 title-product fs-3">Áo thun Unisex phối bo cổ</a>
                                <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    <i class="bi bi-star-fill fs-5 color-star-gray"></i>
                                    <p class="text-rating m-0 ms-3 fs-4">(4/5)</p>
                                </div>
                                <div class="text-location py-2">
                                    <p class="m-0">Áo thun nam thể thao phối bo cổ được thiết kế năng động, trẻ trung</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-location">
                                    <i class="bi bi-eye"></i>
                                    <p class="custom-open m-0">Lượt xem: 230</p>
                                </div>
                                <div class="price d-flex align-items-end gap-4">
                                    <p class="m-0">240.000đ</p>
                                    <del>320.000đ</del>
                                </div>
                            </div>
                            <div class="atc-love-box">
                                <a href="" class="atc-love"><i class="bi bi-heart-fill"></i></a>
                                <a href="" class="atc-love atc-icon"><i class="bi bi-cart-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div v-else class="container py-5 text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Đang tải...</span>
        </div>
    </div>
</template>

<style scoped>
.color-star {
    color: var(--hover2);
}

.color-star-gray {
    color: #ddd;
}

.color-option {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 8px;
    margin-bottom: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.color-option:hover {
    border-color: var(--primary);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>