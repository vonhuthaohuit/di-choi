@extends('layouts.app')

@section('content')
<header class="text-center mb-5">
    <h1 class="main-title">🌊📢 THÔNG BÁO KHẨN CẤP TỪ GIÁO CHỦ</h1>
    <p class="subtitle">Kính gửi toàn thể chư vị member thuộc Giáo phái Ngưng Trình Bày!</p>
</header>

<div class="content-card">
    <div class="mb-4">
        <h2 class="section-title">
            <i class="fas fa-graduation-cap"></i>
            Lời Mở Đầu
        </h2>
        <p>Sau 4 năm tu luyện khổ cực tại học viện IT chính đạo – nơi đã rèn luyện cho chúng ta khả năng nhìn bug là biết lỗi, nhìn deadline là biết chạy – thì cuối cùng, chúng ta cũng đã đắc đạo, rời khỏi xiềng xích đồ án và bước vào xiềng xích customer, trĩ, deadline, ....🧑‍💻🎓</p>
    </div>

    <div class="highlight-box">
        <h3 style="margin-bottom: 15px;">🎯 Nhân dịp trọng đại này, giáo chủ quyết định triệu tập toàn bộ giáo chúng cùng nhau thực hiện một chuyến hành hương về miền biển Vũng Tàu – nơi gió mát, cát êm, nước mặn và lòng người thì đậm đà 😎</h3>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="info-item">
                <h4><i class="fas fa-calendar-alt"></i> Thời gian</h4>
                <p>Tháng 10/2025 – mùa đẹp nhất để tạm biệt thanh xuân</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-item">
                <h4><i class="fas fa-map-marker-alt"></i> Địa điểm</h4>
                <p>VŨNG TÀU – nơi giáo phái ta sẽ "deploy" những trận cười, "host" những cuộc vui và "log" lại kỷ niệm đẹp nhất thời sinh viên</p>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h2 class="section-title">
            <i class="fas fa-bullseye"></i>
            Mục tiêu chuyến đi
        </h2>
        <ul class="goals-list">
            <li><i class="fas fa-users"></i> Reconnect tình huynh đệ</li>
            <li><i class="fas fa-spa"></i> Release stress hậu tốt nghiệp</li>
            <li><i class="fas fa-camera"></i> Update album sống ảo</li>
            <li><i class="fas fa-heart"></i> Fix bug tâm trạng sau những ngày deadline dồn dập</li>
        </ul>
    </div>

    <div class="warning-text">
        ⚠️ CHÚ Ý: Chuyến đi này không phải là một chuyến đi bình thường. Đây là một nghi lễ thiêng liêng của giáo phái. Đứa nào không đi thì hiểu rồi đó nay tính giáo chủ hơi lóng.
    </div>

    <div class="mb-4">
        <h2 class="section-title">
            <i class="fas fa-comments"></i>
            Thông Báo Quan Trọng
        </h2>
        <p>📢 Tất cả member vui lòng comment xác nhận bên dưới, góp ý thêm về thời gian – giáo chủ sẽ compile lại lịch trình và thông báo sau. (Chốt luôn ngày và giờ đi để mấy đệ chuẩn bị trong vòng 2 tháng)</p>
    </div>

    <div class="cta-section">
        <h3 style="margin-bottom: 20px;">🚀 Hỡi các chiến binh bàn phím… đã đến lúc cùng nhau tạo ra dòng code cuối cùng của thanh xuân!</h3>
        
        <button class="cta-button" data-bs-toggle="modal" data-bs-target="#confirmModal">
            <i class="fas fa-thumbs-up"></i> Xác nhận tham gia
        </button>
        <button class="cta-button" data-bs-toggle="modal" data-bs-target="#suggestModal">
            <i class="fas fa-lightbulb"></i> Góp ý thời gian
        </button>
        
        {{-- <div style="margin-top: 20px;">
            <a href="https://docs.google.com/spreadsheets/d/1k6FC5cA7aZMtxfMK5347VW8PkJN7tS5pAKRmwrIulKo/edit?usp=sharing" target="_blank" class="cta-button">
                <i class="fas fa-table"></i> Xem danh sách tham gia
            </a>
        </div> --}}
    </div>
</div>

<!-- Modal Xác nhận tham gia -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-thumbs-up text-primary"></i> 
                    Xác nhận tham gia
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="confirmForm">
                    <div class="mb-3">
                        <label for="confirmName" class="form-label">Họ và tên *</label>
                        <input type="text" class="form-control" id="confirmName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPhone" class="form-label">Số điện thoại *</label>
                        <input type="tel" class="form-control" id="confirmPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="confirmEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="confirmMessage" class="form-label">Lời nhắn (nếu có)</label>
                        <textarea class="form-control" id="confirmMessage" name="message" rows="3" placeholder="Ghi chú thêm nếu cần..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">
                        <span class="btn-text">Xác nhận tham gia</span>
                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                    </button>
                </form>
                <div class="alert alert-custom-success mt-3 d-none" id="confirmSuccess">
                    ✅ Đã xác nhận tham gia thành công! Cảm ơn bạn đã đăng ký.
                </div>
                <div class="alert alert-custom-error mt-3 d-none" id="confirmError">
                    ❌ <span class="error-message">Có lỗi xảy ra. Vui lòng thử lại sau.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Góp ý thời gian -->
<div class="modal fade" id="suggestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-lightbulb text-warning"></i> 
                    Góp ý thời gian
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="suggestForm">
                    <div class="mb-3">
                        <label for="suggestName" class="form-label">Họ và tên *</label>
                        <input type="text" class="form-control" id="suggestName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="suggestPhone" class="form-label">Số điện thoại *</label>
                        <input type="tel" class="form-control" id="suggestPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="suggestDate" class="form-label">Ngày đề xuất *</label>
                        <input type="date" class="form-control" id="suggestDate" name="suggested_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="suggestDuration" class="form-label">Thời gian đi</label>
                        <select class="form-control" id="suggestDuration" name="duration">
                            <option value="1">1 ngày</option>
                            <option value="2" selected>2 ngày 1 đêm</option>
                            <option value="3">3 ngày 2 đêm</option>
                            <option value="4">4 ngày 3 đêm</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suggestActivities" class="form-label">Hoạt động mong muốn</label>
                        <textarea class="form-control" id="suggestActivities" name="activities" rows="3" placeholder="Ví dụ: Tắm biển, Ăn hải sản, Chụp ảnh, Karaoke..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="suggestBudget" class="form-label">Ngân sách dự kiến (VNĐ)</label>
                        <input type="number" class="form-control" id="suggestBudget" name="budget" placeholder="Ví dụ: 500000">
                    </div>
                    <button type="submit" class="btn btn-custom w-100">
                        <span class="btn-text">Gửi góp ý</span>
                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                    </button>
                </form>
                <div class="alert alert-custom-success mt-3 d-none" id="suggestSuccess">
                    ✅ Đã gửi góp ý thành công! Cảm ơn bạn đã đóng góp ý kiến.
                </div>
                <div class="alert alert-custom-error mt-3 d-none" id="suggestError">
                    ❌ <span class="error-message">Có lỗi xảy ra. Vui lòng thử lại sau.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center text-white mt-5">
    <p>© 2025 Giáo phái Ngưng Trình Bày - Hành hương Vũng Tàu</p>
    <p>Được tạo bởi <a href="https://www.facebook.com/vonhuthao180903" target="_blank">Võ Nhựt Hào</a></p>
</footer>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Xử lý form xác nhận tham gia
    $('#confirmForm').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        const btnText = submitBtn.find('.btn-text');
        const spinner = submitBtn.find('.spinner-border');
        const successAlert = $('#confirmSuccess');
        const errorAlert = $('#confirmError');
        
        // Reset alerts
        successAlert.addClass('d-none');
        errorAlert.addClass('d-none');
        
        // Show loading
        submitBtn.prop('disabled', true);
        btnText.text('Đang gửi...');
        spinner.removeClass('d-none');
        
        // Submit form
        $.ajax({
            url: '{{ route("trip.confirm") }}',
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    successAlert.removeClass('d-none');
                    form[0].reset();
                    
                    // Auto close modal after 2 seconds
                    setTimeout(() => {
                        $('#confirmModal').modal('hide');
                    }, 2000);
                } else {
                    throw new Error(response.message || 'Có lỗi xảy ra');
                }
            },
            error: function(xhr) {
                let message = 'Có lỗi xảy ra. Vui lòng thử lại sau.';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = Object.values(xhr.responseJSON.errors).flat();
                    message = errors.join('<br>');
                }
                
                errorAlert.find('.error-message').html(message);
                errorAlert.removeClass('d-none');
            },
            complete: function() {
                // Hide loading
                submitBtn.prop('disabled', false);
                btnText.text('Xác nhận tham gia');
                spinner.addClass('d-none');
            }
        });
    });
    
    // Xử lý form góp ý thời gian
    $('#suggestForm').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        const btnText = submitBtn.find('.btn-text');
        const spinner = submitBtn.find('.spinner-border');
        const successAlert = $('#suggestSuccess');
        const errorAlert = $('#suggestError');
        
        // Reset alerts
        successAlert.addClass('d-none');
        errorAlert.addClass('d-none');
        
        // Show loading
        submitBtn.prop('disabled', true);
        btnText.text('Đang gửi...');
        spinner.removeClass('d-none');
        
        // Submit form
        $.ajax({
            url: '{{ route("trip.suggest") }}',
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    successAlert.removeClass('d-none');
                    form[0].reset();
                    
                    // Auto close modal after 2 seconds
                    setTimeout(() => {
                        $('#suggestModal').modal('hide');
                    }, 2000);
                } else {
                    throw new Error(response.message || 'Có lỗi xảy ra');
                }
            },
            error: function(xhr) {
                let message = 'Có lỗi xảy ra. Vui lòng thử lại sau.';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = Object.values(xhr.responseJSON.errors).flat();
                    message = errors.join('<br>');
                }
                
                errorAlert.find('.error-message').html(message);
                errorAlert.removeClass('d-none');
            },
            complete: function() {
                // Hide loading
                submitBtn.prop('disabled', false);
                btnText.text('Gửi góp ý');
                spinner.addClass('d-none');
            }
        });
    });
    
    // Reset form khi đóng modal
    $('.modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('.alert').addClass('d-none');
        $(this).find('button[type="submit"]').prop('disabled', false);
        $(this).find('.btn-text').text($(this).find('.btn-text').data('original-text') || 'Gửi');
        $(this).find('.spinner-border').addClass('d-none');
    });
});
</script>
@endpush 