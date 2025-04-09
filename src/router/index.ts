import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import YardOwnerView from '@/views/chủ sân/FormAddYardView.vue';

const routesadmin = [
  // admin
  {
    path: '/admin',
    name: 'Trang chủ admin',
    component: () => import('../views/admin/AdminView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlidanhmuc',
    name: 'Quản lí danh mục',
    component: () => import('../views/admin/AdminCategoryView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlisanpham',
    name: 'Quản lí sản phẩm',
    component: () => import('../views/admin/AdminProductView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlidonhang',
    name: 'Quản lí đơn hàng',
    component: () => import('../views/admin/AdminOrderView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlinguoidung',
    name: 'Quản lí người dùng',
    component: () => import('../views/admin/AdminUserView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlibinhluan',
    name: 'Quản lí bình luận',
    component: () => import('../views/admin/AdminCommentView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlibaiviet',
    name: 'Quản lí bài viết',
    component: () => import('../views/admin/AdminBlogView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/quanlidanhgia',
    name: 'Quản lí đánh giá',
    component: () => import('../views/admin/AdminRatingView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/themdanhmuc',
    name: 'Thêm danh mục',
    component: () => import('../views/admin/FormAddCategory.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/themsanpham',
    name: 'Thêm sản phẩm',
    component: () => import('../views/admin/FormAddProduct.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/admin/thembaiviet',
    name: 'Thêm bài viết',
    component: () => import('../views/admin/FormAddBlog.vue'),
    meta: { hideHeaderFooter: true },
  },
];
const routeuser = [
  {
    path: '/',
    name: 'Trang chủ',
    component: HomeView,
  },
  {
    path: '/login',
    name: 'Đăng nhập',
    component: () => import('../views/LoginView.vue'),
  },
  {
    path: '/quenmatkhau',
    name: 'Quên mật khẩu',
    component: () => import('../views/ForgotPasswordView.vue'),
  },
  {
    path: '/dangky',
    name: 'Đăng ký',
    component: () => import('../views/RegisterView.vue'),
  },
  {
    path: '/booking',
    name: 'Booking',
    component: () => import('../views/BookingView.vue'),
  },
  {
    path: '/sanpham',
    name: 'Sản phẩm',
    component: () => import('../views/ProductView.vue'),
  },
  {
    path: '/gioithieu',
    name: 'Giới thiệu',
    component: () => import('../views/AboutView.vue'),
  },
  {
    path: '/lienhe',
    name: 'Liên hệ',
    component: () => import('../views/ContactView.vue'),
  },
  {
    path: '/tintuc',
    name: 'Tin tức',
    component: () => import('../views/NewsView.vue'),
  },
  {
    path: '/chitietsanpham/:id',
    name: 'Chi tiết sản phẩm',
    component: () => import('../views/ProductDetailView.vue'),
  },
  {
    path: '/giohang',
    name: 'Giỏ hàng',
    component: () => import('../views/CartView.vue'),
  },
  {
    path: '/thanhtoan',
    name: 'Thanh toán',
    component: () => import('../views/PayView.vue'),
  },
  {
    path: '/bookingchitiet/:id',
    name: 'Chi tiết booking',
    component: () => import('../views/BookingDetailView.vue'),
  },

  // chủ sân
  {
    path: '/chusan',
    name: 'Chủ sân',
    component: () => import('../views/chủ sân/AnalyticsView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/themsanmoi',
    name: 'Thêm sân',
    component: () => import('../views/chủ sân/FormAddYardView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/lichsan',
    name: 'Lịch sân',
    component: () => import('../views/chủ sân/BookingCalendarView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/pheduyet',
    name: 'Chờ phê duyệt',
    component: () => import('../views/AcceptView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/khyeuthich',
    name: 'Khách hàng',
    component: () => import('../views/chủ sân/CustomerLoveView.vue'),
    meta: { hideHeaderFooter: true },
  },
  {
    path: '/suasan',
    name: 'Chỉnh sửa thông tin sân',
    component: () => import('../views/chủ sân/FormEditYardView.vue'),
    meta: { hideHeaderFooter: true },
  },
  // {
  //   path: '/test',
  //   name: 'Test',
  //   component: () => import('../views/test.vue'),
  //   meta: { hideHeaderFooter: true },
  // },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [...routeuser, ...routesadmin], // Nối mảng route admin vào
});


export default router
