<?php

namespace App\DataFixtures;

use App\Entity\Mark;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $movie = new Product();
        // $manager->persist($movie);
        for ($i = 0; $i < 20; $i++) {
            $movie = new Movie();
            $movie->setTitle('movie '.$i);
            $movie->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisi nisl, feugiat eget ante at, blandit condimentum libero. Integer ut mi a arcu mollis dignissim at quis purus. Proin vel diam eget turpis sollicitudin interdum. Aliquam porttitor ultrices arcu, pellentesque molestie elit porttitor id. Cras varius felis eros, sit amet tempus arcu venenatis a. Fusce non erat ut magna egestas ultrices. Praesent lectus libero, venenatis sollicitudin gravida ac, convallis sit amet metus. Ut finibus posuere odio, ac semper nisl iaculis ut. Fusce nec dui iaculis eros placerat tempor et in mauris.');
            $manager->persist($movie);
            for ($j = 0; $j < 20; $j++) {
                $mark = new Mark();
                $mark->setMovie($movie);
                $mark->setMarkValue(mt_rand(1, 10));
                $manager->persist($mark);
            }
        }
        $manager->flush();
    }
}
