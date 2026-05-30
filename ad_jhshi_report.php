<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Hydroclimatic Variability & Water Availability — Jhansi | ClimAgro Analytics</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800;900&family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<style>
/* ══════════════════════════════
   TOKENS
   ══════════════════════════════ */
:root{
  --ink:#0B2D21;
  --ink2:#0F3D2C;
  --green:#0F6E56;
  --green2:#1a8b6a;
  --mint:#7EDFC0;
  --lime:#CCFF00;
  --off:#F7F6F1;
  --cream:#EDF2EE;
  --text:#1E3028;
  --mid:#4a6b59;
  --lt:#8aab97;
  --white:#fff;
  --red:#E05A00;
  --amber:#f5a623;
  --serif:'DM Serif Display',Georgia,serif;
  --sans:'DM Sans',system-ui,sans-serif;
  --mono:'DM Mono',monospace;
  --head:'Inter',system-ui,sans-serif;
  --nav-h:64px;
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:var(--sans);color:var(--text);background:var(--white);overflow-x:hidden}

/* ══════════════════════════════
   SITE HEADER
   ══════════════════════════════ */
header.page-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999;
    height: var(--nav-h);
    background: #025b5f;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.16);
    display: flex;
    align-items: center;
    padding: 0 5vw;
}
header.page-header .header-inner {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
}
.header-logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #ffffff;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
}
.header-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    min-width: 42px;
    height: 42px;
    border-radius: 0;
    background: transparent;
    overflow: hidden;
}
.header-brand img {
    display: block;
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}
.header-nav {
    display: flex;
    align-items: center;
    gap: 28px;
}
.header-nav a {
    color: rgba(255,255,255,.9);
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 600;
    transition: color .2s;
}
.header-nav a:hover,
.header-nav a.active {
    color: #ccff00;
}
.header-cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 24px;
    border-radius: 999px;
    background: #ccff00;
    color: #025b5f;
    font-weight: 700;
    text-decoration: none;
    transition: transform .2s, box-shadow .2s;
}
.header-cta:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}
@media (max-width: 980px) {
    .header-nav { display: none; }
    .header-cta { padding: 10px 18px; }
}

/* ══ VIEW ROUTING ══ */
.page{display:none}
.page.on{display:block}

.footer {
    background-color: #025B5F;
    color: white;
    margin-top: 4rem;
    padding: 1.5rem 0 0.5rem;
    font-family: system-ui, -apple-system, sans-serif;
    font-size: 0.8125rem;
}

.footer-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1rem;
}

.footer-column {
    flex: 1;
    min-width: 150px;
    margin-bottom: 0.5rem;
}

.footer-title {
    color: #f9fafb;
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.footer-contact-title {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ffffff;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
}

.footer-contact-title img {
    width: 18px;
    height: 18px;
    object-fit: contain;
}

.footer-contact-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1rem;
}

.footer-contact-title span {
    width: 30px;
    height: 30px;
    min-width: 30px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: rgba(126,223,192,0.12);
}

.footer-links {
    display: flex !important;
    flex-direction: column !important;
    gap: 0.85rem !important;
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links a {
    color: #d1d5db;
    text-decoration: none;
    transition: color 0.15s;
    display: inline-block !important;
}

.footer-links a:hover {
    color: #ccff00;
}

.subscribe-wrapper {
    position: relative;
    width: 100%;
    max-width: 400px;
}

.subscribe-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    position: relative;
}

.subscribe-input, #subscribeEmail {
    width: 100% !important;
    height: 50px !important;
    padding: 10px 15px 10px 42px !important;
    background: rgba(10, 20, 30, 0.4) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: 10px !important;
    color: #fff !important;
    font-size: 0.95rem !important;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.subscribe-input:focus, #subscribeEmail:focus {
    border-color: #d1ff44 !important;
    background: rgba(10, 20, 30, 0.6) !important;
    box-shadow: 0 0 0 4px rgba(209, 255, 68, 0.1);
}

.subscribe-icon {
    position: absolute;
    left: 14px;
    top: 25px;
    transform: translateY(-50%);
    color: #d1ff44;
    font-size: 1rem;
    z-index: 5;
    pointer-events: none;
}

.subscribe-btn {
    width: fit-content;
    padding: 0 25px;
    height: 42px;
    background-color: #d1ff44 !important;
    color: #025B5F !important;
    border: none !important;
    border-radius: 21px !important;
    font-weight: 700 !important;
    font-size: 0.95rem !important;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(209, 255, 68, 0.2);
}

.subscribe-btn:hover {
    background-color: #e3ff8c !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(209, 255, 68, 0.3);
}

.subscribe-btnContent {
    display: flex;
    align-items: center;
    gap: 8px;
}

.subscribe-spinner {
    width: 18px;
    height: 18px;
    border: 2px solid rgba(255,255,255,0.28);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    box-sizing: border-box;
}

@keyframes spin { to { transform: rotate(360deg); } }

.subscribe-glow {
    position: absolute;
    inset: -8px;
    border-radius: 36px;
    background: linear-gradient(90deg, rgba(16,185,129,0.10), rgba(59,130,246,0.06));
    opacity: 0;
    filter: blur(14px);
    transition: opacity .28s ease;
    pointer-events: none;
    z-index: -1;
}

.subscribe-wrapper:focus-within .subscribe-glow { opacity: 1; }

#subscribeMessage {
    position: absolute;
    left: 12px;
    right: 12px;
    bottom: -30px;
    font-size: 0.9rem;
    transition: opacity .22s ease, transform .22s ease;
    pointer-events: none;
    opacity: 0;
    transform: translateY(6px);
    text-align: left;
    line-height: 1.1;
}

#subscribeMessage.show { opacity: 1; transform: translateY(0); }
#subscribeMessage.success { color: #10b981; }
#subscribeMessage.error { color: #ef4444; }

.subscribe-wrapper.success .subscribe-btn { box-shadow: 0 12px 36px rgba(16,185,129,0.12); }
.subscribe-wrapper.error .subscribe-input { border-color: rgba(239,68,68,0.18); background: rgba(239,68,68,0.02); }
.subscribe-wrapper.success .subscribe-input { border-color: rgba(16,185,129,0.12); }

@media (max-width: 480px) {
    .subscribe-form { flex-direction: column; align-items: stretch; gap: 10px; }
    #subscribeEmail { 
        border-radius: 12px !important; 
        padding-left: 42px !important; 
        width: 100%;
    }
    .subscribe-input { border-radius: 10px; padding-left: 42px; height: 45px !important; }
    .subscribe-btn { border-radius: 21px; width: fit-content; align-self: center; height: 40px; }
    .subscribe-icon { left: 12px; top: 22px; }
    #subscribeMessage { bottom: -36px; }
}

.footer-contact {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.25rem;
    color: #d1d5db;
}
.footer-contact a {
    color: #d1d5db;
    text-decoration: none;
    transition: color 0.15s;
}
.footer-contact a:hover {
    color: #ffffff;
}

.footer-bottom {
    border-top: 1px solid #374151;
    padding-top: 0.75rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 0.5rem;
}

.footer-copyright {
    color: #9ca3af;
}

.footer-social a {
    color: #FFFF;
    transition: color 0.15s;
    font-size: 16px;
}

.footer-social a:hover {
    color: white;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        gap: 0.5rem;
    }
    .footer-bottom {
        flex-direction: column;
        align-items: flex-start;
    }
}

/* ══════════════════════════════
   PAGE 1 — LANDING
══════════════════════════════ */

/* ── HERO ── */
.hero{
  min-height:auto;
  background:#01342D;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  padding:calc(var(--nav-h) + 8px) 5vw 24px;
  position:relative;overflow:hidden;text-align:left;
}
.hero-inner{
  position:relative;z-index:2;
  display:grid;grid-template-columns:1fr 1fr;gap:60px;
  align-items:center;max-width:1200px;width:100%;
}
.hero-left{display:flex;flex-direction:column;align-items:flex-start;max-width:520px}
.hero-right{position:relative;display:flex;align-items:flex-start;justify-content:center;margin-top:10px}
.hero-lake-img{
  width:100%;max-width:560px;border-radius:20px;
  box-shadow:0 24px 80px rgba(0,0,0,.5),0 0 0 1px rgba(126,223,192,.15);
  object-fit:cover;height:340px;
  animation:fadeUp .8s .3s ease both;
}
.hero-lake-badge{
  position:absolute;bottom:-14px;left:20px;
  background:rgba(11,45,33,.95);border:1px solid rgba(126,223,192,.25);
  border-radius:10px;padding:10px 16px;
  font-size:10.5px;color:var(--mint);font-family:var(--mono);
  letter-spacing:.08em;backdrop-filter:blur(10px);
  box-shadow:0 8px 24px rgba(0,0,0,.3);
}
@media(max-width:860px){
  .hero-inner{grid-template-columns:1fr;text-align:center}
  .hero-left{align-items:center}
  .hero-right{display:none}
  .hero{text-align:center}
}
.hero-grid{
  position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(126,223,192,.06) 1px,transparent 1px),
    linear-gradient(90deg,rgba(126,223,192,.06) 1px,transparent 1px);
  background-size:48px 48px;
}
.hero-glow{
  position:absolute;
  top:40%;left:50%;transform:translate(-50%,-50%);
  width:700px;height:500px;
  background:radial-gradient(ellipse,rgba(15,110,86,.35) 0%,transparent 68%);
  pointer-events:none;
}
.hero-noise{
  position:absolute;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  opacity:.4;
}

.hero-kicker{
  position:relative;z-index:2;
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(126,223,192,.1);border:1px solid rgba(126,223,192,.22);
  color:var(--mint);font-size:10.5px;font-weight:600;letter-spacing:.14em;
  text-transform:uppercase;padding:6px 16px;border-radius:20px;
  margin-bottom:14px;font-family:var(--mono);
  animation:fadeUp .7s ease both;
}
.hero-kicker-dot{width:6px;height:6px;border-radius:50%;background:var(--mint);
  animation:blink 2.2s infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.3}}

.hero-h1{
  position:relative;z-index:2;
  font-family:var(--head);
  font-size:clamp(2rem,4.2vw,3.6rem);
  font-weight:900;line-height:1.08;letter-spacing:-.03em;
  color:#fff;margin-bottom:10px;
  max-width:600px;
  animation:fadeUp .7s .1s ease both;
}
.hero-h1 em{font-style:italic;color:var(--mint);font-family:var(--serif)}

.hero-h2{
  position:relative;z-index:2;
  font-family:var(--serif);
  font-size:clamp(1.2rem,2.8vw,2rem);
  font-weight:700;color:rgba(255,255,255,.48);
  margin-bottom:28px;letter-spacing:.01em;
  animation:fadeUp .7s .18s ease both;
}

.hero-desc{
  position:relative;z-index:2;
  font-size:clamp(14px,1.8vw,16px);color:rgba(255,255,255,.6);
  max-width:580px;line-height:1.75;font-weight:300;
  margin:0 0 28px 0;
  animation:fadeUp .7s .26s ease both;
}

/* stat bar */
.hero-stats{
  position:relative;z-index:2;
  display:grid;grid-template-columns:repeat(4,1fr);gap:10px;
  max-width:560px;width:100%;margin-bottom:20px;
  animation:fadeUp .7s .34s ease both;
}
.hs{
  background:rgba(15,110,86,.18);border:1px solid rgba(126,223,192,.15);
  border-radius:12px;padding:12px 10px;text-align:center;
  transition:background .2s,border-color .2s,box-shadow .2s;
  cursor:pointer;
}
.hs:hover{background:rgba(15,110,86,.3);border-color:rgba(126,223,192,.35)}
.hs.active-stat{background:rgba(15,110,86,.45);border-color:var(--mint);box-shadow:0 0 0 2px rgba(126,223,192,.3)}
.hs-n{font-family:var(--serif);font-size:1.5rem;font-weight:800;color:var(--mint);line-height:1}
.hs-l{font-size:9px;color:rgba(255,255,255,.42);margin-top:5px;line-height:1.5;font-family:var(--mono)}
@media(max-width:600px){.hero-stats{grid-template-columns:1fr 1fr}}

.hero-cta{
  position:relative;z-index:2;
  display:flex;gap:14px;flex-wrap:wrap;justify-content:flex-start;
  animation:fadeUp .7s .42s ease both;
}
.btn-prime{
  background:linear-gradient(135deg,var(--lime),#b8f000);
  color:#0d3526;font-size:14px;font-weight:700;
  padding:14px 32px;border-radius:8px;border:none;cursor:pointer;
  font-family:var(--sans);letter-spacing:.03em;transition:all .22s;
  display:inline-flex;align-items:center;gap:8px;
  box-shadow:0 6px 24px rgba(180,255,0,.25);
}
.btn-prime:hover{transform:translateY(-2px);box-shadow:0 10px 32px rgba(180,255,0,.4)}
.btn-ghost{
  background:transparent;color:rgba(255,255,255,.8);font-size:13.5px;font-weight:500;
  padding:13px 26px;border-radius:8px;border:1.5px solid rgba(126,223,192,.3);
  cursor:pointer;font-family:var(--sans);letter-spacing:.02em;transition:all .22s;
  display:inline-flex;align-items:center;gap:7px;
}
.btn-ghost:hover{border-color:var(--mint);color:#fff;background:rgba(126,223,192,.08)}

.hero-scroll{
  position:relative;z-index:2;
  display:flex;flex-direction:column;align-items:center;gap:5px;
  margin-top:32px;
  animation:bounce 2.4s infinite;color:rgba(255,255,255,.28);font-size:10px;
  font-family:var(--mono);letter-spacing:.12em;text-transform:uppercase;
}
@keyframes bounce{0%,100%{transform:translateY(0)}50%{transform:translateY(6px)}}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}



/* ── SECTION COMMON ── */
.sec{padding:44px 5vw}
.sec-inner{max-width:1100px;margin:0 auto}
.sec-eyebrow{
  display:inline-block;font-size:11px;font-weight:700;letter-spacing:.12em;
  text-transform:uppercase;color:#fff;background:var(--green);
  padding:6px 16px;border-radius:20px;margin-bottom:16px;
  box-shadow:0 2px 12px rgba(15,110,86,.35);
}
.sec-h{font-family:var(--serif);font-size:clamp(1.8rem,3.5vw,2.8rem);
  font-weight:800;color:var(--ink);line-height:1.15;margin-bottom:14px}
.sec-p{font-size:15px;color:var(--mid);line-height:1.8;font-weight:300;max-width:680px}

/* ── FINDINGS SECTION ── */
.findings-sec{background:var(--off)}

/* ── BLOCK RISK SECTION ── */
.block-sec{background:var(--ink);padding:80px 5vw}
.block-sec .sec-eyebrow{background:rgba(126,223,192,.12);color:var(--mint)}
.block-sec .sec-h{color:#fff}
.block-sec .sec-p{color:rgba(255,255,255,.5)}
.blocks-wrap{display:grid;grid-template-columns:280px 1fr;gap:20px;margin-top:36px;align-items:start}
@media(max-width:820px){.blocks-wrap{grid-template-columns:1fr}}

.block-list{display:flex;flex-direction:column;gap:6px}
.block-btn{
  display:flex;align-items:center;justify-content:space-between;
  padding:13px 18px;border-radius:9px;border:1px solid rgba(255,255,255,.08);
  background:rgba(255,255,255,.04);cursor:pointer;
  font-size:13.5px;font-weight:500;color:rgba(255,255,255,.65);
  font-family:var(--sans);transition:all .2s;
}
.block-btn:hover,.block-btn.act{
  background:rgba(15,110,86,.25);border-color:rgba(126,223,192,.3);
  color:#fff;
}
.block-btn .dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.dot-red{background:#e05a00}
.dot-amber{background:#f5a623}
.dot-green{background:#3aaa6e}

.block-detail{
  background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.1);
  border-radius:14px;padding:28px;
}
.bd-name{font-family:var(--serif);font-size:2rem;font-weight:800;color:#fff;margin-bottom:4px}
.bd-sub{font-size:12px;color:rgba(255,255,255,.35);font-family:var(--mono);margin-bottom:16px}
.bd-risk-badge{
  display:inline-flex;align-items:center;gap:7px;
  padding:5px 14px;border-radius:20px;font-size:11px;font-weight:700;
  letter-spacing:.06em;text-transform:uppercase;margin-bottom:20px;
}
.bd-risk-badge.critical{background:rgba(224,90,0,.2);color:#f5a623;border:1px solid rgba(224,90,0,.3)}
.bd-risk-badge.high{background:rgba(245,166,35,.15);color:#f5a623;border:1px solid rgba(245,166,35,.25)}
.bd-risk-badge.moderate{background:rgba(58,170,110,.15);color:#3aaa6e;border:1px solid rgba(58,170,110,.25)}
.bd-metrics{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:18px}
@media(max-width:600px){.bd-metrics{grid-template-columns:1fr 1fr}}
.bd-m{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);border-radius:9px;padding:12px 14px}
.bd-m-label{font-size:9.5px;font-weight:700;letter-spacing:.09em;text-transform:uppercase;
  color:rgba(255,255,255,.32);font-family:var(--mono);margin-bottom:7px}
.bd-m-val{font-size:13px;font-weight:600;display:flex;align-items:center;gap:6px}
.trend-down{color:#e05a00}
.trend-up{color:#f5a623}
.trend-inc{color:#3aaa6e}
.bd-note{
  border-left:3px solid rgba(126,223,192,.4);padding-left:16px;
  font-size:13px;color:rgba(255,255,255,.55);line-height:1.7;font-weight:300;
}


/* ── GATEWAY SECTION ── */
.gate-sec{
  background:linear-gradient(160deg,#01342D 0%,#0B2D21 60%,#0d2218 100%);
  padding:48px 5vw;text-align:center;position:relative;overflow:hidden;
}
.gate-sec::before{
  content:'';position:absolute;inset:0;
  background-image:
    linear-gradient(rgba(126,223,192,.05) 1px,transparent 1px),
    linear-gradient(90deg,rgba(126,223,192,.05) 1px,transparent 1px);
  background-size:44px 44px;
}
.gate-glow{
  position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
  width:600px;height:400px;
  background:radial-gradient(ellipse,rgba(15,110,86,.3) 0%,transparent 70%);
  pointer-events:none;
}
.gate-inner{position:relative;z-index:2;max-width:680px;margin:0 auto}
.gate-eyebrow{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(204,255,0,.1);border:1px solid rgba(204,255,0,.25);
  color:var(--lime);font-size:10px;font-weight:700;letter-spacing:.14em;
  text-transform:uppercase;padding:6px 16px;border-radius:20px;margin-bottom:24px;
  font-family:var(--mono);
}
.gate-h{
  font-family:var(--serif);font-size:clamp(2rem,5vw,3.6rem);
  font-weight:900;color:#fff;line-height:1.1;margin-bottom:16px;
}
.gate-h em{color:var(--mint);font-style:italic}
.gate-sub{
  font-size:15.5px;color:rgba(255,255,255,.55);line-height:1.75;
  font-weight:300;margin-bottom:40px;
}

/* access form */
.gate-card{
  background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);
  border-radius:16px;padding:36px;text-align:left;
  backdrop-filter:blur(8px);
}
.gate-card-h{font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  color:var(--mint);font-family:var(--mono);margin-bottom:20px}
.gate-form{display:flex;flex-direction:column;gap:14px}
.gate-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
@media(max-width:520px){.gate-row{grid-template-columns:1fr}}
.gate-input{
  background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);
  border-radius:8px;padding:12px 16px;font-size:13.5px;
  color:#fff;font-family:var(--sans);outline:none;
  transition:border-color .2s,background .2s;width:100%;
}
.gate-input::placeholder{color:rgba(255,255,255,.3)}
.gate-input:focus{border-color:rgba(126,223,192,.5);background:rgba(255,255,255,.12)}
.gate-check{display:flex;align-items:flex-start;gap:10px;font-size:12px;color:rgba(255,255,255,.45);line-height:1.5}
.gate-check input{margin-top:2px;accent-color:var(--mint);flex-shrink:0}
.gate-submit{
  background:linear-gradient(135deg,var(--lime),#b8f000);
  color:#0d3526;font-size:14.5px;font-weight:700;
  padding:16px;border-radius:9px;border:none;cursor:pointer;
  font-family:var(--sans);letter-spacing:.04em;
  transition:all .22s;
  box-shadow:0 6px 24px rgba(180,255,0,.25);
  display:flex;align-items:center;justify-content:center;gap:8px;
}
.gate-submit:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(180,255,0,.4)}
.gate-note{text-align:center;font-size:11px;color:rgba(255,255,255,.3);margin-top:14px;font-family:var(--mono)}

.gate-trust{
  display:flex;align-items:center;justify-content:center;gap:28px;
  margin-top:36px;flex-wrap:wrap;
}
.gt{display:flex;align-items:center;gap:7px;font-size:11.5px;color:rgba(255,255,255,.38)}
.gt svg{color:var(--mint);opacity:.7;flex-shrink:0}

/* ══════════════════════════════
   MODAL OVERLAY
══════════════════════════════ */
.modal-overlay{
  display:none;position:fixed;inset:0;z-index:900;
  background:rgba(1,28,22,.72);backdrop-filter:blur(6px);
  align-items:center;justify-content:center;padding:20px;
}
.modal-overlay.open{display:flex}
.modal-box{
  background:#fff;border-radius:20px;
  width:100%;max-width:520px;max-height:92vh;overflow-y:auto;
  padding:36px 36px 28px;position:relative;
  box-shadow:0 32px 80px rgba(0,0,0,.45);
  animation:modalIn .28s ease both;
}
@keyframes modalIn{from{opacity:0;transform:translateY(22px) scale(.97)}to{opacity:1;transform:none}}
.modal-close{
  position:absolute;top:16px;right:18px;
  background:none;border:none;cursor:pointer;
  color:#9aada4;font-size:22px;line-height:1;
  width:32px;height:32px;display:flex;align-items:center;justify-content:center;
  border-radius:50%;transition:background .15s;
}
.modal-close:hover{background:#f0f0f0}
.modal-eyebrow{
  display:inline-block;
  background:#f2f4f3;color:#4a6b59;
  font-size:10.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
  padding:6px 16px;border-radius:20px;margin-bottom:14px;font-family:var(--mono);
}
.modal-sub{font-size:13px;color:#6b7f77;margin-bottom:24px;line-height:1.6}
.modal-form{display:flex;flex-direction:column;gap:0}
.modal-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px}
@media(max-width:500px){.modal-row{grid-template-columns:1fr}}
.modal-field{display:flex;flex-direction:column;gap:6px;margin-bottom:16px}
.modal-label{font-size:12.5px;font-weight:700;color:#1E3028}
.modal-label .req{color:#e05a00;margin-left:2px}
.modal-label .opt{color:#9aada4;font-weight:400;font-size:11px;margin-left:4px}
.modal-input,.modal-select,.modal-textarea{
  border:1.5px solid #d8e2de;border-radius:10px;
  padding:11px 14px;font-size:13.5px;color:#1E3028;
  font-family:var(--sans);outline:none;
  background:#fff;transition:border-color .2s,box-shadow .2s;width:100%;
}
.modal-input::placeholder,.modal-textarea::placeholder{color:#b0c4bc}
.modal-input:focus,.modal-select:focus,.modal-textarea:focus{
  border-color:#0F6E56;box-shadow:0 0 0 3px rgba(15,110,86,.1)
}
.modal-select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%234a6b59' stroke-width='2' viewBox='0 0 24 24'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 14px center;padding-right:36px;cursor:pointer}
.modal-textarea{resize:vertical;min-height:96px;line-height:1.6}
.modal-submit{
  background:#0F6E56;color:#fff;font-size:15px;font-weight:700;
  padding:15px;border-radius:50px;border:none;cursor:pointer;
  font-family:var(--sans);letter-spacing:.02em;
  transition:all .22s;margin-top:4px;width:100%;
}
.modal-submit:hover{background:#0d5c47;transform:translateY(-1px);box-shadow:0 8px 24px rgba(15,110,86,.35)}
.modal-note{text-align:center;font-size:11px;color:#9aada4;margin-top:12px;font-family:var(--mono)}

/* ── SIDE POP DOWNLOAD BUTTON ── */
.side-pop-btn{
  position:fixed;right:0;top:50%;transform:translateY(-50%) rotate(180deg);
  z-index:600;
  background:linear-gradient(180deg,var(--lime),#b8f000);
  color:#0d3526;font-size:12px;font-weight:700;
  padding:14px 10px;
  border-radius:8px 0 0 8px;
  border:none;cursor:pointer;
  font-family:var(--sans);letter-spacing:.06em;text-transform:uppercase;
  writing-mode:vertical-rl;
  display:flex;align-items:center;justify-content:center;gap:8px;
  box-shadow:-4px 0 20px rgba(180,255,0,.3);
  transition:all .25s;
}
.side-pop-btn:hover{
  padding-right:16px;
  box-shadow:-6px 0 30px rgba(180,255,0,.5);
}
.side-pop-btn svg{transform:rotate(180deg);flex-shrink:0}

.sr.vis{opacity:1;transform:none}
.sr-d1{transition-delay:.1s}.sr-d2{transition-delay:.2s}.sr-d3{transition-delay:.3s}

/* ── SCROLL REVEAL ── */
.sr{opacity:0;transform:translateY(28px);transition:opacity .6s ease,transform .6s ease}
.success-state{display:none;text-align:center;padding:20px 0}
.success-state.show{display:block}
.gate-form-wrap.hidden{display:none}
.success-icon{font-size:48px;margin-bottom:16px}
.success-h{font-family:var(--serif);font-size:1.6rem;font-weight:700;color:#fff;margin-bottom:10px}
.success-p{font-size:14px;color:rgba(255,255,255,.55);line-height:1.7}
.success-dl{
  display:inline-flex;align-items:center;gap:8px;
  background:var(--lime);color:#0d3526;font-weight:700;font-size:14px;
  padding:14px 28px;border-radius:8px;text-decoration:none;
  margin-top:20px;transition:all .2s;
}
/* ── FLIP CARDS ── */
.flip-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:16px;
  margin-top:36px;
}
@media(max-width:900px){.flip-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:480px){.flip-grid{grid-template-columns:1fr 1fr}}

.flip-wrap{
  perspective:1000px;
  height:200px;
  cursor:pointer;
}
.flip-inner{
  position:relative;width:100%;height:100%;
  transform-style:preserve-3d;
  transition:transform .55s cubic-bezier(.4,0,.2,1);
}
.flip-wrap.flipped .flip-inner{transform:rotateY(180deg)}

.flip-front,.flip-back{
  position:absolute;inset:0;
  backface-visibility:hidden;-webkit-backface-visibility:hidden;
  border-radius:14px;padding:18px 16px;
  display:flex;flex-direction:column;justify-content:space-between;
  overflow:hidden;
}
.flip-front{
  background:var(--white);
  border:1px solid #dde8e3;
}
.flip-front::before{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;border-radius:14px 14px 0 0;
}
.flip-front.red::before{background:linear-gradient(90deg,#e05a00,#f59b23)}
.flip-front.amber::before{background:linear-gradient(90deg,#d97706,#f5a623)}
.flip-front.teal::before{background:linear-gradient(90deg,#0e7490,#06b6d4)}
.flip-front.green::before{background:linear-gradient(90deg,var(--green),var(--mint))}
.flip-wrap:hover .flip-front{box-shadow:0 10px 30px rgba(15,110,86,.12);border-color:#aed4c4}

.ff-icon{font-size:20px;margin-bottom:6px}
.ff-tag{font-size:8.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  color:var(--lt);font-family:var(--mono);margin-bottom:5px}
.ff-h{font-family:var(--serif);font-size:.88rem;font-weight:700;color:var(--ink);line-height:1.3}
.ff-stat{font-family:var(--serif);font-size:1.1rem;font-weight:800;margin-top:6px}
.ff-hint{font-size:8.5px;color:var(--lt);font-family:var(--mono);
  display:flex;align-items:center;gap:4px;margin-top:6px}

.flip-back{
  background:var(--ink);
  border:1px solid rgba(126,223,192,.15);
  transform:rotateY(180deg);
}
.flip-back.gated{background:#0a2a1e;position:relative}
.fb-tag{font-size:8.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  color:rgba(255,255,255,.3);font-family:var(--mono);margin-bottom:6px}
.fb-p{font-size:11px;color:rgba(255,255,255,.65);line-height:1.6;font-weight:300;flex:1}
.fb-stat{font-family:var(--serif);font-size:1.15rem;font-weight:800;margin-top:6px}
.fb-stat.red{color:#f07040}
.fb-stat.amber{color:#f5a623}
.fb-stat.teal{color:#06b6d4}
.fb-stat.green{color:var(--mint)}
.fb-stat-l{font-size:8.5px;color:rgba(255,255,255,.3);font-family:var(--mono);margin-left:4px}

.fb-gate{
  position:absolute;inset:0;border-radius:14px;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  gap:8px;padding:16px;text-align:center;
  background:rgba(10,42,30,.95);
}
.fb-gate-icon{font-size:26px}
.fb-gate-h{font-family:var(--serif);font-size:.9rem;font-weight:800;color:#fff;line-height:1.3}
.fb-gate-btn{
  background:linear-gradient(135deg,var(--lime),#b8f000);
  color:#0d3526;font-size:10.5px;font-weight:700;
  padding:7px 14px;border-radius:7px;border:none;cursor:pointer;
  font-family:var(--sans);letter-spacing:.03em;margin-top:2px;
  transition:all .2s;
}
.fb-gate-btn:hover{transform:translateY(-1px)}

/* stat box active glow */
.hs.stat-active{
  background:rgba(15,110,86,.45)!important;
  border-color:var(--mint)!important;
  box-shadow:0 0 0 2px rgba(126,223,192,.35);
}

/* Ensure footer quick links render vertically in the report footer */
footer .footer-links {
  display: block !important;
  margin: 0 !important;
  padding: 0 !important;
}
footer .footer-links li {
  display: block !important;
  margin: 0 0 0.85rem 0 !important;
  padding: 0 !important;
}
footer .footer-links li:last-child {
  margin-bottom: 0 !important;
}
footer .footer-links a {
  display: inline-block !important;
}

#report-footer-links {
  display: block !important;
}
#report-footer-links > li {
  display: block !important;
  margin: 0 0 0.85rem 0 !important;
}
#report-footer-links > li:last-child {
  margin-bottom: 0 !important;
}
#report-footer-links > li > a {
  display: inline-block !important;
}
</style>
</head>
<body>
<header class="page-header">
    <div class="header-inner">
        <a class="header-logo" href="./">
            <span class="header-brand"><img src="assest/img/logo/ClimagroLogo.png" alt="ClimAgro Analytics"></span>
            <span>ClimAgro Analytics</span>
        </a>
        <nav class="header-nav">
            <a href="./">Home</a>
            <a href="about-us">About</a>
            <a href="solutions">Offerings</a>
            <a href="articles">Resources</a>
        </nav>
        <a class="header-cta" href="contact-us">Contact Us</a>
    </div>
</header>

<!-- ══════════════════════════════════════
     PAGE 1 — LANDING
══════════════════════════════════════ -->
<div class="page on" id="page-land">

<!-- HERO -->
<section class="hero">
  <div class="hero-grid"></div>
  <div class="hero-glow"></div>
  <div class="hero-noise"></div>

  <div class="hero-inner">
    <!-- LEFT: Text content -->
    <div class="hero-left">


      <h1 class="hero-h1">
        Synergistic Effects of Rising Summer Temperatures &amp;<br>
        <em>Decreasing Summer Season Rainfall</em>
      </h1>
      <h2 class="hero-h2">on Jhansi's Water Availability</h2>

      <p class="hero-desc">Average summer temperature: <strong style="color:var(--mint)">30°C</strong> &nbsp;·&nbsp; Average maximum summer temperature: <strong style="color:var(--mint)">37.53°C</strong> &nbsp;·&nbsp; Average peak summer maximum: <strong style="color:#f5a623">44.90°C</strong></p>

      <div class="hero-stats">
        <div class="hs" data-card="0" onclick="triggerFlip(0)">
          <div class="hs-n">124 yrs</div>
          <div class="hs-l">Summer rainfall<br>records (1901–2024)</div>
        </div>
        <div class="hs" data-card="1" onclick="triggerFlip(1)">
          <div class="hs-n">830 mm</div>
          <div class="hs-l">Annual rainfall<br>~30% below India avg</div>
        </div>
        <div class="hs" data-card="2" onclick="triggerFlip(2)">
          <div class="hs-n">44.90°C</div>
          <div class="hs-l">Peak summer max<br>temp across years</div>
        </div>
        <div class="hs" data-card="3" onclick="triggerFlip(3)">
          <div class="hs-n">8 blocks</div>
          <div class="hs-l">Spatial risk<br>profiling, Jhansi</div>
        </div>
      </div>

      <div class="hero-cta">
        <button class="btn-prime" onclick="openModal()">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 2H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-8"/><polyline points="14 2 14 8 20 8"/></svg>
          Download Free Report
        </button>
        <button class="btn-ghost" onclick="document.getElementById('findings').scrollIntoView({behavior:'smooth'})">
          Explore Findings ↓
        </button>
      </div>
    </div>

    <!-- RIGHT: Lake image -->
    <div class="hero-right">
      <img src="assest/img/jhansi-cover.jpg" alt="Atiya Talab, Jhansi" class="hero-lake-img" />

    </div>
  </div>

  <div class="hero-scroll">
    Scroll
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
  </div>
</section>



<!-- KEY FINDINGS -->
<section class="sec findings-sec" id="findings">
  <div class="sec-inner">
    <div class="sr">
      <div class="sec-eyebrow">Key Highlights</div>
      <h2 class="sec-h">A district under compounding<br>hydroclimatic stress</h2>
      <p class="sec-p">Click any stat above — or tap a card — to reveal the full finding. Heat rising, rainfall falling, the monsoon growing less reliable each decade.</p>
    </div>

    <!-- 4 FLIP CARDS — all visible at once, no slider -->
    <div class="flip-grid sr sr-d1">

      <!-- CARD 0 — Heat Extremes -->
      <div class="flip-wrap" id="flip-0" onclick="toggleFlip(0)">
        <div class="flip-inner">
          <div class="flip-front red">
            <div>
              <div class="ff-icon">🌡️</div>
              <div class="ff-tag">Pre-Monsoon · March–May</div>
              <div class="ff-h">Fastest-rising heat extremes in all of Uttar Pradesh</div>
            </div>
            <div class="ff-stat" style="color:#e05a00">Tx5d ↑ <span style="font-size:10px;color:var(--lt);font-family:var(--mono)">steepest in UP</span></div>
            <div class="ff-hint">↻ Click to reveal details</div>
          </div>
          <div class="flip-back">
            <div class="fb-tag">Pre-Monsoon · March–May</div>
            <p class="fb-p">Jhansi has the steepest Tx5d rise in Uttar Pradesh. Peak summer maximum reached 44.90°C — draining soil moisture weeks before the monsoon arrives.</p>
            <div><span class="fb-stat red">44.90°C</span><span class="fb-stat-l">avg peak summer max temp</span></div>
          </div>
        </div>
      </div>

      <!-- CARD 1 — Pre-Monsoon Rainfall -->
      <div class="flip-wrap" id="flip-1" onclick="toggleFlip(1)">
        <div class="flip-inner">
          <div class="flip-front amber">
            <div>
              <div class="ff-icon">☔</div>
              <div class="ff-tag">Pre-Monsoon Rainfall · 1901–2024</div>
              <div class="ff-h">Moth, Badagaun & Gursarai are drying fastest</div>
            </div>
            <div class="ff-stat" style="color:#d97706">18 mm <span style="font-size:10px;color:var(--lt);font-family:var(--mono)">avg summer rainfall</span></div>
            <div class="ff-hint">↻ Click to reveal details</div>
          </div>
          <div class="flip-back">
            <div class="fb-tag">Pre-Monsoon Rainfall · 1901–2024</div>
            <p class="fb-p">Jhansi's summer season rainfall is just 18 mm — only 2% of annual totals. Badagaun, Moth and Gursarai show a persistent declining trend since 1951.</p>
            <div><span class="fb-stat amber">↓ Declining</span><span class="fb-stat-l">in 4 of 8 blocks</span></div>
          </div>
        </div>
      </div>

      <!-- CARD 2 — Monsoon Deficit -->
      <div class="flip-wrap" id="flip-2" onclick="toggleFlip(2)">
        <div class="flip-inner">
          <div class="flip-front teal">
            <div>
              <div class="ff-icon">🌧️</div>
              <div class="ff-tag">Monsoon Season · June–September</div>
              <div class="ff-h">Annual rainfall 30% below India average</div>
            </div>
            <div class="ff-stat" style="color:#0e7490">830 mm <span style="font-size:10px;color:var(--lt);font-family:var(--mono)">vs ~1,200 mm India avg</span></div>
            <div class="ff-hint">↻ Click to reveal details</div>
          </div>
          <div class="flip-back">
            <div class="fb-tag">Monsoon Season · June–September</div>
            <p class="fb-p">Jhansi averages 830 mm annually — 30% below the India average. Long-term IMD data (1901–2024) shows rainfall declining across most blocks, reducing groundwater recharge.</p>
            <div><span class="fb-stat teal">830 mm</span><span class="fb-stat-l">~30% below India average</span></div>
          </div>
        </div>
      </div>

      <!-- CARD 3 — Compounding Stress -->
      <div class="flip-wrap" id="flip-3" onclick="toggleFlip(3)">
        <div class="flip-inner">
          <div class="flip-front green">
            <div>
              <div class="ff-icon">🔄</div>
              <div class="ff-tag">Spatial Risk · 8 Blocks</div>
              <div class="ff-h">Blocks most stressed before monsoon also lose the most during it</div>
            </div>
            <div class="ff-stat" style="color:var(--green)">4 blocks <span style="font-size:10px;color:var(--lt);font-family:var(--mono)">in dual rainfall decline</span></div>
            <div class="ff-hint">↻ Click to reveal details</div>
          </div>
          <div class="flip-back">
            <div class="fb-tag">Spatial Risk · 8 Blocks</div>
            <p class="fb-p">Moth, Badagaun, Gursarai and Chirgaon face dual decline — drying pre-monsoon seasons and weakening monsoons — creating chronic water scarcity with no seasonal recovery.</p>
            <div><span class="fb-stat green">8 blocks</span><span class="fb-stat-l">profiled across Jhansi district</span></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- BLOCK RISK EXPLORER -->
<section class="block-sec" id="blocks">
  <div class="sec-inner">
    <div class="sr">
      <div class="sec-eyebrow">Interactive</div>
      <h2 class="sec-h" style="color:#fff">Block-by-block<br>risk profile</h2>
      <p class="sec-p">Select any of Jhansi's 8 administrative blocks. Access the full report to view the complete climate risk profile for each block.</p>
    </div>
    <div class="blocks-wrap sr sr-d1">
      <div class="block-list" id="blockList"></div>
      <div style="position:relative">
        <div class="block-detail" id="blockDetail" style="filter:blur(6px);pointer-events:none;user-select:none">
          <div class="bd-name" id="bd-name">Moth</div>
          <div class="bd-sub">Administrative block · Jhansi District, UP</div>
          <div class="bd-risk-badge" id="bd-badge"></div>
          <div class="bd-metrics" id="bd-metrics"></div>
          <div class="bd-note" id="bd-note"></div>
        </div>
        <!-- Blur overlay -->
        <div id="blockGateOverlay" style="display:none;position:absolute;inset:0;flex-direction:column;align-items:center;justify-content:center;gap:16px;padding:32px;text-align:center;border-radius:14px;background:rgba(11,45,33,0.45);backdrop-filter:blur(2px)">
          <div style="font-size:38px">🔒</div>
          <div style="font-family:var(--serif);font-size:1.3rem;font-weight:800;color:#fff;line-height:1.3">Full block-level data<br>in the report</div>
          <p style="font-size:13px;color:rgba(255,255,255,.55);max-width:280px;line-height:1.6">Get rainfall trends, temperature indices, and risk profiles for all 8 blocks.</p>
          <button class="btn-prime" onclick="openModal()">Access Full Report →</button>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- GATEWAY / ACCESS REPORT -->
<section class="gate-sec" id="access" style="background:linear-gradient(160deg,#f4f7f5 0%,#e8f0eb 50%,#dce9e1 100%);">
  <div class="gate-glow" style="background:radial-gradient(ellipse,rgba(15,110,86,.12) 0%,transparent 70%)"></div>
  <div class="gate-inner">

    <h2 class="gate-h" style="color:var(--ink)">
      Get the<br><em style="color:var(--green)">complete assessment</em>
    </h2>
    <p class="gate-sub" style="color:var(--mid)">
      Includes all 6 spatial figures, block-level trend tables, full methodology, IMD data analysis, and 7 policy-ready recommendations. Free PDF, no paywall.
    </p>

    <div class="gate-card" style="background:#fff;border:1.5px solid #d8e8e0;box-shadow:0 12px 48px rgba(15,110,86,.12);padding:20px 36px 36px;">
      <!-- lock icon + unlock button -->
      <div style="text-align:center;padding:0 0 16px">
        <div style="font-size:52px;margin-bottom:10px">🔒</div>
        <h3 style="font-family:var(--serif);font-size:1.5rem;font-weight:800;color:var(--ink);margin-bottom:10px">Access the Full Report</h3>
        <p style="font-size:14px;color:var(--mid);line-height:1.7;max-width:380px;margin:0 auto 24px">
          Fill a quick 30-second form to unlock the complete 30-page PDF — including all maps, methodology, findings, and adaptation recommendations. Free to access.
        </p>
        <button class="gate-submit" style="max-width:360px;margin:0 auto;display:flex" onclick="openModal()">
          Unlock Full Report &nbsp;→
        </button>
      </div>
    </div>

    <div class="gate-trust">
      <div class="gt" style="color:var(--mid)">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        IMD-sourced peer-reviewed data
      </div>
      <div class="gt" style="color:var(--mid)">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        120 years of climate records
      </div>
      <div class="gt" style="color:var(--mid)">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Free — no paywall
      </div>
    </div>
  </div>
</section>

<!-- ═══ MODAL FORM ═══ -->
<div class="modal-overlay" id="reportModal" onclick="closeModalOutside(event)">
  <div class="modal-box">
    <button class="modal-close" onclick="closeModal()" aria-label="Close">✕</button>
    <div class="modal-eyebrow">Access Full Report</div>
    <p class="modal-sub">Fill out the form below and get your free PDF instantly.</p>

    <div id="modalFormWrap">
      <div class="modal-form">
        <div class="modal-row">
          <div class="modal-field">
            <label class="modal-label">Your name <span class="req">*</span></label>
            <input class="modal-input" type="text" id="m-name" placeholder="e.g. John Smith">
          </div>
          <div class="modal-field">
            <label class="modal-label">Phone number <span class="opt">(optional)</span></label>
            <input class="modal-input" type="tel" id="m-phone" placeholder="e.g. +91 98765 43210">
          </div>
        </div>
        <div class="modal-field">
          <label class="modal-label">Email address <span class="req">*</span></label>
          <input class="modal-input" type="email" id="m-email" placeholder="e.g. john@email.com">
        </div>

        <div class="modal-field">
          <label class="modal-label">Anything you want us to know?</label>
          <textarea class="modal-textarea" id="m-msg" placeholder="Type here …"></textarea>
        </div>
        <button class="modal-submit" onclick="handleModalSubmit()">Download Free PDF</button>
        <p class="modal-note">🔒 Your data is secure. We do not share with third parties.</p>
      </div>
    </div>

    <div class="success-state" id="modalSuccess">
      <div class="success-icon">✅</div>
      <div class="success-h" style="color:var(--ink)">You're all set!</div>
      <p class="success-p" style="color:var(--mid)">Thank you. Your download should begin automatically.<br>If not, click below to access the report directly.</p>
      <a href="assest/uploadfile/monsoon_report_2026.pdf" download class="success-dl">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Download Report PDF
      </a>
    </div>
  </div>
</div>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-column">
                <div class="footer-title">Quick Links</div>
                <div class="footer-links" style="display:flex !important; flex-direction:column !important; gap:0.85rem !important; margin:0 !important; padding:0 !important;">
                    <a href="./" style="display:inline-block !important;">Home</a>
                    <a href="about-us" style="display:inline-block !important;">About</a>
                    <a href="solutions" style="display:inline-block !important;">Offerings</a>
                    <a href="contact-us" style="display:inline-block !important;">Contact</a>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-title">Contact</div>
                <div class="footer-contact-title"><span><img src="assest/img/footer/contact.svg" alt=""></span> Contact Us</div>
                <div class="footer-contact">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:contact@climagroanalytics.com">contact@climagroanalytics.com</a>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-phone"></i>
                    <a href="https://wa.me/919277296270" target="_blank">+91 92772 96270</a>
                </div>
                <div class="footer-contact">
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="https://www.google.com/maps/search/?api=1&query=Nankari+IIT+Kanpur+-+208016" target="_blank" rel="noopener">Nankari IIT Kanpur - 208016</a>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-title">Subscribe</div>
                <div class="subscribe-wrapper" id="subscribeSection">
                    <form class="subscribe-form" id="subscribeForm" novalidate onsubmit="handleFooterSubscribe(event)">
                        <input id="subscribeEmail" type="email" name="email" placeholder="your@email.com" class="subscribe-input" autocomplete="email" />
                        <i class="fas fa-at subscribe-icon" aria-hidden="true"></i>
                        <button id="subscribeBtn" type="submit" class="subscribe-btn" aria-label="Subscribe">
                            <span id="subscribeBtnContent">Subscribe &nbsp; <i class="fas fa-arrow-right" aria-hidden="true" style="font-size: 0.8rem;"></i></span>
                        </button>
                    </form>
                    <div id="subscribeMessage" role="status" aria-live="polite" class="" style="display:none"></div>
                    <div class="subscribe-glow" aria-hidden="true"></div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; 2026 ClimAgro Analytics All rights reserved
                <div>Startup India Certificate Number - DIPP129220</div>
            </div>
            <div class="footer-social">
                <a href="https://www.linkedin.com/company/climagroanalytics" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://twitter.com/climagroanalytics" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://youtube.com/@climagroanalytics" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.facebook.com/climagroanalytics" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/climagroanalytics" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

</div><!-- /page-land -->

<script>
/* ── BLOCK DATA (from report Table 1) ── */
const BLOCKS = [
  {
    name:'Moth', risk:'critical',
    pre_rain:'Decreasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Decreasing',
    note:'Moth is the highest-risk block in Jhansi. It shows declining rainfall in both pre-monsoon and monsoon seasons, combined with universal heat intensification. The spatial overlap of rainfall deficit and heat surplus creates the most severe water stress in the district.'
  },
  {
    name:'Badagaun', risk:'moderate',
    pre_rain:'Increasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Increasing',
    note:'Badagaun shows increasing pre-monsoon rainfall, offering a modest buffer against pre-season water stress. However, long-term monsoon decline remains a concern. Heat intensification across all indices continues to raise evaporative demand.'
  },
  {
    name:'Gursarai', risk:'critical',
    pre_rain:'Decreasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Decreasing',
    note:'Gursarai sits in the lowest summer rainfall zone in the district. Declining trends in both seasons and intensifying heat extremes (Tx5d) compound groundwater stress, limiting agricultural and domestic water supply across the block.'
  },
  {
    name:'Chirgaon', risk:'high',
    pre_rain:'Decreasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Decreasing',
    note:'Chirgaon shows declining monsoon rainfall in the recent 2000–2024 period alongside pre-monsoon drying. The convergence of heat intensification and rainfall reduction places this block among the highest water-stress zones in the district.'
  },
  {
    name:'Bamaur', risk:'moderate',
    pre_rain:'Increasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Increasing',
    note:'Bamaur shows increasing pre-monsoon rainfall, offering a modest buffer against early-season water stress. Long-term monsoon decline remains a concern alongside steady heat intensification.'
  },
  {
    name:'Bangra', risk:'moderate',
    pre_rain:'Decreasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Decreasing',
    note:'Bangra experiences declining pre-monsoon rainfall with rising thermal stress. Monsoon rainfall shows a long-term weakening trend. Water management infrastructure must account for the increasing mismatch between evaporative demand and precipitation supply.'
  },
  {
    name:'Babina', risk:'moderate',
    pre_rain:'Increasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Increasing', mon_recent:'Increasing',
    note:'Babina is the most hydrologically favoured block, with increasing trends in both pre-monsoon and long-term monsoon rainfall. Despite this, universal heat intensification (Tx5d) sustains elevated evaporative demand that constrains net water availability gains.'
  },
  {
    name:'Mauranipur', risk:'high',
    pre_rain:'Increasing', pre_mean:'Increasing', pre_max:'Increasing', tx5d:'Increasing',
    mon_long:'Decreasing', mon_recent:'Decreasing',
    note:'Mauranipur has marginal pre-monsoon rainfall gains but experiences declining monsoon totals — the primary annual water source. Rising temperatures across all metrics increase the seasonal water deficit, limiting effective groundwater recharge and agricultural water supply.'
  }
];

const riskMeta = {
  critical:{label:'Critical risk',cls:'critical',dot:'dot-red'},
  high:{label:'High risk',cls:'high',dot:'dot-amber'},
  moderate:{label:'Moderate risk',cls:'moderate',dot:'dot-green'}
};

function trendHTML(t){
  if(t==='Decreasing') return `<span class="trend-down">↓ Decreasing</span>`;
  if(t==='Increasing') return `<span class="trend-inc">↑ Increasing</span>`;
  return `<span style="color:rgba(255,255,255,.4)">${t}</span>`;
}

function renderBlock(idx){
  const b = BLOCKS[idx];
  const rm = riskMeta[b.risk];
  const isGated = idx > 1;

  document.getElementById('bd-name').textContent = b.name;
  document.getElementById('bd-badge').className = `bd-risk-badge ${rm.cls}`;
  document.getElementById('bd-badge').innerHTML = `<span style="width:7px;height:7px;border-radius:50%;background:currentColor;display:inline-block"></span> ${rm.label}`;
  document.getElementById('bd-metrics').innerHTML = `
    <div class="bd-m"><div class="bd-m-label">Pre-monsoon Rainfall</div><div class="bd-m-val">${trendHTML(b.pre_rain)}</div></div>
    <div class="bd-m"><div class="bd-m-label">Monsoon (1901–2024)</div><div class="bd-m-val">${trendHTML(b.mon_long)}</div></div>
    <div class="bd-m"><div class="bd-m-label">Monsoon (2000–2024)</div><div class="bd-m-val">${trendHTML(b.mon_recent)}</div></div>
    <div class="bd-m"><div class="bd-m-label">Summer Mean Temp</div><div class="bd-m-val">${trendHTML(b.pre_mean)}</div></div>
    <div class="bd-m"><div class="bd-m-label">Summer Max Temp</div><div class="bd-m-val">${trendHTML(b.pre_max)}</div></div>
    <div class="bd-m"><div class="bd-m-label">Heat Extremes (Tx5d)</div><div class="bd-m-val">${trendHTML(b.tx5d)}</div></div>
  `;
  document.getElementById('bd-note').textContent = b.note;

  // blur/unblur the detail panel
  document.getElementById('blockDetail').style.filter = isGated ? 'blur(6px)' : '';
  document.getElementById('blockDetail').style.pointerEvents = isGated ? 'none' : '';
  document.getElementById('blockDetail').style.userSelect = isGated ? 'none' : '';

  // show/hide gate overlay
  document.getElementById('blockGateOverlay').style.display = isGated ? 'flex' : 'none';

  document.querySelectorAll('.block-btn').forEach((el,i)=>{
    el.classList.toggle('act',i===idx);
  });
}

function initBlocks(){
  const list = document.getElementById('blockList');
  BLOCKS.forEach((b,i)=>{
    const rm = riskMeta[b.risk];
    const btn = document.createElement('button');
    btn.className = 'block-btn' + (i===0?' act':'');
    btn.innerHTML = `${b.name}<span class="dot ${rm.dot}"></span>`;
    btn.onclick = ()=>renderBlock(i);
    list.appendChild(btn);
  });
  renderBlock(0);
}
initBlocks();

/* ── FORM / MODAL ── */
function scrollToGate(){
  document.getElementById('access').scrollIntoView({behavior:'smooth'});
}

function openModal(){
  document.getElementById('reportModal').classList.add('open');
  document.body.style.overflow='hidden';
}
function closeModal(){
  document.getElementById('reportModal').classList.remove('open');
  document.body.style.overflow='';
}
function closeModalOutside(e){
  if(e.target===document.getElementById('reportModal')) closeModal();
}

function handleModalSubmit(){
  const name = document.getElementById('m-name').value.trim();
  const email = document.getElementById('m-email').value.trim();
  if(!name){alert('Please enter your name.');return}
  if(!email||!email.includes('@')){alert('Please enter a valid email address.');return}
  closeModal();
  window.open('assest/uploadfile/monsoon_report_2026.pdf', '_blank');
}

/* ── FLIP CARDS ── */
function updateStatHighlight(){
  document.querySelectorAll('.hs').forEach(el=>el.classList.remove('stat-active'));
  [0,1,2,3].forEach(i=>{
    const w = document.getElementById('flip-'+i);
    if(w && w.classList.contains('flipped')){
      const box = document.querySelector('.hs[data-card="'+i+'"]');
      if(box) box.classList.add('stat-active');
    }
  });
}

function toggleFlip(idx){
  const wrap = document.getElementById('flip-'+idx);
  const isFlipped = wrap.classList.contains('flipped');
  // If it's already showing the back → flip it back to front
  // If it's showing the front → flip to back (close others first)
  [0,1,2,3].forEach(i=>{
    const w = document.getElementById('flip-'+i);
    if(w) w.classList.remove('flipped');
  });
  if(!isFlipped) wrap.classList.add('flipped');
  updateStatHighlight();
}

// Click outside any card or stat box → reset all to front
document.addEventListener('click', function(e){
  const insideCard = e.target.closest('.flip-wrap');
  const insideStat = e.target.closest('.hs');
  if(!insideCard && !insideStat){
    [0,1,2,3].forEach(i=>{
      const w = document.getElementById('flip-'+i);
      if(w) w.classList.remove('flipped');
    });
    updateStatHighlight();
  }
});

function triggerFlip(idx){
  // Highlight the clicked stat box immediately
  document.querySelectorAll('.hs').forEach(el=>el.classList.remove('stat-active'));
  const box = document.querySelector('.hs[data-card="'+idx+'"]');
  if(box) box.classList.add('stat-active');

  // Scroll to findings section
  const sec = document.getElementById('findings');
  if(sec) sec.scrollIntoView({behavior:'smooth',block:'start'});

  // Flip the card after a short delay (let scroll happen first)
  setTimeout(()=>{
    // Close all other cards first
    [0,1,2,3].forEach(i=>{
      const w = document.getElementById('flip-'+i);
      if(w && i!==idx) w.classList.remove('flipped');
    });
    const wrap = document.getElementById('flip-'+idx);
    if(wrap) wrap.classList.add('flipped');
    updateStatHighlight();
  }, 400);
}

/* ── FOOTER SUBSCRIBE ── */
function handleFooterSubscribe(e) {
  e.preventDefault();
  const emailInput = document.getElementById('subscribeEmail');
  const email = emailInput.value.trim();
  const msgEl = document.getElementById('subscribeMessage');
  if(!email || !email.includes('@')) {
    msgEl.classList.add('show', 'error');
    msgEl.classList.remove('success');
    msgEl.textContent = 'Please enter a valid email.';
    msgEl.style.display = 'block';
    return;
  }
  msgEl.classList.remove('error', 'success');
  msgEl.classList.add('show');
  msgEl.style.color = '#fff';
  msgEl.textContent = 'Subscribing...';
  msgEl.style.display = 'block';
  
  fetch('subscribe.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'email=' + encodeURIComponent(email)
  })
  .then(res => res.json())
  .then(data => {
    if(data && data.success) {
      msgEl.classList.remove('error');
      msgEl.classList.add('success');
      msgEl.textContent = data.message || 'Subscribed successfully!';
      emailInput.value = '';
    } else {
      msgEl.classList.remove('success');
      msgEl.classList.add('error');
      msgEl.textContent = (data && data.message) || 'Subscription failed.';
    }
  })
  .catch(() => {
    msgEl.classList.remove('success');
    msgEl.classList.add('error');
    msgEl.textContent = 'Subscription failed. Try again later.';
  });
}

/* ── SCROLL REVEAL ── */
const srEls = document.querySelectorAll('.sr');
const obs = new IntersectionObserver(entries=>{
  entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('vis');obs.unobserve(e.target)}});
},{threshold:.12});
srEls.forEach(el=>obs.observe(el));
</script>
</body>
</html>
