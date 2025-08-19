# Vulnerables Website

**Vulnerables Website** là dự án mô phỏng các website có 5 lỗ hổng thuộc OWASP Top 10 cơ bản, giúp người học, pentester và lập trình viên rèn luyện kiến thức bảo mật web.

---

## Mục lục

1. [Giới thiệu](#giới-thiệu)  
2. [Lỗ hổng mô phỏng](#lỗ-hổng-mô-phỏng)  
3. [Hướng dẫn cài đặt](#hướng-dẫn-cài-đặt)  
    - [Yêu cầu hệ thống](#1-yêu-cầu-hệ-thống)  
    - [Cài đặt mã nguồn](#2-cài-đặt-mã-nguồn)  
    - [Cài đặt và cấu hình Database](#3-cài-đặt-và-cấu-hình-database)  
    - [Khởi động website](#4-khởi-động-website)  
4. [Đóng góp](#đóng-góp)  
5. [Slide báo cáo](#slide-báo-cáo)  
6. [Liên hệ](#liên-hệ)  

---

## Giới thiệu

- **Ngôn ngữ sử dụng**:  
  - PHP  
  - CSS  
  - JavaScript  

- **Mục đích**:  
  - Minh họa các lỗ hổng bảo mật phổ biến.  
  - Hỗ trợ học tập và kiểm thử an toàn, nâng cao nhận thức về bảo mật.  

---

## Lỗ hổng mô phỏng

Dự án bao gồm 5 lỗ hổng bảo mật thuộc [OWASP Top 10](https://owasp.org/Top10/):

1. SQL Injection  
2. XSS (Stored XSS)  
3. Broken Access Control (Path Traversal)  
4. Security Misconfiguration (Magic Hash / Type Juggling)  
5. Security Misconfiguration (File Upload)  

---

## Hướng dẫn cài đặt

### 1. Yêu cầu hệ thống
- PHP >= 7.x  
- Máy chủ web: Apache hoặc Nginx  
- MySQL/MariaDB  

### 2. Cài đặt mã nguồn
```bash
git clone https://github.com/imasadstone/vulnerables_website.git
```

- Di chuyển tất cả mã nguồn vào thư mục web root của bạn (ví dụ: `htdocs` với XAMPP).  

### 3. Cài đặt và cấu hình Database

#### a) Tạo database mới
Đăng nhập MySQL và chạy:  
```sql
CREATE DATABASE vulnerables_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'vuln_user'@'localhost' IDENTIFIED BY 'vuln_password';
GRANT ALL PRIVILEGES ON vulnerables_website.* TO 'vuln_user'@'localhost';
FLUSH PRIVILEGES;
```

#### b) Import cấu trúc và dữ liệu mẫu
Tìm file `manga_db.sql` trong thư mục dự án, sau đó import vào database vừa tạo:  
```bash
mysql -u vuln_user -p vulnerables_website < path/to/manga_db.sql
```

#### c) Cấu hình kết nối database
Mở file `config.php` và chỉnh sửa thông tin:  
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'vuln_user');
define('DB_PASS', 'vuln_password');
define('DB_NAME', 'vulnerables_website');
?>
```

### 4. Khởi động website
- Khởi động Apache/Nginx và MySQL.  
- Truy cập trên trình duyệt:  
  ```
  http://localhost/vulnerables_website
  ```

---

## Cảnh báo

Dự án chỉ dùng cho **mục đích học tập và kiểm thử bảo mật**.  
Không triển khai trên môi trường sản xuất hoặc mạng công cộng!  

---

## Đóng góp

Bạn có thể tạo **Pull Request** hoặc **Issue** để đóng góp thêm ví dụ lỗ hổng hoặc cải tiến dự án.  

---

## Slide báo cáo

Bạn có thể xem slide báo cáo tại:  
[Link Canva](https://www.canva.com/design/DAGswYhTMhM/dI3LZLh41RBO2Z4Tjz-9nw/edit?utm_content=DAGswYhTMhM&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

---

## Liên hệ

- Mở Issue trên GitHub.  
- Hoặc liên hệ trực tiếp qua repository.
