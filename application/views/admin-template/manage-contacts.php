<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Submissions</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0f172a; min-height: 100vh; color: #e2e8f0; }
        
        .header { background: #1e293b; border-bottom: 1px solid #334155; padding: 12px 24px; display: flex; justify-content: space-between; align-items: center; }
        .header a { color: #e2e8f0; text-decoration: none; font-size: 13px; padding: 8px 14px; border-radius: 6px; transition: background 0.2s; }
        .header a:hover { background: #334155; }
        .logo { font-weight: 600; font-size: 15px; display: flex; align-items: center; gap: 8px; }
        .logo i { color: #025b5f; }
        .nav-links { display: flex; gap: 4px; }
        
        .container { max-width: 1000px; margin: 0 auto; padding: 32px 20px; }
        
        .page-title { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px; }
        .page-title h1 { font-size: 20px; font-weight: 600; }
        .page-title .count { color: #64748b; font-size: 13px; font-weight: 400; }
        
        .btn-export { background: #025b5f; color: #fff; padding: 8px 16px; border-radius: 6px; font-size: 13px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: opacity 0.2s; }
        .btn-export:hover { opacity: 0.9; }
        
        .controls { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 12px; }
        .search-box input { width: 250px; padding: 10px 14px 10px 36px; background: #1e293b; border: 1px solid #334155; border-radius: 6px; color: #e2e8f0; font-size: 13px; }
        .search-box input::placeholder { color: #64748b; }
        .search-box input:focus { outline: none; border-color: #025b5f; }
        .search-wrapper { position: relative; }
        .search-wrapper i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 12px; }
        
        .per-page select { padding: 8px 12px; background: #1e293b; border: 1px solid #334155; border-radius: 6px; color: #e2e8f0; font-size: 13px; }
        
        .cards { display: flex; flex-direction: column; gap: 8px; }
        
        .card { background: #1e293b; border: 1px solid #334155; border-radius: 8px; overflow: hidden; }
        .card-header { display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; cursor: pointer; transition: background 0.2s; }
        .card-header:hover { background: rgba(255,255,255,0.02); }
        .contact-info { display: flex; align-items: center; gap: 10px; }
        .avatar { width: 32px; height: 32px; background: #025b5f; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; flex-shrink: 0; }
        .contact-details h3 { font-size: 13px; font-weight: 600; margin-bottom: 2px; }
        .contact-details p { font-size: 11px; color: #64748b; }
        .meta { display: flex; align-items: center; gap: 10px; }
        .date { font-size: 11px; color: #64748b; }
        .badge { display: inline-block; padding: 3px 7px; border-radius: 4px; font-size: 10px; font-weight: 500; }
        .badge-blue { background: rgba(59,130,246,0.15); color: #60a5fa; }
        .badge-green { background: rgba(2,91,95,0.15); color: #025b5f; }
        .toggle-icon { color: #64748b; font-size: 12px; transition: transform 0.2s; }
        .card.open .toggle-icon { transform: rotate(180deg); }
        
        .card-body { display: none; border-top: 1px solid #334155; padding: 14px 16px; background: rgba(0,0,0,0.15); }
        .card.open .card-body { display: block; }
        .message { font-size: 13px; line-height: 1.6; color: #cbd5e1; white-space: pre-wrap; word-break: break-word; }
        .message-label { font-size: 11px; color: #64748b; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px; }
        
        .pagination { display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 24px; }
        .pagination button { background: #1e293b; border: 1px solid #334155; color: #e2e8f0; padding: 8px 14px; border-radius: 6px; cursor: pointer; font-size: 13px; transition: background 0.2s; }
        .pagination button:hover:not(:disabled) { background: #334155; }
        .pagination button:disabled { opacity: 0.4; cursor: not-allowed; }
        .pagination button.active { background: #025b5f; color: #fff; border-color: #025b5f; }
        .page-info { color: #64748b; font-size: 13px; }
        
        .empty { text-align: center; padding: 40px; color: #64748b; background: #1e293b; border-radius: 8px; }
        .empty i { font-size: 32px; margin-bottom: 12px; opacity: 0.5; display: block; }
    </style>
</head>
<body>
    <div class="header">
        <a href="<?php echo base_url('administrator/dashboard'); ?>" class="logo"><i class="fas fa-leaf"></i> Climagro</a>
        <div class="nav-links">
            <a href="<?php echo base_url('administrator/dashboard'); ?>"><i class="fas fa-home"></i> Dashboard</a>
            <a href="<?php echo base_url('administrator/managesubscribers'); ?>"><i class="fas fa-users"></i> Subscribers</a>
            <a href="<?php echo base_url('administrator/adminlogout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="page-title">
            <h1>Contact Submissions <span class="count">(<?php echo $total_count; ?>)</span></h1>
            <a href="<?php echo base_url('administrator/exportcontacts'); ?>" class="btn-export">
                <i class="fas fa-download"></i> Export Excel
            </a>
        </div>
        
        <div class="controls">
            <div class="search-box">
                <div class="search-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search" placeholder="Search..." onkeyup="filter()">
                </div>
            </div>
            <div class="per-page">
                <select id="perPage" onchange="changePage(1)">
                    <option value="10" selected>10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>
        
        <div class="cards" id="cards">
            <?php if (!empty($contacts)): foreach($contacts as $c): ?>
            <div class="card" data-content="<?php echo htmlspecialchars(strtolower(($c->name ?? '').($c->email ?? '').($c->message ?? ''))); ?>">
                <div class="card-header" onclick="toggleCard(this)">
                    <div class="contact-info">
                        <div class="avatar"><?php echo strtoupper(substr($c->name ?? 'N', 0, 1)); ?></div>
                        <div class="contact-details">
                            <h3><?php echo htmlspecialchars($c->name ?? 'N/A'); ?></h3>
                            <p><?php echo htmlspecialchars($c->email ?? ''); ?> • <?php echo htmlspecialchars($c->phone ?? ''); ?></p>
                        </div>
                    </div>
                    <div class="meta">
                        <?php if(!empty($c->title)): ?><span class="badge badge-blue"><?php echo htmlspecialchars($c->title); ?></span><?php endif; ?>
                        <?php if(!empty($c->interested)): ?><span class="badge badge-green"><?php echo htmlspecialchars($c->interested); ?></span><?php endif; ?>
                        <span class="date"><?php echo isset($c->created_at) ? date('M d, Y', strtotime($c->created_at)) : '-'; ?></span>
                        <i class="fas fa-chevron-down toggle-icon"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="message-label">Message</div>
                    <div class="message"><?php echo nl2br(htmlspecialchars($c->message ?? 'No message')); ?></div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="empty"><i class="fas fa-inbox"></i>No contact submissions yet</div>
            <?php endif; ?>
        </div>
        
        <div class="pagination" id="pagination"></div>
    </div>
    
    <script>
    let currentPage = 1;
    let allCards = [];
    
    document.addEventListener('DOMContentLoaded', () => {
        allCards = Array.from(document.querySelectorAll('.card'));
        changePage(1);
    });
    
    function toggleCard(header) {
        header.closest('.card').classList.toggle('open');
    }
    
    function getPerPage() {
        return parseInt(document.getElementById('perPage').value);
    }
    
    function getVisibleCards() {
        const search = document.getElementById('search').value.toLowerCase();
        return allCards.filter(c => c.dataset.content.includes(search));
    }
    
    function changePage(page) {
        const visible = getVisibleCards();
        const perPage = getPerPage();
        const totalPages = Math.ceil(visible.length / perPage) || 1;
        
        currentPage = Math.max(1, Math.min(page, totalPages));
        const start = (currentPage - 1) * perPage;
        const end = start + perPage;
        
        allCards.forEach(c => { c.style.display = 'none'; c.classList.remove('open'); });
        visible.slice(start, end).forEach(c => c.style.display = 'block');
        
        renderPagination(totalPages, visible.length);
    }
    
    function renderPagination(totalPages, total) {
        const div = document.getElementById('pagination');
        if (total === 0) { div.innerHTML = ''; return; }
        
        let html = `<button onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}><i class="fas fa-chevron-left"></i></button>`;
        for (let i = 1; i <= totalPages && i <= 7; i++) {
            html += `<button class="${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">${i}</button>`;
        }
        html += `<button onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}><i class="fas fa-chevron-right"></i></button>`;
        html += `<span class="page-info" style="margin-left:12px">${Math.min((currentPage-1)*getPerPage()+1, total)}-${Math.min(currentPage*getPerPage(), total)} of ${total}</span>`;
        
        div.innerHTML = html;
    }
    
    function filter() { changePage(1); }
    </script>
</body>
</html>
