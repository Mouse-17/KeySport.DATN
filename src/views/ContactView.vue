<template>
    <main>
        <section class="contact-banner">
            <h1>LIÊN HỆ</h1>
        </section>
        
        <section class="contact-form">
            <form>
                <label for="name">Tên của bạn</label>
                <input type="text" id="name" placeholder="Vui lòng nhập tên bạn">
                
                <label for="email">Địa chỉ mail</label>
                <input type="email" id="email" placeholder="Vui lòng nhập mail">
                
                <label for="phone">Số điện thoại</label>
                <input type="tel" id="phone" placeholder="Vui lòng nhập số điện thoại">
                
                <label for="message">Nội dung</label>
                <textarea id="message" placeholder="Vui lòng nhập nội dung"></textarea>
                
                <button type="submit">Gửi</button>
            </form>
        </section>
        <section class="contact-info">
            <h2>THÔNG TIN LIÊN HỆ</h2>
            <div class="contact-container">
                <div class="contact-box dark-blue">
                    <p><i class="fas fa-phone"></i> 1900.5678</p>
                    <p><i class="fas fa-envelope"></i> support@keysport.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Công Viên Phần Mềm Quang Trung, đường Tô Ký, Quận 12, TP.HCM</p>
                    <p><i class="fas fa-users"></i> Team 5Key</p>
                    <p><i class="fas fa-globe"></i> <a href="https://www.keysport.com">www.keysport.com</a></p>
                </div>
                <div class="contact-box gold">
                    <h3>TẢI NGAY</h3>
                    <div class="download-buttons">
                        <img src="../../public/img/ggplay.png" alt="Google Play">
                        <img src="../../public/img/appstore.png" alt="App Store">
                    </div>
                    <h3>THEO DÕI NGAY</h3>
                    <div class="social-icons">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>