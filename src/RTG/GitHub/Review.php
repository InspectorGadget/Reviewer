<?php

namespace RTG\GitHub;

/*
 * All rights reserved RTGNetworkkk
 */

/* Essentials */
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

use RTG\GitHub\Command\MyCommand;

use pocketmine\utils\Config;

class Review extends PluginBase {
    
    public function onEnable() {
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder() . "players");
        $this->getLogger()->warning("[Review] DIR has been made!");
        $this->getLogger()->warning("Loaded!");
        
        /* Execution */
        $this->getCommand("review")->setExecutor(new MyCommand($this));
        
        $this->getLogger()->warning("[Review] Everything has been loaded!");
    }
    
    public function onDisable() {
    }
    
}