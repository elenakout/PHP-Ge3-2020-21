<?php

function createXML($students, $userId) {
  $imp = new DOMImplementation;
  $dtd = $imp->createDocumentType('report','','report.dtd');
  $xml_filename = "./assets/files/report_".$userId.".xml";
  $xml = $imp->createDocument("","",$dtd);
  $xml->encoding = 'UTF-8';
  $xml->formatOutput = true;

  // Δημιουργούμε το στοιχείο - ρίζα και το προσθέτουμε στο xml.
  $record = $xml->createElement("record");
  $xml->appendChild($record);

  // Ολοκλήρωση της δημιουργίας του xml αρχείου κι αποθήκευση στον κατάλογο 'files' με το όνομα 'transactions+κωδικό πελάτη.xml'
  $xml->saveXML();
  $xml->save($xml_filename);

  return true;
}

function convertXMLToHTML($xmlId) {

// Τοποθεσία αποθήκευσης .xml & .xsl
$xml_filename = "./assets/files/report_".$xmlId.".xml";
$xsl_filename  = "./assets/files/report.xsl";

// Φόρτωση του xml
$xml = new DOMDocument();
$xml->load($xml_filename);

// Φόρτωση του xsl
$xsl = new DOMDocument();
$xsl->load($xsl_filename);

if (!$xml->validate()) {

  return "<p class='red'>Το XML αρχείο δεν είναι έγκυρο σύμφωνα με το DTD. Παρακαλώ επικοινωνήστε με την τεχνική υποστήριξη.</p>";

} else {

  // Επεξεργασία κι εξαγωγή αποτελεσμάτων
  $proc = new XSLTProcessor();
  $proc->importStyleSheet($xsl);
  return $proc->transformToXML($xml);

}
}