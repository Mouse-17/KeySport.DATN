<script setup lang="ts">
    import {ref, onMounted, watch} from 'vue';
    import { useRoute, useRouter } from 'vue-router';
    import type {LocationQueryValue} from 'vue-router';
    import type {Product} from '../stores/product';
    import axios from 'axios';
    import App from '@/App.vue';

    const route = useRoute();
    const router = useRouter();
    const products = ref<Product[]>([]);
    const bestseller = ref<Product[]>([]);
    const currentPage = ref(1);
    const lastPage = ref(1);
    const totalItems = ref(0);
    const perPage = ref(9);
    const isLoading = ref(false);

    // Hàm lấy danh sách sản phẩm
    const fetchProducts = async () => {
        try {
            isLoading.value = true;
            const response = await fetch(`http://localhost:8000/api/sanpham?trang=${currentPage.value}&tukhoa=${route.query.tukhoa || ''}`);
            const data = await response.json();
            
            if (data.status == 'success') {
                products.value = data.data;
                currentPage.value = data.pagination.current_page;
                lastPage.value = data.pagination.last_page;
                totalItems.value = data.pagination.total;
                perPage.value = data.pagination.per_page;
            }
        } catch (error) {
            console.error('Lỗi khi tải sản phẩm:', error);
        } finally {
            isLoading.value = false;
        }
    };

    // Hàm xử lý khi chuyển trang
    const handlePageChange = (page: number) => {
        if (page < 1 || page > lastPage.value) return;
        
        // Cập nhật URL
        router.push({
            path: route.path,
            query: { ...route.query, trang: page }
        });
    };

    // Khi component được mount
    onMounted(() => {
        currentPage.value = parseInt(route.query.trang as string) || 1;
        fetchProducts();
    });

    // Theo dõi thay đổi của route để cập nhật dữ liệu
    watch(() => route.query, () => {
        currentPage.value = parseInt(route.query.trang as string) || 1;
        fetchProducts();
    }, { immediate: true });

    // lấy bestseller
    const fetchBestseller = async () => {
        try {
            const response = await fetch('http://localhost:8000/api/sanphambanchay');
            const data = await response.json();
            if (data.status == 'success' && Array.isArray(data.data)) {
                bestseller.value = data.data;
                // console.log(bestseller.value);
            }
        } catch (error) {
            console.error('Lỗi khi tải sản phẩm bán chạy:', error);
        }
    }

    onMounted(() => {
        fetchBestseller();
    });

    // Hàm xử lý khi thay đổi bộ lọc
    const sort = ref('Phổ biến');
    const price = ref('');
    const category = ref('');
    const brand = ref('');
    const rating = ref('');
    const sortProduct = async () => {
        try {
            isLoading.value = true;
            const response = await axios.post('http://localhost:8000/api/sanpham/boloc', {
                popular: sort.value,
                price: price.value,
                category: category.value,
                brand: brand.value,
                // rating: Number(rating.value),
                page: currentPage.value
            });
            // console.log(sort.value);
            // console.log(price.value);
            // console.log(category.value);
            // console.log(brand.value);
            // console.log(rating.value);
            
            if (response.data.status == 'success') {
                products.value = response.data.data;
                currentPage.value = response.data.pagination.current_page;
                lastPage.value = response.data.pagination.last_page;
                totalItems.value = response.data.pagination.total;
                perPage.value = response.data.pagination.per_page;
            } else {
                console.error('Lỗi khi lọc sản phẩm:', response.data.message);
            }
        } catch (error) {
            console.error('Lỗi:', error);
        } finally {
            isLoading.value = false;
        }
    };

    // Thêm watcher để theo dõi thay đổi của các bộ lọc
    watch([sort, price, category, brand, rating], () => {
        currentPage.value = 1; // Reset về trang đầu tiên khi thay đổi bộ lọc
        sortProduct();
    });

    // Khởi tạo giá trị mặc định cho các bộ lọc
    onMounted(() => {
        sort.value = 'Phổ biến';
        price.value = '';
        category.value = '';
        brand.value = '';
        rating.value = '';
    });

    const addCart = (product: Product) => {
        // console.log(product);
        showQuickAddModal.value = true;
        selectedProduct.value = product;
        // Reset các giá trị đã chọn trước đó
        selectedQuantity.value = 1;
        // Size và màu sẽ được thiết lập trong fetchProductOptions
    }

    // Thêm mới: Xử lý mở popup chọn size, màu, số lượng
    const showQuickAddModal = ref(false);
    const selectedProduct = ref<Product | null>(null);
    const selectedSize = ref('');
    const selectedColor = ref('');
    const selectedQuantity = ref(1);
    const availableSizes = ref<string[]>([]);
    const availableColors = ref<string[]>([]);
    
    // Lấy sizes và colors cho sản phẩm từ database
    const fetchProductOptions = async (productId: number) => {
        try {
            // API endpoint để lấy thông tin size và màu
            const response = await fetch(`http://localhost:8000/api/sanpham/giohang/${productId}`);
            const data = await response.json();
            
            if (data.status == 'success') {
                // Lấy thông tin từ API
                const productData = data.data;
                
                // Lấy kích thước từ API
                if (productData.sizes && Array.isArray(productData.sizes) && productData.sizes.length > 0) {
                    availableSizes.value = productData.sizes;
                } else {
                    // Fallback nếu API không trả về sizes
                    setDefaultSizes(productData.categoryId);
                }
                
                // Lấy màu sắc từ API
                if (productData.colors && Array.isArray(productData.colors) && productData.colors.length > 0) {
                    availableColors.value = productData.colors;
                } else {
                    // Fallback nếu API không trả về colors
                    setDefaultColors(productData.categoryId);
                }
                
                // Đặt giá trị mặc định cho size và màu
                if (availableSizes.value.length > 0) {
                    selectedSize.value = availableSizes.value[0];
                }
                if (availableColors.value.length > 0) {
                    selectedColor.value = availableColors.value[0];
                }
            } else {
                // Fallback khi API thất bại - sử dụng thông tin categoryId từ product
                if (selectedProduct.value && selectedProduct.value.id_danhmuc) {
                    setDefaultSizes(selectedProduct.value.id_danhmuc);
                    setDefaultColors(selectedProduct.value.id_danhmuc);
                } else {
                    // Fallback dựa trên productId nếu không có categoryId
                    setDefaultSizesByProductId(productId);
                    setDefaultColorsByProductId(productId);
                }
                
                // Đặt giá trị mặc định
                if (availableSizes.value.length > 0) {
                    selectedSize.value = availableSizes.value[0];
                }
                if (availableColors.value.length > 0) {
                    selectedColor.value = availableColors.value[0];
                }
            }
        } catch (error) {
            console.error('Lỗi khi lấy thông tin size và màu:', error);
            // Fallback giá trị mặc định khi có lỗi
            if (selectedProduct.value && selectedProduct.value.id_danhmuc) {
                setDefaultSizes(selectedProduct.value.id_danhmuc);
                setDefaultColors(selectedProduct.value.id_danhmuc);
            } else {
                setDefaultSizesByProductId(productId);
                setDefaultColorsByProductId(productId);
            }
            
            // Đặt giá trị mặc định
            if (availableSizes.value.length > 0) {
                selectedSize.value = availableSizes.value[0];
            }
            if (availableColors.value.length > 0) {
                selectedColor.value = availableColors.value[0];
            }
        }
    };
    
    // Thiết lập size mặc định theo danh mục
    const setDefaultSizes = (categoryId: number) => {
        if (categoryId == 1) { // Giày
            availableSizes.value = ['35', '36', '37', '38', '39', '40', '41', '42'];
        } else if (categoryId == 2 || categoryId == 3) { // Áo
            availableSizes.value = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        } else if (categoryId == 4) { // Quần
            availableSizes.value = ['28', '29', '30', '31', '32', '33', '34', '36'];
        } else {
            availableSizes.value = [];
        }
    };
    
    // Thiết lập màu mặc định theo danh mục
    const setDefaultColors = (categoryId: number) => {
        if (categoryId == 1) { // Giày
            availableColors.value = ['ffc0cb', '008000', '000000', 'ffffff'];
        } else if (categoryId == 2 || categoryId == 3) { // Áo
            availableColors.value = ['000000', 'ffffff', '0000ff', 'ff0000'];
        } else if (categoryId == 4) { // Quần
            availableColors.value = ['000000', '0000ff', 'cccccc'];
        } else {
            availableColors.value = ['000000', 'ffffff'];
        }
    };
    
    // Thiết lập size mặc định dựa trên productId khi không có categoryId
    const setDefaultSizesByProductId = (productId: number) => {
        const idStr = productId.toString();
        if (idStr.includes('1')) { // Giày
            availableSizes.value = ['35', '36', '37', '38', '39', '40', '41', '42'];
        } else if (['2', '3'].includes(idStr)) { // Áo
            availableSizes.value = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        } else if (idStr.includes('4')) { // Quần
            availableSizes.value = ['28', '29', '30', '31', '32', '33', '34', '36'];
        } else {
            availableSizes.value = [];
        }
    };
    
    // Thiết lập màu mặc định dựa trên productId khi không có categoryId
    const setDefaultColorsByProductId = (productId: number) => {
        const idStr = productId.toString();
        if (idStr.includes('1')) { // Giày
            availableColors.value = ['ffc0cb', '008000', '000000', 'ffffff'];
        } else if (['2', '3'].includes(idStr)) { // Áo
            availableColors.value = ['000000', 'ffffff', '0000ff', 'ff0000'];
        } else if (idStr.includes('4')) { // Quần
            availableColors.value = ['000000', '0000ff', 'cccccc'];
        } else {
            availableColors.value = ['000000', 'ffffff'];
        }
    };
    
    // Tăng/giảm số lượng
    const increaseQuantity = () => {
        selectedQuantity.value++;
    };
    
    const decreaseQuantity = () => {
        if (selectedQuantity.value > 1) {
            selectedQuantity.value--;
        }
    };
    
    // Thêm sản phẩm vào giỏ hàng với options đã chọn
    const addToCart = () => {
        if (!selectedProduct.value) return;
        
        // Tạo đối tượng sản phẩm để thêm vào giỏ hàng
        const cartItem = {
            id: selectedProduct.value.id,
            name: selectedProduct.value.Ten_san_pham,
            price: selectedProduct.value.Gia,
            quantity: selectedQuantity.value,
            image: selectedProduct.value.Anh_dai_dien,
            color: selectedColor.value,
            size: selectedSize.value,
            selected: true,
            categoryId: selectedProduct.value.id_danhmuc
        };
        
        // Lấy giỏ hàng hiện có từ localStorage
        let cart = [];
        const existingCart = localStorage.getItem('cart');
        if (existingCart) {
            try {
                cart = JSON.parse(existingCart);
            } catch (error) {
                console.error('Lỗi khi đọc giỏ hàng từ localStorage:', error);
                cart = [];
            }
        }
        
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa (cùng id, size, color)
        const existingItemIndex = cart.findIndex((item: any) => 
            item.id == cartItem.id && 
            item.size == cartItem.size && 
            item.color == cartItem.color
        );
        
        if (existingItemIndex !== -1) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            cart[existingItemIndex].quantity += cartItem.quantity;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới
            cart.push(cartItem);
        }
        
        // Lưu giỏ hàng vào localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Đóng modal
        showQuickAddModal.value = false;
        selectedProduct.value = null;
        selectedQuantity.value = 1;
        
        // Thông báo đã thêm vào giỏ hàng
        alert('Đã thêm vào giỏ hàng');
    };
    
    // Theo dõi khi sản phẩm được chọn
    watch(selectedProduct, (newProduct) => {
        if (newProduct) {
            fetchProductOptions(newProduct.id || 0);
        }
    });

</script>
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
                            <form @submit.prevent="sortProduct" class="aside-container p-4">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <select v-model="sort" class="form-date w-100 mt-2 select-sort">
                                    <option value="Phổ biến">Phổ biến</option>
                                    <option value="Mới nhất">Mới nhất</option>
                                    <option value="Cũ nhất">Cũ nhất</option>
                                </select>
                        
                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Giá</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="price" value="Thấp - Cao" class="form-check-input" type="radio" name="price" id="low-to-high">
                                    <label class="form-check-label" for="low-to-high">Thấp - Cao</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="price" value="Cao - Thấp" class="form-check-input" type="radio" name="price" id="high-to-low">
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
                                        <input v-model="rating" value="5" class="form-check-input" type="radio" name="rating" id="rating-5">
                                        <label class="form-check-label star-label" for="rating-5">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input v-model="rating" value="4" class="form-check-input" type="radio" name="rating" id="rating-4">
                                        <label class="form-check-label star-label" for="rating-4">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input v-model="rating" value="3" class="form-check-input" type="radio" name="rating" id="rating-3">
                                        <label class="form-check-label star-label" for="rating-3">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input v-model="rating" value="2" class="form-check-input" type="radio" name="rating" id="rating-2">
                                        <label class="form-check-label star-label" for="rating-2">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center gap-3">
                                        <input v-model="rating" value="1" class="form-check-input" type="radio" name="rating" id="rating-1">
                                        <label class="form-check-label star-label" for="rating-1">
                                            <i class="bi bi-star-fill color-star fs-5"></i>
                                        </label>
                                    </div>
                                </div>
                        
                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Thương hiệu</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Yonex" class="form-check-input" type="radio" name="brand" id="yonex">
                                    <label class="form-check-label" for="yonex">Yonex</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Lining" class="form-check-input" type="radio" name="brand" id="lining">
                                    <label class="form-check-label" for="lining">Lining</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Victor" class="form-check-input" type="radio" name="brand" id="victor">
                                    <label class="form-check-label" for="victor">Victor</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Mizuno" class="form-check-input" type="radio" name="brand" id="mizuno">
                                    <label class="form-check-label" for="mizuno">Mizuno</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Asics" class="form-check-input" type="radio" name="brand" id="asics">
                                    <label class="form-check-label" for="asics">Asics</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Mikasa" class="form-check-input" type="radio" name="brand" id="mikasa">
                                    <label class="form-check-label" for="mikasa">Mikasa</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Adidas" class="form-check-input" type="radio" name="brand" id="adidas">
                                    <label class="form-check-label" for="adidas">Adidas</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="brand" value="Nike" class="form-check-input" type="radio" name="brand" id="nike">
                                    <label class="form-check-label" for="nike">Nike</label>
                                </div>

                                <hr class="line">
                                <h3 class="section-title mt-3 text-start">Danh mục</h3>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="category" value="2" class="form-check-input" type="radio" name="category" id="aothun">
                                    <label class="form-check-label" for="aothun">Áo thun</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="category" value="3" class="form-check-input" type="radio" name="category" id="polo">
                                    <label class="form-check-label" for="polo">Áo Polo</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="category" value="4" class="form-check-input" type="radio" name="category" id="quan">
                                    <label class="form-check-label" for="quan">Quần</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="category" value="1" class="form-check-input" type="radio" name="category" id="giay">
                                    <label class="form-check-label" for="giay">Giày</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="category" value="5" class="form-check-input" type="radio" name="category" id="dungcu">
                                    <label class="form-check-label" for="dungcu">Dụng cụ thể thao</label>
                                </div>
                                <div class="form-check d-flex align-items-center gap-3">
                                    <input v-model="category" value="6" class="form-check-input" type="radio" name="category" id="khac">
                                    <label class="form-check-label" for="khac">Phụ kiên khác</label>
                                </div>
                            </form>
                        </div>
                    </aside>
                    <div class="col-lg-9">
                        <div class="d-flex justify-content-between align-items-center m-3">
                            <p class="fs-4 m-0" style="color: var(--colortext2)">
                                Hiển thị {{ products.length }} trong tổng số {{ totalItems }} sản phẩm
                            </p>
                            <p class="fs-4 m-0" style="color: var(--colortext2)">
                                Trang {{ currentPage }} / {{ lastPage }}
                            </p>
                                        </div>

                        <div v-if="isLoading" class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Đang tải...</span>
                            </div>
                        </div>

                        <div v-else-if="products.length > 0" class="row gx-0">
                            <div class="col-12 col-lg-4 col-md-6 p-0" v-for="product in products" :key="product.id">
                                <div class="product my-3">
                                    <a :href="`/sanpham/${product.id}`" class="link-img-p">
                                        <img :src="`/public/img/img_sp/${product.Anh_dai_dien}`" 
                                             :alt="product.Ten_san_pham || 'Sản phẩm'" 
                                             class="img-fluid">
                                    </a>
                                    <div class="product-infor">
                                        <a :href="`/sanpham/${product.id}`" class="m-0 title-product fs-3">
                                            {{ product.Ten_san_pham || 'Tên sản phẩm' }}
                                        </a>
                                        <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                            <template v-for="star in 5" :key="star">
                                                <i 
                                                    class="bi bi-star-fill fs-5" 
                                                    :class="star <= (product.diem_trung_binh || 0) ? 'color-star' : 'color-star-gray'"
                                                ></i>
                                            </template>
                                            <p class="text-rating m-0 ms-3 fs-4">
                                                ({{ product.diem_trung_binh || 0 }}/5)
                                            </p>
                                        </div>
                                        <div class="text-location py-2">
                                            <p class="m-0">{{ product.Mo_ta || 'Chưa có mô tả' }}</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 text-location">
                                            <i class="bi bi-eye"></i>
                                            <p class="custom-open m-0">Lượt xem: {{ product.view || 0 }}</p>
                                        </div>
                                        <div class="price d-flex align-items-end gap-4">
                                            <p class="m-0">{{ (product.Gia || 0).toLocaleString('vi-VN') }}đ</p>
                                            <del v-if="product.gia_giam">{{ product.gia_giam.toLocaleString('vi-VN') }}đ</del>
                                        </div>
                                    </div>
                                    <div class="atc-love-box">
                                        <a href="#" class="atc-love"><i class="bi bi-heart-fill"></i></a>
                                        <div @click="addCart(product)" class="atc-love atc-icon">
                                            <i class="bi bi-cart-fill"></i>
                                            <div class="select_number-size">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else class="col-12 text-center py-5">
                            <p>Không tìm thấy sản phẩm nào</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center gap-2 mt-4">
                            <button 
                                class="btn-pagination" 
                                :disabled="currentPage == 1"
                                @click="handlePageChange(currentPage - 1)"
                            >
                                <i class="bi bi-chevron-left fs-4"></i>
                            </button>
                            
                            <template v-for="pages in lastPage" :key="page">
                                <button 
                                    class="btn-pagination"
                                    :class="{ active: pages == currentPage }"
                                    @click="handlePageChange(pages)"
                                >
                                    {{ pages }}
                                </button>
                            </template>
                            
                            <button 
                                class="btn-pagination" 
                                :disabled="currentPage == lastPage"
                                @click="handlePageChange(currentPage + 1)"
                            >
                                <i class="bi bi-chevron-right fs-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-y mx-lg-auto mx-2">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3 px-2">
                    <h1 class="title-section">SẢN PHẨM BÁN CHẠY</h1>
                </div>
                <div class="row gx-0 bestseller-product-srcoll" v-if="bestseller.length > 0">
                    <div class="col-12 col-lg-3 col-md-6 p-0" v-for="bestsellerp in bestseller" :key="bestsellerp.id">
                        <div class="product my-3">
                            <a :href="`/sanpham/${bestsellerp.id}`" class="link-img-p">
                                <img :src="`/public/img/img_sp/${bestsellerp.Anh_dai_dien}`" 
                                     :alt="bestsellerp.Ten_san_pham || 'Sản phẩm'" 
                                     class="img-fluid">
                            </a>
                            <div class="product-infor">
                                <a :href="`/sanpham/${bestsellerp.id}`" class="m-0 title-product fs-3">
                                    {{ bestsellerp.Ten_san_pham || 'Tên sản phẩm' }}
                                </a>
                                <div class="d-flex align-items-center gap-2 pt-1 pb-2">
                                    <template v-for="star in 5" :key="star">
                                    <i class="bi bi-star-fill color-star fs-5"></i>
                                    </template>
                                    <p class="text-rating m-0 ms-3 fs-4">
                                        (5/5)
                                    </p>
                                </div>
                                <div class="text-location py-2">
                                    <p class="m-0">{{ bestsellerp.Mo_ta || 'Chưa có mô tả' }}</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-location">
                                    <i class="bi bi-eye"></i>
                                    <p class="custom-open m-0">Lượt xem: {{ bestsellerp.view || 0 }}</p>
                                </div>
                                <div class="price d-flex align-items-end gap-4">
                                    <p class="m-0">{{ (bestsellerp.Gia || 0).toLocaleString('vi-VN') }}đ</p>
                                    <del v-if="bestsellerp.gia_giam">{{ bestsellerp.gia_giam.toLocaleString('vi-VN') }}đ</del>
                                </div>
                            </div>
                            <div class="atc-love-box">
                                <a href="#" class="atc-love"><i class="bi bi-heart-fill"></i></a>
                                <div @click="addCart(bestsellerp)" class="atc-love atc-icon">
                                    <i class="bi bi-cart-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal chọn size, màu và số lượng -->
    <div v-if="showQuickAddModal && selectedProduct" class="quick-add-modal">
        <div class="quick-add-content">
            <div class="quick-add-header">
                <h5 class="fs-3">Thêm vào giỏ hàng</h5>
                <button @click="showQuickAddModal = false" class="close-btn">&times;</button>
            </div>
            <div class="quick-add-body">
                <div class="product-info d-flex mb-3">
                    <img 
                        v-if="selectedProduct.Anh_dai_dien" 
                        :src="`/public/img/img_sp/${selectedProduct.Anh_dai_dien}`" 
                        :alt="selectedProduct.Ten_san_pham" 
                        class="product-thumbnail"
                    >
                    <div class="ms-3">
                        <h6 class="fs-4">{{ selectedProduct.Ten_san_pham }}</h6>
                        <p class="price fs-4 fw-bold" style="color: var(--accent)">{{ selectedProduct.Gia?.toLocaleString('vi-VN') }}đ</p>
                    </div>
                </div>

                <!-- Màu sắc -->
                <div class="mb-3" v-if="availableColors.length > 0">
                    <h5>Màu sắc:</h5>
                    <div class="color-options">
                        <div 
                            v-for="color in availableColors" 
                            :key="color"
                            class="color-option" 
                            :class="{ active: selectedColor == color }"
                            :style="{ backgroundColor: `#${color}` }"
                            @click="selectedColor = color"
                        ></div>
                    </div>
                </div>

                <!-- Kích thước -->
                <div class="mb-3" v-if="availableSizes.length > 0">
                    <h5>Kích thước:</h5>
                    <div class="size-options">
                        <div 
                            v-for="size in availableSizes" 
                            :key="size"
                            class="size-option fs-5" 
                            :class="{ active: selectedSize === size }"
                            @click="selectedSize = size"
                        >
                            {{ size }}
                        </div>
                    </div>
                </div>

                <!-- Số lượng -->
                <div class="mb-3">
                    <h5>Số lượng:</h5>
                    <div class="d-flex">
                            <i class="bi bi-dash" @click="decreaseQuantity"></i>
                            <span class="cart-quantity mx-0 fs-4" style="width: 8px;">{{ selectedQuantity }}</span>
                            <i class="bi bi-plus" @click="increaseQuantity"></i>
                        </div>
                </div>
            </div>
            <div class="quick-add-footer">
                <button @click="addToCart" class="btn-booknow px-4 py-3 fs-4 mt-0">Thêm</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.btn-pagination {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    background: white;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    &:hover{
        background-color: #ca9c2726 !important;
        color: var(--accent) !important;
        border-color: var(--accent) !important;
    }
}

.btn-pagination:hover:not(:disabled) {
    background: var(--colortext2);
    color: white;
    border-color: var(--colortext2);
}

.btn-pagination.active {
    background: var(--accent);
    color: white;
    border-color: var(--accent);
}

.btn-pagination:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.color-star {
    color: var(--hover2);
}

.color-star-gray {
    color: #ddd;
}

.bestseller-product-srcoll {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
}

/* CSS cho modal chọn kích thước, màu sắc và số lượng */
.quick-add-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.quick-add-content {
    background-color: white;
    border-radius: 8px;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.quick-add-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #eee;
}

.quick-add-header h5 {
    margin: 0;
    font-weight: 600;
    color: var(--colortext1);
}

.close-btn {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #999;
}

.quick-add-body {
    padding: 15px;
}

.product-thumbnail {
    width: 70px;
    height: 70px;
    object-fit: contain;
    border: 1px solid #eee;
    border-radius: 4px;
}

.color-options, .size-options {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 8px;
}

.color-option {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid #ddd;
    cursor: pointer;
    transition: transform 0.2s;
}

.color-option.active {
    transform: scale(1.1);
    border: 2px solid var(--accent);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

.size-option {
    min-width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
    user-select: none;
}

.size-option.active {
    background-color: var(--accent);
    color: white;
    border-color: var(--accent);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

.size-option:hover {
    border-color: var(--accent);
    background-color: rgba(202, 156, 39, 0.1);
}

.quantity-control {
    display: flex;
    align-items: center;
    width: fit-content;
}

.quantity-btn {
    width: 40px;
    height: 40px;
    border: none;
    background: #f5f5f5;
    font-size: 18px;
    cursor: pointer;
}

.quantity-value {
    width: 50px;
    text-align: center;
    font-size: 16px;
}

/* Styling for the quantity selector in the modal */
.quantity-control .bi-dash, 
.quantity-control .bi-plus {
    font-size: 2rem;
    cursor: pointer;
    color: var(--accent);
    padding: 0 15px;
}

.cart-quantity {
    margin: 0 15px;
    font-weight: 500;
}

.quick-add-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 15px;
    border-top: 1px solid #eee;
}

.btn-cancel {
    background: #f5f5f5;
    border: none;
    color: var(--colortext1);
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-add-cart {
    background-color: var(--accent);
    border: none;
    color: white;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
}
</style>

