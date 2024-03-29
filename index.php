<?php

/**
	*Ottawa Mapped
	*Displays the list and map for the Open Data Set
	*
	*@package ca.tracyk.opp-data-app
	*@copyright 2012 Tracy K. Designs
	*@author Tracy Karnabi <tracy@tracykarnabi.com>
	*@link https://github.com/tracyk/open-data-app
	*license New BSD License 
 */
 
require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, latitude, longitude, address
	FROM ottawamapped
	ORDER BY name ASC
');

include 'includes/theme-top.php';

?>
<!--<div class="banner"> 
	<img src="images/ottawa-mapped-banner.jpg"  alt="main banner in the document"/> 
</div>-->
	
<a href="admin/index.php">Admin Login</a>



<ol class="mapped">
<?php foreach ($results as $volley) : ?>
	<li itemscope itemtype="http://schema.org/TouristAttraction">
		<a href="single.php?id=<?php echo $volley['id']; ?>" itemprop="name"><?php echo $volley['name']; ?></a>
		<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			<meta itemprop="latitude" content="<?php echo $volley['latitude']; ?>">
			<meta itemprop="longitude" content="<?php echo $volley['longitude']; ?>">
		</span>
	</li>
<?php endforeach; ?>
</ol>

<div id="map"></div>

<?php

include 'includes/theme-bottom.php';

?>

