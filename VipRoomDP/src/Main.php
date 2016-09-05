<?php

namespace VipRoomDP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Position;
use pocketmine\permission;

class ExpLevel extends PluginBase{
  
  public function onEnable(){
    $this->getServer()->getLogger()->info(Color::GREEN."Plugin Is On");
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    switch($cmd->getName()){
      case 'teleport':
        if($sender->hasPermission("viproomdp.viproom")){
          $sender->teleport(new position(x, y, z)); /* edit the x y z */
        } else {
          $sender->sendMessage(Color::RED."You Not VIP");
        }
    }
  }
}
