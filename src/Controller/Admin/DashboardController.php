<?php

namespace App\Controller\Admin;

use App\Entity\Domain;
use App\Entity\Education;
use App\Entity\Skills;
use App\Entity\SkillsCategory;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Html');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkTo(UserCrudController::class, 'Utilisateur', 'fas fa-user');
        yield MenuItem::subMenu('Compétendes techniques', 'fas fa-cogs')->setSubItems([
            MenuItem::linkTo(SkillsCategoryCrudController::class, 'Catégories de compétences', 'fas fa-cogs'),
            MenuItem::linkTo(SkillsCrudController::class, 'Compétences techniques', 'fas fa-cogs'),
        ]);
        yield MenuItem::subMenu('Compétendes professionnelles', 'fas fa-cogs')->setSubItems([
            MenuItem::linkTo(DomainCrudController::class, 'Domaines de compétences', 'fas fa-cogs'),
            MenuItem::linkTo(CompetenciesCrudController::class, 'Compétences professionnelles', 'fas fa-cogs'),
        ]);
        yield MenuItem::linkTo(EducationCrudController::class, 'Formations', 'fas fa-graduation-cap');
        yield MenuItem::linkTo(ExperiencesCrudController::class, 'Expériences professionnelles', 'fas fa-briefcase');
        yield MenuItem::linkTo(ProjectsCrudController::class, 'Projets', 'fas fa-project-diagram');
        yield MenuItem::linkTo(AchievementsCrudController::class, 'Réalisations', 'fas fa-trophy');
        yield MenuItem::linkTo(SocialCrudController::class, 'Réseaux sociaux', 'fas fa-hashtag');
    }
}
