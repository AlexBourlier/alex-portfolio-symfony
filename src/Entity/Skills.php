<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillsRepository::class)]
class Skills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'skills')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SkillsCategory $skillsCategory = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $percentage = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Achievements>
     */
    #[ORM\OneToMany(targetEntity: Achievements::class, mappedBy: 'skill')]
    private Collection $achievements;

    /**
     * @var Collection<int, ProjectSkill>
     */
    #[ORM\OneToMany(targetEntity: ProjectSkill::class, mappedBy: 'skill')]
    private Collection $projectSkills;

    public function __construct()
    {
        $this->achievements = new ArrayCollection();
        $this->projectSkills = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function __toString(): string
    {
        return $this->getTitle() ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillsCategory(): ?SkillsCategory
    {
        return $this->skillsCategory;
    }

    public function setSkillsCategory(?SkillsCategory $skillsCategory): static
    {
        $this->skillsCategory = $skillsCategory;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPercentage(): ?int
    {
        return $this->percentage;
    }

    public function setPercentage(int $percentage): static
    {
        $this->percentage = $percentage;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Achievements>
     */
    public function getAchievements(): Collection
    {
        return $this->achievements;
    }

    public function addAchievement(Achievements $achievement): static
    {
        if (!$this->achievements->contains($achievement)) {
            $this->achievements->add($achievement);
            $achievement->setSkill($this);
        }

        return $this;
    }

    public function removeAchievement(Achievements $achievement): static
    {
        if ($this->achievements->removeElement($achievement)) {
            if ($achievement->getSkill() === $this) {
                $achievement->setSkill(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProjectSkill>
     */
    public function getProjectSkills(): Collection
    {
        return $this->projectSkills;
    }

    public function addProjectSkill(ProjectSkill $projectSkill): static
    {
        if (!$this->projectSkills->contains($projectSkill)) {
            $this->projectSkills->add($projectSkill);
            $projectSkill->setSkill($this);
        }

        return $this;
    }

    public function removeProjectSkill(ProjectSkill $projectSkill): static
    {
        if ($this->projectSkills->removeElement($projectSkill)) {
            if ($projectSkill->getSkill() === $this) {
                $projectSkill->setSkill(null);
            }
        }

        return $this;
    }
}