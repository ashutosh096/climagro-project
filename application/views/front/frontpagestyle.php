<style>
    .hero-img {
        width: 100%;
        height: 77%;
        background-size: cover;
        background-position: center;
        
        position: absolute;
        top: 0;
        left: 0;
        
    }
    /* More styles */
    * {
            box-sizing: border-box;
        }

    /* Strong global link reset: remove default underlines site-wide; components may override */
    html body a, html body a:link, html body a:visited {
        text-decoration: none !important;
        /* color: inherit !important; */
    }
    html body a:hover, html body a:focus {
        text-decoration: underline !important;
    }

      /* Fix for extra space on right */
    body, html {
        overflow-x: hidden; /* Prevents horizontal scrolling */
        width: 100%;
        margin: 0;
        padding: 0;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none;  /* IE 10+ */
    }

    .container {
        width: 100%;
        max-width: 1200px; /* Or whatever max-width you're using */
        padding-left: 15px;
        padding-right: 15px;
        margin: 0 auto;
        
    }

    .container-video{
        padding-top : 20px;
        margin-top: 20px;
    }

    .hero-dashbord img {
        max-width: 100%; /* Ensures image doesn't overflow */
        height: auto;
    }

    /* Add margin bottom to the section instead of using the mb-160 class */
    .hero-two {
        margin-bottom:  0px; /* Adjust as needed, was mb-160 before */
    }

    /* Ensure SVG elements don't create overflow */
    svg {
        display: inline-block;
        vertical-align: middle;
    }





    /*video text */
    .climate-content {
    text-align: left;
    padding: 80px 20px;
    color: #1f2937; /* slate-800 tone for readability */
    max-width: 800px;
    margin: 0 auto;
    }

    .climate-content h4 {
    font-size: 1.5rem;
    color: #4f46e5; /* Indigo-600 */
    margin-bottom: 10px;
    font-weight: 600;
    }

    .climate-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 5px 0;
    color: #111827; /* Gray-900 */
    }

    .climate-content p {
    font-size: 1.125rem;
    margin-top: 20px;
    color: #4b5563; /* Gray-600 */
    line-height: 1.6;
    }

    .climate-content .btn-primary {
    background-color: #10b981; /* Emerald-500 */
    border: none;
    color: white;
    padding: 12px 30px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.3s ease;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    }

    .climate-content .btn-primary:hover {
    background-color: #059669; /* Emerald-600 */
    text-decoration: none;
    }


    
    /* Partners Section Styles */
.partners-section {
    padding: 4rem 0;
    background-color: #f8fafc;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}
.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    color: #1a202c;
    margin-bottom: 0rem;
}
.section-description {
    text-align: center;
    color: #64748b;
    margin-bottom: 0rem;
    font-size: 1.125rem;
}
.partners-container {
    position: relative;
    padding: 0 3rem;
}
.partners-scroll-container {
    overflow-x: scroll;
    position: relative;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
}
.partners-scroll-container::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}
.partners-wrapper {
    display: flex;
    gap: 2rem;
    padding: 1rem 0;
    white-space: nowrap;
}
.partner-tile {
    flex: 0 0 200px;
    min-width: 200px;
    height: 120px;
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    text-decoration: none;
}
.partner-tile:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
}
.partner-logo-container {
    width: 120%;
    height: 120%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.partner-logo {
    max-width: 120%;
    max-height: 120%;
    object-fit: contain;
    filter: grayscale(0%);
    opacity: 1;
    transition: all 0.3s ease;
}
.partner-tile:hover .partner-logo {
    filter: grayscale(0%);
    opacity: 1;
}
.scroll-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    border: none;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    transition: all 0.3s ease;
    z-index: 10;
}
.scroll-arrow:hover {
    background: #f1f5f9;
    color: #1a202c;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
.scroll-arrow:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
.scroll-left {
    left: 0;
}
.scroll-right {
    right: 0;
}
/* Responsive Design */
@media (max-width: 768px) {
    .partners-container {
        padding: 0 2rem;
    }
    
    .partner-tile {
        flex: 0 0 160px;
        height: 100px;
        padding: 1rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
}
@media (max-width: 576px) {
    .partners-container {
        padding: 0 1.5rem;
    }
    
    .partner-tile {
        flex: 0 0 140px;
        height: 90px;
    }
    
    .section-title {
        font-size: 1.75rem;
    }
    
    .section-description {
        font-size: 1rem;
    }
}
</style>