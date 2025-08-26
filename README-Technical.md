# 📋 Online Charity Portal - Detailed Technical Documentation

> **Internal Documentation for Developers and System Administrators**

---

## 📁 Project Structure Analysis

### 🗂️ **Directory Architecture**

```
online-charity-portal/
├── 📁 admin/                          # Administrative Panel
│   ├── 📄 catagory.php               # Category CRUD operations
│   ├── 📄 dashboard.php              # Admin dashboard with statistics
│   ├── 📄 donarInfo.php              # Donor information management
│   ├── 📄 login.php                  # Admin authentication
│   ├── 📄 profile.php                # Admin profile management
│   ├── 📄 registration.php           # Admin registration
│   ├── 📄 users.php                  # User management (CRUD)
│   ├── 📄 viewCatagory.php           # Category viewing interface
│   ├── 📄 volunteerInfo.php          # Volunteer management
│   ├── 📁 assets/                     # Admin panel assets
│   │   ├── 📁 css/                   # Stylesheets for admin
│   │   ├── 📁 images/                # Admin interface images
│   │   ├── 📁 js/                    # JavaScript files
│   │   └── 📁 vendors/               # Third-party libraries
│   ├── 📁 inc/                       # Include files
│   │   ├── 📄 connection.php         # Database connection
│   │   ├── 📄 footer.php             # Admin footer
│   │   ├── 📄 functions.php          # Helper functions
│   │   ├── 📄 header.php             # Admin header
│   │   └── 📄 logout.php             # Logout functionality
│   └── 📁 Theme Template/             # UI template files
│
├── 📁 frontend/                       # Public-facing website
│   ├── 📄 index.php                  # Homepage with donation stats
│   ├── 📄 donation.php               # Donation form and processing
│   ├── 📄 checkout.php               # SSL Commerce payment gateway
│   ├── 📄 success.php                # Payment success handler
│   ├── 📄 failure.php                # Payment failure handler
│   ├── 📄 login.php                  # User authentication
│   ├── 📄 registration.php           # User registration with email verification
│   ├── 📄 volunteer.php              # Volunteer registration
│   ├── 📄 profile.php                # User profile management
│   ├── 📄 userEdit.php               # User profile editing
│   ├── 📄 donationinfo.php           # User donation history
│   ├── 📄 forget.php                 # Password recovery
│   ├── 📄 changePassword.php         # Password reset
│   ├── 📄 changePassSuccess.php      # Password reset confirmation
│   ├── 📄 volSuccess.php             # Volunteer registration success
│   ├── 📄 projects.php               # Project listings
│   ├── 📄 composer.json              # PHP dependencies
│   ├── 📁 css/                       # Frontend stylesheets
│   ├── 📁 fonts/                     # Web fonts
│   ├── 📁 img/                       # Frontend images
│   ├── 📁 inc/                       # Include files
│   ├── 📁 js/                        # Frontend JavaScript
│   ├── 📁 scss/                      # SASS source files
│   ├── 📁 vendor/                    # Composer dependencies
│   └── 📁 Alternative Pages/          # Alternative page designs
│
├── 📁 Database/                       # Database schema documentation
│   ├── 🖼️ catagory.png              # Category table structure
│   ├── 🖼️ donationinfo.png          # Donation table structure
│   ├── 🖼️ users.png                 # Users table structure
│   └── 🖼️ volunteer.png             # Volunteer table structure
│
├── 📁 Testing Pages/                  # Development testing files
│   ├── 📄 donation.php               # Donation testing variants
│   ├── 📄 donation2.php              # Alternative donation form
│   ├── 📄 donation3.php              # Testing donation interface
│   ├── 📄 donation4.php              # Final donation form test
│   ├── 📄 success2.php               # Success page variant
│   └── 📄 successTest.php            # Success handler testing
│
├── 📁 css/                           # Global stylesheets
├── 📁 fonts/                         # Font assets
├── 📁 images/                        # Global image assets
├── 📁 js/                           # Global JavaScript
├── 📁 vendor/                       # Frontend libraries
└── 📄 README.md                     # Project documentation
```

---

## 🗄️ Database Schema Analysis

### **Database: `charity`**

**Host:** localhost  
**Charset:** UTF-8  
**Engine:** InnoDB (recommended)

### 📊 **Table: `users`**

```sql
CREATE TABLE users (
    u_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,  -- SHA1 encrypted
    address TEXT,
    birthday DATE,
    gender ENUM('male', 'female', 'other'),
    biodata TEXT,
    photo VARCHAR(255),
    user_role TINYINT DEFAULT 3,  -- 1: Super Admin, 2: Admin, 3: User
    status TINYINT DEFAULT 1,     -- 1: Active, 0: Inactive
    verification TINYINT DEFAULT 0, -- 1: Verified, 0: Unverified
    CodeV VARCHAR(255),           -- Email verification code
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 📊 **Table: `volunteer`**

```sql
CREATE TABLE volunteer (
    v_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    gender ENUM('male', 'female', 'other'),
    birthdate DATE,
    address TEXT,
    availability ENUM('full-time', 'part-time', 'weekends-only'),
    skills TEXT,
    bloodGroup VARCHAR(5),
    reference VARCHAR(255),
    volunteering_period VARCHAR(255),
    message TEXT,
    verification TINYINT DEFAULT 0,
    CodeV VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 📊 **Table: `catagory`**

```sql
CREATE TABLE catagory (
    c_id INT AUTO_INCREMENT PRIMARY KEY,
    c_name VARCHAR(255) NOT NULL,
    c_description TEXT,
    c_photo VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 📊 **Table: `donationinfo`**

```sql
CREATE TABLE donationinfo (
    p_key INT AUTO_INCREMENT PRIMARY KEY,
    d_id INT,  -- References users.u_id (0 for anonymous)
    d_catagory VARCHAR(255),
    d_name VARCHAR(255),
    d_email VARCHAR(255),
    d_message TEXT,
    d_amount DECIMAL(10,2),
    donation_status VARCHAR(50) DEFAULT 'Pending',
    t_id VARCHAR(255),        -- Transaction ID from SSL Commerce
    t_date DATETIME,          -- Transaction date
    t_status VARCHAR(50),     -- Transaction status (VALID, FAILED, etc.)
    t_method VARCHAR(50),     -- Payment method
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (d_id) REFERENCES users(u_id) ON DELETE SET NULL
);
```

---

## 🔧 Technical Implementation Details

### 🌐 **Frontend Architecture**

#### **Main Pages Flow:**

1. **index.php** - Landing page with donation statistics
2. **donation.php** - Donation form with category selection
3. **checkout.php** - SSL Commerce payment integration
4. **success.php** - Payment success with database update
5. **failure.php** - Payment failure handling

#### **User Management:**

- **registration.php** - User signup with PHPMailer email verification
- **login.php** - Authentication with role-based redirection
- **profile.php** - User profile viewing
- **userEdit.php** - Profile editing functionality

#### **Volunteer System:**

- **volunteer.php** - Volunteer registration with email verification
- **volSuccess.php** - Email verification confirmation

### 🔒 **Authentication System**

#### **Password Security:**

```php
// Password hashing
$hashedPassword = sha1($password);

// Login verification
$loginPassword = sha1($inputPassword);
if($email == $sessionEmail && $loginPassword == $sessionPassword) {
    // Login successful
}
```

#### **Email Verification Flow:**

```php
// Generate verification code
$Code = mysqli_real_escape_string($db, sha1(rand()));

// Email verification link
$verificationLink = "http://localhost/charity/frontend/login.php?Verification=" . $Code;

// Verification check
if (isset($_GET['Verification'])) {
    $query = mysqli_query($db, "UPDATE users SET verification='1' WHERE CodeV='{$_GET['Verification']}'");
}
```

#### **Session Management:**

```php
session_start();
$_SESSION['loginUserId']    = $row['u_id'];
$_SESSION['loginName']      = $row['name'];
$_SESSION['loginEmail']     = $row['email'];
$_SESSION['loginUserRole']  = $row['user_role'];
```

### 💳 **Payment Integration (SSL Commerce)**

#### **Checkout Process:**

```php
// Payment configuration
$post_data['store_id'] = "chari6491579b6bc58";
$post_data['store_passwd'] = "chari6491579b6bc58@ssl";
$post_data['total_amount'] = $_GET['amount'];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();

// Success/Failure URLs
$post_data['success_url'] = "http://www.charity.com/charity/frontend/success.php";
$post_data['fail_url'] = "http://www.charity.com/charity/frontend/failure.php";
```

#### **Transaction Validation:**

```php
// Validation URL
$requested_url = "https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json";

// Parse response
$result = json_decode($result);
$status = $result->status;
$tran_id = $result->tran_id;
$amount = $result->amount;
```

### 📧 **Email System (PHPMailer)**

#### **SMTP Configuration:**

```php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ishtiyak@gmail.com';
$mail->Password = ''; // App password required
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
```

#### **Email Templates:**

- **Registration Verification**
- **Volunteer Confirmation**
- **Password Recovery**

### 🔐 **Admin Panel Features**

#### **User Management (users.php):**

- CRUD operations for users
- Role-based access control
- Profile photo management
- Status management (Active/Inactive)

#### **Category Management (catagory.php):**

- Add/Edit/Delete charity categories
- Image upload for categories
- Category statistics

#### **Donation Management (donarInfo.php):**

- View all donations
- Transaction details
- Payment status tracking
- Donor information

#### **Volunteer Management (volunteerInfo.php):**

- Volunteer applications
- Verification status
- Skills and availability tracking

### 📊 **Dashboard Analytics**

#### **Statistics Tracked:**

```php
// Total donations
$collection = "SELECT d_amount FROM donationinfo";

// User count
$follwers = "SELECT * FROM users";

// Volunteer count
$volunteers = "SELECT * FROM volunteer";

// Categories count
$catagories = "SELECT * FROM catagory";
```

---

## 🛠️ **Development Environment Setup**

### **Required Software:**

- **XAMPP/WAMP** - Local server environment
- **PHP 7.4+** - Server-side scripting
- **MySQL 8.0+** - Database management
- **Composer** - Dependency management
- **Git** - Version control

### **Installation Steps:**

1. **Clone Repository:**

```bash
git clone https://github.com/RashedCSEJnU/online-charity-portal.git
cd online-charity-portal
```

2. **Database Setup:**

```sql
CREATE DATABASE charity CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE charity;

-- Import table structures from Database/ folder images
-- Or run SQL commands based on schema analysis above
```

3. **Environment Configuration:**

```php
// Update database credentials in:
// - admin/inc/connection.php
// - frontend/inc/connection.php

$db = mysqli_connect('localhost', 'root', '', 'charity');
```

4. **Email Configuration:**

```php
// Update SMTP settings in:
// - frontend/registration.php
// - frontend/volunteer.php
// - frontend/forget.php

$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-app-password';
```

5. **SSL Commerce Setup:**

```php
// Update payment credentials in:
// - frontend/checkout.php

$post_data['store_id'] = "your-store-id";
$post_data['store_passwd'] = "your-store-password";
```

---

## 🔍 **Code Analysis & Architecture**

### **File Organization:**

#### **Frontend Structure:**

- **inc/connection.php** - Database connection
- **inc/header.php** - Common header with navigation
- **inc/footer.php** - Common footer
- **css/** - Custom styling
- **js/** - Frontend JavaScript
- **vendor/** - Composer dependencies

#### **Admin Structure:**

- **inc/connection.php** - Admin database connection
- **inc/functions.php** - Helper functions
- **assets/** - Admin panel assets
- **Theme Template/** - Admin UI components

### **Security Measures:**

#### **Input Sanitization:**

```php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// SQL injection prevention
$email = mysqli_real_escape_string($db, $_POST['email']);
```

#### **File Upload Security:**

```php
$granted_extn = array('jpg','png','jpeg');
$extension = strtolower(end(explode('.', $_FILES['photo']['name'])));

if(in_array($extension, $granted_extn) === false) {
    echo 'Please insert jpg, png or jpeg extension files!!!';
}
```

#### **Session Security:**

```php
// Admin access protection
if(empty($_SESSION['loginEmail'])){
    header('Location: login.php');
}

// Role-based access
if($_SESSION['loginUserRole'] == 1 || $_SESSION['loginUserRole'] == 2){
    // Admin access
} else {
    // Regular user access
}
```

---

## 🚀 **Deployment Guidelines**

### **Production Setup:**

1. **Server Requirements:**

   - PHP 7.4+ with extensions: mysqli, curl, openssl
   - MySQL 8.0+
   - SSL certificate for HTTPS
   - Sufficient storage for file uploads

2. **Database Migration:**

   ```sql
   -- Export from development
   mysqldump -u root -p charity > charity_backup.sql

   -- Import to production
   mysql -u username -p charity < charity_backup.sql
   ```

3. **Configuration Updates:**

   - Update database credentials
   - Change SSL Commerce to live environment
   - Update email SMTP settings
   - Set proper file permissions (755 for directories, 644 for files)

4. **Security Hardening:**
   - Enable HTTPS
   - Update default passwords
   - Implement rate limiting
   - Regular security updates

### **Backup Strategy:**

- **Daily database backups**
- **Weekly full system backups**
- **Version control with Git**
- **Offsite backup storage**

---

## 🐛 **Debugging & Troubleshooting**

### **Common Issues:**

#### **Database Connection Errors:**

```php
// Check connection
if(!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
```

#### **Email Delivery Issues:**

```php
// Debug SMTP
$mail->SMTPDebug = 2; // Enable verbose debug output

// Check for errors
if(!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
```

#### **Payment Gateway Issues:**

- Verify SSL Commerce credentials
- Check sandbox vs. live environment
- Validate success/failure URLs
- Monitor transaction logs

### **Performance Optimization:**

#### **Database Optimization:**

```sql
-- Add indexes for frequently queried columns
CREATE INDEX idx_email ON users(email);
CREATE INDEX idx_donation_status ON donationinfo(donation_status);
CREATE INDEX idx_verification ON volunteer(verification);
```

#### **Caching Strategy:**

- Implement PHP OPCache
- Use session-based caching for user data
- Optimize database queries
- Compress static assets

---

## 📈 **Future Enhancement Roadmap**

### **Immediate Improvements:**

1. **Input validation enhancement**
2. **Error handling standardization**
3. **Code documentation**
4. **Unit testing implementation**

### **Feature Additions:**

1. **Multi-language support**
2. **Advanced reporting dashboard**
3. **Mobile app development**
4. **Social media integration**
5. **Recurring donation system**
6. **Volunteer scheduling system**

### **Technical Upgrades:**

1. **Migration to PHP 8+**
2. **Modern framework adoption (Laravel/CodeIgniter)**
3. **API development for mobile apps**
4. **Enhanced security measures**
5. **Performance monitoring**

---

## 📞 **Support & Maintenance**

### **Monitoring Checklist:**

- [ ] Database performance metrics
- [ ] Server resource utilization
- [ ] Payment gateway status
- [ ] Email delivery rates
- [ ] User activity logs
- [ ] Security audit logs

### **Regular Maintenance:**

- **Weekly:** Security updates
- **Monthly:** Database optimization
- **Quarterly:** Full system backup verification
- **Annually:** Security audit and penetration testing

---

## 📋 **Development Standards**

### **Coding Standards:**

- **PSR-2** coding style (when possible)
- **Meaningful variable names**
- **Proper error handling**
- **Security-first approach**
- **Documentation for complex functions**

### **Git Workflow:**

```bash
# Feature branch creation
git checkout -b feature/new-feature

# Regular commits with meaningful messages
git commit -m "Add email verification for volunteer registration"

# Pull request process for code review
git push origin feature/new-feature
```

### **Testing Protocol:**

1. **Unit testing** for core functions
2. **Integration testing** for payment flow
3. **User acceptance testing** for UI/UX
4. **Security testing** for vulnerabilities
5. **Performance testing** under load

---

_This document serves as a comprehensive guide for developers, system administrators, and maintainers of the Online Charity Portal project._
