<?php

namespace App\Entity;

use App\Repository\ProjectSkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectSkillRepository::class)]
class ProjectSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Projects>
     */
    #[ORM\ManyToMany(targetEntity: Projects::class, inversedBy: 'projectSkills')]
    private Collection $project_id;

    /**
     * @var Collection<int, Skills>
     */
    #[ORM\ManyToMany(targetEntity: Skills::class, inversedBy: 'projectSkills')]
    private Collection $skill_id;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->project_id = new ArrayCollection();
        $this->skill_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Projects>
     */
    public function getProjectId(): Collection
    {
        return $this->project_id;
    }

    public function addProjectId(Projects $projectId): static
    {
        if (!$this->project_id->contains($projectId)) {
            $this->project_id->add($projectId);
        }

        return $this;
    }

    public function removeProjectId(Projects $projectId): static
    {
        $this->project_id->removeElement($projectId);

        return $this;
    }

    /**
     * @return Collection<int, Skills>
     */
    public function getSkillId(): Collection
    {
        return $this->skill_id;
    }

    public function addSkillId(Skills $skillId): static
    {
        if (!$this->skill_id->contains($skillId)) {
            $this->skill_id->add($skillId);
        }

        return $this;
    }

    public function removeSkillId(Skills $skillId): static
    {
        $this->skill_id->removeElement($skillId);

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
}
