jQuery(document).ready(function($) {
    // Newsletter form submission
    $('#newsletter-form').on('submit', function(e) {
        e.preventDefault();
        var email = $(this).find('input[name="newsletter_email"]').val();
        var form = $(this);
        
        $.ajax({
            url: gameconsolez_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'newsletter_submit',
                newsletter_email: email
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data.message);
                    form[0].reset();
                } else {
                    alert(response.data.message);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
    
    // Update cart count when product is added
    $(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
        // Update cart count in header
        if (fragments && fragments['.cart-count']) {
            $('.cart-count').html(fragments['.cart-count']);
        } else {
            // Fallback: reload cart count via AJAX
            $.ajax({
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'get_refreshed_fragments'),
                type: 'POST',
                success: function(data) {
                    if (data.fragments) {
                        $.each(data.fragments, function(key, value) {
                            $(key).replaceWith(value);
                        });
                    }
                }
            });
        }
    });
    
    // Search toggle functionality
    $('.search-toggle').on('click', function() {
        // You can add search functionality here
        alert('Search functionality - to be implemented');
    });
});
