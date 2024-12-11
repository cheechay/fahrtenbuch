<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data using filter_input() for sanitization
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $wohnort = filter_input(INPUT_POST, 'wohnort', FILTER_SANITIZE_STRING);
    $zweck = filter_input(INPUT_POST, 'zweck', FILTER_SANITIZE_STRING);
    $datum = filter_input(INPUT_POST, 'datum', FILTER_SANITIZE_STRING);
    $uhrzeit_von = filter_input(INPUT_POST, 'uhrzeit-von', FILTER_SANITIZE_STRING);
    $uhrzeit_bis= filter_input(INPUT_POST, 'uhrzeit-bis', FILTER_SANITIZE_STRING);
    $kmstart = filter_input(INPUT_POST, 'km-start', FILTER_VALIDATE_INT);
    $kmend = filter_input(INPUT_POST, 'km-end', FILTER_VALIDATE_INT);
    
   

    // Calculate the Km difference
    $kmdiff= $kmend-$kmstart;

    // Save the data to an XML file
    $xmlFile = 'fahrtenbuch.xml';
    if (file_exists($xmlFile)) {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load($xmlFile);
        $xml->preserveWhiteSpace = false;
        $root = $xml->documentElement;
    } else {
        // Create a new XML document if it doesn't exist
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->formatOutput = true;
        $root = $xml->createElement("fahrtenbuch");
        $xml->appendChild($root);
    }
    

   

    

    // Create a new entry element
    $entry = $xml->createElement("entry");

    // Add sub-elements to the entry
    $entry->appendChild($xml->createElement("name", htmlspecialchars($name)));
    $entry->appendChild($xml->createElement("wohnort", htmlspecialchars($wohnort)));
    $entry->appendChild($xml->createElement("Zweck", htmlspecialchars($zweck)));
    $entry->appendChild($xml->createElement("Datum", htmlspecialchars($datum)));
    $entry->appendChild($xml->createElement("Uhrzeit_von", htmlspecialchars($uhrzeit_von)));
    $entry->appendChild($xml->createElement("Uhrzeit_bis", htmlspecialchars($uhrzeit_bis)));
    $entry->appendChild($xml->createElement("Kmstart", htmlspecialchars($kmstart)));
    $entry->appendChild($xml->createElement("Kmend", htmlspecialchars($kmend)));
    $entry->appendChild($xml->createElement("Kmdiff", htmlspecialchars($kmdiff)));

    // Append the entry to the root element
    $root->appendChild($entry);

    // Save the updated XML
    $xml->save($xmlFile);
   
    // Redirect back to the form or show a success message
    echo "<h2>Vielen Dank!!</h2><h3>Fahrt ist erfolgreich gespeichert.</h3>";
    echo "<a href='index.html'>Zurück zum Formular</a><hr>";
    echo"<a href='fahrtenbuch.xml'>Als XML Datei </a>
    <hr> 
    <a href='ausgabe.html'>Liste von allen Fahrten</a>";
    

}
?>
