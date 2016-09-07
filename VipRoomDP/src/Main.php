<?php

namespace VipRoomDP;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Position;
use pocketmine\permission\Permission;
use pocketmine\utils\TextFormat as Color;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
	
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		@mkdir($this->getDataFolder());
		$xyz = [
				"x" => 0,
				"y" => 0,
				"z" => 0,
		];
		$cfg = new Config($this->getDataFolder(), "Config.yml", Config::YAML, $xyz);
		$cfg->save();
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case 'viproom':
				if($sender->hasPermission("viproomdp.viproom")){
					$x = $this->getConfig()->get("x");
					$y = $this->getConfig()->get("y");
					$z = $this->getConfig()->get("z");
					$sender->teleport(new position($x, $y, $z));
					$this->getConfig()->save();
					$sender->sendMessage(Color::AQUA."[VipRoomDP] Welcome To Vip Room");
				} else {
					$sender->sendMessage(Color::RED."[VipRoomDP] You Not VIP");
				}
				
		}
	}
	
	public function onDisable(){
		$this->getConfig()->save();
	}
}
