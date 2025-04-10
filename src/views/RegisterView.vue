<template>
  <main>
    <section class="banner">
      <img class="imgban" src="../../public/img/Banner2.png" alt="">
    </section>
    <section class="login-section py-5">
      <div class="sports-background"></div>
      <div class="container" style="position: relative; z-index: 1;">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-form">
              <h2 class="text-center mb-4 fw-bold">ĐĂNG KÝ</h2>
              <form @submit.prevent="handleRegister">
                <div class="mb-4">
                  <label class="form-label fw-bold">Tên đăng nhập</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" v-model="username" class="form-control" 
                          placeholder="Vui lòng nhập tên đăng nhập" required>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label fw-bold">Email</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" v-model="email" class="form-control" 
                          placeholder="Vui lòng nhập email" required>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label fw-bold">Số điện thoại</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="tel" v-model="phone" class="form-control" 
                          placeholder="Vui lòng nhập số điện thoại" required>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label fw-bold">Mật khẩu</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" v-model="password" class="form-control" 
                          placeholder="Vui lòng nhập mật khẩu" required>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label fw-bold">Nhập lại mật khẩu</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                    <input type="password" v-model="confirmPassword" class="form-control" 
                          placeholder="Vui lòng nhập lại mật khẩu" required>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="form-label fw-bold">OTP</label>
                  <div class="d-flex gap-2">
                    <div class="input-group input-group-lg">
                      <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                      <input type="text" v-model="otp" class="form-control" 
                            placeholder="Nhập mã OTP" :disabled="!codeSent">
                    </div>
                    <button type="button" class="btn btn-secondary" @click="sendOTP">
                      <i class="bi bi-send-fill me-1"></i> Gửi mã
                    </button>
                  </div>
                  <small v-if="codeSent" class="text-success mt-1 d-block">Mã OTP đã được gửi đến email của bạn</small>
                  <small v-else class="text-muted mt-1 d-block">Bạn sẽ nhận OTP qua email đã đăng ký</small>
                </div>
                <div class="mb-3 form-check d-flex align-items-center">
                  <input type="checkbox" v-model="acceptTerms" class="form-check-input me-2" id="terms">
                  <label class="form-check-label" for="terms">Bạn chấp nhận với điều khoản của chúng tôi</label>
                </div>
                <button type="submit" class="btn btn-warning w-100 py-3 mt-2">ĐĂNG KÝ</button>
                <div class="text-center my-3">
                  <span class="or-divider">HOẶC</span>
                </div>
                <div class="social-buttons d-flex gap-2 mb-3">
                  <button type="button" class="btn btn-primary w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-facebook me-2"></i> Facebook
                  </button>
                  <button type="button" class="btn btn-info text-white w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-twitter me-2"></i> Twitter
                  </button>
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
  
  <div class="text-center mt-3">
    <small class="text-muted">Bản quyền © 2024 - THUỘC NHÀ SẢN XUẤT</small>
  </div>
</template>

<script>
export default {
  name: 'RegisterView',
  data() {
    return {
      username: '',
      email: '',
      phone: '',
      password: '',
      confirmPassword: '',
      otp: '',
      acceptTerms: false,
      codeSent: false
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
      
      if (!this.otp) {
        alert('Vui lòng nhập mã OTP!');
        return;
      }
      
      if (!this.codeSent) {
        alert('Vui lòng gửi và xác nhận mã OTP trước!');
        return;
      }
      
      // Trong ứng dụng thực tế, bạn sẽ xác thực OTP trước khi đăng ký thành công
      // Giả lập việc xác thực OTP
      if (this.otp.length < 4) {
        alert('Mã OTP không hợp lệ!');
        return;
      }
      
      console.log('Registration with:', this.username, this.email, this.phone, 'OTP:', this.otp);
      alert('Đăng ký thành công!');
      this.$router.push('/login');
    },
    
    sendOTP() {
      if (!this.email) {
        alert('Vui lòng nhập email trước khi gửi mã OTP!');
        return;
      }
      
      if (!this.phone) {
        alert('Vui lòng nhập số điện thoại trước khi gửi mã OTP!');
        return;
      }
      
      // Giả lập việc gửi OTP tới email người dùng
      console.log('Sending OTP to:', this.email);
      
      // Trong ứng dụng thực tế, bạn sẽ gọi API để gửi OTP
      alert('Mã OTP đã được gửi đến email ' + this.email);
      this.codeSent = true;
    }
  }
}
</script>

<style scoped>
.login-section {
  position: relative;
  overflow: hidden;
  padding: 3rem 0;
}

.sports-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)), 
              url('../../public/img/background.jpg');
  background-size: cover;
  background-position: center;
  z-index: 0;
}

.login-form {
  background-color: white;
  padding: 2.5rem;
  border-radius: 15px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0,0,0,0.05);
  position: relative;
  max-width: 550px;
  margin: 0 auto;
}

.form-label {
  font-size: 1.1rem;
  margin-bottom: 0.5rem;
  color: #333;
}

.input-group-text {
  background-color: #ff9900;
  color: white;
  border: none;
  font-size: 1.25rem;
  padding: 0.6rem 1rem;
}

.form-control {
  border: 1px solid #ddd;
  padding: 0.8rem 1rem;
  font-size: 1.1rem;
}

.form-control::placeholder {
  color: #aaa;
  font-style: italic;
}

.form-control:focus {
  border-color: #ff9900;
  box-shadow: 0 0 0 0.25rem rgba(255, 153, 0, 0.25);
}

.btn-warning {
  background-color: #ff9900;
  border-color: #ff9900;
  font-weight: bold;
  font-size: 1.1rem;
  padding: 0.5rem 0;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  max-width: 100%;
  margin: 0 auto;
  box-sizing: border-box;
}

.btn-warning:hover {
  background-color: #e68a00;
  border-color: #e68a00;
  box-shadow: 0 5px 15px rgba(255, 153, 0, 0.3);
  transform: translateY(-2px);
}

.btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
  font-weight: bold;
  font-size: 0.95rem;
  transition: all 0.3s ease;
  padding: 0 15px;
}

.btn-secondary:hover {
  background-color: #5a6268;
  border-color: #545b62;
  box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
  transform: translateY(-2px);
}

.register-link {
  color: #ff9900;
  text-decoration: none;
  font-weight: 600;
  display: inline-block;
  padding: 2px 0;
  font-size: 1.1rem;
  z-index: 1;
  position: relative;
}

.register-link:hover {
  text-decoration: underline;
  color: #e68a00;
}

.or-divider {
  position: relative;
  display: inline-block;
  padding: 0 10px;
  background-color: white;
  z-index: 1;
}

.text-center.my-3 {
  position: relative;
}

.text-center.my-3::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  height: 1px;
  background-color: #ddd;
  z-index: 0;
}

.banner img {
  width: 100%;
  height: auto;
}

.social-buttons .btn {
  padding: 10px 0;
  font-weight: 500;
  transition: all 0.3s ease;
}

.social-buttons .btn i {
  font-size: 1.5rem;
  margin-right: 10px;
  vertical-align: middle;
}

.social-buttons .btn-primary {
  background-color: #1877f2;
  border-color: #1877f2;
}

.social-buttons .btn-info {
  background-color: #1da1f2;
  border-color: #1da1f2;
}

.btn i {
  font-size: 1.1rem;
  vertical-align: middle;
}

@media (max-width: 576px) {
  .login-form {
    padding: 2rem 1.5rem;
  }
  
  .form-label {
    font-size: 1rem;
  }
  
  .input-group-text {
    font-size: 1.1rem;
    padding: 0.5rem 0.8rem;
  }
  
  .form-control {
    font-size: 1rem;
    padding: 0.7rem 0.9rem;
  }
  
  .or-divider {
    font-size: 0.9rem;
  }
  
  .register-link {
    font-size: 1rem;
  }
}
</style> 