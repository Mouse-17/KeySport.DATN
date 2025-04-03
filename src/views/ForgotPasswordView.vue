<template>
  <main>
    <section class="banner">
      <img class="imgban" src="../../public/img/Banner2.png" alt="">
    </section>

    <section class="forgot-password-section py-5">
      <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="form-container">
              <h2 class="text-center mb-4 fw-bold">QUÊN MẬT KHẨU</h2>
              <form @submit.prevent="handleSubmit">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" v-model="email" class="form-control" 
                         placeholder="Vui lòng nhập email của bạn" required>
                </div>
                <p class="mb-4">Chúng tôi sẽ gửi một email với hướng dẫn đặt lại mật khẩu của bạn.</p>
                <button type="submit" class="btn btn-warning w-100 py-2">GỬI YÊU CẦU</button>
                <div class="text-center mt-3">
                  <router-link to="/login" class="back-link">Quay lại trang đăng nhập</router-link>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  name: 'ForgotPasswordView',
  data() {
    return {
      email: ''
    }
  },
  methods: {
    handleSubmit() {
      // Implement password reset logic here
      console.log('Password reset requested for:', this.email);
      alert('Yêu cầu đặt lại mật khẩu đã được gửi đến email của bạn!');
      this.$router.push('/login');
    }
  }
}
</script>

<style scoped>
.form-container {
  background-color: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.back-link {
  color: #ff9900;
  text-decoration: none;
}

.back-link:hover {
  text-decoration: underline;
}

.banner img {
  width: 100%;
  height: auto;
}
</style> 