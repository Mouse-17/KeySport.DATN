<script setup lang="ts">
import { onMounted, ref } from "vue";
import Chart from "chart.js/auto";
import { RouterLink } from "vue-router";
const selectedItem = ref(0);
const menuItems = ref([
  { text: "Thống kê", icon: "bi bi-bar-chart", link: "/chusan" },
  { text: "Lịch sân", icon: "bi bi-list-check", link: "/lichsan" },
  { text: "Chờ phê duyệt", icon: "bi bi-hourglass-split", link: "/pheduyet" },
  { text: "Khách hàng thân thiết", icon: "bi bi-hearts", link: "/khyeuthich" },
  { text: "Cài đặt", icon: "bi bi-gear", link: "/suasan" },
]);

// Thêm các ref mới
const selectedDate = ref(new Date().toISOString().split("T")[0]);
const searchQuery = ref("");

// Mock data cho các sân
const courts = ref([
  "Sân 1",
  "Sân 2",
  "Sân 3",
  "Sân 4",
  "Sân 5",
  "Sân 7",
  "Sân 8",
  "Sân 9",
]);

// Mock data cho bookings - theo hình ảnh
const bookings = ref([
  // 6:00
  {
    id: "BK001",
    courtId: 0,
    time: "6:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  {
    id: "BK002",
    courtId: 1,
    time: "6:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  {
    id: "BK003",
    courtId: 2,
    time: "6:00",
    customer: "Thúy Nga",
    price: 140000,
  },

  // 8:00
  { id: "BK004", courtId: 3, time: "8:00", customer: "Tuấn", price: 140000 },
  { id: "BK005", courtId: 7, time: "8:00", customer: "Hân", price: 140000 },
  { id: "BK006", courtId: 8, time: "8:00", customer: "Hân", price: 140000 },

  // 10:00
  {
    id: "BK007",
    courtId: 0,
    time: "10:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  {
    id: "BK008",
    courtId: 1,
    time: "10:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  { id: "BK009", courtId: 3, time: "10:00", customer: "Đạt", price: 140000 },
  { id: "BK010", courtId: 4, time: "10:00", customer: "Đạt", price: 140000 },

  // 12:00
  { id: "BK011", courtId: 6, time: "12:00", customer: "Đạt", price: 140000 },
  { id: "BK012", courtId: 7, time: "12:00", customer: "Đạt", price: 140000 },

  // 14:00
  {
    id: "BK013",
    courtId: 0,
    time: "14:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  {
    id: "BK014",
    courtId: 1,
    time: "14:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  {
    id: "BK015",
    courtId: 2,
    time: "14:00",
    customer: "Thúy Nga",
    price: 140000,
  },
  { id: "BK016", courtId: 3, time: "14:00", customer: "Hân", price: 140000 },
  { id: "BK017", courtId: 4, time: "14:00", customer: "Hân", price: 140000 },
  { id: "BK018", courtId: 7, time: "14:00", customer: "Đạt", price: 140000 },
  { id: "BK019", courtId: 8, time: "14:00", customer: "Đạt", price: 140000 },

  // 16:00 - Giá cao điểm
  { id: "BK020", courtId: 0, time: "16:00", customer: "Hân", price: 240000 },
  { id: "BK021", courtId: 1, time: "16:00", customer: "Hân", price: 240000 },
  { id: "BK022", courtId: 4, time: "16:00", customer: "Tuấn", price: 240000 },
  { id: "BK023", courtId: 5, time: "16:00", customer: "Tuấn", price: 240000 },

  // 18:00 - Giá cao điểm
  { id: "BK020", courtId: 2, time: "18:00", customer: "Hân", price: 240000 },
  { id: "BK021", courtId: 3, time: "18:00", customer: "Hân", price: 240000 },
  { id: "BK022", courtId: 7, time: "18:00", customer: "Tuấn", price: 240000 },
  { id: "BK023", courtId: 8, time: "18:00", customer: "Tuấn", price: 240000 },

  // 20:00 - Giá cao điểm
  { id: "BK020", courtId: 0, time: "20:00", customer: "Hân", price: 240000 },
  { id: "BK021", courtId: 1, time: "20:00", customer: "Hân", price: 240000 },
  { id: "BK022", courtId: 4, time: "20:00", customer: "Tuấn", price: 240000 },
  { id: "BK023", courtId: 5, time: "20:00", customer: "Tuấn", price: 240000 },
]);

// Các khung giờ trong ngày
const timeSlots = ref([
  "6:00",
  "8:00",
  "10:00",
  "12:00",
  "14:00",
  "16:00",
  "18:00",
  "20:00",
  "22:00",
  "00:00",
]);

// Tạo booking map để truy cập nhanh hơn
const bookingMap = ref(new Map());

// Cập nhật booking map khi bookings thay đổi
const updateBookingMap = () => {
  const map = new Map();
  bookings.value.forEach(booking => {
    const key = `${booking.courtId}-${booking.time}`;
    map.set(key, booking);
  });
  bookingMap.value = map;
};

// Cập nhật map khi component được tạo
onMounted(() => {
  updateBookingMap();
});

// Hàm lấy booking tối ưu hơn
const getBooking = (courtIndex: number, time: string) => {
  const key = `${courtIndex}-${time}`;
  return bookingMap.value.get(key);
};

const isPremiumTime = (time: string) => {
  const hour = parseInt(time.split(':')[0]);
  return hour >= 16; // Từ 16:00 trở đi là giờ cao điểm
};
</script>
<template>
  <main>
    <section class="accept bg-white">
      <div class="row gx-0">
        <div class="col-2">
          <aside class="py-5">
            <div
              class="d-flex align-items-center gap-3 mb-5"
              style="margin-left: 12px"
            >
              <div class="boss-img">
                <img
                  src="../../../public/img/user.webp"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div>
                <p
                  class="m-0 fs-4 fw-regular my-1"
                  style="color: var(--colortext3)"
                >
                  Xin chào,
                </p>
                <p
                  class="m-0 fs-3 fw-semibold my-1"
                  style="color: var(--colortext1)"
                >
                  Shin
                </p>
              </div>
            </div>
            <RouterLink
              to="/themsanmoi"
              @click="selectedItem = -1"
              class="btn-booknow my-3 mb-4"
              style="color: var(--white) !important; margin-left: 12px"
              >Thêm sân mới</RouterLink
            >
            <ul class="p-0">
              <li v-for="(item, index) in menuItems" :key="index">
                <RouterLink
                  :to="item.link"
                  class="d-flex align-items-center gap-3 boss-item-link"
                  :class="{ 'boss-link-active': selectedItem === index }"
                  @click="selectedItem = index"
                >
                  <i :class="item.icon + ' fs-4'"></i>
                  <p class="m-0">{{ item.text }}</p>
                </RouterLink>
              </li>
            </ul>
          </aside>
        </div>
        <div class="col-10 overflow-y-auto max-height-screen">
          <div
            class=" d-flex flex-column bg-white shadow-lg p-4 !pr-[0px]"
            style="
              height: 667px;
              border-radius: 20px 0 0 20px;
            "
          >
            <div>
              <h3
                class="m-0 fs-2 fw-bold text-start"
                style="color: var(--colortext1)"
              >
                Quản lý đặt sân
              </h3>
              <div class="d-flex justify-content-end align-items-center mb-4">
                <div class="d-flex gap-3">
                  <input
                    type="date"
                    v-model="selectedDate"
                    class="form-control"
                  />
                  <input
                    type="search"
                    v-model="searchQuery"
                    class="form-control"
                    placeholder="Tìm kiếm"
                  />
                </div>
              </div>
            </div>

            <div class="d-flex flex-column overflow-y-auto manage-set-yard">
              <div class="booking-table d-flex flex-column">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 80px"></th> 
                      <th v-for="court in courts" :key="court" class="text-center">{{ court }}</th>
                    </tr>
                  </thead>
                  <tbody class="">
                    <tr v-for="time in timeSlots" :key="time">
                      <td>{{ time }}</td>
                      <td v-for="(court, index) in courts" :key="court">
                        <template v-if="getBooking(index, time)">
                          <div
                            class="booking-cell"
                            :class="{ 'premium-time': isPremiumTime(time) }"
                          >
                            <div class="booking-id">
                              {{ getBooking(index, time).id }} - {{ getBooking(index, time).customer }}
                            </div>
                            <div class="booking-price">
                              {{ getBooking(index, time).price.toLocaleString() }}đ
                            </div>
                          </div>
                        </template>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<style scoped>
.manage-set-yard{
  flex: 1 1 0%;
  padding-right: 8px;
  border-top: 2px solid #dee2e6;
  
}
.booking-table {
  overflow-x: auto;
  margin-top: 20px;
}

table {
  min-width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  background: #fff;
}

th {
  background: #f8f9fa;
  color: #333;
  font-weight: 600;
  padding: 12px;
  border: 1px solid #dee2e6;
}

td {
  padding: 8px;
  text-align: center;
  vertical-align: middle;
  border: 1px solid #dee2e6;
  /* height: 80px; */
}

.booking-cell {
  background-color: #fff;
  border: 1px solid #deb887;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.2s;
  font-size: 16px;
  text-align: center;
  padding: 8px 0;
}

.booking-cell:hover {
  transform: scale(1.02);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.booking-id {
  color: #deb887;
  font-weight: 600;
  margin-bottom: 4px;
}

.booking-customer {
  color: #666;
  margin-bottom: 4px;
}

.booking-price {
  font-weight: 600;
  color: #333;
}

/* .premium-time .booking-price {
  color: #ff6b6b;
} */

/* Search and date controls */
.form-control {
  border-radius: 6px;
  border: 1px solid #dee2e6;
  padding: 8px 12px;
}

.form-control:focus {
  border-color: #deb887;
  box-shadow: 0 0 0 0.2rem rgba(222, 184, 135, 0.25);
}

/* Header styling */
h3 {
  margin-bottom: 24px;
  color: #333;
}
</style>
