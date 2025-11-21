<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Test - CodeConnect 2025</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
        }
        button:hover {
            background: #5568d3;
        }
        #result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            white-space: pre-wrap;
            font-family: monospace;
            font-size: 12px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 API Test Page</h1>
        <p>This page tests if the save_badge.php API is working correctly.</p>
        
        <button onclick="testAPI()">Test API Connection</button>
        <button onclick="testFullSave()">Test Full Save (with fake image)</button>
        <button onclick="checkLogs()">View Instructions</button>
        
        <div id="result"></div>
    </div>

    <script>
        async function testAPI() {
            const resultDiv = document.getElementById('result');
            resultDiv.className = 'info';
            resultDiv.textContent = '⏳ Testing API endpoint...';

            try {
                const response = await fetch('api/save_badge.php', {
                    method: 'GET'  // Should fail with "Method not allowed"
                });

                const text = await response.text();
                let result;
                
                try {
                    result = JSON.parse(text);
                } catch (e) {
                    resultDiv.className = 'error';
                    resultDiv.textContent = '❌ API returned invalid JSON:\n' + text;
                    return;
                }

                if (response.status === 405 && !result.success) {
                    resultDiv.className = 'success';
                    resultDiv.textContent = '✅ API endpoint is working!\n\n' +
                        'Status: ' + response.status + '\n' +
                        'Message: ' + result.message + '\n\n' +
                        'This is expected - the API correctly rejects GET requests.';
                } else {
                    resultDiv.className = 'error';
                    resultDiv.textContent = '⚠️ Unexpected response:\n' + JSON.stringify(result, null, 2);
                }
            } catch (error) {
                resultDiv.className = 'error';
                resultDiv.textContent = '❌ Error connecting to API:\n' + error.message;
            }
        }

        async function testFullSave() {
            const resultDiv = document.getElementById('result');
            resultDiv.className = 'info';
            resultDiv.textContent = '⏳ Testing full save process...';

            // Create a small test image (1x1 red pixel)
            const canvas = document.createElement('canvas');
            canvas.width = 100;
            canvas.height = 100;
            const ctx = canvas.getContext('2d');
            ctx.fillStyle = 'red';
            ctx.fillRect(0, 0, 100, 100);
            ctx.fillStyle = 'white';
            ctx.font = '20px Arial';
            ctx.fillText('TEST', 20, 50);

            canvas.toBlob(async function(blob) {
                try {
                    // Convert to base64
                    const reader = new FileReader();
                    reader.readAsDataURL(blob);
                    
                    reader.onloadend = async function() {
                        const base64data = reader.result;
                        
                        // Prepare form data
                        const formData = new FormData();
                        formData.append('name', 'Test User');
                        formData.append('role', 'API Tester');
                        formData.append('language', 'en');
                        formData.append('badge', base64data);

                        console.log('Sending test data...');

                        // Send to API
                        const response = await fetch('api/save_badge.php', {
                            method: 'POST',
                            body: formData
                        });

                        console.log('Response status:', response.status);

                        const text = await response.text();
                        console.log('Raw response:', text);

                        let result;
                        try {
                            result = JSON.parse(text);
                        } catch (e) {
                            resultDiv.className = 'error';
                            resultDiv.textContent = '❌ API returned invalid JSON:\n\n' + text;
                            return;
                        }

                        if (result.success) {
                            resultDiv.className = 'success';
                            resultDiv.textContent = '✅ Badge saved successfully!\n\n' +
                                'Badge ID: ' + result.data.id + '\n' +
                                'Filename: ' + result.data.filename + '\n' +
                                'Path: ' + result.data.path + '\n\n' +
                                'Check the uploads/badges/ folder to see the saved image!\n' +
                                'Check the database to see the saved record.';
                        } else {
                            resultDiv.className = 'error';
                            resultDiv.textContent = '❌ Save failed:\n\n' +
                                'Message: ' + result.message + '\n' +
                                (result.error ? 'Error: ' + result.error : '');
                        }
                    };

                    reader.onerror = function(error) {
                        resultDiv.className = 'error';
                        resultDiv.textContent = '❌ Error reading image:\n' + error;
                    };
                } catch (error) {
                    resultDiv.className = 'error';
                    resultDiv.textContent = '❌ Error in test:\n' + error.message + '\n\n' + error.stack;
                }
            }, 'image/png');
        }

        function checkLogs() {
            const resultDiv = document.getElementById('result');
            resultDiv.className = 'info';
            resultDiv.textContent = '📋 How to check logs:\n\n' +
                '1. Browser Console (F12)\n' +
                '   - Open Developer Tools\n' +
                '   - Go to Console tab\n' +
                '   - Look for log messages\n\n' +
                '2. PHP Error Log\n' +
                '   - XAMPP: xampp/apache/logs/error.log\n' +
                '   - Look for messages starting with "=== Save Badge Request ==="\n\n' +
                '3. Database Check\n' +
                '   - Open phpMyAdmin: http://localhost/phpmyadmin\n' +
                '   - Select "iwillbethere" database\n' +
                '   - Click "badges" table\n' +
                '   - Check if records are being saved\n\n' +
                '4. File System Check\n' +
                '   - Navigate to: iwillbethere/uploads/badges/\n' +
                '   - Check if image files are being created';
        }

        // Auto-test on load
        window.onload = function() {
            const resultDiv = document.getElementById('result');
            resultDiv.className = 'info';
            resultDiv.textContent = '👋 Welcome to the API Test Page!\n\n' +
                'Click the buttons above to test the API endpoint.';
        };
    </script>
</body>
</html>
