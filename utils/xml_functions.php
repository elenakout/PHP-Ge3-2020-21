<?php

function createXML($students, $userId, $semester) {
  $imp = new DOMImplementation;
  $dtd = $imp->createDocumentType('report','','report.dtd');
  $xml_filename = "./assets/files/report_".$userId.".xml";
  $xml = $imp->createDocument("","",$dtd);
  $xml->encoding = 'UTF-8';
  $xml->formatOutput = true;

  // Δημιουργούμε το στοιχείο - ρίζα και το προσθέτουμε στο xml.
  $report = $xml->createElement("report");
  $xml->appendChild($report);

  // Προσθήκη εξάμηνου που επιλέχτηκε στο xml αρχείο
  $smstr = $xml->createElement("semester", $semester);
  $report->appendChild($smstr);

  foreach ($students as $std) {
    $student = $xml->createElement("student");
    $student->setAttribute("id", $std['ID']);
    $report->appendChild($student);
    $student->appendChild($xml->createElement("name", $std['name']));
    $student->appendChild($xml->createElement("lastname", $std['lastName']));
    $student->appendChild($xml->createElement("completed", $std['completed']));
    $student->appendChild($xml->createElement("average", $std['average']));
  }

  // Ολοκλήρωση της δημιουργίας του xml αρχείου κι αποθήκευση στον κατάλογο 'files' με το όνομα 'report_<ID>.xml'
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