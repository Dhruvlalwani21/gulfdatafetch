<?php
//http://local.officere.com/cron_jobs/db_feilds.php

$db_feilds = "
Acres,
Amenities,
ApproxLivingArea,
BathsFull,
BathsHalf,
BathsTotal,
BedroomDesc,
Bedrooms,
BedsTotal,
CableAvailableYN,
City,
CloseDate,
ClosePrice,
CommunityType,
ConditionalDate,
Construction,
Cooling,
CoolingRemarks,
CoolingYN,
CountyOrParish,
CreatedDate,
CurrentPrice,
DOM,
DateRented,
Development,
DevelopmentName,
Electric,
Elevator,
Equipment,
ExteriorFeatures,
FencedYardYN,
Flooring,
ForeclosedREOYN,
FullAddress,
FurnishedDesc,
GarageDesc,
GarageSpaces,
Heat,
HeatingRemarks,
HeatingYN,
HighSchool,
InteriorFeatures,
LandLeaseYN,
LandSqFt,
LeasePrice,
LeaseRailYN,
LeaseRateDesc,
ListPrice,
ListPriceDesc,
LotType,
LotUnit,
matrix_unique_id,
MLS,
MLSAreaMajor,
MLSNumber,
MatrixModifiedDT,
MiddleSchool,
NumUnitFloor,
NumberDockHighDoors,
NumberOfBays,
NumberOfParcelsLots,
NumberOfSpacesUnits,
NumberofLoadingDoors,
ParcelNumber,
Parking,
Pets,
PetsLimitMaxNumber,
PetsLimitMaxWeight,
PetsLimitOther,
PhotoCount,
PostalCode,
PostalCodePlus4,
PotentialShortSaleYN,
PricePerAcre,
PrivatePoolDesc,
PrivatePoolYN,
PropertyAddressonInternetYN,
PropertyInformation,
PropertyLocation,
PropertyName,
PropertyType,
PropertyUseType,
Range,
RoomCount,
SlipNumber,
SlipType,
StateOrProvince,
Status,
StatusType,
StreetDirPrefix,
StreetDirSuffix,
StreetName,
StreetNumber,
StreetNumberModifier,
StreetSuffix,
SubjectPropertySqFt,
Terms,
TotalArea,
TotalBuildingSqFt,
TotalFloors,
Township,
UnitCount,
UnitFloor,
UnitNumber,
UnitsinBuilding,
UnitsinComplex,
UtilitiesAvailable,
Water,
WaterfrontDesc,
WaterfrontYN,
YearBuilt";

/**
$array = array();
$xpld = explode(',',$db_feilds);

foreach($xpld as $feild){
    if($feild!=''){
        array_push($array, $feild);
    }
}

sort($array);

$counter = 1;
foreach($array as $field){
    echo "$field,<br/>";
    $counter++;
}**/

$otherFeilds = "";
$xpldFlds = explode(',',$db_feilds);
foreach($xpldFlds as $feild){
    if($feild!=''){
        $otherFeilds .= "$feild varchar(255) NULL, <br/>";
    }
}

$query = "CREATE TABLE properties (<br/>
      property_id int(11) AUTO_INCREMENT,<br/>
      PropertyClass varchar(255) NULL,<br/>
      $otherFeilds
      PRIMARY KEY (property_id))";


echo $query;
?>