<?php

namespace PFS\Api\CardIssue;

use PFS\Api\Request as BaseRequest;

class CardIssueRequest extends BaseRequest
{
    /**
     * Required fields.
     */
    public $FirstName;
    public $LastName;
    public $CountryCode;
    public $DOB;
    public $Address1;
    public $City;
    public $ZipCode;
    public $Phone;
    public $Email;
    public $DistributorCode;
    public $CardStyle;
    public $bin;
    public $VerifySSNOverride;
    public $VerifyDOBOverride;
    public $GeoIPCheckOverride;

    /**
     * Not required fields
     */
    public $MiddleInitial;
    public $Address2;
    public $Address3;
    public $Address4;
    public $City2;
    public $CountyName;
    public $State;
    public $ZipCode2;
    public $CountryCode2;
    public $CountryName;
    public $Addresslineforsecondaryaddress;
    public $Addressline2forsecondaryaddress;
    public $Addressline3forsecondaryaddress;
    public $Addressline4forsecondaryaddress;
    public $CountryName2;
    public $CountyName2;
    public $Phone2;
    public $SecurityField1;
    public $SecurityField2;
    public $SecurityField3;
    public $SecurityField4;
    public $Userdefinedfield1;
    public $Userdefinedfield2;
    public $Userdefinedfield3;
    public $Userdefinedfield4;
    public $ExpirationDate;
    public $SocialSecurityNumber;
    public $Remote_Host;
    public $CompanyName;
    public $EmbossName;
    public $DeliveryType;
    public $ProducePlastic;
    public $Setupid;
    public $Pin;
    public $OFACOverride;

    public function getSignature(): string
    {
        return 'CardIssue';
    }

    public function getResponseClass(): string
    {
        return CardIssueResponse::class;
    }
}
