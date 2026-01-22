<?php
// ---------------- FLIGHT DATA ----------------
$flights = [
    // Domestic (Philippines)
    [
        "flightNo"=>"PR 2831",
        "airline"=>"Philippine Airlines",
        "origin"=>"MNL",
        "destination"=>"CEB",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Manila",
        "dep"=>"2026-01-25 08:00",
        "duration"=>90,
        "type"=>"Domestic",
        "img"=>"https://www.cebu.gov.ph/wp-content/uploads/2025/09/Mactan-Shrine-1_optimized-e1724137067295.webp"
],
    [
        "flightNo"=>"5J 412",
        "airline"=>"Cebu Pacific",
        "origin"=>"MNL",
        "destination"=>"DVO",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Manila",
        "dep"=>"2026-01-25 10:30",
        "duration"=>120,
        "type"=>"Domestic",
        "img"=>"https://www.lumina.com.ph/assets/news-and-blogs-photos/Investment-Opportunities-in-Davao-Join-the-Regions-Thriving-Industries-and-Businesses/Investment-Opportunities-in-Davao-Join-the-Regions-Thriving-Industries-and-Businesses.webp"
    ],
    [
        "flightNo"=>"Z2 701",
        "airline"=>"AirAsia PH",
        "origin"=>"CRK",
        "destination"=>"ILO",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Manila",
        "dep"=>"2026-01-25 13:00",
        "duration"=>70,
        "type"=>"Domestic",
        "img"=>"https://www.allproperties.com.ph/wp-content/uploads/2022/01/House-and-Lot-for-sale-in-Iloilo-Photo-Credit-Scholarris20-scaled-1.jpg"
    ],
    [
        "flightNo"=>"PR 186",
        "airline"=>"Philippine Airlines",
        "origin"=>"MNL",
        "destination"=>"PPS",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Manila",
        "dep"=>"2026-01-25 15:45",
        "duration"=>80,
        "type"=>"Domestic",
        "img"=>"https://www.pelago.com/img/destinations/puerto-princesa/1011-1024_puertoprincesa.jpg"
    ],
    [
        "flightNo"=>"5J 921",
        "airline"=>"Cebu Pacific",
        "origin"=>"MNL",
        "destination"=>"BCD",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Manila",
        "dep"=>"2026-01-25 18:20",
        "duration"=>85,
        "type"=>"Domestic",
        "img"=>"https://www.bacolodlifestyle.com/wp-content/uploads/2019/10/Top-10-Tourist-Destinations-in-Bacolod-City.jpg"
    ],

    // International
    [
        "flightNo"=>"PR 426",
        "airline"=>"Philippine Airlines",
        "origin"=>"MNL",
        "destination"=>"NRT",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Tokyo",
        "dep"=>"2026-01-26 07:00",
        "duration"=>260,
        "type"=>"International",
        "img"=>"https://cdn.gaijinpot.com/app/uploads/sites/6/2018/06/narita-omotesando-1024x683.jpg"
    ],
    [
        "flightNo"=>"SQ 917",
        "airline"=>"Singapore Airlines",
        "origin"=>"MNL",
        "destination"=>"SIN",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Singapore",
        "dep"=>"2026-01-26 09:40",
        "duration"=>230,
        "type"=>"International",
        "img"=>"https://img.freepik.com/free-photo/merlion-statue-cityscape-singapore_335224-666.jpg?semt=ais_user_personalization&w=740&q=80"
    ],
    [
        "flightNo"=>"CX 902",
        "airline"=>"Cathay Pacific",
        "origin"=>"MNL",
        "destination"=>"HKG",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Hong_Kong",
        "dep"=>"2026-01-26 12:15",
        "duration"=>150,
        "type"=>"International",
        "img"=>"https://ik.imgkit.net/3vlqs5axxjf/external/http://images.ntmllc.com/v4/destination/Hong-Kong/Hong-Kong-city/112086_SCN_HongKong_iStock466733790_Z8C705.jpg?tr=w-1200%2Cfo-auto"
    ],
    [
        "flightNo"   => "5J 40",
        "airline"    => "Cebu Pacific",
        "origin"     => "MNL",
        "destination"=> "SYD",
        "originTZ"   => "Asia/Manila",
        "destTZ"     => "Australia/Sydney",
        "dep"        => "2026-01-26 16:00",
        "duration"   => 480, 
        "type"       => "International",
        "img"        => "https://media.cntraveler.com/photos/66fab90f7bc8273eecca8b44/16:9/w_2560%2Cc_limit/1093537-134.jpg"
    ],
    [
        "flightNo"=>"EK 337",
        "airline"=>"Emirates",
        "origin"=>"MNL",
        "destination"=>"DXB",
        "originTZ"=>"Asia/Manila",
        "destTZ"=>"Asia/Dubai",
        "dep"=>"2026-01-26 23:10",
        "duration"=>560,
        "type"=>"International",
        "img"=>"https://media.cntravellerme.com/photos/68b6f73e5582520a305ec87b/16:9/w_2560%2Cc_limit/1225427289"
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Flight Schedule</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<header>
<h1>Flight Schedule Dashboard</h1>
<p>Domestic & International Flights</p>
</header>

<main>
<div class="grid">
<?php foreach($flights as $f):
    $dep = new DateTime($f['dep'], new DateTimeZone($f['originTZ']));
    $arr = clone $dep;
    $arr->modify('+' . $f['duration'] . ' minutes');
    $arr->setTimezone(new DateTimeZone($f['destTZ']));

    $interval = $dep->diff($arr);
?>
<div class="card">
    <img src="<?= $f['img'] ?>" alt="flight">
    <div class="content">
        <span class="badge"><?= $f['type'] ?></span>
        <h3><?= $f['flightNo'] ?> – <?= $f['airline'] ?></h3>
        <p><strong><?= $f['origin'] ?></strong> → <strong><?= $f['destination'] ?></strong></p>
        <p class="small">Departure: <?= $dep->format('M d, Y h:i A') ?> (<?= $f['originTZ'] ?>)</p>
        <p class="small">Arrival: <?= $arr->format('M d, Y h:i A') ?> (<?= $f['destTZ'] ?>)</p>
        <p class="small">Duration: <?= $interval->h ?>h <?= $interval->i ?>m</p>
    </div>
</div>
<?php endforeach; ?>
</div>

<h2 style="margin-top:40px">Other Timezones (Current Time)</h2>
<ul>
<?php
$zones = ['Asia/Manila','Asia/Tokyo','Asia/Singapore'];
foreach($zones as $z){
    $now = new DateTime('now', new DateTimeZone($z));
    echo "<li>$z: " . $now->format('h:i A') . "</li>";
}
?>
</ul>
</main>

<footer>
<p>© 2026 Flight Schedule Project | Lobo Jenson Kristofer</p>
</footer>
</body>
</html>
