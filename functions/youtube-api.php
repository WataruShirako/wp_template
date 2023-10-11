<?php

// page-youtube.phpで使用
function youtube_search()
{
    // YouTubeチャンネルのIDとAPIキーは安全な場所から取得
    $youtube_id = getenv('YOUTUBE_ID');
    $api_key = getenv('YOUTUBE_API_KEY');

    $num = 15;
    $order = 'date';

    $youtube_api = 'https://www.googleapis.com/youtube/v3/';
    $youtube_api .= 'search';
    $youtube_api .= '?part=snippet&maxResults=' . $num . '&order=' . $order;
    $youtube_api .= '&channelId=' . $youtube_id;
    $youtube_api .= '&key=' . $api_key;

    $option = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30
    ];

    if (false === ($youtube_data = get_transient('youtube_data'))) {
        $ch = curl_init($youtube_api);
        curl_setopt_array($ch, $option);
        $json = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code !== 200) {
            error_log("YouTube API request failed with status code {$http_code}");
            return false;
        }

        try {
            $youtube_data = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            error_log('JSON decode error: ' . $e->getMessage());
            return false;
        }

        if (curl_errno($ch)) {
            error_log('Curl error: ' . curl_error($ch));
            $youtube_data = false;
        }

        curl_close($ch);

        set_transient('youtube_data', $youtube_data, 24 * HOUR_IN_SECONDS);
    }

    return $youtube_data;
}
