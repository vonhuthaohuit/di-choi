# 🌊 Hướng dẫn thiết lập Google Sheets cho trang web Vũng Tàu

## 📋 Bước 1: Tạo Google Sheet

1. **Mở Google Sheets**: Truy cập [sheets.google.com](https://sheets.google.com)
2. **Tạo sheet mới**: Nhấn "+" để tạo spreadsheet mới
3. **Đặt tên**: Đặt tên cho sheet (ví dụ: "Vũng Tàu Trip Responses")
4. **Copy Sheet ID**: 
   - Mở sheet vừa tạo
   - Nhìn vào URL: `https://docs.google.com/spreadsheets/d/YOUR_SHEET_ID_HERE/edit`
   - Copy phần `YOUR_SHEET_ID_HERE` (đây là ID của sheet)

## 🔧 Bước 2: Tạo Google Apps Script

1. **Mở Google Apps Script**: Truy cập [script.google.com](https://script.google.com)
2. **Tạo project mới**: Nhấn "New project"
3. **Đặt tên project**: Đặt tên (ví dụ: "Vung Tau Form Handler")
4. **Copy code**: 
   - Mở file `google-apps-script.js` trong thư mục này
   - Copy toàn bộ code
   - Paste vào file `Code.gs` trong Google Apps Script
5. **Thay thế Sheet ID**:
   - Tìm dòng `const spreadsheetId = 'YOUR_GOOGLE_SHEET_ID_HERE';`
   - Thay `YOUR_GOOGLE_SHEET_ID_HERE` bằng ID sheet thực tế của bạn

## 🚀 Bước 3: Deploy Web App

1. **Nhấn Deploy**: Trong Google Apps Script, nhấn nút "Deploy" > "New deployment"
2. **Chọn type**: Chọn "Web app"
3. **Cấu hình**:
   - **Execute as**: "Me"
   - **Who has access**: "Anyone" (để mọi người có thể submit form)
4. **Deploy**: Nhấn "Deploy"
5. **Copy URL**: Copy URL được tạo ra (sẽ có dạng: `https://script.google.com/macros/s/.../exec`)

## 🔗 Bước 4: Cập nhật trang web

1. **Mở file `index.html`**
2. **Tìm dòng**: `const GOOGLE_SCRIPT_URL = 'YOUR_GOOGLE_APPS_SCRIPT_URL_HERE';`
3. **Thay thế**: Thay `YOUR_GOOGLE_APPS_SCRIPT_URL_HERE` bằng URL từ bước 3

## ✅ Bước 5: Test và thiết lập headers

1. **Chạy setup**: Trong Google Apps Script, chạy function `setupSheetHeaders()`
2. **Kiểm tra**: Mở Google Sheet, sẽ thấy 2 sheet mới với headers đẹp
3. **Test form**: Mở trang web và test các form

## 📊 Cấu trúc dữ liệu

### Sheet "Xác nhận tham gia":
- Thời gian gửi
- Họ và tên
- Số điện thoại
- Email
- Lời nhắn

### Sheet "Góp ý thời gian":
- Thời gian gửi
- Họ và tên
- Số điện thoại
- Ngày đề xuất
- Thời gian đi
- Hoạt động mong muốn
- Ngân sách dự kiến

## 🔒 Bảo mật

- **Quyền truy cập**: Chỉ bạn mới có thể chỉnh sửa Google Sheet
- **Dữ liệu**: Tất cả dữ liệu được lưu an toàn trong Google Sheets
- **Backup**: Google tự động backup dữ liệu

## 🐛 Xử lý lỗi thường gặp

### Lỗi "CORS":
- Đảm bảo đã deploy web app với quyền "Anyone"
- Kiểm tra URL trong file HTML

### Lỗi "Sheet not found":
- Kiểm tra Sheet ID có đúng không
- Đảm bảo sheet tồn tại và có quyền truy cập

### Form không gửi được:
- Kiểm tra console trong Developer Tools
- Đảm bảo tất cả field required đã được điền

## 📱 Tính năng

✅ **Responsive**: Hoạt động tốt trên mobile và desktop
✅ **Real-time**: Dữ liệu được lưu ngay lập tức
✅ **Validation**: Kiểm tra dữ liệu trước khi gửi
✅ **Loading states**: Hiển thị trạng thái đang gửi
✅ **Success/Error messages**: Thông báo kết quả rõ ràng
✅ **Auto-format**: Google Sheet tự động format đẹp

## 🎯 Kết quả

Sau khi hoàn thành, bạn sẽ có:
- Trang web đẹp mắt để mời mọi người đi Vũng Tàu
- Form thu thập thông tin tự động
- Google Sheet để quản lý danh sách tham gia
- Hệ thống hoàn chỉnh, chuyên nghiệp

---

**Lưu ý**: Đảm bảo lưu lại Sheet ID và Script URL để có thể chỉnh sửa sau này! 🚀 