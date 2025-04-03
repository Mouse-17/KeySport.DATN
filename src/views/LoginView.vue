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
                            <h2 class="text-center mb-4 fw-bold">ĐĂNG NHẬP</h2>
                            <form action="index.html" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Tên đăng nhập</label>
                                    <input type="text" name="username" class="form-control" 
                                           placeholder="Vui lòng nhập tên hoặc email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" 
                                           placeholder="Vui lòng nhập mật khẩu" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check d-flex align-items-center">
                                        <input type="checkbox" class="form-check-input me-2" id="remember">
                                        <label class="form-check-label" for="remember">Nhớ thông tin đăng nhập</label>
                                    </div>
                                    <a href="pass.html" class="forgot-link text-end">Quên mật khẩu?</a>
                                </div>
                                <div class="mb-3 form-check d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2" id="terms">
                                    <label class="form-check-label" for="terms">Bạn chấp nhận với điều khoản của chúng tôi</label>
                                </div>
                                <button type="button" class="btn btn-warning w-100 py-2" onclick="window.location.href='index.html'">ĐĂNG NHẬP</button>
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
                                    <span>Bạn chưa có tài khoản? </span>
                                    <a href="#" class="register-link">Đăng ký ngay</a>
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
.login-form {
  background-color: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.forgot-link, .register-link {
  color: #ff9900;
  text-decoration: none;
}

.forgot-link:hover, .register-link:hover {
  text-decoration: underline;
}

.banner img {
  width: 100%;
  height: auto;
}
</style>
