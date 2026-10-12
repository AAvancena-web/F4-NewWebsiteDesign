<?php
/**
 * Site content data. Copy sourced from the current f4.co.nz website.
 *
 * Content lives here so templates stay clean and pages can be generated
 * automatically on theme activation. Page editor content (if any) is shown
 * in addition to these sections.
 *
 * @package F4
 */

defined( 'ABSPATH' ) || exit;

/**
 * Service divisions.
 */
function f4_services() {
	return array(
		'commercial-cleaning' => array(
			'title'    => 'Commercial Cleaning',
			'icon'     => 'sparkle',
			'image'    => 'service-commercial-cleaning.webp',
			'excerpt'  => 'Keep your workplace clean, safe, and ready for the people who use it every day. We clean offices, shops, warehouses, and shared sites across New Zealand.',
			'lead'     => 'Keep your workplace clean, safe, and ready for the people who use it every day. We clean offices, shops, warehouses, and shared sites across New Zealand. Book a regular clean, a one-off deep clean, or a plan built around your hours.',
			'overview' => array(
				'You need a clean workplace that supports your staff, your customers, and your daily work. We handle office cleaning, shared spaces, bathrooms, kitchens, hard floors, and site-specific plans.',
				'You set the schedule and we work around your hours. Book a regular clean, a one-off deep clean, or a plan shaped to your building. The same standard turns up every visit.',
			),
			'body'     => array(
				'You run a busy site. Your staff and customers notice when it is clean, and they notice faster when it is not. We keep your workplace tidy, safe, and ready for work every day so you never have to think about it.',
				'You pick the schedule. Choose a regular clean, a one-off deep clean, or a plan shaped around your opening hours and your building. We clean offices, reception areas, meeting rooms, bathrooms, kitchens, and hard floors.',
				'We use the right products for each surface and follow a clear checklist on every visit. Nothing gets skipped, and the same standard turns up each time.',
				'If your needs change, your plan changes with them. Add extra rooms, move your clean to a quieter time, or scale up before a busy season. You talk to one team and get one clear price.',
			),
			'book'     => array(
				'Office, reception, and shared-space cleaning',
				'Bathroom and kitchen cleaning and restocking',
				'Hard floors, carpets, and high-touch surfaces',
				'Window and glass cleaning',
				'Routine, one-off, and site-specific cleaning plans',
			),
			'why'      => array(
				array( 'icon' => 'building', 'title' => 'Daily presentation', 'text' => 'Floors, surfaces, and shared spaces stay clean for staff and visitors. Your site looks ready for work the moment people walk in.' ),
				array( 'icon' => 'shield', 'title' => 'Health and safety', 'text' => 'Clean bathrooms and kitchens lower the spread of germs. A tidy site keeps your team well and cuts sick days.' ),
				array( 'icon' => 'clock', 'title' => 'Flexible schedule', 'text' => 'We work early, late, or around your trading hours. Cleaning never gets in the way of your day.' ),
			),
			'franchise' => 'You can support offices, retail sites, shared facilities, commercial buildings, and workplaces with reliable cleaning services.',
		),
		'trade-painting'      => array(
			'title'    => 'Trade + Painting',
			'icon'     => 'roller',
			'image'    => 'service-trade-painting.webp',
			'excerpt'  => 'Refresh, repair, and maintain your property with one trade team. We handle interior and exterior painting, repairs, touch-ups, and general maintenance.',
			'lead'     => 'Refresh, repair, and maintain your property with one trade team. We handle interior and exterior painting, repairs, touch-ups, and general maintenance. Sort the small jobs before they turn into big ones.',
			'overview' => array(
				'You need small jobs handled before they turn into big ones. We take on repairs, interior and exterior painting, touch-ups, and general maintenance for commercial sites.',
				'One team does the lot. We prep properly, do the work, and leave the site clean. You get a clear price before we start.',
			),
			'body'     => array(
				'Small jobs grow into big ones when you leave them. A chipped wall, a sticking door, or a worn coat of paint says more about your business than you think. We handle the work before it costs you more.',
				'You get one team for interior and exterior painting and general property maintenance. We turn up on time, do the work, and leave the site clean and ready to use.',
				'We prep every surface properly before we paint, so the finish lasts and holds up to daily wear. You get straight lines, even coats, and colours that match what you asked for.',
				'Need a list of small fixes done in one visit? We take on the odd jobs most contractors skip, and we tell you the price before we start.',
			),
			'book'     => array(
				'Interior and exterior painting',
				'Wall, door, and surface repairs',
				'Touch-ups and patch work',
				'General property maintenance',
				'Small jobs handled before they grow',
			),
			'why'      => array(
				array( 'icon' => 'wrench', 'title' => 'Repairs and maintenance', 'text' => 'We fix wear and damage before it becomes a bigger bill. One visit sorts the list that has been waiting.' ),
				array( 'icon' => 'roller', 'title' => 'Interior and exterior painting', 'text' => 'We prep, paint, and finish properly. You get clean lines and a coat that holds up to daily use.' ),
				array( 'icon' => 'check-circle', 'title' => 'Small jobs sorted', 'text' => 'One team for the odd jobs most contractors skip. You get a clear price and a clean site.' ),
			),
			'franchise' => 'You can help businesses with painting, repairs, touch-ups, and property maintenance work.',
		),
		'exterior-wash'       => array(
			'title'    => 'Exterior Wash',
			'icon'     => 'droplet',
			'image'    => 'service-exterior-wash.webp',
			'excerpt'  => 'Bring back the first look of your site with a proper exterior wash. We clean buildings, paths, entrances, signage, and high-traffic areas.',
			'lead'     => 'Bring back the first look of your site with a proper exterior wash. We clean buildings, paths, entrances, signage, and high-traffic areas. We pick the right method for each surface so nothing gets damaged.',
			'overview' => array(
				'Your building exterior sets the first impression. We clean walls, paths, entrances, signage, and high-traffic areas, and we match the wash method to each surface.',
				'We strip grime from hard surfaces and stay gentle on cladding and paint. We also clear moss from walkways, so your entrance looks sharp and stays safe to walk on.',
			),
			'body'     => array(
				'Your building exterior is the first thing people see. Dirt, grime, and moss make a tired impression before anyone walks through the door. A clean front tells customers you take pride in the place.',
				'We clean paths, entrances, walls, signage, and high-traffic areas. We match the wash method to the surface, so we strip grime from concrete and stay gentle on cladding and paint.',
				'We clear slippery moss and algae from walkways, which lowers the risk of someone slipping at your entrance. Your site looks sharp and stays safe to walk on.',
				'Book a one-off wash or set a regular schedule to keep your site fresh through the seasons. You get a clear price and a clean result every time.',
			),
			'book'     => array(
				'Building and wall washing',
				'Pressure washing for hard surfaces',
				'Soft washing for delicate surfaces',
				'Paths, entrances, and car parks',
				'Signage and high-traffic areas',
			),
			'why'      => array(
				array( 'icon' => 'droplet', 'title' => 'Pressure washing', 'text' => 'We strip built-up grime from concrete, brick, and hard surfaces. Your site looks fresh again in one visit.' ),
				array( 'icon' => 'feather', 'title' => 'Soft washing', 'text' => 'We use a gentle wash for surfaces that pressure would damage. Cladding, paint, and signage stay safe and clean.' ),
				array( 'icon' => 'footprints', 'title' => 'Paths and entrances', 'text' => 'We clear moss and algae from walkways. Your entrance looks welcoming and stays safe underfoot.' ),
			),
			'franchise' => 'You can provide pressure washing, soft washing, building washing, entrance cleaning, pathway cleaning, and exterior presentation services.',
		),
		'hvac-services'       => array(
			'title'    => 'HVAC Services',
			'icon'     => 'fan',
			'image'    => 'service-hvac.webp',
			'excerpt'  => 'Keep your site comfortable and your running costs down with regular HVAC care. We service and maintain heating, cooling, and airflow for commercial spaces.',
			'lead'     => 'Keep your site comfortable and your running costs down with regular HVAC care. We service and maintain heating, cooling, and airflow for commercial spaces. Steady systems keep your staff and customers happy.',
			'overview' => array(
				'Your building needs steady heating, cooling, and airflow. We service and maintain HVAC for commercial spaces so your site stays comfortable through every season.',
				'Regular care keeps running costs down and catches faults early. We set a schedule that suits your site and keep clear records of every visit.',
			),
			'body'     => array(
				'Your building needs steady heating, cooling, and airflow. When the system fails, work slows and everyone notices. Regular care keeps your site comfortable and stops small faults turning into breakdowns.',
				'We service and maintain HVAC for offices, shops, and commercial spaces. We check, clean, and tune your system so it runs the way it should through every season.',
				'A well-maintained system uses less power and costs you less to run. We catch worn parts early, which saves you the price of an emergency callout later.',
				'We set a service schedule that suits your site and keep clear records of every visit. You always know the state of your system and when the next check is due.',
			),
			'book'     => array(
				'HVAC servicing and maintenance',
				'Heating and cooling support',
				'Filter cleaning and replacement',
				'Airflow and performance checks',
				'Scheduled care for commercial sites',
			),
			'why'      => array(
				array( 'icon' => 'settings', 'title' => 'Servicing and maintenance', 'text' => 'Routine care keeps your system running well. We catch faults early so you avoid costly breakdowns.' ),
				array( 'icon' => 'thermometer', 'title' => 'Heating and cooling', 'text' => 'We keep a comfortable temperature for staff and customers all year. The system stays steady through summer and winter.' ),
				array( 'icon' => 'wind', 'title' => 'Airflow checks', 'text' => 'We test and clean for clean, steady airflow across your whole space. Better air means a healthier site.' ),
			),
			'franchise' => 'You can support commercial properties with HVAC servicing, maintenance, and practical facility support.',
		),
	);
}

/**
 * Get a single service by slug.
 *
 * @param string $slug Service slug.
 * @return array|null
 */
function f4_get_service( $slug ) {
	$services = f4_services();
	return isset( $services[ $slug ] ) ? $services[ $slug ] : null;
}

/**
 * The four F values.
 *
 * @param string $context 'customer' or 'franchise'.
 */
function f4_values( $context = 'customer' ) {
	if ( 'franchise' === $context ) {
		return array(
			array( 'word' => 'Fast', 'icon' => 'bolt', 'text' => 'You can respond quickly and keep customers updated.' ),
			array( 'word' => 'Focused', 'icon' => 'target', 'text' => 'You can work with clear systems, practical standards, and service-specific support.' ),
			array( 'word' => 'Flexible', 'icon' => 'sliders', 'text' => 'You can build around your territory, your service focus, and your approved business plan.' ),
			array( 'word' => 'Flawless', 'icon' => 'award', 'text' => 'You can deliver clean, consistent, and professional work under the F4 standard.' ),
		);
	}
	return array(
		array( 'word' => 'Fast', 'icon' => 'bolt', 'text' => 'You get clear communication and quick response times.' ),
		array( 'word' => 'Focused', 'icon' => 'target', 'text' => 'You work with a team that understands your site, your schedule, and your standard.' ),
		array( 'word' => 'Flexible', 'icon' => 'sliders', 'text' => 'You can choose service plans that fit your property, business hours, and budget.' ),
		array( 'word' => 'Flawless', 'icon' => 'award', 'text' => 'You get consistent work, clean presentation, and a team that takes pride in the result.' ),
	);
}

/**
 * Franchise locations.
 */
function f4_locations() {
	return array(
		'auckland'     => array(
			'name' => 'Auckland',
			'why'  => 'Auckland has offices, retail sites, industrial properties, hospitality businesses, and managed commercial buildings. These sites need consistent service providers who communicate well and deliver reliable work.',
		),
		'christchurch' => array(
			'name' => 'Christchurch',
			'why'  => 'Christchurch has a growing mix of new commercial builds, offices, retail centres, and industrial sites. These properties need service providers who turn up on time, communicate clearly, and keep a consistent standard.',
		),
		'wellington'   => array(
			'name' => 'Wellington',
			'why'  => 'Wellington has government offices, corporate buildings, hospitality venues, and retail sites packed into a busy city. These sites need dependable service providers who work around business hours and deliver reliable results.',
		),
		'nelson'       => array(
			'name' => 'Nelson',
			'why'  => 'Nelson has a strong base of local businesses, retail sites, hospitality venues, and commercial properties. These sites value local service providers who build lasting relationships and deliver consistent work.',
		),
		'dunedin'      => array(
			'name' => 'Dunedin',
			'why'  => 'Dunedin has offices, education facilities, retail sites, hospitality businesses, and commercial buildings. These sites need consistent service providers who communicate well and keep their premises presentable.',
		),
	);
}

/**
 * Partner logos.
 */
function f4_partners() {
	return array(
		array( 'name' => 'Parachute Insurance', 'file' => 'parachute.png' ),
		array( 'name' => 'Black & White Coffee Cartel', 'file' => 'blackwhite-coffee.png' ),
		array( 'name' => 'MTF Finance', 'file' => 'mtf-finance.png' ),
		array( 'name' => 'Kennards Hire', 'file' => 'kennards-hire.png' ),
		array( 'name' => 'Anytime Fitness NZ', 'file' => 'anytime-fitness.png' ),
		array( 'name' => 'Digital Influence', 'file' => 'digital-influence.png' ),
		array( 'name' => 'Ecochem', 'file' => 'ecochem.png' ),
		array( 'name' => 'Kai Co', 'file' => 'kaico.png' ),
	);
}

/**
 * How it works steps.
 */
function f4_process() {
	return array(
		array( 'title' => 'Tell us about your site', 'text' => 'Send a quick enquiry or call our 0800 line. Let us know the site, the service, and the timing you need.' ),
		array( 'title' => 'We scope the job', 'text' => 'We talk through your property, your hours, and your standard so nothing gets missed.' ),
		array( 'title' => 'Get a clear plan and price', 'text' => 'You receive a clear plan and one clear price before any work starts. No surprises.' ),
		array( 'title' => 'One team gets to work', 'text' => 'Branded, service-specific teams turn up on time and deliver the same standard every visit.' ),
	);
}

/**
 * Franchise lists.
 */
function f4_franchise_benefits() {
	return array(
		'Established brand with proven systems',
		'Comprehensive training and support',
		'Marketing and operational support',
		'Access to preferred suppliers',
		'Protected territory',
		'Ongoing business development',
	);
}

function f4_franchise_looking_for() {
	return array(
		'Strong work ethic',
		'Commitment to excellence',
		'Communication skills',
		'Customer service focus',
		'Business management skills',
		'Financial capacity to invest',
	);
}

/**
 * Franchise FAQs.
 *
 * @param string $city Optional city name for location pages.
 */
function f4_franchise_faqs( $city = '' ) {
	if ( $city ) {
		$a = preg_match( '/^[AEIOU]/i', $city ) ? 'an' : 'a';
		return array(
			array( 'q' => "Is {$city} available for an F4 franchise?", 'a' => "Yes. F4 is taking enquiries for {$city}. Submit the enquiry form and the team will confirm current availability and territory options." ),
			array( 'q' => "What services can {$a} {$city} F4 franchise offer?", 'a' => 'You can focus on commercial cleaning, HVAC services, trade and painting, exterior washing, or an approved service mix.' ),
			array( 'q' => "Who should apply for {$a} {$city} franchise?", 'a' => 'People with a strong work ethic, good communication, a customer service focus, and the readiness to run a business using proven systems.' ),
			array( 'q' => "Can I run more than one F4 service in {$city}?", 'a' => 'Yes, subject to F4 approval, training, territory, and operational capacity.' ),
			array( 'q' => "How do I apply for {$a} {$city} F4 franchise?", 'a' => 'Submit the franchise enquiry form and F4 will contact you about the next steps.' ),
		);
	}
	return array(
		array( 'q' => 'What F4 franchise opportunities are available?', 'a' => 'F4 franchise opportunities include commercial cleaning, HVAC services, trade and painting, exterior washing, or an approved service mix.' ),
		array( 'q' => 'Can I choose my city?', 'a' => 'Yes. You can enquire about Auckland, Christchurch, Wellington, Nelson, or Dunedin franchise opportunities.' ),
		array( 'q' => 'Do I need experience?', 'a' => 'Experience helps, but F4 looks at your work ethic, communication, business readiness, and ability to follow systems.' ),
		array( 'q' => 'Can I operate more than one service?', 'a' => 'Yes, subject to F4 approval, training, territory, and operational capacity.' ),
		array( 'q' => 'How do I apply?', 'a' => 'Submit the franchise enquiry form and F4 will contact you about the next steps.' ),
	);
}
