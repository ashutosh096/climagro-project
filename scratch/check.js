const puppeteer = require('puppeteer');
(async () => {
  const browser = await puppeteer.launch({headless: "new"});
  const page = await browser.newPage();
  await page.goto('http://localhost/Climagro/articles');
  
  // Click on "Read More & Download ->" button
  await page.evaluate(() => {
    document.querySelector('.read-more-btn').click();
  });
  
  // Wait a bit
  await new Promise(r => setTimeout(r, 1000));
  
  // Evaluate the positions and margins
  const data = await page.evaluate(() => {
    const bc = document.querySelector('.breadcrumb');
    const btn = document.querySelector('.back-btn');
    const hero = document.querySelector('.hero-band');
    
    return {
      bc: bc ? { rect: bc.getBoundingClientRect(), computed: getComputedStyle(bc).marginBottom } : null,
      btn: btn ? { rect: btn.getBoundingClientRect(), computed: getComputedStyle(btn).marginTop } : null,
      hero: hero ? { rect: hero.getBoundingClientRect(), computed: getComputedStyle(hero).marginTop } : null,
      viewLanding: document.getElementById('view-landing') ? document.getElementById('view-landing').style.display : null,
      reportsPageWrap: document.querySelector('.reports-page-wrap') ? document.querySelector('.reports-page-wrap').style.paddingTop : null,
      bodyWrapPaddingTop: document.querySelector('.body_wrap') ? getComputedStyle(document.querySelector('.body_wrap')).paddingTop : null,
      mainPaddingTop: document.querySelector('main') ? getComputedStyle(document.querySelector('main')).paddingTop : null,
      mainMarginTop: document.querySelector('main') ? getComputedStyle(document.querySelector('main')).marginTop : null,
      mainMinHeight: document.querySelector('main') ? getComputedStyle(document.querySelector('main')).minHeight : null
    };
  });
  console.log(JSON.stringify(data, null, 2));
  await browser.close();
})();
