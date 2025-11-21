# CodeConnect 2025 - Backend Setup Guide

## 📋 Overview

This backend system automatically saves badge information to a MySQL database whenever a user downloads their badge.

## 🗄️ Database Structure

**Database Name:** `iwillbethere`

### Tables

#### 1. `badges` Table
Stores all badge information:
- `id` - Unique identifier
- `full_name` - User's full name
- `role` - User's role/title
- `language` - Badge language (en/fr)
- `badge_filename` - Stored filename
- `badge_path` - Relative path to the image
- `ip_address` - User's IP address
- `user_agent` - User's browser information
- `created_at` - Timestamp when created
- `updated_at` - Timestamp when updated

#### 2. `download_stats` Table (Optional)
Tracks download statistics:
- `id` - Unique identifier
- `badge_id` - Reference to badges table
- `downloaded_at` - Download timestamp
- `ip_address` - IP address

## 🚀 Quick Setup

### Method 1: Automatic Setup (Recommended)

1. Make sure XAMPP is running (Apache & MySQL)

2. Open your browser and navigate to:
   ```
   http://localhost/iwillbethere/setup.php
   ```

3. Click the "Setup Database" button

4. Done! The database and tables will be created automatically.

### Method 2: Manual Setup

1. Open phpMyAdmin: `http://localhost/phpmyadmin`

2. Click "SQL" tab

3. Copy and paste the contents of `config/schema.sql`

4. Click "Go"

## 📁 Folder Structure

```
iwillbethere/
├── api/
│   └── save_badge.php          # API endpoint for saving badges
├── config/
│   ├── database.php            # Database configuration
│   └── schema.sql              # Database schema
├── uploads/
│   ├── .htaccess              # Allow image access
│   └── badges/                # Badge images stored here
├── setup.php                  # Database setup wizard
├── index.php                  # Main application
└── script.js                  # Frontend JavaScript (updated)
```

## ⚙️ Configuration

Edit `config/database.php` if you need to change database settings:

```php
define('DB_HOST', 'localhost');    // Database host
define('DB_NAME', 'iwillbethere'); // Database name
define('DB_USER', 'root');         // MySQL username
define('DB_PASS', '');             // MySQL password (empty for XAMPP)
```

## 🔧 How It Works

1. **User fills out the form** (name, role, photo)
2. **User clicks "Download Badge"**
3. **Frontend JavaScript:**
   - Generates the badge on canvas
   - Triggers download to user's device
   - Converts badge to base64
   - Sends data to backend via AJAX
4. **Backend PHP:**
   - Receives the data
   - Saves image to `uploads/badges/`
   - Stores information in database
   - Returns success response
5. **Process completes silently** (doesn't interrupt user experience)

## 🔍 Testing the Setup

### Test Database Connection

Visit: `http://localhost/iwillbethere/setup.php?test=1`

This will:
- Test database connection
- Show existing tables
- Confirm setup is working

### Test Badge Creation

1. Go to: `http://localhost/iwillbethere/`
2. Fill in your name and role
3. Upload a photo
4. Click "Download Badge"
5. Check browser console for success message
6. Verify in database:
   ```sql
   SELECT * FROM badges ORDER BY created_at DESC LIMIT 5;
   ```

## 📊 Viewing Saved Badges

### Via phpMyAdmin

1. Open: `http://localhost/phpmyadmin`
2. Select `iwillbethere` database
3. Click on `badges` table
4. View all saved badges

### Via SQL Query

```sql
-- View all badges
SELECT * FROM badges ORDER BY created_at DESC;

-- View badges by language
SELECT * FROM badges WHERE language = 'en';

-- Count total badges
SELECT COUNT(*) as total_badges FROM badges;

-- View today's badges
SELECT * FROM badges WHERE DATE(created_at) = CURDATE();
```

## 🛡️ Security Features

- ✅ SQL injection protection (using PDO prepared statements)
- ✅ Input sanitization
- ✅ File type validation
- ✅ Unique filename generation
- ✅ Directory traversal prevention
- ✅ Error logging (not exposed to users)

## 📝 API Endpoint

### POST `/api/save_badge.php`

**Request Body:**
```
name: string (required)
role: string (required)
language: string (en|fr)
badge: string (base64 encoded image)
```

**Success Response (200):**
```json
{
  "success": true,
  "message": "Badge saved successfully!",
  "data": {
    "id": 1,
    "filename": "john_doe_1637508234_a1b2c3d4.png",
    "path": "uploads/badges/john_doe_1637508234_a1b2c3d4.png"
  }
}
```

**Error Response (400/500):**
```json
{
  "success": false,
  "message": "Error message here"
}
```

## 🔧 Troubleshooting

### Database Connection Failed

**Problem:** Can't connect to database

**Solutions:**
- Ensure MySQL is running in XAMPP
- Check credentials in `config/database.php`
- Create database manually: `CREATE DATABASE iwillbethere;`

### Image Upload Failed

**Problem:** Images not saving

**Solutions:**
- Check folder permissions: `chmod 755 uploads/badges/`
- Ensure `uploads/badges/` directory exists
- Check PHP upload settings in `php.ini`:
  ```ini
  upload_max_filesize = 10M
  post_max_size = 10M
  ```

### CORS Errors

**Problem:** Cross-origin request blocked

**Solutions:**
- Access via `http://localhost/iwillbethere/` (not `file://`)
- Check `.htaccess` settings
- Ensure Apache `mod_rewrite` is enabled

## 🚀 Production Deployment

Before deploying to production:

1. **Update database credentials** in `config/database.php`
2. **Remove error exposure** in `api/save_badge.php`:
   ```php
   // Remove this line:
   'error' => $e->getMessage()
   ```
3. **Set proper permissions:**
   ```bash
   chmod 755 uploads/
   chmod 755 uploads/badges/
   ```
4. **Enable HTTPS** for secure data transmission
5. **Set up database backups**
6. **Monitor storage space** for uploaded images

## 📞 Support

For issues or questions, check the console logs:
- Browser Console (F12) - Frontend errors
- Apache Error Log - Backend errors
  - Location: `xampp/apache/logs/error.log`

## 📄 License

© 2025 CodeConnect. All rights reserved.
