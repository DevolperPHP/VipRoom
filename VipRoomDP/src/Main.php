<?php

namespace VipRoomDP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Position;
use pocketmine\permission;
use pocketmine\utils\TextFormat as Color;
use pocketmine\utils\Config;

class ExpLevel extends PluginBase{
  
  public function onEnable(){
    $this->getServer()->getLogger()->info(Color::GREEN."Plugin Is On");
    @mkdir($this->getDataFolder());
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    switch($cmd->getName()){
      case 'viproom':
        $x = $sender->getFloorX();
    		$y = $sender->getFloorY();
    		$z = $sender->getFloorZ();
        $this->getConfig()->get("x1", $x);
        $this->getConfig()->get("y1", $y);
        $this->getConfig()->get("z1", $z);
        if($sender->hasPermission("viproomdp.viproom")){
          $sender->teleport(new position($x, $y, $z));
          $this->getConfig()->save();
          $sender->sendMessage(Color::AQUA."Welcome To VIP Room");
        } else {
          $sender->sendMessage(Color::RED."You Not VIP");
        }
    }
  }
  
  public function onDisable(){
    $this->getConfig()->save();
}
