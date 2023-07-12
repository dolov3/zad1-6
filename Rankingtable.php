<?php
class RankingTable
{
    private $players = array();

    public function __construct($playerNames)
    {
        foreach ($playerNames as $playerName) {
            $this->players[$playerName] = array(
                'score' => 0,
                'gamesPlayed' => 0
            );
        }
    }

    public function recordResult($playerName, $score)
    {
        if (array_key_exists($playerName, $this->players)) {
            $this->players[$playerName]['score'] += $score;
            $this->players[$playerName]['gamesPlayed']++;
        }
    }

    public function playerRank($rank)
    {
        $sortedPlayers = $this->players;

        // Sortowanie graczy według wyników, liczby rozegranych gier i kolejności na liście graczy
        uasort($sortedPlayers, function ($a, $b) {
            if ($a['score'] == $b['score']) {
                if ($a['gamesPlayed'] == $b['gamesPlayed']) {
                    return 0;
                }
                return ($a['gamesPlayed'] < $b['gamesPlayed']) ? -1 : 1;
            }
            return ($a['score'] > $b['score']) ? -1 : 1;
        });

        if ($rank > 0 && $rank <= count($sortedPlayers)) {
            $players = array_keys($sortedPlayers);
            $player = $players[$rank - 1];
            return $player;
        }

        return null;
    }
}

// Przykład użycia
$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(3); // Output: Jan
?>