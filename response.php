<?php

$url = $_GET['url'];
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = parse_url($url);
$niceUrl = $url['scheme'] . '://' . $url['host'] . $url['path'];
$url = $niceUrl . '.json';

$data = file_get_contents($url);

echo "<script>console.log('$data')</script>";

$data = json_decode($data, true);
$data = $data[0]['data']['children'][0];

$kind = $data['kind']; // https://www.reddit.com/dev/api#fullnames
if( $kind !== 't1' && $kind !== 't3' ) {
    die('Error: Provided link is not a post or comment');
}

$awards = $data['data']['all_awardings'];
$upvotes = $data['data']['ups'];
$title = $data['data']['title'];
$subreddit = $data['data']['subreddit_name_prefixed'];
$author = $data['data']['author'];

foreach($awards as $award) {
    $output[] = [
        'name' => $award['name'],
        'description' => $award['description'],
        'total_price' => $award['coin_price'] * $award['count'],
        'total_premium_days' => $award['days_of_premium'] * $award['count'],
        'total_reward' => $award['coin_reward'] * $award['count'],
        'icon' => $award['resized_icons'][1]['url'],
        'count' => $award['count']
    ];
    
    $smallOutput[] = [
        'name' => $award['name'],
        'icon' => $award['resized_icons'][1]['url'],
        'count' => $award['count'],
        'price' => number_format($award['coin_price']),
        'description' => str_replace('%{coin_symbol}', '', $award['description'])
    ];
}

if( empty($output) ) {
    echo '<p class="error">Something went wrong. Double check the URL and try again. If this keeps happening, message u/jeromepaulos on Reddit, or fork his shitty code on GitHub and fix it yourself.</p>';
    die;
}

$totalPrice = array_sum( array_column( $output, 'total_price' ) );
$totalReward = array_sum( array_column( $output, 'total_reward' ) );
$totalPremiumDays = array_sum( array_column( $output, 'total_premium_days' ) );
$totalAwards = $data['data']['total_awards_received'];

$maxCoinPrice = 1.99 / 500; // $1.99 per 500 coins
$minCoinPrice = 99.99 / 40000; // $99.99 per 40,000 coins

$result = [
    'min_price' => '$' . number_format( $totalPrice * $minCoinPrice, 2 ),
    'max_price' => '$' . number_format( $totalPrice * $maxCoinPrice, 2 ),
    'days_of_premium' => number_format($totalPremiumDays),
    'total_awards' => number_format($totalAwards),
    'total_reward' => number_format($totalReward),
    'title' => $title,
    'author' => $author,
    'url' => $niceUrl,
    'subreddit' => $subreddit,
    'awards' => $smallOutput,
    'total_coins' => number_format($totalPrice)
];

unset($awards);
foreach( $result['awards'] as $award ) {
    for($i = 0; $i < $award['count']; $i++) { 
        $awards[] = $award;
    }
}
// shuffle($awards); // Randomize awards

?>

        <div class="response">
            <div class="stats">
                <p>
                    Redditors have spent between <?php echo $result['min_price'] ?> and
                    <span class="stat"><?php echo $result['max_price'] ?></span>
                    (<?php echo $result['total_coins']; ?> coins) to buy this post
                    <span class="stat"><?php echo $result['total_awards'] ?> awards</span>
                    and reward the original poster with <?php echo $result['total_reward'] ?> coins and <?php echo $result['days_of_premium'] ?> days of premium.
                </p>
            </div>

            <div class="awards">
                <?php foreach( $awards as $award) { ?>
                <img class="award" src="<?php echo $award['icon']; ?>" data-name="<?php echo $award['name']; ?>" data-description="<?php echo $award['description']; ?>" data-price="<?php echo $award['price']; ?>">
                <?php } ?>
            </div>
        </div>

        <div class="tooltip">
            <div class="award-header">               
                <img src="">
                <h2 class="award-name"></h2>
            </div>
            <p class="award-description"></p>
            <span class="award-cost"></span>
        </div>