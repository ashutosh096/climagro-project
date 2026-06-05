<?php
include("header.php");
include("navbar1.php");
?>
<style>
* { scrollbar-width: thin; scrollbar-color: #037a80 #f1f5f9; }
/* ========== MODERN DESIGN TOKENS ========== */
        :root {
          --nav-height: 105px;
          --primary: #025b5f;
          --primary-light: #037a80;

          --primary-dark: #014549;
          --accent: #14b8a6;
          --accent-light: #5eead4;
          --bg-page: #f1f5f9;
          --bg-card: #ffffff;
          --text-heading: #0f172a;
          --text-body: #475569;
          --text-muted: #94a3b8;
          --border: #e2e8f0;
          --border-light: #f1f5f9;
          --shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1);
          --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
          --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
          --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
          --radius-sm: 8px;
          --radius-md: 12px;
          --radius-lg: 16px;
          --font-sans: 'Inter', 'Segoe UI', system-ui, sans-serif;
        }

        /* ========== RESET & BASE (scoped ONLY to app layout - never touches navbar) ========== */
        .app-container, .app-container * { margin: 0; padding: 0; box-sizing: border-box; }

        /* ========== NAVBAR PROTECTION - force Bootstrap/theme styles to survive ========== */
        #xb-header-area,
        #xb-header-area *,
        .xb-header,
        .xb-header *,
        .header__wrap,
        .header__wrap * {
          box-sizing: border-box;
          /* Do NOT reset margin/padding — let the theme navbar CSS control spacing */
        }

        /* ========== APP LAYOUT ========== */
        .app-container {
          display: flex;
          min-height: 100vh;
          padding-top: var(--nav-height);
          font-family: var(--font-sans);
          background: var(--bg-page);
          line-height: 1.6;
          color: var(--text-body);
          -webkit-font-smoothing: antialiased;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
          width: 320px;
          flex-shrink: 0;
          background: var(--bg-card);
          border: none;
          border-right: 1px solid var(--border);
          outline: none;
          z-index: 900;
          display: flex;
          flex-direction: column;
          transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        }
        
        .sidebar *,
        .sidebar *::before,
        .sidebar *::after {
          border-left: none !important;
        }
        
        /* Hide scrollbar for Chrome/Safari/Opera */
        .sidebar::-webkit-scrollbar { 
  width: 6px;
  background: transparent;
}
.sidebar::-webkit-scrollbar-thumb {
  background: var(--primary-light);
  border-radius: 10px;
}
.sidebar::-webkit-scrollbar-track {
  background: var(--border-light);
}
        .sidebar.collapsed { margin-left: -320px; }

        .sidebar-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 0.5rem 1rem;
          background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
          color: #fff;
          position: sticky;
          top: 0;
          z-index: 10;
          flex-shrink: 0;
        }
        
        .sidebar-header h2 {
          margin: 0;
          font-size: 1.125rem;
          font-weight: 600;
          letter-spacing: -0.025em;
        }

        .sidebar-toggle {
          background: rgba(255,255,255,0.15);
          border: none;
          color: #fff;
          width: 36px;
          height: 36px;
          border-radius: var(--radius-sm);
          cursor: pointer;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: all 0.2s;
          font-size: 1rem;
        }
        .sidebar-toggle:hover { background: rgba(255,255,255,0.25); }

        .sidebar-content {
          padding: 1.5rem;
          flex: 1;
          display: flex;
          flex-direction: column;
          gap: 1.5rem;
        }
        
        .sidebar.collapsed .sidebar-content {
          opacity: 0;
          pointer-events: none;
        }

        /* ========== CONTROL GROUPS ========== */
        .control-group {
          background: var(--border-light);
          border-radius: var(--radius-md);
          padding: 1rem;
        }
        
        .control-group h3 {
          font-size: 0.75rem;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 0.05em;
          color: var(--text-muted);
          margin-bottom: 0.75rem;
        }

        /* Radio Buttons */
        .radio-group {
          display: flex;
          gap: 0.5rem;
        }
        
        .radio-group.horizontal {
          flex-direction: row;
          flex-wrap: wrap;
        }
        
        .radio-label {
          display: flex;
          align-items: center;
          cursor: pointer;
          padding: 0.5rem 0.75rem;
          font-size: 0.875rem;
          font-weight: 500;
          color: var(--text-body);
          background: var(--bg-card);
          border: 1.5px solid var(--border);
          border-radius: var(--radius-sm);
          transition: all 0.2s;
          user-select: none;
        }
        
        .radio-label:hover {
          border-color: var(--primary);
          background: rgba(2, 91, 95, 0.04);
        }
        
        .radio-label input[type="radio"] { display: none; }
        
        .radio-label input[type="radio"]:checked ~ .radio-custom,
        .radio-label:has(input:checked) {
          border-color: var(--primary);
          background: rgba(2, 91, 95, 0.08);
          color: var(--primary);
        }

        .radio-custom {
          width: 16px;
          height: 16px;
          border: 2px solid var(--border);
          border-radius: 50%;
          margin-right: 0.5rem;
          position: relative;
          transition: all 0.2s;
          flex-shrink: 0;
        }
        
        input[type="radio"]:checked + .radio-custom {
          border-color: var(--primary);
          background: var(--primary);
        }
        
        input[type="radio"]:checked + .radio-custom::after {
          content: '';
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 6px;
          height: 6px;
          background: white;
          border-radius: 50%;
        }

        /* Dropdowns */
        .dropdown {
          width: 100%;
          padding: 0.75rem 1rem;
          font-size: 0.875rem;
          font-weight: 500;
          color: var(--text-heading);
          background: var(--bg-card);
          border: 1.5px solid var(--border);
          border-radius: var(--radius-sm);
          cursor: pointer;
          transition: all 0.2s;
          appearance: none;
          background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
          background-repeat: no-repeat;
          background-position: right 0.75rem center;
          padding-right: 2.5rem;
        }
        
        .dropdown:hover, .dropdown:focus {
          outline: none;
          border-color: var(--primary);
          box-shadow: 0 0 0 3px rgba(2, 91, 95, 0.1);
        }
        
        .dropdown:disabled {
          background-color: var(--border-light);
          color: var(--text-muted);
          cursor: not-allowed;
        }

        /* Load Button */
        .load-btn {
          width: 100%;
          padding: 0.875rem 1.5rem;
          background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
          color: #fff;
          border: none;
          border-radius: var(--radius-sm);
          font-size: 0.9rem;
          font-weight: 600;
          cursor: pointer;
          transition: all 0.2s;
          margin-top: auto;
        }
        
        .load-btn:hover:not(:disabled) {
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(2, 91, 95, 0.3);
        }
        
        .load-btn:disabled {
          opacity: 0.5;
          cursor: not-allowed;
        }

        /* Floating Toggle */
        .floating-toggle {
          display: none;
          position: fixed;
          top: calc(var(--nav-height) + 1rem);
          left: 1rem;
          width: 48px;
          height: 48px;
          background: linear-gradient(135deg, var(--primary), var(--primary-light));
          border: none;
          border-radius: 50%;
          color: white;
          cursor: pointer;
          z-index: 1101;
          box-shadow: var(--shadow-lg);
          transition: all 0.3s;
          font-size: 1.25rem;
        }
        
        .floating-toggle:hover {
          transform: scale(1.05);
          box-shadow: var(--shadow-xl);
        }
        
        .floating-toggle.show {
          display: flex;
          align-items: center;
          justify-content: center;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
          flex: 1;
          transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 50%, #012d2f 100%);
          min-height: calc(100vh - var(--nav-height));
          padding: 10;
          width: 100%;
        }

        .main-content .container {
          max-width: 1100px;
          margin: 0 auto;
        }

        .header {
          text-align: center;
          margin-bottom: 1.5rem;
          color: #fff;
        }
        
        .header h1 {
          font-size: 1.75rem;
          font-weight: 700;
          margin-bottom: 0.25rem;
          letter-spacing: -0.025em;
        }
        
        .header p {
          font-size: 1rem;
          opacity: 0.85;
        }

        /* ========== VISUALIZATION ========== */
        .visualization-container {
          background: var(--bg-card);
          border-radius: var(--radius-lg);
          box-shadow: var(--shadow-xl);
          overflow: hidden;
          position: relative;
          min-height: 480px;
          border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .chart-container {
          width: 100%;
          height: 100%;
          min-height: 480px;
          display: flex;
          align-items: center;
          justify-content: center;
          position: relative;
          padding: 1rem;
        }
        
        #chart-img {
          max-width: 100%;
          max-height: 100%;
          height: auto;
          object-fit: contain;
          border-radius: var(--radius-sm);
          transition: opacity 0.3s;
        }
        
        .loading-spinner {
          position: absolute;
          inset: 0;
          background: rgba(255,255,255,0.95);
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          z-index: 10;
        }
        
        .spinner {
          width: 40px;
          height: 40px;
          border: 3px solid var(--border);
          border-top-color: var(--primary);
          border-radius: 50%;
          animation: spin 0.8s linear infinite;
          margin-bottom: 1rem;
        }
        
        @keyframes spin { to { transform: rotate(360deg); } }
        
        .placeholder-message {
          color: var(--text-muted);
          text-align: center;
          padding: rem;
          font-size: 1rem;
        }
        
        .placeholder-message img {
          max-width: 100%;
          border-radius: var(--radius-sm);
        }
        
        .error-message {
          color: #ef4444;
          text-align: center;
          padding: 2rem;
        }
        
        .hidden { display: none !important; }

        /* ========== BUTTONS AREA ========== */
        .flex-container {
          display: flex;
          gap: 0.75rem;
          justify-content: flex-end;
          margin-top: 1.25rem;
        }
        
        .btn {
          padding: 0.75rem 1.25rem;
          border-radius: var(--radius-sm);
          font-size: 0.875rem;
          font-weight: 600;
          cursor: pointer;
          display: inline-flex;
          align-items: center;
          gap: 0.5rem;
          transition: all 0.2s;
          text-decoration: none;
          border: none;
        }
        
        .btn-outline {
          background: transparent;
          color: rgba(255,255,255,0.9);
          border: 1.5px solid rgba(255,255,255,0.3);
        }
        
        .btn-outline:hover {
          background: rgba(255,255,255,0.1);
          border-color: rgba(255,255,255,0.5);
        }
        
        .btn-secondary {
          background: var(--accent);
          color: #fff;
          border: none;
        }
        
        .btn-secondary:hover {
          background: var(--accent-light);
          color: var(--primary-dark);
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(20, 184, 166, 0.4);
        }

        /* ========== MODALS ========== */
        .climate-modal-overlay {
          position: fixed;
          inset: 0;
          background: rgba(0, 0, 0, 0.6);
          backdrop-filter: blur(4px);
          display: flex;
          align-items: center;
          justify-content: center;
          z-index: 10000;
          opacity: 0;
          visibility: hidden;
          transition: all 0.3s;
          padding-top: var(--nav-height);
        }
        
        .climate-modal-overlay.active {
          opacity: 1;
          visibility: visible;
        }
        
        .climate-modal {
          background: var(--bg-card);
          border-radius: var(--radius-lg);
          box-shadow: var(--shadow-xl);
          max-width: 90vw;
          max-height: 85vh;
          width: 600px;
          overflow: hidden;
          transform: scale(0.95) translateY(10px);
          transition: transform 0.3s;
        }
        
        .climate-modal-overlay.active .climate-modal {
          transform: scale(1) translateY(0);
        }
        
        .climate-modal-header {
          background: linear-gradient(135deg, var(--primary), var(--primary-light));
          color: white;
          padding: 1.25rem 1.5rem;
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        
        .climate-modal-title {
          font-size: 1.125rem;
          font-weight: 600;
        }
        
        .climate-close-btn {
          background: rgba(255,255,255,0.15);
          border: none;
          color: white;
          font-size: 1.25rem;
          cursor: pointer;
          padding: 0.5rem;
          border-radius: var(--radius-sm);
          transition: background 0.2s;
          line-height: 1;
        }
        
        .climate-close-btn:hover {
          background: rgba(255,255,255,0.25);
        }
        
        .climate-modal-body {
          padding: 1.5rem;
          max-height: 60vh;
          overflow-y: auto;
        }
        
        .climate-metrics-table {
          width: 100%;
          border-collapse: collapse;
          font-size: 0.875rem;
        }
        
        .climate-metrics-table th,
        .climate-metrics-table td {
          padding: 0.75rem;
          text-align: left;
          border-bottom: 1px solid var(--border);
        }
        
        .climate-metrics-table th {
          background: var(--border-light);
          font-weight: 600;
          color: var(--text-heading);
          font-size: 0.75rem;
          text-transform: uppercase;
          letter-spacing: 0.05em;
        }
        
        .climate-metrics-table tr:hover {
          background: var(--border-light);
        }

        /* Email Modal */
        #emailModal {
          position: fixed;
          inset: 0;
          background: rgba(0, 0, 0, 0.6);
          backdrop-filter: blur(4px);
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 10001;
        }
        
        #emailModal.hidden { display: none; }
        
        .modal-content {
          background: var(--bg-card);
          padding: 2rem;
          border-radius: var(--radius-lg);
          width: 90%;
          max-width: 420px;
          position: relative;
          box-shadow: var(--shadow-xl);
          text-align: center;
        }
        
        .modal-content h3 {
          font-size: 1.25rem;
          font-weight: 600;
          color: var(--text-heading);
          margin: 0 0 0.5rem 0;
        }
        
        .modal-content p {
          font-size: 0.9rem;
          color: var(--text-body);
          margin: 0 0 1.5rem 0;
        }
        
        .modal-content input[type="email"] {
          width: 100%;
          padding: 0.875rem 1rem;
          border: 1.5px solid var(--border);
          border-radius: var(--radius-sm);
          font-size: 1rem;
          margin-bottom: 1rem;
          transition: all 0.2s;
        }
        
        .modal-content input[type="email"]:focus {
          outline: none;
          border-color: var(--primary);
          box-shadow: 0 0 0 3px rgba(2, 91, 95, 0.1);
        }
        
        .modal-content button[type="submit"] {
          width: 100%;
          padding: 0.875rem;
          background: linear-gradient(135deg, var(--primary), var(--primary-light));
          color: white;
          border: none;
          border-radius: var(--radius-sm);
          font-size: 1rem;
          font-weight: 600;
          cursor: pointer;
          transition: all 0.2s;
        }
        
        .modal-content button[type="submit"]:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(2, 91, 95, 0.3);
        }
        
        .close-btn {
          position: absolute;
          top: 0.75rem;
          right: 0.75rem;
          width: 32px;
          height: 32px;
          font-size: 1.25rem;
          color: var(--text-muted);
          background: none;
          border: none;
          border-radius: 50%;
          cursor: pointer;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: all 0.2s;
        }
        
        .close-btn:hover {
          background: var(--border-light);
          color: var(--text-heading);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 900px) {
          .sidebar { width: 280px; }
          .sidebar.collapsed { margin-left: -280px; }
          .main-content { padding: 1.5rem; }
        }
        
        @media (max-width: 768px) {
          .sidebar {
            width: 100%;
            max-width: 320px;
            position: fixed;
            top: var(--nav-height);
            left: 0;
            height: calc(100vh - var(--nav-height));
            overflow-y: auto;
            margin-left: 0;
          }
          .sidebar.collapsed { transform: translateX(-100%); margin-left: 0; }
          .main-content { margin-left: 0; padding: 1rem; }
          .visualization-container { min-height: 350px; }
          .chart-container { min-height: 350px; }
          .flex-container { justify-content: center; }
          
          .sidebar-overlay {
            position: fixed;
            inset: 0;
            top: var(--nav-height);
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
          }
          .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
          }
        }
        
        @media (max-width: 480px) {
          .main-content { padding: 0.75rem; }
          }
        /* ===== SIDEBAR FIXED POSITION FIX ===== */
        .sidebar {
          position: fixed !important;
          top: var(--nav-height);
          left: 0;
          height: calc(100vh - var(--nav-height));
          overflow-y: auto;
          z-index: 1050 !important;
          margin-left: 0 !important;
        }
        .sidebar.collapsed {
          transform: translateX(-320px) !important;
          margin-left: 0 !important;
        }
        .app-container {
          padding-left: 320px;
          transition: padding-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar.collapsed ~ .main-content,
        .main-content.expanded {
          margin-left: 0 !important;
        }
        @media (max-width: 768px) {
          .app-container {
            padding-left: 0 !important;
          }
        }
    </style>

 

  <!-- Header end -->

  <div class="app-container">
    <!-- Mobile overlay -->
    <div id="sidebar-overlay" class="sidebar-overlay"></div>
    
    <!-- Floating toggle button -->
    <button id="floatingToggle" class="floating-toggle" aria-label="Open sidebar">
      <span>☰</span>
    </button>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <h2>Climate Explorer</h2>
        <button id="sidebarToggle" class="sidebar-toggle" aria-label="Toggle sidebar">
          <span class="toggle-icon">☰</span>
        </button>
      </div>

     <div class="sidebar-content">
      <!-- Variable -->
      <div class="control-group">
        <h3>Variable</h3>
        <div class="radio-group horizontal">
          <label class="radio-label">
            <input type="radio" name="variable" value="temperature" checked>
            <span class="radio-custom"></span>Temperature
          </label>
          <label class="radio-label">
            <input type="radio" name="variable" value="rainfall">
            <span class="radio-custom"></span>Rainfall
          </label>
        </div>
      </div>

      <!-- Type -->
      <div class="control-group">
        <h3>Type</h3>
        <div class="radio-group horizontal">
          <label class="radio-label">
            <input type="radio" name="type" value="map" checked>
            <span class="radio-custom"></span>Trend Map
          </label>
          <label class="radio-label">
            <input type="radio" name="type" value="timeseries">
            <span class="radio-custom"></span>Time Series
          </label>
        </div>
      </div>

        <!-- Location -->
        <div class="control-group">
          <h3>Location</h3>
          <select id="location-dropdown" class="dropdown">
            <option value="">Select location...</option>
          </select>
        </div>

        <!-- Files -->
        <div class="control-group">
          <h3>Files</h3>
          <select id="files-dropdown" class="dropdown" disabled>
            <option value="">Select location first...</option>
          </select>
        </div>

        <button id="load-visualization" class="load-btn" disabled>Load Visualization</button>
      </div>
    </aside>

    <!-- Main -->
    <main id="mainContent" class="main-content">
      <div class="container">
        <div class="header">
          <!-- <p>Climate Data Visualization</p> -->
          <!-- <p>Explore temperature and rainfall patterns across different regions</p> -->
        </div>
        
        <div class="visualization-container">
          <div id="loading-spinner" class="loading-spinner hidden">
            <div class="spinner"></div>
            <div>Loading visualization...</div>
          </div>
          
          <div class="chart-container">
            
            <div id="placeholder-message" class="placeholder-message">
              <img src="assest\img\bg\climatedata.jpg"/>
            </div>
            <img id="chart-img" src="" class="hidden" alt="Climate data visualization">
            <div id="error-message" class="error-message hidden"></div>
          </div>
        </div>
        <div class="flex-container ">
        <button class="btn btn-outline" id="climateLearnMoreBtn">
                        Data Repository
        </button>
        <button class="btn btn-secondary" id="download-btn">
                        Download
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
        </button>
    </div>
  </main>

   <!-- Modal -->
    <div class="climate-modal-overlay" id="climateModalOverlay">
        <div class="climate-modal">
            <div class="climate-modal-header">
                <h3 class="climate-modal-title">Climate Risk Metrics & Indicators</h3>
                <button class="climate-close-btn" id="climateCloseBtn">&times;</button>
            </div>
            <div class="climate-modal-body">
                <p style="color: #6b7280; margin-bottom: 1rem;">
                    CityAdapt.ai provides comprehensive climate risk assessment through 20 key metrics and indicators, covering everything from monsoon patterns to extreme weather events.
                </p>
                <table class="climate-metrics-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Metric</th>
                            <th>Definition & Implications</th>
                        </tr>
                    </thead>
                    <tbody id="climateMetricsTableBody">
                        <!-- Table content will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>  

  <div id="emailModal" class="modal hidden">

      <div class="modal-overlay"></div>

      <div class="modal-content">
          <button class="close-btn">&times;</button>

          <h3>Enter Your Email to Download</h3>
          
          <form id="emailForm">
              <input type="email" name="email" placeholder="Your email address" required />
              <button type="submit">Submit & Download</button>
          </form>
      </div>
  </div>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       // Climate metrics data
        const metricsData = [
            {
                no: 1,
                metric: "Trend in monsoon season mean rainfall",
                definition: "Changes in average monsoon-season (June to September) rainfall, spatially averaged over the specified region",
                implications: "Agriculture risk; surface and ground water availability"
            },
            {
                no: 2,
                metric: "Trend in summer season average temperature",
                definition: "Change in the summer-season (March–May) average of daily mean temperature, spatially averaged over the specified region",
                implications: "Agriculture risk; human and livestock health risk; Infrastructure risk"
            },
            {
                no: 3,
                metric: "Monsoon season mean rainfall anomaly",
                definition: "Deviation of spatially averaged monsoon season (June–September) rainfall relative to the 1981–2010 baseline period",
                implications: "Identify dry vs wet season; Agricultural risk, water availability"
            },
            {
                no: 4,
                metric: "Temperature Anomalies",
                definition: "Deviation of spatially averaged summer season (March-May) daily average temperature relative to the 1981–2010 baseline period",
                implications: "Identify anomalously hot/cold summer, Agriculture risk; human and livestock health risk; Infrastructure risk"
            },
            {
                no: 5,
                metric: "Extreme wet days",
                definition: "Number of days in a year with the standardized precipitation anomaly exceeding 1 with respect to the long-term data (1981-2010)",
                implications: "Higher (lower) value indicates more (less) number of days in a year with excessive rainfall; Agricultural risk; health risk; soil erosion"
            },
            {
                no: 6,
                metric: "Extreme warm days",
                definition: "Number of days when the maximum temperature is greater than 90th percentile of the long-term data (1981-2010) for a moving window of 15 days",
                implications: "Higher (lower) value indicates more (less) number of days in a year with excessively warm days; Agriculture risk; wildfire risk; health and livestock risk"
            },
            {
                no: 7,
                metric: "Time-series of seasonal monsoon rainfall",
                definition: "Long-term annual variations in summer monsoon (June to September) total rainfall, spatially averaged over the specified region",
                implications: "Agriculture risk; surface and ground water availability; planning of dams and reservoirs; future projections"
            },
            {
                no: 8,
                metric: "Time-series of summer temperatures",
                definition: "Long-term annual variations in summer (March to May) daily mean temperature, spatially averaged over the specified region",
                implications: "Agriculture risk; human and livestock health risk; Infrastructure risk; ecosystem impact"
            },
            {
                no: 9,
                metric: "Growing degree days",
                definition: "The amount of heat available for plant growth during a specific period of crop cycle",
                implications: "Optimal planting dates; tracking the progress; crop management"
            },
            {
                no: 10,
                metric: "Heat stress index",
                definition: "Past, present and future estimate of heat discomfort combining temperature and humidity",
                implications: "Health, livestock, and labor safety"
            },
            {
                no: 11,
                metric: "Drought index",
                definition: "Past, present and future indicator of prolonged dry conditions based on rainfall and water loss",
                implications: "Agriculture, water resources, drought management"
            },
            {
                no: 12,
                metric: "Flood risk index",
                definition: "Past, present and future likelihood of flood events based on extreme rainfall and runoff",
                implications: "Disaster planning, infrastructure, and urban/rural development"
            },
            {
                no: 13,
                metric: "Projected summer average temperature",
                definition: "Average daily temperature over summer season (March-May) projected for a future period under climate scenarios",
                implications: "Crop selection, urban planning, energy demand"
            },
            {
                no: 14,
                metric: "Projected extreme heat days",
                definition: "Number of projected days exceeding extreme heat thresholds",
                implications: "Heatwave planning, human and livestock health sector, labor safety and productivity"
            },
            {
                no: 15,
                metric: "Projected growing degree days",
                definition: "Projected cumulative heat units above a base threshold, indicating crop development potential",
                implications: "Crop yield modeling, agricultural zoning, pest risk assessment"
            },
            {
                no: 16,
                metric: "Projected hot night frequency",
                definition: "Number of nights with projected minimum temperature above heat-stress thresholds",
                implications: "Public health, livestock productivity, energy demand, agriculture"
            },
            {
                no: 17,
                metric: "Projected monsoon season rainfall total",
                definition: "Total rainfall projected for monsoon season (June-September)",
                implications: "Agriculture, water availability"
            },
            {
                no: 18,
                metric: "Projected monsoon onset and withdrawal dates",
                definition: "Estimated start and end of monsoon season under future climate scenarios",
                implications: "Sowing time decisions, farming calendars, and irrigation management"
            },
            {
                no: 19,
                metric: "Projected heavy rainfall days",
                definition: "Future count of extreme rainfall days based on threshold exceedance",
                implications: "Flood risk, urban drainage, infrastructure design"
            },
            {
                no: 20,
                metric: "Future dry/wet spell frequency",
                definition: "Number of projected dry/wet spells periods with consecutive rainless/rain-surplus days",
                implications: "Drought monitoring, crop stress modeling, water planning"
            }
        ];

        // DOM elements
       
        const climateLearnMoreBtn = document.getElementById('climateLearnMoreBtn');
        const climateModalOverlay = document.getElementById('climateModalOverlay');
        const climateCloseBtn = document.getElementById('climateCloseBtn');
        const climateMetricsTableBody = document.getElementById('climateMetricsTableBody');
        // Assuming this code is within your class or main script file

        // Find the button and listen for clicks
        // document.getElementById('climateDownloadBtn').addEventListener('click', () => {
        //     // This calls the main download function
        //     downloadImage(); 
        // });
        // Populate table
        function populateClimateTable() {
            climateMetricsTableBody.innerHTML = metricsData.map(metric => `
                <tr>
                    <td class="climate-metric-number">${metric.no}</td>
                    <td class="climate-metric-name">${metric.metric}</td>
                    <td>
                        <strong>Definition:</strong> ${metric.definition}<br>
                        <strong>Implications:</strong> ${metric.implications}
                    </td>
                </tr>
            `).join('');
        }

        // Modal functions
        function openClimateModal() {
            climateModalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeClimateModal() {
            climateModalOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Event listeners
        climateLearnMoreBtn.addEventListener('click', openClimateModal);
        climateCloseBtn.addEventListener('click', closeClimateModal);
        climateModalOverlay.addEventListener('click', (e) => {
            if (e.target === climateModalOverlay) {
                closeClimateModal();
            }
        });
        
        

        // Escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && climateModalOverlay.classList.contains('active')) {
                closeClimateModal();
            }
        });

        // Initialize
        populateClimateTable();

        // Add some interactive effects
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in, .laptop-container').forEach(el => observer.observe(el));
        });

        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.form-results').html('').removeClass('d-none');
                
                $('.form-results').html('<div class="alert alert-info">Sending your message...</div>');

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('.form-results').html('<div class="alert alert-success">' + response.message + '</div>');
                            $('#contactForm')[0].reset();
                        } else {
                            $('.form-results').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error, xhr.responseText);
                        $('.form-results').html('<div class="alert alert-danger">There was an unexpected error. Please try again later.</div>');
                    }
                });
            });
        });
    </script>
   


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       
  class ClimateDataVisualizer {

    constructor() {
      this.locationOptions = {
        map: [
          {value:'uttarpradesh',text:'Uttar Pradesh'},
          {value:'madhyapradesh',text:'Madhya Pradesh'},
          {value:'maharashtra',text:'Maharashtra'},
          {value:'haryana',text:'Haryana'}
        ],
        timeseries: [
          {value:'Mathura',text:'Mathura'},
          {value:'Kanpur',text:'Kanpur'},
          {value:'Jhansi',text:'Jhansi'},
          {value:'Lucknow',text:'Lucknow'},
          {value:'Upaverage',text:'UP Average'},
        ]
      };
      
      // Track current state
      this.currentState = {
        variable: 'temperature',
        type: 'map',
        location: '',
        file: ''
      };

      // This finds the modal elements and saves them so other methods can use them.
        this.modal = document.getElementById('emailModal');
        this.modalForm = document.getElementById('emailForm');
        this.modalCloseBtn = this.modal.querySelector('.close-btn');
        this.modalOverlay = this.modal.querySelector('.modal-overlay');
        this.modalSubmitBtn = this.modal.querySelector('button[type="submit"]');
      

       
      this.init();
    }
    
    init() {
      this.bindEvents();
      this.initSidebar();
      this.updateLocationDropdown();
      this.updateUI();
      this.updateFloatingToggle();
    }
    
    bindEvents() {
      // Variable change
      document.querySelectorAll('input[name="variable"]').forEach(el => {
        el.addEventListener('change', () => {
          this.currentState.variable = el.value;
          this.updateFileDropdown();
        });
      });
      
      // Type change  
      document.querySelectorAll('input[name="type"]').forEach(el => {
        el.addEventListener('change', () => {
          this.currentState.type = el.value;
          this.updateLocationDropdown();
        });
      });
      
      // Location change
      document.getElementById('location-dropdown').addEventListener('change', (e) => {
        this.currentState.location = e.target.value;
        this.updateFileDropdown();
      });
      
      // File change
      document.getElementById('files-dropdown').addEventListener('change', (e) => {
        this.currentState.file = e.target.value;
        this.updateUI();
      });
      
      // Load button
      document.getElementById('load-visualization').addEventListener('click', () => {
        this.loadVisualization();
      });
      
      // Sidebar toggle (inside sidebar)
      document.getElementById('sidebarToggle').addEventListener('click', () => {
        this.toggleSidebar();
      });
      
      // Floating toggle button
      document.getElementById('floatingToggle').addEventListener('click', () => {
        this.toggleSidebar();
      });
      
      // Mobile overlay click to close sidebar
      document.getElementById('sidebar-overlay').addEventListener('click', () => {
        if (window.innerWidth <= 480) {
          this.toggleSidebar();
        }
      });
      
      // Handle window resize
      window.addEventListener('resize', () => {
        this.handleResize();
      });

      // Download button
      // document.getElementById('download-btn').addEventListener('click', () => {
      //     this.downloadImage();
      // });
      // The main download button now OPENS THE MODAL instead of downloading directly
        // document.getElementById('download-btn').addEventListener('click', () => {
        //     this.showEmailModal();
        // });

        



          // --- MODIFIED: The main download button now opens the new modal ---
          document.getElementById('download-btn').addEventListener('click', this.showEmailModal.bind(this));

          // --- NEW: Listeners for the new modal logic ---
          this.modalForm.addEventListener('submit', this.handleModalSubmit.bind(this));
          this.modalCloseBtn.addEventListener('click', this.hideEmailModal.bind(this));
          this.modalOverlay.addEventListener('click', this.hideEmailModal.bind(this));
          
          
          document.addEventListener('keydown', (e) => {
              if (e.key === 'Escape' && !this.modal.classList.contains('hidden')) {
                  this.hideEmailModal();
              }
          });

          // ... (Your listeners for sidebar toggles, etc.) ...

    }
    
    initSidebar() {
      // Auto-collapse on mobile/tablet
      if (window.innerWidth <= 768) {
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('mainContent');
        sidebar.classList.add('collapsed');
        main.classList.add('expanded');
      }
    }
    
    handleResize() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      const overlay = document.getElementById('sidebar-overlay');
      
      if (window.innerWidth <= 768) {
        // On mobile/tablet, ensure sidebar starts collapsed
        if (!sidebar.classList.contains('collapsed')) {
          sidebar.classList.add('collapsed');
          main.classList.add('expanded');
        }
      } else {
        // On desktop, show sidebar by default
        if (sidebar.classList.contains('collapsed')) {
          sidebar.classList.remove('collapsed');
          main.classList.remove('expanded');
        }
        // Hide mobile overlay on desktop
        overlay.classList.remove('active');
      }
      
      // Update floating toggle visibility
      this.updateFloatingToggle();
    }
    
    toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      const overlay = document.getElementById('sidebar-overlay');
      const floatingToggle = document.getElementById('floatingToggle');
      
      const isCollapsed = sidebar.classList.contains('collapsed');
      
      if (isCollapsed) {
        // Show sidebar
        sidebar.classList.remove('collapsed');
        floatingToggle.classList.remove('show');
        
        if (window.innerWidth <= 480) {
          // On mobile, show overlay
          overlay.classList.add('active');
        } else if (window.innerWidth <= 768) {
          // On tablet, adjust main content
          main.classList.remove('expanded');
        } else {
          // On desktop, adjust main content
          main.classList.remove('expanded');
        }
      } else {
        // Hide sidebar
        sidebar.classList.add('collapsed');
        floatingToggle.classList.add('show');
        
        if (window.innerWidth <= 480) {
          // On mobile, hide overlay
          overlay.classList.remove('active');
        } else {
          // On tablet/desktop, expand main content
          main.classList.add('expanded');
        }
      }
    }
    
    updateFloatingToggle() {
      const sidebar = document.getElementById('sidebar');
      const floatingToggle = document.getElementById('floatingToggle');
      
      if (sidebar.classList.contains('collapsed')) {
        floatingToggle.classList.add('show');
      } else {
        floatingToggle.classList.remove('show');
      }
    }
    
    updateLocationDropdown() {
      const locationDropdown = document.getElementById('location-dropdown');
      const type = this.currentState.type;
      
      // Clear current options
      locationDropdown.innerHTML = '<option value="">Select location...</option>';
      
      // Add options for current type
      this.locationOptions[type].forEach(location => {
        const option = document.createElement('option');
        option.value = location.value;
        option.textContent = location.text;
        locationDropdown.appendChild(option);
      });
      
      // Reset current location and file
      this.currentState.location = '';
      this.currentState.file = '';
      
      // Reset file dropdown
      const filesDropdown = document.getElementById('files-dropdown');
      filesDropdown.innerHTML = '<option value="">Select location first...</option>';
      filesDropdown.disabled = true;
      
      this.updateUI();
    }
    
    async updateFileDropdown() {
      const filesDropdown = document.getElementById('files-dropdown');
      
      if (!this.currentState.location) {
        filesDropdown.innerHTML = '<option value="">Select location first...</option>';
        filesDropdown.disabled = true;
        this.currentState.file = '';
        this.updateUI();
        return;
      }
      
      // Show loading state
      filesDropdown.innerHTML = '<option value="">Loading files...</option>';
      filesDropdown.disabled = true;
      
      try {
        const pathPrefix = window.location.pathname.startsWith('/Climagro/') ? '/Climagro' : '';
        const url = window.location.origin + pathPrefix + `/Welcome/list_files?variable=${this.currentState.variable}&type=${this.currentState.type}&location=${this.currentState.location}`;
        const response = await fetch(url);
        
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const files = await response.json();
        
        filesDropdown.innerHTML = '<option value="">Select file...</option>';
        
        if (!Array.isArray(files) || files.length === 0) {
          const option = document.createElement('option');
          option.value = '';
          option.textContent = 'No files available';
          filesDropdown.appendChild(option);
        } else {
          files.forEach(file => {
            const option = document.createElement('option');
            option.value = file;
            option.textContent = file;
            filesDropdown.appendChild(option);
          });
        }
        
        filesDropdown.disabled = false;
        
      } catch (error) {
        console.error('Error fetching files:', error);
        filesDropdown.innerHTML = '<option value="">Error loading files</option>';
        
        // Show user-friendly error after a delay
        setTimeout(() => {
          filesDropdown.innerHTML = '<option value="">Select location first...</option>';
        }, 2000);
      }
      
      this.currentState.file = '';
      this.updateUI();
    }
    
    updateUI() {
      const loadBtn = document.getElementById('load-visualization');
      const canLoad = this.currentState.location && this.currentState.file;
      
      loadBtn.disabled = !canLoad;
    }
    
    loadVisualization() {
      if (!this.currentState.location || !this.currentState.file) {
        alert('Please select both location and file');
        return;
      }
      
      const img = document.getElementById('chart-img');
      const spinner = document.getElementById('loading-spinner');
      const placeholder = document.getElementById('placeholder-message');
      const errorMsg = document.getElementById('error-message');
      
      const downloadBtn = document.getElementById('download-btn');
      // Show loading state
      spinner.classList.remove('hidden');
      img.classList.add('hidden');
      placeholder.classList.add('hidden');
      errorMsg.classList.add('hidden');
      downloadBtn.style.display = 'none';
      // Construct image path
      const imagePath = `assest/${this.currentState.variable}/${this.currentState.type}/${this.currentState.location}/${this.currentState.file}`;
      
      // Simulate loading delay for better UX
      setTimeout(() => {
        img.onload = () => {
          spinner.classList.add('hidden');
          img.classList.remove('hidden');
          downloadBtn.style.display = 'inline-block'; // Show on success
        };
        
        img.onerror = () => {
          spinner.classList.add('hidden');
          errorMsg.textContent = `Could not load visualization: ${imagePath}`;
          errorMsg.classList.remove('hidden');
        };
        
        img.src = imagePath;
      }, 500);
    }
    // Add this new method inside your ClimateDataVisualizer class

    downloadImage() {
        console.log("Download initiated for:", this.currentState.file);
        
        // Check if there is a file to download
        if (!this.currentState.location || !this.currentState.file) {
            alert('Please load a visualization first before downloading.');
            return;
        }
        
        // Construct the same image path
        const imagePath = `assest/${this.currentState.variable}/${this.currentState.type}/${this.currentState.location}/${this.currentState.file}`;
        
        // Create a temporary link to trigger the download
        const link = document.createElement('a');
        link.href = imagePath;
        link.download = this.currentState.file; // Suggest the current filename
        
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
    // Add these new methods inside your ClimateDataVisualizer class





    // Add these new methods inside your ClimateDataVisualizer class

    showEmailModal() {
        // Check if an image is loaded before showing the modal
        if (!this.currentState.file) {
            alert('Please load a visualization first.');
            return;
        }
        this.modal.classList.remove('hidden');
        document.body.classList.add('no-scroll');
        const firstInput = this.modal.querySelector('input[type="email"]');
        if (firstInput) setTimeout(() => firstInput.focus(), 100);
    }

    hideEmailModal() {
        this.modal.classList.add('hidden');
        document.body.classList.remove('no-scroll');
    }

    handleModalSubmit(event) {
        event.preventDefault();
        const email = this.modalForm.email.value.trim();

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email || !emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        const pathPrefix = window.location.pathname.startsWith('/Climagro/') ? '/Climagro' : '';
        const subscribeUrl = window.location.origin + pathPrefix + '/Welcome/subscribe';

        const originalText = this.modalSubmitBtn.textContent;
        this.modalSubmitBtn.textContent = 'Saving...';
        this.modalSubmitBtn.disabled = true;

        fetch(subscribeUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email })
        })
        .then(res => res.json().then(data => ({ status: res.status, data })))
        .then(({ status, data }) => {
            // --- THIS IS THE KEY INTEGRATION ---
            if (status === 200 && data.success) {
                alert('Thank you! Your download will begin shortly.');
                this.hideEmailModal();
                this.downloadImage(); // <-- TRIGGER DOWNLOAD ON SUCCESS
            } else if (status === 409) {
                alert("You're already on our list! Your download will begin.");
                this.hideEmailModal();
                this.downloadImage(); // <-- TRIGGER DOWNLOAD EVEN IF ALREADY SUBSCRIBED
            } else {
                alert(data.error || 'A server error occurred.');
            }
        })
        .catch(err => {
            console.error('Network error:', err);
            alert('A network error occurred. Please try again.');
        })
        .finally(() => {
            this.modalSubmitBtn.textContent = originalText;
            this.modalSubmitBtn.disabled = false;
        });
    }

    // Initialize when DOM is ready
    

  }

  document.addEventListener('DOMContentLoaded', () => {
      new ClimateDataVisualizer();
    });


  // Add some interactive effects
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in, .laptop-container').forEach(el => observer.observe(el));
        });

        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.form-results').html('').removeClass('d-none');
                
                $('.form-results').html('<div class="alert alert-info">Sending your message...</div>');

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('.form-results').html('<div class="alert alert-success">' + response.message + '</div>');
                            $('#contactForm')[0].reset();
                        } else {
                            $('.form-results').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error, xhr.responseText);
                        $('.form-results').html('<div class="alert alert-danger">There was an unexpected error. Please try again later.</div>');
                    }
                });
            });
        });
  
  


  
</script>