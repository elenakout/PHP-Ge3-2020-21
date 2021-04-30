<?php

function convertXMLToHTML() {

// Μετατροπή του αρχείου σε HTML με τη βοήθεια του XSL προτύπου.


// Τοποθεσία αποθήκευσης .xml & .xsl
$xml_filename = "./assets/files/report.xml";
$xsl_filename  = "./assets/files/report.xsl";

// Φόρτωση του xml
$xml = new DOMDocument();
$xml->load($xml_filename);

// Φόρτωση του xsl
$xsl = new DOMDocument();
$xsl->load($xsl_filename);

if (!$xml->validate()) {

  echo "<p>Το XML αρχείο δεν είναι έγκυρο σύμφωνα με το DTD. Παρακαλώ επικοινωνήστε με την τεχνική υποστήριξη.</p>";

} else {

  // Επεξεργασία κι εξαγωγή αποτελεσμάτων
  $proc = new XSLTProcessor();
  $proc->importStyleSheet($xsl);
  return $proc->transformToXML($xml);

}
}