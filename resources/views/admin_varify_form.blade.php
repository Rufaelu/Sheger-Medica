<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practitioner Application Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        .application {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .field-value {
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .image-gallery img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        #approveBtn {
            background-color: #2ecc71;
            color: white;
        }
        #rejectBtn {
            background-color: #e74c3c;
            color: white;
        }
        #approveBtn:hover {
            background-color: #27ae60;
        }
        #rejectBtn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<h1>Practitioner Application Review</h1>
<div id="applicationContainer" class="application">
    <!-- Application data will be inserted here -->
</div>

<script>
    // Simulated data retrieval from database
    const applicationData = {
        id: "APP12345",
        name: "Dr. Jane Smith",
        email: "jane.smith@example.com",
        specialty: "Pediatrics",
        experience: "10 years of experience in pediatric care, specializing in neonatal health. Completed residency at City Hospital and fellowship at Children's Medical Center.",
        images: [
            "https://example.com/image1.jpg",
            "https://example.com/image2.jpg",
            "https://example.com/image3.jpg"
        ]
    };

    function displayApplication(data) {
        const container = document.getElementById('applicationContainer');
        container.innerHTML = `
                <div class="field">
                    <div class="field-label">Application ID:</div>
                    <div class="field-value">${data.id}</div>
                </div>
                <div class="field">
                    <div class="field-label">Name:</div>
                    <div class="field-value">${data.name}</div>
                </div>
                <div class="field">
                    <div class="field-label">Email:</div>
                    <div class="field-value">${data.email}</div>
                </div>
                <div class="field">
                    <div class="field-label">Specialty:</div>
                    <div class="field-value">${data.specialty}</div>
                </div>
                <div class="field">
                    <div class="field-label">Experience:</div>
                    <div class="field-value">${data.experience}</div>
                </div>
                <div class="field">
                    <div class="field-label">Uploaded Images:</div>
                    <div class="image-gallery">
                        ${data.images.map(img => `<img src="${img}" alt="Practitioner image">`).join('')}
                    </div>
                </div>
                <div class="button-group">
                    <button id="approveBtn">Approve</button>
                    <button id="rejectBtn">Reject</button>
                </div>
            `;

        document.getElementById('approveBtn').addEventListener('click', () => handleDecision('approve'));
        document.getElementById('rejectBtn').addEventListener('click', () => handleDecision('reject'));
    }

    function handleDecision(action) {
        // Here you would typically send the decision to your backend
        console.log(`Application ${applicationData.id} ${action}d`);
        alert(`Application ${action === 'approve' ? 'Approved' : 'Rejected'}`);
        // After processing, you might want to load the next application or redirect
    }

    // Load the application data when the page loads
    window.addEventListener('load', () => displayApplication(applicationData));
</script>
</body>
</html>
