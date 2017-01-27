<?php

namespace RTG\GitHub\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

use pocketmine\Player;

use pocketmine\utils\Config;

use RTG\GitHub\Review;

use pocketmine\utils\TextFormat as TF;

class MyCommand implements CommandExecutor {
    
    public function __construct(Review $plugin) {
        $this->plugin = $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $param) {
        switch($cmd->getName()) {
            
            case "review":
                
                if($sender->hasPermission("review.add") or !$sender instanceof Player) {
                    
                        
                        switch(strtolower(array_shift($param))) {
                            
                            case "add":
                                
                                if(isset($param[1])) {
                                    
                                    
                                    if(count($param) < 2) {
                                        $sender->sendMessage(TF::RED . "Please make sure that your review is more than 1 word!");
                                        return false;    
                                    }
                                    else {
                                        
                                        $this->cfg = new Config($this->plugin->getDataFolder() . "players/" . strtolower($sender->getName()) . ".txt", Config::ENUM);
                                        $msg = trim(implode(" ", $param));
                                        $this->cfg->set($msg);
                                        $this->cfg->save();
                                        $sender->sendMessage("[Reviewer] Your review has been added!");
                                        
                                    }
                                        
                                }
                                else {
                                    $sender->sendMessage("Usage: /review add [review]");
                                }
                                
                                return true;
                            break;
                            
                        }
                           
                }
                else {
                    $sender->sendMessage(TF::RED . "You have no permission to use this command!");
                }
                
                return true;
            break;
            
        }
        
    }
    
}