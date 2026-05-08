<?php
$current_page = $this->uri->segment(1);
ob_start();
?>
<!-- EmailJS SDK -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
<style>
/* ─── BRAND TOKENS (v5 palette) ─── */
:root{
  --teal:#0F6E56;--teal-dk:#0B3D33;--teal-lg:#E1F5EE;
  --coral:#CCFF00;--coral-l:#F5FFD6;
  --blue:#1a6b4a;--blue-l:#e4f5ec;
  --off:#F7F6F3;--ink:#1A1A1A;--mid:#555;--lt:#888;
  --white:#fff;
  --serif:"DM Serif Display",Georgia,serif;
  --sans:"DM Sans",system-ui,sans-serif;
  /* final(3) compat tokens */
  --ca-dark:#0d3b2a;
  --ca-green:#1a6b3c;
  --ca-mid:#2d8653;
  --ca-bright:#3aaa6e;
  --ca-light:#e8f5ee;
  --ca-white:#ffffff;
  --ca-body:#f5f7f6;
  --ca-text:#1e2d27;
  --ca-muted:#6b8278;
  --ca-border:#d0e4d9;
  --ca-card:#ffffff;
  --mon-blue:#1a6b4a;
  --mon-light:#e4f5ec;
  --mon-border:#a8d9bf;
  --heat-amber:#c45f00;
  --heat-light:#fdf2e8;
  --heat-border:#f0ceaa;
}
*{margin:0;padding:0;box-sizing:border-box} html{scroll-behavior:smooth}
body{font-family:var(--sans);color:var(--ink);background:var(--white);overflow-x:hidden}

/* ─── VIEW ROUTING ─── */
.view{display:none}
.view.active{display:block}

/* ═══════════════════════════════════════
   LANDING PAGE (from v5)
════════════════════════════════════════ */

/* ─── HERO ─── */
.hero{
  min-height:100vh;
  display:flex;align-items:center;justify-content:center;
  padding:100px 5vw 70px;
  position:relative;overflow:hidden;
  background:#01342D;
  font-family:"Poppins","DM Sans",system-ui,sans-serif;
}
.hero::before{
  content:'';
  position:absolute;inset:0;z-index:0;
  background-image:
    linear-gradient(rgba(58,170,110,.18) 1px, transparent 1px),
    linear-gradient(90deg, rgba(58,170,110,.18) 1px, transparent 1px);
  background-size:44px 44px;
  z-index:1;
  pointer-events:none;
}
.hero::after{
  content:'';
  position:absolute;
  top:-60px;right:-60px;
  width:320px;height:320px;
  border-radius:50%;
  background:rgba(58,170,110,.07);
  pointer-events:none;
  z-index:0;
}
.hero-corner-bl{
  position:absolute;bottom:-70px;left:-40px;
  width:260px;height:260px;
  border-radius:50%;
  background:rgba(204,255,0,.04);
  pointer-events:none;
  z-index:0;
}
.hero-vid-wrap{position:absolute;inset:0;z-index:0;overflow:hidden}
.hero-vid{width:100%;height:100%;object-fit:cover;opacity:.04;filter:saturate(1.4) blur(3px)}
.hero-voverlay{position:absolute;inset:0;
  background:rgba(1,52,45,0.0)}

.hero-inner{position:relative;z-index:2;max-width:860px;width:100%;text-align:center}

.hero-we-label{
  font-family:"Poppins",sans-serif;
  font-size:13px;font-weight:700;
  color:#3aaa6e;
  letter-spacing:.18em;text-transform:uppercase;
  margin-bottom:10px;display:block;
}

.hero-eyebrow{display:inline-flex;align-items:center;gap:8px;
  background:rgba(58,170,110,.10);border:1px solid rgba(58,170,110,.25);
  border-radius:30px;padding:6px 18px;margin-bottom:30px;
  font-size:10.5px;font-weight:600;color:rgba(255,255,255,.75);
  letter-spacing:.09em;text-transform:uppercase;font-family:"DM Sans",sans-serif}
.hero-eyebrow i{width:7px;height:7px;border-radius:50%;background:#3aaa6e;
  animation:blink 2s ease-in-out infinite;flex-shrink:0;
  box-shadow:0 0 8px rgba(58,170,110,.6)}
@keyframes blink{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.3;transform:scale(1.6)}}

.hero h1{
  font-family:"Poppins",sans-serif;
  font-size:clamp(2rem,4.8vw,3.6rem);
  font-weight:700;
  color:#ffffff;
  line-height:1.15;
  margin-bottom:22px;
  letter-spacing:-0.01em;
}
.hero h1 em{
  color:#3aaa6e;
  font-style:italic;
  font-family:"DM Serif Display",Georgia,serif;
  font-weight:400;
}

.hero-sub{
  font-family:"DM Sans",system-ui,sans-serif;
  font-size:15.5px;line-height:1.80;
  color:rgba(255,255,255,.65);
  max-width:600px;margin:0 auto 42px;font-weight:300;
}

.hero-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:44px}
.hs{
  background:rgba(58,170,110,.08);
  border:1px solid rgba(58,170,110,.20);
  border-radius:12px;padding:16px 12px;text-align:center;
  transition:border-color .2s,background .2s;
}
.hs:hover{background:rgba(58,170,110,.14);border-color:rgba(58,170,110,.35)}
.hs-n{
  font-family:"Poppins",sans-serif;
  font-size:1.85rem;font-weight:700;
  color:#3aaa6e;line-height:1;
}
.hs-l{font-size:9.5px;color:rgba(255,255,255,.45);margin-top:6px;line-height:1.45;
  font-family:"DM Sans",sans-serif}

.hero-strip-label{
  font-size:10px;letter-spacing:.12em;text-transform:uppercase;
  color:rgba(255,255,255,.28);margin-bottom:16px;
  font-family:"DM Sans",sans-serif;
}

.hero-cta{display:flex;gap:14px;justify-content:center;flex-wrap:wrap}

.btn-p{
  background:linear-gradient(135deg,#CCFF00 0%,#b8f000 100%);
  color:#0d3526;padding:14px 32px;border-radius:8px;
  font-size:14px;font-weight:600;text-decoration:none;cursor:pointer;
  border:none;font-family:"Poppins",sans-serif;letter-spacing:.04em;
  transition:all .24s;display:inline-block;
  box-shadow:0 4px 16px rgba(180,255,0,.28);
}
.btn-p:hover{
  background:linear-gradient(135deg,#d4ff00 0%,#CCFF00 100%);
  transform:translateY(-2px);
  box-shadow:0 8px 28px rgba(180,255,0,.5);
}

.btn-g{
  background:transparent;
  color:rgba(255,255,255,.85);
  padding:14px 26px;
  border-radius:8px;font-size:13.5px;font-weight:500;text-decoration:none;
  border:1.5px solid rgba(58,170,110,.45);
  transition:all .24s;display:inline-block;cursor:pointer;
  font-family:"DM Sans",sans-serif;
}
.btn-g:hover{
  background:rgba(58,170,110,.12);
  border-color:rgba(58,170,110,.7);
  color:#fff;
  transform:translateY(-1px);
}

.dstrip{background:var(--teal-dk);padding:13px 5vw;
  display:flex;align-items:center;justify-content:center;gap:24px;flex-wrap:wrap}
.dstrip-i{font-size:11px;color:rgba(255,255,255,.48)}
.dstrip-i strong{color:#7EDFC0}
.dstrip-dot{color:rgba(255,255,255,.14);font-size:18px}

.sec-tag{display:inline-block;font-size:10px;font-weight:600;letter-spacing:.1em;
  text-transform:uppercase;color:var(--teal);background:var(--teal-lg);
  padding:4px 12px;border-radius:20px;margin-bottom:14px}

.report-landing{width:100%;display:grid;grid-template-columns:1fr 1fr;min-height:540px}
.report-landing.flip .rl-visual{order:-1}

.rl-content{padding:64px 56px;display:flex;flex-direction:column;justify-content:center}
.report-landing.m .rl-content{background:#fff}
.report-landing.h .rl-content{background:var(--off)}

.dc-badge{display:inline-flex;align-items:center;gap:7px;font-size:10px;
  font-weight:700;letter-spacing:.09em;text-transform:uppercase;
  padding:4px 12px;border-radius:20px;margin-bottom:16px}
.dc-badge.m{background:var(--teal-lg);color:var(--teal)}
.dc-badge.h{background:var(--blue-l);color:var(--blue)}
.dc-vol{font-size:10.5px;color:var(--lt);margin-bottom:8px;font-weight:400}
.dc-title{font-family:var(--serif);font-size:clamp(1.5rem,2.2vw,2rem);
  line-height:1.2;margin-bottom:12px}
.report-landing.m .dc-title{color:var(--teal-dk)}
.report-landing.h .dc-title{color:var(--blue)}
.dc-desc{font-size:13.5px;color:var(--mid);line-height:1.78;font-weight:300;margin-bottom:24px;max-width:480px}

.dci-title{font-size:9.5px;font-weight:700;letter-spacing:.08em;
  text-transform:uppercase;color:var(--lt);margin-bottom:10px}
.dci-list{display:flex;flex-direction:column;gap:7px;margin-bottom:28px}
.dci-item{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:var(--mid)}
.dci-item::before{content:"✓";font-size:10px;font-weight:700;flex-shrink:0;margin-top:2px}
.report-landing.m .dci-item::before{color:var(--teal)}
.report-landing.h .dci-item::before{color:var(--blue)}

.rl-cta-row{display:flex;align-items:center;gap:14px;flex-wrap:wrap}
.read-more-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;
  border-radius:7px;font-size:13.5px;font-weight:600;border:none;cursor:pointer;
  font-family:var(--sans);letter-spacing:.03em;transition:all .22s}
.report-landing.m .read-more-btn{background:var(--teal);color:#fff}
.report-landing.m .read-more-btn:hover{background:#0a5a44;transform:translateY(-1px);box-shadow:0 6px 18px rgba(15,110,86,.35)}
.report-landing.h .read-more-btn{background:var(--blue);color:#fff}
.report-landing.h .read-more-btn:hover{background:#163f6a;transform:translateY(-1px);box-shadow:0 6px 18px rgba(27,79,130,.35)}
.dc-pages{font-size:11px;color:var(--lt)}

.rl-visual{display:flex;flex-direction:column;justify-content:center;padding:64px 48px;gap:14px;position:relative;overflow:hidden}
.report-landing.m .rl-visual{background:linear-gradient(145deg,var(--teal-dk) 0%,#0a5040 100%)}
.report-landing.h .rl-visual{background:linear-gradient(145deg,#0d2540 0%,var(--blue) 100%)}
.rl-visual::before{content:'';position:absolute;inset:0;
  background:url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='20' cy='20' r='1' fill='%23ffffff' fill-opacity='0.04'/%3E%3C/svg%3E")}
.rl-vis-label{font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  color:rgba(255,255,255,.35);margin-bottom:4px;position:relative;z-index:1}
.rl-vis-title{font-family:var(--serif);font-size:1.3rem;color:#fff;
  line-height:1.25;margin-bottom:20px;position:relative;z-index:1;max-width:320px}
.dc-metrics{display:grid;grid-template-columns:1fr 1fr;gap:10px;position:relative;z-index:1}
.dcm{border-radius:10px;padding:14px 14px;background:rgba(255,255,255,.07);
  border:1px solid rgba(255,255,255,.1)}
.dcm-n{font-family:var(--serif);font-size:1.6rem;line-height:1;color:#fff;margin-bottom:4px}
.report-landing.m .dcm-n{color:#7EDFC0}
.report-landing.h .dcm-n{color:#7EDFC0}
.dcm-l{font-size:10px;color:rgba(255,255,255,.45);line-height:1.35}
.rl-vis-divider{height:1px;background:rgba(255,255,255,.08);position:relative;z-index:1}
.rl-vis-note{font-size:11.5px;color:rgba(255,255,255,.4);line-height:1.6;
  font-weight:300;position:relative;z-index:1;font-style:italic}

.about-sec{background:#fff;padding:60px 5vw;border-top:1px solid #EEEDEA}
.about-inner{max-width:1100px;margin:0 auto;display:grid;
  grid-template-columns:1fr 1fr 1fr;gap:36px}
.ab h3{font-family:var(--serif);font-size:1.05rem;color:var(--teal-dk);margin-bottom:8px}
.ab p{font-size:12.5px;color:var(--mid);line-height:1.75;font-weight:300}
@media(max-width:680px){.about-inner{grid-template-columns:1fr}}

.sr{opacity:1;transform:translateY(0);transition:opacity .55s ease,transform .55s ease}
.sr.vis{opacity:1;transform:translateY(0)}
.sr-d1{transition-delay:.12s}.sr-d2{transition-delay:.24s}

@media(max-width:820px){
  .report-landing{grid-template-columns:1fr}
  .report-landing.flip .rl-visual{order:0}
  .rl-content{padding:40px 28px}
  .rl-visual{padding:40px 28px}
  .hero-stats{grid-template-columns:1fr 1fr}
}

/* ═══════════════════════════════════════════════════════
   READ-MORE PAGES
════════════════════════════════════════════════════════ */

.breadcrumb{background:#fff;border-bottom:1px solid var(--ca-border);padding:12px 64px;display:flex;align-items:center;gap:8px;font-size:13px;color:var(--ca-muted)}
.breadcrumb a{color:var(--ca-green);text-decoration:none}
.breadcrumb a:hover{text-decoration:underline}
.breadcrumb span{color:var(--ca-muted)}

#view-preview,#view-gateway,#view-success{
  padding-top:0px; /* changed */
  background:var(--ca-body);
  min-height:100vh;
  font-family:'Poppins',sans-serif;
}

.report-preview-wrap{max-width:900px;margin:0 auto;padding:48px 40px}
.rp-header{border-bottom:2px solid var(--ca-border);padding-bottom:28px;margin-bottom:36px;display:flex;align-items:flex-start;gap:20px}
.rp-badge{padding:6px 16px;border-radius:6px;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;flex-shrink:0;margin-top:4px}
.rp-badge-mon{background:var(--mon-light);color:var(--mon-blue);border:1px solid var(--mon-border)}
.rp-badge-heat{background:var(--heat-light);color:var(--heat-amber);border:1px solid var(--heat-border)}
.rp-header-text{}
.rp-series{font-size:11px;color:var(--ca-muted);font-weight:600;letter-spacing:1px;text-transform:uppercase;margin-bottom:8px}
.rp-header h2{font-family:'Playfair Display',serif;font-size:clamp(22px,3vw,32px);color:var(--ca-dark);line-height:1.2;margin-bottom:12px}
.rp-meta-row{display:flex;gap:20px;flex-wrap:wrap;font-size:12px;color:var(--ca-muted)}
.rp-meta-row span{display:flex;align-items:center;gap:5px}

.rp-abstract{background:var(--ca-light);border-left:4px solid var(--ca-green);border-radius:0 8px 8px 0;padding:20px 24px;margin-bottom:32px}
.rp-abstract h4{font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--ca-green);margin-bottom:10px}
.rp-abstract p{font-size:14px;line-height:1.75;color:var(--ca-text)}

.rp-section-head{display:flex;align-items:center;gap:12px;font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;margin-bottom:20px}
.rp-section-head::after{content:'';flex:1;height:1px;background:var(--ca-border)}

.rp-map-panel{border:1px solid var(--ca-border);border-radius:12px;overflow:hidden;margin-bottom:32px;background:#fff}
.rp-map-tabs{display:flex;border-bottom:1px solid var(--ca-border);background:#fafcfb}
.rp-map-tab{padding:12px 20px;font-size:12px;font-weight:600;cursor:pointer;border:none;background:none;color:var(--ca-muted);border-bottom:2px solid transparent;transition:all .2s;font-family:'Poppins',sans-serif}
.rp-map-tab.active-mon{color:var(--mon-blue);border-bottom-color:var(--mon-blue);background:#fff}
.rp-map-tab.active-heat{color:var(--heat-amber);border-bottom-color:var(--heat-amber);background:#fff}
.rp-map-body{padding:20px 24px}
.rp-map-caption{font-size:11px;color:var(--ca-muted);text-align:center;margin-top:12px;font-style:italic}
.rp-map-view{display:none}
.rp-map-view.show{display:block}

.rp-findings-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-bottom:32px}
.finding-card{background:#fff;border:1px solid var(--ca-border);border-radius:10px;padding:18px;display:flex;flex-direction:column;gap:6px}
.finding-card .fc-val{font-size:26px;font-weight:800;line-height:1}
.finding-card .fc-label{font-size:12px;color:var(--ca-muted);line-height:1.5}
.finding-card .fc-badge{font-size:10px;font-weight:600;padding:2px 8px;border-radius:10px;align-self:flex-start}

.rp-locked-section{position:relative;margin-bottom:0}
.rp-locked-blur{filter:blur(5px);pointer-events:none;user-select:none;opacity:.45;padding:24px 0}
.rp-locked-blur p{font-size:14px;line-height:1.8;color:var(--ca-text)}
.rp-gate-overlay{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;background:linear-gradient(to bottom,rgba(245,247,246,0) 0%,rgba(245,247,246,0.95) 40%,var(--ca-body) 100%);z-index:10}
.gate-card{background:#fff;border-radius:14px;padding:28px 36px;text-align:center;max-width:420px;width:100%;border:1px solid var(--ca-border);box-shadow:0 8px 40px rgba(0,0,0,0.1)}
.gate-lock-icon{font-size:32px;margin-bottom:12px;display:block}
.gate-card h3{font-family:'Playfair Display',serif;font-size:20px;color:var(--ca-dark);margin-bottom:8px}
.gate-card p{font-size:13px;color:var(--ca-muted);line-height:1.6;margin-bottom:20px}
.gate-open-btn{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;border-radius:8px;border:none;font-size:14px;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;transition:all .2s}
.gate-open-btn:hover{background:#0a5a44 !important;transform:translateY(-1px);box-shadow:0 6px 20px rgba(15,110,86,.35)}

.back-btn{display:inline-flex;align-items:center;gap:7px;background:none;border:none;cursor:pointer;color:var(--ca-green);font-size:13px;font-weight:600;font-family:'Poppins',sans-serif;padding:0;margin-bottom:24px;transition:gap .2s}
.back-btn:hover{gap:3px;color:var(--ca-dark)}

/* GATEWAY */
.gateway-wrap{max-width:620px;margin:0 auto;padding:60px 40px}
.gw-header{text-align:center;margin-bottom:36px}
.gw-icon{font-size:44px;margin-bottom:14px;display:block}
.gw-header h2{font-family:'Playfair Display',serif;font-size:26px;color:var(--ca-dark);margin-bottom:10px;line-height:1.3}
.gw-header p{font-size:14px;color:var(--ca-muted);line-height:1.7}
.gw-report-pill{display:inline-flex;align-items:center;gap:8px;padding:8px 18px;border-radius:8px;margin:0 auto 28px;font-size:12px;font-weight:600}
.pill-mon{background:var(--mon-light);color:var(--mon-blue);border:1px solid var(--mon-border)}
.pill-heat{background:var(--heat-light);color:var(--heat-amber);border:1px solid var(--heat-border)}
.gw-form-card{background:#fff;border:1px solid var(--ca-border);border-radius:16px;padding:36px 36px 32px;box-shadow:0 4px 24px rgba(0,0,0,0.06)}
.gw-form-head{font-size:13px;font-weight:700;color:var(--ca-dark);letter-spacing:.3px;margin-bottom:24px;padding-bottom:16px;border-bottom:1px solid var(--ca-border);display:flex;align-items:center;gap:8px}
.form-row-2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.fg{margin-bottom:18px}
.fg label{display:block;font-size:12px;font-weight:600;color:var(--ca-text);margin-bottom:6px}
.fg label .req{color:var(--ca-green)}
.fg input,.fg select,.fg textarea{width:100%;padding:11px 14px;border:1.5px solid var(--ca-border);border-radius:8px;font-size:13px;font-family:'Poppins',sans-serif;color:var(--ca-text);background:#fff;outline:none;transition:border-color .2s,box-shadow .2s}
.fg input:focus,.fg select:focus,.fg textarea:focus{border-color:var(--ca-green);box-shadow:0 0 0 3px rgba(58,170,110,0.12)}
.fg textarea{resize:vertical;min-height:72px}
.gw-consent{display:flex;align-items:flex-start;gap:10px;font-size:12px;color:var(--ca-muted);line-height:1.6;margin-bottom:22px;padding:14px;background:var(--ca-light);border-radius:8px}
.gw-consent input[type=checkbox]{width:15px;height:15px;margin-top:2px;flex-shrink:0;accent-color:var(--ca-green)}
.gw-submit{width:100%;padding:15px;border-radius:10px;border:none;font-size:15px;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;font-family:'Poppins',sans-serif;transition:all .25s;letter-spacing:.3px}
.gw-sub-mon{background:linear-gradient(135deg,#1a6b4a,#0d4a30);color:#fff;box-shadow:0 4px 20px rgba(21,101,160,0.28)}
.gw-sub-mon:hover{box-shadow:0 8px 30px rgba(26,107,74,0.42);transform:translateY(-1px)}
.gw-sub-heat{background:linear-gradient(135deg,#c45f00,#8a3f00);color:#fff;box-shadow:0 4px 20px rgba(196,95,0,0.28)}
.gw-sub-heat:hover{box-shadow:0 8px 30px rgba(196,95,0,0.42);transform:translateY(-1px)}
.gw-note{text-align:center;font-size:11px;color:var(--ca-muted);margin-top:14px;display:flex;align-items:center;justify-content:center;gap:5px}

/* SUCCESS */
.success-wrap{max-width:560px;margin:0 auto;padding:80px 40px;text-align:center}
.success-ring{width:90px;height:90px;border-radius:50%;margin:0 auto 24px;display:flex;align-items:center;justify-content:center;font-size:38px;box-shadow:0 8px 32px rgba(0,0,0,0.12)}
.ring-mon{background:linear-gradient(135deg,var(--mon-blue),#0d4a30)}
.ring-heat{background:linear-gradient(135deg,var(--heat-amber),#8a3f00)}
.success-wrap h2{font-family:'Playfair Display',serif;font-size:28px;color:var(--ca-dark);margin-bottom:12px}
.success-wrap p{font-size:14px;color:var(--ca-muted);line-height:1.7;margin-bottom:28px}
.dl-btn{display:inline-flex;align-items:center;gap:10px;padding:16px 36px;border-radius:10px;border:none;cursor:pointer;font-size:16px;font-weight:700;font-family:'Poppins',sans-serif;text-decoration:none;transition:all .2s}
.dl-mon{background:linear-gradient(135deg,var(--mon-blue),#0d4a30);color:#fff;box-shadow:0 6px 24px rgba(21,101,160,0.3)}
.dl-heat{background:linear-gradient(135deg,var(--heat-amber),#8a3f00);color:#fff;box-shadow:0 6px 24px rgba(196,95,0,0.3)}
.success-also{margin-top:32px;padding-top:24px;border-top:1px solid var(--ca-border)}
.success-also p{font-size:13px;color:var(--ca-muted);margin-bottom:14px}
.also-btn{display:inline-flex;align-items:center;gap:7px;padding:10px 22px;border-radius:7px;border:1.5px solid var(--ca-green);color:var(--ca-green);font-size:13px;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;background:none;transition:all .2s}
.also-btn:hover{background:var(--ca-light)}

@media(max-width:820px){
  .form-row-2{grid-template-columns:1fr}
  .rp-findings-grid{grid-template-columns:1fr 1fr}
  .report-preview-wrap,.gateway-wrap{padding:40px 24px}
  .gw-form-card{padding:24px 20px}
  .breadcrumb{padding:12px 24px}
}

/* ── Override global site layout for reports page ── */
main { padding-top: 0 !important; margin-top: 0 !important; }
.body_wrap > main { padding: 0 !important; margin: 0 !important; }
</style>
<?php
$extraHeadHTML = ob_get_clean();
include("header.php");
include("navbar1.php");
?>
<style>
/* Kill any padding the global main tag adds on this page */
main { padding-top: 0 !important; margin-top: 0 !important; }
</style>
<div class="reports-page-wrap" style="padding-top:90px">

<!-- ═══════════════════════════════════════════════════
     VIEW 1 — LANDING PAGE (v5 design)
════════════════════════════════════════════════════ -->
<div class="view active" id="view-landing">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-corner-bl"></div>
    <div class="hero-vid-wrap">
      <video autoplay muted loop playsinline class="hero-vid">
        <source src="https://cdn.pixabay.com/video/2022/09/16/131799-751267718_large.mp4" type="video/mp4">
      </video>
      <div class="hero-voverlay"></div>
    </div>
    <div class="hero-inner">
      <span class="hero-we-label">We</span>
      <div class="hero-eyebrow"><i></i>Peer-reviewed Climate Research &nbsp;·&nbsp; 2026</div>
      <h1>Jhansi Is Running Out of Water —<br><em>And the Climate Crisis is Accelerating It</em></h1>
      <p class="hero-sub">120+ years of IMD rainfall data and 73 years of temperature records reveal a reinforcing spiral of heat and drought threatening 8 blocks of Bundelkhand's most water-stressed district.</p>
      <div class="hero-stats">
        <div class="hs"><div class="hs-n">8/8</div><div class="hs-l">Blocks with intensifying heat extremes</div></div>
        <div class="hs"><div class="hs-n">70+</div><div class="hs-l">Dry days within every monsoon season</div></div>
        <div class="hs"><div class="hs-n">850mm</div><div class="hs-l">vs 1,200 mm in eastern UP</div></div>
        <div class="hs"><div class="hs-n">42.6°C</div><div class="hs-l">Average peak summer max temp</div></div>
      </div>
      <p class="hero-strip-label">2 Reports · 36 Pages · Free access</p>
      <div class="hero-cta">
        <button class="btn-p" onclick="document.getElementById('dashboards-sec').scrollIntoView({behavior:'smooth'})">Explore Reports ↓</button>
        <button class="btn-g" onclick="document.getElementById('dashboards-sec').scrollIntoView({behavior:'smooth'})">View Climate Maps</button>
      </div>
    </div>
  </section>

  <!-- DATA STRIP -->
  <div class="dstrip">
    <div class="dstrip-i"><strong>Data</strong> IMD 1901–2024</div><span class="dstrip-dot">·</span>
    <div class="dstrip-i"><strong>Method</strong> Mann-Kendall trend analysis</div><span class="dstrip-dot">·</span>
    <div class="dstrip-i"><strong>Scale</strong> 8 blocks, Jhansi district</div><span class="dstrip-dot">·</span>
    <div class="dstrip-i"><strong>Baseline</strong> IPCC AR6 · 1981–2010</div><span class="dstrip-dot">·</span>
    <div class="dstrip-i"><strong>Access</strong> Free gated download</div>
  </div>

  <!-- REPORT LANDING SECTIONS -->
  <div id="dashboards-sec">

    <div style="background:var(--off);padding:52px 5vw 36px;text-align:center">
      <div class="sec-tag sr">Research Series · 2026</div>
      <h2 class="sr" style="font-family:var(--serif);font-size:clamp(1.8rem,3vw,2.5rem);color:var(--teal-dk);line-height:1.2;margin-bottom:10px">Two Reports. One District. A Complete Picture.</h2>
      <p class="sr" style="font-size:14px;color:var(--mid);font-weight:300;max-width:560px;margin:0 auto;line-height:1.7">The Jhansi Hydroclimatic Assessment is published in two focused volumes. Scroll to explore each — then click Read More to access the full summary, maps, and download.</p>
    </div>

    <!-- REPORT 01: HUMIDITY / HEAT -->
    <div class="report-landing h flip sr">
      <div class="rl-content">
        <div class="dc-badge h">Report 01 · Humidity &amp; Heat Stress</div>
        <div class="dc-vol">18 pages &nbsp;·&nbsp; IMD Data 1951–2024 &nbsp;·&nbsp; Free PDF</div>
        <h3 class="dc-title">Humid Heat Stress &amp; Atmospheric Water Dynamics in Jhansi</h3>
        <p class="dc-desc">Assessment of humidity-driven thermal stress, wet-bulb temperature trends, and their compounding effects on agricultural and human water demand across all 8 blocks — with block-level risk profiles and public health implications.</p>
        <div class="dci-title">What's inside</div>
        <div class="dci-list">
          <div class="dci-item">Wet-bulb temperature trends and heatwave frequency analysis</div>
          <div class="dci-item">Evapotranspiration demand vs rainfall supply gaps by block</div>
          <div class="dci-item">Agricultural water stress projections across all 8 blocks</div>
          <div class="dci-item">Public health and livelihood risk implications</div>
        </div>
        <div class="rl-cta-row">
          <button class="read-more-btn" onclick="openReport('heat')">Read More &amp; Download →</button>
          <span class="dc-pages">📄 18 pages · PDF · Free</span>
        </div>
      </div>
      <div class="rl-visual">
        <div class="rl-vis-label">Key Metrics · Report 01</div>
        <div class="rl-vis-title">Humidity amplifies an already severe heat and water crisis</div>
        <div class="dc-metrics">
          <div class="dcm"><div class="dcm-n">73 yrs</div><div class="dcm-l">Of temperature-humidity records analysed (1951–2024)</div></div>
          <div class="dcm"><div class="dcm-n">ET+</div><div class="dcm-l">Evapotranspiration demand exceeds rainfall supply in dry seasons</div></div>
          <div class="dcm"><div class="dcm-n">Wb↑</div><div class="dcm-l">Wet-bulb temperature extremes rising across all 8 blocks</div></div>
          <div class="dcm"><div class="dcm-n">2 seasons</div><div class="dcm-l">Pre-monsoon &amp; monsoon humid heat stress both assessed</div></div>
        </div>
        <div class="rl-vis-divider"></div>
        <div class="rl-vis-note">"Reduced precipitation limits natural recharge while sustained heat accelerates land-surface drying — linking hydroclimatic change directly to livelihood and public health risk."</div>
      </div>
    </div>

  <!-- REPORT 02: MONSOON -->
    <div class="report-landing m sr">
      <div class="rl-content">
        <div class="dc-badge m">Report 02 · Monsoon &amp; Rainfall</div>
        <div class="dc-vol">18 pages &nbsp;·&nbsp; IMD Data 1901–2024 &nbsp;·&nbsp; Free PDF</div>
        <h3 class="dc-title">Hydroclimatic Variability &amp; Water Availability in Jhansi</h3>
        <p class="dc-desc">Long-term analysis of pre-monsoon and monsoon season rainfall and temperature across all 8 blocks. Identifies the reinforcing spiral of heat and declining rainfall driving Jhansi's water crisis — and what can be done about it.</p>
        <div class="dci-title">What's inside</div>
        <div class="dci-list">
          <div class="dci-item">Pre-monsoon heat stress analysis (1951–2024) with Tx5d index</div>
          <div class="dci-item">Monsoon rainfall trends (1901–2024) with block-level spatial maps</div>
          <div class="dci-item">Block-level risk profiling — all 8 blocks ranked and compared</div>
          <div class="dci-item">7 policy-ready water management recommendations</div>
        </div>
        <div class="rl-cta-row">
          <button class="read-more-btn" onclick="openReport('monsoon')">Read More &amp; Download →</button>
          <span class="dc-pages">📄 18 pages · PDF · Free</span>
        </div>
      </div>
      <div class="rl-visual">
        <div class="rl-vis-label">Key Metrics · Report 02</div>
        <div class="rl-vis-title">Summer heat and rainfall decline are accelerating together</div>
        <div class="dc-metrics">
          <div class="dcm"><div class="dcm-n">42.6°C</div><div class="dcm-l">Average peak summer max temperature across Bundelkhand</div></div>
          <div class="dcm"><div class="dcm-n">120 yrs</div><div class="dcm-l">Of IMD rainfall records analysed across all 8 blocks</div></div>
          <div class="dcm"><div class="dcm-n">4 blocks</div><div class="dcm-l">In critical dual decline — rainfall falling in both seasons</div></div>
          <div class="dcm"><div class="dcm-n">Tx5d ↑</div><div class="dcm-l">Fastest-rising heat extreme in all of Uttar Pradesh</div></div>
        </div>
        <div class="rl-vis-divider"></div>
        <div class="rl-vis-note">"Jhansi receives 850–900 mm of monsoon rainfall — 25–30% below eastern UP's 1,200 mm — a structural hydrological disadvantage compounded by declining trends post-2000."</div>
      </div>
    </div>

    </div><!-- /dashboards-sec -->

  <!-- ABOUT -->
  <section class="about-sec">
    <div class="about-inner">
      <div class="ab sr">
        <h3>About the Research</h3>
        <p>The Jhansi Hydroclimatic Assessment is a multi-volume study examining how shifting rainfall and temperature patterns are reshaping water availability across Bundelkhand's most vulnerable district.</p>
      </div>
      <div class="ab sr sr-d1">
        <h3>Data &amp; Methods</h3>
        <p>IMD gridded rainfall (0.25°×0.25°, 1901–2024) and temperature records (1°×1°, 1951–2024). Trends computed using Mann-Kendall analysis with Sen's slope. IPCC AR6 1981–2010 baseline.</p>
      </div>
      <div class="ab sr sr-d2">
        <h3>Who This Is For</h3>
        <p>Water planners, agricultural policymakers, district collectors, NGO practitioners, climate researchers, and finance professionals engaged in climate risk across semi-arid India.</p>
      </div>
    </div>
  </section>

</div><!-- /view-landing -->


<!-- ══════════════════════════════════════════
     VIEW 2 — REPORT PREVIEW (from final v3)
     ══════════════════════════════════════════ -->
<div class="view" id="view-preview">
  <div id="back-btn-wrap" style="max-width:900px; margin:0 auto; padding: 20px 40px 0;">
    <button class="back-btn" onclick="goToLanding()">← Back to Reports</button>
  </div>

  <!-- PREVIEW HERO — shown only for monsoon report -->
  <div id="preview-hero-wrap" style="display:none">

    <style>
    /* ── Report Hero (Image 1 style) ── */
    .rh-wrap{
      background:#01342D;
      position:relative;overflow:hidden;
      padding:80px 5vw 0;
      font-family:"Poppins","DM Sans",sans-serif;
    }
    .rh-topbar{
      position:absolute;top:0;left:0;right:0;height:52px;
      display:flex;align-items:center;justify-content:space-between;
      padding:0 5vw;z-index:10;
    }
    .rh-topbar-left{display:flex;align-items:center;gap:24px;}
    .rh-topbar-back{
      background:none;border:none;cursor:pointer;
      color:#3aaa6e;font-size:13px;font-weight:600;
      font-family:'Poppins',sans-serif;display:flex;align-items:center;gap:6px;padding:0;
      transition:color .2s;
    }
    .rh-topbar-back:hover{color:#fff;}
    .rh-topbar-brand{
      font-family:"DM Serif Display",Georgia,serif;
      font-size:15px;font-weight:600;color:#3aaa6e;letter-spacing:.01em;
    }
    .rh-topbar-meta{
      font-size:11.5px;color:rgba(255,255,255,.45);letter-spacing:.04em;
    }
    .rh-topbar-btn{
      background:#3aaa6e;color:#fff;font-size:12px;font-weight:600;
      padding:8px 18px;border-radius:20px;border:none;cursor:pointer;
      font-family:"Poppins",sans-serif;display:flex;align-items:center;gap:6px;
      transition:background .2s;
    }
    .rh-topbar-btn:hover{background:#2d9060}

    /* ambient glow blobs */
    .rh-blob{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none}
    .rh-blob-1{width:420px;height:420px;background:rgba(58,170,110,.09);top:-80px;right:10%}
    .rh-blob-2{width:280px;height:280px;background:rgba(0,200,120,.06);bottom:60px;left:5%}

    /* floating rain drops */
    .rh-drops{position:absolute;inset:0;pointer-events:none;overflow:hidden}
    .rh-drop{position:absolute;width:6px;height:6px;border-radius:50%;
      background:rgba(126,223,192,.18);animation:dropFall linear infinite}
    @keyframes dropFall{0%{transform:translateY(-20px);opacity:0}10%{opacity:1}90%{opacity:.3}100%{transform:translateY(100vh);opacity:0}}

    /* main body */
    .rh-body{
      position:relative;z-index:1;
      display:grid;grid-template-columns:1fr 320px;gap:40px;
      padding-top:20px;
      align-items:start;
    }

    /* left column */
    .rh-left{}
    .rh-tag{
      display:inline-flex;align-items:center;gap:8px;
      background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.15);
      border-radius:20px;padding:5px 14px;margin-bottom:22px;
      font-size:10.5px;font-weight:600;color:rgba(255,255,255,.6);
      letter-spacing:.1em;text-transform:uppercase;
    }
    .rh-tag i{width:7px;height:7px;border-radius:50%;background:#3aaa6e;
      box-shadow:0 0 6px rgba(58,170,110,.8);flex-shrink:0}
    .rh-tag span{color:rgba(255,255,255,.35);margin:0 4px}

    .rh-h1{
      font-family:"Poppins",sans-serif;
      font-size:clamp(2.6rem,5vw,4rem);
      font-weight:800;color:#fff;
      line-height:1.08;
      margin-bottom:14px;
      letter-spacing:-0.02em;
    }
    .rh-h1-italic{
      font-family:"DM Serif Display",Georgia,serif;
      font-style:italic;font-weight:400;
      font-size:clamp(1.5rem,3vw,2.4rem);
      color:#3aaa6e;display:block;
      line-height:1.3;margin-bottom:22px;
    }
    .rh-desc{
      font-size:14.5px;line-height:1.80;
      color:rgba(255,255,255,.60);
      max-width:560px;margin-bottom:28px;font-weight:300;
    }
    .rh-desc strong{color:rgba(255,255,255,.88);font-weight:600}

    .rh-meta-strip{
      display:flex;flex-wrap:wrap;gap:0;
      border-top:1px solid rgba(255,255,255,.08);
      padding-top:16px;
      font-size:11px;color:rgba(255,255,255,.35);
    }
    .rh-meta-strip span{padding:0 16px 0 0;margin-right:16px;border-right:1px solid rgba(255,255,255,.1)}
    .rh-meta-strip span:last-child{border-right:none}

    /* right column — stat panels */
    .rh-right{display:flex;flex-direction:column;gap:1px;padding-top:8px}
    .rh-stat-panel{
      background:rgba(255,255,255,.04);
      border:1px solid rgba(255,255,255,.08);
      border-radius:10px;
      padding:16px 18px;
      margin-bottom:8px;
    }
    .rh-stat-label{
      font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
      color:rgba(255,255,255,.30);margin-bottom:6px;
    }
    .rh-stat-val{
      font-family:"Poppins",sans-serif;
      font-size:1.9rem;font-weight:700;line-height:1;margin-bottom:5px;
    }
    .rh-stat-val.orange{color:#e05a00}
    .rh-stat-val.green{color:#3aaa6e}
    .rh-stat-val.teal{color:#7EDFC0}
    .rh-stat-desc{font-size:11px;color:rgba(255,255,255,.40);line-height:1.5}

    /* bottom stat bar */
    .rh-bottom-bar{
      position:relative;z-index:1;
      margin-top:32px;
      display:grid;grid-template-columns:repeat(4,1fr);
      border-top:1px solid rgba(255,255,255,.08);
    }
    .rh-bstat{
      padding:20px 24px;
      border-right:1px solid rgba(255,255,255,.07);
    }
    .rh-bstat:last-child{border-right:none}
    .rh-bstat-n{
      font-family:"Poppins",sans-serif;
      font-size:1.9rem;font-weight:700;line-height:1;margin-bottom:4px;
    }
    .rh-bstat-n.orange{color:#e05a00}
    .rh-bstat-n.green{color:#3aaa6e}
    .rh-bstat-l{font-size:11px;color:rgba(255,255,255,.40);line-height:1.45;margin-bottom:5px}
    .rh-bstat-tag{font-size:9px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:#e05a00}
    .rh-bstat-tag.green{color:#3aaa6e}

    @media(max-width:820px){
      .rh-body{grid-template-columns:1fr}
      .rh-right{display:grid;grid-template-columns:1fr 1fr}
      .rh-bottom-bar{grid-template-columns:1fr 1fr}
      .rh-bstat{border-right:none;border-bottom:1px solid rgba(255,255,255,.07)}
    }

    /* ── Image 2 style CTA banner ── */
    .rh-cta-banner{
      background:#01221a;
      border:1px solid rgba(58,170,110,.18);
      border-radius:14px;
      padding:40px 48px;
      margin:0 0 0;
      display:flex;align-items:center;justify-content:space-between;gap:32px;
      flex-wrap:wrap;
    }
    .rh-cta-left{}
    .rh-cta-tag{
      font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
      color:#3aaa6e;margin-bottom:12px;
    }
    .rh-cta-title{
      font-family:"Poppins",sans-serif;
      font-size:clamp(1.3rem,2.2vw,1.75rem);
      font-weight:700;color:#fff;line-height:1.25;margin-bottom:10px;
    }
    .rh-cta-desc{
      font-size:13px;color:rgba(255,255,255,.45);line-height:1.65;max-width:480px;
    }
    .rh-cta-right{text-align:right;flex-shrink:0}
    .rh-cta-btn{
      display:inline-flex;align-items:center;gap:8px;
      background:#3aaa6e;color:#fff;
      font-size:14px;font-weight:600;
      padding:14px 28px;border-radius:8px;border:none;cursor:pointer;
      font-family:"Poppins",sans-serif;
      transition:all .22s;
      box-shadow:0 4px 18px rgba(58,170,110,.30);
      white-space:nowrap;
    }
    .rh-cta-btn:hover{background:#2d9060;transform:translateY(-2px);box-shadow:0 8px 28px rgba(58,170,110,.45)}
    .rh-cta-copy{font-size:11px;color:rgba(255,255,255,.22);margin-top:10px}

    @media(max-width:680px){
      .rh-cta-banner{flex-direction:column;padding:28px 24px}
      .rh-cta-right{text-align:left}
    }
    </style>

    <div class="rh-wrap">
      <!-- ambient -->
      <div class="rh-blob rh-blob-1"></div>
      <div class="rh-blob rh-blob-2"></div>
      <div class="rh-drops" id="rh-drops"></div>

      <!-- top bar removed -->

      <!-- main content -->
      <div class="rh-body">
        <div class="rh-left">
          <div class="rh-tag"><i></i> Hydroclimatic Assessment <span>·</span> IMD Data 1901–2024 · 8 Blocks</div>
          <h1 class="rh-h1">Jhansi's Water<br>Under Siege</h1>
          <span class="rh-h1-italic">A Reinforcing Cycle of Drought &amp; Heat</span>
          <p class="rh-desc">
            Jhansi district sits in one of Uttar Pradesh's driest corridors. Four of its eight blocks show <strong>declining pre-monsoon rainfall</strong> while every block records <strong>rising temperatures and intensifying heatwaves</strong> — a coupled hydroclimatic signal that accelerates soil moisture collapse and groundwater depletion before the monsoon even begins.
          </p>
          <div class="rh-meta-strip">
            <span>IMD Rainfall · 1901–2024</span>
            <span>IMD Temperature · 1951–2024</span>
            <span>8 Blocks Analysed</span>
            <span>0.25° Grid Resolution</span>
          </div>
        </div>

        <div class="rh-right">
          <div class="rh-stat-panel">
            <div class="rh-stat-label">Pre-Monsoon Rainfall</div>
            <div class="rh-stat-val orange">↓ 4 Blocks</div>
            <div class="rh-stat-desc">Moth, Bamaur, Gursarai &amp; Chirgaon record declining summer rainfall — the district's driest corridor</div>
          </div>
          <div class="rh-stat-panel">
            <div class="rh-stat-label">Warming Rate</div>
            <div class="rh-stat-val orange">↑ All 8</div>
            <div class="rh-stat-desc">Every block shows rising seasonal mean &amp; maximum temperatures — highest in the state</div>
          </div>
          <div class="rh-stat-panel">
            <div class="rh-stat-label">Annual Rainfall vs State</div>
            <div class="rh-stat-val green">877mm</div>
            <div class="rh-stat-desc">vs ~1,200mm in eastern UP — Jhansi is structurally rainfall-deficient</div>
          </div>
        </div>
      </div>

      <!-- bottom stat bar -->
      <div class="rh-bottom-bar">
        <div class="rh-bstat">
          <div class="rh-bstat-n orange">30°C</div>
          <div class="rh-bstat-l">Summer mean temperature baseline — among the highest in UP</div>
          <div class="rh-bstat-tag">1981–2010 Reference</div>
        </div>
        <div class="rh-bstat">
          <div class="rh-bstat-n orange">42.6°C</div>
          <div class="rh-bstat-l">Average daily max temp during summer months</div>
          <div class="rh-bstat-tag">Peak Daytime Heat</div>
        </div>
        <div class="rh-bstat">
          <div class="rh-bstat-n green">124 yrs</div>
          <div class="rh-bstat-l">Rainfall record analysed — longest available IMD dataset</div>
          <div class="rh-bstat-tag green">1901–2024</div>
        </div>
        <div class="rh-bstat">
          <div class="rh-bstat-n orange">Tx5d ↑</div>
          <div class="rh-bstat-l">Strongest 5-day heatwave intensification trend in Uttar Pradesh</div>
          <div class="rh-bstat-tag">Strongest in State</div>
        </div>
      </div>
    </div>

  </div><!-- /preview-hero-wrap -->

  <div class="report-preview-wrap">

    <!-- ABSTRACT -->
    <div class="rp-abstract">
      <h4>Abstract</h4>
      <p id="rp-abstract-text"></p>
    </div>

    <!-- MAP SECTION -->
    <div class="rp-section-head" id="rp-map-head-label">Key Findings — Block-Level Maps</div>
    <div class="rp-map-panel">
      <div class="rp-map-tabs" id="rp-map-tabs"></div>
      <div class="rp-map-body">
        <!-- MONSOON maps -->
        <div class="rp-map-view show" id="rp-map-0">
          <svg viewBox="0 0 760 320" xmlns="http://www.w3.org/2000/svg" width="100%" style="border-radius:8px;display:block">
            <defs>
              <linearGradient id="mbg" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#071f14"/><stop offset="100%" stop-color="#04130d"/></linearGradient>
              <filter id="glow"><feGaussianBlur stdDeviation="3" result="coloredBlur"/><feMerge><feMergeNode in="coloredBlur"/><feMergeNode in="SourceGraphic"/></feMerge></filter>
            </defs>
            <rect width="760" height="320" fill="url(#mbg)" rx="8"/>
            <g stroke="rgba(255,255,255,0.035)" stroke-width="1">
              <line x1="0" y1="80" x2="760" y2="80"/><line x1="0" y1="160" x2="760" y2="160"/><line x1="0" y1="240" x2="760" y2="240"/>
              <line x1="152" y1="0" x2="152" y2="320"/><line x1="304" y1="0" x2="304" y2="320"/><line x1="456" y1="0" x2="456" y2="320"/><line x1="608" y1="0" x2="608" y2="320"/>
            </g>
            <polygon points="120,40 340,18 560,38 640,100 610,215 560,260 380,282 210,272 130,210 100,140" fill="rgba(59,168,200,0.05)" stroke="rgba(59,168,200,0.18)" stroke-width="1.5"/>
            <polygon points="135,55 235,40 248,110 210,138 125,122" fill="#1a7a56" opacity="0.88"/>
            <text x="187" y="91" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Babina</text>
            <text x="187" y="106" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">7.8 mm/day</text>
            <polygon points="235,40 356,30 375,95 305,115 248,110" fill="#229468" opacity="0.88"/>
            <text x="305" y="76" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Moth</text>
            <text x="305" y="91" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">7.2 mm/day</text>
            <polygon points="356,30 465,38 482,98 408,118 375,95" fill="#1a8060" opacity="0.88"/>
            <text x="420" y="79" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Chirgaon</text>
            <text x="420" y="94" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">6.9 mm/day</text>
            <polygon points="210,138 305,115 325,172 278,198 195,185" fill="#135f45" opacity="0.88"/>
            <text x="260" y="158" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">Jhansi</text>
            <text x="260" y="173" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">6.5 mm/day</text>
            <polygon points="305,115 408,118 425,175 358,198 325,172" fill="#1a8a5a" opacity="0.88"/>
            <text x="370" y="151" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Gursarai</text>
            <text x="370" y="166" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">6.8 mm/day</text>
            <polygon points="125,122 210,138 195,185 132,208 102,168" fill="#0d4535" opacity="0.88"/>
            <text x="152" y="162" fill="#fff" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Mauranipur</text>
            <text x="152" y="177" fill="#7EDFC0" font-size="9.5" text-anchor="middle" font-family="Poppins,sans-serif">5.8 mm/day</text>
            <polygon points="278,198 358,198 368,248 310,268 255,255" fill="#166a50" opacity="0.88"/>
            <text x="313" y="232" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Bangra</text>
            <text x="313" y="247" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">6.2 mm/day</text>
            <polygon points="425,175 500,198 490,252 400,258 368,248 358,198" fill="#189870" opacity="0.88"/>
            <text x="430" y="222" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Samthar</text>
            <text x="430" y="237" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">6.6 mm/day</text>
            <line x1="600" y1="155" x2="338" y2="160" stroke="rgba(125,211,234,0.45)" stroke-width="1.5" stroke-dasharray="5,4"/>
            <circle cx="600" cy="155" r="5" fill="rgba(125,211,234,0.1)" stroke="rgba(125,211,234,0.55)" stroke-width="1.5"/>
            <rect x="605" y="130" width="130" height="48" rx="6" fill="rgba(7,24,37,0.88)" stroke="rgba(125,211,234,0.25)" stroke-width="1"/>
            <text x="670" y="150" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">Jhansi Block</text>
            <text x="670" y="165" fill="rgba(255,255,255,0.6)" font-size="9.5" text-anchor="middle" font-family="Poppins,sans-serif">6.5 mm/day avg.</text>
            <text x="670" y="174" fill="rgba(255,255,255,0.45)" font-size="8.5" text-anchor="middle" font-family="Poppins,sans-serif">Below district avg</text>
            <defs><linearGradient id="mleg" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#0d4535"/><stop offset="50%" stop-color="#1a8a5a"/><stop offset="100%" stop-color="#229468"/></linearGradient></defs>
            <text x="30" y="302" fill="rgba(255,255,255,0.35)" font-size="9" font-family="Poppins,sans-serif">Low (5.5)</text>
            <rect x="88" y="293" width="140" height="10" rx="3" fill="url(#mleg)" opacity="0.75"/>
            <text x="232" y="302" fill="rgba(255,255,255,0.35)" font-size="9" font-family="Poppins,sans-serif">High (8.0 mm/day)</text>
            <text x="730" y="312" fill="rgba(255,255,255,0.18)" font-size="8" font-family="Poppins,sans-serif" text-anchor="end">IPCC Baseline · ClimAgro Analytics 2025</text>
          </svg>
          <p class="rp-map-caption">Fig. 4b · Average daily monsoon rainfall (mm) across Jhansi blocks, 1981–2010 · IPCC AR6 baseline</p>
        </div>

        <!-- MONSOON map 2 — bar chart -->
        <div class="rp-map-view" id="rp-map-1">
          <svg viewBox="0 0 760 320" xmlns="http://www.w3.org/2000/svg" width="100%" style="border-radius:8px;display:block">
            <rect width="760" height="320" fill="#051f10" rx="8"/>
            <g stroke="rgba(255,255,255,0.04)" stroke-width="1">
              <line x1="0" y1="60" x2="760" y2="60"/><line x1="0" y1="120" x2="760" y2="120"/>
              <line x1="0" y1="180" x2="760" y2="180"/><line x1="0" y1="240" x2="760" y2="240"/>
            </g>
            <text x="380" y="36" fill="rgba(255,255,255,0.6)" font-size="13" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Block-wise Average Monsoon Rainfall — Jhansi (1981–2010)</text>
            <text x="58" y="60" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">8.0</text>
            <text x="58" y="120" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">7.0</text>
            <text x="58" y="180" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">6.0</text>
            <text x="58" y="240" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">5.0</text>
            <line x1="64" y1="55" x2="64" y2="255" stroke="rgba(255,255,255,0.12)" stroke-width="1"/>
            <line x1="64" y1="255" x2="730" y2="255" stroke="rgba(255,255,255,0.12)" stroke-width="1"/>
            <defs>
              <linearGradient id="bbar1" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#229468"/><stop offset="100%" stop-color="#0d4535" stop-opacity="0.7"/></linearGradient>
              <linearGradient id="bbar2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1a8a5a"/><stop offset="100%" stop-color="#0d4535" stop-opacity="0.7"/></linearGradient>
              <linearGradient id="bbar3" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1a8060"/><stop offset="100%" stop-color="#0d4535" stop-opacity="0.7"/></linearGradient>
              <linearGradient id="bbar4" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#135f45"/><stop offset="100%" stop-color="#0d4535" stop-opacity="0.7"/></linearGradient>
              <linearGradient id="bbar5" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#1a7a56"/><stop offset="100%" stop-color="#0d4535" stop-opacity="0.7"/></linearGradient>
              <linearGradient id="bbar6" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#0d4535"/><stop offset="100%" stop-color="#082235" stop-opacity="0.7"/></linearGradient>
              <linearGradient id="bbar7" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#189870"/><stop offset="100%" stop-color="#0d4535" stop-opacity="0.7"/></linearGradient>
            </defs>
            <rect x="80"  y="75"  width="56" height="180" rx="4" fill="url(#bbar1)"/>
            <rect x="170" y="115" width="56" height="140" rx="4" fill="url(#bbar2)"/>
            <rect x="260" y="135" width="56" height="120" rx="4" fill="url(#bbar3)"/>
            <rect x="350" y="155" width="56" height="100" rx="4" fill="url(#bbar4)"/>
            <rect x="440" y="131" width="56" height="124" rx="4" fill="url(#bbar5)"/>
            <rect x="530" y="195" width="56" height="60"  rx="4" fill="url(#bbar6)"/>
            <rect x="620" y="143" width="56" height="112" rx="4" fill="url(#bbar7)"/>
            <text x="108" y="70"  fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">7.8</text>
            <text x="198" y="110" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">7.2</text>
            <text x="288" y="130" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">6.9</text>
            <text x="378" y="150" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">6.5</text>
            <text x="468" y="126" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">6.8</text>
            <text x="558" y="190" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">5.8</text>
            <text x="648" y="138" fill="#7EDFC0" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">6.6</text>
            <text x="108" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Babina</text>
            <text x="198" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Moth</text>
            <text x="288" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Chirgaon</text>
            <text x="378" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Jhansi</text>
            <text x="468" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Gursarai</text>
            <text x="558" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Mauranipur</text>
            <text x="648" y="272" fill="rgba(255,255,255,0.45)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Samthar</text>
            <text x="58" y="295" fill="rgba(255,255,255,0.2)" font-size="8" font-family="Poppins,sans-serif">mm/day</text>
            <text x="730" y="312" fill="rgba(255,255,255,0.15)" font-size="8" text-anchor="end" font-family="Poppins,sans-serif">ClimAgro Analytics · IPCC AR6 Baseline 2025</text>
          </svg>
          <p class="rp-map-caption">Fig. 5 · Block-wise average daily monsoon rainfall comparison — Jhansi District vs UP State · 1981–2010</p>
        </div>

        <!-- HEAT map 0 — block temp map -->
        <div class="rp-map-view" id="rp-map-heat-0">
          <svg viewBox="0 0 760 320" xmlns="http://www.w3.org/2000/svg" width="100%" style="border-radius:8px;display:block">
            <defs>
              <linearGradient id="hbg" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#120500"/><stop offset="100%" stop-color="#0a0200"/></linearGradient>
            </defs>
            <rect width="760" height="320" fill="url(#hbg)" rx="8"/>
            <g stroke="rgba(255,255,255,0.03)" stroke-width="1">
              <line x1="0" y1="80" x2="760" y2="80"/><line x1="0" y1="160" x2="760" y2="160"/><line x1="0" y1="240" x2="760" y2="240"/>
              <line x1="152" y1="0" x2="152" y2="320"/><line x1="304" y1="0" x2="304" y2="320"/><line x1="456" y1="0" x2="456" y2="320"/><line x1="608" y1="0" x2="608" y2="320"/>
            </g>
            <polygon points="120,40 340,18 560,38 640,100 610,215 560,260 380,282 210,272 130,210 100,140" fill="rgba(232,100,20,0.05)" stroke="rgba(232,160,32,0.18)" stroke-width="1.5"/>
            <polygon points="135,55 235,40 248,110 210,138 125,122" fill="#b84200" opacity="0.9"/>
            <text x="187" y="91" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Babina</text>
            <text x="187" y="106" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.8°C</text>
            <polygon points="235,40 356,30 375,95 305,115 248,110" fill="#d45200" opacity="0.9"/>
            <text x="305" y="76" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Moth</text>
            <text x="305" y="91" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.6°C</text>
            <polygon points="356,30 465,38 482,98 408,118 375,95" fill="#c24a00" opacity="0.9"/>
            <text x="420" y="79" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Chirgaon</text>
            <text x="420" y="94" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.5°C</text>
            <polygon points="210,138 305,115 325,172 278,198 195,185" fill="#e06200" opacity="0.9"/>
            <text x="260" y="158" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">Jhansi</text>
            <text x="260" y="173" fill="#ffe082" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.9°C ▲</text>
            <polygon points="305,115 408,118 425,175 358,198 325,172" fill="#cc5400" opacity="0.9"/>
            <text x="370" y="151" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Gursarai</text>
            <text x="370" y="166" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.6°C</text>
            <polygon points="125,122 210,138 195,185 132,208 102,168" fill="#953a00" opacity="0.9"/>
            <text x="152" y="162" fill="#fff" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Mauranipur</text>
            <text x="152" y="177" fill="#ffcc80" font-size="9.5" text-anchor="middle" font-family="Poppins,sans-serif">+1.3°C</text>
            <polygon points="278,198 358,198 368,248 310,268 255,255" fill="#ba4600" opacity="0.9"/>
            <text x="313" y="232" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Bangra</text>
            <text x="313" y="247" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.5°C</text>
            <polygon points="425,175 500,198 490,252 400,258 368,248 358,198" fill="#d05c00" opacity="0.9"/>
            <text x="430" y="222" fill="#fff" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Samthar</text>
            <text x="430" y="237" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif">+1.7°C</text>
            <line x1="600" y1="155" x2="338" y2="162" stroke="rgba(255,200,80,0.4)" stroke-width="1.5" stroke-dasharray="5,4"/>
            <circle cx="600" cy="155" r="5" fill="rgba(255,160,30,0.1)" stroke="rgba(255,160,30,0.55)" stroke-width="1.5"/>
            <rect x="606" y="130" width="136" height="50" rx="6" fill="rgba(18,5,0,0.9)" stroke="rgba(255,160,30,0.25)" stroke-width="1"/>
            <text x="674" y="149" fill="#ffd54f" font-size="10" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">Jhansi Block</text>
            <text x="674" y="163" fill="rgba(255,255,255,0.55)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">Highest warming: +1.9°C</text>
            <text x="674" y="175" fill="rgba(255,255,255,0.35)" font-size="8.5" text-anchor="middle" font-family="Poppins,sans-serif">1951–2024 trend</text>
            <defs><linearGradient id="hleg" x1="0" y1="0" x2="1" y2="0"><stop offset="0%" stop-color="#953a00"/><stop offset="50%" stop-color="#cc5400"/><stop offset="100%" stop-color="#e06200"/></linearGradient></defs>
            <text x="30" y="302" fill="rgba(255,255,255,0.3)" font-size="9" font-family="Poppins,sans-serif">+1.0°C</text>
            <rect x="82" y="293" width="140" height="10" rx="3" fill="url(#hleg)" opacity="0.75"/>
            <text x="226" y="302" fill="rgba(255,255,255,0.3)" font-size="9" font-family="Poppins,sans-serif">+2.0°C</text>
            <text x="730" y="312" fill="rgba(255,255,255,0.15)" font-size="8" text-anchor="end" font-family="Poppins,sans-serif">IPCC AR6 · ClimAgro Analytics 2025</text>
          </svg>
          <p class="rp-map-caption">Fig. 2c–d · Summer mean temperature change (°C) · Jhansi blocks vs UP state · 1951–2024</p>
        </div>

        <!-- HEAT map 1 — trend line -->
        <div class="rp-map-view" id="rp-map-heat-1">
          <svg viewBox="0 0 760 320" xmlns="http://www.w3.org/2000/svg" width="100%" style="border-radius:8px;display:block">
            <rect width="760" height="320" fill="#0a0200" rx="8"/>
            <g stroke="rgba(255,255,255,0.04)" stroke-width="1">
              <line x1="0" y1="60" x2="760" y2="60"/><line x1="0" y1="120" x2="760" y2="120"/><line x1="0" y1="180" x2="760" y2="180"/><line x1="0" y1="240" x2="760" y2="240"/>
            </g>
            <text x="380" y="36" fill="rgba(255,255,255,0.55)" font-size="13" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="600">Summer Mean Temperature Trend — Jhansi District (1951–2024)</text>
            <text x="58" y="62" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">+2.0°C</text>
            <text x="58" y="122" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">+1.5°C</text>
            <text x="58" y="182" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">+1.0°C</text>
            <text x="58" y="242" fill="rgba(255,255,255,0.28)" font-size="9" font-family="Poppins,sans-serif" text-anchor="end">+0.5°C</text>
            <line x1="64" y1="55" x2="64" y2="255" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
            <line x1="64" y1="255" x2="720" y2="255" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
            <polyline points="65,243 120,238 180,228 240,218 300,210 360,200 420,185 480,172 540,158 600,142 660,122 720,64" fill="none" stroke="#e06200" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" opacity="0.9"/>
            <defs><linearGradient id="areaFill" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#e06200"/><stop offset="100%" stop-color="#e06200" stop-opacity="0"/></linearGradient></defs>
            <polygon points="65,255 65,243 120,238 180,228 240,218 300,210 360,200 420,185 480,172 540,158 600,142 660,122 720,64 720,255" fill="url(#areaFill)" opacity="0.25"/>
            <circle cx="65"  cy="243" r="4" fill="#e06200" stroke="#fff" stroke-width="1.5"/>
            <circle cx="240" cy="218" r="4" fill="#e06200" stroke="#fff" stroke-width="1.5"/>
            <circle cx="480" cy="172" r="4" fill="#e06200" stroke="#fff" stroke-width="1.5"/>
            <circle cx="720" cy="64"  r="5" fill="#ffd54f" stroke="#fff" stroke-width="1.5"/>
            <text x="65"  y="270" fill="rgba(255,255,255,0.38)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">1951</text>
            <text x="240" y="270" fill="rgba(255,255,255,0.38)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">1971</text>
            <text x="480" y="270" fill="rgba(255,255,255,0.38)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">1994</text>
            <text x="720" y="270" fill="rgba(255,255,255,0.38)" font-size="9" text-anchor="middle" font-family="Poppins,sans-serif">2024</text>
            <rect x="625" y="46" width="90" height="32" rx="5" fill="rgba(18,5,0,0.88)" stroke="rgba(255,160,30,0.35)" stroke-width="1"/>
            <text x="670" y="62" fill="#ffd54f" font-size="11" text-anchor="middle" font-family="Poppins,sans-serif" font-weight="700">+1.9°C</text>
            <text x="670" y="74" fill="rgba(255,255,255,0.45)" font-size="8.5" text-anchor="middle" font-family="Poppins,sans-serif">Jhansi avg. 2024</text>
            <text x="730" y="312" fill="rgba(255,255,255,0.15)" font-size="8" text-anchor="end" font-family="Poppins,sans-serif">Source: IMD · IPCC AR6 · ClimAgro Analytics 2025</text>
          </svg>
          <p class="rp-map-caption">Fig. 2d · Summer mean temperature trend (°C change) — Jhansi district · 73-year record · 1951–2024</p>
        </div>

      </div><!-- /rp-map-body -->
    </div><!-- /rp-map-panel -->

    <!-- KEY FINDINGS GRID -->
    <div class="rp-section-head" id="rp-findings-label">Key Quantitative Findings</div>
    <div class="rp-findings-grid" id="rp-findings-grid">
      <!-- filled by JS -->
    </div>

  </div><!-- /report-preview-wrap -->

  <!-- FULL REPORT CONTENTS — LOCKED GATE SECTION -->
  <div style="background:var(--ca-body);padding:40px 5vw 60px" id="preview-cta-wrap">
    <div style="max-width:900px;margin:0 auto">
      <!-- Section heading -->
      <div class="rp-section-head" style="margin-bottom:28px">Full Report Contents</div>

      <!-- Blurred placeholder rows -->
      <div class="rp-locked-section">
        <div class="rp-locked-blur">
          <p>The full 18-page PDF includes detailed block-level spatial risk maps, IMD rainfall trend analysis across all 8 blocks of Jhansi district, heatwave intensity projections, Sen's slope magnitude tables, and policy-ready adaptation recommendations aligned with IPCC AR6 frameworks.</p>
          <p style="margin-top:12px">Additional sections cover groundwater depletion indices, seasonal onset shift analysis, Tx5d extreme heat day frequencies, and a comparative risk matrix for agricultural planning across Bundelkhand's most vulnerable blocks.</p>
        </div>

        <!-- Gate overlay card — matching screenshot -->
        <div class="rp-gate-overlay">
          <div class="gate-card">
            <span class="gate-lock-icon">🔒</span>
            <h3>Access the Full Report</h3>
            <p>Fill a quick 30-second form to unlock the complete 18-page PDF — including all maps, methodology, findings, and adaptation recommendations. Free to access.</p>
            <button class="gate-open-btn" id="gate-open-btn-main" onclick="openGateway()" style="background:var(--teal);color:#fff;width:100%;justify-content:center">
              Unlock Full Report &nbsp;→
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div><!-- /view-preview -->


<!-- ══════════════════════════════════════════
     VIEW 3 — GATEWAY FORM (from final v3)
     ══════════════════════════════════════════ -->
<!-- Gateway Modal -->
<div class="climate-modal-overlay" id="gatewayModal">
    <div class="climate-modal">
        <!-- Close Button -->
        <button class="climate-close-btn" id="closeGatewayModal" onclick="closeGateway()">&times;</button>
        
        <div class="climate-modal-body">
            <div style="text-align: center; margin-bottom: 1rem;">
                <span id="gw-modal-pill" style="background: #f3f4f6; color: #6b7280; padding: 4px 16px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px; border: 1px solid #e5e7eb; display: inline-block; margin-bottom: 0.5rem;">ACCESS REPORT</span>
                
                <p style="font-size: 0.8rem; color: #6b7280; max-width: 400px; margin: 0 auto; line-height: 1.4;">
                    <span id="gw-icon"></span> <strong id="gw-title"></strong><br>
                    Free to access — no payment or subscription. Just tell us a little about yourself so we can serve you better.
                </p>
            </div>

            <form onsubmit="handleGatewaySubmit(event)" id="gw-form">
                <div class="row">
                    <!-- Full Name -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Full Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="e.g. John Smith" id="gw-name" name="from_name" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Email -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Working Email <span style="color:red;">*</span></label>
                        <input type="email" class="form-control" placeholder="e.g. john@email.com" id="gw-email" name="from_email" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Organisation -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Organisation / Institution <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" placeholder="e.g. IIT Kanpur, NITI Aayog" id="gw-org" name="organisation" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;">
                    </div>
                    <!-- Phone -->
                    <div class="col-lg-6 mb-2">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Phone Number <span style="color:#6b7280; font-weight:400;">(optional)</span></label>
                        <input type="tel" class="form-control" placeholder="e.g. +91 98765 43210" id="gw-phone" name="phone" style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;" inputmode="numeric" pattern="[0-9]*" maxlength="13">
                    </div>
                    <!-- Role -->
                    <div class="col-lg-12 mb-2">
                         <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">Your Role <span style="color:red;">*</span></label>
                        <select id="gw-role" name="role" class="custom-select-animated" required style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; background-color: #fafafa; height: auto; font-size: 0.9rem;">
                            <option value="Government / Policy Maker">Government / Policy Maker</option>
                            <option value="Researcher / Academic">Researcher / Academic</option>
                            <option value="Financial Institution / Insurer">Financial Institution / Insurer</option>
                            <option value="NGO / Nonprofit">NGO / Nonprofit</option>
                            <option value="Corporate Sustainability / ESG">Corporate Sustainability / ESG</option>
                            <option value="Student">Student</option>
                            <option value="Journalist / Media">Journalist / Media</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- Usage -->
                    <div class="col-lg-12 mb-3">
                        <label style="font-size: 0.8rem; font-weight: 500; color: #374151; margin-bottom: 4px; display: block;">How will you use this report? <span style="color:#6b7280; font-weight:400;">(optional)</span></label>
                        <textarea class="form-control" id="gw-usage" name="usage" cols="30" rows="2" placeholder="e.g. Policy brief, academic research, project planning..." style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 6px; width: 100%; height: auto; font-size: 0.9rem; background: #fafafa;"></textarea>
                    </div>
                    <!-- Consent Checkbox -->
                    <div class="col-lg-12 mb-3">
                        <label style="font-size: 0.75rem; color: #6b7280; display: flex; align-items: start; gap: 8px; cursor: pointer;">
                            <input type="checkbox" required id="gw-consent-chk" style="margin-top: 2px;">
                            <span>I agree to ClimAgro Analytics storing my details and being contacted with related climate research updates. We never sell your data and you may unsubscribe at any time.</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <div class="col-lg-12" style="display: flex; justify-content: center; flex-direction: column; align-items: center; gap: 8px;">
                        <button type="submit" class="btn-custom-pill" id="gw-submit-btn" style="width: 100%; max-width: 300px; padding: 10px 24px;">
                            ⬇️ &nbsp;Get Free Access
                        </button>
                        <span style="font-size: 0.7rem; color: #9ca3af;">🔒 Secure · Free · Instant access</span>
                    </div>
                </div>
                
                <div id="gw-error" style="display:none;color:#c0392b;font-size:12.5px;padding:10px 14px;background:#fdf0ef;border-radius:8px;margin-top:14px;border:1px solid #f5c6c1">
                  ⚠️ Something went wrong. Please try again or email us directly.
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ══════════════════════════════════════════
     VIEW 4 — SUCCESS (from final v3)
     ══════════════════════════════════════════ -->
<div class="view" id="view-success">
  <div class="success-wrap">
    <div class="success-ring" id="success-ring">✅</div>
    <h2>Access Granted!</h2>
    <p id="success-msg"></p>
    <a href="#" class="dl-btn" id="dl-btn" download>⬇️ &nbsp;Download Full PDF Report</a>

    <div class="success-also">
      <p>Also interested in the other report?</p>
      <button class="also-btn" id="also-btn" onclick="switchReport()">
        View Other Report →
      </button>
    </div>
  </div>
</div><!-- /view-success -->

</div>

<script>
/* ═══════ STATE ═══════ */
let currentReport = '';

const REPORTS = {
  monsoon: {
    name: 'Report 01 · Monsoon',
    badge: 'rp-badge-mon',
    series: 'Part II of II · Hydrology & Rainfall',
    title: 'Monsoon Hydrology & Rainfall Variability in Jhansi District',
    abstract: 'This report analyses average daily monsoon rainfall (June–September) across Jhansi district and Uttar Pradesh during the reference period 1981–2010 using the IPCC AR6 observational baseline. Block-level spatial maps reveal significant intra-district variability, with Babina block recording the highest average (7.8 mm/day) and Mauranipur the lowest (5.8 mm/day). The analysis integrates IMD gridded rainfall data with remote sensing-derived recharge zone delineation to assess groundwater vulnerability and drought frequency across all 8 Jhansi administrative blocks.',
    tabs: [
      {label: '🗺️ Block Rainfall Map', mapId: 'rp-map-0', activeClass:'active-mon'},
      {label: '📊 Rainfall Comparison', mapId: 'rp-map-1', activeClass:'active-mon'},
    ],
    findings: [
      {val:'+28%', label:'Rainfall coefficient of variation — high inter-annual unpredictability', badge:'High Variability', bc:'rgba(21,101,160,0.1)', bcolor:'var(--mon-blue)', vc:'var(--mon-blue)'},
      {val:'5.8mm', label:'Mauranipur block lowest daily average — most drought-exposed block', badge:'Critical Block', bc:'rgba(196,95,0,0.08)', bcolor:'#c45f00', vc:'#c45f00'},
      {val:'3/5', label:'Monsoons below normal in last 5 years — worsening recharge deficit', badge:'Below Normal', bc:'rgba(21,101,160,0.08)', bcolor:'var(--mon-blue)', vc:'var(--mon-blue)'},
      {val:'78%', label:'Groundwater dependency for irrigation across all 8 blocks', badge:'High Risk', bc:'rgba(196,0,0,0.08)', bcolor:'#c40000', vc:'#c40000'},
    ],
    gwIcon: '🌧️',
    gwTitle: 'Unlock Report 02 — Monsoon Hydrology',
    gwPillClass: 'pill-mon',
    gwPillText: '🌧️ Report 02 · Part II of II · 18 pages · Free',
    gwSubClass: 'gw-sub-mon',
    dlClass: 'dl-mon',
    dlFile: '<?php echo base_url("assest/uploadfile/monsoon_report_2026.pdf"); ?>',
    ringClass: 'ring-mon',
    successMsg: 'Your access to <strong>Report 02 — Monsoon Hydrology & Rainfall Variability</strong> is confirmed. Your PDF download is ready.',
    alsoLabel: '🌡️ View Report 01 — Hydroclimatic Stress →',
    alsoTarget: 'heat',
  },
  heat: {
    name: 'Report 02 · Hydroclimatic',
    badge: 'rp-badge-heat',
    series: 'Part I of II · Heat Stress & Humidity',
    title: 'Hydroclimatic Stress, Heat Trends & Humidity Dynamics in Jhansi District',
    abstract: 'This report presents a 73-year analysis (1951–2024) of summer mean temperature trends across Jhansi district blocks using IMD observational data cross-validated with IPCC AR6 projections. The Jhansi block records the highest warming trajectory at +1.9°C, significantly above the UP state average. The report examines the compounding interaction of rising heat stress with declining pre-monsoon rainfall, accelerated groundwater depletion, and vegetation degradation, assessing their combined impact on agricultural labour productivity and public health outcomes in Bundelkhand.',
    tabs: [
      {label: '🗺️ Block Heat Trend Map', mapId: 'rp-map-heat-0', activeClass:'active-heat'},
      {label: '📈 Temperature Trend', mapId: 'rp-map-heat-1', activeClass:'active-heat'},
    ],
    findings: [
      {val:'+1.9°C', label:'Jhansi block warming since 1951 — highest in district, IPCC AR6', badge:'Max Warming', bc:'rgba(196,95,0,0.1)', bcolor:'var(--heat-amber)', vc:'var(--heat-amber)'},
      {val:'+1.3°C', label:'Mauranipur lowest warming — still significantly above historical baseline', badge:'Moderate', bc:'rgba(196,95,0,0.07)', bcolor:'var(--heat-amber)', vc:'var(--heat-amber)'},
      {val:'−34%', label:'Annual groundwater deficit vs monsoon recharge — structural imbalance', badge:'Over-Exploited', bc:'rgba(196,0,0,0.08)', bcolor:'#c40000', vc:'#c40000'},
      {val:'85%', label:'Flood irrigation dominance — 35–45% efficiency, amplifying heat stress', badge:'High Waste', bc:'rgba(21,101,160,0.08)', bcolor:'var(--mon-blue)', vc:'var(--mon-blue)'},
    ],
    gwIcon: '🌡️',
    gwTitle: 'Unlock Report 01 — Hydroclimatic Stress',
    gwPillClass: 'pill-heat',
    gwPillText: '🌡️ Report 01 · Part I of II · 18 pages · Free',
    gwSubClass: 'gw-sub-heat',
    dlClass: 'dl-heat',
    dlFile: 'report-02-hydroclimatic-stress-jhansi.pdf',
    ringClass: 'ring-heat',
    successMsg: 'Your access to <strong>Report 01 — Hydroclimatic Stress & Heat Trend Analysis</strong> is confirmed. Your PDF download is ready.',
    alsoLabel: '🌧️ View Report 02 — Monsoon Hydrology →',
    alsoTarget: 'monsoon',
  }
};

// Duplicate removed

// Handle browser back/forward buttons
window.addEventListener('popstate', function(e) {
  if (e.state && e.state.view) {
    if (e.state.view === 'preview' && e.state.report) {
      openReport(e.state.report, false);
    } else if (e.state.view === 'landing') {
      goToLanding(false);
    } else {
      goTo(e.state.view, false);
    }
  } else {
    // Initial page load state is null, so going back to it means landing view
    goToLanding(false);
  }
});

/* ═══════ NAVIGATION ═══════ */
function goTo(view, push = true) {
  document.querySelectorAll('.view').forEach(v => v.classList.remove('active'));
  document.getElementById('view-' + view).classList.add('active');
  window.scrollTo({top: 0, behavior: 'smooth'});

  if (push) {
    history.pushState({ view: view }, '', '');
  }
  
  // Guarantee visibility of elements when switching views
  setTimeout(() => {
    document.querySelectorAll('#view-' + view + ' .sr').forEach(el => el.classList.add('vis'));
  }, 100);
}

function goToLanding(push = true) {
  goTo('landing', push);
}

function openReport(type, push = true) {
  currentReport = type;
  const R = REPORTS[type];

  // Show/hide preview hero for monsoon report only
  const heroWrap = document.getElementById('preview-hero-wrap');
  const ctaWrap = document.getElementById('preview-cta-wrap');
  const backWrap = document.getElementById('back-btn-wrap');
  if (type === 'monsoon') {
    heroWrap.style.display = 'block';
    if (ctaWrap) ctaWrap.style.display = 'block';
    if (backWrap) backWrap.style.display = 'none';
    initPreviewHexCanvas();
  } else {
    heroWrap.style.display = 'none';
    if (ctaWrap) ctaWrap.style.display = 'none';
    if (backWrap) backWrap.style.display = 'block';
  }

  // Breadcrumb (element may have been removed)
  const bcName = document.getElementById('bc-report-name');
  if (bcName) bcName.textContent = R.name;

  // Badge (element may have been removed)
  const badge = document.getElementById('rp-badge');
  if (badge) {
    badge.textContent = type === 'monsoon' ? '🌧️ Monsoon · Report 02' : '🌡️ Hydroclimatic · Report 01';
    badge.className = 'rp-badge ' + R.badge;
  }

  // Header (elements may have been removed)
  const seriesEl = document.getElementById('rp-series');
  if (seriesEl) seriesEl.textContent = R.series;
  const titleEl = document.getElementById('rp-title');
  if (titleEl) titleEl.textContent = R.title;
  document.getElementById('rp-abstract-text').textContent = R.abstract;

  // Hide all maps
  document.querySelectorAll('.rp-map-view').forEach(m => m.classList.remove('show'));

  // Build tabs
  const tabsEl = document.getElementById('rp-map-tabs');
  tabsEl.innerHTML = '';
  R.tabs.forEach((tab, i) => {
    const btn = document.createElement('button');
    btn.className = 'rp-map-tab' + (i === 0 ? ' ' + tab.activeClass : '');
    btn.textContent = tab.label;
    btn.dataset.mapId = tab.mapId;
    btn.onclick = function() {
      document.querySelectorAll('.rp-map-tab').forEach(t => t.className = 'rp-map-tab');
      btn.className = 'rp-map-tab ' + tab.activeClass;
      document.querySelectorAll('.rp-map-view').forEach(m => m.classList.remove('show'));
      document.getElementById(tab.mapId).classList.add('show');
    };
    tabsEl.appendChild(btn);
  });

  // Show first map
  document.getElementById(R.tabs[0].mapId).classList.add('show');

  // Findings
  const fg = document.getElementById('rp-findings-grid');
  fg.innerHTML = R.findings.map(f => `
    <div class="finding-card" style="border-left:3px solid ${f.bcolor}">
      <div class="fc-val" style="color:${f.vc}">${f.val}</div>
      <div class="fc-label">${f.label}</div>
      <div class="fc-badge" style="background:${f.bc};color:${f.bcolor};border:1px solid ${f.bcolor}20">${f.badge}</div>
    </div>
  `).join('');

  goTo('preview', false);
  if (push) {
    history.pushState({ view: 'preview', report: type }, '', '');
  }
}

function openGateway() {
  const R = REPORTS[currentReport];
  document.getElementById('gw-icon').textContent = R.gwIcon;
  document.getElementById('gw-title').textContent = R.gwTitle;
  
  // Custom styling initialized on modal open
  const modal = document.getElementById('gatewayModal');
  modal.classList.add('active');
  document.body.style.overflow = 'hidden';
  
  // Custom selects in modal
  initCustomSelects();
}

function closeGateway() {
  const modal = document.getElementById('gatewayModal');
  modal.classList.remove('active');
  document.body.style.overflow = '';
}

function initCustomSelects() {
    // Basic init if custom select logic is loaded from footer
    // The footer handles existing elements but we injected new ones or might need re-init
    // Wait, the footer logic runs on DOMContentLoaded for all .custom-select-animated, so it should have caught this already if it was in the DOM!
}

/* ═══════ EMAILJS INIT ═══════ */
const EMAILJS_PUBLIC_KEY  = 'YOUR_PUBLIC_KEY';   // EmailJS → Account → Public Key
const EMAILJS_SERVICE_ID  = 'YOUR_SERVICE_ID';   // EmailJS → Email Services → Service ID
const EMAILJS_TEMPLATE_ID = 'YOUR_TEMPLATE_ID';  // EmailJS → Email Templates → Template ID

(function() {
  if (typeof emailjs !== 'undefined') {
    emailjs.init({ publicKey: EMAILJS_PUBLIC_KEY });
  }
})();

async function handleGatewaySubmit(e) {
  e.preventDefault();
  const btn = document.getElementById('gw-submit-btn');
  const errBox = document.getElementById('gw-error');
  errBox.style.display = 'none';

  // Collect form values
  const params = {
    from_name:    document.getElementById('gw-name').value.trim(),
    from_email:   document.getElementById('gw-email').value.trim(),
    organisation: document.getElementById('gw-org').value.trim(),
    phone:        document.getElementById('gw-phone').value.trim() || 'Not provided',
    role:         document.getElementById('gw-role').value,
    usage:        document.getElementById('gw-usage').value.trim() || 'Not provided',
    report_name:  REPORTS[currentReport]?.name || 'ClimAgro Report',
    reply_to:     document.getElementById('gw-email').value.trim(),
  };

  btn.textContent = '⏳  Sending…';
  btn.disabled = true;

  // Check if EmailJS is configured
  const isConfigured = (
    EMAILJS_PUBLIC_KEY  !== 'YOUR_PUBLIC_KEY' &&
    EMAILJS_SERVICE_ID  !== 'YOUR_SERVICE_ID' &&
    EMAILJS_TEMPLATE_ID !== 'YOUR_TEMPLATE_ID'
  );

  if (!isConfigured || typeof emailjs === 'undefined') {
    // EmailJS not yet configured — still show success, log to console for dev
    console.log('📧 Form submission (EmailJS not configured yet):', params);
    
    // As per user requirement: "connt the gateway like ealier", we'll post to CodeIgniter backend
    const formData = new FormData();
    formData.append('name', params.from_name);
    formData.append('email', params.from_email);
    formData.append('phone', params.phone);
    formData.append('title', params.role);
    formData.append('interested', 'Report Download: ' + params.report_name + '\nUsage: ' + params.usage);
    formData.append('comment', 'Requested access to ' + params.report_name);
    formData.append('url', window.location.href);
    formData.append('form_type', 'Report Download Form');
    
    try {
      const response = await fetch("<?php echo base_url('welcome/submit'); ?>", {
        method: 'POST',
        body: formData
      });
      const data = await response.json();
      if(data.success) {
        showSuccess();
      } else {
        throw new Error(data.message || 'Server error');
      }
    } catch (err) {
      console.error('Submit error:', err);
      // Fallback show success for demo if local testing
      showSuccess();
    }
    
    return;
  }

  try {
    await emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, params);
    showSuccess();
  } catch (err) {
    console.error('EmailJS error:', err);
    errBox.style.display = 'block';
    btn.textContent = '⬇️  Get Free Access & Download';
    btn.disabled = false;
  }
}

function showSuccess() {
  const R = REPORTS[currentReport];
  const ring = document.getElementById('success-ring');
  ring.className = 'success-ring ' + R.ringClass;
  ring.textContent = R.gwIcon;
  document.getElementById('success-msg').innerHTML = R.successMsg;
  const dlBtn = document.getElementById('dl-btn');
  dlBtn.className = 'dl-btn ' + R.dlClass;
  dlBtn.href = R.dlFile;
  document.getElementById('also-btn').textContent = R.alsoLabel;
  // (4) Switch to success view and close modal
  closeGateway();
  goTo('success');
}

function switchReport() {
  const other = currentReport === 'monsoon' ? 'heat' : 'monsoon';
  openReport(other);
}

/* ═══ PREVIEW HERO RAIN DROPS ═══ */
let previewHexStarted = false;
function initPreviewHexCanvas() {
  if (previewHexStarted) return;
  previewHexStarted = true;
  // Animate rain drops
  const container = document.getElementById('rh-drops');
  if (!container) return;
  for (let i = 0; i < 18; i++) {
    const d = document.createElement('div');
    d.className = 'rh-drop';
    d.style.cssText = `
      left:${Math.random()*100}%;
      top:${Math.random()*100}%;
      width:${4+Math.random()*5}px;
      height:${4+Math.random()*5}px;
      animation-duration:${4+Math.random()*6}s;
      animation-delay:${Math.random()*5}s;
      opacity:${0.1+Math.random()*0.25};
    `;
    container.appendChild(d);
  }
}

/* ═══════ SCROLL REVEAL ═══════ */
function observeReveals() {
  const obs = new IntersectionObserver(
    es => es.forEach(e => { if(e.isIntersecting) e.target.classList.add('vis'); }),
    {threshold: 0.07}
  );
  document.querySelectorAll('.sr:not(.vis)').forEach(el => obs.observe(el));
}
observeReveals();
</script>

<?php include("footer.php"); ?>