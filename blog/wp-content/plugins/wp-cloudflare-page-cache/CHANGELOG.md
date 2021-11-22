#####   Version 4.5.7 (2021-11-02)

* Further optimized the worker code and extended the handled server response codes to cover edge case scenarios
* Improved worker update by making sure the worker code is updated when the plugin is updated

##### [Version 4.5.6](https://github.com/Codeinwp/WP-Cloudflare-Super-Page-Cache/compare/v4.5.5...v4.5.6) (2021-10-28)

* Remove serialize() & unserialize() from saving options data as WP already does it automatically. 
* Improve admin area loading scripts, making sure that on the backend the plugin scripts are not loaded where it is not needed for example customizer pages, oxygen visual page builder pages etc.
* Added a much more robust and updated version of the Worker Script which does the same thing as previously but now is more robust with multiple exception handling across every possible edge case and to ensure the worker script never throws an unhandled exception no matter what is thrown at it. Also now when a page cache is bypassed due to the default bypass cookie, in the response header under the x-wp-cf-super-cache-worker-bypass-reason it will show you the name of the default cookie for which the cache has been bypassed.
* Improve worker update by making sure when someone updates the plugin, the worker script is also gets updated.

##### [Version 4.5.5](https://github.com/Codeinwp/WP-Cloudflare-Super-Page-Cache/compare/v4.5.4...v4.5.5) (2021-08-05)

* Remove readonly from swcfpc_cf_apitoken_domain

##### [Version 4.5.4](https://github.com/Codeinwp/WP-Cloudflare-Super-Page-Cache/compare/v4.5.3...v4.5.4) (2021-08-04)

- Updated Sweetalert to v11.0.18
- Adding ability to add more custom URLs in the list of related urls and also giving the ability to remove the home page from the list of related URLs with the help of constants
- Fix default value call for swcfpc_post_related_url_init filter
- Mistakenly added filter under the action section in FAQ
- Making sure we are not loading our plugin scripts on WooFunnels Order Bumps Page as it uses super old sweetheart, it creates compatibility issues
- Added missing $screen var on add_toolbar_items
- Bugfix for AMP standard mode admin pages
- Fixing CF API Token usage bug
- Making sure that the API Token domain field is read-only and cannot be typed as the domain name in that field is system generated

##### [Version 4.5.3](https://github.com/Codeinwp/WP-Cloudflare-Super-Page-Cache/compare/v4.5.2...v4.5.3) (2021-05-25)

- Fixing a bug related to CRON job
- Fixing a bug related to not loading the admin pages properly when AMP plugin is installed and Standard mode is selected
- Getting rid of Cloudflare __cfid cookie check as Cloudflare has deprecated it
- Making sure Sweetalerat is loaded locally instead of jsdeliver & also proper version number is mention in the code
- Updating sweetalert to v11.0.5
- Fixing a minor bug in backend.js related to a page reload upon activation of page caching
- Adding proper wp rocket filters to disable WP Rocket page caching when using this plugin. The previously documented filter is deprecated.

##### [Version 4.5.2](https://github.com/Codeinwp/WP-Cloudflare-Super-Page-Cache/compare/v4.5.1...v4.5.2) (2021-05-13)

- Adds compatibility with Swift Performance Pro
- Preload instantpage.min.js as a Module and not as Script
- Fix is_404 incorrect call
- Bypass caching on password-protected pages
