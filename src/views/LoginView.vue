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
                            <h2 class="text-center mb-4 fw-bold">ĐĂNG NHẬP</h2>
                            <form action="index.html" method="post">
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Tên đăng nhập</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" name="username" class="form-control" 
                                            placeholder="Vui lòng nhập tên hoặc email" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Mật khẩu</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input type="password" name="password" class="form-control" 
                                            placeholder="Vui lòng nhập mật khẩu" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check d-flex align-items-center">
                                        <input type="checkbox" class="form-check-input me-2" id="remember">
                                        <label class="form-check-label" for="remember">Nhớ thông tin đăng nhập</label>
                                    </div>
                                    <router-link to="/quenmatkhau" class="forgot-link">Quên mật khẩu?</router-link>
                                </div>
                                <div class="mb-3 form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2" id="terms">
                                    <label class="form-check-label" for="terms">Bạn chấp nhận với điều khoản của chúng tôi</label>
                                </div>
                                <button type="button" class="btn btn-warning w-100 py-2" onclick="window.location.href='index.html'">ĐĂNG NHẬP</button>
                                <div class="text-center my-3">
                                    <span class="or-divider">OR</span>
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
                                    <span>Bạn chưa có tài khoản? </span>
                                    <router-link to="/dangky" class="register-link">Đăng ký ngay</router-link>
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
  name: 'LoginView',
  data() {
    return {
      username: '',
      password: '',
      rememberMe: false,
      acceptTerms: false
    }
  },
  methods: {
    handleLogin() {
      // Implement login logic here
      console.log('Login attempt with:', this.username, this.password);
      this.$router.push('/');
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

.forgot-link, .register-link {
  color: #ff9900;
  text-decoration: none;
  font-weight: 600;
  display: inline-block;
  padding: 2px 0;
  font-size: 1.1rem;
  z-index: 1;
  position: relative;
}

.forgot-link:hover, .register-link:hover {
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
</style>
