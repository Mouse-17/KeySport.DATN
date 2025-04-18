<script setup lang="ts">
import { ref, watch, onMounted } from "vue";
import { onClickOutside } from "@vueuse/core";
import { RouterLink } from "vue-router";

interface CartItem {
    id: number;
    productId: number;
    tenSanPham: string;
    anhDaiDien: string;
    gia: number;
    soLuong: number;
    mauId: number | null;
    sizeId: number | null;
}

const cartItems = ref<CartItem[]>([]);
const isLoading = ref(true);

// Tổng tiền giỏ hàng
const cartTotal = computed(() => {
    return cartItems.value.reduce((total, item) => total + (item.gia * item.soLuong), 0);
});

// Số lượng sản phẩm
const itemCount = computed(() => {
    return cartItems.value.reduce((count, item) => count + item.soLuong, 0);
});

// Lấy giỏ hàng từ localStorage
const loadCart = () => {
    isLoading.value = true;
    const cartString = localStorage.getItem('cart');
    if (cartString) {
        cartItems.value = JSON.parse(cartString);
    }
    isLoading.value = false;
};

// Cập nhật số lượng sản phẩm
const updateQuantity = (itemId: number, newQuantity: number) => {
    if (newQuantity < 1) newQuantity = 1;
    
    const index = cartItems.value.findIndex(item => item.id === itemId);
    if (index !== -1) {
        cartItems.value[index].soLuong = newQuantity;
        saveCart();
    }
};

// Xóa sản phẩm khỏi giỏ hàng
const removeItem = (itemId: number) => {
    cartItems.value = cartItems.value.filter(item => item.id !== itemId);
    saveCart();
};

// Lưu giỏ hàng vào localStorage
const saveCart = () => {
    localStorage.setItem('cart', JSON.stringify(cartItems.value));
};

// Xóa toàn bộ giỏ hàng
const clearCart = () => {
    if (confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng?')) {
        cartItems.value = [];
        saveCart();
    }
};

// Tiến hành thanh toán
const checkout = () => {
    alert('Chức năng thanh toán đang được phát triển!');
    // Ở đây bạn có thể chuyển hướng người dùng đến trang thanh toán
};

onMounted(() => {
    loadCart();
});
</script>

<template>
    <div class="container py-5">
        <h1 class="mb-4">Giỏ hàng của bạn</h1>
        
        <div v-if="isLoading" class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Đang tải...</span>
            </div>
        </div>
        
        <div v-else-if="cartItems.length === 0" class="text-center py-5">
            <p class="fs-4">Giỏ hàng của bạn đang trống</p>
            <a href="/" class="btn-primary mt-3">Tiếp tục mua sắm</a>
        </div>
        
        <div v-else>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in cartItems" :key="item.id">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img :src="'/public/img/img_sp/' + item.anhDaiDien" :alt="item.tenSanPham" 
                                         class="cart-item-image me-3">
                                    <div>
                                        <h5 class="mb-1">{{ item.tenSanPham }}</h5>
                                        <div v-if="item.mauId">Màu: {{ item.mauId }}</div>
                                        <div v-if="item.sizeId">Size: {{ item.sizeId }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ item.gia.toLocaleString('vi-VN') }}đ</td>
                            <td>
                                <div class="quantity-control">
                                    <button @click="updateQuantity(item.id, item.soLuong - 1)" class="quantity-btn">-</button>
                                    <input type="number" v-model="item.soLuong" min="1" 
                                           @change="updateQuantity(item.id, item.soLuong)" class="quantity-input">
                                    <button @click="updateQuantity(item.id, item.soLuong + 1)" class="quantity-btn">+</button>
                                </div>
                            </td>
                            <td>{{ (item.gia * item.soLuong).toLocaleString('vi-VN') }}đ</td>
                            <td>
                                <button @click="removeItem(item.id)" class="btn-remove">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="d-flex">
                        <button @click="clearCart" class="btn-outline me-3">Xóa giỏ hàng</button>
                        <a href="/" class="btn-outline">Tiếp tục mua sắm</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-summary">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Số lượng sản phẩm:</span>
                            <span>{{ itemCount }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-bold">Tổng tiền:</span>
                            <span class="fw-bold">{{ cartTotal.toLocaleString('vi-VN') }}đ</span>
                        </div>
                        <button @click="checkout" class="btn-checkout w-100">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.cart-item-image {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 4px;
}

.quantity-control {
    display: flex;
    align-items: center;
}

.quantity-btn {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f1f1f1;
    border: 1px solid #ddd;
    cursor: pointer;
}

.quantity-input {
    width: 50px;
    height: 30px;
    text-align: center;
    border: 1px solid #ddd;
    margin: 0 5px;
}

.btn-remove {
    background: none;
    border: none;
    color: #dc3545;
    cursor: pointer;
    font-size: 1.5rem;
}

.btn-primary, .btn-outline, .btn-checkout {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    font-size: 1.4rem;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: var(--primary);
    color: white;
    border: none;
}

.btn-outline {
    background-color: transparent;
    color: var(--primary);
    border: 1px solid var(--primary);
}

.btn-checkout {
    background-color: var(--accent);
    color: white;
    border: none;
    padding: 12px 24px;
}

.cart-summary {
    background-color: #f8f9fa;
    border-radius: 4px;
    padding: 20px;
    font-size: 1.5rem;
}

.table {
    font-size: 1.4rem;
}

th, td {
    vertical-align: middle;
}
</style>