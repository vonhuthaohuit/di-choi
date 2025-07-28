# Hướng dẫn Deploy lên Render

## Yêu cầu
- Tài khoản Render.com
- Repository GitHub/GitLab với code của dự án

## Bước 1: Chuẩn bị Repository

1. Push code của bạn lên GitHub/GitLab
2. Đảm bảo các file Docker đã được commit:
   - `Dockerfile`
   - `.dockerignore`
   - `render.yaml`
   - `.env.example`

## Bước 2: Deploy thông qua Render Dashboard

### Cách 1: Sử dụng file render.yaml (Recommended)

1. Đăng nhập vào [Render.com](https://render.com)
2. Click "New" → "Blueprint"
3. Connect repository GitHub/GitLab của bạn
4. Render sẽ tự động đọc file `render.yaml` và tạo service
5. Thay đổi các environment variables nếu cần

### Cách 2: Tạo Web Service thủ công

1. Đăng nhập vào [Render.com](https://render.com)
2. Click "New" → "Web Service"
3. Connect repository GitHub/GitLab của bạn
4. Cấu hình:
   - **Name**: `vung-tau-trip`
   - **Environment**: `Docker`
   - **Region**: Singapore (hoặc gần nhất)
   - **Plan**: Free (hoặc Starter nếu cần)

## Bước 3: Cấu hình Environment Variables

Trong Render Dashboard, thêm các environment variables sau:

```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_URL=https://your-app-name.onrender.com
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/database/database.sqlite
LOG_CHANNEL=stderr
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

**Lưu ý**: `APP_KEY` sẽ được tự động generate khi build Docker image.

## Bước 4: Deploy

1. Click "Create Web Service"
2. Render sẽ tự động build và deploy ứng dụng
3. Quá trình deploy có thể mất 5-10 phút

## Test Local với Docker

Để test trước khi deploy:

```bash
# Build image
docker build -t vung-tau-trip .

# Run container
docker run -p 8000:80 vung-tau-trip

# Hoặc sử dụng docker-compose
docker-compose up
```

Mở trình duyệt: `http://localhost:8000`

## Troubleshooting

### Lỗi thường gặp:

1. **Build failed**: Kiểm tra Dockerfile và dependencies
2. **Database error**: Đảm bảo SQLite database được tạo đúng cách
3. **Permission denied**: Kiểm tra file permissions trong Dockerfile

### Xem logs:

1. Trong Render Dashboard → Service → Logs
2. Hoặc dùng lệnh: `docker logs container_name`

## Cập nhật ứng dụng

Khi bạn push code mới lên repository:
1. Render sẽ tự động detect changes
2. Auto-deploy nếu bạn enable auto-deploy
3. Hoặc click "Manual Deploy" trong dashboard

## Tối ưu hóa

Để cải thiện performance:
1. Upgrade plan từ Free lên Starter
2. Sử dụng PostgreSQL thay vì SQLite cho production
3. Enable caching với Redis
4. Optimize Docker image size

## Liên hệ hỗ trợ

Nếu gặp vấn đề, check:
1. Render documentation: https://render.com/docs
2. Laravel deployment guides
3. Docker best practices 