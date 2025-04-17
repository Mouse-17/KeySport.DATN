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
              <div class="text-center mb-4">
                <i class="bi bi-shield-lock display-4 text-warning mb-3"></i>
                <h2 class="fw-bold">QUÊN MẬT KHẨU?</h2>
                <p class="text-muted">Đừng lo lắng, chúng tôi sẽ giúp bạn khôi phục mật khẩu</p>
              </div>

              <form @submit.prevent="handleSubmit" class="fade-in">
                <div class="mb-4">
                  <label class="form-label fw-bold">
                    <i class="bi bi-envelope me-2"></i>Email của bạn
                  </label>
                  <div class="input-group input-group-lg custom-input">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" v-model="email" class="form-control" 
                           placeholder="Vui lòng nhập email của bạn" required>
                  </div>
                </div>
                
                <div v-if="codeSent" class="mb-4 fade-in">
                  <label class="form-label fw-bold">
                    <i class="bi bi-key me-2"></i>Mã xác thực OTP
                  </label>
                  <div class="input-group input-group-lg custom-input">
                    <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                    <input type="text" v-model="otpCode" class="form-control" 
                           placeholder="Vui lòng nhập mã OTP" required>
                  </div>
                  <div class="alert alert-success mt-2 fade-in">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Mã OTP đã được gửi đến email của bạn
                  </div>
                </div>
                
                <div class="info-box mb-4">
                  <i class="bi bi-info-circle-fill me-2"></i>
                  <p class="mb-0">Chúng tôi sẽ gửi một mã OTP đến email của bạn để xác thực. Sau đó bạn có thể đặt lại mật khẩu.</p>
                </div>
                
                <button v-if="!codeSent" type="button" @click="sendOTP" 
                        class="btn btn-warning w-100 py-3 custom-button">
                  <i class="bi bi-send-fill me-2"></i> GỬI MÃ XÁC THỰC
                </button>
                
                <button v-if="codeSent" type="submit" 
                        class="btn btn-warning w-100 py-3 custom-button">
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
  min-height: 80vh;
}

.sports-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.92)), 
              url('../../public/img/background.jpg');
  background-size: cover;
  background-position: center;
  z-index: 0;
}

.login-form {
  background-color: white;
  padding: 2.5rem;
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(0,0,0,0.05);
  position: relative;
  max-width: 550px;
  margin: 0 auto;
  transition: all 0.3s ease;
}

.login-form:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.form-label {
  font-size: 1.1rem;
  margin-bottom: 0.8rem;
  color: #333;
  display: flex;
  align-items: center;
}

.custom-input {
  border-radius: 12px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.custom-input:focus-within {
  transform: translateY(-2px);
}

.input-group-text {
  background-color: #ff9900;
  color: white;
  border: none;
  font-size: 1.25rem;
  padding: 0.8rem 1.2rem;
  transition: all 0.3s ease;
}

.form-control {
  border: 1px solid #ddd;
  padding: 0.8rem 1rem;
  font-size: 1.1rem;
  transition: all 0.3s ease;
}

.form-control:focus {
  border-color: #ff9900;
  box-shadow: 0 0 0 0.25rem rgba(255, 153, 0, 0.15);
}

.custom-button {
  background-color: #ff9900;
  border: none;
  font-weight: bold;
  font-size: 1.1rem;
  padding: 1rem 0;
  letter-spacing: 1px;
  border-radius: 12px;
  transition: all 0.3s ease;
  text-transform: uppercase;
}

.custom-button:hover {
  background-color: #e68a00;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(255, 153, 0, 0.3);
}

.back-link {
  color: #ff9900;
  text-decoration: none;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  padding: 0.5rem 1rem;
  font-size: 1.1rem;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.back-link:hover {
  color: #e68a00;
  background-color: rgba(255, 153, 0, 0.1);
  transform: translateX(-5px);
}

.info-box {
  background-color: rgba(255, 153, 0, 0.1);
  border-left: 4px solid #ff9900;
  padding: 1rem 1.2rem;
  display: flex;
  align-items: flex-start;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.info-box:hover {
  background-color: rgba(255, 153, 0, 0.15);
  transform: translateX(5px);
}

.info-box i {
  color: #ff9900;
  font-size: 1.3rem;
  margin-top: 2px;
}

.info-box p {
  font-size: 0.95rem;
  color: #555;
  margin-left: 10px;
}

.alert {
  border-radius: 8px;
  padding: 0.8rem 1rem;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
}

.fade-in {
  animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 576px) {
  .login-form {
    padding: 2rem 1.5rem;
    margin: 0 1rem;
  }
  
  .form-label {
    font-size: 1rem;
  }
  
  .input-group-text {
    font-size: 1.1rem;
    padding: 0.6rem 1rem;
  }
  
  .form-control {
    font-size: 1rem;
    padding: 0.7rem 0.9rem;
  }
  
  .custom-button {
    font-size: 1rem;
    padding: 0.8rem 0;
  }
  
  .back-link {
    font-size: 1rem;
  }
}

.display-4 {
  font-size: 3.5rem;
  margin-bottom: 1rem;
}

.text-warning {
  color: #ff9900 !important;
}
</style> 