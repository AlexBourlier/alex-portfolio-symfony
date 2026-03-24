<?php

namespace App\Tests\Form;

use App\Form\ContactType;
use App\Form\Model\ContactData;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use Symfony\Component\Form\Test\TypeTestCase;

#[AllowMockObjectsWithoutExpectations]
class ContactTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'name' => 'Alexandre',
            'email' => 'alexandre@test.com',
            'subject' => 'Demande de contact',
            'message' => 'Bonjour, ceci est un message de test.',
        ];

        $model = new ContactData();

        $form = $this->factory->create(ContactType::class, $model);

        $expected = new ContactData();
        $expected->name = 'Alexandre';
        $expected->email = 'alexandre@test.com';
        $expected->subject = 'Demande de contact';
        $expected->message = 'Bonjour, ceci est un message de test.';

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($expected, $model);
    }

    public function testFormContainsExpectedFields(): void
    {
        $form = $this->factory->create(ContactType::class);

        $this->assertTrue($form->has('name'));
        $this->assertTrue($form->has('email'));
        $this->assertTrue($form->has('subject'));
        $this->assertTrue($form->has('message'));
    }
}