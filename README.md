# LinnworksTrackingFix
Fixes an issue with Linnworks currently (as of 22/09/2020), where the tracking information is not included in the shipping email from Magento. This is currently on their low/medium priority list to be fixed (whenever that may be).

You should disable the shipping email in Magento 2's store configuration -> Sales -> Sales Emails, otherwise your customers will get two shipping emails, one with the current problem without the tracking code and the email this module sends on observing a tracking number being inserted into Magento 2.

When Linnworks resolve this issue, you should disable this module as it will no longer be necessary. This module will not, however, cause a problem when Linnworks get around to fixing it their end. It will just send slightly later than Magento's design.

Caveats:

It removes your ability to turn shipping emails on and off from the backend of Magento. And if for example you send shipments without tracking codes, this module WILL NOT send a shipping email in that event, it relies exclusively on the fact that you have tracking codes in all of your shipments. Open to push requests! :)

Install:

bin/magento module:enable BigHat_Tracking && bin/magento setup:upgrade && bin/magento setup:di:compile && bin/magento setup:static-content:deploy en_US en_GB

Tested on M2.3.4
