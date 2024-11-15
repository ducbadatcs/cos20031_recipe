// Hiển thị pop-up lựa chọn tài khoản
function showAccountSelection() {
    document.getElementById('account-selection-popup').style.display = 'block';
}

// Ẩn pop-up lựa chọn tài khoản
function hideAccountSelection() {
    document.getElementById('account-selection-popup').style.display = 'none';
}

// Chuyển đến giao diện đăng nhập người dùng
function selectUserLogin() {
    hideAccountSelection();
    document.getElementById('user-login').style.display = 'block';
    document.getElementById('admin-login').style.display = 'none';
}

// Chuyển đến giao diện đăng nhập admin
function selectAdminLogin() {
    hideAccountSelection();
    document.getElementById('user-login').style.display = 'none';
    document.getElementById('admin-login').style.display = 'block';
}
