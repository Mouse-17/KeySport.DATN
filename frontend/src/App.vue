<script setup lang="ts">
    import { ref, watch, onMounted } from "vue";
    import { onClickOutside } from "@vueuse/core";
    import { useRoute, useRouter } from "vue-router";
    import axios from 'axios';

    const route = useRoute();
    const router = useRouter();

    const btnSearch = ref<HTMLElement | null>(null);
    const showSearch = ref<HTMLElement | null>(null);
    const showSearchBox = ref(false);

    const clickSearch = (event: Event) => {
        event.preventDefault();
        showSearchBox.value = true;
    };

    const closeSearch = () => {
        showSearchBox.value = false;
    };

    // Sử dụng onClickOutside để theo dõi cả nút search và ô tìm kiếm
    onClickOutside(showSearch, closeSearch);

    const tukhoa = ref('');
    const products = ref([]);
    const submitSearch = async () => {
        if (!tukhoa.value.trim()) return;
        
        try {
            const response = await axios.post('http://localhost:8000/api/sanpham', {
                tukhoa: tukhoa.value,
            },
            {
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        );
            console.log(tukhoa);
            
            if (response.data.status == 'success') {
                products.value = response.data.data;
                console.log(products.value);
                // Chuyển hướng đến trang sản phẩm với từ khóa tìm kiếm
                router.push({
                    path: '/sanpham',
                    query: { 
                        trang: 1,
                        tukhoa: tukhoa.value 
                    }
                });
                // Đóng form tìm kiếm
                showSearchBox.value = false;
            } else {
                console.error('Lỗi tìm kiếm:', response.data.message);
            }
        } catch (error) {
            console.error('Lỗi khi tìm kiếm:', error);
        }
    };
</script>

<template>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!-- font inter -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
      <!-- bootstrap icon -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <!-- custom css -->
      <link rel="stylesheet" href="../public/css/styles.css">
      <title>Trang chủ</title>
  </head>
  <body>
    <header v-if="!route.meta.hideHeaderFooter">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between py-3">
                <div class="" style="width: 9%; min-width: 110px;">
                    <RouterLink to="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img src="../img/logo.jpg" alt="" class="img-fluid">
                    </RouterLink>
                </div>
        
                <ul class="nav col-12 col-md-auto justify-content-center mb-md-0 my-lg-0 my-4">
                    <li><RouterLink to="/booking" class="nav-link px-3 px-lg-4 fs-lg-4 fs-md-5">BOOKING</RouterLink></li>
                    <li><RouterLink to="/sanpham?trang=1" class="nav-link px-3 px-lg-4 fs-lg-4 fs-md-5">SẢN PHẨM</RouterLink></li>
                    <li><RouterLink to="/gioithieu" class="nav-link px-3 px-lg-4 fs-lg-4 fs-md-5">GIỚI THIỆU</RouterLink></li>
                    <li><RouterLink to="/lienhe" class="nav-link px-3 px-lg-4 fs-lg-4 fs-md-5">LIÊN HỆ</RouterLink></li>
                    <li><RouterLink to="/tintuc" class="nav-link px-3 px-lg-4 fs-lg-4 fs-md-5">TIN TỨC</routerLink></li>
                </ul>
            
                <div class="d-flex text-end">
                    <div class="position-relative">
                        <a  @click="clickSearch" ref="btnSearch" href="#" class="nav-icon" id="header__search-btn">
                            <i class="bi bi-search"></i>
                        </a>
                        <form @submit.prevent="submitSearch" method="post" class="position-absolute" v-if="showSearchBox" ref="showSearch" id="header__search-form" style="top: 36px; z-index: 1;">
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    v-model="tukhoa" 
                                    name="search" 
                                    placeholder="Tìm kiếm..." 
                                    class="form-date" 
                                    style="padding: 14px 12px; font-size: 1.4rem;"
                                >
                            </div>
                        </form>
                    </div>
                    <div><a href="#" class="nav-icon"><i class="bi bi-bell"></i></a></div>
                    <div><a href="#" class="nav-icon"><i class="bi bi-person"></i></a></div>
                    <div class="position-relative">
                        <RouterLink to="/giohang" class="nav-icon"><i class="bi bi-cart"></i></RouterLink>
                        <span class="custom-badge position-absolute rounded-circle fs-5 p-1">2</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
  
    <RouterView />

    <footer class="footer mt-0" v-if="!route.meta.hideHeaderFooter">
      <div class="container">
          <div class="row gx-0">
              <div class="col-12 col-lg-3 col-md-6  p-0">
                  <div class="footer-box px-3">
                      <img src="../img/logo.jpg" alt="Logo" class="footer-logo mb-3">
                      <p class="fs-4 footer-infor"><i class="bi bi-telephone fs-3"></i> 1900.5678</p>
                      <p class="fs-4 footer-infor"><i class="bi bi-geo-alt fs-3"></i> Công Viên Phần Mềm Quang Trung, Tô Ký, Quận 12, TP.HCM</p>
                      <p class="fs-4 footer-infor"><i class="bi bi-envelope fs-3"></i> keysport@gmail.com</p>
                  </div>
              </div>
  
              <div class="col-12 col-lg-3 col-md-6  p-0">
                  <div class="footer-box px-3">
                      <h5 class="fs-2">Giới thiệu</h5>
                      <ul class="list-unstyled">
                          <li><a href="#" class="nav-link-footer">Giới thiệu Booking KeySport</a></li>
                          <li><a href="#" class="nav-link-footer">Giới thiệu sản phẩm</a></li>
                          <li><a href="#" class="nav-link-footer">Địa chỉ</a></li>
                          <li><a href="#" class="nav-link-footer">Liên hệ</a></li>
                      </ul>
                  </div>
              </div>
  
              <div class="col-12 col-lg-3 col-md-6  p-0">
                  <div class="footer-box px-3">
                      <h5 class="fs-2">Chính sách</h5>
                      <ul class="list-unstyled">
                          <li><a href="#" class="nav-link-footer">Chính sách booking</a></li>
                          <li><a href="#" class="nav-link-footer">Chính sách mua, bán hàng</a></li>
                          <li><a href="#" class="nav-link-footer">Chính sách đổi, trả, hoàn tiền</a></li>
                          <li><a href="#" class="nav-link-footer">Chính sách vận chuyển</a></li>
                          <li><a href="#" class="nav-link-footer">Chính sách bảo mật</a></li>
                      </ul>
                  </div>
              </div>

              <div class="col-12 col-lg-3 col-md-6  p-0">
                  <div class="footer-box px-3">
                      <h5 class="fs-2">Theo dõi chúng tôi tại</h5>
                      <div class="social-icons d-flex align-items-center gap-1">
                          <a href="#" class="nav-link-footer icon-footer"><i class="bi bi-facebook"></i></a>
                          <a href="#" class="nav-link-footer icon-footer"><i class="bi bi-instagram"></i></a>
                          <a href="#" class="nav-link-footer icon-footer"><i class="bi bi-twitter"></i></a>
                          <a href="#" class="nav-link-footer icon-footer"><i class="bi bi-envelope"></i></a>
                      </div>
                      <div class="app-links mt-5 d-flex align-items-center gap-1">
                          <img src="../img/ggplay.png" alt="Google Play">
                          <img src="../img/appstore.png" alt="App Store">
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="mt-4 p-2">
              <hr class="footer-line">
              <p class="m-0 fs-5 fw-regular text-end" style="background-color: transparent;">Bản quyền © 2024 - THUỘC NHÀ SẢN XUẤT</p>
          </div>
      </div>
    </footer>
  </body>
</template>


