<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use App\Entity\User;
use App\Enum\UserAccountStatusEnum;
use App\Entity\WatchHistory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Shawshank Redemption');  
        $movie->setCoverImage('the-shawshank-redemption.jpg');
        $movie->setShortDescription('Two imprisoned');
        $movie->setLongDescription('Two imprisoned in Shawshank prison bond over a number of years, finding solace and eventual redemption through acts of common decency.');
        $movie->setRealeasedAt(new \DateTimeImmutable('1994-09-23'));
        $manager->persist($movie);


        $movie = new Movie();
        $movie->setTitle('Star Wars: Episode IV - A New Hope');  
        $movie->setCoverImage('star-wars-episode-iv-a-new-hope.jpg');
        $movie->setShortDescription('Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empires world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth Vader.');
        $movie->setLongDescription('Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empires world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth Vader.');
        $movie->setRealeasedAt(new \DateTimeImmutable('1977-05-25'));
        $manager->persist($movie);

        $user = new User();
        $user->setUsername('jules');
        $user->setEmail('jroche@example.com');
        $user->setPassword('password');
        $user->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($user);

        $history = new WatchHistory();
        $history->setWatcher($user);
        $history->setMedia($movie);
        $history->setLastWatchedAt(new \DateTimeImmutable());
        $history->setNumberOfViews(1);
        $manager->persist($history);

        $manager->flush();
    }
}
