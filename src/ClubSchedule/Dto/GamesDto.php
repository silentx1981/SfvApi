<?php

namespace SfvApi\ClubSchedule\Dto;

use DateTime;
use InvalidArgumentException;
use Iterator;
use Countable;
use JsonSerializable;

class GamesDto implements Iterator, Countable, JsonSerializable
{
    private array $games;
    private int $position = 0;

    public function __construct(array $games = [])
    {
        $this->games = [];
        foreach ($games as $game) {
            if (!($game instanceof GameDto)) {
                $game = GameDto::fromArray($game);
            }

            $this->addGame($game);
        }
    }

    // Array management methods
    public function addGame(GameDto $game): void
    {
        $this->games[] = $game;
    }

    public function removeGame(int $index): bool
    {
        if (!isset($this->games[$index])) {
            return false;
        }

        array_splice($this->games, $index, 1);
        return true;
    }

    public function removeGameById(int $matchId): bool
    {
        foreach ($this->games as $index => $game) {
            if ($game->getMatchId() === $matchId) {
                array_splice($this->games, $index, 1);
                return true;
            }
        }
        return false;
    }

    public function getGame(int $index): ?GameDto
    {
        return $this->games[$index] ?? null;
    }

    public function getGameById(int $matchId): ?GameDto
    {
        foreach ($this->games as $game) {
            if ($game->getMatchId() === $matchId) {
                return $game;
            }
        }
        return null;
    }

    public function getGames(): array
    {
        return $this->games;
    }

    public function setGames(array $games): void
    {
        $this->games = [];
        foreach ($games as $game) {
            $this->addGame($game);
        }
    }

    public function isEmpty(): bool
    {
        return empty($this->games);
    }

    public function clear(): void
    {
        $this->games = [];
        $this->position = 0;
    }

    // Filtering methods
    public function filterByTeam(string $teamName): GamesDto
    {
        $filtered = array_filter($this->games, function(GameDto $game) use ($teamName) {
            return $game->getTeamNameA() === $teamName || $game->getTeamNameB() === $teamName;
        });

        return new GamesDto(array_values($filtered));
    }

    public function filterByLeague(string $leagueName): GamesDto
    {
        $filtered = array_filter($this->games, function(GameDto $game) use ($leagueName) {
            return $game->getLeagueName() === $leagueName;
        });

        return new GamesDto(array_values($filtered));
    }

    public function filterByMatchState(int $matchState): GamesDto
    {
        $filtered = array_filter($this->games, function(GameDto $game) use ($matchState) {
            return $game->getMatchState() === $matchState;
        });

        return new GamesDto(array_values($filtered));
    }

    public function filterByDateRange(DateTime $startDate, DateTime $endDate): GamesDto
    {
        $filtered = array_filter($this->games, function(GameDto $game) use ($startDate, $endDate) {
            $gameDate = $game->getMatchDate();
            return $gameDate >= $startDate && $gameDate <= $endDate;
        });

        return new GamesDto(array_values($filtered));
    }

    // Sorting methods
    public function sortByDate(bool $ascending = true): void
    {
        usort($this->games, function(GameDto $a, GameDto $b) use ($ascending) {
            $result = $a->getMatchDate() <=> $b->getMatchDate();
            return $ascending ? $result : -$result;
        });
    }

    public function sortByTeamName(bool $ascending = true): void
    {
        usort($this->games, function(GameDto $a, GameDto $b) use ($ascending) {
            $result = strcmp($a->getTeamNameA(), $b->getTeamNameA());
            return $ascending ? $result : -$result;
        });
    }

    public function sortByLeague(bool $ascending = true): void
    {
        usort($this->games, function(GameDto $a, GameDto $b) use ($ascending) {
            $result = strcmp($a->getLeagueName(), $b->getLeagueName());
            return $ascending ? $result : -$result;
        });
    }

    // Statistics methods
    public function getGamesByTeam(string $teamName): array
    {
        return array_filter($this->games, function(GameDto $game) use ($teamName) {
            return $game->getTeamNameA() === $teamName || $game->getTeamNameB() === $teamName;
        });
    }

    public function getTeamStats(string $teamName): array
    {
        $teamGames = $this->getGamesByTeam($teamName);
        $stats = [
            'total_games' => count($teamGames),
            'wins' => 0,
            'draws' => 0,
            'losses' => 0,
            'goals_for' => 0,
            'goals_against' => 0
        ];

        foreach ($teamGames as $game) {
            $isTeamA = $game->getTeamNameA() === $teamName;
            $ownScore = $isTeamA ? $game->getScoreTeamA() : $game->getScoreTeamB();
            $opponentScore = $isTeamA ? $game->getScoreTeamB() : $game->getScoreTeamA();

            $stats['goals_for'] += $ownScore;
            $stats['goals_against'] += $opponentScore;

            if ($ownScore > $opponentScore) {
                $stats['wins']++;
            } elseif ($ownScore === $opponentScore) {
                $stats['draws']++;
            } else {
                $stats['losses']++;
            }
        }

        $stats['goal_difference'] = $stats['goals_for'] - $stats['goals_against'];

        return $stats;
    }

    public function getUniqueTeams(): array
    {
        $teams = [];
        foreach ($this->games as $game) {
            $teams[$game->getTeamNameA()] = true;
            $teams[$game->getTeamNameB()] = true;
        }
        return array_keys($teams);
    }

    public function getUniqueLeagues(): array
    {
        $leagues = [];
        foreach ($this->games as $game) {
            $leagues[$game->getLeagueName()] = true;
        }
        return array_keys($leagues);
    }

    // Serialization methods
    public function toArray(): array
    {
        return array_map(function(GameDto $game) {
            return $game->toArray();
        }, $this->games);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public static function fromArray(array $data): self
    {
        $games = [];
        foreach ($data as $gameData) {
            $games[] = GameDto::fromArray($gameData);
        }
        return new self($games);
    }

    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);
        if ($data === null) {
            throw new InvalidArgumentException('Invalid JSON provided');
        }
        return self::fromArray($data);
    }

    // Iterator interface implementation
    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): GameDto
    {
        return $this->games[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->games[$this->position]);
    }

    // Countable interface implementation
    public function count(): int
    {
        return count($this->games);
    }

    // JsonSerializable interface implementation
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    // Magic methods
    public function __toString(): string
    {
        $count = count($this->games);
        $teams = $this->getUniqueTeams();
        $leagues = $this->getUniqueLeagues();

        return sprintf(
            'GamesDto[games=%d, teams=%d, leagues=%d]',
            $count,
            count($teams),
            count($leagues)
        );
    }

    public function __clone()
    {
        $this->games = array_map(function(GameDto $game) {
            return clone $game;
        }, $this->games);
    }
}