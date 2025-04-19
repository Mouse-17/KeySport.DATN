<script setup lang="ts">
    import {ref, onMounted} from 'vue';
    import type {Yard} from '../stores/yard';
    const yard_store = ref <Yard[]>([]);
    const popular_yards = ref<Yard[]>([]);
    const currentPage = ref(1);
    const lastPage = ref(1);
    const totalItems = ref(0);

    const fetchyard = async (page = 1) => {
        try {
            const response = await fetch(`http://localhost:8000/api/san?page=${page}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const datas = await response.json();
            if (datas.status == 'success') {
               yard_store.value = datas.data;
               currentPage.value = datas.pagination.current_page;
               lastPage.value = datas.pagination.last_page;
               totalItems.value = datas.pagination.total;
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

    const changePage = (page: number) => {
        if (page >= 1 && page <= lastPage.value) {
            fetchyard(page);
        }
    };

    onMounted(() => {
        fetchyard();
        fetchPopularYards();
    });

    


</script>



<template>
    <main>
        <section class="head-sort py-4" style="background-color: var(--bg3);">
            <div class="container">
                <form class="custom-form d-flex justify-content-center w-100" style="box-shadow: 0 0 18px var(--shadow2);">
                    <div class="w-100 row justify-content-center gx-0">
                        <div class="col-12 col-lg-2 col-md-12 m-1 m-lg-2 p-2 p-lg-0 py-3">
                            <input class="form-date d-block w-100" style="padding: 18px 12px;" type="date" name="" id="">
                        </div>
                        <div class="col-12 col-lg-2 col-md-12 m-1 m-lg-2 p-2 p-lg-0">
                            <select aria-label="Default select example" class="form-select form-date">
                                <option value="bongda" selected>Sân bóng đá</option>
                                <option value="calong">Sân cầu lông</option>
                                <option value="bongchuyen">Sân bóng chuyền</option>
                                <option value="golf">Sân golf</option>
                                <option value="bongro">Sân bóng rổ</option>
                                <option value="tennis">Sân tennis</option>
                                <option value="pickkleball">Sân pickkleball</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-5 col-md-12 m-1 m-lg-2 p-2 p-lg-0">
                            <input type="text" class="d-block w-100 form-date" style="padding: 18px 12px;" placeholder="Bạn đang nghĩ gì?">
                        </div>
                        <div class="d-flex align-items-center col-12 col-lg-2 col-md-12 m-1 m-lg-2 p-2 p-lg-0">
                            <button class="btn-find" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="booking">
            <div class="container">
                <div class="form-hidden">
                    <h3 class="aside-title text-white text-start p-4 m-0">BỘ LỌC</h3>
                    <form class="d-flex justify-content-between gap-3 p-4" style="border: 1px solid var(--colortext2); border-radius: 0 0 12px 12px;">
                        <select class="form-date w-100 mt-2 select-sort">
                            <option selected>Phổ biến</option>
                            <option>Mới nhất</option>
                            <option>Cũ nhất</option>
                        </select>
                
                        <select class="form-date w-100 mt-2 select-sort">
                            <option selected>Giá</option>
                            <option>Cao - Thấp</option>
                            <option>Thấp - Cao</option>
                        </select>

                        <select class="form-date w-100 mt-2 select-sort">
                            <option selected>Bộ môn</option>
                            <option>Bóng đá</option>
                            <option>Cầu lông</option>
                            <option>Bóng chuyền</option>
                            <option>Golf</option>
                            <option>Bóng rổ</option>
                            <option>Tennis</option>
                            <option>Pickleball</option>
                            <option>Hồ bơi</option>
                        </select>

                        <select class="form-date w-100 mt-2 select-sort">
                            <option selected>Đánh giá</option>
                            <option>5 &#9733;</option>
                            <option>4 &#9733;</option>
                            <option>3 &#9733;</option>
                            <option>2 &#9733;</option>
                            <option>1 &#9733;</option>
                        </select>

                        <select class="form-date w-100 mt-2 select-sort">
                            <option selected>Khung giờ</option>
                            <option>0:00 - 2:00</option>
                            <option>2:00 - 4:00</option>
                            <option>4:00 - 6:00</option>
                            <option>6:00 - 8:00</option>
                            <option>8:00 - 10:00</option>
                            <option>10:00 - 12:00</option>
                            <option>12:00 - 14:00</option>
                            <option>14:00 - 16:00</option>
                            <option>16:00 - 18:00</option>
                            <option>18:00 - 20:00</option>
                            <option>20:00 - 22:00</option>
                            <option>22:00 - 00:00</option>
                        </select>
                    </form>
                </div>
                <div class="row gx-0">
                    <aside class="col-12 col-lg-3 col-md-6 p-0 mt-2 sticky-aside">
                        <div class="me-3 sticky-aside-div">
                            <h3 class="aside-title text-white text-start p-4 m-0">HIỂN THỊ THEO</h3>
                            <form class="aside-container p-4">
                                <select class="form-date w-100 mt-2 select-sort">
                                    <option selected>Phổ biến</option>
                                    <option>Mới nhất</option>
                                    <option>Cũ nhất</option>
                                </select>
                        
                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Giá</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="price" id="low-to-high">
                                    <label class="form-check-label" for="low-to-high">Thấp - Cao</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="price" id="high-to-low">
                                    <label class="form-check-label" for="high-to-low">Cao - Thấp</label>
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="text" class="form-control rounded-4 p-3 me-2" placeholder="Từ">
                                    <input type="text" class="form-control rounded-4 p-3" placeholder="Đến">
                                </div>

                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Đánh giá</h3>
                                <div class="rating">
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-5">
                                        <label class="form-check-label star-label" for="rating-5">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-5">
                                        <label class="form-check-label star-label" for="rating-5">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-5">
                                        <label class="form-check-label star-label" for="rating-5">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-5">
                                        <label class="form-check-label star-label" for="rating-5">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input class="form-check-input" type="radio" name="rating" id="rating-5">
                                        <label class="form-check-label star-label" for="rating-5">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                </div>
                        
                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Bộ môn</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="yard" id="bongda">
                                    <label class="form-check-label" for="bongda">Bóng đá</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="yard" id="caulong">
                                    <label class="form-check-label" for="caulong">Cầu lông</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="yard" id="bongchuyen">
                                    <label class="form-check-label" for="bongchuyen">Bóng chuyền</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="yard" id="bongro">
                                    <label class="form-check-label" for="bongro">Bóng rổ</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="yard" id="tennis">
                                    <label class="form-check-label" for="tennis">Tennis</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="pickkleball">
                                    <label class="form-check-label" for="pickkleball">Pickkleball</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="hoboi">
                                    <label class="form-check-label" for="hoboi">Hồ bơi</label>
                                </div>

                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Khung giờ</h3>
                                <div class="d-flex mt-4">
                                    <input type="time" name="timeplay" class="form-control displayAPM fs-4 rounded-4 p-3 me-2" placeholder="Bắt đầu" value="06:00">
                                    <input type="time" name="timeplay" class="form-control displayAPM fs-4 rounded-4 p-3" placeholder="Kết thúc" value="08:00">
                                </div>
                            </form>
                        </div>
                    </aside>
                    <div class="col-lg-9">
                        <p class="fs-4 m-3" style="color: var(--colortext2)">Có {{ yard_store.length }} kết quả được hiển thị</p>
                        <div class="row gx-0">
                            <template v-if="yard_store.length > 0">
                            <div v-for="yard in yard_store" :key="yard.id" class="col-12 col-lg-4 col-md-6 p-0">
                                <div class="yard">
                                    <a :href="`/san/${yard.id}`" class="link-img-p">
                                        <img :src="'/public/img/san/' + yard.Hinh_anh" :alt="yard.Ten_san" style="width: 100%; border-radius: 12px 12px 0 0;">
                                    </a>
                                    <div class="yard-infor">
                                        <div class="yard-infor-content">
                                            <a :href="`/san/${yard.id}`" class="m-0 title-product fs-3">{{ yard.Ten_san }}</a>
                                            <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                                <i class="bi bi-star-fill color-star fs-5"></i>
                                                <i class="bi bi-star-fill color-star fs-5"></i>
                                                <i class="bi bi-star-fill color-star fs-5"></i>
                                                <i class="bi bi-star-fill color-star fs-5"></i>
                                                <i class="bi bi-star-fill color-star fs-5"></i>
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
                                            <!-- <hr class="line">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-heart-fill fs-3"></i>
                                                    <p class="custom-open fs-3 m-0 fw-regular">25</p>
                                                </div>
                                                <a href="" class="seemore">
                                                    <div class="fs-3">Chi tiết</div>
                                                    <i class="bi bi-caret-right-fill fs-3"></i>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        </div>
                        <div class="d-flex justify-content-center align-items-end gap-2 mt-4">
                            <a href="#" class="btn-pagination" @click.prevent="changePage(currentPage - 1)">
                                <i class="bi bi-chevron-left fs-4"></i>
                            </a>
                            <template v-for="page in lastPage" :key="page">
                                <a v-if="page === 1 || page === lastPage || (page >= currentPage - 2 && page <= currentPage + 2)" 
                                   href="#" 
                                   class="btn-pagination" 
                                   :class="{ active: page === currentPage }"
                                   @click.prevent="changePage(page)">
                                    {{ page }}
                                </a>
                                <span v-else-if="page === currentPage - 3 || page === currentPage + 3" class="fs-4">...</span>
                            </template>
                            <a href="#" class="btn-pagination" @click.prevent="changePage(currentPage + 1)">
                                <i class="bi bi-chevron-right fs-4"></i>
                            </a>
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