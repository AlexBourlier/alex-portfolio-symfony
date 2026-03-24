<?php

namespace App\Tests\Unit;

use App\Form\Model\ContactData;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactDataValidationTest extends KernelTestCase
{
    private ValidatorInterface $validator;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->validator = static::getContainer()->get(ValidatorInterface::class);
    }

    public function testValidDataHasNoErrors(): void
    {
        $data = new ContactData();
        $data->name = 'Alexandre';
        $data->email = 'alexandre@test.com';
        $data->subject = 'Demande de contact';
        $data->message = 'Message valide avec assez de contenu.';

        $errors = $this->validator->validate($data);

        $this->assertCount(0, $errors);
    }

    public function testBlankFieldsReturnErrors(): void
    {
        $data = new ContactData();

        $errors = $this->validator->validate($data);

        $this->assertGreaterThan(0, count($errors));
    }

    public function testInvalidEmailReturnsError(): void
    {
        $data = new ContactData();
        $data->name = 'Alexandre';
        $data->email = 'email-invalide';
        $data->subject = 'Sujet';
        $data->message = 'Message valide';

        $errors = $this->validator->validate($data);

        $this->assertGreaterThan(0, count($errors));
    }

    public function testMessageTooShortReturnsError(): void
    {
        $data = new ContactData();
        $data->name = 'Alexandre';
        $data->email = 'alexandre@test.com';
        $data->subject = 'Sujet';
        $data->message = 'court'; // ⚠️ trop court si Length min

        $errors = $this->validator->validate($data);

        $this->assertGreaterThan(0, count($errors));
    }
}