# CodeConnect 2025 - I'll Be There Badge Generator

A beautiful, professional landing page and badge generator for CodeConnect 2025 attendees. Create personalized event badges and share them on social media to spread the word about Africa's premier tech conference!

## 🌟 Features

### 🎨 **Professional Landing Page**
- Eye-catching hero section with event details
- Responsive design that works on all devices
- CodeConnect brand colors (Blue #1E90FF, Orange #FF8C42)
- Clean, modern UI with smooth animations

### ⚡ **Live Preview**
- Real-time badge preview as you type
- Instant photo updates when uploaded
- Template loads immediately on page load
- See your changes before downloading

### 📸 **Smart Image Processing**
- Circular photo frame with white border
- Intelligent positioning to prevent head cropping
- Automatic image scaling for all photo orientations
- Optimized for portrait selfies and headshots

### 📱 **Social Media Sharing**
- One-click sharing to X (Twitter), Facebook, Instagram, and LinkedIn
- Pre-written caption with event details and hashtags
- Automatic image download with share prompts
- Professional hashtags: #CodeConnect2025 #TechInAfrica

### 💾 **High-Quality Export**
- 1080 x 1365 px resolution
- PNG format for best quality
- Professional filename: `codeconnect-2025-badge.png`

### 🎭 **Custom Template Support**
- Use your own template.png (1080 x 1365 px)
- Automatic fallback to gradient background
- Precisely positioned text and photo elements

## Folder Structure

```
/iwillbethere/
  ├── index.html          # Main HTML file
  ├── style.css           # Styling and responsive design
  ├── script.js           # Canvas logic and poster generation
  ├── README.md           # This file
  └── /assets/            # Image assets
      ├── template.png    # Background template (optional)
      ├── logo.png        # Logo (optional)
      └── README.md       # Asset instructions
```

## 🚀 How to Use

1. **Visit the Website**
   - Open `index.html` in a modern web browser
   - Or run locally: `python3 -m http.server 8000` and visit `http://localhost:8000`

2. **Create Your Badge**
   - Enter your name
   - Enter your title/role (e.g., "Developer", "Speaker", "Attendee")
   - Upload a photo (JPG, PNG, or any image format)
   - Watch the live preview update in real-time!

3. **Download or Share**
   - Click **"Download Badge"** to save your badge locally
   - Click **"Share on Social Media"** to choose your platform:
     - **X (Twitter)**: Opens with pre-filled caption
     - **Facebook**: Opens share dialog with instructions
     - **Instagram**: Download with mobile sharing instructions
     - **LinkedIn**: Opens share dialog with pre-filled caption

## 📋 Pre-Written Social Caption

When you share, this caption is automatically included:

```
I'm excited to be attending CodeConnect 2025 this November 29th at Krystal Palace, Douala, a space where Africa's brightest tech minds connect, learn, and build the future together.

Can't wait to network, share ideas, and be part of the conversations shaping the next wave of innovation.
See you at Codeconnect, Let's Connect!

#CodeConnect2025 #TechInAfrica #Networking #Innovation #Developers #Entrepreneurs
```

## Customization

### Using a Custom Template

1. Create a 1080 x 1365 px image in your favorite design tool
2. Save it as `template.png` in the `/assets/` folder
3. Design tips:
   - Leave space in the center for a ~560px diameter circular photo
   - Keep the top area clear for the "I'LL BE THERE" title
   - Reserve bottom section for name and role text
   - Use CodeConnect colors for brand consistency

### Modifying Text Positions

Edit `script.js` and adjust these values in the `drawText()` function:
- Title position: `ctx.fillText("I'LL BE THERE", CANVAS_WIDTH / 2, 200);`
- Name position: `const nameY = 920;`
- Role position: `const roleY = nameY + 80;`
- Footer position: `ctx.fillText('CodeConnect 2025', CANVAS_WIDTH / 2, 1280);`

### Changing Colors

Edit CSS variables in `style.css`:
```css
:root {
    --blue-primary: #1E90FF;
    --orange-primary: #FF8C42;
    --white: #FFFFFF;
}
```

Or edit canvas colors in `script.js`:
```javascript
ctx.fillStyle = '#1E90FF'; // Blue
ctx.fillStyle = '#FF8C42'; // Orange
ctx.fillStyle = '#FFFFFF'; // White
```

### Photo Position & Size

Edit `script.js` in the `generatePoster()` function:
```javascript
drawCircularPhoto(uploadedPhoto, 540, 480, 280);
// Parameters: image, x-position, y-position, radius
```

## Browser Compatibility

Works on all modern browsers:
- ✅ Chrome/Edge (recommended)
- ✅ Firefox
- ✅ Safari
- ✅ Opera

## Technical Details

- **No dependencies** - Pure vanilla JavaScript
- **Canvas API** for image manipulation
- **FileReader API** for photo uploads
- **Google Fonts** for Poppins typography
- **CSS Grid** for responsive layout
- **SVG icons** for UI elements

## Tips for Best Results

1. **Photo Quality**
   - Use high-resolution photos (at least 600 x 600 px)
   - Ensure good lighting and clear facial features
   - Square or portrait orientation works best

2. **Name Length**
   - Keep names concise for better readability
   - Font auto-scales but very long names may look cramped

3. **File Size**
   - Maximum upload size: 10MB
   - Recommended: Under 5MB for faster processing

4. **Template Design**
   - Use contrasting colors for text visibility
   - Leave adequate spacing for photo and text
   - Test with different name lengths

## Troubleshooting

**Template image not loading?**
- Check that `template.png` exists in `/assets/` folder
- Verify the image is exactly 1080 x 1365 px
- The app will use a default background if template is missing

**Photo not appearing?**
- Make sure you selected an image file
- Check file size is under 10MB
- Try a different image format (JPG or PNG)

**Download not working?**
- Ensure you clicked "Generate Poster" first
- Try a different browser
- Check browser download settings

**Text too small/large?**
- The app auto-scales text based on length
- Try shorter names/roles for larger text
- Edit font sizes in `script.js` if needed

## License

Feel free to use and modify for your events!

## Credits

Made with ❤️ for CodeConnect 2025

---

Enjoy creating your personalized event posters! 🎉
