<?php

namespace PFS;

class ErrorMap
{
    public static function getErrorDescription(int $errorCode): string
    {
        return array_shift(array_filter(
            self::getErrorMap(),
            function ($key) use ($errorCode) {
                return $errorCode == (int) $key;
            },
            ARRAY_FILTER_USE_KEY
        ));
    }

    public static function getErrorMap()
    {
        return [
            '-1' => 'User not authorised to use service.',
            '-2' => 'Operation Failed Connectivity issues.',
            '-3' => 'Card Format Error',
            '-4' => 'Amount parameter non numeric',
            '-5' => 'Transaction type format error',
            '-6' => 'Currency Code parameter format error',
            '-7' => 'Settlement Amount format error',
            '-9' => 'Terminal Owner format Error',
            '-10' => 'Transaction Description format error',
            '-11' => 'Variant format error',
            '-12' => 'Store Account Number format error',
            '-13' => 'Terminal State format error',
            '-14' => 'Terminal ID format error',
            '-15' => 'Country format error',
            '-16' => 'Transaction Flat Fee format error',
            '-17' => 'Fee description format error',
            '-18' => 'Direct fee format error',
            '-19' => 'Charge band format error',
            '-20' => 'Transaction charge type format  error',
            '-21' => 'Store description format error',
            '-22' => 'Card To format error',
            '-23' => 'Status Format error',
            '-24' => 'Date format error',
            '-25' => 'Description format error',
            '-26' => 'Fee format error',
            '-27' => 'First Name Format Error',
            '-28' => 'Middle Initial Format Error',
            '-29' => 'Last Name format Error',
            '-30' => 'Address 1 format error',
            '-31' => 'Address 2 format error',
            '-32' => 'Address 3 format error',
            '-33' => 'Address 4 format error',
            '-34' => 'City format error',
            '-35' => 'Country Name format error',
            '-36' => 'Country Name 2 format error',
            '-37' => 'State format error',
            '-38' => 'Zip Code format error',
            '-39' => 'County name format error',
            '-40' => 'County name 2 format error',
            '-41' => 'Client Holder Id format error',
            '-42' => 'Country Code format error',
            '-43' => 'Phone format error',
            '-44' => 'Phone2 format error',
            '-45' => 'SecurityField1 format error',
            '-46' => 'SecurityField2 format error',
            '-47' => 'SecurityField3 format error',
            '-48' => 'SecurityField4 format error',
            '-49' => 'Email format error',
            '-50' => 'Userdefinedfield1 format error',
            '-51' => 'Userdefinedfield2 format error',
            '-52' => 'SocialSecurityNumber format error',
            '-54' => 'DistributorCode format error',
            '-56' => 'CompanyName format error',
            '-57' => 'CardStyle format error',
            '-58' => 'Embossname format error',
            '-59' => 'ExpirationDate format error',
            '-60' => 'ProducePlastic format error',
            '-61' => 'DeliveryType format error',
            '-62' => 'OFACOvide format error',
            '-63' => 'VerifyDOBOvide format error',
            '-64' => 'VerifySSNOvide format error',
            '-65' => 'BoeCheckOvide format error',
            '-66' => 'Addresslineforsecondaryaddress format error',
            '-67' => 'Addressline2forsecondaryaddress format error',
            '-68' => 'Addressline3forsecondaryaddress format error',
            '-69' => 'Addressline4forsecondaryaddress format error',
            '-70' => 'IP format error',
            '-71' => 'Illegal characters in Userdefinedfield3',
            '-72' => 'Illegal characters in Userdefinedfield4',
            '-73' => 'Illegal characters in Secondary Address City',
            '-74' => 'Secondary Address Zip',
            '-75' => 'Secondary Address state',
            '-76' => 'Pin Length error',
            '-77' => 'TransType format error 1 or 2 only allowed',
            '-80' => 'Secondary Country Code Error',
            '-81' => 'Bin Format error',
            '-82' => 'Pin No Error',
            '-83' => 'Mobile number format error',
            '-84' => 'IP denied Access to API',
            '-85' => 'Serialization Failed',
            '-86' => 'Supply a reason for card closure',
            '-87' => 'Message ID not found',
            '-88' => 'Please supply a Message ID',
            '-89' => 'MessageID Not Unique',
            '-90' => 'Supply a reason for replacement of card',
            '-91' => 'New card created, but failed card link, deposit to new card and close current card',
            '-92' => 'New card created, old card closed but failed deposit and card link',
            '-93' => 'New card created, deposit done but failed to close card and card link',
            '-94' => 'New card created, deposit done, old card closed but failed card link',
            '-95' => 'New card created, card link done but failed deposit and close card',
            '-96' => 'New card created, card linked, closed card but deposit failed',
            '-97' => 'New card created, card linked, deposit done but failed to close card',
            '-98' => 'Card Replaced successfully',
            '-99' => 'New card created, deposit and close card failed',
            '-100' => 'Failed to link mobile to card',
            '-101' => 'Mobile Not Found',
            '-102' => 'New card created, closed card but deposit failed',
            '-103' => 'New card created, deposit done but close card failed',
            '-104' => 'Card Replaced successfully',
            '-105' => 'Card is already closed',
            '-106' => 'Search for this bin number is not authorized',
            '-107' => 'Failed to retrieve replacement card details',
            '-108' => 'KYC for new card failed.',
            '-109' => 'API Signature Data Incorrect format',
            '5000' => 'Invalid message type',
            '5001' => 'Missing card number and control number',
            '5002' => 'Negative balance not allowed',
            '5003' => 'Invalid card prefix',
            '5004' => 'Error processing request message',
            '5005' => 'Card not yet activated',
            '5006' => 'Card status cannot be changed',
            '5007' => 'Message not in recognizable format',
            '5008' => 'Missing cardholder id',
            '5009' => 'bins dont match',
            '5010' => 'fiids do not match',
            '5011' => 'Cannot link card, limit exceeded',
            '5012' => 'Fiids do not match',
            '5013' => 'Amount less than minimum limit',
            '5014' => 'Amount exceeds maximum limit',
            '5015' => 'fiids do not match',
            '5016' => 'Error constructing direct deposit number',
            '5017' => 'Fiids do not match',
            '5018' => 'Exceeded daily maximum deposit credits',
            '5019' => 'Exceeded daily maximum deposit amount',
            '5100' => 'Card record not found',
            '5101' => 'Card record locked',
            '5102' => 'Error reading from card file',
            '5103' => 'Error reading from card file',
            '5104' => 'Error reading from card file',
            '5110' => 'Balance record not found',
            '5111' => 'Balance record locked',
            '5112' => 'Error reading from balance file',
            '5113' => 'Error reading from balance file',
            '5114' => 'Error reading from balance file',
            '5120' => 'Error reading from idf file',
            '5121' => 'Error reading from idf file',
            '5122' => 'Error reading from idf file',
            '5130' => 'Error reading from tran log control file',
            '5131' => 'Error reading from tran log control file',
            '5140' => 'Error reading control number file',
            '5141' => 'Error reading control number file',
            '5150' => 'Error reading from fee file',
            '5160' => 'Error reading from card prefix file',
            '5170' => 'Error reading from key auth file',
            '5171' => 'Error reading from key auth file',
            '5175' => 'Error reading from customer xref file',
            '5176' => 'Error reading from customer xref file',
            '5177' => 'Error updating customer xref file',
            '5180' => 'Error reading from card save info file',
            '5181' => 'Error reading from card save info file',
            '5182' => 'Error reading from cardholder demo file',
            '5183' => 'Error reading fro cardholder demo file',
            '5184' => 'Error updating cardholder demo file',
            '5185' => 'Error updating cardholder demo file',
            '5186' => 'Error updating cardholder demo file',
            '5190' => 'Error reading from hist log control file',
            '5191' => 'Error reading from hist log control file',
            '5195' => 'Error reading from tran log history file',
            '5196' => 'Error reading from tran log history file',
            '5199' => 'Error reading from parameter file',
            '5200' => 'Error updating card file',
            '5201' => 'Error updating card file',
            '5210' => 'Error updating balance file',
            '5211' => 'Error updating balance file',
            '5240' => 'Error updating control number file',
            '5255' => 'Error updating direct deposit control file',
            '5280' => 'Error updating card save info file',
            '5281' => 'Error updating card save info file',
            '5284' => 'Error assigning a card, card already assigned',
            '5295' => 'Error updating tran log file',
            '5299' => 'Error updating audit file',
            '5300' => 'Missing PIN',
            '5301' => 'Error validating PIN',
            '5302' => 'Error changing PIN',
            '5305' => 'Error changing PIN',
            '5306' => 'PIN tries exceeded',
            '5307' => 'Error generating PIN',
            '5303' => 'Invalid PIN initialize request',
            '5304' => 'Invalid PIN',
            '6000' => 'Negative balance on card',
            '7000' => 'Amount cannot be negative',
            '7001' => 'Fee cannot be negative',
            '7002' => 'Fee cannot be negative',
            '7003' => 'Invalid trans type indicator',
            '7004' => 'The card has a status of deposit only',
            '7005' => 'Invalid date specified if either the starting or ending dates are invalid.',
            '000' => 'Success',
            '001' => 'Unspecified Error',
            '002' => 'Login Error',
            '003' => 'Message ID record not found for <Message ID Number supplied by user>',
            '004' => 'Message ID already filed.',
            '005' => 'Invalid Message ID Format',
            '006' => 'Function number is not supported.',
            '007' => 'Invalid Client Number',
            '008' => 'Missing required parameters (<Missing parameter listing>)',
            '009' => '(Reserved for future use)',
            '010' => '(Reserved for future use)',
            '011' => 'Invalid Card Number',
            '012' => 'Invalid Account Number/SSN.',
            '013' => 'Invalid Amount.',
            '014' => 'Invalid Transaction Type.',
            '015' => 'Invalid Old Pin.',
            '016' => 'Invalid New Pin.',
            '017' => 'Invalid Start Date.',
            '018' => 'Invalid End Date.',
            '019' => 'The start date is earlier then the end date.',
            '020' => 'Time date out of range.',
            '021' => 'Invalid currency code for current BIN number',
            '022' => 'Host Down',
            '050' => 'OFAC Match Found',
            '051' => 'Credit Card Pre-Auth failure or declined.',
            '052' => 'API Address Validation Failed.',
            '053' => 'Credit Card is already associated with another gkard.',
            '054' => 'No credit card provided and no default card is associated!',
            '056' => 'Load amount is less than transfer amount.',
            '057' => 'No Credit Card Provided For Instant Issue!',
            '058' => 'Limit reached for Credit Cards association for InstantIssue!',
            '059' => 'No credit card provided and card association is turned OFF!',
            '062' => 'Load amount is less than transfer amount',
            '063' => 'Could not find a response for Message ID.',
            '071' => 'Exceeded aggregate credit card load count limit.' .
                ' Actual load count would be greater than load ceiling count for any card.',
            '072' => 'Exceeded aggregate credit card load amount limit.' .
                ' Actual load amount would be greater than load ceiling amount for any card.',
            '073' => 'Exceeded aggregate credit card load amount limit.' .
                ' Actual load amount would be greater than load ceiling amount for any card.',
            '074' => 'Exceeded credit card load amount limit.' .
                ' Actual load amount would be greater than load ceiling amount.',
            '075' => 'SSN Validation failed.',
            '076' => 'DOB Validation failed.',
            '077' => 'Invalid credential combination. WalletID found, need a matching i24Card.',
            '078' => 'reserved',
            '079' => 'reserved',
            '080' => 'i24Wallet provisioning failed.',
            '081' => 'Missing minimum required credentials.',
            '082' => 'reserved',
            '083' => 'Invalid credential combination',
            '084' => 'WalletID invalid',
            '085' => 'Wallet password invalid.',
            '086' => 'Email address associated to another WalletID.',
            '087' => 'Wallet provisioning failed. Possible duplicate user.',
            '088' => 'Wallet provisioning failed. Invalid reference.',
            '089' => 'Email address associated to another WalletID.',
            '090' => 'Inadequate permissions to execute this function.',
            '091' => 'Unsupported function specified',
            '092' => 'IssueCredit: Invalid Transid',
            '093' => 'IssueCredit: Failure unloading card',
            '094' => 'IssueCredit: Connectivity failure to i24Gateway.',
            '095' => '',
            '096' => 'AutoLoad disabled by cardholder.',
        ];
    }
}
