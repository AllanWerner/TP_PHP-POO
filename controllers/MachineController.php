<?php
// Symboles et leurs poids (proba d'apparition)
// Chaque symbole a une probabilité spécifique d’apparaître. Les symboles avec des gains élevés sont rendus plus rares.

namespace Controllers;

class MachineController{
        
    
    // Fonction pour générer un symbole aléatoire
    public static function getRandomSymbol($symbols_with_weights){
         // Générer un nombre aléatoire
        $rand = mt_rand(1, array_sum($symbols_with_weights));
        foreach ($symbols_with_weights as $symbol => $weight) {
            if ($rand <= $weight) {
                return $symbol;
            }
            $rand -= $weight; // Réduire le seuil
        }
        return null; 
    }
    
    public static function spin(){

        // Table des gains (combinaison => gain)
        $paytable = [
            '🍋🍋🍋' => 40,
            '🍒🍒🍒' => 50,
            '⭐⭐⭐' => 100,
            '🔔🔔🔔' => 150,
            '💎💎💎' => 200,
        ];

        $symbols_with_weights = [
            '🍋' => 40,
            '🍒' => 30,
            '⭐' => 15,
            '🔔' => 10,
            '💎' => 5,
        ];

        // Générer 3 symboles
        $reel1 = self::getRandomSymbol($symbols_with_weights);
        $reel2 = self::getRandomSymbol($symbols_with_weights);
        $reel3 = self::getRandomSymbol($symbols_with_weights);
        
        // Résultat de la machine à sous
        $combination = $reel1 . $reel2 . $reel3;
        // Calculer le gain
        $gain = isset($paytable[$combination]) ? $paytable[$combination] : 0;
    
        header('Content-Type: application/json');
        // Réponse JSON
        echo json_encode([
        'success' => true,
        'reels' => [$reel1, $reel2, $reel3],
        'gain' => $gain,
        ]);

    }

    public static function view(){
        require_once ROOT."/views/show_machine.php";
        require_once ROOT."/templates/Global.php";
    }
}
?>