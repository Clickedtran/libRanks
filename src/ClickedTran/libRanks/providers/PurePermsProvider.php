<?php

declare(strict_types=1);

namespace ClickedTran\libRanks\providers;

use _64FF00\PurePerms\PurePerms;
use pocketmine\player\Player;
use pocketmine\Server;

class PurePermsProvider extends RankProvider
{
    private PurePerms $ranks;

    public static function checkDependencies(): bool
    {
        return Server::getInstance()->getPluginManager()->getPlugin("PurePerms") !== null;
    }

    public function __construct()
    {
        $this->ranks = PurePerms::getInstance();
    }

    public function getRank(Player $player, ?callable $callback = null)
    {
        return $this->ranks->getUserDataMgr()->getData($player)["group"];
    }

    public function giveRank(Player $player, string $rank, ?callable $callback = null)
    {
      return $this->ranks->setGroup($player, $this->ranks->getGroup($rank));
    }
    
    public function getRankData(string $rank, ?callable $callback = null)
    {   
      return $this->ranks->getGroup($rank);
    }

    public function removeRank(Player $player, string $rank, ?callable $callback = null)
    {
        return;
    }
}
