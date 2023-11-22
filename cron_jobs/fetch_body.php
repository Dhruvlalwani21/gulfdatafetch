<?php
foreach($results as $record){

$Acres = mysqli_real_escape_string($conn,$record['Acres']);
$ActiveOpenHouseCount = mysqli_real_escape_string($conn,$record['ActiveOpenHouseCount']);
$AdditionalRooms = mysqli_real_escape_string($conn,$record['AdditionalRooms']);
$Amenities = mysqli_real_escape_string($conn,$record['Amenities']);
$AmenityRecFee = mysqli_real_escape_string($conn,$record['AmenityRecFee']);
$AmenRecFreq = mysqli_real_escape_string($conn,$record['AmenRecFreq']);
$ApplicationFee = mysqli_real_escape_string($conn,$record['ApplicationFee']);
$Approval = mysqli_real_escape_string($conn,$record['Approval']);
$ApproxLivingArea = mysqli_real_escape_string($conn,$record['ApproxLivingArea']);
$AssociationMngmtPhone = mysqli_real_escape_string($conn,$record['AssociationMngmtPhone']);
$AVMYN = mysqli_real_escape_string($conn,$record['AVMYN']);
$BathsFull = mysqli_real_escape_string($conn,$record['BathsFull']);
$BathsHalf = mysqli_real_escape_string($conn,$record['BathsHalf']);
$BathsTotal = mysqli_real_escape_string($conn,$record['BathsTotal']);
$BedroomDesc = mysqli_real_escape_string($conn,$record['BedroomDesc']);
$Bedrooms = mysqli_real_escape_string($conn,$record['Bedrooms']);
$BedsTotal = mysqli_real_escape_string($conn,$record['BedsTotal']);
$Block = mysqli_real_escape_string($conn,$record['Block']);
$BloggingYN = mysqli_real_escape_string($conn,$record['BloggingYN']);
$BoatAccess = mysqli_real_escape_string($conn,$record['BoatAccess']);
$BuilderProductYN = mysqli_real_escape_string($conn,$record['BuilderProductYN']);
$BuildingDesc = mysqli_real_escape_string($conn,$record['BuildingDesc']);
$BuildingDesign = mysqli_real_escape_string($conn,$record['BuildingDesign']);
$BuildingNumber = mysqli_real_escape_string($conn,$record['BuildingNumber']);
$CableAvailableYN = mysqli_real_escape_string($conn,$record['CableAvailableYN']);
$CanalWidth = mysqli_real_escape_string($conn,$record['CanalWidth']);
$CarportDesc = mysqli_real_escape_string($conn,$record['CarportDesc']);
$CarportSpaces = mysqli_real_escape_string($conn,$record['CarportSpaces']);
$CDOM = mysqli_real_escape_string($conn,$record['CDOM']);
$City = mysqli_real_escape_string($conn,$record['City']);
$CloseDate = mysqli_real_escape_string($conn,$record['CloseDate']);
$ClosePrice = mysqli_real_escape_string($conn,$record['ClosePrice']);
$CoListAgent_MUI = mysqli_real_escape_string($conn,$record['CoListAgent_MUI']);
$CoListAgentFullName = mysqli_real_escape_string($conn,$record['CoListAgentFullName']);
$CoListAgentMLSID = mysqli_real_escape_string($conn,$record['CoListAgentMLSID']);
$CoListOffice_MUI = mysqli_real_escape_string($conn,$record['CoListOffice_MUI']);
$CoListOfficeMLSID = mysqli_real_escape_string($conn,$record['CoListOfficeMLSID']);
$CoListOfficeName = mysqli_real_escape_string($conn,$record['CoListOfficeName']);
$CoListOfficePhone = mysqli_real_escape_string($conn,$record['CoListOfficePhone']);
$CommunityType = mysqli_real_escape_string($conn,$record['CommunityType']);
$ConditionalDate = mysqli_real_escape_string($conn,$record['ConditionalDate']);
$CondoFee = mysqli_real_escape_string($conn,$record['CondoFee']);
$CondoFeeFreq = mysqli_real_escape_string($conn,$record['CondoFeeFreq']);
$Construction = mysqli_real_escape_string($conn,$record['Construction']);
$Cooling = mysqli_real_escape_string($conn,$record['Cooling']);
$CoSellingAgent_MUI = mysqli_real_escape_string($conn,$record['CoSellingAgent_MUI']);
$CoSellingAgentFullName = mysqli_real_escape_string($conn,$record['CoSellingAgentFullName']);
$CoSellingAgentMLSID = mysqli_real_escape_string($conn,$record['CoSellingAgentMLSID']);
$CoSellingOffice_MUI = mysqli_real_escape_string($conn,$record['CoSellingOffice_MUI']);
$CoSellingOfficeMLSID = mysqli_real_escape_string($conn,$record['CoSellingOfficeMLSID']);
$CoSellingOfficeName = mysqli_real_escape_string($conn,$record['CoSellingOfficeName']);
$CoSellingOfficePhone = mysqli_real_escape_string($conn,$record['CoSellingOfficePhone']);
$CountyOrParish = mysqli_real_escape_string($conn,$record['CountyOrParish']);
$CreatedDate = mysqli_real_escape_string($conn,$record['CreatedDate']);
$CurrentPrice = mysqli_real_escape_string($conn,$record['CurrentPrice']);
$Development = mysqli_real_escape_string($conn,$record['Development']);
$DevelopmentName = mysqli_real_escape_string($conn,$record['DevelopmentName']);
$DiningDescription = mysqli_real_escape_string($conn,$record['DiningDescription']);
$DOM = mysqli_real_escape_string($conn,$record['DOM']);
$ElementarySchool = mysqli_real_escape_string($conn,$record['ElementarySchool']);
$Elevator = mysqli_real_escape_string($conn,$record['Elevator']);
$Equipment = mysqli_real_escape_string($conn,$record['Equipment']);
$ExteriorFeatures = mysqli_real_escape_string($conn,$record['ExteriorFeatures']);
$ExteriorFinish = mysqli_real_escape_string($conn,$record['ExteriorFinish']);
$Flooring = mysqli_real_escape_string($conn,$record['Flooring']);
$FloorPlanType = mysqli_real_escape_string($conn,$record['FloorPlanType']);
$ForeclosedREOYN = mysqli_real_escape_string($conn,$record['ForeclosedREOYN']);
$FullAddress = mysqli_real_escape_string($conn,$record['FullAddress']);
$FurnishedDesc = mysqli_real_escape_string($conn,$record['FurnishedDesc']);
$GarageDesc = mysqli_real_escape_string($conn,$record['GarageDesc']);
$GarageDimension = mysqli_real_escape_string($conn,$record['GarageDimension']);
$GarageSpaces = mysqli_real_escape_string($conn,$record['GarageSpaces']);
$GasDescription = mysqli_real_escape_string($conn,$record['GasDescription']);
$GolfType = mysqli_real_escape_string($conn,$record['GolfType']);
$GuestHouseDesc = mysqli_real_escape_string($conn,$record['GuestHouseDesc']);
$GuestHouseLivingArea = mysqli_real_escape_string($conn,$record['GuestHouseLivingArea']);
$GulfAccessType = mysqli_real_escape_string($conn,$record['GulfAccessType']);
$GulfAccessYN = mysqli_real_escape_string($conn,$record['GulfAccessYN']);
$Heat = mysqli_real_escape_string($conn,$record['Heat']);
$HighSchool = mysqli_real_escape_string($conn,$record['HighSchool']);
$HOADesc = mysqli_real_escape_string($conn,$record['HOADesc']);
$HOAFee = mysqli_real_escape_string($conn,$record['HOAFee']);
$HOAFeeFreq = mysqli_real_escape_string($conn,$record['HOAFeeFreq']);
$InteriorFeatures = mysqli_real_escape_string($conn,$record['InteriorFeatures']);
$InternetSites = mysqli_real_escape_string($conn,$record['InternetSites']);
$Irrigation = mysqli_real_escape_string($conn,$record['Irrigation']);
$KitchenDescription = mysqli_real_escape_string($conn,$record['KitchenDescription']);
$LandLeaseFee = mysqli_real_escape_string($conn,$record['LandLeaseFee']);
$LandLeaseFeeFreq = mysqli_real_escape_string($conn,$record['LandLeaseFeeFreq']);
$LastChangeTimestamp = mysqli_real_escape_string($conn,$record['LastChangeTimestamp']);
$LastChangeType = mysqli_real_escape_string($conn,$record['LastChangeType']);
$LeaseLimitsYN = mysqli_real_escape_string($conn,$record['LeaseLimitsYN']);
$LeasesPerYear = mysqli_real_escape_string($conn,$record['LeasesPerYear']);
$LegalDesc = mysqli_real_escape_string($conn,$record['LegalDesc']);
$LegalUnit = mysqli_real_escape_string($conn,$record['LegalUnit']);
$ListAgent_MUI = mysqli_real_escape_string($conn,$record['ListAgent_MUI']);
$ListAgentDirectWorkPhone = mysqli_real_escape_string($conn,$record['ListAgentDirectWorkPhone']);
$ListAgentFullName = mysqli_real_escape_string($conn,$record['ListAgentFullName']);
$ListAgentMLSID = mysqli_real_escape_string($conn,$record['ListAgentMLSID']);
$ListingOnInternetYN = mysqli_real_escape_string($conn,$record['ListingOnInternetYN']);
$ListOffice_MUI = mysqli_real_escape_string($conn,$record['ListOffice_MUI']);
$ListOfficeMLSID = mysqli_real_escape_string($conn,$record['ListOfficeMLSID']);
$ListOfficeName = mysqli_real_escape_string($conn,$record['ListOfficeName']);
$ListOfficePhone = mysqli_real_escape_string($conn,$record['ListOfficePhone']);
$ListPrice = mysqli_real_escape_string($conn,$record['ListPrice']);
$LotBack = mysqli_real_escape_string($conn,$record['LotBack']);
$LotDesc = mysqli_real_escape_string($conn,$record['LotDesc']);
$LotFrontage = mysqli_real_escape_string($conn,$record['LotFrontage']);
$LotLeft = mysqli_real_escape_string($conn,$record['LotLeft']);
$LotRight = mysqli_real_escape_string($conn,$record['LotRight']);
$LotUnit = mysqli_real_escape_string($conn,$record['LotUnit']);
$Maintenance = mysqli_real_escape_string($conn,$record['Maintenance']);
$Management = mysqli_real_escape_string($conn,$record['Management']);
$MandatoryClubFee = mysqli_real_escape_string($conn,$record['MandatoryClubFee']);
$MandatoryClubFeeFreq = mysqli_real_escape_string($conn,$record['MandatoryClubFeeFreq']);
$MandatoryHOAYN = mysqli_real_escape_string($conn,$record['MandatoryHOAYN']);
$MasterBathDescription = mysqli_real_escape_string($conn,$record['MasterBathDescription']);
$MasterHOAFee = mysqli_real_escape_string($conn,$record['MasterHOAFee']);
$MasterHOAFeeFreq = mysqli_real_escape_string($conn,$record['MasterHOAFeeFreq']);
$matrix_unique_id = mysqli_real_escape_string($conn,$record['matrix_unique_id']);
$MatrixModifiedDT = mysqli_real_escape_string($conn,$record['MatrixModifiedDT']);
$MiddleSchool = mysqli_real_escape_string($conn,$record['MiddleSchool']);
$MinDaysofLease = mysqli_real_escape_string($conn,$record['MinDaysofLease']);
$MLS = mysqli_real_escape_string($conn,$record['MLS']);
$MLSAreaMajor = mysqli_real_escape_string($conn,$record['MLSAreaMajor']);
$MLSNumber = mysqli_real_escape_string($conn,$record['MLSNumber']);
$NumberofCeilingFans = mysqli_real_escape_string($conn,$record['NumberofCeilingFans']);
$NumUnitFloor = mysqli_real_escape_string($conn,$record['NumUnitFloor']);
$OneTimeLandLeaseFee = mysqli_real_escape_string($conn,$record['OneTimeLandLeaseFee']);
$OneTimeMandatoryClubFee = mysqli_real_escape_string($conn,$record['OneTimeMandatoryClubFee']);
$OneTimeOtheFee = mysqli_real_escape_string($conn,$record['OneTimeOtheFee']);
$OneTimeRecLeaseFee = mysqli_real_escape_string($conn,$record['OneTimeRecLeaseFee']);
$OneTimeSpecialAssessmentFee = mysqli_real_escape_string($conn,$record['OneTimeSpecialAssessmentFee']);
$OriginalListPrice = mysqli_real_escape_string($conn,$record['OriginalListPrice']);
$OwnershipDesc = mysqli_real_escape_string($conn,$record['OwnershipDesc']);
$ParcelNumber = mysqli_real_escape_string($conn,$record['ParcelNumber']);
$Parking = mysqli_real_escape_string($conn,$record['Parking']);
$Pets = mysqli_real_escape_string($conn,$record['Pets']);
$PetsLimitMaxNumber = mysqli_real_escape_string($conn,$record['PetsLimitMaxNumber']);
$PetsLimitMaxWeight = mysqli_real_escape_string($conn,$record['PetsLimitMaxWeight']);
$PetsLimitOther = mysqli_real_escape_string($conn,$record['PetsLimitOther']);
$PhotoCount = mysqli_real_escape_string($conn,$record['PhotoCount']);
$PhotoModificationTimestamp = mysqli_real_escape_string($conn,$record['PhotoModificationTimestamp']);
$Possession = mysqli_real_escape_string($conn,$record['Possession']);
$PostalCode = mysqli_real_escape_string($conn,$record['PostalCode']);
$PostalCodePlus4 = mysqli_real_escape_string($conn,$record['PostalCodePlus4']);
$PotentialShortSaleYN = mysqli_real_escape_string($conn,$record['PotentialShortSaleYN']);
$PricePerSqFt = mysqli_real_escape_string($conn,$record['PricePerSqFt']);
$PrivatePoolDesc = mysqli_real_escape_string($conn,$record['PrivatePoolDesc']);
$PrivatePoolYN = mysqli_real_escape_string($conn,$record['PrivatePoolYN']);
$PrivateSpaDesc = mysqli_real_escape_string($conn,$record['PrivateSpaDesc']);
$PrivateSpaYN = mysqli_real_escape_string($conn,$record['PrivateSpaYN']);
$PropertyAddressonInternetYN = mysqli_real_escape_string($conn,$record['PropertyAddressonInternetYN']);
$PropertyInformation = mysqli_real_escape_string($conn,$record['PropertyInformation']);
$PropertyType = mysqli_real_escape_string($conn,$record['PropertyType']);
$Range = mysqli_real_escape_string($conn,$record['Range']);
$RearExposure = mysqli_real_escape_string($conn,$record['RearExposure']);
$Restrictions = mysqli_real_escape_string($conn,$record['Restrictions']);
$Road = mysqli_real_escape_string($conn,$record['Road']);
$Roof = mysqli_real_escape_string($conn,$record['Roof']);
$RoomCount = mysqli_real_escape_string($conn,$record['RoomCount']);
$Section = mysqli_real_escape_string($conn,$record['Section']);
$SellerConcessionAmount = mysqli_real_escape_string($conn,$record['SellerConcessionAmount']);
$SellingAgent_MUI = mysqli_real_escape_string($conn,$record['SellingAgent_MUI']);
$SellingAgentFullName = mysqli_real_escape_string($conn,$record['SellingAgentFullName']);
$SellingAgentMLSID = mysqli_real_escape_string($conn,$record['SellingAgentMLSID']);
$SellingOffice_MUI = mysqli_real_escape_string($conn,$record['SellingOffice_MUI']);
$SellingOfficeMLSID = mysqli_real_escape_string($conn,$record['SellingOfficeMLSID']);
$SellingOfficeName = mysqli_real_escape_string($conn,$record['SellingOfficeName']);
$SellingOfficePhone = mysqli_real_escape_string($conn,$record['SellingOfficePhone']);
$SellPricePerSqFt = mysqli_real_escape_string($conn,$record['SellPricePerSqFt']);
$SettlementAgentAddress = mysqli_real_escape_string($conn,$record['SettlementAgentAddress']);
$SettlementAgentEmail = mysqli_real_escape_string($conn,$record['SettlementAgentEmail']);
$SettlementAgentName = mysqli_real_escape_string($conn,$record['SettlementAgentName']);
$SettlementAgentPhone = mysqli_real_escape_string($conn,$record['SettlementAgentPhone']);
$Sewer = mysqli_real_escape_string($conn,$record['Sewer']);
$SourceofMeasureLivingArea = mysqli_real_escape_string($conn,$record['SourceofMeasureLivingArea']);
$SourceofMeasureLotDimensions = mysqli_real_escape_string($conn,$record['SourceofMeasureLotDimensions']);
$SourceofMeasureLotSize = mysqli_real_escape_string($conn,$record['SourceofMeasureLotSize']);
$SourceofMeasureTotalArea = mysqli_real_escape_string($conn,$record['SourceofMeasureTotalArea']);
$SpecialAssessment = mysqli_real_escape_string($conn,$record['SpecialAssessment']);
$SpecialAssessmentFeeFreq = mysqli_real_escape_string($conn,$record['SpecialAssessmentFeeFreq']);
$SpecialInformation = mysqli_real_escape_string($conn,$record['SpecialInformation']);
$StateOrProvince = mysqli_real_escape_string($conn,$record['StateOrProvince']);
$Status = mysqli_real_escape_string($conn,$record['Status']);
$StatusType = mysqli_real_escape_string($conn,$record['StatusType']);
$StormProtection = mysqli_real_escape_string($conn,$record['StormProtection']);
$StreetDirPrefix = mysqli_real_escape_string($conn,$record['StreetDirPrefix']);
$StreetDirSuffix = mysqli_real_escape_string($conn,$record['StreetDirSuffix']);
$StreetName = mysqli_real_escape_string($conn,$record['StreetName']);
$StreetNumber = mysqli_real_escape_string($conn,$record['StreetNumber']);
$StreetNumberModifier = mysqli_real_escape_string($conn,$record['StreetNumberModifier']);
$StreetSuffix = mysqli_real_escape_string($conn,$record['StreetSuffix']);
$SubCondoName = mysqli_real_escape_string($conn,$record['SubCondoName']);
$SubdivisionNumber = mysqli_real_escape_string($conn,$record['SubdivisionNumber']);
$Table = mysqli_real_escape_string($conn,$record['Table']);
$TaxDesc = mysqli_real_escape_string($conn,$record['TaxDesc']);
$TaxDistrictType = mysqli_real_escape_string($conn,$record['TaxDistrictType']);
$Taxes = mysqli_real_escape_string($conn,$record['Taxes']);
$TaxYear = mysqli_real_escape_string($conn,$record['TaxYear']);
$TotalAnnualRecurringFees = mysqli_real_escape_string($conn,$record['TotalAnnualRecurringFees']);
$TotalArea = mysqli_real_escape_string($conn,$record['TotalArea']);
$TotalFloors = mysqli_real_escape_string($conn,$record['TotalFloors']);
$Township = mysqli_real_escape_string($conn,$record['Township']);
$TransferFee = mysqli_real_escape_string($conn,$record['TransferFee']);
$UnitCount = mysqli_real_escape_string($conn,$record['UnitCount']);
$UnitFloor = mysqli_real_escape_string($conn,$record['UnitFloor']);
$UnitNumber = mysqli_real_escape_string($conn,$record['UnitNumber']);
$UnitsinBuilding = mysqli_real_escape_string($conn,$record['UnitsinBuilding']);
$UnitsinComplex = mysqli_real_escape_string($conn,$record['UnitsinComplex']);
$View = mysqli_real_escape_string($conn,$record['View']);
$VirtualTourURL = mysqli_real_escape_string($conn,$record['VirtualTourURL']);
$VirtualTourURL2 = mysqli_real_escape_string($conn,$record['VirtualTourURL2']);
$Water = mysqli_real_escape_string($conn,$record['Water']);
$WaterfrontDesc = mysqli_real_escape_string($conn,$record['WaterfrontDesc']);
$WaterfrontYN = mysqli_real_escape_string($conn,$record['WaterfrontYN']);
$Windows = mysqli_real_escape_string($conn,$record['Windows']);
$YearBuilt = mysqli_real_escape_string($conn,$record['YearBuilt']);
$ZoningCode = mysqli_real_escape_string($conn,$record['ZoningCode']);
$Acres = mysqli_real_escape_string($conn,$record['Acres']);
$CoListAgentDirectWorkPhone = mysqli_real_escape_string($conn,$record['CoListAgentDirectWorkPhone']);
$DateRented = mysqli_real_escape_string($conn,$record['DateRented']);
$GrossRentalIncome = mysqli_real_escape_string($conn,$record['GrossRentalIncome']);
$InformationAvailable = mysqli_real_escape_string($conn,$record['InformationAvailable']);
$LastMonthRentReqYN = mysqli_real_escape_string($conn,$record['LastMonthRentReqYN']);
$OtherIncome = mysqli_real_escape_string($conn,$record['OtherIncome']);
$SellingAgentDirectWorkPhone = mysqli_real_escape_string($conn,$record['SellingAgentDirectWorkPhone']);
$SprinklerSource = mysqli_real_escape_string($conn,$record['SprinklerSource']);
$TenantPays = mysqli_real_escape_string($conn,$record['TenantPays']);
$Terms = mysqli_real_escape_string($conn,$record['Terms']);
$TotalBuildings = mysqli_real_escape_string($conn,$record['TotalBuildings']);
$AdditionalInfo = mysqli_real_escape_string($conn,$record['AdditionalInfo']);
$AmortizedOverNumYrs = mysqli_real_escape_string($conn,$record['AmortizedOverNumYrs']);
$AnnualAssociationFee = mysqli_real_escape_string($conn,$record['AnnualAssociationFee']);
$AnnualDebtService = mysqli_real_escape_string($conn,$record['AnnualDebtService']);
$BroadbandYN = mysqli_real_escape_string($conn,$record['BroadbandYN']);
$BusinessEstablish = mysqli_real_escape_string($conn,$record['BusinessEstablish']);
$ClosingType = mysqli_real_escape_string($conn,$record['ClosingType']);
$ComercialPropertyType = mysqli_real_escape_string($conn,$record['ComercialPropertyType']);
$CommercialAmenities = mysqli_real_escape_string($conn,$record['CommercialAmenities']);
$CommercialType = mysqli_real_escape_string($conn,$record['CommercialType']);
$ConfidentialityAgreementReqdYN = mysqli_real_escape_string($conn,$record['ConfidentialityAgreementReqdYN']);
$CoolingRemarks = mysqli_real_escape_string($conn,$record['CoolingRemarks']);
$CoolingYN = mysqli_real_escape_string($conn,$record['CoolingYN']);
$CoveredParkingSpaces = mysqli_real_escape_string($conn,$record['CoveredParkingSpaces']);
$CranesYN = mysqli_real_escape_string($conn,$record['CranesYN']);
$DebtService = mysqli_real_escape_string($conn,$record['DebtService']);
$Depth = mysqli_real_escape_string($conn,$record['Depth']);
$DownPayment = mysqli_real_escape_string($conn,$record['DownPayment']);
$DueInNumYrs = mysqli_real_escape_string($conn,$record['DueInNumYrs']);
$EffectiveGross = mysqli_real_escape_string($conn,$record['EffectiveGross']);
$Electric = mysqli_real_escape_string($conn,$record['Electric']);
$ExpensesInclude = mysqli_real_escape_string($conn,$record['ExpensesInclude']);
$FencedYardYN = mysqli_real_escape_string($conn,$record['FencedYardYN']);
$FireSprinklersYN = mysqli_real_escape_string($conn,$record['FireSprinklersYN']);
$HeatingRemarks = mysqli_real_escape_string($conn,$record['HeatingRemarks']);
$HeatingYN = mysqli_real_escape_string($conn,$record['HeatingYN']);
$IncomeCapRate = mysqli_real_escape_string($conn,$record['IncomeCapRate']);
$IncomeExpenseInfo = mysqli_real_escape_string($conn,$record['IncomeExpenseInfo']);
$Insurance = mysqli_real_escape_string($conn,$record['Insurance']);
$InterestRate = mysqli_real_escape_string($conn,$record['InterestRate']);
$InvestmentType = mysqli_real_escape_string($conn,$record['InvestmentType']);
$LandSqFt = mysqli_real_escape_string($conn,$record['LandSqFt']);
$LeasedRateDesc = mysqli_real_escape_string($conn,$record['LeasedRateDesc']);
$LeaseLossFactorPercentage = mysqli_real_escape_string($conn,$record['LeaseLossFactorPercentage']);
$LeaseMinClearCeilingHeight = mysqli_real_escape_string($conn,$record['LeaseMinClearCeilingHeight']);
$LeaseNoOfGradeLevelDoors = mysqli_real_escape_string($conn,$record['LeaseNoOfGradeLevelDoors']);
$LeaseNoOfParkingSpaces = mysqli_real_escape_string($conn,$record['LeaseNoOfParkingSpaces']);
$LeaseNumberOfElevators = mysqli_real_escape_string($conn,$record['LeaseNumberOfElevators']);
$LeasePower = mysqli_real_escape_string($conn,$record['LeasePower']);
$LeasePrice = mysqli_real_escape_string($conn,$record['LeasePrice']);
$LeaseRailYN = mysqli_real_escape_string($conn,$record['LeaseRailYN']);
$LeaseRateDesc = mysqli_real_escape_string($conn,$record['LeaseRateDesc']);
$LeaseTrafficCount = mysqli_real_escape_string($conn,$record['LeaseTrafficCount']);
$License = mysqli_real_escape_string($conn,$record['License']);
$ListPriceDesc = mysqli_real_escape_string($conn,$record['ListPriceDesc']);
$MaximumSubjectPropertySqFt = mysqli_real_escape_string($conn,$record['MaximumSubjectPropertySqFt']);
$MinimumSubjectPropertySqFt = mysqli_real_escape_string($conn,$record['MinimumSubjectPropertySqFt']);
$NumberDockHighDoors = mysqli_real_escape_string($conn,$record['NumberDockHighDoors']);
$NumberOfBays = mysqli_real_escape_string($conn,$record['NumberOfBays']);
$NumberofLoadingDoors = mysqli_real_escape_string($conn,$record['NumberofLoadingDoors']);
$NumberOfSpacesUnits = mysqli_real_escape_string($conn,$record['NumberOfSpacesUnits']);
$PropertyHighlights = mysqli_real_escape_string($conn,$record['PropertyHighlights']);
$PropertyLocation = mysqli_real_escape_string($conn,$record['PropertyLocation']);
$PropertyName = mysqli_real_escape_string($conn,$record['PropertyName']);
$PropertyUseType = mysqli_real_escape_string($conn,$record['PropertyUseType']);
$ReportTitle = mysqli_real_escape_string($conn,$record['ReportTitle']);
$RoomMixAvgRate = mysqli_real_escape_string($conn,$record['RoomMixAvgRate']);
$RoomMixBeds = mysqli_real_escape_string($conn,$record['RoomMixBeds']);
$RoomMixDesc = mysqli_real_escape_string($conn,$record['RoomMixDesc']);
$RoomMixNumberOfRooms = mysqli_real_escape_string($conn,$record['RoomMixNumberOfRooms']);
$SaleIncludes = mysqli_real_escape_string($conn,$record['SaleIncludes']);
$SourceofExpenses = mysqli_real_escape_string($conn,$record['SourceofExpenses']);
$SubjectPropertySqFt = mysqli_real_escape_string($conn,$record['SubjectPropertySqFt']);
$Tenancy = mysqli_real_escape_string($conn,$record['Tenancy']);
$TotalBuildingSqFt = mysqli_real_escape_string($conn,$record['TotalBuildingSqFt']);
$TransactionType = mysqli_real_escape_string($conn,$record['TransactionType']);
$UtilitiesAvailable = mysqli_real_escape_string($conn,$record['UtilitiesAvailable']);
$AvailableDocuments = mysqli_real_escape_string($conn,$record['AvailableDocuments']);
$Elevation = mysqli_real_escape_string($conn,$record['Elevation']);
$GroundCover = mysqli_real_escape_string($conn,$record['GroundCover']);
$LandImprovements = mysqli_real_escape_string($conn,$record['LandImprovements']);
$LandUseCode = mysqli_real_escape_string($conn,$record['LandUseCode']);
$LotType = mysqli_real_escape_string($conn,$record['LotType']);
$NumberOfParcelsLots = mysqli_real_escape_string($conn,$record['NumberOfParcelsLots']);
$OtherAssessments = mysqli_real_escape_string($conn,$record['OtherAssessments']);
$OtherPIDs = mysqli_real_escape_string($conn,$record['OtherPIDs']);
$PlannedUse = mysqli_real_escape_string($conn,$record['PlannedUse']);
$PricePerAcre = mysqli_real_escape_string($conn,$record['PricePerAcre']);
$SHOWING_INSTRUCTIONS_YN = mysqli_real_escape_string($conn,$record['SHOWING_INSTRUCTIONS_YN']);
$SubdivisionInfo = mysqli_real_escape_string($conn,$record['SubdivisionInfo']);
$Trees = mysqli_real_escape_string($conn,$record['Trees']);
$Usage = mysqli_real_escape_string($conn,$record['Usage']);
$ApproxDistanceToGulfMiles = mysqli_real_escape_string($conn,$record['ApproxDistanceToGulfMiles']);
$ApproxDistanceToGulfMins = mysqli_real_escape_string($conn,$record['ApproxDistanceToGulfMins']);
$BoatLiftType = mysqli_real_escape_string($conn,$record['BoatLiftType']);
$DockConstruction = mysqli_real_escape_string($conn,$record['DockConstruction']);
$DockOwnership = mysqli_real_escape_string($conn,$record['DockOwnership']);
$DrySlipHeight = mysqli_real_escape_string($conn,$record['DrySlipHeight']);
$DrySlipLength = mysqli_real_escape_string($conn,$record['DrySlipLength']);
$DrySlipWidth = mysqli_real_escape_string($conn,$record['DrySlipWidth']);
$FLLandLeaseTransferTax = mysqli_real_escape_string($conn,$record['FLLandLeaseTransferTax']);
$LandLeaseYN = mysqli_real_escape_string($conn,$record['LandLeaseYN']);
$LiftCapacity = mysqli_real_escape_string($conn,$record['LiftCapacity']);
$MarinaName = mysqli_real_escape_string($conn,$record['MarinaName']);
$MaxPermittedDraft = mysqli_real_escape_string($conn,$record['MaxPermittedDraft']);
$MaxWaterDepthMLT = mysqli_real_escape_string($conn,$record['MaxWaterDepthMLT']);
$MaxWetSlipBeam = mysqli_real_escape_string($conn,$record['MaxWetSlipBeam']);
$MaxWetSlipLenghtOverall = mysqli_real_escape_string($conn,$record['MaxWetSlipLenghtOverall']);
$MeanLowTide = mysqli_real_escape_string($conn,$record['MeanLowTide']);
$NumberOfSlipsInMarina = mysqli_real_escape_string($conn,$record['NumberOfSlipsInMarina']);
$SlipCoveredYN = mysqli_real_escape_string($conn,$record['SlipCoveredYN']);
$SlipNumber = mysqli_real_escape_string($conn,$record['SlipNumber']);
$SlipType = mysqli_real_escape_string($conn,$record['SlipType']);
$YearsRemainingOnLandLease = mysqli_real_escape_string($conn,$record['YearsRemainingOnLandLease']);


$jsonData = "
{
    \"ActiveOpenHouseCount\":\"$ActiveOpenHouseCount\",
    \"AmenityRecFee\":\"$AmenityRecFee\",
    \"AmenRecFreq\":\"$AmenRecFreq\",
    \"ApplicationFee\":\"$ApplicationFee\",
    \"Approval\":\"$Approval\",
    \"AssociationMngmtPhone\":\"$AssociationMngmtPhone\",
    \"AVMYN\":\"$AVMYN\",
    \"Block\":\"$Block\",
    \"BloggingYN\":\"$BloggingYN\",
    \"BoatAccess\":\"$BoatAccess\",
    \"BuilderProductYN\":\"$BuilderProductYN\",
    \"BuildingDesc\":\"$BuildingDesc\",
    \"BuildingDesign\":\"$BuildingDesign\",
    \"BuildingNumber\":\"$BuildingNumber\",
    \"CanalWidth\":\"$CanalWidth\",
    \"CarportDesc\":\"$CarportDesc\",
    \"CarportSpaces\":\"$CarportSpaces\",
    \"CDOM\":\"$CDOM\",
    \"CoListAgent_MUI\":\"$CoListAgent_MUI\",
    \"CoListAgentFullName\":\"$CoListAgentFullName\",
    \"CoListAgentMLSID\":\"$CoListAgentMLSID\",
    \"CoListOffice_MUI\":\"$CoListOffice_MUI\",
    \"CoListOfficeMLSID\":\"$CoListOfficeMLSID\",
    \"CoListOfficeName\":\"$CoListOfficeName\",
    \"CoListOfficePhone\":\"$CoListOfficePhone\",
    \"CondoFee\":\"$CondoFee\",
    \"CondoFeeFreq\":\"$CondoFeeFreq\",
    \"CoSellingAgent_MUI\":\"$CoSellingAgent_MUI\",
    \"CoSellingAgentFullName\":\"$CoSellingAgentFullName\",
    \"CoSellingAgentMLSID\":\"$CoSellingAgentMLSID\",
    \"CoSellingOffice_MUI\":\"$CoSellingOffice_MUI\",
    \"CoSellingOfficeMLSID\":\"$CoSellingOfficeMLSID\",
    \"CoSellingOfficeName\":\"$CoSellingOfficeName\",
    \"CoSellingOfficePhone\":\"$CoSellingOfficePhone\",
    \"DiningDescription\":\"$DiningDescription\",
    \"ElementarySchool\":\"$ElementarySchool\",
    \"ExteriorFinish\":\"$ExteriorFinish\",
    \"FloorPlanType\":\"$FloorPlanType\",
    \"GarageDimension\":\"$GarageDimension\",
    \"GasDescription\":\"$GasDescription\",
    \"GolfType\":\"$GolfType\",
    \"GuestHouseDesc\":\"$GuestHouseDesc\",
    \"GuestHouseLivingArea\":\"$GuestHouseLivingArea\",
    \"GulfAccessType\":\"$GulfAccessType\",
    \"GulfAccessYN\":\"$GulfAccessYN\",
    \"HOADesc\":\"$HOADesc\",
    \"HOAFee\":\"$HOAFee\",
    \"HOAFeeFreq\":\"$HOAFeeFreq\",
    \"InternetSites\":\"$InternetSites\",
    \"Irrigation\":\"$Irrigation\",
    \"KitchenDescription\":\"$KitchenDescription\",
    \"LandLeaseFee\":\"$LandLeaseFee\",
    \"LandLeaseFeeFreq\":\"$LandLeaseFeeFreq\",
    \"LastChangeTimestamp\":\"$LastChangeTimestamp\",
    \"LastChangeType\":\"$LastChangeType\",
    \"LeaseLimitsYN\":\"$LeaseLimitsYN\",
    \"LeasesPerYear\":\"$LeasesPerYear\",
    \"LegalDesc\":\"$LegalDesc\",
    \"LegalUnit\":\"$LegalUnit\",
    \"ListAgent_MUI\":\"$ListAgent_MUI\",
    \"ListAgentDirectWorkPhone\":\"$ListAgentDirectWorkPhone\",
    \"ListAgentFullName\":\"$ListAgentFullName\",
    \"ListAgentMLSID\":\"$ListAgentMLSID\",
    \"ListingOnInternetYN\":\"$ListingOnInternetYN\",
    \"ListOffice_MUI\":\"$ListOffice_MUI\",
    \"ListOfficeMLSID\":\"$ListOfficeMLSID\",
    \"ListOfficeName\":\"$ListOfficeName\",
    \"ListOfficePhone\":\"$ListOfficePhone\",
    \"LotBack\":\"$LotBack\",
    \"LotDesc\":\"$LotDesc\",
    \"LotFrontage\":\"$LotFrontage\",
    \"LotLeft\":\"$LotLeft\",
    \"LotRight\":\"$LotRight\",
    \"Maintenance\":\"$Maintenance\",
    \"Management\":\"$Management\",
    \"MandatoryClubFee\":\"$MandatoryClubFee\",
    \"MandatoryClubFeeFreq\":\"$MandatoryClubFeeFreq\",
    \"MandatoryHOAYN\":\"$MandatoryHOAYN\",
    \"MasterBathDescription\":\"$MasterBathDescription\",
    \"MasterHOAFee\":\"$MasterHOAFee\",
    \"MasterHOAFeeFreq\":\"$MasterHOAFeeFreq\",
    \"MinDaysofLease\":\"$MinDaysofLease\",
    \"NumberofCeilingFans\":\"$NumberofCeilingFans\",
    \"OneTimeLandLeaseFee\":\"$OneTimeLandLeaseFee\",
    \"OneTimeMandatoryClubFee\":\"$OneTimeMandatoryClubFee\",
    \"OneTimeOtheFee\":\"$OneTimeOtheFee\",
    \"OneTimeRecLeaseFee\":\"$OneTimeRecLeaseFee\",
    \"OneTimeSpecialAssessmentFee\":\"$OneTimeSpecialAssessmentFee\",
    \"OriginalListPrice\":\"$OriginalListPrice\",
    \"OwnershipDesc\":\"$OwnershipDesc\",
    \"PhotoModificationTimestamp\":\"$PhotoModificationTimestamp\",
    \"Possession\":\"$Possession\",
    \"PricePerSqFt\":\"$PricePerSqFt\",
    \"PrivateSpaDesc\":\"$PrivateSpaDesc\",
    \"PrivateSpaYN\":\"$PrivateSpaYN\",
    \"RearExposure\":\"$RearExposure\",
    \"Restrictions\":\"$Restrictions\",
    \"Road\":\"$Road\",
    \"Roof\":\"$Roof\",
    \"Section\":\"$Section\",
    \"SellerConcessionAmount\":\"$SellerConcessionAmount\",
    \"SellingAgent_MUI\":\"$SellingAgent_MUI\",
    \"SellingAgentFullName\":\"$SellingAgentFullName\",
    \"SellingAgentMLSID\":\"$SellingAgentMLSID\",
    \"SellingOffice_MUI\":\"$SellingOffice_MUI\",
    \"SellingOfficeMLSID\":\"$SellingOfficeMLSID\",
    \"SellingOfficeName\":\"$SellingOfficeName\",
    \"SellingOfficePhone\":\"$SellingOfficePhone\",
    \"SellPricePerSqFt\":\"$SellPricePerSqFt\",
    \"SettlementAgentAddress\":\"$SettlementAgentAddress\",
    \"SettlementAgentEmail\":\"$SettlementAgentEmail\",
    \"SettlementAgentName\":\"$SettlementAgentName\",
    \"SettlementAgentPhone\":\"$SettlementAgentPhone\",
    \"Sewer\":\"$Sewer\",
    \"SourceofMeasureLivingArea\":\"$SourceofMeasureLivingArea\",
    \"SourceofMeasureLotDimensions\":\"$SourceofMeasureLotDimensions\",
    \"SourceofMeasureLotSize\":\"$SourceofMeasureLotSize\",
    \"SourceofMeasureTotalArea\":\"$SourceofMeasureTotalArea\",
    \"SpecialAssessment\":\"$SpecialAssessment\",
    \"SpecialAssessmentFeeFreq\":\"$SpecialAssessmentFeeFreq\",
    \"SpecialInformation\":\"$SpecialInformation\",
    \"StormProtection\":\"$StormProtection\",
    \"SubCondoName\":\"$SubCondoName\",
    \"SubdivisionNumber\":\"$SubdivisionNumber\",
    \"Table\":\"$Table\",
    \"TaxDesc\":\"$TaxDesc\",
    \"TaxDistrictType\":\"$TaxDistrictType\",
    \"Taxes\":\"$Taxes\",
    \"TaxYear\":\"$TaxYear\",
    \"TotalAnnualRecurringFees\":\"$TotalAnnualRecurringFees\",
    \"TransferFee\":\"$TransferFee\",
    \"View\":\"$View\",
    \"VirtualTourURL\":\"$VirtualTourURL\",
    \"VirtualTourURL2\":\"$VirtualTourURL2\",
    \"Windows\":\"$Windows\",
    \"ZoningCode\":\"$ZoningCode\",
    \"CoListAgentDirectWorkPhone\":\"$CoListAgentDirectWorkPhone\",
    \"GrossRentalIncome\":\"$GrossRentalIncome\",
    \"InformationAvailable\":\"$InformationAvailable\",
    \"LastMonthRentReqYN\":\"$LastMonthRentReqYN\",
    \"OtherIncome\":\"$OtherIncome\",
    \"SellingAgentDirectWorkPhone\":\"$SellingAgentDirectWorkPhone\",
    \"SprinklerSource\":\"$SprinklerSource\",
    \"TenantPays\":\"$TenantPays\",
    \"TotalBuildings\":\"$TotalBuildings\",
    \"AdditionalInfo\":\"$AdditionalInfo\",
    \"AmortizedOverNumYrs\":\"$AmortizedOverNumYrs\",
    \"AnnualAssociationFee\":\"$AnnualAssociationFee\",
    \"AnnualDebtService\":\"$AnnualDebtService\",
    \"BroadbandYN\":\"$BroadbandYN\",
    \"BusinessEstablish\":\"$BusinessEstablish\",
    \"ClosingType\":\"$ClosingType\",
    \"ComercialPropertyType\":\"$ComercialPropertyType\",
    \"CommercialAmenities\":\"$CommercialAmenities\",
    \"CommercialType\":\"$CommercialType\",
    \"ConfidentialityAgreementReqdYN\":\"$ConfidentialityAgreementReqdYN\",
    \"CoveredParkingSpaces\":\"$CoveredParkingSpaces\",
    \"CranesYN\":\"$CranesYN\",
    \"DebtService\":\"$DebtService\",
    \"Depth\":\"$Depth\",
    \"DownPayment\":\"$DownPayment\",
    \"DueInNumYrs\":\"$DueInNumYrs\",
    \"EffectiveGross\":\"$EffectiveGross\",
    \"ExpensesInclude\":\"$ExpensesInclude\",
    \"FireSprinklersYN\":\"$FireSprinklersYN\",
    \"IncomeCapRate\":\"$IncomeCapRate\",
    \"IncomeExpenseInfo\":\"$IncomeExpenseInfo\",
    \"Insurance\":\"$Insurance\",
    \"InterestRate\":\"$InterestRate\",
    \"InvestmentType\":\"$InvestmentType\",
    \"LeasedRateDesc\":\"$LeasedRateDesc\",
    \"LeaseLossFactorPercentage\":\"$LeaseLossFactorPercentage\",
    \"LeaseMinClearCeilingHeight\":\"$LeaseMinClearCeilingHeight\",
    \"LeaseNoOfGradeLevelDoors\":\"$LeaseNoOfGradeLevelDoors\",
    \"LeaseNoOfParkingSpaces\":\"$LeaseNoOfParkingSpaces\",
    \"LeaseNumberOfElevators\":\"$LeaseNumberOfElevators\",
    \"LeasePower\":\"$LeasePower\",
    \"LeaseTrafficCount\":\"$LeaseTrafficCount\",
    \"License\":\"$License\",
    \"MaximumSubjectPropertySqFt\":\"$MaximumSubjectPropertySqFt\",
    \"MinimumSubjectPropertySqFt\":\"$MinimumSubjectPropertySqFt\",
    \"PropertyHighlights\":\"$PropertyHighlights\",
    \"ReportTitle\":\"$ReportTitle\",
    \"RoomMixAvgRate\":\"$RoomMixAvgRate\",
    \"RoomMixBeds\":\"$RoomMixBeds\",
    \"RoomMixDesc\":\"$RoomMixDesc\",
    \"RoomMixNumberOfRooms\":\"$RoomMixNumberOfRooms\",
    \"SaleIncludes\":\"$SaleIncludes\",
    \"SourceofExpenses\":\"$SourceofExpenses\",
    \"Tenancy\":\"$Tenancy\",
    \"TransactionType\":\"$TransactionType\",
    \"AvailableDocuments\":\"$AvailableDocuments\",
    \"Elevation\":\"$Elevation\",
    \"GroundCover\":\"$GroundCover\",
    \"LandImprovements\":\"$LandImprovements\",
    \"LandUseCode\":\"$LandUseCode\",
    \"OtherAssessments\":\"$OtherAssessments\",
    \"OtherPIDs\":\"$OtherPIDs\",
    \"PlannedUse\":\"$PlannedUse\",
    \"SHOWING_INSTRUCTIONS_YN\":\"$SHOWING_INSTRUCTIONS_YN\",
    \"SubdivisionInfo\":\"$SubdivisionInfo\",
    \"Trees\":\"$Trees\",
    \"Usage\":\"$Usage\",
    \"ApproxDistanceToGulfMiles\":\"$ApproxDistanceToGulfMiles\",
    \"ApproxDistanceToGulfMins\":\"$ApproxDistanceToGulfMins\",
    \"BoatLiftType\":\"$BoatLiftType\",
    \"DockConstruction\":\"$DockConstruction\",
    \"DockOwnership\":\"$DockOwnership\",
    \"DrySlipHeight\":\"$DrySlipHeight\",
    \"DrySlipLength\":\"$DrySlipLength\",
    \"DrySlipWidth\":\"$DrySlipWidth\",
    \"FLLandLeaseTransferTax\":\"$FLLandLeaseTransferTax\",
    \"LiftCapacity\":\"$LiftCapacity\",
    \"MarinaName\":\"$MarinaName\",
    \"MaxPermittedDraft\":\"$MaxPermittedDraft\",
    \"MaxWaterDepthMLT\":\"$MaxWaterDepthMLT\",
    \"MaxWetSlipBeam\":\"$MaxWetSlipBeam\",
    \"MaxWetSlipLenghtOverall\":\"$MaxWetSlipLenghtOverall\",
    \"MeanLowTide\":\"$MeanLowTide\",
    \"NumberOfSlipsInMarina\":\"$NumberOfSlipsInMarina\",
    \"SlipCoveredYN\":\"$SlipCoveredYN\",
    \"YearsRemainingOnLandLease\":\"$YearsRemainingOnLandLease\"
}";

//$confirm="SELECT ListingKeyNumeric FROM properties WHERE ListingKeyNumeric='$ListingKeyNumeric' LIMIT 1";
//$confirmRslt=mysqli_query($conn,$confirm) or die(mysqli_error($conn)); 
//$pptyExt=mysqli_num_rows($confirmRslt);

//if($pptyExt<1){ /** use update on duplicate instead **/
 
$City = ucwords(strtolower($City));
$Development = ucwords(strtolower($Development));
$DevelopmentName = ucwords(strtolower($DevelopmentName));

$PropertyAddress=$StreetNumber.' '.$StreetName.' '.$StreetSuffix.', '.$City.', '.$StateOrProvince.' '.$PostalCode;
 
/* LargePhoto or Photo or XLargePhoto
Photo: listings
XLargePhoto: property dtails
**/ 

$DefaultPic = "";

$imgName = preg_replace("/[^a-zA-Z0-9-_]+/", "-", $PropertyAddress);
$DefaultPic="listings_images/$imgName-$matrix_unique_id-$MLSNumber-0.jpeg";

if($via =='local'){
$main_path = "../";
}else{
$main_path = "/kunden/homepages/27/d962833332/htdocs/first1.us/";    
}

if(!file_exists($main_path."$DefaultPic")){
        
$photos = $rets->GetObject('Property', 'XLargePhoto', $matrix_unique_id, '0', 0);
foreach($photos as $photo){ 
 $isError = $photo->isError();
 $getError = $photo->getError(); // returns a \PHRETS\Models\RETSError
 $ContentType = $photo->getContentType();
 $image = $photo->getContent();

 if(!$isError){
    file_put_contents($main_path."$DefaultPic", $image); 
 }else{
    print_r($getError);
 } 
}

}

if(($MLSNumber!='') && ($matrix_unique_id!='')){
$DateAdded=date('Y-m-d H:i:s'); 

$oldStatus = 'Unknown';
$oldPrice = 0; 
if($from == 'update'){
    $sqlCheck = "SELECT Status, CurrentPrice FROM properties WHERE MLSNumber='$MLSNumber' LIMIT 1"; 
    $checkOldRslt=mysqli_query($conn,$sqlCheck) or die(mysqli_error($conn));
    $this_pptyExst=mysqli_num_rows($checkOldRslt); 
    
    if($this_pptyExst>0){
        $rowSt = mysqli_fetch_assoc($checkOldRslt);
        $oldStatus = $rowSt['Status'];
        $oldPrice = $rowSt['CurrentPrice']; 
    }
}

$addOneByOne="INSERT INTO properties(
PropertyClass,
Acres,
AdditionalRooms,
Amenities,
ApproxLivingArea,
BathsFull,
BathsHalf,
BathsTotal,
BedroomDesc,
Bedrooms,
BedsTotal,
BuildingDesc,
BuildingDesign,
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
GuestHouseDesc,
GulfAccessYN,
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
PrivateSpaDesc,
PrivateSpaYN,
PropertyAddress,
PropertyAddressonInternetYN,
PropertyInformation,
PropertyLocation,
PropertyName,
PropertyType,
PropertyUseType,
Ranges,
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
SubCondoName,
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
YearBuilt,
DefaultPic,
other_fields_json,
DateAdded) 
VALUES (
'$PropertyClass',
'$Acres',
'$AdditionalRooms',
'$Amenities',
'$ApproxLivingArea',
'$BathsFull',
'$BathsHalf',
'$BathsTotal',
'$BedroomDesc',
'$Bedrooms',
'$BedsTotal',
'$BuildingDesc',
'$BuildingDesign',
'$CableAvailableYN',
'$City',
'$CloseDate',
'$ClosePrice',
'$CommunityType',
'$ConditionalDate',
'$Construction',
'$Cooling',
'$CoolingRemarks',
'$CoolingYN',
'$CountyOrParish',
'$CreatedDate',
'$CurrentPrice',
'$DOM',
'$DateRented',
'$Development',
'$DevelopmentName',
'$Electric',
'$Elevator',
'$Equipment',
'$ExteriorFeatures',
'$FencedYardYN',
'$Flooring',
'$ForeclosedREOYN',
'$FullAddress',
'$FurnishedDesc',
'$GarageDesc',
'$GarageSpaces',
'$GuestHouseDesc',
'$GulfAccessYN',
'$Heat',
'$HeatingRemarks',
'$HeatingYN',
'$HighSchool',
'$InteriorFeatures',
'$LandLeaseYN',
'$LandSqFt',
'$LeasePrice',
'$LeaseRailYN',
'$LeaseRateDesc',
'$ListPrice',
'$ListPriceDesc',
'$LotType',
'$LotUnit',
'$matrix_unique_id',
'$MLS',
'$MLSAreaMajor',
'$MLSNumber',
'$MatrixModifiedDT',
'$MiddleSchool',
'$NumUnitFloor',
'$NumberDockHighDoors',
'$NumberOfBays',
'$NumberOfParcelsLots',
'$NumberOfSpacesUnits',
'$NumberofLoadingDoors',
'$ParcelNumber',
'$Parking',
'$Pets',
'$PetsLimitMaxNumber',
'$PetsLimitMaxWeight',
'$PetsLimitOther',
'$PhotoCount',
'$PostalCode',
'$PostalCodePlus4',
'$PotentialShortSaleYN',
'$PricePerAcre',
'$PrivatePoolDesc',
'$PrivatePoolYN',
'$PrivateSpaDesc',
'$PrivateSpaYN',
'$PropertyAddress',
'$PropertyAddressonInternetYN',
'$PropertyInformation',
'$PropertyLocation',
'$PropertyName',
'$PropertyType',
'$PropertyUseType',
'$Range',
'$RoomCount',
'$SlipNumber',
'$SlipType',
'$StateOrProvince',
'$Status',
'$StatusType',
'$StreetDirPrefix',
'$StreetDirSuffix',
'$StreetName',
'$StreetNumber',
'$StreetNumberModifier',
'$StreetSuffix',
'$SubCondoName',
'$SubjectPropertySqFt',
'$Terms',
'$TotalArea',
'$TotalBuildingSqFt',
'$TotalFloors',
'$Township',
'$UnitCount',
'$UnitFloor',
'$UnitNumber',
'$UnitsinBuilding',
'$UnitsinComplex',
'$UtilitiesAvailable',
'$Water',
'$WaterfrontDesc',
'$WaterfrontYN',
'$YearBuilt',
'$DefaultPic',
'$jsonData',
'$DateAdded') ON DUPLICATE KEY UPDATE matrix_unique_id=VALUES(matrix_unique_id), ListPrice=VALUES(ListPrice), CurrentPrice=VALUES(CurrentPrice), DOM=VALUES(DOM), Status=VALUES(Status), MatrixModifiedDT=VALUES(MatrixModifiedDT), other_fields_json=Values(other_fields_json), DateAdded=Values(DateAdded)"; 
$oneByOneRslt=mysqli_query($conn,$addOneByOne) or die(mysqli_error($conn)); 

if($oneByOneRslt){
     
    if(($CurrentPrice<$oldPrice) && ($oldPrice!='') && ($oldPrice!='0')){ /** flag for price drop **/
        $priceChngFld = ", PriceChangeType='Dropped', PreviousPptyPrice='$oldPrice'";
    }else if($CurrentPrice>$oldPrice && $oldPrice>0){ /** flag for price rise **/
        $priceChngFld = ", PriceChangeType='Rise', PreviousPptyPrice='$oldPrice'";
    }else{
        $priceChngFld=", PriceChangeType=NULL, PreviousPptyPrice=NULL";
    }
    
    if($from == 'update' && $oldStatus!='Active' && $Status == 'Active'){ /** Old status must be sold, or pending family and new status must be Active **/
        $upFB="UPDATE properties SET PostToFbWall='Yes', SendAlerts='Yes', LastChangeDate='$start_time' $priceChngFld WHERE MLSNumber='$MLSNumber'";
        $fbwlRslt=mysqli_query($conn,$upFB) or die(mysqli_error($conn));
        //echo "Updated too <br/>";
    }else if($oldStatus != $Status && $Status!='Active'){
        $upFB="UPDATE properties SET SendAlerts='Yes', LastChangeDate='$start_time' WHERE MLSNumber='$MLSNumber'";
        $fbwlRslt=mysqli_query($conn,$upFB) or die(mysqli_error($conn));
        //echo "Updated too <br/>";
    }else if($oldStatus == $Status && $Status=='Active'){
        $upFB="UPDATE properties SET LastChangeDate='$start_time' $priceChngFld WHERE MLSNumber='$MLSNumber'";
        $fbwlRslt=mysqli_query($conn,$upFB) or die(mysqli_error($conn));
        //echo "Updated too <br/>";
    }
    
    $upMod="UPDATE last_modified SET last_time='$start_time' WHERE last_time!='' AND PropertyClass='$PropertyClass'";
    $modRslt=mysqli_query($conn,$upMod) or die(mysqli_error($conn));
        
    //echo "$matrix_unique_id $oldStatus $Status added <br/>";
}else{
    echo "Unable to add $matrix_unique_id <br/>";
}
}

$counter++; 
}
?>