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
              <h2 class="text-center mb-4 fw-bold">QUÊN MẬT KHẨU</h2>
              <form @submit.prevent="handleSubmit">
                <div class="mb-4">
                  <label class="form-label fw-bold">Email</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" v-model="email" class="form-control" 
                           placeholder="Vui lòng nhập email của bạn" required>
                  </div>
                </div>
                
                <div v-if="codeSent" class="mb-4">
                  <label class="form-label fw-bold">Mã OTP</label>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                    <input type="text" v-model="otpCode" class="form-control" 
                           placeholder="Vui lòng nhập mã OTP" required>
                  </div>
                  <small class="text-muted mt-1 d-block">Mã OTP đã được gửi đến email của bạn</small>
                </div>
                
                <div class="info-box mb-4">
                  <i class="bi bi-info-circle-fill me-2"></i>
                  <p class="mb-0">Chúng tôi sẽ gửi một mã OTP đến email của bạn để xác thực. Sau đó bạn có thể đặt lại mật khẩu.</p>
                </div>
                
                <button v-if="!codeSent" type="button" @click="sendOTP" class="btn btn-warning w-100 py-3">
                  <i class="bi bi-send-fill me-2"></i> GỬI MÃ OTP
                </button>
                
                <button v-if="codeSent" type="submit" class="btn btn-warning w-100 py-3">
                  <i class="bi bi-check-circle-fill me-2"></i> XÁC NHẬN VÀ ĐẶT LẠI MẬT KHẨU
                </button>
                
                <div class="text-center mt-4">
                  <router-link to="/login" class="back-link">
                    <i class="bi bi-arrow-left me-1"></i> Quay lại trang đăng nhập
                  </router-link>
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
  name: 'ForgotPasswordView',
  data() {
    return {
      email: '',
      otpCode: '',
      codeSent: false,
      verifiedOTP: false
    }
  },
  methods: {
    sendOTP() {
      if (!this.email) {
        alert('Vui lòng nhập email của bạn!');
        return;
      }
      
      // Giả lập việc gửi OTP tới email người dùng
      console.log('Sending OTP to:', this.email);
      
      // Trong ứng dụng thực tế, bạn sẽ gọi API để gửi OTP
      alert('Mã OTP đã được gửi đến email ' + this.email);
      this.codeSent = true;
    },
    
    handleSubmit() {
      if (!this.email) {
        alert('Vui lòng nhập email của bạn!');
        return;
      }
      
      if (!this.otpCode) {
        alert('Vui lòng nhập mã OTP!');
        return;
      }
      
      // Trong ứng dụng thực tế, bạn sẽ xác thực OTP trước khi chuyển hướng
      // Giả lập việc xác thực OTP
      if (this.otpCode.length < 4) {
        alert('Mã OTP không hợp lệ!');
        return;
      }
      
      console.log('Password reset requested for:', this.email, 'with OTP:', this.otpCode);
      alert('Mã OTP đã được xác minh. Bạn sẽ được chuyển đến trang đặt lại mật khẩu.');
      this.$router.push('/reset-password'); // Đây là đường dẫn tới trang đặt lại mật khẩu
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

.back-link {
  color: #ff9900;
  text-decoration: none;
  font-weight: 600;
  display: inline-block;
  padding: 2px 0;
  font-size: 1.1rem;
  z-index: 1;
  position: relative;
  transition: all 0.3s ease;
}

.back-link:hover {
  text-decoration: underline;
  color: #e68a00;
  transform: translateX(-3px);
}

.banner img {
  width: 100%;
  height: auto;
}

.info-box {
  background-color: rgba(255, 153, 0, 0.1);
  border-left: 4px solid #ff9900;
  padding: 12px 15px;
  display: flex;
  align-items: flex-start;
  border-radius: 4px;
}

.info-box i {
  color: #ff9900;
  font-size: 1.2rem;
  margin-top: 2px;
}

.info-box p {
  font-size: 0.95rem;
  color: #555;
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
  
  .back-link {
    font-size: 1rem;
  }
}

.btn i {
  font-size: 1.2rem;
  vertical-align: middle;
}
</style> 