// DOM Elements
const nameInput = document.getElementById('name');
const roleInput = document.getElementById('role');
const photoInput = document.getElementById('photo');
const fileNameSpan = document.getElementById('file-name');
const downloadBtn = document.getElementById('downloadBtn');
const shareBtn = document.getElementById('shareBtn');
const canvas = document.getElementById('posterCanvas');
const ctx = canvas.getContext('2d');
const placeholder = document.getElementById('placeholder');
const shareModal = document.getElementById('shareModal');
const closeModal = document.getElementById('closeModal');
const languageRadios = document.querySelectorAll('input[name="language"]');
const recropBtn = document.getElementById('recropBtn');

// Crop modal elements
const cropModal = document.getElementById('cropModal');
const closeCropModal = document.getElementById('closeCropModal');
const cropCanvas = document.getElementById('cropCanvas');
const cropCtx = cropCanvas.getContext('2d');
const zoomSlider = document.getElementById('zoomSlider');
const zoomInBtn = document.getElementById('zoomIn');
const zoomOutBtn = document.getElementById('zoomOut');
const applyCropBtn = document.getElementById('applyCrop');

// Social share buttons
const shareTwitter = document.getElementById('shareTwitter');
const shareFacebook = document.getElementById('shareFacebook');
const shareInstagram = document.getElementById('shareInstagram');
const shareLinkedIn = document.getElementById('shareLinkedIn');

// State
let uploadedPhoto = null;
let templateImage = null;
let selectedLanguage = 'en';

// Crop state
let cropImage = null;
let originalImage = null; // Store the original uploaded image
let cropScale = 1;
let cropOffsetX = 0;
let cropOffsetY = 0;
let isDragging = false;
let lastMouseX = 0;
let lastMouseY = 0;

// Social share caption
const shareCaption = `I'm excited to be attending CodeConnect 2025 this November 29th at Krystal Palace, Douala, a space where Africa's brightest tech minds connect, learn, and build the future together.

Can't wait to network, share ideas, and be part of the conversations shaping the next wave of innovation.
See you at Codeconnect, Let's Connect!

#CodeConnect2025 #TechInAfrica #Networking #Innovation #Developers #Entrepreneurs`;

// Canvas dimensions (high quality)
const CANVAS_WIDTH = 1080;
const CANVAS_HEIGHT = 1365;

// Template paths
const TEMPLATES = {
    en: 'assets/template.png',
    fr: 'assets/template_fr.png'
};

// Load template image based on language
function loadTemplate(language = 'en') {
    selectedLanguage = language;
    templateImage = new Image();
    
    // DON'T use crossOrigin when loading from file:// protocol
    // It will cause CORS errors and prevent the image from loading
    
    templateImage.src = TEMPLATES[language];
    
    templateImage.onload = () => {
        console.log(`Template (${language}) loaded successfully!`, templateImage.width, 'x', templateImage.height);
        updateLivePreview();
    };
    
    templateImage.onerror = (e) => {
        console.error(`Template image not found at: ${TEMPLATES[language]}`, e);
        alert(`Warning: ${language.toUpperCase()} template image not found. Using default background.`);
    };
}

// Load template image on page load
window.addEventListener('load', () => {
    loadTemplate('en');
});

// Live preview update function
function updateLivePreview() {
    const name = nameInput.value.trim();
    const role = roleInput.value.trim();
    
    // Clear canvas
    ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    
    // Draw background
    if (templateImage && templateImage.complete && templateImage.width > 0) {
        ctx.drawImage(templateImage, 0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    } else {
        // Fallback gradient background
        const gradient = ctx.createLinearGradient(0, 0, 0, CANVAS_HEIGHT);
        gradient.addColorStop(0, '#1E90FF');
        gradient.addColorStop(0.5, '#667eea');
        gradient.addColorStop(1, '#764ba2');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
        drawDecorativeElements();
    }
    
    // Draw photo if uploaded
    if (uploadedPhoto) {
        drawCircularPhoto(uploadedPhoto, 542, 642, 280);
    }
    
    // Draw text (even if empty, to show placeholder positions)
    drawText(name || 'Your Name', role || 'Your Role');
    
    // Hide placeholder, show canvas
    placeholder.classList.add('hidden');
    
    // Enable download and share buttons only if all fields are filled
    if (name && role && uploadedPhoto) {
        downloadBtn.disabled = false;
        if (shareBtn) shareBtn.disabled = false;
    } else {
        downloadBtn.disabled = true;
        if (shareBtn) shareBtn.disabled = true;
    }
}

// Add live preview listeners
nameInput.addEventListener('input', updateLivePreview);
roleInput.addEventListener('input', updateLivePreview);

// Language change listener
languageRadios.forEach(radio => {
    radio.addEventListener('change', (e) => {
        const selectedLang = e.target.value;
        loadTemplate(selectedLang);
    });
});

// Handle file upload
photoInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 10 * 1024 * 1024) { // 10MB limit
            alert('File size too large. Please choose an image under 10MB.');
            photoInput.value = ''; // Reset input
            return;
        }
        
        fileNameSpan.textContent = file.name;
        
        const reader = new FileReader();
        reader.onload = (event) => {
            const img = new Image();
            img.onload = () => {
                // Store the original image
                originalImage = img;
                // Open crop modal
                openCropModal(img);
            };
            img.src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Ensure selecting the same file again still triggers change
photoInput.addEventListener('click', () => {
    // Clearing the value lets the same file fire a new 'change' event
    photoInput.value = '';
});

// Simple, direct download - with tainted canvas workaround
downloadBtn.addEventListener('click', function(e) {
    e.preventDefault();
    console.log('Download clicked');
    console.log('Canvas dimensions:', canvas.width, 'x', canvas.height);
    
    try {
        // For tainted canvas (when loading template from file://), use toBlob
        // toBlob is less strict than toDataURL about tainted canvases
        if (canvas.toBlob) {
            canvas.toBlob(function(blob) {
                if (!blob) {
                    alert('Failed to generate image. Please make sure all fields are filled.');
                    return;
                }
                
                // Create download link from blob
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.download = 'codeconnect-2025-badge.png';
                link.href = url;
                
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                
                // Clean up the blob URL
                setTimeout(() => URL.revokeObjectURL(url), 100);
                
                console.log('Download triggered successfully via Blob');
            }, 'image/png');
        } else {
            // Fallback for older browsers
            alert('Your browser does not support this download method. Please try a modern browser like Chrome, Firefox, or Safari.');
        }
    } catch (error) {
        console.error('Download error:', error);
        alert('Download failed: ' + error.message + '\n\nPlease try opening this page on http://localhost:8000 instead of directly from file://');
    }
});

// Share button - opens modal (only if share button exists)
if (shareBtn && shareModal) {
    shareBtn.addEventListener('click', () => {
        shareModal.classList.add('active');
    });
}

// Close modal
if (closeModal && shareModal) {
    closeModal.addEventListener('click', () => {
        shareModal.classList.remove('active');
    });
}

// Close modal when clicking outside
if (shareModal) {
    shareModal.addEventListener('click', (e) => {
        if (e.target === shareModal) {
            shareModal.classList.remove('active');
        }
    });
}

// Social Share Functions
if (shareTwitter) {
    shareTwitter.addEventListener('click', () => {
        // First download the image
        downloadBtn.click();
        
        // Open Twitter with pre-filled text
        const twitterUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(shareCaption)}`;
        window.open(twitterUrl, '_blank');
        
        // Show instruction
        setTimeout(() => {
            alert('Your badge has been downloaded! Please attach it to your tweet before posting.');
        }, 500);
    });
}

if (shareFacebook) {
    shareFacebook.addEventListener('click', () => {
        // Download the image
        downloadBtn.click();
        
        // Open Facebook (note: can't pre-fill text due to Facebook policies)
        const facebookUrl = 'https://www.facebook.com/sharer/sharer.php';
        window.open(facebookUrl, '_blank');
        
        // Show instruction with caption
        setTimeout(() => {
            alert(`Your badge has been downloaded!\n\nPlease upload it to Facebook and use this caption:\n\n${shareCaption}`);
        }, 500);
    });
}

if (shareInstagram) {
    shareInstagram.addEventListener('click', () => {
        // Download the image
        downloadBtn.click();
        
        // Show instruction (Instagram doesn't support web posting)
        setTimeout(() => {
            alert(`Your badge has been downloaded!\n\nTo share on Instagram:\n1. Open Instagram on your mobile device\n2. Create a new post\n3. Upload the downloaded badge\n4. Use this caption:\n\n${shareCaption}`);
        }, 500);
    });
}

if (shareLinkedIn) {
    shareLinkedIn.addEventListener('click', () => {
        // Download the image
        downloadBtn.click();
        
        // Open LinkedIn share dialog
        const linkedInUrl = 'https://www.linkedin.com/sharing/share-offsite/';
        window.open(linkedInUrl, '_blank');
        
        // Show instruction
        setTimeout(() => {
            alert(`Your badge has been downloaded!\n\nPlease upload it to LinkedIn and use this caption:\n\n${shareCaption}`);
        }, 500);
    });
}

// Main poster generation function
function generatePoster(name, role) {
    // Clear canvas
    ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    
    // Draw background - ALWAYS use template if available
    if (templateImage && templateImage.complete && templateImage.width > 0) {
        console.log('Drawing template image...');
        ctx.drawImage(templateImage, 0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
    } else {
        console.warn('Template not loaded, using fallback background');
        // Fallback gradient background
        const gradient = ctx.createLinearGradient(0, 0, 0, CANVAS_HEIGHT);
        gradient.addColorStop(0, '#1E90FF');
        gradient.addColorStop(0.5, '#667eea');
        gradient.addColorStop(1, '#764ba2');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
        
        // Add decorative elements
        drawDecorativeElements();
    }
    
    // Draw circular photo
    drawCircularPhoto(uploadedPhoto, 542, 642, 280);
    
    // Draw text
    drawText(name, role);
    
    // Show canvas and enable download
    placeholder.classList.add('hidden');
    downloadBtn.disabled = false;
}

// Draw circular photo with border
function drawCircularPhoto(img, x, y, radius) {
    ctx.save();
    
    // Draw outer circle (border)
    ctx.beginPath();
    ctx.arc(x, y, radius + 12, 0, Math.PI * 2);
    ctx.fillStyle = '#FFFFFF';
    ctx.fill();
    ctx.shadowColor = 'rgba(0, 0, 0, 0.3)';
    ctx.shadowBlur = 20;
    ctx.shadowOffsetY = 10;
    ctx.fill();
    
    // Reset shadow
    ctx.shadowColor = 'transparent';
    ctx.shadowBlur = 0;
    ctx.shadowOffsetY = 0;
    
    // Clip to circle
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, Math.PI * 2);
    ctx.closePath();
    ctx.clip();
    
    // Since the image is already cropped, just center it in the circle
    const targetSize = radius * 2;
    const offsetX = x - targetSize / 2;
    const offsetY = y - targetSize / 2;
    
    ctx.drawImage(img, offsetX, offsetY, targetSize, targetSize);
    
    ctx.restore();
}

// Helper function to convert text to Title Case (Pascal Case)
function toTitleCase(str) {
    return str
        .toLowerCase()
        .split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
}

// Draw text on canvas
function drawText(name, role) {
    ctx.textAlign = 'center';
    
    // Convert name to UPPERCASE and role to Title Case
    const displayName = name === 'Your Name' ? name : name.toUpperCase();
    const displayRole = role === 'Your Role' ? role : toTitleCase(role);
    
    // Draw name - 34pt, white, no shadow
    const nameY = 208;
    const nameFontSize = 44; // 44px
    
    ctx.font = `bold ${nameFontSize}px Poppins, sans-serif`;
    ctx.fillStyle = '#FFFFFF'; // White color
    ctx.shadowColor = 'transparent'; // No shadow
    ctx.shadowBlur = 0;
    
    // Add slight opacity for placeholder text
    if (name === 'Your Name') {
        ctx.globalAlpha = 0.5;
    }
    ctx.fillText(displayName, 573, nameY);
    ctx.globalAlpha = 1.0;
    
    // Draw role - 22pt, white, no shadow
    const roleY = 267;
    const roleFontSize = 32; // 32px
    
    ctx.font = `600 ${roleFontSize}px Poppins, sans-serif`;
    ctx.fillStyle = '#FFFFFF'; // White color
    ctx.shadowColor = 'transparent'; // No shadow
    ctx.shadowBlur = 0;
    
    // Add slight opacity for placeholder text
    if (role === 'Your Role') {
        ctx.globalAlpha = 0.5;
    }
    ctx.fillText(displayRole, 573, roleY);
    ctx.globalAlpha = 1.0;
}

// Draw decorative elements for fallback background
function drawDecorativeElements() {
    // Top decorative circle
    const topGradient = ctx.createRadialGradient(CANVAS_WIDTH / 2, 200, 0, CANVAS_WIDTH / 2, 200, 400);
    topGradient.addColorStop(0, 'rgba(255, 255, 255, 0.2)');
    topGradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
    ctx.fillStyle = topGradient;
    ctx.fillRect(0, 0, CANVAS_WIDTH, 500);
    
    // Bottom decorative shapes
    ctx.globalAlpha = 0.1;
    
    // Circle 1
    ctx.beginPath();
    ctx.arc(100, CANVAS_HEIGHT - 200, 150, 0, Math.PI * 2);
    ctx.fillStyle = '#FF8C42';
    ctx.fill();
    
    // Circle 2
    ctx.beginPath();
    ctx.arc(CANVAS_WIDTH - 100, CANVAS_HEIGHT - 150, 200, 0, Math.PI * 2);
    ctx.fillStyle = '#1E90FF';
    ctx.fill();
    
    ctx.globalAlpha = 1.0;
    
    // Center white panel for photo area
    ctx.fillStyle = 'rgba(255, 255, 255, 0.95)';
    ctx.shadowColor = 'rgba(0, 0, 0, 0.2)';
    ctx.shadowBlur = 30;
    ctx.shadowOffsetY = 10;
    
    const panelY = 350;
    const panelHeight = 700;
    const borderRadius = 40;
    
    roundRect(ctx, 90, panelY, CANVAS_WIDTH - 180, panelHeight, borderRadius);
    ctx.fill();
    
    // Reset shadow
    ctx.shadowColor = 'transparent';
    ctx.shadowBlur = 0;
    ctx.shadowOffsetY = 0;
}

// Helper function to draw rounded rectangle
function roundRect(ctx, x, y, width, height, radius) {
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + width - radius, y);
    ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
    ctx.lineTo(x + width, y + height - radius);
    ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
    ctx.lineTo(x + radius, y + height);
    ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.closePath();
}

// Input validation and real-time feedback
nameInput.addEventListener('input', () => {
    if (nameInput.value.length >= 50) {
        nameInput.style.borderColor = '#FF8C42';
    } else {
        nameInput.style.borderColor = '';
    }
});

roleInput.addEventListener('input', () => {
    if (roleInput.value.length >= 40) {
        roleInput.style.borderColor = '#FF8C42';
    } else {
        roleInput.style.borderColor = '';
    }
});

// ===== IMAGE CROPPER FUNCTIONALITY =====

function openCropModal(image) {
    cropImage = image;
    cropModal.classList.add('active');
    
    // Reset crop settings
    cropScale = 1;
    const canvasSize = 560;
    const imgAspect = image.width / image.height;
    
    // Center the image initially
    if (imgAspect > 1) {
        // Landscape: fit height
        cropOffsetX = (canvasSize - canvasSize * imgAspect) / 2;
        cropOffsetY = 0;
    } else {
        // Portrait: fit width
        cropOffsetX = 0;
        cropOffsetY = (canvasSize - canvasSize / imgAspect) / 2;
    }
    
    zoomSlider.value = 1;
    drawCropCanvas();
}

function drawCropCanvas() {
    const canvasSize = 560;
    cropCtx.fillStyle = '#141b2d';
    cropCtx.fillRect(0, 0, canvasSize, canvasSize);
    
    const imgAspect = cropImage.width / cropImage.height;
    let drawWidth, drawHeight;
    
    if (imgAspect > 1) {
        // Landscape
        drawHeight = canvasSize * cropScale;
        drawWidth = drawHeight * imgAspect;
    } else {
        // Portrait
        drawWidth = canvasSize * cropScale;
        drawHeight = drawWidth / imgAspect;
    }
    
    cropCtx.drawImage(
        cropImage,
        cropOffsetX,
        cropOffsetY,
        drawWidth,
        drawHeight
    );
}

// Zoom slider
zoomSlider.addEventListener('input', (e) => {
    cropScale = parseFloat(e.target.value);
    drawCropCanvas();
});

// Zoom buttons
zoomInBtn.addEventListener('click', () => {
    cropScale = Math.min(3, cropScale + 0.1);
    zoomSlider.value = cropScale;
    drawCropCanvas();
});

zoomOutBtn.addEventListener('click', () => {
    cropScale = Math.max(0.5, cropScale - 0.1);
    zoomSlider.value = cropScale;
    drawCropCanvas();
});

// Dragging
cropCanvas.addEventListener('mousedown', (e) => {
    isDragging = true;
    lastMouseX = e.offsetX;
    lastMouseY = e.offsetY;
});

cropCanvas.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    
    const deltaX = e.offsetX - lastMouseX;
    const deltaY = e.offsetY - lastMouseY;
    
    cropOffsetX += deltaX;
    cropOffsetY += deltaY;
    
    lastMouseX = e.offsetX;
    lastMouseY = e.offsetY;
    
    drawCropCanvas();
});

cropCanvas.addEventListener('mouseup', () => {
    isDragging = false;
});

cropCanvas.addEventListener('mouseleave', () => {
    isDragging = false;
});

// Touch support for mobile
cropCanvas.addEventListener('touchstart', (e) => {
    e.preventDefault();
    isDragging = true;
    const rect = cropCanvas.getBoundingClientRect();
    lastMouseX = e.touches[0].clientX - rect.left;
    lastMouseY = e.touches[0].clientY - rect.top;
});

cropCanvas.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    e.preventDefault();
    
    const rect = cropCanvas.getBoundingClientRect();
    const touchX = e.touches[0].clientX - rect.left;
    const touchY = e.touches[0].clientY - rect.top;
    
    const deltaX = touchX - lastMouseX;
    const deltaY = touchY - lastMouseY;
    
    cropOffsetX += deltaX;
    cropOffsetY += deltaY;
    
    lastMouseX = touchX;
    lastMouseY = touchY;
    
    drawCropCanvas();
});

cropCanvas.addEventListener('touchend', () => {
    isDragging = false;
});

// Apply crop
applyCropBtn.addEventListener('click', () => {
    // Create a temporary canvas to extract the cropped circular area
    const tempCanvas = document.createElement('canvas');
    const tempCtx = tempCanvas.getContext('2d');
    const circleSize = 560;
    
    tempCanvas.width = circleSize;
    tempCanvas.height = circleSize;
    
    // Draw the current crop view
    const imgAspect = cropImage.width / cropImage.height;
    let drawWidth, drawHeight;
    
    if (imgAspect > 1) {
        drawHeight = circleSize * cropScale;
        drawWidth = drawHeight * imgAspect;
    } else {
        drawWidth = circleSize * cropScale;
        drawHeight = drawWidth / imgAspect;
    }
    
    tempCtx.drawImage(
        cropImage,
        cropOffsetX,
        cropOffsetY,
        drawWidth,
        drawHeight
    );
    
    // Convert to image and use it
    uploadedPhoto = new Image();
    uploadedPhoto.onload = () => {
        cropModal.classList.remove('active');
        updateLivePreview();
        // Show the recrop button
        recropBtn.style.display = 'flex';
    };
    uploadedPhoto.src = tempCanvas.toDataURL();
});

// Re-crop button - reopens crop modal with original image
recropBtn.addEventListener('click', () => {
    if (originalImage) {
        openCropModal(originalImage);
    }
});

// Close crop modal
closeCropModal.addEventListener('click', () => {
    cropModal.classList.remove('active');
    // Don't reset if user already uploaded - they might want to re-upload
    if (!uploadedPhoto) {
        photoInput.value = '';
        fileNameSpan.textContent = 'Click to upload';
    }
});
