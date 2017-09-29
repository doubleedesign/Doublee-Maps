# Maps
A set of files that can be integrated into a theme to use an address custom post type and Advanced Custom Fields to populate a custom Google map.

### Requirements
* [Advanced Custom Fields plugin](https://www.advancedcustomfields.com)
* Correctly set text domain in style.css (it should be your theme folder name)

No particular theme is required. The folder/file structure here simply denotes where you would place the files in the current [Double-E Foundation](https://github.com/doubleedesign/Double-E-Foundation) file structure. It could be adjusted for use in other themes fairly easily.

### Setup steps
Files for all steps are included in this repo.
1. Create custom post type for addresses using `functions/custom-post-types/address.php`
2. Call `functions/custom-post-types/address.php` and `functions/maps/map-data.php` in your theme's functions.php
3. Import ACF fields (or create your own) using `acf-address-fields.json`. If you change these or create your own, you will need to edit the map builder files accordingly
4. Add the map to your desired template by calling `get_template_part('template-parts/map.php')`
5. Import `scss/theme/template-parts/_map.scss` into your style.scss
6. Compile CSS
7. Add some addresses in WordPress and watch the magic happen!

### Options
* To change the appearance of the map, edit `functions/maps/map-style.php`.
* To change the map pin icon, replace `assets/map-marker.svg`.
* To change the default centre point of the map, edit the lat and long for it in `template-parts/map.php` (Line 57 at the time of writing this).
* To change the inclusions and markup of the info windows that pop up when you click a pin, edit the `doublee_map_info_box` function in `functions/maps/map-data.php`.
* To limit the number of addresses shown or exclude specific addresses, edit the query in the `doublee_get_address_ids()` function in `functions/maps/map-data.php`.