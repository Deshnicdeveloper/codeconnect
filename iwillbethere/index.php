<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeConnect 2025 - I'll Be There Badge Generator</title>
    <meta name="description" content="Create your personalized CodeConnect 2025 badge and share it on social media. Join Africa's brightest tech minds on November 29th!">
    <link rel="icon" type="image/png" href="assets/favicon.PNG">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Hero Section -->
        <header class="hero">
            <div class="hero-content">
                <div class="logo-section">
                    <a href="../">
                        <img src="assets/logo.PNG" alt="CodeConnect 2025 Logo" class="main-logo">
                    </a>
                </div>

                <h1 class="hero-title">Create Your "I'll Be There" Badge</h1>
                <p class="hero-subtitle">Join Cameroon's brightest tech minds and show the world you're attending the Best tech conference of the year!</p>
                <div class="event-details">
                    <div class="event-detail-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span>November 29, 2025</span>
                    </div>
                    <div class="event-detail-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Krystal Palace, Douala</span>
                    </div>
                </div>
            </div>
            <div class="hero-decoration">
                <div class="floating-circle circle-1"></div>
                <div class="floating-circle circle-2"></div>
                <div class="floating-circle circle-3"></div>
            </div>
        </header>

        <div class="main-content">
            <div class="form-section">
                <div class="form-card">
                    <div class="card-header">
                        <div class="step-indicator">
                            <span class="step-number">1</span>
                            <div class="step-info">
                                <h2>Your Details</h2>
                                <p>Fill in your information below</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label for="name">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Full Name
                            </label>
                            <input type="text" id="name" placeholder="e.g., John Doe" maxlength="50">
                            <span class="input-hint">This will appear on your badge</span>
                        </div>

                        <div class="form-group">
                            <label for="role">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                                Title / Role
                            </label>
                            <input type="text" id="role" placeholder="e.g., Software Developer, Speaker" maxlength="40">
                            <span class="input-hint">Your professional title or role</span>
                        </div>

                        <div class="form-group">
                            <label for="photo">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                Profile Photo
                            </label>
                            <div class="upload-wrapper">
                                <input type="file" id="photo" accept="image/*">
                                <label for="photo" class="upload-label">
                                    <div class="upload-icon">
                                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" y1="3" x2="12" y2="15"></line>
                                        </svg>
                                    </div>
                                    <span class="upload-text">
                                        <strong id="file-name">Click to upload</strong>
                                        <span class="upload-subtext">or drag and drop</span>
                                    </span>
                                </label>
                            </div>
                            <span class="input-hint">Best results with square photos (JPG, PNG - Max 10MB)</span>
                            <button type="button" id="recropBtn" class="btn-recrop" style="display: none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 3h18v18H3z"></path>
                                    <path d="M9 9h6v6H9z"></path>
                                </svg>
                                Adjust Photo Position
                            </button>
                        </div>

                        <div class="form-group">
                            <label for="language">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                </svg>
                                Language / Langue
                            </label>
                            <div class="language-selector">
                                <label class="language-option">
                                    <input type="radio" name="language" value="en" checked>
                                    <span class="language-label">
                                        <span class="language-flag">🇬🇧</span>
                                        <span class="language-name">English</span>
                                    </span>
                                </label>
                                <label class="language-option">
                                    <input type="radio" name="language" value="fr">
                                    <span class="language-label">
                                        <span class="language-flag">🇫🇷</span>
                                        <span class="language-name">Français</span>
                                    </span>
                                </label>
                            </div>
                            <span class="input-hint">Choose your preferred badge language</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="preview-section">
                <div class="preview-card">
                    <div class="card-header">
                        <div class="step-indicator">
                            <span class="step-number">2</span>
                            <div class="step-info">
                                <h2>Live Preview</h2>
                                <p>Watch your badge come to life</p>
                            </div>
                        </div>
                    </div>
                    <div class="canvas-wrapper">
                        <canvas id="posterCanvas" width="1080" height="1365"></canvas>
                        <div id="placeholder" class="placeholder">
                            <div class="placeholder-icon">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </div>
                            <p class="placeholder-title">Your Badge Preview</p>
                            <p class="placeholder-text">Fill in your details to see your personalized badge</p>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button id="downloadBtn" class="btn btn-download" disabled>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Download Badge
                        </button>
                        <!-- <button id="shareBtn" class="btn btn-share" disabled>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="18" cy="5" r="3"></circle>
                                <circle cx="6" cy="12" r="3"></circle>
                                <circle cx="18" cy="19" r="3"></circle>
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg>
                            Share Badge
                        </button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Share Modal -->
        <div id="shareModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Share Your Badge</h3>
                    <button class="modal-close" id="closeModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="share-instruction">Choose where you want to share your CodeConnect 2025 badge:</p>
                    <div class="social-buttons">
                        <button class="social-btn twitter-btn" id="shareTwitter">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                            <span>X (Twitter)</span>
                        </button>
                        <button class="social-btn facebook-btn" id="shareFacebook">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>Facebook</span>
                        </button>
                        <button class="social-btn instagram-btn" id="shareInstagram">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            <span>Instagram</span>
                        </button>
                        <button class="social-btn linkedin-btn" id="shareLinkedIn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            <span>LinkedIn</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Crop Modal -->
        <div id="cropModal" class="modal">
            <div class="modal-content crop-modal-content">
                <div class="modal-header">
                    <h3>Adjust Your Photo</h3>
                    <button class="modal-close" id="closeCropModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body crop-modal-body">
                    <p class="crop-instruction">Drag to reposition and use the slider to zoom your photo</p>
                    <div class="crop-container">
                        <canvas id="cropCanvas" width="560" height="560"></canvas>
                        <div class="crop-circle-overlay"></div>
                    </div>
                    <div class="crop-controls">
                        <label class="crop-control-label">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                            Zoom
                        </label>
                        <input type="range" id="zoomSlider" min="0.5" max="3" step="0.05" value="1">
                        <div class="zoom-buttons">
                            <button id="zoomOut" class="zoom-btn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <button id="zoomIn" class="zoom-btn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button id="applyCrop" class="btn btn-primary" style="margin-top: 20px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Apply & Continue
                    </button>
                </div>
            </div>
        </div>

        <!-- About Section -->
        <section class="about-section">
            <div class="about-content">
                <h3 style="color: white;">About CodeConnect 2025</h3>
                <p>
                    CodeConnect 2025 brings together developers, founders, product leaders, investors and policymakers for one high‑energy day of learning, showcasing, and deal‑making. Expect deep, practical conversations and a no‑fluff agenda built around Cameroon’s most pressing digital opportunities.
                </p>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h4>Network</h4>
                        <p>Connect with developers, entrepreneurs, and industry leaders</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                        </div>
                        <h4>Learn</h4>
                        <p>Gain insights from expert speakers and hands-on workshops</p>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                <path d="M2 17l10 5 10-5"></path>
                                <path d="M2 12l10 5 10-5"></path>
                            </svg>
                        </div>
                        <h4>Build</h4>
                        <p>Collaborate on projects that shape Africa's tech future</p>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="footer-content">
                <img src="assets/logo.PNG" alt="CodeConnect Logo" class="footer-logo">
                <p class="footer-text">Building Africa's Tech Future Together</p>
                <div class="footer-hashtag">#CodeConnect2025 #TechInAfrica #Innovation</div>
                <p class="footer-copyright">© 2025 CodeConnect. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>
