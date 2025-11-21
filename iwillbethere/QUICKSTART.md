# 🚀 Quick Start Guide - Backend Setup

## Step-by-Step Instructions

### 1️⃣ Start XAMPP
- Open XAMPP Control Panel
- Start **Apache** module
- Start **MySQL** module

### 2️⃣ Run Database Setup
Open your browser and go to:
```
http://localhost/iwillbethere/setup.php
```

Click the **"Setup Database"** button.

✅ You should see: "Database setup completed successfully!"

### 3️⃣ Test the Application
Go to:
```
http://localhost/iwillbethere/
```

1. Fill in your name
2. Enter your role
3. Upload a photo
4. Click "Download Badge"

### 4️⃣ Verify It's Working

**Check Browser Console (F12):**
You should see: `Badge saved successfully: {id: 1, filename: "...", path: "..."}`

**Check Database:**
Go to phpMyAdmin:
```
http://localhost/phpmyadmin
```

Navigate to: `iwillbethere` → `badges` table

You should see your badge entry!

**Check File System:**
Look in the folder: `uploads/badges/`

Your badge image should be saved there!

### 5️⃣ View Admin Dashboard
```
http://localhost/iwillbethere/admin.php
```

Here you can:
- View all saved badges
- See statistics (total, today, by language)
- Search and filter badges
- Preview badge images

## 🎉 That's It!

Your backend is now fully functional!

Every time someone downloads a badge:
1. ✅ Badge is downloaded to their device
2. ✅ Badge image is saved to `uploads/badges/`
3. ✅ Badge info is saved to database
4. ✅ All happens silently in the background

## 🔧 Troubleshooting

**Problem: "Database connection failed"**
- Solution: Make sure MySQL is running in XAMPP

**Problem: "Table doesn't exist"**
- Solution: Run setup.php again

**Problem: "Image not saving"**
- Solution: Check folder permissions on `uploads/badges/`

**Problem: "Nothing happens when downloading"**
- Solution: Check browser console (F12) for errors

## 📁 What Was Created

```
iwillbethere/
├── api/
│   └── save_badge.php          ← Backend API
├── config/
│   ├── database.php            ← DB settings
│   └── schema.sql              ← DB schema
├── uploads/
│   └── badges/                 ← Images stored here
├── setup.php                   ← Setup wizard
├── admin.php                   ← Admin dashboard
├── BACKEND_SETUP.md            ← Full documentation
└── QUICKSTART.md               ← This file
```

## 🎯 What's Next?

- View badges in admin dashboard
- Monitor database growth
- Export badge data for analytics
- Add more features as needed

Enjoy! 🎊
