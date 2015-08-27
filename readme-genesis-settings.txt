After you install Genesis -- see readme-themes.txt -- you will need to configure the following Genesis settings within Wordpress:


## 1. Enable logo image on homepage
1. Click the "Genesis" menu item on the Wordpress admin menu, by default of the left side of the screen.
2. Scroll down to the Header section
3. Select "Image logo" from the drop down menu.
4. Scroll down and press the "Save Settings" button.


## 2. Limit pages to one H1 tag, for better formatting and better SEO
1. Select the "Genesis" menu item on the Wordpress admin menu.
2. Look for the "SEO Settings" menu item, and select it.
  1a. If you are using an SEO plugin such as Yoast SEO, you might not see the Genesis SEO Settings menu option. If this menu option does not appear, then skip the rest of these steps. You might need to configure your SEO plugin to prevent multiple H1 tags per page.
3. Disable the option "[ ] Use semantic HTML5 page and section headings throughout site".
4. Within the "Homepage Settings" section, select "(x) Neither. I'll manually wrap my own text on the homepage".


## 3. Add Custom Footer Code
1. Select the "Genesis" menu item on the Wordpress admin menu.
2. Look for the "Simple Edits" menu item, and select it.
3. Within the "Footer Output" section, enable the option "[x] Modify Entire Footer Text (including markup)"
4. In the "Footer Output" text field, enter this code:

[itdp-search text="Search ITDP ..."]
<div class="logo-contact">
	<div class="logo"><a href="/"><img src="/wp-content/themes/itdp-responsive/images/logo-itdp-562x98-trans-ddd.png" alt="ITDP, the Institute for Transportation and Development Policy, logo in gray" width="281" height="49" /></a></div>
	<ul class="contact-info">
		<li>9 East 19th Street, 7th Floor, New York, NY 10003 USA</li>
		<li><a href="tel:+12126298001">phone +1-212-629-8001</a></li>
		<li><a href="mailto:mobility@itdp.org">mobility@itdp.org</a></li>
	</ul>
</div>
<ul class="charity-designations">
	<li class="cfc"><a href="/support-us/earthshare/"><img src="/wp-content/themes/itdp-responsive/images/footer-logo-cfc-grayscale-240x72.png" alt="ITDP participates in the Combined Federal Campaign, participant # 10723"></a></li>
	<li class="charnav"><a href="http://www.charitynavigator.org/index.cfm?bay=search.summary&orgid=8014#.VSfqOvnF-Sq"><img src="/wp-content/themes/itdp-responsive/images/footer-logo-charnav-four-star-grayscale-trans-360x100.png" alt="ITDP is a Charity Navigator Four Star Charity" /></a></li>
</ul>
<div class="footer-privacy"><a href="/itdp-policy-for-protecting-your-online-privacy/">Privacy Policy</a></div>
<div class="footer-copyright">[footer_copyright] ITDP</div>