<?php
/*
Plugin Name: ITDP Donate Plugin
Description: Add a donation form anywhere (but preferably on the donation page) with the [donate] shortcode.
Version: 2.00.03
Author: Joe Westcott
Author URI: http://www.joewestcott.info/
Release Notes:
2.00.04	formatting: aligned top of amount selection list with "Amount" label
2.00.03 updated donation amount options per https://trello.com/c/Hu0mcFc9
2.00.02	reduce recurring option to monthly and annual
2.00.01 switch $35 donation amount to $40
2.00.00	mobile responsiveness!
1.11.00	removed Areas of Interest, adjusted border-radius and font colors
1.10.03	minimum donation text responsive font size
1.10.02	new donation amounts
1.10.01	brighter colors for errors
1.10	new donate-reveal-error shortcode
1.09.01	added 10px border radius to all fields with class inError
1.09	new Kell validation, fixed "fix errors" bug, and applied "numberonly" script to several fields
1.08.01	fixed form class problem (two separate class settings)
1.08	slightly updated layout: less empty space on the left side of the screen, cvv2 hover shares a line
1.07	new comment variable
1.06	new lightbox function to avoid dependency on the expand plugin
1.05	styles inside the plugin for improved portability
1.04	changed from form id to .donateform class
1.03	removed default donation amount
1.02	fixed Mozilla Firefox other form field focus bug
1.01	added new matching gifts link
1.00	release
*/
/* Start Adding Functions Below this Line */

// Add Donate Shortcode
function donate_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'comment' => '',
			'successurl' => 'https://www.itdp.org/support-us/donate/thank-you/',
			'declineurl' => 'https://www.itdp.org/support-us/donate/transaction-declined/',
			'errorurl' => 'https://www.itdp.org/support-us/donate/unexpected-error/',
		), $atts )
	);
	
	// https://itdp.secure.force.com/donate/thanks
	// https://itdp.secure.force.com/donate/declined
	// https://itdp.secure.force.com/donate/error

	// Code
return '<script src="/wp-content/plugins/itdp-donate/KELLValidationLibrary-1.27.02jwcustom.js" type="text/javascript"></script><form class="donateform doValidate grid-container grid-parent" method="post" action="https://faas.cloud.clickandpledge.com">
	<style>
	<!--
	/* begin donation page styles */
	.donateform {
		margin-bottom: 40px;
	}
	
	.donateform fieldset {
		padding: 20px;
		margin: 0 0 10px 0;
	}
	
	.donateform legend {
		padding: 0 10px;
		font-size: 22px;
	}

	.donateform input, .donateform select, .donateform fieldset/* , .cvv2-expand */ {
		border: 1px solid #ccc;
		border-radius: 20px;
	}
	
	.donateform input, .donateform select {
		padding: 10px;
	}
	
	/* .donateform div.formItem {
		margin-bottom:8px;
	} */
	
	.donateform label, .donateform input, .donateform select, .donateform ul, .donateform textarea {
		margin: 10px 0;
	}
	
	.donateform ul.amounts {
		margin-top: 18px;
	}
	
	.donateform ul.recurring {
		margin-top: 0;
	}
	
	.donateform label {
		/* display: inline-block;
		width: 200px;
		padding-right: 20px; */
		text-align: right;
		margin-top: 18px;
	}
	
	/* .donateform select#BillingStateProvince, input#BillingStateProvince {
		margin-left: 4px;
	} */
	
	.donateform ul li {
		list-style-type: none;
	}

	/* .donateform label.labelafterselection {
		display: inline;
		padding-left: 4px;
		width: 300px;
		text-align: left;
	} */

	/* .donateform label.labelafterselection + label, .donation-minimum {
		padding-left: 226px;
	} */

	/* .donateform .formItem textarea {
		border: 1px solid #ccc;
		border-radius: 20px;
		color: #6f6e73;
		width: 300px;
		height: 66px;
		padding: 8px;
	} */
	
	.entry-content .moreinfo {
		font-size: 75%;
		margin: 0;
	}
	
	.cvv2-explainer h3 {
		clear: both;
	}
	
	.cvv2-explainer img {
		padding: 0 20px 20px 0;
	}
	
	#Other1 {
		margin: 0;
	}

	.donateform .donateButton {
		border: 1px solid #fff;
		color: #fff;
		padding: 10px 20px 10px 20px;
		font-size: 20px;
	}

	.donateform .donateButton:hover {
		background-color: #fff;
		border: 1px solid #ccc;
		color: #00a950;
	}
	
		.donateform .inError {
		border: 1px solid #f00;
		border-radius: 20px;
		background-color: #fee;
	}

	.donateform span.formNotice.inError {
		border-radius: 20px;
		padding: 8px;
		float: right;
		color: #f00;
		display: none;
	}
	-->
	</style>
	<!-- hidden C&P Donation Fields -->
	<input name="ItemID1" type="hidden" id="ItemID1" value="1" />
	<input name="ItemName1" type="hidden" id="ItemName1" value="Donation" />
	<input name="SKU1" type="hidden" id="SKU1" value="DON" />
	<input name="Quantity1" type="hidden" id="Quantity1" value="1" />
	<!-- hidden C&P Redirect Fields -->
	<input type="hidden" name="OnSuccessUrl" id="OnSuccessUrl" value="' . $successurl . '" />
	<input type="hidden" name="OnDeclineUrl" id="OnDeclineUrl" value="' . $declineurl . '" />
	<input type="hidden" name="OnErrorUrl" id="OnErrorUrl" value="' . $errorurl . '" />
	<!-- hidden C&P ACCOUNT Fields -->
	<input type="hidden" name="AccountGuid" id="AccountGuid" value="160e1f07-a9c3-4ea3-8956-bfe48fa67233" />
	<input type="hidden" name="AccountID" id="AccountID" value="25957" />
	<input type="hidden" name="WID" id="WID" value="68202" />
	<!-- hidden C&P Reference Fields -->
	<input type="hidden" name="RefID" id="RefID" value="Website" />
	<input type="hidden" name="Tracker" id="Tracker" value="Web" />
	<!-- hidden C&P Form Method Fields -->
	<input type="hidden" name="SendReceipt" id="SendReceipt" value="False" />
	<input type="hidden" name="OrderMode" id="OrderMode" value="Production" />
	<!-- Order Mode can be Test or Production -->
	<input type="hidden" name="TransactionType" id="TransactionType" value="Payment" />
	<!-- hidden C&P Standardization Fields -->
	<input type="hidden" name="DecimalMark" id="DecimalMarkMode" value="US" />
	<input name="UnitDeductible1" type="hidden" id="UnitDeductible1" value="100%" />
	<fieldset class="grid-100 grid-parent">
		<legend>Donation</legend>
		<label class="grid-25">Amount</label>
		<ul class="amounts grid-75 mobile-grid-100">
			<li>
				<input id="UnitPrice1" name="UnitPrice1" type="radio" value="1000" autocomplete="off" onclick="ClearText(\'Other1\');" />           
				<label for="UnitPrice1">$1,000</label>
			</li>
			<li>
				<input id="UnitPrice2" name="UnitPrice1" type="radio" value="250" autocomplete="off" onclick="ClearText(\'Other1\');" />
				<label for="UnitPrice2">$250</label>
			</li>
			<li>
				<input id="UnitPrice3" name="UnitPrice1" type="radio" value="100" autocomplete="off" onclick="ClearText(\'Other1\');" />
				<label for="UnitPrice3">$100</label>
			</li>
			<li>
				<input id="UnitPrice4" name="UnitPrice1" type="radio" value="75" autocomplete="off" onclick="ClearText(\'Other1\');" />
				<label for="UnitPrice4">$75</label>
			</li>
			<li>
				<input id="UnitPrice5" name="UnitPrice1" type="radio" value="40" autocomplete="off" onclick="ClearText(\'Other1\');" />
				<label for="UnitPrice5">$40</label>
			</li>
			<li>
				<input id="UnitPrice6" name="UnitPrice1" type="radio" value="Other" autocomplete="off" />
				<label for="UnitPrice6">Other: $ </label><input id="Other1" name="Other1" autocomplete="off" size="10" type="text" class="numberOnly" onchange="CleanNumberOnlyFields();" onclick="SetRadio(\'UnitPrice1\',\'Other\');" />
			</li>
		</ul>
		<label class="grid-25">Recurring</label>
		<ul class="recurring grid-75 mobile-grid-100">
			<!-- <li>
			<input name="Installment" type="radio" id="Single" value="" checked="checked" autocomplete="off" />
			<label for="Single">This is a one-time donation.</label>
			</li> -->
			<li>
				<input type="checkbox" name="Installment" value="999" id="Recurring" autocomplete="off" />
				<label for="Recurring">I want to make a recurring donation. Pay every </label>
				<select name="Periodicity" id="Periodicity" autocomplete="off">
					<option value="Month" selected="selected">Month</option>
					<!--<option value="2 Months">2 Months</option>-->
					<!--<option value="Quarter">Quarter</option>-->
					<!--<option value="6 Months">6 Months</option>-->
					<option value="Year">Year</option>
				</select>
				<p class="moreinfo">(Note: The minimum contribution is $5. ITDP will send you a year-end statement of your recurring contribution and automatically renew your support. You may cancel at any time by <a href="/who-we-are/contact-us/">contacting us</a>.)</p>
			</li>
		</ul>
		<label class="grid-25" for="FieldValue2100">Comments</label>
		<input name="FieldName2100" type="hidden" value="Comments" autocomplete="off" />
		<textarea class="grid-75 mobile-grid-100" id="FieldValue2100" name="FieldValue2100" type="textarea" autocomplete="off">' . $comment . '</textarea>
	</fieldset>
	<fieldset>
		<legend>Personal Information</legend>
		<label class="grid-25" for="BillingFirstName">First Name</label>
		<input class="grid-75 mobile-grid-100 required" id="BillingFirstName" name="BillingFirstName" size="30" type="text" value="" />
		<label class="grid-25" for="BillingLastName">Last Name</label>
		<input class="grid-75 mobile-grid-100 required" id="BillingLastName" name="BillingLastName" size="30" type="text" value="">
		<label class="grid-25" for="BillingPhone">Phone Number</label>
		<input class="grid-75 mobile-grid-100" name="BillingPhone" type="text" id="BillingPhone" value="" size="30" />
		<label class="grid-25" for="BillingEmail">Email Address</label>
		<input class="grid-75 mobile-grid-100 required email" name="BillingEmail" type="text" id="BillingEmail" value="" size="40" />
		<input name="FieldName2400" type="hidden" value="GetNewsletter" autocomplete="off" />
		
		<div class="grid-75 mobile-grid-100 prefix-25">
			<input id="FieldValue2400" name="FieldValue2400" type="checkbox" checked="checked" value="yes" autocomplete="off" />
			<label for="FieldValue2400">I wish to receive e-mail updates.</label>
		</div>
		<!-- What now? -->
		<label class="grid-25" for="FieldValue2500">Employer</label>
		<input name="FieldName2500" type="hidden" value="Employer" autocomplete="off" />
		<input class="grid-75 mobile-grid-100" id="FieldValue2500" name="FieldValue2500" type="text" value="" autocomplete="off" />
		<span class="grid-75 mobile-grid-100 prefix-25"><a href="/support-us/employer-match/" target="_blank">Click here to see if your employer will match your gift!</a></span>
	</fieldset>
	<fieldset>
		<legend>Billing Information</legend>
		<ul>
			<li>
				<label class="grid-25" for="BillingAddress1">Address 1</label>
		<input class="grid-75 mobile-grid-100 required" name="BillingAddress1" type="text" id="BillingAddress1" value="" size="40" />
			</li>
			<li>
				<label class="grid-25" for="BillingAddress2">Address 2</label>
				<input class="grid-75 mobile-grid-100" name="BillingAddress2" type="text" id="BillingAddress2" value="" size="40" />
			</li>
			<li>
				<label class="grid-25" for="BillingCity">City</label>
				<input class="grid-75 mobile-grid-100 required" name="BillingCity" type="text" id="BillingCity" value="" size="40" />
			</li>
			<li>
				<label class="grid-25" for="BillingCountryCode">Country</label>
				<select class="grid-75 mobile-grid-100 required" name="BillingCountryCode" size="1" onChange="UpdateStates();" id="BillingCountryCode" >
					<option value="004">Afghanistan</option>
					<option value="008">Albania</option>
					<option value="012">Algeria</option>
					<option value="016">American Samoa</option>
					<option value="020">Andorra</option>
					<option value="024">Angola</option>
					<option value="010">Antarctica</option>
					<option value="028">Antigua and Barbuda</option>
					<option value="032">Argentina</option>
					<option value="051">Armenia</option>
					<option value="533">Aruba</option>
					<option value="036">Australia</option>
					<option value="040">Austria</option>
					<option value="031">Azerbaijan Rep.</option>
					<option value="044">Bahamas </option>
					<option value="048">Bahrain</option>
					<option value="050">Bangladesh</option>
					<option value="052">Barbados</option>
					<option value="112">Belarus</option>
					<option value="056">Belgium</option>
					<option value="084">Belize</option>
					<option value="204">Benin</option>
					<option value="060">Bermuda</option>
					<option value="064">Bhutan</option>
					<option value="068">Bolivia</option>
					<option value="070">Bosnia</option>
					<option value="072">Botswana</option>
					<option value="076">Brazil</option>
					<option value="096">Brunei</option>
					<option value="100">Bulgaria</option>
					<option value="854">Burkina Faso</option>
					<option value="108">Burundi</option>
					<option value="116">Cambodia</option>
					<option value="120">Cameroon</option>
					<option value="124">Canada</option>
					<option value="132">Cape Verde Islands</option>
					<option value="136">Cayman Islands</option>
					<option value="140">Central African Republic</option>
					<option value="148">Chad</option>
					<option value="152">Chile</option>
					<option value="156">China Peoples Republic</option>
					<option value="170">Columbia</option>
					<option value="174">Comoros</option>
					<option value="178">Congo</option>
					<option value="184">Cook Islands</option>
					<option value="188">Costa Rica</option>
					<option value="191">Croatia</option>
					<option value="192">Cuba</option>
					<option value="196">Cyprus</option>
					<option value="203">Czech Republic</option>
					<option value="208">Denmark</option>
					<option value="262">Djibouti</option>
					<option value="214">Dominican Republic</option>
					<option value="218">Ecuador</option>
					<option value="818">Egypt</option>
					<option value="222">El Salvador</option>
					<option value="226">Equatorial Guinea Malabo</option>
					<option value="232">Eritrea</option>
					<option value="233">Estonia</option>
					<option value="231">Ethiopia</option>
					<option value="242">Fiji Islands</option>
					<option value="246">Finland</option>
					<option value="250">France</option>
					<option value="254">French Guiana</option>
					<option value="258">French Polynesia</option>
					<option value="266">Gabon</option>
					<option value="270">Gambia</option>
					<option value="268">Georgia</option>
					<option value="276">Germany</option>
					<option value="288">Ghana</option>
					<option value="292">Gibraltar</option>
					<option value="300">Greece</option>
					<option value="304">Greenland</option>
					<option value="308">Grenada</option>
					<option value="312">Guadeloupe</option>
					<option value="316">Guam</option>
					<option value="320">Guatemala</option>
					<option value="324">Guinea</option>
					<option value="328">Guyana</option>
					<option value="332">Haiti</option>
					<option value="340">Honduras</option>
					<option value="344">Hong Kong</option>
					<option value="348">Hungary</option>
					<option value="352">Iceland</option>
					<option value="356">India</option>
					<option value="360">Indonesia</option>
					<option value="364">Iran</option>
					<option value="368">Iraq</option>
					<option value="372">Ireland</option>
					<option value="376">Israel</option>
					<option value="380">Italy</option>
					<option value="388">Jamaica</option>
					<option value="392">Japan</option>
					<option value="400">Jordan</option>
					<option value="398">Kazakhstan</option>
					<option value="404">Kenya</option>
					<option value="296">Kiribati</option>
					<option value="410">Korea, Republic of</option>
					<option value="414">Kuwait</option>
					<option value="417">Kyrgystan</option>
					<option value="428">Latvia</option>
					<option value="422">Lebanon</option>
					<option value="426">Lesotho</option>
					<option value="430">Liberia</option>
					<option value="434">Libya</option>
					<option value="438">Liechtenstein</option>
					<option value="440">Lithuania</option>
					<option value="442">Luxembourg</option>
					<option value="446">Macao</option>
					<option value="807">Macedonia</option>
					<option value="450">Madagascar</option>
					<option value="454">Malawi</option>
					<option value="458">Malaysia</option>
					<option value="462">Maldives</option>
					<option value="466">Mali</option>
					<option value="470">Malta</option>
					<option value="584">Marshall Islands</option>
					<option value="474">Martinique</option>
					<option value="478">Mauritania</option>
					<option value="480">Mauritius</option>
					<option value="484">Mexico</option>
					<option value="583">Micronesia</option>
					<option value="498">Moldova</option>
					<option value="492">Monaco</option>
					<option value="496">Mongolia</option>
					<option value="499">Montenegro</option>
					<option value="500">Montserrat</option>
					<option value="504">Morocco</option>
					<option value="508">Mozambique</option>
					<option value="104">Myanmar</option>
					<option value="516">Namibia</option>
					<option value="520">Nauru</option>
					<option value="524">Nepal</option>
					<option value="528">Netherlands</option>
					<option value="530">Netherlands Antilles</option>
					<option value="540">New Caledonia</option>
					<option value="554">New Zealand</option>
					<option value="558">Nicaragua</option>
					<option value="562">Niger</option>
					<option value="566">Nigeria</option>
					<option value="570">Niue</option>
					<option value="580">Northern Mariana Islands</option>
					<option value="578">Norway</option>
					<option value="512">Oman</option>
					<option value="586">Pakistan</option>
					<option value="585">Palau</option>
					<option value="591">Panama</option>
					<option value="598">Papua New Guinea</option>
					<option value="600">Paraguay</option>
					<option value="604">Peru</option>
					<option value="608">Phillippines</option>
					<option value="616">Poland</option>
					<option value="620">Portugal</option>
					<option value="634">Qatar</option>
					<option value="642">Romania</option>
					<option value="643">Russian Federation</option>
					<option value="646">Rwanda</option>
					<option value="654">Saint Helena</option>
					<option value="659">Saint Kitts and Nevis</option>
					<option value="666">Saint Pierre and Miquelon</option>
					<option value="674">San Marino</option>
					<option value="678">Sao Tome and Principe</option>
					<option value="682">Saudi Arabia</option>
					<option value="686">Senegal</option>
					<option value="688">Serbia</option>
					<option value="690">Seychelles</option>
					<option value="694">Sierra Leone</option>
					<option value="702">Singapore</option>
					<option value="703">Slovakia</option>
					<option value="705">Slovenia</option>
					<option value="090">Solomon Islands</option>
					<option value="706">Somalia</option>
					<option value="710">South Africa</option>
					<option value="724">Spain</option>
					<option value="144">Sri Lanka</option>
					<option value="736">Sudan</option>
					<option value="740">Suriname</option>
					<option value="748">Swaziland</option>
					<option value="752">Sweden</option>
					<option value="756">Switzerland</option>
					<option value="760">Syria</option>
					<option value="158">Taiwan</option>
					<option value="762">Tajikistan</option>
					<option value="834">Tanzania</option>
					<option value="764">Thailand</option>
					<option value="772">Tokelau</option>
					<option value="768">Tonga</option>
					<option value="780">Trinidad and Tobago</option>
					<option value="788">Tunisia</option>
					<option value="792">Turkey</option>
					<option value="795">Turkmenistan</option>
					<option value="798">Tuvalu</option>
					<option value="800">Uganda</option>
					<option value="804">Ukraine</option>
					<option value="784">United Arab Emirates</option>
					<option value="826">United Kingdom</option>
					<option value="840" selected="selected">United States of America</option>
					<option value="858">Uruguay</option>
					<option value="860">Uzbekistan</option>
					<option value="548">Vanuatu</option>
					<option value="336">Vatican City</option>
					<option value="862">Venzuela</option>
					<option value="704">Vietnam</option>
					<option value="876">Wallis and Futuna</option>
					<option value="016">Western Samoa</option>
					<option value="887">Yemen, Peoples Demo. Rep. Of</option>
					<option value="807">Yugoslavia</option>
					<option value="894">Zambia</option>
					<option value="716">Zimbabwe</option>
				</select>
			</li>
			<li>
				
			</li>
		</ul>
		
		<div class="grid-100 grid-parent">
			<label class="grid-25" for="BillingStateProvince">State</label>
			<select class="grid-75 mobile-grid-100" name="BillingStateProvince" size="1" id="BillingStateProvince" > </select>
		</div>
		
		<div id="fieldFactory" style="display:none;">
			<select id="canadianProvinces">
			<option selected="selected" value="NA">Select Province</option>
				<option value="Alberta">Alberta</option>
				<option value="British Columbia">British Columbia</option>
				<option value="Manitoba">Manitoba</option>
				<option value="New Brunswick">New Brunswick</option>
				<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
				<option value="Northwest Territories">Northwest Territories</option>
				<option value="Nova Scotia">Nova Scotia</option>
				<option value="Nunavut">Nunavut</option>
				<option value="Ontario">Ontario</option>
				<option value="Prince Edward Island">Prince Edward Island</option>
				<option value="Quebec">Quebec</option>
				<option value="Saskatchewan">Saskatchewan</option>
				<option value="Yukon Territory">Yukon Territory</option>
				<option value="Other">Other</option>
			</select>
			<select id="otherStates">
				<option value="Other">Other</option>
			</select>
			<select id="usStates">
				<option selected="selected" value="NA">Select State</option>
				<option value="Alabama">Alabama</option>
				<option value="Alaska">Alaska</option>
				<option value="Arizona">Arizona</option>
				<option value="Arkansas">Arkansas</option>
				<option value="Armed Forces- Africa">Armed Forces- Africa</option>
				<option value="Armed Forces- Americas">Armed Forces- Americas</option>
				<option value="Armed Forces- Canada">Armed Forces- Canada</option>
				<option value="Armed Forces- Europe">Armed Forces- Europe</option>
				<option value="Armed Forces- Middle East">Armed Forces- Middle East</option>
				<option value="Armed Forces- Pacific">Armed Forces- Pacific</option>
				<option value="California">California</option>
				<option value="Colorado">Colorado</option>
				<option value="Connecticut">Connecticut</option>
				<option value="Delaware">Delaware</option>
				<option value="District of Columbia">District of Columbia</option>
				<option value="Federated States of Micronesia">Federated States of Micronesia</option>
				<option value="Florida">Florida</option>
				<option value="Georgia">Georgia</option>
				<option value="Guam">Guam</option>
				<option value="Hawaii">Hawaii</option>
				<option value="Idaho">Idaho</option>
				<option value="Illinois">Illinois</option>
				<option value="Indiana">Indiana</option>
				<option value="Iowa">Iowa</option>
				<option value="Kansas">Kansas</option>
				<option value="Kentucky">Kentucky</option>
				<option value="Louisiana">Louisiana</option>
				<option value="Maine">Maine</option>
				<option value="Maryland">Maryland</option>
				<option value="Massachusetts">Massachusetts</option>
				<option value="Michigan">Michigan</option>
				<option value="Minnesota">Minnesota</option>
				<option value="Mississippi">Mississippi</option>
				<option value="Missouri">Missouri</option>
				<option value="Montana">Montana</option>
				<option value="Nebraska">Nebraska</option>
				<option value="Nevada">Nevada</option>
				<option value="New Hampshire">New Hampshire</option>
				<option value="New Jersey">New Jersey</option>
				<option value="New Mexico">New Mexico</option>
				<option value="New York">New York</option>
				<option value="North Carolina">North Carolina</option>
				<option value="North Dakota">North Dakota</option>
				<option value="Northern Mariana Islands">Northern Mariana Islands</option>
				<option value="Ohio">Ohio</option>
				<option value="Oklahoma">Oklahoma</option>
				<option value="Oregon">Oregon</option>
				<option value="Palau">Palau</option>
				<option value="Pennsylvania">Pennsylvania</option>
				<option value="Puerto Rico">Puerto Rico</option>
				<option value="Rhode Island">Rhode Island</option>
				<option value="South Carolina">South Carolina</option>
				<option value="South Dakota">South Dakota</option>
				<option value="Tennessee">Tennessee</option>
				<option value="Texas">Texas</option>
				<option value="Utah">Utah</option>
				<option value="Vermont">Vermont</option>
				<option value="Virgin Islands- US">Virgin Islands- US</option>
				<option value="Virginia">Virginia</option>
				<option value="Washington">Washington</option>
				<option value="West Virginia">West Virginia</option>
				<option value="Wisconsin">Wisconsin</option>
				<option value="Wyoming">Wyoming</option>
				<option value="Other">Other</option>
			</select>
		</div>
		<label class="grid-25" for="BillingPostalCode">Zip</label>
		<input class="grid-75 mobile-grid-100 numberOnly required" name="BillingPostalCode" type="text" onchange="CleanNumberOnlyFields();" id="BillingPostalCode" value="" size="15" />
	</fieldset>
	<fieldset>
		<legend>Payment Information</legend>
		<input name="PaymentType" type="hidden" id="PaymentType" value="CreditCard" />
		<label class="grid-25" for="NameOnCard">Name on Credit Card</label>
		<input class="grid-75 mobile-grid-100 required" name="NameOnCard" type="text" id="NameOnCard" value="" size="40" />
		<label class="grid-25" for="CardNumber">Credit Card Number</label>
		<input class="grid-75 mobile-grid-100 required numberOnly" name="CardNumber" type="text" onchange="CleanNumberOnlyFields();" id="CardNumber" value="" size="40" />
		
		<label class="grid-25" for="cvv2">CVV2</label>
		<input class="grid-75 mobile-grid-100 required numberOnly" name="Cvv2" type="text" id="cvv2" onchange="CleanNumberOnlyFields();" value="" size="6" />
		
		<div class="cvv2-explainer grid-75 mobile-grid-100 prefix-25">' . do_shortcode( '[expand title="How do I find my CVV2 information?"]<h3>Visa®, Mastercard®, and Discover® cardholders</h3>
			<img src="/wp-content/plugins/itdp-donate/cvv2-visa-master-300x164.png" alt="Visa and Mastercard credit cards with the three digit CVV number highlighted on the back of the card" align="left" />
			<p>Turn your card over and look at the signature box. You should see either the entire 16-digit credit card number or just the last four digits followed by a special 3-digit code. This 3-digit code is your CVV number / Card Security Code.</p>
			<h3>American Express® cardholders</h3>
			<img src="/wp-content/plugins/itdp-donate/cvv2-amex.png" alt="Amex credit card with the four digit CVV number highlighted on the front of the card" align="left" />
			<p>Look for the 4-digit code printed on the front of your card just above and to the right of your main credit card number. This 4-digit code is your Card Identification Number (CID). The CID is the four-digit code printed just above the Account Number.</p>[/expand]' ) . '</div>
		<label class="grid-25" for="ExpirationMonth">Expiration Date</label>
		<div class="grid-75 mobile-grid-100">
			<select name="ExpirationMonth" id="ExpirationMonth">
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select name="ExpirationYear" id="ExpirationYear">
				<option value="13">2013</option>
				<option value="14">2014</option>
				<option value="15">2015</option>
				<option value="16">2016</option>
				<option value="17">2017</option>
				<option value="18">2018</option>
				<option value="19">2019</option>
				<option value="20" selected="selected">2020</option>
			</select>
		</div>
	</fieldset>
	<input name="SubmitButton" type="button" onClick="checkForm();" id="SubmitButton" class="donateButton" value="Submit Donation" />
	<span class="formNotice inError">Please fix the errors indicated above.</span>
</form>
<!-- END FORM -->
';
}

function donate_reveal_error_shortcode( ) {

// Code
return '<p style="color: #f00"><em><script>
	var prmstr = window.location.search.substr(1);
	var prmarr = prmstr.split("&");
	var params = {};
	for (var i = 0; i < prmarr.length; i++) {
		var tmparr = prmarr[i].split("=");
		params[tmparr[0]] = tmparr[1];
		if ((tmparr[0] !==\'hashresponse\') && (tmparr[0] !==\'RefID\')){
			document.write(decodeURIComponent(tmparr[1]));
			document.write("<br/>");
		}
	}
</script></em></p>';
}

add_shortcode( 'donate', 'donate_shortcode' );
add_shortcode( 'donate-reveal-error', 'donate_reveal_error_shortcode' );

/* Stop Adding Functions Below this Line */
?>