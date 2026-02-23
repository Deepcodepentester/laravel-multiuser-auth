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
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

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

    .body {
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
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

  <div class="body">
    

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
  </div>
</body>
    
</html>
