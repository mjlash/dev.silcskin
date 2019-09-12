<?php
# (c) 2009-2015 Z-Firm LLC  ALL RIGHTS RESERVED
# FULL COPYRIGHT NOTICE AND TERMS OF USE ARE AT THE BOTTOM OF THIS DOCUMENT.

define("SHIPPINGZSETTINGS_VERSION","4.0.8.6570");

############################################# Please Read These Instructions #######################################
#
#   Your Attention Please !
#
#
#   Please check SHIPPING_ACCESS_TOKEN, below. If it reads CHANGE THIS, please follow these steps.
#     (If it is set to a random value, it has been automatically set by ShipRush. Change it if
#      you understand it needs to be the same here and in the Web Store settings in ShipRush.)
#
#   Step 1: Create & configure a random SHIPPING_ACCESS_TOKEN  Please take these steps:
#     1) Go to http://www.pctools.com/guides/password/     (you can use another random password generator if you like)
#     2) Check ALL the boxes EXCEPT the punctuation box
#     3) Set the LENGTH to 31
#     4) Press the Generate Password button
#     5) Copy the generated password value to the clipboard
#     6) Now, in THIS file (ShippingZSettings.php): 
#        Go to the SHIPPING_ACCESS_TOKEN line below. Paste the random password from step 5 above in over the "CHANGE THIS" -- Note: keep the "quotes"
#        Example: define("SHIPPING_ACCESS_TOKEN","phe6uth3VEch3crutep2unepabupHa2");
#	  7) Save the this token, you will need it later on during the set up process.
#     8) Upload the full kit of files to the root directory of your ecommerce system
#        (This is the root directory of the web store containing 'index.php'). 
#        (Yes, it is OK to omit the files for other ecommerce systems. E.g. a Magento user 
#         can remove the Zencart and Oscommerce files.)
#     8) Continue through the ShipRush wizard. 
#     9) When the ShipRush wizard prompts for the Access Token, enter the token you used in step 4 above.
#     10) Scroll down through the sections below. You will a see a section marked 'Only for <your cart> users'. 
#		You will need to follow the steps in that section.
#
#   NOTE: Some systems require the file permissions of all the ShippingZ files to be 0444. This is read only for everyone.
#		  
# 
############################################## All Users Settings #######################################
                                
//define("SHIPPING_ACCESS_TOKEN","3d9db0f6dce04b0484f8fa9e2d49ed7b");  // See steps above to set this -- REQUIRED !
define("SHIPPING_ACCESS_TOKEN","YaGu7aZU5rUWrEx6tajakeYehEduw7wE");  // See steps above to set this -- REQUIRED !


############################################## BEGIN Magento Section ##################################################
#
define("Magento_StoreShippingInComments",0); // Set to 0 for Magento v1.3 & 1.4. Set to 1 for v1.2. 
#                                            // If set to 1, comments will be posted in the general comments area on the order. 
# The setting below, "Magento_SendsShippingEmail"
#
# If set to 1, causes Magento to send the "Shipping Notification" email template configured in
# Magento's Admin > System > Transactional Emails section. Specifically, the template
# named "New Shipment" is emailed if this is set to 1.
define("Magento_SendsShippingEmail",0);    
#
define("Magento_SendsShippingEmail_AddComments",0);  // defaults to 0, False, which suppresses our comments in "new shipment" notification email
#
define("StandardPerformanceTest",0);//defaults 0   
#===================================================
#Setting below, Magento_Enterprise_Edition, set to 1 for Magento Enterprise Edition
define("Magento_Enterprise_Edition",0);//defaults 0
#
#
# Setting below, Magento_SendsBuyerEmail,
#
# If set to 1, causes Magento to send the "Order Update to buyer" email template configured in
# Magento's Admin > System > Transactional Emails section. Specifically, the template
# named "Order Update" is emailed to buyer if this is set to 1. Further, comments about the shipment
# are merged into this email
define("Magento_SendsBuyerEmail",0);   
#
# This next section controls which order statuses are read from Magento.
# Setting to 0 (zero) turns off retrieval of that status.
# Setting to 1 (one) turns on retrieval of that status.
# By default, all statuses are retrieved EXCEPT for "Pending"
define("MAGENTO_RETRIEVE_ORDER_STATUS_1_PENDING",0); // default 0
define("MAGENTO_RETRIEVE_ORDER_STATUS_2_PROCESSING",1); // default 1
define("MAGENTO_RETRIEVE_ORDER_STATUS_3_COMPLETE",1); // default 1
define("MAGENTO_RETRIEVE_ORDER_STATUS_4_CLOSED",0); // default 0
define("MAGENTO_RETRIEVE_ORDER_STATUS_4_CANCELLED",1); // default 1
#
# Next question: How do you work with the Magento Order Status?
# In other words, when an order is shipped, should the order
# always be set to COMPLETE in Magento?
#
# If you only ship orders that are in a PROCESSING state, you can leave 
# the setting below alone. When shipped, they will be moved automatically to the next
# status: COMPLETE.
#
# However, if you have PENDING orders being retrieved (see setting above)
# AND when shipped, you want those orders to move to a status of
# PROCESSING, then the setting below should be set to 0 (zero)
#
# In all cases, when shipped, the tracking # is posted into Magento.
#
# Short Explanation:
# If this is set to 1, then, when shipped, orders of
# BOTH STATUS 1 (Pending) and STATUS 2 (Processing) will be
# set to STATUS 3 (Complete)
define("MAGENTO_SHIPPED_STATUS_COMPLETE_ALL_SHIPPED_ORDERS",1);// Default is 1
#
# Gift message settings. Controls whether the Magento Gift Message is retrieved.
# A setting of 1 means Yes.
# Normally, only one of these two options would be set to 1.
define("Magento_RetrieveOrderGiftMessage",1);     // ( default is 1 )
define("Magento_RetrieveProductGiftMessage",0);   // ( default is 0 )
#
# Store Settings: 
# - If you have only one store in your Magento system, please ignore the following.
# - If you have multiple stores, and want to retrieve orders from all stores, please ignore the following!
# - If you want to retrieve orders from only one store in a multi-store environment, set the following to
#   the "Store Code" to service.
# - If you want to retrieve orders from "multiple stores but not all stores.", enter comma separated store codes (eg. storecode1, storecode2,strorecode3)
# in below setting parameter i.e. Magento_Store_Code_To_Service. Hence it would read-
# define("Magento_Store_Code_To_Service","storecode1,storecode2,strorecode3"); 
#
#   TO FIND THE STORE CODE: 
#   - In the Magento Admin Panel, navigate to System | Manage Stores
#   - You get a list of stores.
#   - Click on the store. You now see the "Edit Store View" screen.
#   - The code to use for this next setting is the "Code" value.
#     For example, if the Code is "shoestore1" then the line below would read:
#       define("Magento_Store_Code_To_Service","shoestore1");
define("Magento_Store_Code_To_Service","-ALL-");  // default -ALL-, which retrieves from all stores on the Magento system
define("MAGENTO_READ_INVOICES",0);  // default 0, If set to 1 invoice numbers are retrieved
#
#
# Multi Currency Magento Store -> View Order As Base Currency Mode- Default 0 //Default will use Different Currency of webstore
define("MAGENTO_MULTI_CURRENCY_VIEW_AS_BASE_CURRENCY",0); // default 0, If set to 1 then Base currency value will be imported for the order
############################################## END Magento Section ##################################################

#
#
#
#
#
#
#
############################################## System Settings for Tech Support Only ##############################
#
define("HTTP_GET_ENABLED",1);//allow get method
define("GetUnshippedOrdersOnly",0);//set 1 to get unshipped orders only
#
############################################## Adding New Order Statuses #####################################
#
# Say you want the system to retrieve an order status in addition to what is already coded here.
# How?
#
# There are two areas to modify. This settings file, and the php file for your platform.
# Here is an example for OsCommerce (can be used for most other php based systems):
#
# Step 1: Add to this settings file (without the leading # comment symbol):
# define("OSCOMMERCE_RETRIEVE_ORDER_STATUS_4_PAID",1);
#
# Step 2: Modify ShippingZOscommerce.php
#
# Add to this section:
# //Prepare order status string based on settings
# if(OSCOMMERCE_RETRIEVE_ORDER_STATUS_4_PAID==1)   // if set to 1 in Settings
# {
#  if($order_status_filter=="")
#  {
#  $order_status_filter.="orders_status=ZZZ";
#  }
#  else
#  {
#  // The ZZZ is the actual value in the database as the order_status for Paid
#  // For the status you want to retrieve, look in the database to find the real value
#  // and use it in this code
#  $order_status_filter.=" OR orders_status=ZZZ";  
#
#
# CS-Cart: Adding Statuses:
#
# For CS-Cart, additional modification to the ShippingZCscart.php file is needed
# so that the order is marked as complete on the update.
#
# In this example, G is your new order status value. Out of the box, statuses of O, P, and C
# are handled. We will extend the system to handle a status of G for update.
#
# 1: Find this line:
#    $sql = "SELECT COUNT(*) as total_order FROM ?:orders WHERE status in('O','P','C') ?p"; 
#
# For the new status, add it to the list for the "in" clause:
#    $sql = "SELECT COUNT(*) as total_order FROM ?:orders WHERE status in('O','P','C','G') ?p"; 
#
# 2: Further down in the php file, locate this section:
#
#                if($current_order_status=='O'  )
#                    $change_order_status='P';
#                else if($current_order_status=='P')
#                    $change_order_status='C'; 
#
# For the new status, add a new "else if" block:
#
#                if($current_order_status=='O'  )
#                    $change_order_status='P';
#                else if($current_order_status=='P')
#                    $change_order_status='C';                  
#                else if($current_order_status=='G')  
#                    $change_order_status='C'; 
#
# Note: Additional control over the status value can be achieved, but involves further
# customization. Please engage a PHP developer to assist.
#############################################################################################
#
#
#
#********************************************** Shipment Tracking URLs *****************************************************************
#
# Below are for the values saved into certain ecommerce systems. Rarely need to be modified. 
#
define("USPS_URL","http://trkcnfrm1.smi.usps.com/PTSInternetWeb/InterLabelInquiry.do?origTrackNum=[TRACKING_NUMBER]");
define("UPS_URL","http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums=[TRACKING_NUMBER]");
define("FEDEX_URL","http://www.fedex.com/Tracking?action=track&tracknumbers=[TRACKING_NUMBER]");
define("DHL_URL","http://www.dhl.com/content/g0/en/express/tracking.shtml?brand=DHL&AWB=[TRACKING_NUMBER]");
#
#
############################################## Legal Notices ######################################################

# ################################################################################
# 	
#  (c) 2010-2014 Z-Firm LLC, ALL RIGHTS RESERVED.
#
#  This file is protected by U.S. and international copyright laws. Technologies and techniques herein are
#  the proprietary methods of Z-Firm LLC. 
#         
#         IMPORTANT
#         =========
#         THIS FILE IS RESTRICTED FOR USE IN CONNECTION WITH SHIPRUSH, MY.SHIPRUSH AND OTHER SOFTWARE 
#         PRODUCTS OWNED BY Z-FIRM LLC.  UNLESS EXPRESSLY PERMITTED BY Z-FIRM, ANY USE IS STRICTLY PROHIBITED.
#
#         THIS FILE, AND ALL PARTS OF SHIPRUSH_SHOPPINGCART_INTEGRATION_KIT__SEE_README_FILE.ZIP AND 
#         THE MY.SHIPRUSH KIT, ARE GOVERNED BY THE MY.SHIPRUSH TERMS OF SERVICE & END USER LICENSE AGREEMENT.
#         
#         The ShipRush License Agreement can be read here: http://www.zfirm.com/SHIPRUSH-EULA
#         
#         If you do not agree with these terms, this file and related files must be deleted immediately.
#
#         Thank you for using ShipRush!
# 	
################################################################################

?>
