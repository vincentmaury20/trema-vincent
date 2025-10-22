<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(name: 'app:create-admin')]
class CreateAdminUserCommand extends Command
{
   public function __construct(
      private EntityManagerInterface $em,
      private UserPasswordHasherInterface $hasher
   ) {
      parent::__construct();
   }

   protected function execute(InputInterface $input, OutputInterface $output): int
   {
      $user = new User();
      $user->setName('Admin')
         ->setEmail('admin@site.com')
         ->setRole('ROLE_ADMIN');

      $password = $this->hasher->hashPassword($user, 'admin123');
      $user->setPassword($password);

      $this->em->persist($user);
      $this->em->flush();

      $output->writeln('Admin créé avec succès !');
      return Command::SUCCESS;
   }
}
