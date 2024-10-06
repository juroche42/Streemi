<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use App\Entity\User;
use App\Enum\UserAccountStatusEnum;
use App\Entity\WatchHistory;
use App\Entity\Subscription;
use App\Entity\Serie;
use App\Entity\Category;
use App\Entity\Language;
use App\Entity\Season;
use App\Entity\Episode;
use App\Entity\Playlist;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->createMovie($manager);
        $this->createUser($manager);
        $this->createSubscription($manager);
        $this->createSerie($manager);
        $this->createCategory($manager);
        $this->createLanguage($manager);

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
                'accountStatus' => UserAccountStatusEnum::BANNED
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
                'accountStatus' => UserAccountStatusEnum::PENDING
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
                'accountStatus' => UserAccountStatusEnum::BANNED
            ],
            [
                'username' => 'antoine',
                'email' => 'antoine@example.com',
                'password' => 'password9',
                'accountStatus' => UserAccountStatusEnum::DELETED
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
            $this->createPlaylist($manager, $user);
            
            $manager->persist($user);
        }
    }

    public function createPlaylist(ObjectManager $manager, User $user) : void 
    {
        $playlists = [
            [
                'name' => 'Watch Later',
                'description' => 'Movies and series to watch later',
                'createdAt' => new \DateTimeImmutable('2021-01-01')
            ],
            [
                'name' => 'Favorites',
                'description' => 'Movies and series to watch again',
                'createdAt' => new \DateTimeImmutable('2021-01-01')
            ]
        ];

        foreach ($playlists as $data) {
            $playlist = new Playlist();
            $playlist->setName($data['name']);
            $playlist->setCreatedAt($data['createdAt']);
            $playlist->setUpdatedAt($data['createdAt']);
            $playlist->setCreator($user);
            
            $manager->persist($playlist);
        }
    }

    public function createSubscription(ObjectManager $manager) : void 
    {
        $subscriptions = [
            [
                'name' => 'Basic',
                'price' => 1000,
                'durationInMonth' => 1
            ],
            [
                'name' => 'Standard',
                'price' => 2000,
                'durationInMonth' => 3
            ],
            [
                'name' => 'Premium',
                'price' => 3000,
                'durationInMonth' => 6
            ]
        ];

        foreach ($subscriptions as $data) {
            $subscription = new Subscription();
            $subscription->setName($data['name']);
            $subscription->setPrice($data['price']);
            $subscription->setDurationInMonth($data['durationInMonth']);
            
            $manager->persist($subscription);
        }
    }

    public function createSerie(ObjectManager $manager)
    {
        $series = [
            [
                'title' => 'Breaking Bad',
                'coverImage' => 'breaking-bad.jpg',
                'shortDescription' => 'A high school chemistry teacher turned meth maker.',
                'longDescription' => 'A high school chemistry teacher turned meth maker partners with a former student to secure his family\'s future.',
                'releasedAt' => '2008-01-20'
            ],
            [
                'title' => 'Game of Thrones',
                'coverImage' => 'game-of-thrones.jpg',
                'shortDescription' => 'Nine noble families fight for control over the lands of Westeros.',
                'longDescription' => 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.',
                'releasedAt' => '2011-04-17'
            ]
        ];
        foreach ($series as $data) {
            $serie = new Serie();
            $serie->setTitle($data['title']);
            $serie->setCoverImage($data['coverImage']);
            $serie->setShortDescription($data['shortDescription']);
            $serie->setLongDescription($data['longDescription']);
            $serie->setRealeasedAt(new \DateTimeImmutable($data['releasedAt']));
            $this->createSeason($manager, $serie);
            $manager->persist($serie);
        }
    }

    public function createSeason(ObjectManager $manager, Serie $serie): void
    {
        $seasons = [
            [
                'number' => 1,
            ],
            [
                'number' => 2,
            ],
            [
                'number' => 3,
            ]
        ];
        foreach ($seasons as $data) {
            $season = new Season();
            $season->setSeasonNumber($data['number']);
            $season->setSerie($serie);
            $this->createEpisode($manager, $season);
            
            $manager->persist($season);
        }
    }

    public function createEpisode(ObjectManager $manager, Season $season): void
    {
        $episodes = [
            [
                'title' => 'Pilot',
                'duration' => 49,
                'releasedAt' => '2008-01-20'
            ],
            [
                'title' => 'Cat\'s in the Bag...',
                'duration' => 48,
                'releasedAt' => '2008-01-27'
            ],
            [
                'title' => '...And the Bag\'s in the River',
                'duration' => 47,
                'releasedAt' => '2008-02-10'
            ]
        ];
        foreach ($episodes as $data) {
            $episode = new Episode();
            $episode->setTitle($data['title']);
            $hours = intdiv($data['duration'], 60);
            $minutes = $data['duration'] % 60;    
            $duration = \DateTimeImmutable::createFromFormat('H:i', sprintf('%02d:%02d', $hours, $minutes));
            $episode->setDuration($duration);            
            $episode->setReleasedAt(new \DateTimeImmutable($data['releasedAt']));
            $episode->setSeason($season);
            
            $manager->persist($episode);
        }
    }

    public function createCategory(ObjectManager $manager) : void
    {
        $categories = [
            [
                'name' => 'Action',
                'label' => 'Action'
            ],
            [
                'name' => 'Adventure',
                'label' => 'Adventure'
            ],
            [
                'name' => 'Comedy',
                'label' => 'Comedy'
            ],
            [
                'name' => 'Crime',
                'label' => 'Crime'
            ],
            [
                'name' => 'Drama',
                'label' => 'Drama'
            ],
            [
                'name' => 'Fantasy',
                'label' => 'Fantasy'
            ],
            [
                'name' => 'Historical',
                'label' => 'Historical'
            ],
            [
                'name' => 'Horror',
                'label' => 'Horror'
            ],
            [
                'name' => 'Mystery',
                'label' => 'Mystery'
            ],
            [
                'name' => 'Romance',
                'label' => 'Romance'
            ],
            [
                'name' => 'Science Fiction',
                'label' => 'Science Fiction'
            ],
            [
                'name' => 'Thriller',
                'label' => 'Thriller'
            ],
            [
                'name' => 'Western',
                'label' => 'Western'
            ]
        ];
        foreach ($categories as $data) {
            $category = new Category();
            $category->setName($data['name']);
            $category->setLabel($data['label']);
            
            $manager->persist($category);
        }
    }

    public function createLanguage(ObjectManager $manager) : void
    {
        $languages = [
            [
                'name' => 'English',
                'code' => 'en'
            ],
            [
                'name' => 'French',
                'code' => 'fr'
            ],
            [
                'name' => 'Spanish',
                'code' => 'es'
            ],
            [
                'name' => 'German',
                'code' => 'de'
            ],
            [
                'name' => 'Italian',
                'code' => 'it'
            ],
            [
                'name' => 'Portuguese',
                'code' => 'pt'
            ],
            [
                'name' => 'Russian',
                'code' => 'ru'
            ],
            [
                'name' => 'Japanese',
                'code' => 'ja'
            ],
            [
                'name' => 'Chinese',
                'code' => 'zh'
            ],
            [
                'name' => 'Korean',
                'code' => 'ko'
            ]
        ];
        foreach ($languages as $data) {
            $language = new Language();
            $language->setName($data['name']);
            $language->setCode($data['code']);

            $manager->persist($language);
        }

        $manager->flush();
    }
}
