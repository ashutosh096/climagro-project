<?php
/**
 * CTA / Demo Request Demo Component
 * 
 * Usage:
 * $cta_data = [
 *   'tag' => '...',
 *   'title' => '...',
 *   'description' => '...',
 *   'form_action' => '...',
 *   'product_name' => '...'
 * ];
 * include('components/cta_form_section.php');
 */
?>
<style>
    .cta-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, #f0fafa 0%, #e8f5f5 50%, #f8fffe 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -10%;
        width: 50%;
        height: 160%;
        background: radial-gradient(ellipse, rgba(2, 91, 95, 0.06) 0%, transparent 70%);
        pointer-events: none;
    }

    .cta-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .cta-content {
        flex: 1;
    }

    .cta-form-wrapper {
        flex: 1;
        max-width: 500px;
    }

    .cta-tag {
        display: inline-block;
        background: rgba(2, 91, 95, 0.1);
        color: var(--primary-color);
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .cta-description {
        font-size: 1.125rem;
        color: #6b7280;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .cta-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .cta-features li {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1rem;
        color: #4b5563;
        margin-bottom: 1rem;
    }

    .cta-features li svg {
        flex-shrink: 0;
        width: 24px;
        height: 24px;
        color: var(--primary-color);
    }

    .cta-form-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2.5rem;
        box-shadow: 0 25px 80px rgba(2, 91, 95, 0.12);
        border: 1px solid rgba(2, 91, 95, 0.05);
    }

    .cta-form-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a1a2e;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .cta-form-subtitle {
        font-size: 0.9rem;
        color: #6b7280;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .cta-form-group {
        margin-bottom: 1rem;
    }

    .cta-form-label {
        display: block;
        font-size: 0.85rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .cta-form-input,
    .cta-form-select,
    .cta-form-textarea {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 0.95rem;
        background: #fafafa;
        transition: all 0.3s ease;
    }

    .cta-form-input:focus,
    .cta-form-select:focus,
    .cta-form-textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(2, 91, 95, 0.1);
        background: white;
    }

    .cta-form-textarea {
        min-height: 100px;
        resize: vertical;
    }

    .cta-form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .cta-form-submit {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        color: white;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 0.5rem;
    }

    .cta-form-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(2, 91, 95, 0.3);
    }

    .cta-form-privacy {
        font-size: 0.75rem;
        color: #9ca3af;
        text-align: center;
        margin-top: 1rem;
    }

    .cta-form-results {
        margin-top: 1rem;
    }

    @media (max-width: 992px) {
        .cta-container {
            flex-direction: column;
            text-align: center;
        }

        .cta-features {
            display: inline-block;
            text-align: left;
        }

        .cta-form-wrapper {
            max-width: 100%;
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .cta-form-row {
            grid-template-columns: 1fr;
        }

        .cta-title {
            font-size: 2rem;
        }
    }
</style>

<section class="cta-section" id="request-demo">
    <div class="cta-container">
        <div class="cta-content">
            <?php if (!empty($cta_data['tag'])): ?>
                <span class="cta-tag"><?php echo $cta_data['tag']; ?></span>
            <?php endif; ?>
            <h2 class="cta-title"><?php echo $cta_data['title']; ?></h2>
            <p class="cta-description"><?php echo $cta_data['description']; ?></p>
            
            <ul class="cta-features">
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Personalized platform demonstration
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Custom risk assessment for your region
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Expert consultation on your use case
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    No commitment required
                </li>
            </ul>
        </div>

        <div class="cta-form-wrapper">
            <div class="cta-form-card">
                <h3 class="cta-form-title">Request a Demo</h3>
                <p class="cta-form-subtitle">Fill out the form and we'll be in touch shortly.</p>
                
                <form id="ctaDemoForm" action="<?php echo $cta_data['form_action'] ?? site_url('contact/submit'); ?>" method="POST">
                    <input type="hidden" name="url" value="<?php echo current_url(); ?>">
                    <input type="hidden" name="form_type" value="Demo Request">
                    <input type="hidden" name="interested" value="<?php echo $cta_data['product_name'] ?? 'CropRisk.ai'; ?>">
                    
                    <div class="cta-form-row">
                        <div class="cta-form-group">
                            <label class="cta-form-label">Your Name *</label>
                            <input type="text" name="name" class="cta-form-input" placeholder="e.g. John Smith" required>
                        </div>
                        <div class="cta-form-group">
                            <label class="cta-form-label">Phone Number</label>
                            <input type="tel" name="phone" class="cta-form-input" placeholder="e.g. +91 98765 43210" pattern="[0-9+\s-]*">
                        </div>
                    </div>
                    
                    <div class="cta-form-group">
                        <label class="cta-form-label">Email Address *</label>
                        <input type="email" name="email" class="cta-form-input" placeholder="e.g. john@company.com" required>
                    </div>
                    
                    <div class="cta-form-group">
                        <label class="cta-form-label">I am a</label>
                        <select name="title" class="cta-form-select">
                            <option value="Farmer / Agribusiness">Farmer / Agribusiness</option>
                            <option value="Financial Institution / Insurer">Financial Institution / Insurer</option>
                            <option value="Government / Policy Maker">Government / Policy Maker</option>
                            <option value="Researcher / Academic">Researcher / Academic</option>
                            <option value="Corporate / ESG Professional">Corporate / ESG Professional</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="cta-form-group">
                        <label class="cta-form-label">Tell us about your needs (optional)</label>
                        <textarea name="comment" class="cta-form-textarea" placeholder="Share any specific requirements or questions..."></textarea>
                    </div>
                    
                    <button type="submit" class="cta-form-submit">Request Demo</button>
                    
                    <p class="cta-form-privacy">By submitting, you agree to our privacy policy.</p>
                    
                    <div class="cta-form-results"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ctaDemoForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = form.querySelector('.cta-form-results');
            resultsDiv.innerHTML = '<div style="text-align:center;color:#6b7280;">Sending request...</div>';
            
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    resultsDiv.innerHTML = '<div style="text-align:center;color:#10b981;font-weight:500;">' + data.message + '</div>';
                    form.reset();
                } else {
                    resultsDiv.innerHTML = '<div style="text-align:center;color:#ef4444;">' + (data.message || 'Something went wrong. Please try again.') + '</div>';
                }
            })
            .catch(error => {
                resultsDiv.innerHTML = '<div style="text-align:center;color:#ef4444;">Network error. Please try again.</div>';
            });
        });
    }
});
</script>
