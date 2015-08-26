After you install Genesis -- see readme-themes.txt -- you will need to configure the following Genesis settings within Wordpress:

Genesis (top level of admin menu) > Header > select "Image logo"

Genesis > Simple Edits (menu item) > Footer Output
> enable "[x] Modify Entire Footer Text (including markup)?"
> enter this code:

[itdp-search]
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