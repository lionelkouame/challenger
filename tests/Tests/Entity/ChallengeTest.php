<?php

namespace App\Tests\Tests\Entity;

use App\Entity\ChallengeCategory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\TraceableValidator;

class ChallengeTest extends KernelTestCase
{
    public function getEntity() : ChallengeCategory
    {
        return (new ChallengeCategory())
            ->setCode('softwareQuestions')
            ->setName('Software questions');
    }

    public function getValidator(): ?object
    {
        /** @var TraceableValidator $validator */
        return $validator = self::getContainer()->get('validator');
    }

    public function testValidEntity()
    {
        $challengeCategory = $this->getEntity();

        $errors = $this->getValidator()->validate($challengeCategory);

        $this->assertCount(0 , $errors);
    }

    public function  testInvalidEntity()
    {
        $entity = $this->getEntity()->setName('aze')->setCode('aze');
        $errors = $this->getValidator()->validate($entity);

        $this->assertCount(1 , $errors);

    }

}
