<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Subscribers</title>
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
        
        .container { max-width: 900px; margin: 0 auto; padding: 32px 20px; }
        
        .page-title { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px; }
        .page-title h1 { font-size: 20px; font-weight: 600; }
        .page-title .count { color: #64748b; font-size: 13px; font-weight: 400; }
        
        .btn-export { background: #025b5f; color: #fff; padding: 8px 16px; border-radius: 6px; font-size: 13px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: opacity 0.2s; }
        .btn-export:hover { opacity: 0.9; }
        
        .search-box { margin-bottom: 16px; }
        .search-box input { width: 100%; max-width: 300px; padding: 10px 14px 10px 36px; background: #1e293b; border: 1px solid #334155; border-radius: 6px; color: #e2e8f0; font-size: 13px; }
        .search-box input::placeholder { color: #64748b; }
        .search-box input:focus { outline: none; border-color: #025b5f; }
        .search-wrapper { position: relative; display: inline-block; }
        .search-wrapper i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 12px; }
        
        .table-wrap { background: #1e293b; border-radius: 8px; overflow: hidden; border: 1px solid #334155; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #334155; text-align: left; padding: 10px 14px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #94a3b8; }
        td { padding: 10px 14px; border-bottom: 1px solid #334155; font-size: 13px; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: rgba(255,255,255,0.02); }
        
        .email-cell { display: flex; align-items: center; gap: 10px; }
        .avatar { width: 28px; height: 28px; background: #025b5f; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; flex-shrink: 0; }
        .date { color: #64748b; font-size: 12px; }
        
        .empty { text-align: center; padding: 40px; color: #64748b; }
        .empty i { font-size: 32px; margin-bottom: 12px; opacity: 0.5; display: block; }
    </style>
</head>
<body>
    <div class="header">
        <a href="<?php echo base_url('administrator/dashboard'); ?>" class="logo"><i class="fas fa-leaf"></i> Climagro</a>
        <div class="nav-links">
            <a href="<?php echo base_url('administrator/dashboard'); ?>"><i class="fas fa-home"></i> Dashboard</a>
            <a href="<?php echo base_url('administrator/managecontacts'); ?>"><i class="fas fa-envelope"></i> Contacts</a>
            <a href="<?php echo base_url('administrator/adminlogout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="page-title">
            <h1>Email Subscribers <span class="count">(<?php echo $total_count; ?>)</span></h1>
            <a href="<?php echo base_url('administrator/exportsubscribers'); ?>" class="btn-export">
                <i class="fas fa-download"></i> Export Excel
            </a>
        </div>
        
        <div class="search-box">
            <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" id="search" placeholder="Search emails..." onkeyup="filter()">
            </div>
        </div>
        
        <div class="table-wrap">
            <table id="tbl">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Email</th>
                        <th width="140">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($subscribers)): $i=1; foreach($subscribers as $s): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <div class="email-cell">
                                <div class="avatar"><?php echo strtoupper(substr($s->email,0,1)); ?></div>
                                <?php echo htmlspecialchars($s->email); ?>
                            </div>
                        </td>
                        <td class="date"><?php echo isset($s->created_at) ? date('M d, Y', strtotime($s->created_at)) : '-'; ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="3"><div class="empty"><i class="fas fa-inbox"></i>No subscribers yet</div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
    function filter() {
        const v = document.getElementById('search').value.toLowerCase();
        document.querySelectorAll('#tbl tbody tr').forEach(r => {
            r.style.display = r.textContent.toLowerCase().includes(v) ? '' : 'none';
        });
    }
    </script>
</body>
</html>
