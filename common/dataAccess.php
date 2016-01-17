<?php

/**
 * Created by PhpStorm
 * Users: Jordan Gaston, Nahome Befekadu
 * Date: 11/22/15
 * Time: 7:45 PM
 * Version: 0.1
 */
class dataAccess
{

    private $_db;

    public function dataAccess($db = null){

    if(is_object($db)){
        $this->_db = $db;
    }
    else{
        $database_string = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $this->_db = new PDO($database_string, DB_USER, DB_PASS);
    }


}// end constructor

    public function insertOrganization($org_name, $address, $org_id){
        $stmt = $this->_db->prepare("CALL insertOrg(:org_name,:org_address,:org_id)");
        $stmt->bindParam(':org_name', $org_name);
        $stmt->bindParam(':org_address', $address);
        $stmt-> bindParam(':org_id', $org_id);
        $stmt->execute();

    }// end insert Org

    public function insertDonor($address, $phone_no, $email, $fname, $lname, $mi, $don_id, $org_id){

        $stmt = $this->_db->prepare("CALL insertDonor(:address,:phone,:email,:fname,:lname,:mi,
       :don_id, :org_id )");
        // binding parameters
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone_no);
        $stmt-> bindParam(':email', $email);
        $stmt-> bindParam(':fname', $fname);
        $stmt-> bindParam(':lname', $lname);
        $stmt-> bindParam(':mi', $mi);
        $stmt-> bindParam(':don_id',$don_id);
        $stmt-> bindParam(':org_id', $org_id);

        $stmt->execute();
    
    }// end insertDonor

    public function insertEvent($event_id, $event_name, $event_date, $income, $expenses){

        $stmt = $this->_db->prepare("CALL insertEvent(:event_id,:event_name,:event_date,:income,:expenses)");
        // binding parameters
        $stmt-> bindParam(':event_id', $event_id);
        $stmt-> bindParam(':event_name', $event_name);
        $stmt-> bindParam(':event_date', $event_date);
        $stmt-> bindParam(':income', $income);
        $stmt-> bindParam(':expenses', $expenses);

        $stmt->execute();
    }// end insertEvent

    public function insertIMoneyDonation($ind_mon_id, $don_value, $don_date, $receipt_date, $ind_don_id, $pay_type, $event_id){

     $stmt = $this->_db->prepare("CALL insertIMoneyDonation(:ind_mon_id,:don_value,:don_date,:receipt_date,:ind_don_id, :pay_type, :event_id)");

     $stmt-> bindParam(":ind_mon_id",$ind_mon_id);
     $stmt-> bindParam(":don_value",$don_value);
     $stmt-> bindParam(":don_date", $don_date);
     $stmt-> bindParam(":receipt_date", $receipt_date);
     $stmt-> bindParam(":ind_don_id", $ind_don_id);
     $stmt-> bindParam(":pay_type", $pay_type);
     $stmt-> bindParam(":event_id", $event_id);

     $stmt->execute();

    }

    public function insertIMiscDonation($ind_misc_id, $don_date, $description, $ind_don_id, $event_id){

        $stmt = $this->_db->prepare("CALL insertIndMiscDon(:ind_misc_id, :don_date, :description, :ind_don_id, :event_id)");

        $stmt-> bindParam(":ind_misc_id", $ind_misc_id);
        $stmt-> bindParam(":don_date", $don_date);
        $stmt-> bindParam(":description", $description);
        $stmt-> bindParam(":ind_don_id", $ind_don_id);
        $stmt-> bindParam(":event_id", $event_id);
        $stmt-> execute();
        
    }

    public function insertOMoneyDonation($org_mon_id, $don_value, $don_date, $reciept_date, $org_don_id,$pay_type, $event_id){
            //temporary work around for a broken function 
       // $stmt = $this->_db->prepare("CALL insertOMoneyDonation(:org_mon_id,:don_value,:don_date,:reciept_date,:org_don_id,:pay_type,:event_id)");
            $stmt = $this->_db->prepare("insert into org_mon_don values(:org_mon_id, :don_value, :don_date, :reciept_date,:org_don_id, :pay_type,:event_id)");
        $stmt-> bindParam(":org_mon_id", $org_mon_id);
        $stmt-> bindParam(":don_value", $don_value);
        $stmt-> bindParam(":don_date", $don_date);
        $stmt-> bindParam(":reciept_date", $reciept_date);
        $stmt-> bindParam(":org_don_id", $org_don_id);
        $stmt-> bindParam(":pay_type", $pay_type);
         
        $boolean = is_null($event_id);
        
                
        if(! ($boolean)){
                   
           $stmt->bindValue(':event_id',null , PDO::PARAM_NULL);
        }
        else {
            $stmt-> bindParam(":event_id", $event_id);
        }
        $stmt->execute();
    }

    public function insertOMiscDonation($org_misc_id,$don_date,$description,$org_don_id,$event_id){

      // temporary workaround for a broken function
       // $stmt = $this->_db->prepare("CALL insertOrgMiscDonor(:org_misc_id,:don_date,:description,:org_don_id,:event_id)");
         $stmt = $this->_db->prepare("insert into org_misc_don values(:org_misc_id,:don_date,:description,:org_don_id,:event_id)");  
        $stmt->bindParam(":org_misc_id",$org_misc_id);
        $stmt->bindParam(":don_date",$don_date);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":org_don_id", $org_don_id);
        $stmt->bindParam(":event_id", $event_id);

        $stmt->execute();

    }

    public function validateDonorId($donor_id){

    $id = null;

    $stmt = $this->_db->prepare("CALL validateDonorId(:donor_id,@id)");

    $stmt->bindParam(":donor_id", $donor_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function validateOrgId($org_id){
        $id = null;

        $stmt = $this->_db->prepare("CALL validateOrgId(:org_id,@id)");

        $stmt->bindParam(":org_id", $org_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];

    }

    public function validateEventId($event_id){

        $id = null;

        $stmt = $this->_db->prepare("CALL validateEventId(:event_id,@id)");

        $stmt->bindParam(":event_id", $event_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];

    }

    public function validateIMoneyDonationId($ind_mon_id){


        $id = null;

        $stmt = $this->_db->prepare("CALL validateIMoneyDonationId(:ind_mon_id,@id)");

        $stmt->bindParam(":ind_mon_id", $ind_mon_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function validateIMiscDonationId($ind_misc_id){

        $id = null;

        $stmt = $this->_db->prepare("CALL validateIndMiscDonId(:ind_misc_id,@id)");

        $stmt->bindParam(":ind_misc_id", $ind_misc_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];

    }

    public function validateOMoneyDonationId($org_mon_id){

        $id = null;

        $stmt = $this->_db->prepare("CALL validateOMoneyDonation(:org_mon_id,@id)");

        $stmt->bindParam(":org_mon_id", $org_mon_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function validateOMiscDonationId($org_misc_id)
    {
        $id = null;

        $stmt = $this->_db->prepare("CALL validateOrgMiscDonId(:org_misc_id,@id)");

        $stmt->bindParam(":org_misc_id", $org_misc_id);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];

    }

    public function generateDonorId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateDonorId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function generateOrgId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateOrgId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
        
    }

    public function generateEventId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateEventId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function generateIMonDonId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateIMonDonId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];

    }

    public function generateIMiscDonId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateIndMiscDonId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function generateOMonDonId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateOMonDonId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];

    }

    public function generateOMiscDonId(){
        $id = null;
        $stmt = $this->_db->prepare("CALL generateOrgMiscDonId(@id)");
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function deleteDonor($donor_id){

    $query = "delete from ind_donor where don_id like :donor_id ";
    $stmt = $this->_db->prepare($query);
    $stmt->bindParam(":donor_id",$donor_id);
    $stmt->execute();
    }

    public function deleteOrg($org_id){

        $query = "delete from org_donor where org_id like :org_id ";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(":org_id",$org_id);
        $stmt->execute();

    }

    public function deleteEvent($event_id){

        $query = "delete from event_don where event_don.event_id like :event_id ";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(":event_id",$event_id);
        $stmt->execute();

    }

    public function deleteIMoneyDonation($don_id){

        $query = "delete from ind_mon_don where ind_mon_don.ind_mon_id like :don_id ";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(":don_id",$don_id);
        $stmt->execute();
    }

    public function deleteIMiscDonation($don_id){
        $query = "delete from ind_misc_don where ind_misc_don.ind_misc_id like :don_id ";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(":don_id",$don_id);
        $stmt->execute();

    }

    public function deleteOMoneyDonation($don_id){

        $query = "delete from org_mon_don where org_mon_don.org_mon_id like :don_id ";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(":don_id",$don_id);
        $stmt->execute();
    }

    public function deleteOMiscDonation($don_id){
        $query = "delete from org_misc_don where org_misc_don.org_misc_id like :don_id ";
        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(":don_id",$don_id);
        $stmt->execute();
    }

    public function validateDonor($fname, $lname){

       $id = null;
        $stmt = $this->_db->prepare("CALL validateIndDonor(:fname,:lname,@id) ");
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":lname", $lname);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function validateOrgName($name){
        $id = null;
        $stmt = $this->_db->prepare("CALL validateOrgName(:name,@id) ");
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

    public function validateEvent($name, $date){
        $id = null;
        $stmt = $this->_db->prepare("CALL validateEvent(:name,:date,@id) ");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        $id = $this->_db->query("select @id")->fetchAll();
        $id = $id[0];
        return $id[0];
    }

   public function getIndividualMoneyDonations(){

   $stmt = $this->_db->prepare("select * from IndividualMoneyDonations");
   $stmt ->execute();
   return $stmt;
   }


   public function getIndividualMiscDonations(){

   $stmt = $this->_db->prepare("select * from IndividualMiscDonation");
   $stmt ->execute();
   return $stmt;
   }


   public function getOrganizationMoneyDonations(){
   	$stmt = $this->_db->prepare("select * from OrganizationMoneyDonation"); 
   	$stmt->execute();
	return $stmt;
   }

    
   public function getOrganizationMiscDonations(){
   	$stmt = $this->_db->prepare("select * from OrganizationMiscDonation"); 
   	$stmt->execute();
	return $stmt;
   }
    
   public function getIndividualDonation(){
    $stmt = $this->_db->prepare("select * from IndividualDonation");
    $stmt->execute();
    return $stmt;    
   }

   public function getOrganizationDonation(){
    $stmt = $this->_db->prepare("select * from OrganizationDonation");
    $stmt->execute();
    return $stmt; 
   }

   public function getEventDonation(){
    $stmt = $this->_db->prepare("select * from EventDonation");
    $stmt->execute();
    return $stmt;
   }
}// End Class
