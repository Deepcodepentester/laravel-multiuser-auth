<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Amazon Vendor Dashboard (Demo)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root {
      --primary: #232f3e;
      --secondary: #ff9900;
      --bg: #f4f6f8;
      --card: #ffffff;
      --text: #333;
    }

    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      margin: 0;
      background: var(--bg);
      color: var(--text);
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background: var(--primary);
      color: #fff;
      height: 100vh;
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      color: var(--secondary);
    }

    .sidebar a {
      display: block;
      color: #fff;
      text-decoration: none;
      margin: 15px 0;
      font-size: 14px;
    }

    .sidebar a:hover {
      color: var(--secondary);
    }

    /* Main content */
    .main {
      flex: 1;
      padding: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      margin: 0;
      font-size: 22px;
    }

    /* KPI cards */
    .kpis {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin-bottom: 30px;
    }

    .kpi {
      background: var(--card);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .kpi h3 {
      margin: 0;
      font-size: 14px;
      color: #666;
    }

    .kpi p {
      font-size: 22px;
      font-weight: bold;
      margin: 10px 0 0;
    }

    /* Chart + table */
    .grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 20px;
    }

    .card {
      background: var(--card);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    table th, table td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background: #f0f2f5;
    }

    @media (max-width: 900px) {
      .grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Vendor Central</h2>
    <a href="#">Dashboard</a>
    <a href="#">Sales</a>
    <a href="#">Inventory</a>
    <a href="#">Orders</a>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
  </div>

  <!-- Main -->
  <div class="main">
    <div class="header">
      <h1>Dashboard Overview</h1>
      <span>Last 30 Days</span>
    </div>

    <!-- KPI Cards -->
    <div class="kpis">
      <div class="kpi">
        <h3>Total Sales</h3>
        <p>$125,400</p>
      </div>
      <div class="kpi">
        <h3>Orders</h3>
        <p>3,420</p>
      </div>
      <div class="kpi">
        <h3>Units Sold</h3>
        <p>5,980</p>
      </div>
      <div class="kpi">
        <h3>Returns</h3>
        <p>2.1%</p>
      </div>
    </div>

    <!-- Chart & Table -->
    <div class="grid">
      <div class="card">
        <h3>Sales Trend</h3>
        <canvas id="salesChart"></canvas>
      </div>

      <div class="card">
        <h3>Top Products</h3>
        <table>
          <thead>
            <tr>
              <th>Product</th>
              <th>Units</th>
              <th>Revenue</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Echo Speaker</td>
              <td>1,200</td>
              <td>$36,000</td>
            </tr>
            <tr>
              <td>Fire TV Stick</td>
              <td>980</td>
              <td>$29,400</td>
            </tr>
            <tr>
              <td>Kindle Paperwhite</td>
              <td>750</td>
              <td>$22,500</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        datasets: [{
          label: 'Sales ($)',
          data: [28000, 32000, 30000, 35400],
          borderColor: '#ff9900',
          backgroundColor: 'rgba(255,153,0,0.2)',
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        }
      }
    });
  </script>
</body>
</html>
