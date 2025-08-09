<?php

namespace SfvApi\ClubSchedule\Dto;

use Iterator;
use Countable;
use JsonSerializable;

class PlayersDto implements Iterator, Countable, JsonSerializable
{
    /** @var PlayerDto[] */
    private array $players;
    private int $position = 0;

    public function __construct(array $players = [])
    {
        $this->setPlayers($players);
    }

    // Getter
    public function getPlayers(): array
    {
        return $this->players;
    }

    // Setter
    public function setPlayers(array $players): void
    {
        $this->players = [];
        foreach ($players as $player) {
            if (!($player instanceof PlayerDto)) {
                $player = PlayerDto::fromArray($player);
            }

            $this->addPlayer($player);
        }
    }

    // Zusätzliche Methoden
    public function addPlayer(PlayerDto $player): void
    {
        $this->players[] = $player;
    }

    public function removePlayer(int $index): void
    {
        if (isset($this->players[$index])) {
            unset($this->players[$index]);
            $this->players = array_values($this->players); // Re-index array
        }
    }

    public function getPlayer(int $index): ?PlayerDto
    {
        return $this->players[$index] ?? null;
    }

    public function getPlayerById(int $playerId): ?PlayerDto
    {
        foreach ($this->players as $player) {
            if ($player->getPlayerId() === $playerId) {
                return $player;
            }
        }
        return null;
    }

    public function count(): int
    {
        return count($this->players);
    }

    // Iterator Interface Implementation
    public function current(): PlayerDto
    {
        return $this->players[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->players[$this->position]);
    }

    // JsonSerializable Interface Implementation
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function isEmpty(): bool
    {
        return empty($this->players);
    }

    public function clear(): void
    {
        $this->players = [];
    }

    public function getHomePlayers(): array
    {
        return array_filter($this->players, function(PlayerDto $player) {
            return $player->getIsHomeTeam();
        });
    }

    public function getAwayPlayers(): array
    {
        return array_filter($this->players, function(PlayerDto $player) {
            return !$player->getIsHomeTeam();
        });
    }

    public function getPlayersByTeamId(int $teamId): array
    {
        return array_filter($this->players, function(PlayerDto $player) use ($teamId) {
            return $player->getTeamId() === $teamId;
        });
    }

    public function getPlayersByPosition(string $positionName): array
    {
        return array_filter($this->players, function(PlayerDto $player) use ($positionName) {
            return $player->getPositionName() === $positionName;
        });
    }

    public function sortByJerseyNumber(): void
    {
        usort($this->players, function(PlayerDto $a, PlayerDto $b) {
            return $a->getJerseyNumber() <=> $b->getJerseyNumber();
        });
    }

    public function sortByName(): void
    {
        usort($this->players, function(PlayerDto $a, PlayerDto $b) {
            return strcmp($a->getName(), $b->getName());
        });
    }

    public function toArray(): array
    {
        return array_map(function(PlayerDto $player) {
            return $player->toArray();
        }, $this->players);
    }
}