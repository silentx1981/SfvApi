<?php

namespace SfvApi\ClubSchedule\Dto;

use DateTime;

class PlayerDto
{
    private bool $isHomeTeam = false;
    private int $teamId = 0;
    private string $teamName = '';
    private string $teamFullname = '';
    private int $clubNumber = 0;
    private string $clubName = '';
    private int $playerId = 0;
    private int $passportNumber = 0;
    private int $jerseyNumber = 0;
    private int $gender = 0;
    private string $name = '';
    private string $secondName = '';
    private string $firstname = '';
    private string $birthDate = '';
    private bool $isNotRegisteredPlayer = false;
    private int $positionId = 0;
    private string $positionName = '';
    private int $assignmentRoleId = 0;
    private string $assignmentRoleName = '';
    private int $playFromMinute = 0;
    private int $playUntilMinute = 0;
    private int $totalPlayTime = 0;

    public static function fromArray(array $data): self
    {
        $self = new self();

        $self->setIsHomeTeam($data['isHomeTeam'] ?? false);
        $self->setTeamId($data['teamId'] ?? 0);
        $self->setTeamName($data['teamName'] ?? '');
        $self->setTeamFullname($data['teamFullname'] ?? '');
        $self->setClubNumber($data['clubNumber'] ?? 0);
        $self->setClubName($data['clubName'] ?? '');
        $self->setPlayerId($data['playerId'] ?? 0);
        $self->setPassportNumber($data['passportNumber'] ?? 0);
        $self->setJerseyNumber($data['jerseyNumber'] ?? 0);
        $self->setGender($data['gender'] ?? 0);
        $self->setName($data['name'] ?? '');
        $self->setSecondName($data['secondName'] ?? '');
        $self->setFirstname($data['firstname'] ?? '');
        $self->setBirthDate($data['birthDate'] ?? '');
        $self->setIsNotRegisteredPlayer($data['isNotRegisteredPlayer'] ?? false);
        $self->setPositionId($data['positionId'] ?? 0);
        $self->setPositionName($data['positionName'] ?? '');
        $self->setAssignmentRoleId($data['assignmentRoleId'] ?? 0);
        $self->setAssignmentRoleName($data['assignmentRoleName'] ?? '');
        $self->setPlayFromMinute($data['playFromMinute'] ?? 0);
        $self->setPlayUntilMinute($data['playUntilMinute'] ?? 0);
        $self->setTotalPlayTime($data['totalPlayTime'] ?? 0);

        return $self;
    }

    // Getter
    public function getIsHomeTeam(): bool
    {
        return $this->isHomeTeam;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }

    public function getTeamFullname(): string
    {
        return $this->teamFullname;
    }

    public function getClubNumber(): int
    {
        return $this->clubNumber;
    }

    public function getClubName(): string
    {
        return $this->clubName;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getPassportNumber(): int
    {
        return $this->passportNumber;
    }

    public function getJerseyNumber(): int
    {
        return $this->jerseyNumber;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSecondName(): string
    {
        return $this->secondName;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function getIsNotRegisteredPlayer(): bool
    {
        return $this->isNotRegisteredPlayer;
    }

    public function getPositionId(): int
    {
        return $this->positionId;
    }

    public function getPositionName(): string
    {
        return $this->positionName;
    }

    public function getAssignmentRoleId(): int
    {
        return $this->assignmentRoleId;
    }

    public function getAssignmentRoleName(): string
    {
        return $this->assignmentRoleName;
    }

    public function getPlayFromMinute(): int
    {
        return $this->playFromMinute;
    }

    public function getPlayUntilMinute(): int
    {
        return $this->playUntilMinute;
    }

    public function getTotalPlayTime(): int
    {
        return $this->totalPlayTime;
    }

    // Setter
    public function setIsHomeTeam(bool $isHomeTeam): void
    {
        $this->isHomeTeam = $isHomeTeam;
    }

    public function setTeamId(int $teamId): void
    {
        $this->teamId = $teamId;
    }

    public function setTeamName(string $teamName): void
    {
        $this->teamName = $teamName;
    }

    public function setTeamFullname(string $teamFullname): void
    {
        $this->teamFullname = $teamFullname;
    }

    public function setClubNumber(int $clubNumber): void
    {
        $this->clubNumber = $clubNumber;
    }

    public function setClubName(string $clubName): void
    {
        $this->clubName = $clubName;
    }

    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    public function setPassportNumber(int $passportNumber): void
    {
        $this->passportNumber = $passportNumber;
    }

    public function setJerseyNumber(int $jerseyNumber): void
    {
        $this->jerseyNumber = $jerseyNumber;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function setIsNotRegisteredPlayer(bool $isNotRegisteredPlayer): void
    {
        $this->isNotRegisteredPlayer = $isNotRegisteredPlayer;
    }

    public function setPositionId(int $positionId): void
    {
        $this->positionId = $positionId;
    }

    public function setPositionName(string $positionName): void
    {
        $this->positionName = $positionName;
    }

    public function setAssignmentRoleId(int $assignmentRoleId): void
    {
        $this->assignmentRoleId = $assignmentRoleId;
    }

    public function setAssignmentRoleName(string $assignmentRoleName): void
    {
        $this->assignmentRoleName = $assignmentRoleName;
    }

    public function setPlayFromMinute(int $playFromMinute): void
    {
        $this->playFromMinute = $playFromMinute;
    }

    public function setPlayUntilMinute(int $playUntilMinute): void
    {
        $this->playUntilMinute = $playUntilMinute;
    }

    public function setTotalPlayTime(int $totalPlayTime): void
    {
        $this->totalPlayTime = $totalPlayTime;
    }

    // Zusätzliche Helper-Methoden
    public function getBirthDateAsDateTime(): DateTime
    {
        return new DateTime($this->birthDate);
    }

    public function getFullName(): string
    {
        return trim($this->firstname . ' ' . $this->secondName . ' ' . $this->name);
    }

    public function toArray(): array
    {
        return [
            'isHomeTeam' => $this->isHomeTeam,
            'teamId' => $this->teamId,
            'teamName' => $this->teamName,
            'teamFullname' => $this->teamFullname,
            'clubNumber' => $this->clubNumber,
            'clubName' => $this->clubName,
            'playerId' => $this->playerId,
            'passportNumber' => $this->passportNumber,
            'jerseyNumber' => $this->jerseyNumber,
            'gender' => $this->gender,
            'name' => $this->name,
            'secondName' => $this->secondName,
            'firstname' => $this->firstname,
            'birthDate' => $this->birthDate,
            'isNotRegisteredPlayer' => $this->isNotRegisteredPlayer,
            'positionId' => $this->positionId,
            'positionName' => $this->positionName,
            'assignmentRoleId' => $this->assignmentRoleId,
            'assignmentRoleName' => $this->assignmentRoleName,
            'playFromMinute' => $this->playFromMinute,
            'playUntilMinute' => $this->playUntilMinute,
            'totalPlayTime' => $this->totalPlayTime,
        ];
    }
}