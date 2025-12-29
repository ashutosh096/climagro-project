[media pointer="file-service://file-9fKZivc7wbZikpUerNdEwf"]
[media pointer="file-service://file-HWtYDWRccZrqu69epAaKZW"]
<!DOCTYPE html>
<html>
<head>
  <title>Climate Data</title>
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f7fa;
    min-height: 100vh;
    line-height: 1.6;
    overflow-x: hidden;
}

.app-container {
    display: flex;
    min-height: 100vh;
}

/* Sidebar Styles */
.sidebar {
    width: 340px;
    background: white;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    position: fixed;
    height: 100vh;
    z-index: 1000;
    overflow-y: scroll;        /* Keep scrolling enabled */
    -ms-overflow-style: none;  /* Hide in IE/Edge */
    scrollbar-width: none;     /* Hide in Firefox */
    
}
/* Hide scrollbar in Chrome, Safari, Opera */
.sidebar::-webkit-scrollbar {
  display: none;
}
.sidebar.collapsed {
    transform: translateX(-260px);
}

.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid #e1e5e9;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.sidebar-header h2 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.sidebar-toggle {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-size: 1.2rem;
}

.sidebar-toggle:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.05);
}

.sidebar.collapsed .toggle-icon {
    transform: rotate(180deg);
}


.sidebar.collapsed .sidebar-content {
  display: none;   /* hide inner content */
}

/* .sidebar.collapsed .sidebar-header h2 {
  display: none;   /* hide title */
} */

.sidebar.collapsed .sidebar-toggle {
  position: absolute;
  top: 1.5rem;
  right: -20px;    /* pull toggle outside the sidebar */
  z-index: 1100;   /* above sidebar */
}

.toggle-icon {
    transition: transform 0.3s ease;
}

.sidebar-content {
    padding: 1.5rem;
}

/* Main Content Styles */
.main-content {
    flex: 1;
    margin-left: 340px;
    transition: margin-left 0.3s ease;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
}

.main-content.expanded {
    margin-left: 80px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.header {
    text-align: center;
    margin-bottom: 3rem;
    color: white;
}

.header h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    font-weight: 700;
}

.header p {
    font-size: 1.1rem;
    opacity: 0.9;
}

.control-group h3 {
    margin-bottom: 1.5rem;
    color: #333;
    font-size: 1.1rem;
    font-weight: 600;
}

.control-group {
    margin-bottom: 2rem;
}

.radio-group {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.radio-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
}

.radio-label:hover {
    background-color: #f8f9fa;
}

.radio-label input[type="radio"] {
    display: none;
}

.radio-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #ddd;
    border-radius: 50%;
    margin-right: 0.75rem;
    position: relative;
    transition: all 0.3s ease;
}

.radio-label input[type="radio"]:checked + .radio-custom {
    border-color: #667eea;
}

.radio-label input[type="radio"]:checked + .radio-custom::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 10px;
    height: 10px;
    background: #667eea;
    border-radius: 50%;
}

.dropdown {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e1e5e9;
    border-radius: 8px;
    font-size: 1rem;
    background: white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dropdown:hover {
    border-color: #667eea;
}

.dropdown:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.load-btn {
    width: 100%;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.load-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(102, 126, 234, 0.3);
}

.load-btn:active {
    transform: translateY(0);
}

.visualization-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    height: 600px;
    position: relative;
}

#chart-iframe {
    width: 100%;
    height: 100%;
    border: none;
    transition: opacity 0.3s ease;
}

.loading-spinner {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 1rem;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.hidden {
    display: none;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .sidebar {
        width: 280px;
    }
    
    .sidebar.collapsed {
        transform: translateX(-240px);
    }
    
    .main-content {
        margin-left: 280px;
    }
    
    .main-content.expanded {
        margin-left: 40px;
    }
    
    .container {
        padding: 1rem;
    }
    
    .header h1 {
        font-size: 2rem;
    }
    
    .visualization-container {
        height: 400px;
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100%;
    }
    
    .main-content {
        margin-left: 0;
    }
    
    .main-content.expanded {
        margin-left: 0;
    }
    
    .visualization-container {
        height: 400px;
    }
}

    .radio-group {
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .radio-label {
        flex: 1;
        min-width: 120px;
    }
}
  </style>
</head>
<body>
  <div class="app-container">
    <aside id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <h2>Climate Selector</h2>
        <button id="sidebarToggle" class="sidebar-toggle"><span class="toggle-icon">☰</span></button>
      </div>
      <div class="sidebar-content">
        <div class="control-group">
          <h3>Variable</h3>
          <div class="radio-group">
            <label class="radio-label"><input type="radio" name="variable" value="temperature" checked><span class="radio-custom"></span>Temperature</label>
            <label class="radio-label"><input type="radio" name="variable" value="rainfall"><span class="radio-custom"></span>Rainfall</label>
          </div>
        </div>
        <div class="control-group">
          <h3>Type</h3>
          <div class="radio-group">
            <label class="radio-label"><input type="radio" name="type" value="map" checked><span class="radio-custom"></span>Map</label>
            <label class="radio-label"><input type="radio" name="type" value="timeseries"><span class="radio-custom"></span>Time Series</label>
          </div>
        </div>
        
        <div class="control-group">
          <h3>Location</h3>
          <select id="location-dropdown" class="dropdown"></select>
        </div>
        <div class="control-group">
          <h3>Trends Maps/Time series</h3>
          <select id="files-dropdown" class="dropdown"></select>
        </div>
        <button id="load-visualization" class="load-btn">Load Visualization</button>
      </div>
    </aside>
    <main id="mainContent" class="main-content">
      <div class="container">
        <header class="header">
          <h1>Climate Data Visualization</h1>
          <p>Explore temperature and rainfall patterns across different regions</p>
        </header>
        <div class="visualization-container">
          <div id="loading-spinner" class="loading-spinner hidden"><div class="spinner"></div><div>Loading visualization…</div></div>
           <img id="chart-img" src="" style="width:100%; height:100%; object-fit:cover; opacity:1; transition:opacity .3s ease;">
        </div>
      </div>
    </main>
  </div>
  <script>
    class ClimateDataVisualizer {
      constructor() {
        this.parameterOptions = {
          temperature: [
            {value:'average',text:'Average temperature'},
            {value:'hotdays',text:'No of hot days'}
          ],
          rainfall: [
            {value:'average',text:'Average rainfall'},
            {value:'wetdays',text:'No of wet days'}
          ]
        };
        this.locationOptions = {
          map: [
            {value:'uttarpradesh',text:'Uttar Pradesh'},
            {value:'madhyapradesh',text:'Madhya Pradesh'},
            {value:'maharashtra',text:'Maharashtra'},
            {value:'haryana',text:'Haryana'}
          ],
          timeseries: [
            {value:'mathura',text:'Mathura'},
            {value:'kanpur',text:'Kanpur'},
            {value:'jhansi',text:'Jhansi'},
            {value:'lucknow',text:'Lucknow'},
            {value:'upaverage',text:'UP Average'},
            {value:'maharashtra',text:'Maharashtra'}
          ]
        };
        this.init();
      }
      init() {
        this.bindEventListeners();
        this.updateDropdowns();
        this.initSidebar();
      }
      bindEventListeners() {
        document.querySelectorAll('input[name="variable"]').forEach(r=>r.addEventListener('change',()=>this.updateParameterDropdown()));
        document.querySelectorAll('input[name="type"]').forEach(r=>r.addEventListener('change',()=>this.updateLocationDropdown()));
        document.getElementById('load-visualization').addEventListener('click',()=>this.loadVisualization());
        document.getElementById('sidebarToggle').addEventListener('click',()=>this.toggleSidebar());
      }
      initSidebar() {
        const sidebar=document.getElementById('sidebar'),mc=document.getElementById('mainContent');
        if(window.innerWidth<=768){sidebar.classList.add('collapsed');mc.classList.add('expanded');}
        window.addEventListener('resize',()=>{if(window.innerWidth<=480){sidebar.classList.add('collapsed');mc.classList.add('expanded');}});
      }
      toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('mainContent').classList.toggle('expanded');
      }
      updateDropdowns() {
        this.updateParameterDropdown(); this.updateLocationDropdown();
      }
      updateParameterDropdown() {
        const selVar=document.querySelector('input[name="variable"]:checked').value;
        const pd=document.getElementById('files-dropdown'); pd.innerHTML='';
        this.parameterOptions[selVar].forEach(o=>{let opt=document.createElement('option');opt.value=o.value;opt.textContent=o.text;pd.appendChild(opt);});
        pd.style.opacity='0.5'; setTimeout(()=>pd.style.opacity='1',150);
      }
      updateLocationDropdown() {
        const selT=document.querySelector('input[name="type"]:checked').value;
        const ld=document.getElementById('location-dropdown'); ld.innerHTML='';
        this.locationOptions[selT].forEach(o=>{let opt=document.createElement('option');opt.value=o.value;opt.textContent=o.text;ld.appendChild(opt);});
        ld.style.opacity='0.5'; setTimeout(()=>ld.style.opacity='1',150);
      }
      loadVisualization() {
        const variable = document.querySelector('input[name="variable"]:checked').value;
        const type     = document.querySelector('input[name="type"]:checked').value;
        const location = document.getElementById('location-dropdown').value;

        const fileName = `${variable}_${type}_${location}.jpeg`;  // or .jpg
        const filePath = `assest/${fileName}`;

        const spinner = document.getElementById('loading-spinner');
        const img     = document.getElementById('chart-img');

        spinner.classList.remove('hidden');
        img.style.opacity = '0';

        // a tiny delay just for spinner effect
        setTimeout(() => {
            img.src = filePath;
            img.onload = () => {
            spinner.classList.add('hidden');
            img.style.opacity = '1';
            };
            img.onerror = () => {
            spinner.classList.add('hidden');
            alert('Could not load image: ' + filePath);
            };
        }, 200);
    }

    }
    document.addEventListener('DOMContentLoaded',()=>new ClimateDataVisualizer());
  </script>
</body>
</html>
