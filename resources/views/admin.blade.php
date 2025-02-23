<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ethiopian Traditional Medicine</title>
    <style>
        /* CSS styles (unchanged from previous example) */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }
        header {
            background: transparent;
            color: #080808;
            padding-top: 30px;
            min-height: 5%;
            border-bottom: #bbb 1px solid;


        }
        header a {
            color: #080808;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            margin: 0;
            list-style: none;
            overflow: hidden;
        }
        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        .highlight, header .current a {
            color: #4663b6;
            font-weight: bold;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .card {
            flex: 1 1 200px;
            background: #fff;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        .card h3 {
            margin-top: 0;
            color: #333;
        }
        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #4663b6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 15px;
            border-radius: 5px;
            margin-right: 5px;
        }
        .btn-success {
            background: #4CAF50;
        }
        .btn-danger {
            background: #f44336;
        }
        #chart {
            margin-top: 20px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media(max-width: 768px) {
            header #branding,
            header nav,
            header nav li {
                float: none;
                text-align: center;
                width: 100%;
            }
            .card-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">Sheger</span> Medica</h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="#" id="dashboardLink">Dashboard</a></li>
                <li><a href="#" id="applicationsLink">Practitioner Applications</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container" id="mainContent">
    <!-- Content will be dynamically loaded here -->
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Simulated API calls
    function fetchDashboardData() {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({
                    totalUsers: 10482,
                    herbsInCatalog: 573,
                    practitioners: 237,
                    activeUsers: 573
                });
            }, 1000);
        });
    }

    function fetchApplications() {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve([
                    { id: 1, name: "John Doe", email: "john@example.com", specialties: "Herbal Medicine, Acupuncture", region: "Addis Ababa" },
                    { id: 2, name: "Jane Smith", email: "jane@example.com", specialties: "Traditional Healing, Aromatherapy", region: "Gondar" },
                    { id: 3, name: "Abebe Kebede", email: "abebe@example.com", specialties: "Medicinal Plants, Holistic Healing", region: "Bahir Dar" }

                ]);
            }, 1000);
        });
    }

    function fetchChartData() {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    data: [1200, 1900, 3000, 5000, 4000, 3000]
                });
            }, 1000);
        });
    }

    // Render functions
    function renderDashboard(data) {
        const content = `
                <h1>Admin Dashboard</h1>
                <div class="card-container">
                    <div class="card">
                        <h3>Total Users</h3>
                        <p>${data.totalUsers}</p>
                    </div>
                    <div class="card">
                        <h3>Herbs in Catalog</h3>
                        <p>${data.herbsInCatalog}</p>
                    </div>
                    <div class="card">
                        <h3>Practitioners</h3>
                        <p>${data.practitioners}</p>
                    </div>
                    <div class="card">
                        <h3>Active Users (24h)</h3>
                        <p>${data.activeUsers}</p>
                    </div>
                </div>
                <div id="chart">
                    <canvas id="userChart"></canvas>
                </div>
            `;
        document.getElementById('mainContent').innerHTML = content;
        renderChart();
    }

    function renderApplications(applications) {
        let tableRows = applications.map(app => `
<!--                <form action="" method="get">-->
                <tr>
                    <td>${app.id}</td>
                    <td>${app.name}</td>
                    <td>${app.email}</td>
                    <td>${app.specialties}</td>
                    <td>${app.region}</td>
                    <td>
                      <a href="{{ route('verify', ['id' => 6]) }}"> <button type="submit" class="btn btn-success" value="Process"  >Proceed</button></a>
                    </td>
                </tr>
<!--         </form>-->
            `).join('');

        const content = `
                <h2>Practitioner Applications</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Specialties</th>
                            <th>Region</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${tableRows}
                    </tbody>
                </table>
            `;
        document.getElementById('mainContent').innerHTML = content;
    }

    function renderChart() {
        fetchChartData().then(data => {
            const ctx = document.getElementById('userChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'New Users',
                        data: data.data,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'New User Registrations'
                        }
                    }
                }
            });
        });
    }

    function showLoader() {
        document.getElementById('mainContent').innerHTML = '<div class="loader"></div>';
    }

    // Event handlers
    document.getElementById('dashboardLink').addEventListener('click', (e) => {
        e.preventDefault();
        showLoader();
        fetchDashboardData().then(renderDashboard);
    });

    document.getElementById('applicationsLink').addEventListener('click', (e) => {
        e.preventDefault();
        showLoader();
        fetchApplications().then(renderApplications);
    });

    function handleApplication(id, action) {
        // Simulated API call for handling applications
        console.log(`Application ${id} ${action}ed`);
        alert(`Application ${id} has been ${action}ed`);
        // In a real application, you would make an API call here and then refresh the applications list
        showLoader();
        fetchApplications().then(renderApplications);
    }

    // Initial load
    showLoader();
    fetchDashboardData().then(renderDashboard);
</script>
</body>
</html>
