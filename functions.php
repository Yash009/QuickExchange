<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 2/7/16
 * Time: 2:17 PM
 */



//Retrieve information for all users
/**
 * @return array
 */
function fetchAllUsers() {
  global $mysqli, $db_table_prefix;
  $stmt = $mysqli->prepare(
    "SELECT
		id,
		userid,
		FirstName,
		LastName,
		City,
		Zip,
		DateOfBirth,
		EmailAddress,
		MemberSince,
		active

		FROM " . $db_table_prefix . "user"
  );
  $stmt->execute();
  $stmt->bind_result(
    $id,
    $userid,
    $FirstName,
    $LastName,
    $City,
    $Zip,
    $DateOfBirth,
    $EmailAddress,
    $MemberSince,
    $active
  );

  while ($stmt->fetch()) {
    $row [] = array(
      'id'                      => $id,
      'userid'                  => $userid,
      'firstname'               => $FirstName,
      'lastname'                => $LastName,
      'city'                    => $City,
      'zip'                     => $Zip,
      'dateofbirth'             => $DateOfBirth,
      'email'                   => $EmailAddress,
      'membersince'             => $MemberSince,
      'active'                  => $active
    );
  }
  $stmt->close();
  return ($row);
}




//Create a new user

/**
 * @param $fname
 * @param $lname
 * @param $dob
 * @param $email
 * @param $city
 * @param $zip
 *
 * @return bool
 */
function createNewComplain($firstname, $lastname, $phone, $email, $subject, $message)
{
  global $mysqli;
  //Generate A random userid
  $character_array = array_merge(range(a, z), range(0, 9));
  $rand_string = "";
  for ($i = 0; $i < 6; $i++) {
    $rand_string .= $character_array[rand(
      0, (count($character_array) - 1)
    )];
  }
/*
 echo $rand_string;
  echo $firstname;
  echo $lastname;
  echo $phone;
  echo $email;
  echo $subject;
  echo $message;
*/

  $stmt = $mysqli->prepare(
    "INSERT INTO qe_contact (
		complainid,
		firstname,
		lastname,
		phone,
		contact_email,
		subject,
		message
		)
		VALUES (
	'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
		?
		)"
  );
  $stmt->bind_param("ssssss", $firstname, $lastname, $phone, $email, $subject, $message);
  $result = $stmt->execute();
  $stmt->close();
  return $result;

}


function createNewitem($userid, $contactemail, $title, $description,$author, $price)
{
    global $mysqli;
    //Generate A random userid


   /* echo $userid;
    echo $contactemail;
    echo $title;
    echo $description;
    echo $author;
    echo $price;
    echo $image;
   */
    $stmt = $mysqli->prepare(
        "INSERT INTO qe_items (
			user_id,
		user_email,
		item_desc1,
		item_desc2,
		item_desc3,
		requested_price,
		item_img_file_location
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?,
		?
		)"
    );
    $stmt->bind_param("sssssss", $userid, $contactemail, $title, $description, $author, $price,$image);
    $result = $stmt->execute();
    $stmt->close();
    return $result;

}



//fetch particular users record

/**
 * @param $userid
 *
 * @return array
 */
function fetchThisUser($userid)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
      "
    SELECT
    id,
    userid,
    FirstName,
    LastName,
    DateOfBirth,
    EmailAddress,
    City,
    Zip,
    MemberSince,
    active

    FROM user
    WHERE
    userid = ?
    LIMIT 1"
    );
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($id, $userid, $FirstName, $LastName, $DateOfBirth, $EmailAddress, $City, $Zip, $MemberSince, $active);
    $stmt->execute();
  while ($stmt->fetch()) {
    $row[] = array(
      'id'                      => $id,
      'userid'                  => $userid,
      'firstname'               => $FirstName,
      'lastname'                => $LastName,
      'city'                    => $City,
      'zip'                     => $Zip,
      'dateofbirth'             => $DateOfBirth,
      'email'                   => $EmailAddress,
      'membersince'             => $MemberSince,
      'active'                  => $active

    );
  }
  $stmt->close();
  return ($row);
}


//Update selected users record.
/**
 * @param $fname
 * @param $lname
 * @param $city
 * @param $zip
 * @param $dob
 * @param $email
 * @param $userid
 *
 * @return bool
 */
function updateThisRecord($fname, $lname, $city, $zip, $dob, $email, $userid)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
      "UPDATE " . $db_table_prefix . "user
		SET
		FirstName = ?,
		LastName = ?,
		City = ?,
		Zip = ?,
		DateOfBirth = ?,
		EmailAddress = ?
		WHERE
		userid = ?
		LIMIT 1"
    );
    $stmt->bind_param("sssssss", $fname, $lname, $city, $zip, $dob, $email, $userid);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}


//search a user
function SearchUserRecord()
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "
    SELECT
    id,
    userid,
    FirstName,
    LastName,
    DateOfBirth,
    EmailAddress,
    City,
    Zip,
    MemberSince,
    active

    FROM user
    WHERE
    FirstName = '".$_POST['FirstName']."'"

    );

    $stmt->execute();
    $stmt->bind_result($id, $userid, $FirstName, $LastName, $DateOfBirth, $EmailAddress, $City, $Zip, $MemberSince, $active);
    while ($stmt->fetch()) {
        $row[] = array(
            'id'                      => $id,
            'userid'                  => $userid,
            'firstname'               => $FirstName,
            'lastname'                => $LastName,
            'city'                    => $City,
            'zip'                     => $Zip,
            'dateofbirth'             => $DateOfBirth,
            'email'                   => $EmailAddress,
            'membersince'             => $MemberSince,
            'active'                  => $active

        );
    }
    $stmt->close();
    return ($row);
}


