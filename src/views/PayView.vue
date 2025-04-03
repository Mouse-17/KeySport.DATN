<template>
    <main>
        <section class="pay py-5" style="background-color: var(--bg3);">
            <div class="container">
                <div class="row justify-content-between gx-0">
                    <div class="col-12 col-lg-4 custom-position-sticky">
                        <h1 class="text-start m-0 pb-4 fs-1 mx-2">Đơn hàng</h1>
                        <div class="mx-2">
                            <div class="py-4" style="border-top: 1px solid var(--colortext3);">
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
                            <div class="py-4" style="border-top: 1px solid var(--colortext3);">
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
                            <div class="py-4" style="border-top: 1px solid var(--colortext3);">
                                <div class="d-flex align-items-baseline justify-content-between gap-4">
                                    <p class="my-2 fs-4" style="color: var(--colortext3);">Phí ship</p>
                                    <p class="my-2 fs-4 fw-bold" style="color: var(--colortext1);">+ 25.000đ</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="my-2 fs-4" style="color: var(--colortext3);">Voucher</p>
                                    <p class="my-2 fs-4 fw-bold" style="color: var(--colortext1);">- 25.000đ</p>
                                </div>
                            </div>
                            <div class="py-4" style="border-top: 1px solid var(--colortext3);">
                                <div class="d-flex align-items-baseline justify-content-between gap-4">
                                    <p class="my-2 fs-3" style="color: var(--accent);">Tổng thành tiền</p>
                                    <p class="my-2 fs-3 fw-bold" style="color: var(--accent);">480.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <h1 class="text-start mx-2 m-0 pb-4 fs-1">Thông tin thanh toán</h1>
                        <form action="" method="post">
                            <h3 class="fs-3 fw-semibold text-start mx-2 pt-4" style="border-top: 1px solid var(--colortext3);">Phương thức thanh toán</h3>
                            <div class="pb-3 mx-2">
                                <div class="form-check my-3 d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="payment" id="momo">
                                    <label class="form-check-label fs-4 pt-1" for="momo">Ví momo</label>
                                </div>
                                <div class="form-check my-3 d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="payment" id="ebank">
                                    <label class="form-check-label fs-4 pt-1" for="ebank">Thanh toán ngân hàng</label>
                                </div>
                                <div class="form-check my-3 d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="radio" name="payment" id="off">
                                    <label class="form-check-label fs-4 pt-1" for="off">Thanh toán trực tiếp</label>
                                </div>
                            </div>
                            <div class="px-2">
                                <input type="text" class="form-date d-block w-100 inputBorderPay" placeholder="Lời nhắn cho shop">
                            </div>
                            <div class="">
                                <h3 class="fs-3 fw-semibold text-start mx-2 mt-5">Thông tin người nhận</h3>
                                <div class="row justify-content-between gx-0">
                                    <div class="col-12 col-lg-6 my-3">
                                        <div class="px-2">
                                            <input type="text" class="form-date d-block w-100 inputBorderPay" placeholder="Họ tên">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 my-3">
                                        <div class="px-2">
                                            <input type="text" class="form-date d-block w-100 inputBorderPay" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 my-3">
                                        <div class="px-2">
                                            <input type="text" class="form-date d-block w-100 inputBorderPay" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 my-3">
                                        <div class="px-2">
                                            <input type="text" class="form-date d-block w-100 inputBorderPay" placeholder="Địa chỉ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-find px-5 mt-4 fw-semibold mx-2" style="width: fit-content; font-size: 1.7rem;">Thanh toán</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>