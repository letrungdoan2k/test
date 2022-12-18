<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Laravel</title>
</head>
<body class="antialiased">
<script
    src="https://code.jquery.com/jquery-3.6.2.js"
    integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
    let config = {
        headers: {
            "Content-Type": "application/json",
            'Access-Control-Allow-Origin': '*',
        }
    }

    axios.post('http://www.facebook.com/api/graphql/', {
        variables: '{"after":null,"before":null,"displayCommentsFeedbackContext":"{\"bump_reason\":0,\"comment_expand_mode\":1,\"comment_permalink_args\":{\"comment_id\":null,\"reply_comment_id\":null,\"filter_non_supporters\":null},\"feed_location\":5,\"interesting_comment_fbids\":[],\"is_location_from_search\":false,\"last_seen_time\":null,\"log_ranked_comment_impressions\":true,\"probability_to_comment\":0,\"story_location\":9,\"story_type\":0}","displayCommentsContextEnableComment":false,"displayCommentsContextIsAdPreview":false,"displayCommentsContextIsAggregatedShare":false,"displayCommentsContextIsStorySet":false,"feedLocation":"PERMALINK","feedbackID":"ZmVlZGJhY2s6NDc1MzEzOTYxMzM2MDYx","feedbackSource":2,"first":null,"focusCommentID":null,"includeNestedComments":true,"initialViewOption":null,"isInitialFetch":false,"isComet":false,"containerIsFeedStory":true,"containerIsWorkplace":false,"containerIsLiveStory":false,"containerIsTahoe":false,"last":null,"scale":1.5,"topLevelViewOption":null,"useDefaultActor":true,"viewOption":"RECENT_ACTIVITY","UFI2CommentsProvider_commentsKey":null}',
        doc_id: '5675306872558879'
    }, config)
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
</script>
</body>
</html>
