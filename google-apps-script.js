// Google Apps Script để xử lý form và lưu vào Google Sheets
// Hướng dẫn sử dụng:
// 1. Mở Google Apps Script (script.google.com)
// 2. Tạo project mới
// 3. Copy code này vào file Code.gs
// 4. Tạo Google Sheet và copy ID của sheet
// 5. Deploy as web app
// 6. Copy URL và thay thế vào file index.html

function doPost(e) {
  try {
    Logger.log('POST request received');
    Logger.log('Post data: ' + e.postData.contents);
    
    // Parse JSON data from the request
    const data = JSON.parse(e.postData.contents);
    Logger.log('Parsed data: ' + JSON.stringify(data));
    
    // Get the active spreadsheet
    const spreadsheetId = '1k6FC5cA7aZMtxfMK5347VW8PkJN7tS5pAKRmwrIulKo';
    Logger.log('Opening spreadsheet: ' + spreadsheetId);
    
    const spreadsheet = SpreadsheetApp.openById(spreadsheetId);
    Logger.log('Spreadsheet opened successfully');
    
    // Get the appropriate sheet based on form type
    let sheet;
    if (data.type === 'confirm') {
      sheet = spreadsheet.getSheetByName('Xác nhận tham gia') || spreadsheet.insertSheet('Xác nhận tham gia');
      Logger.log('Using confirmation sheet');
    } else if (data.type === 'suggest') {
      sheet = spreadsheet.getSheetByName('Góp ý thời gian') || spreadsheet.insertSheet('Góp ý thời gian');
      Logger.log('Using suggestion sheet');
    } else {
      throw new Error('Invalid form type: ' + data.type);
    }
    
    // Prepare data for insertion
    const rowData = prepareRowData(data);
    Logger.log('Row data prepared: ' + JSON.stringify(rowData));
    
    // Insert data into sheet
    sheet.appendRow(rowData);
    Logger.log('Data inserted successfully');
    
    // Return success response with CORS headers
    return ContentService
      .createTextOutput(JSON.stringify({ 'result': 'success' }))
      .setMimeType(ContentService.MimeType.JSON)
      .setHeader('Access-Control-Allow-Origin', '*')
      .setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
      .setHeader('Access-Control-Allow-Headers', 'Content-Type');
      
  } catch (error) {
    Logger.log('Error in doPost: ' + error.toString());
    Logger.log('Error stack: ' + error.stack);
    
    // Return error response with CORS headers
    return ContentService
      .createTextOutput(JSON.stringify({ 'result': 'error', 'error': error.toString() }))
      .setMimeType(ContentService.MimeType.JSON)
      .setHeader('Access-Control-Allow-Origin', '*')
      .setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
      .setHeader('Access-Control-Allow-Headers', 'Content-Type');
  }
}

function doGet(e) {
  try {
    // Handle JSONP requests
    const callback = e.parameter.callback;
    const dataParam = e.parameter.data;
    
    if (callback && dataParam) {
      // Parse the data
      const data = JSON.parse(decodeURIComponent(dataParam));
      
      // Get the active spreadsheet
      const spreadsheetId = '1k6FC5cA7aZMtxfMK5347VW8PkJN7tS5pAKRmwrIulKo';
      const spreadsheet = SpreadsheetApp.openById(spreadsheetId);
      
      // Get the appropriate sheet based on form type
      let sheet;
      if (data.type === 'confirm') {
        sheet = spreadsheet.getSheetByName('Xác nhận tham gia') || spreadsheet.insertSheet('Xác nhận tham gia');
      } else if (data.type === 'suggest') {
        sheet = spreadsheet.getSheetByName('Góp ý thời gian') || spreadsheet.insertSheet('Góp ý thời gian');
      } else {
        throw new Error('Invalid form type');
      }
      
      // Prepare data for insertion
      const rowData = prepareRowData(data);
      
      // Insert data into sheet
      sheet.appendRow(rowData);
      
      // Return JSONP response
      const response = JSON.stringify({ 'result': 'success' });
      return ContentService
        .createTextOutput(callback + '(' + response + ')')
        .setMimeType(ContentService.MimeType.JAVASCRIPT);
    }
    
    // Regular GET request
    return ContentService
      .createTextOutput('Form handler is working!')
      .setMimeType(ContentService.MimeType.TEXT);
      
  } catch (error) {
    const callback = e.parameter.callback;
    if (callback) {
      const response = JSON.stringify({ 'result': 'error', 'error': error.toString() });
      return ContentService
        .createTextOutput(callback + '(' + response + ')')
        .setMimeType(ContentService.MimeType.JAVASCRIPT);
    }
    
    return ContentService
      .createTextOutput('Error: ' + error.toString())
      .setMimeType(ContentService.MimeType.TEXT);
  }
}

function prepareRowData(data) {
  const timestamp = new Date(data.timestamp);
  const formattedDate = Utilities.formatDate(timestamp, 'Asia/Ho_Chi_Minh', 'dd/MM/yyyy HH:mm:ss');
  
  if (data.type === 'confirm') {
    return [
      formattedDate,           // Thời gian gửi
      data.name || '',         // Họ và tên
      data.phone || '',        // Số điện thoại
      data.email || '',        // Email
      data.message || ''       // Lời nhắn
    ];
  } else if (data.type === 'suggest') {
    return [
      formattedDate,           // Thời gian gửi
      data.name || '',         // Họ và tên
      data.phone || '',        // Số điện thoại
      data.suggestedDate || '', // Ngày đề xuất
      data.duration || '',     // Thời gian đi
      data.activities || '',   // Hoạt động mong muốn
      data.budget || ''        // Ngân sách dự kiến
    ];
  }
  
  return [];
}

// Function to set up headers for the sheets
function setupSheetHeaders() {
  const spreadsheetId = '1k6FC5cA7aZMtxfMK5347VW8PkJN7tS5pAKRmwrIulKo';
  const spreadsheet = SpreadsheetApp.openById(spreadsheetId);
  
  // Setup headers for confirmation sheet
  let confirmSheet = spreadsheet.getSheetByName('Xác nhận tham gia');
  if (!confirmSheet) {
    confirmSheet = spreadsheet.insertSheet('Xác nhận tham gia');
  }
  
  const confirmHeaders = [
    'Thời gian gửi',
    'Họ và tên',
    'Số điện thoại',
    'Email',
    'Lời nhắn'
  ];
  
  confirmSheet.getRange(1, 1, 1, confirmHeaders.length).setValues([confirmHeaders]);
  confirmSheet.getRange(1, 1, 1, confirmHeaders.length).setFontWeight('bold');
  confirmSheet.getRange(1, 1, 1, confirmHeaders.length).setBackground('#667eea');
  confirmSheet.getRange(1, 1, 1, confirmHeaders.length).setFontColor('white');
  
  // Setup headers for suggestion sheet
  let suggestSheet = spreadsheet.getSheetByName('Góp ý thời gian');
  if (!suggestSheet) {
    suggestSheet = spreadsheet.insertSheet('Góp ý thời gian');
  }
  
  const suggestHeaders = [
    'Thời gian gửi',
    'Họ và tên',
    'Số điện thoại',
    'Ngày đề xuất',
    'Thời gian đi',
    'Hoạt động mong muốn',
    'Ngân sách dự kiến'
  ];
  
  suggestSheet.getRange(1, 1, 1, suggestHeaders.length).setValues([suggestHeaders]);
  suggestSheet.getRange(1, 1, 1, suggestHeaders.length).setFontWeight('bold');
  suggestSheet.getRange(1, 1, 1, suggestHeaders.length).setBackground('#667eea');
  suggestSheet.getRange(1, 1, 1, suggestHeaders.length).setFontColor('white');
  
  // Auto-resize columns
  confirmSheet.autoResizeColumns(1, confirmHeaders.length);
  suggestSheet.autoResizeColumns(1, suggestHeaders.length);
}

// Function to test the setup
function testSetup() {
  setupSheetHeaders();
  Logger.log('Sheet headers have been set up successfully!');
} 