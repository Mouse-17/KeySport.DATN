<script setup lang="ts">
import { ref, watch, onMounted } from "vue";
import { onClickOutside } from "@vueuse/core";
import { RouterLink } from "vue-router";

    const showVoucher = ref<HTMLElement | null>(null);
    const voucherBox = ref<HTMLElement | null>(null);
    const isVoucherVisible = ref(false);

    // Hàm mở hộp voucher
    const clickshowVoucher = () => {
        isVoucherVisible.value = true;  // Đổi trạng thái mỗi khi click
        document.body.classList.add("background-after");
        document.body.style.overflow = "hidden";
        setTimeout(() => {
            if (voucherBox.value) {
                voucherBox.value.scrollIntoView({ behavior: "smooth", block: "end" });
            }
        }, 100);
    };

    // Hàm đóng hộp voucher khi click bên ngoài
    const closeVoucher = () => {
        isVoucherVisible.value = false;
        document.body.classList.remove("background-after");
        document.body.style.overflow = "";
    };


    // Khi hộp thoại hiển thị, chỉ lúc đó mới lắng nghe sự kiện click outside
    watch(isVoucherVisible, (visible) => {
        if (visible) {
            onClickOutside(voucherBox, closeVoucher);
        }
    });
</script>
<template>
    <main>
        <section class="cart">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-lg-7 col-12 p-0">
                        <div class="cart-left px-2">
                            <div class="cart-left__title">
                                <h3 class="cart-left_title-h3 fw-semibold">Sản phẩm</h3>
                                <h3 class="cart-left_title-h3 fw-semibold">Số lượng</h3>
                                <h3 class="cart-left_title-h3 cart-left_title-h3-none fw-semibold">Đơn giá</h3>
                            </div>
                            <div class="cart-left__title">
                                <div class="d-flex align-items-center gap-3">
                                    <div><input type="checkbox" class="form-check-input" name="" id=""></div>
                                    <div class="d-flex align-items-start gap-3">
                                        <div style="width: 30%; min-width: 60px;"><img src="../../public/img/p1.png" class="img-fluid" alt=""></div>
                                        <div>
                                            <h4 class="title-product mb-2" style="font-size: 1.6rem;">Áo thun bo cổ</h4>    
                                            <p class="my-1" style="font-size: 1.4rem;color: var(--colortext3);">Đen - L</p>
                                            <h4 class="title-product mb-2 product-price-phone" style="font-size: 1.5rem;">240.000đ</h4>    
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="d-flex">
                                        <i class="bi bi-dash"></i>
                                        <p class="cart-quantity">1</p>
                                        <i class="bi bi-plus"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-1 btn-remove-atc">
                                        <i class="bi bi-trash fs-3"></i>
                                        <p class="m-0 fs-4">Xóa</p>
                                    </div>
                                </div>
                                <p class="m-0 fs-3 fw-semibold mx-auto product-price" style="color: var(--colortext1);">240.000đ</p>
                            </div>
                            <div class="cart-left__title">
                                <div class="d-flex align-items-center gap-3">
                                    <div><input type="checkbox" class="form-check-input" name="" id=""></div>
                                    <div class="d-flex align-items-start gap-3">
                                        <div style="width: 30%; min-width: 60px;"><img src="../../public/img/p1.png" class="img-fluid" alt=""></div>
                                        <div>
                                            <h4 class="title-product mb-2" style="font-size: 1.6rem;">Áo thun bo cổ</h4>    
                                            <p class="my-1" style="font-size: 1.4rem;color: var(--colortext3);">Đen - L</p>
                                            <h4 class="title-product mb-2 product-price-phone" style="font-size: 1.5rem;">240.000đ</h4>    
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="d-flex">
                                        <i class="bi bi-dash"></i>
                                        <p class="cart-quantity">1</p>
                                        <i class="bi bi-plus"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-1 btn-remove-atc">
                                        <i class="bi bi-trash fs-3"></i>
                                        <p class="m-0 fs-4">Xóa</p>
                                    </div>
                                </div>
                                <p class="m-0 fs-3 fw-semibold mx-auto product-price" style="color: var(--colortext1);">240.000đ</p>
                            </div>
                            <div class="cart-left__title">
                                <div class="d-flex align-items-center gap-3">
                                    <div><input type="checkbox" class="form-check-input" name="" id=""></div>
                                    <div class="d-flex align-items-start gap-3">
                                        <div style="width: 30%; min-width: 60px;"><img src="../../public/img/p1.png" class="img-fluid" alt=""></div>
                                        <div>
                                            <h4 class="title-product mb-2" style="font-size: 1.6rem;">Áo thun bo cổ</h4>    
                                            <p class="my-1" style="font-size: 1.4rem;color: var(--colortext3);">Đen - L</p>
                                            <h4 class="title-product mb-2 product-price-phone" style="font-size: 1.5rem;">240.000đ</h4>    
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="d-flex">
                                        <i class="bi bi-dash"></i>
                                        <p class="cart-quantity">1</p>
                                        <i class="bi bi-plus"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-1 btn-remove-atc">
                                        <i class="bi bi-trash fs-3"></i>
                                        <p class="m-0 fs-4">Xóa</p>
                                    </div>
                                </div>
                                <p class="m-0 fs-3 fw-semibold mx-auto product-price" style="color: var(--colortext1);">240.000đ</p>
                            </div>
                            <div class="cart-left__title">
                                <div class="d-flex align-items-center gap-3">
                                    <div><input type="checkbox" class="form-check-input" name="" id=""></div>
                                    <div class="d-flex align-items-start gap-3">
                                        <div style="width: 30%; min-width: 60px;"><img src="../../public/img/p1.png" class="img-fluid" alt=""></div>
                                        <div>
                                            <h4 class="title-product mb-2" style="font-size: 1.6rem;">Áo thun bo cổ</h4>    
                                            <p class="my-1" style="font-size: 1.4rem;color: var(--colortext3);">Đen - L</p>
                                            <h4 class="title-product mb-2 product-price-phone" style="font-size: 1.5rem;">240.000đ</h4>    
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="d-flex">
                                        <i class="bi bi-dash"></i>
                                        <p class="cart-quantity">1</p>
                                        <i class="bi bi-plus"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-1 btn-remove-atc">
                                        <i class="bi bi-trash fs-3"></i>
                                        <p class="m-0 fs-4">Xóa</p>
                                    </div>
                                </div>
                                <p class="m-0 fs-3 fw-semibold mx-auto product-price" style="color: var(--colortext1);">240.000đ</p>
                            </div>
                            <div class="cart-left__title">
                                <div class="d-flex align-items-center gap-3">
                                    <div><input type="checkbox" class="form-check-input" name="" id=""></div>
                                    <div class="d-flex align-items-start gap-3">
                                        <div style="width: 30%; min-width: 60px;"><img src="../../public/img/p1.png" class="img-fluid" alt=""></div>
                                        <div>
                                            <h4 class="title-product mb-2" style="font-size: 1.6rem;">Áo thun bo cổ</h4>    
                                            <p class="my-1" style="font-size: 1.4rem;color: var(--colortext3);">Đen - L</p>
                                            <h4 class="title-product mb-2 product-price-phone" style="font-size: 1.5rem;">240.000đ</h4>    
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="d-flex">
                                        <i class="bi bi-dash"></i>
                                        <p class="cart-quantity">1</p>
                                        <i class="bi bi-plus"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center gap-1 btn-remove-atc">
                                        <i class="bi bi-trash fs-3"></i>
                                        <p class="m-0 fs-4">Xóa</p>
                                    </div>
                                </div>
                                <p class="m-0 fs-3 fw-semibold mx-auto product-price" style="color: var(--colortext1);">240.000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 p-0 cart-right">
                        <div class="px-2 cart-right-child">
                            <div class="cart-right-bottom">
                                <h4 class="fs-3 fw-semibold mb-3">Giỏ hàng</h4>
                                <div class="mx-2">
                                    <div class="py-3" style="border-top: 1px solid var(--colortext3);">
                                        <div class="row gx-0 justify-content-between">
                                            <div class="col-3">
                                                <div class="pe-2">
                                                    <img src="../../public/img/p1.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="px-2">
                                                    <p class="title-product fs-4 m-0" style="color: var(--colortext1);">Áo thun bo cổ</p>
                                                    <p class="m-0 py-1 fs-5" style="color: var(--colortext3);">TÊN DANH MỤC</p>
                                                    <p class="my-3" style="font-size: 1.4rem; color: var(--colortext2);">Số lượng: 1</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <p class="text-end fs-4 fw-bold" style="color: var(--accent);">240.000đ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-3" style="border-top: 1px solid var(--colortext3);">
                                        <div class="row gx-0 justify-content-between">
                                            <div class="col-3">
                                                <div class="pe-2">
                                                    <img src="../../public/img/p1.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="px-2">
                                                    <p class="title-product fs-4 m-0" style="color: var(--colortext1);">Áo thun bo cổ</p>
                                                    <div class=" d-flex m-0 py-1 fs-5" style="color: var(--colortext3);">
                                                        <p class="fs-5">Size(L)</p>
                                                        <i class="bi bi-dot fs-4"></i>
                                                        <p class="fs-5">Màu(Đen)</p>
                                                    </div>
                                                    <p class="my-3" style="font-size: 1.4rem; color: var(--colortext2);">Số lượng: 1</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <p class="text-end fs-4 fw-bold" style="color: var(--accent);">240.000đ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-3" style="border-top: 1px solid var(--colortext3);">
                                        <div class="d-flex align-items-baseline justify-content-between gap-4">
                                            <p class="my-2 fs-4" style="color: var(--colortext3);">Phí ship</p>
                                            <p class="my-2 fs-4 fw-bold" style="color: var(--colortext1);">+ 25.000đ</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="my-2 fs-4" style="color: var(--colortext3);">Voucher</p>
                                            <p class="my-2 fs-4 fw-bold" style="color: var(--colortext1);">- 25.000đ</p>
                                        </div>
                                    </div>
                                    <div class="py-3" style="border-top: 1px solid var(--colortext3);">
                                        <div class="d-flex align-items-center justify-content-end pos">
                                            <p class="my-2 fs-4 fw-bold chooseVoucher" @click="clickshowVoucher" ref="showVoucher" id="showVoucher">Chọn Voucher</p>
                                            <div class="voucherBox position-relative">
                                                <div v-if="isVoucherVisible" ref="voucherBox" class="cart-right-top" id="voucherBoxId">
                                                    <h4 class="fs-3 fw-semibold mb-3">Mã khuyến mãi</h4>
                                                    <form action="" class="d-flex align-items-center gap-2">
                                                        <input type="text" placeholder="Mã Voucher" style="width: 69%;" class="form-date d-block inputBorder">
                                                        <button type="submit"  class="btn-booknow mt-0">Áp dụng</button>
                                                    </form>
                                                    <hr class="line">
                                                    <div class="voucher-option">
                                                        <div class="voucher-option__item">
                                                            <div class="divimg"><img src="../../public/img/p1.png" class="img-fluid" alt=""></div>
                                                            <div class="py-3">
                                                                <p class="my-1 fw-semibold" style="font-size: 1.7rem;color: var(--accent);">Giảm 20.000đ</p>
                                                                <p class="mt-2 fs-5" style="color: var(--colortext3);">Đối với các đơn có giá trị trên 150.000đ</p>
                                                            </div>
                                                            <button class="btn-booknow fs-4 p-3 mt-3 me-3" style="width: 70px;">Lấy mã</button>
                                                        </div>
                                                        <div class="voucher-option__item">
                                                            <div class="divimg"><img src="../../public/img/voucher.jpg" class="img-fluid" alt=""></div>
                                                            <div class="py-3">
                                                                <p class="my-1 fw-semibold" style="font-size: 1.7rem;color: var(--accent);">Giảm 20.000đ</p>
                                                                <p class="mt-2 fs-5" style="color: var(--colortext3);">Đối với các đơn có giá trị trên 150.000đ</p>
                                                            </div>
                                                            <button class="btn-booknow fs-4 p-3 mt-3 me-3" style="width: 70px;">Lấy mã</button>
                                                        </div>
                                                        <div class="voucher-option__item">
                                                            <div class="divimg"><img src="../../public/img/voucher.jpg" class="img-fluid" alt=""></div>
                                                            <div class="py-3">
                                                                <p class="my-1 fw-semibold" style="font-size: 1.7rem;color: var(--accent);">Giảm 20.000đ</p>
                                                                <p class="mt-2 fs-5" style="color: var(--colortext3);">Đối với các đơn có giá trị trên 150.000đ</p>
                                                            </div>
                                                            <button class="btn-booknow fs-4 p-3 mt-3 me-3" style="width: 70px;">Lấy mã</button>
                                                        </div>
                                                        <div class="voucher-option__item">
                                                            <div class="divimg"><img src="../../public/img/voucher.jpg" class="img-fluid" alt=""></div>
                                                            <div class="py-3">
                                                                <p class="my-1 fw-semibold" style="font-size: 1.7rem;color: var(--accent);">Giảm 20.000đ</p>
                                                                <p class="mt-2 fs-5" style="color: var(--colortext3);">Đối với các đơn có giá trị trên 150.000đ</p>
                                                            </div>
                                                            <button class="btn-booknow fs-4 p-3 mt-3 me-3" style="width: 70px;">Lấy mã</button>
                                                        </div>
                                                        <div class="voucher-option__item">
                                                            <div class="divimg"><img src="../../public/img/voucher.jpg" class="img-fluid" alt=""></div>
                                                            <div class="py-3">
                                                                <p class="my-1 fw-semibold" style="font-size: 1.7rem;color: var(--accent);">Giảm 20.000đ</p>
                                                                <p class="mt-2 fs-5" style="color: var(--colortext3);">Đối với các đơn có giá trị trên 150.000đ</p>
                                                            </div>
                                                            <button class="btn-booknow fs-4 p-3 mt-3 me-3" style="width: 70px;">Lấy mã</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-3" style="border-top: 1px solid var(--colortext3);">
                                        <div class="d-flex align-items-baseline justify-content-between gap-4">
                                            <p class="my-2 fs-3 fw-semibold" style="color: var(--accent);">Tổng thành tiền</p>
                                            <p class="my-2 fs-3 fw-bold" style="color: var(--accent);">480.000đ</p>
                                        </div>
                                    </div>
                                    <RouterLink to="/thanhtoan" class="btn-find d-block mt-3" style="width: fit-content; padding: 16px 24px;">Thanh toán</RouterLink>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>