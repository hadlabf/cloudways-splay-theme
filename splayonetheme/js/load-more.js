jQuery(document).ready(function($) {
    $('.load-more-button').on('click', function() {
        var button = $(this);
        var page = button.data('page');
        var nextPage = parseInt(page) + 1;

        $.ajax({
            url: load_more_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_news_articles',
                page: nextPage,
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                if (response) {
                    button.text('Load more');
                    button.data('page', nextPage);
                    $('.news_scrool_feed').append(response);
                } else {
                    button.remove();
                }
                if (response.trim() === '') {
                    $('.load-more-button').hide();
                }
            },
            error: function() {
                button.text('Load more');
                alert('Error loading more posts.');
            },
        });
    });
});
