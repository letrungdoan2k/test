<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/abc', function () {

    $data_array =  array(
        "variables"        => '{"after":null,"before":null,"displayCommentsFeedbackContext":"{\"bump_reason\":0,\"comment_expand_mode\":1,\"comment_permalink_args\":{\"comment_id\":null,\"reply_comment_id\":null,\"filter_non_supporters\":null},\"feed_location\":5,\"interesting_comment_fbids\":[],\"is_location_from_search\":false,\"last_seen_time\":null,\"log_ranked_comment_impressions\":true,\"probability_to_comment\":0,\"story_location\":9,\"story_type\":0}","displayCommentsContextEnableComment":false,"displayCommentsContextIsAdPreview":false,"displayCommentsContextIsAggregatedShare":false,"displayCommentsContextIsStorySet":false,"feedLocation":"PERMALINK","feedbackID":"ZmVlZGJhY2s6NDc1MzEzOTYxMzM2MDYx","feedbackSource":2,"first":null,"focusCommentID":null,"includeNestedComments":true,"initialViewOption":null,"isInitialFetch":false,"isComet":false,"containerIsFeedStory":true,"containerIsWorkplace":false,"containerIsLiveStory":false,"containerIsTahoe":false,"last":null,"scale":1.5,"topLevelViewOption":null,"useDefaultActor":true,"viewOption":"RECENT_ACTIVITY","UFI2CommentsProvider_commentsKey":null}',
        "doc_id"         => '5675306872558879',
    );
    $make_call = callAPI('POST', 'http://www.facebook.com/api/graphql/', json_encode($data_array));

    dd($make_call);

    return view('welcome');
});

function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 111111111111111111111',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}

