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
        $this->createMovie($manager);

        $user = new User();
        $user->setUsername('jules');
        $user->setEmail('jroche@example.com');
        $user->setPassword('password');
        $user->setAccountStatus(UserAccountStatusEnum::ACTIVE);
        $manager->persist($user);

        $manager->flush();
    }

    public function createMovie(ObjectManager $manager): void
    {
        $movies = [
            [
                'title' => 'The Shawshank Redemption',
                'coverImage' => 'the-shawshank-redemption.jpg',
                'shortDescription' => 'Two imprisoned',
                'longDescription' => 'Two imprisoned in Shawshank prison bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'releasedAt' => '1994-09-23'
            ],
            [
                'title' => 'The Godfather',
                'coverImage' => 'the-godfather.jpg',
                'shortDescription' => 'The aging patriarch of an organized crime dynasty transfers control.',
                'longDescription' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'releasedAt' => '1972-03-24'
            ],
            [
                'title' => 'The Dark Knight',
                'coverImage' => 'the-dark-knight.jpg',
                'shortDescription' => 'Batman sets out to dismantle the remaining criminal organizations.',
                'longDescription' => 'Batman sets out to dismantle the remaining criminal organizations that plague the streets of Gotham City.',
                'releasedAt' => '2008-07-18'
            ],
            [
                'title' => 'Pulp Fiction',
                'coverImage' => 'pulp-fiction.jpg',
                'shortDescription' => 'The lives of two mob hitmen.',
                'longDescription' => 'The lives of two mob hitmen, a boxer, a gangster, and his wife intertwine in four tales of violence and redemption.',
                'releasedAt' => '1994-10-14'
            ],
            [
                'title' => 'Schindler\'s List',
                'coverImage' => 'schindlers-list.jpg',
                'shortDescription' => 'Oskar Schindler becomes an unlikely humanitarian.',
                'longDescription' => 'In Poland during World War II, Oskar Schindler becomes an unlikely humanitarian, saving over a thousand Jewish refugees.',
                'releasedAt' => '1993-12-15'
            ],
            [
                'title' => 'Fight Club',
                'coverImage' => 'fight-club.jpg',
                'shortDescription' => 'An insomniac office worker forms an underground fight club.',
                'longDescription' => 'An insomniac office worker and a soap salesman form an underground fight club that evolves into much more.',
                'releasedAt' => '1999-10-15'
            ],
            [
                'title' => 'Forrest Gump',
                'coverImage' => 'forrest-gump.jpg',
                'shortDescription' => 'Forrest Gump, a man with low intelligence.',
                'longDescription' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal unfold through the perspective of Forrest Gump.',
                'releasedAt' => '1994-07-06'
            ],
            [
                'title' => 'Inception',
                'coverImage' => 'inception.jpg',
                'shortDescription' => 'A thief who steals corporate secrets through dream-sharing technology.',
                'longDescription' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.',
                'releasedAt' => '2010-07-16'
            ],
            [
                'title' => 'The Matrix',
                'coverImage' => 'the-matrix.jpg',
                'shortDescription' => 'A computer hacker learns the true nature of reality.',
                'longDescription' => 'A computer hacker learns about the true nature of reality and his role in the war against its controllers.',
                'releasedAt' => '1999-03-31'
            ],
            [
                'title' => 'Interstellar',
                'coverImage' => 'interstellar.jpg',
                'shortDescription' => 'A team of explorers travels through a wormhole.',
                'longDescription' => 'A team of explorers travels through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'releasedAt' => '2014-11-07'
            ]
        ];

        foreach ($movies as $data) {
            $movie = new Movie();
            $movie->setTitle($data['title']);
            $movie->setCoverImage($data['coverImage']);
            $movie->setShortDescription($data['shortDescription']);
            $movie->setLongDescription($data['longDescription']);
            $movie->setRealeasedAt(new \DateTimeImmutable($data['releasedAt']));
            
            $manager->persist($movie);
        }
    }

    public function createUser(ObjectManager $manager): void
    {
        $users = [
            [
                'username' => 'jules',
                'email' => 'jroche@example.com',
                'password' => 'password1',
                'accountStatus' => UserAccountStatusEnum::ACTIVE
            ],
            [
                'username' => 'marie',
                'email' => 'mdupont@example.com',
                'password' => 'password2',
                'accountStatus' => UserAccountStatusEnum::ACTIVE
            ],
            [
                'username' => 'paul',
                'email' => 'ppaul@example.com',
                'password' => 'password3',
                'accountStatus' => UserAccountStatusEnum::SUSPENDED
            ],
            [
                'username' => 'lucie',
                'email' => 'lucie@example.com',
                'password' => 'password4',
                'accountStatus' => UserAccountStatusEnum::ACTIVE
            ],
            [
                'username' => 'thomas',
                'email' => 'tthomas@example.com',
                'password' => 'password5',
                'accountStatus' => UserAccountStatusEnum::INACTIVE
            ],
            [
                'username' => 'claire',
                'email' => 'claire@example.com',
                'password' => 'password6',
                'accountStatus' => UserAccountStatusEnum::ACTIVE
            ],
            [
                'username' => 'julien',
                'email' => 'julien@example.com',
                'password' => 'password7',
                'accountStatus' => UserAccountStatusEnum::ACTIVE
            ],
            [
                'username' => 'lea',
                'email' => 'lea@example.com',
                'password' => 'password8',
                'accountStatus' => UserAccountStatusEnum::SUSPENDED
            ],
            [
                'username' => 'antoine',
                'email' => 'antoine@example.com',
                'password' => 'password9',
                'accountStatus' => UserAccountStatusEnum::INACTIVE
            ],
            [
                'username' => 'manon',
                'email' => 'manon@example.com',
                'password' => 'password10',
                'accountStatus' => UserAccountStatusEnum::ACTIVE
            ]
        ];

        foreach ($users as $data) {
            $user = new User();
            $user->setUsername($data['username']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setAccountStatus($data['accountStatus']);
            
            $manager->persist($user);
        }

        $manager->flush();
    }
}
