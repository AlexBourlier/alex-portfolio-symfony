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
    private ?SkillsCategory $skills_category_id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $percentage = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, Achievements>
     */
    #[ORM\ManyToMany(targetEntity: Achievements::class, mappedBy: 'skill_id')]
    private Collection $achievements;

    /**
     * @var Collection<int, ProjectSkill>
     */
    #[ORM\ManyToMany(targetEntity: ProjectSkill::class, mappedBy: 'skill_id')]
    private Collection $projectSkills;

    public function __construct()
    {
        $this->achievements = new ArrayCollection();
        $this->projectSkills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillsCategoryId(): ?SkillsCategory
    {
        return $this->skills_category_id;
    }

    public function setSkillsCategoryId(?SkillsCategory $skills_category_id): static
    {
        $this->skills_category_id = $skills_category_id;

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
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

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
            $achievement->addSkillId($this);
        }

        return $this;
    }

    public function removeAchievement(Achievements $achievement): static
    {
        if ($this->achievements->removeElement($achievement)) {
            $achievement->removeSkillId($this);
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
            $projectSkill->addSkillId($this);
        }

        return $this;
    }

    public function removeProjectSkill(ProjectSkill $projectSkill): static
    {
        if ($this->projectSkills->removeElement($projectSkill)) {
            $projectSkill->removeSkillId($this);
        }

        return $this;
    }
}
