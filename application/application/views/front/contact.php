<form id="contactForm" action="<?= site_url('contact/submit') ?>" method="POST">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="text" name="phone" placeholder="Your Phone" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="comment" placeholder="Your Message" required></textarea>

    <button type="submit">Send Message</button>
</form>

<div class="form-results d-none"></div>
<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                $('.form-results').removeClass('d-none').html('<div class="alert alert-success">' + response.message + '</div>');
            },
            error: function(xhr, status, error) {
                console.error("XHR error: ", xhr.responseText);
                $('.form-results').removeClass('d-none').html('<div class="alert alert-danger">Error sending message.</div>');
            }
        });
    });
});
</script>
    