jQuery(document).ready(function($) {
    function checkSelectedPosts() {
        var currentPostId = $('input[name="post_ID"]').val();

        if (currentPostId) {
            $.ajax({
                url: ajaxurl,
                method: 'POST',
                data: {
                    action: 'check_selected_posts',
                    current_post_id: currentPostId
                },
                success: function(response) {
                    console.log("Server response:", response);
                    try {
                        var posts = typeof response === 'string' ? JSON.parse(response) : response;
                        // console.log("Parsed posts:", posts);
                        if (posts.length > 0) {
                            posts.map(function(post) {
                                $id = post.ID;
                                $title = post.post_title;
                            });
                            var boxContent = '<div class="errorBox">\n' +
                                '    <div class="boxContent">\n' +
                                '        <h2 class="title">There are articles selected</h2>\n' +
                                '        <p class="id-post"><span>Post ID: </span>'+ $id +'</p>\n' +
                                '        <p class="text"><span>Post Title: </span>'+ $title +'</p>\n' +
                                '        <span class="btn-close"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                                '<path d="M1.59912 1.86279L15.5991 15.8628" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round"/>\n' +
                                '<path d="M15.5991 1.86279L1.59912 15.8628" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round"/>\n' +
                                '</svg>\n</span>\n' +
                                '    </div>\n' +
                                '    <div class="bg-mask"></div>\n' +
                                '</div>';
                            $(boxContent).insertAfter($("#wpwrap"));
                        }
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            });
        }
    }

    function checkSelectedPostsPopular() {
        var currentPostId = $('input[name="post_ID"]').val();

        if (currentPostId) {
            $.ajax({
                url: ajaxurl,
                method: 'POST',
                data: {
                    action: 'check_selected_posts_popular',
                    current_post_id: currentPostId
                },
                success: function(response) {
                    console.log("Server response:", response);
                    try {
                        var posts = typeof response === 'string' ? JSON.parse(response) : response;
                        // console.log("Parsed posts:", posts);
                        if (posts.length > 0) {
                            var titles = response.map(function(post) {
                                return '<li class="item-post">\n' +
                                    '       <p class="id-post"><span>Post ID: </span>'+ post.ID +'</p>\n' +
                                    '       <p class="text"><span>Post Title: </span>'+ post.post_title +'</p>\n' +
                                    '    </li>';
                            });
                            var boxContent = '<div class="errorBox">\n' +
                                '    <div class="boxContent">\n' +
                                '        <h2 class="title">There are articles selected</h2>\n' +
                                '        <ul class="list-post">'+ titles.join(' ') +'</ul>\n' +
                                '        <span class="btn-close">\n' +
                                '            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                                '                <path d="M1.59912 1.86279L15.5991 15.8628" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round"/>\n' +
                                '                <path d="M15.5991 1.86279L1.59912 15.8628" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round"/>\n' +
                                '            </svg>\n' +
                                '        </span>\n' +
                                '    </div>\n' +
                                '    <div class="bg-mask"></div>\n' +
                                '</div>';
                            $(boxContent).insertAfter($("#wpwrap"));
                        }
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            });
        }
    }

    // Theo dõi sự kiện click vào checkbox
    $(document).on('change', '.acf-field[data-name="select_this_post_slider"] input[type="checkbox"]', function() {
        if ($(this).is(':checked')) {
            checkSelectedPosts();
        }
    });

    $(document).on('change', '.acf-field[data-name="select_popular_posts"] input[type="checkbox"]', function() {
        if ($(this).is(':checked')) {
            checkSelectedPostsPopular();
        }
    });

    $( "body" ).delegate( ".errorBox .boxContent .btn-close, .errorBox .bg-mask", "click", function() {
        $(".errorBox").remove();
    });


});