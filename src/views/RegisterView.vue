<template>
  <main>
    <section class="banner">
      <img class="imgban" src="../../public/img/Banner2.png" alt="">
    </section>
    <section class="login-section py-5">
      <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-form">
              <h2 class="text-center mb-4 fw-bold">ĐĂNG KÝ</h2>
              <form @submit.prevent="handleRegister">
                <div class="mb-3">
                  <label class="form-label">Tên đăng nhập</label>
                  <input type="text" v-model="username" class="form-control" 
                        placeholder="Vui lòng nhập tên hoặc email" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Số điện thoại</label>
                  <input type="tel" v-model="phone" class="form-control" 
                        placeholder="Vui lòng nhập số điện thoại" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Mật khẩu</label>
                  <input type="password" v-model="password" class="form-control" 
                        placeholder="Vui lòng nhập mật khẩu" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nhập lại mật khẩu</label>
                  <input type="password" v-model="confirmPassword" class="form-control" 
                        placeholder="Vui lòng nhập lại mật khẩu" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">OTP</label>
                  <div class="d-flex">
                    <input type="text" v-model="otp" class="form-control me-2" 
                          placeholder="Nhập mã OTP">
                    <button type="button" class="btn btn-secondary" @click="sendOTP">Gửi</button>
                  </div>
                </div>
                <div class="mb-3 form-check d-flex align-items-center">
                  <input type="checkbox" v-model="acceptTerms" class="form-check-input me-2" id="terms">
                  <label class="form-check-label" for="terms">Bạn chấp nhận với điều khoản của chúng tôi</label>
                </div>
                <button type="submit" class="btn btn-warning w-100 py-2">ĐĂNG KÝ</button>
                <div class="text-center my-3">
                  <span>OR</span>
                </div>
                <div class="social-buttons d-flex gap-2 mb-3">
                  <a href="#" class="btn btn-primary w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-facebook me-2"></i> Facebook
                  </a>
                  <a href="#" class="btn btn-info text-white w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-twitter me-2"></i> Twitter
                  </a>
                </div>
                <div class="text-center">
                  <span>Bạn đã có tài khoản? </span>
                  <router-link to="/login" class="register-link">Đăng nhập ngay</router-link>
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
  name: 'RegisterView',
  data() {
    return {
      username: '',
      phone: '',
      password: '',
      confirmPassword: '',
      otp: '',
      acceptTerms: false
    }
  },
  methods: {
    handleRegister() {
      if (this.password !== this.confirmPassword) {
        alert('Mật khẩu không khớp!');
        return;
      }
      
      if (!this.acceptTerms) {
        alert('Vui lòng đồng ý với điều khoản dịch vụ!');
        return;
      }
      
      console.log('Registration with:', this.username, this.phone);
      alert('Đăng ký thành công!');
      this.$router.push('/login');
    },
    
    sendOTP() {
      alert('Mã OTP đã được gửi đến số điện thoại của bạn!');
    }
  }
}
</script>

<style scoped>
.login-form {
  background-color: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.register-link {
  color: #ff9900;
  text-decoration: none;
}

.register-link:hover {
  text-decoration: underline;
}

.banner img {
  width: 100%;
  height: auto;
}
</style> 