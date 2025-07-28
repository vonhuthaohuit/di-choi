<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripController extends Controller
{
    // URL của Google Apps Script Web App
    private $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbyUm6yNoO8uoXfqJju52OkuGyTPBHPQnBfbsQE8CIPR106WA7EqpA3E5FgNjq1uxvDx/exec';

    /**
     * Hiển thị trang chính
     */
    public function index()
    {
        return view('trip.index');
    }

    /**
     * Xử lý form xác nhận tham gia
     */
    public function confirm(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'message' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.email' => 'Email không hợp lệ',
        ]);

        try {
            // Chuẩn bị dữ liệu gửi đến Google Sheets
            $data = [
                'type' => 'confirm',
                'timestamp' => now()->toISOString(),
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'] ?? '',
                'message' => $validated['message'] ?? '',
            ];

            // Gửi request đến Google Apps Script
            $response = Http::timeout(30)->post($this->googleScriptUrl, $data);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Đã xác nhận tham gia thành công! Cảm ơn bạn đã đăng ký.'
                ]);
            } else {
                throw new \Exception('HTTP Error: ' . $response->status());
            }

        } catch (\Exception $e) {
            Log::error('Error submitting confirmation: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra. Vui lòng thử lại sau hoặc liên hệ giáo chủ.'
            ], 500);
        }
    }

    /**
     * Xử lý form góp ý thời gian
     */
    public function suggest(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'suggested_date' => 'required|date',
            'duration' => 'required|in:1,2,3,4',
            'activities' => 'nullable|string|max:1000',
            'budget' => 'nullable|numeric|min:0',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'suggested_date.required' => 'Vui lòng chọn ngày đề xuất',
            'suggested_date.date' => 'Ngày không hợp lệ',
            'duration.required' => 'Vui lòng chọn thời gian đi',
            'duration.in' => 'Thời gian đi không hợp lệ',
            'budget.numeric' => 'Ngân sách phải là số',
        ]);

        try {
            // Chuẩn bị dữ liệu gửi đến Google Sheets
            $data = [
                'type' => 'suggest',
                'timestamp' => now()->toISOString(),
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'suggestedDate' => $validated['suggested_date'],
                'duration' => $validated['duration'] . ' ngày',
                'activities' => $validated['activities'] ?? '',
                'budget' => $validated['budget'] ?? '',
            ];

            // Gửi request đến Google Apps Script
            $response = Http::timeout(30)->post($this->googleScriptUrl, $data);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Đã gửi góp ý thành công! Cảm ơn bạn đã đóng góp ý kiến.'
                ]);
            } else {
                throw new \Exception('HTTP Error: ' . $response->status());
            }

        } catch (\Exception $e) {
            Log::error('Error submitting suggestion: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra. Vui lòng thử lại sau hoặc liên hệ giáo chủ.'
            ], 500);
        }
    }

    /**
     * API để lấy danh sách tham gia (nếu cần)
     */
    public function participants()
    {
        // Có thể implement sau nếu cần
        return response()->json([
            'message' => 'Feature đang phát triển'
        ]);
    }
}
