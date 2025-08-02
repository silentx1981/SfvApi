<?php

namespace SfvApi\ClubSchedule\Dto;

use DateTime;
use InvalidArgumentException;

class GameDto
{
    private int $matchId;
    private int $matchNumber;
    private DateTime $matchDate;
    private ?int $groupId;
    private ?int $cupId;
    private string $groupName;
    private int $roundNbr;
    private int $playgroundId;
    private string $stadiumPlaygroundName;
    private bool $isUnkownPlayground;
    private int $leagueId;
    private int $leagueNumber;
    private string $leagueName;
    private int $divisionId;
    private string $divisionName;
    private int $organisationId;
    private string $organisationName;
    private int $matchType;
    private string $matchTypeName;
    private int $matchState;
    private string $matchStateName;
    private int $playDay;
    private string $playDayName;
    private int $seasonId;
    private string $seasonName;
    private int $scoreTeamA;
    private int $scoreTeamB;
    private int $teamAId;
    private string $teamNameA;
    private int $teamBId;
    private string $teamNameB;
    private ?int $leagueIdA;
    private ?string $leagueNameA;
    private ?int $leagueIdB;
    private ?string $leagueNameB;
    private ?int $scoreTeamAHalftime;
    private ?int $scoreTeamBHalftime;

    public function __construct(
        int $matchId = 0,
        int $matchNumber = 0,
        ?DateTime $matchDate = null,
        ?int $groupId = null,
        ?int $cupId = null,
        string $groupName = '',
        int $roundNbr = 0,
        int $playgroundId = 0,
        string $stadiumPlaygroundName = '',
        bool $isUnkownPlayground = false,
        int $leagueId = 0,
        int $leagueNumber = 0,
        string $leagueName = '',
        int $divisionId = 0,
        string $divisionName = '',
        int $organisationId = 0,
        string $organisationName = '',
        int $matchType = 0,
        string $matchTypeName = '',
        int $matchState = 0,
        string $matchStateName = '',
        int $playDay = 0,
        string $playDayName = '',
        int $seasonId = 0,
        string $seasonName = '',
        int $scoreTeamA = 0,
        int $scoreTeamB = 0,
        int $teamAId = 0,
        string $teamNameA = '',
        int $teamBId = 0,
        string $teamNameB = '',
        ?int $leagueIdA = null,
        string $leagueNameA = '',
        ?int $leagueIdB = null,
        string $leagueNameB = '',
        $scoreTeamAHalftime = null,
        $scoreTeamBHalftime = null
    ) {
        $this->matchId = $matchId;
        $this->matchNumber = $matchNumber;
        $this->matchDate = $matchDate ?? new DateTime();
        $this->groupId = $groupId;
        $this->cupId = $cupId;
        $this->groupName = $groupName;
        $this->roundNbr = $roundNbr;
        $this->playgroundId = $playgroundId;
        $this->stadiumPlaygroundName = $stadiumPlaygroundName;
        $this->isUnkownPlayground = $isUnkownPlayground;
        $this->leagueId = $leagueId;
        $this->leagueNumber = $leagueNumber;
        $this->leagueName = $leagueName;
        $this->divisionId = $divisionId;
        $this->divisionName = $divisionName;
        $this->organisationId = $organisationId;
        $this->organisationName = $organisationName;
        $this->matchType = $matchType;
        $this->matchTypeName = $matchTypeName;
        $this->matchState = $matchState;
        $this->matchStateName = $matchStateName;
        $this->playDay = $playDay;
        $this->playDayName = $playDayName;
        $this->seasonId = $seasonId;
        $this->seasonName = $seasonName;
        $this->scoreTeamA = $scoreTeamA;
        $this->scoreTeamB = $scoreTeamB;
        $this->teamAId = $teamAId;
        $this->teamNameA = $teamNameA;
        $this->teamBId = $teamBId;
        $this->teamNameB = $teamNameB;
        $this->leagueIdA = $leagueIdA;
        $this->leagueNameA = $leagueNameA;
        $this->leagueIdB = $leagueIdB;
        $this->leagueNameB = $leagueNameB;
        $this->scoreTeamAHalftime = $scoreTeamAHalftime;
        $this->scoreTeamBHalftime = $scoreTeamBHalftime;
    }

    // Getters
    public function getMatchId(): int
    {
        return $this->matchId;
    }

    public function getMatchNumber(): int
    {
        return $this->matchNumber;
    }

    public function getMatchDate(): DateTime
    {
        return $this->matchDate;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getCupId(): ?int
    {
        return $this->cupId;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getRoundNbr(): int
    {
        return $this->roundNbr;
    }

    public function getPlaygroundId(): int
    {
        return $this->playgroundId;
    }

    public function getStadiumPlaygroundName(): string
    {
        return $this->stadiumPlaygroundName;
    }

    public function isUnkownPlayground(): bool
    {
        return $this->isUnkownPlayground;
    }

    public function getLeagueId(): int
    {
        return $this->leagueId;
    }

    public function getLeagueIdA(): int|null
    {
        return $this->leagueIdA;
    }

    public function getLeagueIdB(): int|null
    {
        return $this->leagueIdB;
    }

    public function getLeagueNumber(): int
    {
        return $this->leagueNumber;
    }

    public function getLeagueName(): string
    {
        return $this->leagueName;
    }

    public function getLeagueNameA(): string
    {
        return $this->leagueNameA;
    }

    public function getLeagueNameB(): string
    {
        return $this->leagueNameB;
    }

    public function getDivisionId(): int
    {
        return $this->divisionId;
    }

    public function getDivisionName(): string
    {
        return $this->divisionName;
    }

    public function getOrganisationId(): int
    {
        return $this->organisationId;
    }

    public function getOrganisationName(): string
    {
        return $this->organisationName;
    }

    public function getMatchType(): int
    {
        return $this->matchType;
    }

    public function getMatchTypeName(): string
    {
        return $this->matchTypeName;
    }

    public function getMatchState(): int
    {
        return $this->matchState;
    }

    public function getMatchStateName(): string
    {
        return $this->matchStateName;
    }

    public function getPlayDay(): int
    {
        return $this->playDay;
    }

    public function getPlayDayName(): string
    {
        return $this->playDayName;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getSeasonName(): string
    {
        return $this->seasonName;
    }

    public function getScoreTeamA(): int
    {
        return $this->scoreTeamA;
    }

    public function getScoreTeamAHalftime(): int
    {
        return $this->scoreTeamAHalftime;
    }

    public function getScoreTeamBHalftime(): int
    {
        return $this->scoreTeamBHalftime;
    }

    public function getScoreTeamB(): int
    {
        return $this->scoreTeamB;
    }

    public function getTeamAId(): int
    {
        return $this->teamAId;
    }

    public function getTeamNameA(): string
    {
        return $this->teamNameA;
    }

    public function getTeamBId(): int
    {
        return $this->teamBId;
    }

    public function getTeamNameB(): string
    {
        return $this->teamNameB;
    }

    // Setters
    public function setMatchId(int $matchId): void
    {
        $this->matchId = $matchId;
    }

    public function setMatchNumber(int $matchNumber): void
    {
        $this->matchNumber = $matchNumber;
    }

    public function setMatchDate(DateTime $matchDate): void
    {
        $this->matchDate = $matchDate;
    }

    public function setGroupId(?int $groupId): void
    {
        $this->groupId = $groupId;
    }

    public function setCupId(?int $cupId): void
    {
        $this->cupId = $cupId;
    }

    public function setGroupName(string $groupName): void
    {
        $this->groupName = $groupName;
    }

    public function setRoundNbr(int $roundNbr): void
    {
        $this->roundNbr = $roundNbr;
    }

    public function setPlaygroundId(int $playgroundId): void
    {
        $this->playgroundId = $playgroundId;
    }

    public function setStadiumPlaygroundName(string $stadiumPlaygroundName): void
    {
        $this->stadiumPlaygroundName = $stadiumPlaygroundName;
    }

    public function setIsUnkownPlayground(bool $isUnkownPlayground): void
    {
        $this->isUnkownPlayground = $isUnkownPlayground;
    }

    public function setLeagueId(int $leagueId): void
    {
        $this->leagueId = $leagueId;
    }

    public function setLeagueIdA(int|null $leagueIdA): void
    {
        $this->leagueIdA = $leagueIdA;
    }

    public function setLeagueIdB(int|null $leagueIdB): void
    {
        $this->leagueIdB = $leagueIdB;
    }

    public function setLeagueNumber(int $leagueNumber): void
    {
        $this->leagueNumber = $leagueNumber;
    }

    public function setLeagueName(string $leagueName): void
    {
        $this->leagueName = $leagueName;
    }

    public function setLeagueNameA(string $leagueNameA): void
    {
        $this->leagueNameA = $leagueNameA;
    }

    public function setLeagueNameB(string $leagueNameB): void
    {
        $this->leagueNameB = $leagueNameB;
    }

    public function setDivisionId(int $divisionId): void
    {
        $this->divisionId = $divisionId;
    }

    public function setDivisionName(string $divisionName): void
    {
        $this->divisionName = $divisionName;
    }

    public function setOrganisationId(int $organisationId): void
    {
        $this->organisationId = $organisationId;
    }

    public function setOrganisationName(string $organisationName): void
    {
        $this->organisationName = $organisationName;
    }

    public function setMatchType(int $matchType): void
    {
        $this->matchType = $matchType;
    }

    public function setMatchTypeName(string $matchTypeName): void
    {
        $this->matchTypeName = $matchTypeName;
    }

    public function setMatchState(int $matchState): void
    {
        $this->matchState = $matchState;
    }

    public function setMatchStateName(string $matchStateName): void
    {
        $this->matchStateName = $matchStateName;
    }

    public function setPlayDay(int $playDay): void
    {
        $this->playDay = $playDay;
    }

    public function setPlayDayName(string $playDayName): void
    {
        $this->playDayName = $playDayName;
    }

    public function setSeasonId(int $seasonId): void
    {
        $this->seasonId = $seasonId;
    }

    public function setSeasonName(string $seasonName): void
    {
        $this->seasonName = $seasonName;
    }

    public function setScoreTeamA(int $scoreTeamA): void
    {
        $this->scoreTeamA = $scoreTeamA;
    }

    public function setScoreTeamAHalftime(?int $scoreTeamAHalftime): void
    {
        $this->scoreTeamAHalftime = $scoreTeamAHalftime;
    }

    public function setScoreTeamB(int $scoreTeamB): void
    {
        $this->scoreTeamB = $scoreTeamB;
    }

    public function setScoreTeamBHalftime(?int $scoreTeamBHalftime): void
    {
        $this->scoreTeamBHalftime = $scoreTeamBHalftime;
    }

    public function setTeamAId(int $teamAId): void
    {
        $this->teamAId = $teamAId;
    }

    public function setTeamNameA(string $teamNameA): void
    {
        $this->teamNameA = $teamNameA;
    }

    public function setTeamBId(int $teamBId): void
    {
        $this->teamBId = $teamBId;
    }

    public function setTeamNameB(string $teamNameB): void
    {
        $this->teamNameB = $teamNameB;
    }

    // Utility methods
    public function toArray(): array
    {
        return [
            'matchId' => $this->matchId,
            'matchNumber' => $this->matchNumber,
            'matchDate' => $this->matchDate->format('Y-m-d\TH:i:s'),
            'groupId' => $this->groupId,
            'cupId' => $this->cupId,
            'groupName' => $this->groupName,
            'roundNbr' => $this->roundNbr,
            'playgroundId' => $this->playgroundId,
            'stadiumPlaygroundName' => $this->stadiumPlaygroundName,
            'isUnkownPlayground' => $this->isUnkownPlayground,
            'leagueId' => $this->leagueId,
            'leagueNumber' => $this->leagueNumber,
            'leagueName' => $this->leagueName,
            'divisionId' => $this->divisionId,
            'divisionName' => $this->divisionName,
            'organisationId' => $this->organisationId,
            'organisationName' => $this->organisationName,
            'matchType' => $this->matchType,
            'matchTypeName' => $this->matchTypeName,
            'matchState' => $this->matchState,
            'matchStateName' => $this->matchStateName,
            'playDay' => $this->playDay,
            'playDayName' => $this->playDayName,
            'seasonId' => $this->seasonId,
            'seasonName' => $this->seasonName,
            'scoreTeamA' => $this->scoreTeamA,
            'scoreTeamB' => $this->scoreTeamB,
            'teamAId' => $this->teamAId,
            'teamNameA' => $this->teamNameA,
            'teamBId' => $this->teamBId,
            'teamNameB' => $this->teamNameB,
            'leagueIdA' => $this->leagueIdA,
            'leagueIdB' => $this->leagueIdB,
            'leagueNameA' => $this->leagueNameA,
            'leagueNameB' => $this->leagueNameB,
            'scoreTeamAHalftime' => $this->scoreTeamAHalftime,
            'scoreTeamBHalftime' => $this->scoreTeamBHalftime,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public static function fromArray(array $data): self
    {
        $instance = new self();

        $instance->setMatchId($data['matchId'] ?? 0);
        $instance->setMatchNumber($data['matchNumber'] ?? 0);

        if (isset($data['matchDate'])) {
            $instance->setMatchDate(new DateTime($data['matchDate']));
        }

        $instance->setGroupId($data['groupId'] ?? null);
        $instance->setCupId($data['cupId'] ?? null);
        $instance->setGroupName($data['groupName'] ?? '');
        $instance->setRoundNbr($data['roundNbr'] ?? 0);
        $instance->setPlaygroundId($data['playgroundId'] ?? 0);
        $instance->setStadiumPlaygroundName($data['stadiumPlaygroundName'] ?? '');
        $instance->setIsUnkownPlayground($data['isUnkownPlayground'] ?? false);
        $instance->setLeagueId($data['leagueId'] ?? 0);
        $instance->setLeagueNumber($data['leagueNumber'] ?? 0);
        $instance->setLeagueName($data['leagueName'] ?? '');
        $instance->setDivisionId($data['divisionId'] ?? 0);
        $instance->setDivisionName($data['divisionName'] ?? '');
        $instance->setOrganisationId($data['organisationId'] ?? 0);
        $instance->setOrganisationName($data['organisationName'] ?? '');
        $instance->setMatchType($data['matchType'] ?? 0);
        $instance->setMatchTypeName($data['matchTypeName'] ?? '');
        $instance->setMatchState($data['matchState'] ?? 0);
        $instance->setMatchStateName($data['matchStateName'] ?? '');
        $instance->setPlayDay($data['playDay'] ?? 0);
        $instance->setPlayDayName($data['playDayName'] ?? '');
        $instance->setSeasonId($data['seasonId'] ?? 0);
        $instance->setSeasonName($data['seasonName'] ?? '');
        $instance->setScoreTeamA($data['scoreTeamA'] ?? 0);
        $instance->setScoreTeamB($data['scoreTeamB'] ?? 0);
        $instance->setTeamAId($data['teamAId'] ?? 0);
        $instance->setTeamNameA($data['teamNameA'] ?? '');
        $instance->setTeamBId($data['teamBId'] ?? 0);
        $instance->setTeamNameB($data['teamNameB'] ?? '');

        return $instance;
    }

    public static function fromJson(string $json): self
    {
        $data = json_decode($json, true);
        if ($data === null) {
            throw new InvalidArgumentException('Invalid JSON provided');
        }
        return self::fromArray($data);
    }

    public function __toString(): string
    {
        return sprintf(
            'GameDto[matchId=%d, teams=%s vs %s, date=%s, state=%s]',
            $this->matchId,
            $this->teamNameA,
            $this->teamNameB,
            $this->matchDate->format('Y-m-d H:i'),
            $this->matchStateName
        );
    }
}