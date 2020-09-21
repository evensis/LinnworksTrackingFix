# LinnworksTrackingFix
Fixes an issue with Linnworks currently (as of 22/09/2020), where the tracking information is not included in the shipping email from Magento. This is due to an improper implementation on the API and is currently on their low/medium priority list to be fixed (whenever that may be).

You should disable the shipping email in Magento 2's store configuration, otherwise they will get two emails, one with the current problem without the tracking code and the email this sends on observing a tracking number being inserted into Magento 2.

When Linnworks resolve this issue, you should disable this module at which point this module will become deprecated but the change Linnworks side will not cause a breaking change, it will continue sending as intended with the tracking code in tow.
