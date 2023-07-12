<?php
class Thesaurus
{
    private $thesaurus;

    public function __construct()
    {
        // Inicjalizacja tezaurusa
        $this->thesaurus = array(
            "market" => array("trade"),
            "small" => array("little", "compact")
        );
    }

    public function getSynonyms($word)
    {
        if (array_key_exists($word, $this->thesaurus)) {
            $synonyms = $this->thesaurus[$word];
        } else {
            $synonyms = array();
        }

        $result = array(
            "word" => $word,
            "synonyms" => $synonyms
        );

        return json_encode($result);
    }
}

// Przykład użycia
$thesaurus = new Thesaurus();
echo $thesaurus->getSynonyms("small"); // Output: {"word":"small","synonyms":["little","compact"]}
echo $thesaurus->getSynonyms("asleast"); // Output: {"word":"asleast","synonyms":[]}

?>