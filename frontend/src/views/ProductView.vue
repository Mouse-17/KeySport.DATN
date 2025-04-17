<template>
    <main>
        <section class="booking py-4">
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
                            <option selected>Thương hiệu</option>
                            <option>Yonex</option>
                            <option>Li-ning</option>
                            <option>Victor</option>
                            <option>Mizuno</option>
                            <option>Asics</option>
                            <option>Mikasa</option>
                            <option>Adidas</option>
                            <option>Nike</option>
                            <option>Puma</option>
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
                            <option selected>Danh mục</option>
                            <option value="">Áo thun</option>
                            <option value="">Quần</option>
                            <option value="">Giày</option>
                            <option value="">Băng đô</option>
                            <option value="">Các loại vợt</option>
                            <option value="">Các loại bóng</option>
                            <option value="">Phụ kiện khác</option>
                        </select>
                    </form>
                </div>
                <div class="row gx-0">
                    <aside class="col-12 col-lg-3 col-md-6 p-0 mt-2 sticky-aside">
                        <div class="me-3">
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
                                <h3 class="section-title mt-3 text-start">Thương hiệu</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="yonex">
                                    <label class="form-check-label" for="yonex">Yonex</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="lining">
                                    <label class="form-check-label" for="lining">Lining</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="victor">
                                    <label class="form-check-label" for="victor">Victor</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="mizuno">
                                    <label class="form-check-label" for="mizuno">Mizuno</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="asics">
                                    <label class="form-check-label" for="asics">Asics</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="mikasa">
                                    <label class="form-check-label" for="mikasa">Mikasa</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="adidas">
                                    <label class="form-check-label" for="adidas">Adidas</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="brand" id="nike">
                                    <label class="form-check-label" for="nike">Nike</label>
                                </div>

                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Danh mục</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="aothun">
                                    <label class="form-check-label" for="aothun">Áo thun</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="polo">
                                    <label class="form-check-label" for="polo">Áo Polo</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="quan">
                                    <label class="form-check-label" for="quan">Quần</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="giay">
                                    <label class="form-check-label" for="giay">Giày</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="bando">
                                    <label class="form-check-label" for="bando">Băng đô</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="vot">
                                    <label class="form-check-label" for="vot">Các loại vợt</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="bong">
                                    <label class="form-check-label" for="bong">Các loại bóng</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input class="form-check-input" type="radio" name="category" id="khac">
                                    <label class="form-check-label" for="khac">Phụ kiên khác</label>
                                </div>
                            </form>
                        </div>
                    </aside>
                    <div class="col-lg-9">
                        <p class="fs-4 m-3" style="color: var(--colortext2)">Có 10 kết quả được hiển thị</p>
                        <div class="row gx-0">
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                            <div class="col-12 col-lg-4 col-md-6 p-0">
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
                        <div class="d-flex justify-content-center align-items-end gap-2 mt-4">
                            <a href="#" class="btn-pagination">
                                <i class="bi bi-chevron-left fs-4"></i>
                            </a>
                            <a href="#" class="btn-pagination">1</a>
                            <a href="#" class="btn-pagination active">2</a>
                            <a href="#" class="btn-pagination">3</a>
                            <div class="fs-4">...</div>
                            <a href="#" class="btn-pagination">
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
                    <h1 class="title-section">SẢN PHẨM BÁN CHẠY</h1>
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
</template>
